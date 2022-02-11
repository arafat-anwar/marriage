<?php

function sendEmail($email,$type,$message)
{
    $mail=\Mail::send('emails.message', ['msg' => $message,'type'=>$type], function ($msg) use ($email){
        $msg
          ->to($email->email,$email->name)
          ->subject($email->subject);
    });

    return $message->id;
}

function paymentOptions(){
    return array(
        [
            'name' => "Registration",
            'fee' => 40
        ],[
            'name' => "Match",
            'fee' => 15
        ],[
            'name' => "Renew",
            'fee' => 40
        ],
    );
}

function genders(){
    return array(
        'Female',
        'Male',
    );
}

function bloodGroups(){
    return array(
        'N/A',
        'A+',
        'A-',
        'B+',
        'B-',
        'O+',
        'O-',
        'AB+',
        'AB-',
    );
}

function weekDays(){
    return array(
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday",
    );
}

function bnWeekDays(){
    return array(
        "সোমবার",
        "মঙ্গলবার",
        "বুধবার",
        "বৃহস্পতিবার",
        "শুক্রবার",
        "শনিবার",
        "রবিবার",
    );
}

function weekDaysIndex(){
    return array(
        "Monday" => 0,
        "Tuesday" => 1,
        "Wednesday" => 2,
        "Thursday" => 3,
        "Friday" => 4,
        "Saturday" => 5,
        "Sunday" => 6,
    );
}

function minutesDifference($from,$to)
{
    $start_date = new DateTime($from);
    $since_start = $start_date->diff(new DateTime($to));
    $minutes = $since_start->days * 24 * 60;
    $minutes += $since_start->h * 60;
    $minutes += $since_start->i;
    return $minutes;
}

function freeLinks()
{
	$links = array();
	$freeLinks=\Modules\Setups\Entities\FreeLink::where('status',1)->get();
    if(isset($freeLinks[0])){
        foreach ($freeLinks as $key => $link) {
        	array_push($links, $link->route);
        }
    }
    return $links;
}

function this_url(){
    return request()->route()->uri;
}

function getModule($url)
{
    $module=\Modules\Setups\Entities\Module::where('route',trim($url))->first();
    if(isset($module->id)){
        return $module;
    }
    return false;
}

function getMenu($url)
{
    $menu=\Modules\Setups\Entities\Menu::where('route',trim($url))->first();
    if(isset($menu->id)){
        return $menu;
    }
    return false;
}

function getSubmenu($url)
{
    $submenu=\Modules\Setups\Entities\Submenu::where('route',trim($url))->first();
    if(isset($submenu->id)){
        return $submenu;
    }
    return false;
}

function checkPermission($needle,$haystack,$option){
    
    if(isset(json_decode($haystack,true)[$option])){
        $haystack=json_decode($haystack,true)[$option];
        if(isset($haystack[0])){
            if(in_array($needle, $haystack)){
                return true;
            }
        }
    }

    return false;
}

function isOptionPermitted($route,$option_name){
    $links = explode('/',$route);
    $menu_id = getMenu($links[1]) ? getMenu($links[1])->id : false;
    $submenu_id = getSubmenu($links[1]) ? getSubmenu($links[1])->id : false;

    $option = \Modules\Setups\Entities\Option::where('name','LIKE','%'.$option_name.'%')
                                            ->when($menu_id,function($query) use($menu_id){
                                                return $query->where('menu_id',$menu_id);
                                            })
                                            ->when($submenu_id,function($query) use($submenu_id){
                                                return $query->where('submenu_id',$submenu_id);
                                            })
                                            ->first();
    if(isset($option->id)){
        return checkPermission($option->id,auth()->user()->role->permissions,'options');
    }

    return false;
}

function shiftTypes($key=false){
    $types=array(
        '7 hours (+1 hour Lunch)',
        '8 hours (+1 hour Lunch)',
    );

    if($key){
        if(array_key_exists($key, $types)){
            return $types[$key];
        }
    }

    return $types;
}

function nameWithoutUID($employee){
    return $employee->first_name.' '.$employee->middle_name.' '.$employee->last_name; 
}

function nameWithUID($employee){
    return $employee->first_name.' '.$employee->middle_name.' '.$employee->last_name.' ('.$employee->uid.')'; 
}

function dateRange($from, $to, $format = "Y-m-d")
{
    $range = [];
    if(strtotime($from) && strtotime($to)){
        $begin = new \DateTime($from);
        $end = new \DateTime($to);

        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($begin, $interval, $end);

        
        foreach ($dateRange as $date) {
            $range[] = $date->format($format);
        }
        array_push($range, date('Y-m-d',strtotime($to)));
    }

    return $range;
}

function timeDiff($from,$to)
{
    $start_date=new \DateTime($from);
    $end_date=new \DateTime($to);
    $difference=$end_date->diff($start_date);
    return json_decode(json_encode($difference),true);
}

