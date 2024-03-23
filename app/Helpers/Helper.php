<?php

// app/Helpers/CustomHelpers.php

if (!function_exists('customHelperFunction')) {
    function customHelperFunction($parameter)
    {
        echo "dd";die;
        // Your custom functionality here
        return $parameter;
    }
}