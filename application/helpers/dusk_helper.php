<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('debug')) {
    function debug($data) {
        $backtrace = debug_backtrace();
       echo "<pre>";
       print_r($data);
       echo "<br>File : ".$backtrace[0]['file'];
       echo "<br>Line No : ".$backtrace[0]['line'];
    }
}
if (!function_exists('convertUTCToLocalTimeZone')) {
    function convertDateFormat($dateTime, $format = false) {
        $format = !empty($format) ? $format : DISPLAY_DATE_TIME_FORMAT;
        $date = DateTime::createFromFormat('Y-m-d', $dateTime);
        return $dateTime = $date->format($format);
    }
}
?>