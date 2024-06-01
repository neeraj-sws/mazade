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
        if(!empty($meta_key)){

            $commissionData = CommissionSetting::where('category_id',$meta_key)->first();
            return $commissionData->commission;
        }
        return  'null';
    }
}

if (!function_exists('calculateCommission')) {
    function calculateCommission($amount, $commission)
    {
        if(!empty($amount) && $commission != 'null'){

            $commission = ($amount * $commission)/100;
            $deductedAmount = $amount - $commission;
    
            return $commission;
        }else{
            return "null";
        }

    }
}

