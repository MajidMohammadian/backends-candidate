<?php
function isJson($string) {
    return is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string)));
}