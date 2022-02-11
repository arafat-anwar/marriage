<?php
function systemInformation(){
    return \Modules\Setups\Entities\SystemInformation::find(1);
}

function age($date){
	$interval = date_diff(date_create(), date_create($date));
    $years = $interval->format("%Y");
    $months = $interval->format("%M");
    $days = $interval->format("%d");
    
    return array(
    	'years' => $years,
    	'months' => $months,
    	'days' => $days,
    );
}

function ageInText($date){
	$age=age($date);
	return $age['years'].' Years '.$age['months'].' Months '.$age['days'].' days';
}

function ageYearsInText($date){
    $age=age($date);
    return $age['years'].' Years ';
}

function timeToSeconds($time) {
    return strtotime($time) - strtotime('00:00:00');
}

function is_save($object,$message){
	if($object){
		success($message);
		return redirect()->back();
	}

	whoops();
	return redirect()->back();
}

function success($message='Your operation has been done successfully'){
	session()->flash('success',$message);
}

function whoops($message='Whoops! Something went Wrong!'){
	session()->flash('danger',$message);
}

function timeToHours($time){
    $seconds=0;
    $h=0;
    $m=0;
    $s=0;
    $explode = explode(':', $time);
    if(isset($explode[0]) && $explode[0]>0){
        $h=$explode[0];
    }
    if(isset($explode[1]) && $explode[1]>0){
        $m=$explode[1];
    }
    if(isset($explode[2]) && $explode[2]>0){
        $s=$explode[2];
    }
    
    if (isset($explode[0]) && isset($explode[1]) && isset($explode[2])) {
        $seconds+=$h * 3600 + $m * 60 + $s;
    }
    if($seconds<=0){
        $hours=0;
    }else{
        $hours=$seconds/3600;
    }
    return number_format((float)$hours, 2, '.', '');
}

function inWord($number) {
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'System only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . inWord(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . inWord($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = inWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= inWord($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function hoursToTime($time)
{
    return gmdate('H:i:s', floor($time * 3600));
}

function decimal($value){
    return number_format((float)$value, 2, '.', '');
}

function roundedDecimal($value){
    return round(number_format((float)$value, 2, '.', ''));
}

function whoCreateThis($object){
    $object->created_by = auth()->user()->id;
    $object->updated_by = auth()->user()->id;

    return $object;
}

function whoUpdateThis($object){
    $object->updated_by = auth()->user()->id;

    return $object;
}

function uniquecode($length,$prefix,$max_field,$table,$extra = 0){
    $prefix_length=strlen($prefix);
    
    $max_id=DB::select("SELECT MAX(".$max_field.") AS ".$max_field." FROM ".$table." WHERE SUBSTR(".$max_field.",1,".$prefix_length.")='".$prefix."'");
    $only_id=substr($max_id[0]->$max_field,$prefix_length)+$extra;
    $new=(int)($only_id);
    $new++;
    $number_of_zero=$length-$prefix_length-strlen($new);
    $zero=str_repeat("0", $number_of_zero);
    $made_id=$prefix.$zero.$new;
    return $made_id;
}

function generateSEO($request){
    return json_encode([
        'keywords' => isset($request->keywords) ? $request->keywords : '',
        'bn_keywords' => isset($request->bn_keywords) ? $request->bn_keywords : '',
        'description' => isset($request->description) ? $request->description : '',
        'bn_description' => isset($request->bn_description) ? $request->bn_description : '',
    ]);
}

