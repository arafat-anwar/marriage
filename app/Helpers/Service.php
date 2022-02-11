<?php
function servicePrice($service, $date){
    if($service->prices->where('from', '<=', $date)->count() > 0){
        return $service->prices->where('from', '<=', $date)[0];
    }

    return false;
}

function cartTotal(){
    $total = 0;
    $services = session()->has('services') ? session()->get('services') : [];
    if(is_array($services) && count($services) > 0){
        foreach($services as $service_id => $qty){
            $service = \Modules\Services\Entities\Service::find($service_id);
            $servicePrice = servicePrice($service, date('Y-m-d'));
            $total += $servicePrice ? $servicePrice->price*$qty : 0;
        }
    }

    return $total;
}

function invoiceTotal($invoice){
    $total = 0;
    if(isset($invoice->services[0])){
        foreach($invoice->services as $key => $service){
            $total += $service->price*$service->quantity;
        }
    }

    $discount = decimal($total > 0 && $invoice->discount > 0 ? $total*($invoice->discount/100) : 0);

    return [
        'total' => $total,
        'discount' => $discount,
    ];
}

function serviceDuration($mins){
    $hours = $mins >= 60 ? (int)($mins/60) : 0;
    $minutes = $mins > 0 ? $mins%60 : 0;

    $duration = '';
    if($hours > 0){
        $duration .= switchLanguage($hours.' hours ', en2bnnumber($hours).' ঘন্টা ');
    }

    if($minutes > 0){
        $duration .= switchLanguage($minutes.' minutes', en2bnnumber($minutes).' মিনিট');
    }

    return $duration;
}