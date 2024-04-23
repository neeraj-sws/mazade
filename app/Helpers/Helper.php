<?php

// app/Helpers/CustomHelpers.php

use App\Models\CommissionSetting;

if (!function_exists('customHelperFunction')) {
    function customHelperFunction($parameter)
    {
        // echo "dd";die;
        // Your custom functionality here
        return $parameter;
    }
}

if (!function_exists('showcommission')) {
    function showcommission($meta_key)
    {
        $commissionData = CommissionSetting::where('meta_key',$meta_key)->first();
       
        return $commissionData->meta_value;
    }
}

if (!function_exists('calculateCommission')) {
    function calculateCommission($amount, $commission)
    {
        if(!empty($amount) && !empty($commission)){

            $commission = ($amount * $commission)/100;
            $deductedAmount = $amount - $commission;
    
            return $commission;
        }else{
            return "null";
        }

    }
}

