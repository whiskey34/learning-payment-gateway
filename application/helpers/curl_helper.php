<?php 

// application/helpers/curl_helper.php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('curl_request')) {
    function curl_request($url, $options = array())
    {
        $ch = curl_init($url);

        // Set default options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Apply additional options
        foreach ($options as $option => $value) {
            curl_setopt($ch, $option, $value);
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}


?>