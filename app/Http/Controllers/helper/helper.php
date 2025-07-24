<?php

if (!function_exist(p)){
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