function payTypes($key=false){
    $types=array(
        'Cash',
        'Cheque',
    );

    if($key){
        if(array_key_exists($key, $types)){
            return $types[$key];
        }
    }

    return $types;
}

function downloadPDF($name,$data,$view){
    return \PDF::loadView($view, $data)->setPaper('legal', 'landscape')->download($name.'-('.date('F j,Y g:i a').').pdf');
}

function downloadPDFExtra($name,$data,$view,$paper,$orientation){
    return \PDF::loadView($view, $data)->setPaper($paper, $orientation)->download($name.'-('.date('F j,Y g:i a').').pdf');
}

function downloadExcel($view, $data, $name, $type){
    return \Excel::download(new \App\Exports\Excel($view, $data), $name.'('.date('F j,Y g:i a').')'.'.'.$type);
}

function languages(){
    return [
        'en' => 'English',
        'bn' => 'বাংলা',
    ];
}

function switchLanguage($en,$bn){
    if(App::isLocale('en')){
        return $en;
    }elseif(App::isLocale('bn')){
        return $bn;
    }else{
        return $en;
    }
}

function bn2enNumber ($number){
    $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $en_number = str_replace($search_array, $replace_array, $number);

    return $en_number;
}

function en2bnNumber ($number){
    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $bn_number = str_replace($search_array, $replace_array, $number);

    return $bn_number;
}

function checkLogin(){
    if(auth()->check()){
        if(in_array(auth()->user()->role_id, [3])){
            return true;
        }

        return false;
    }

    return false;
}

function chooseLanguage($en, $bn){
    return session()->get('current-language') == 'bn' ? $bn : $en;
}

function clues(){
    return [
        'about' => 'About us',
        'contact' => 'Contact us',
        'terms' => 'Terms and Conditions',
        'how_it_works' => 'How it works',
    ];
}

function relations(){
    return [
        'Self',
        'Daughter',
        'Son',
        'Sister',
        'Brother',
        'Relative',
        'Friend',
    ];
}

function maritalStatus(){
    return [
        "Single",
        "Separated",
        "Divorced",
        "Widowed",
        "Other"
    ];
}

function ethnicOrigins(){
    return [
        "East Indian", "African", "other"
    ];
}

function heights(){
    return [
        "Shorter than 4 feet 5 inches",
        "4 feet 5 inches",
        "4 feet 6 inches",
        "4 feet 7 inches",
        "4 feet 8 inches",
        "4 feet 9 inches",
        "4 feet 10 inches",
        "4 feet 11 inches",
        "5 feet",
        "5 feet 1 inches",
        "5 feet 2 inches",
        "5 feet 3 inches",
        "5 feet 4 inches",
        "5 feet 5 inches",
        "5 feet 6 inches",
        "5 feet 7 inches",
        "5 feet 8 inches",
        "5 feet 9 inches",
        "5 feet 10 inches",
        "5 feet 11 inches",
        "6 feet",
        "6 feet 1 inches",
        "6 feet 2 inches",
        "6 feet 3 inches",
        "6 feet 4 inches",
        "6 feet 5 inches",
        "Taller than 6 feet 5 inches"
    ];
}

function bodyTypes(){
    return [
        "Slim",
        "Average",
        "Muscular",
        "Curvy",
        "Chubby",
        "Bigger"
    ];
}

function regions(){
    return [
        "USA - New York City and vicinity",
        "USA - Florida",
        "USA - The rest of USA",
        "Canada - Toronto and vicinity",
        "Canada – Montreal and vicinity",
        "Canada – The rest of Canada",
        "Guyana",
        "Trinidad",
        "The Caribbean Islands or South America",
        "England",
        "Other",
    ];
}

function monthlyIncome(){
    return [
        "Below 5k",
        "5k to 10k",
        "10k to 15k",
        "15k to 20k",
        "20k to 25k",
        "25k to 30k",
        "30k to 40k",
        "40k to 80k",
        "80k to 1 Lakh",
        "1 Lakh to 2 Lakhs",
        "More than 2 Lakhs",
    ];
}

function humors(){
    return [
        "Cool",
        "Moderate",
        "Aggressive"
    ];
}

function politicalViews(){
    return [
        "Love Politics",
        "Hate Politics",
    ];
}

function religiousService(){
    return [
        "Participate Occasionally",
        "Never Participated",
    ];
}

function religions(){
    return [
        "Hindu",
        "Muslim",
        "Christian",
        "Other",
    ];
}

function personalValues(){
    return [
        "Achievement",
        "Courage",
        "Honesty",
        "Independence",
        "Kindness",
        "Love",
        "Peace",
        "Simplicity",
        "Understanding",
        "Dose not matter",
    ];
}

function familyValues(){
    return [
        "Joined Family",
        "Traditional Family",
        "Modern Family",
        "Small Family",
    ];
}

function communityValues(){
    return [
        "Helpful & Friendly",
        "Moderate",
        "Unfriendly",
    ];
}

