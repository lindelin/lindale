<?php 
    function cut_str($str,$len,$suffix="..."){
        if(function_exists('mb_substr')){
            if(strlen($str) > $len){
                $str= mb_substr($str,0,$len).$suffix;
            }
            return $str;
        }else{
            if(strlen($str) > $len){
                $str= substr($str,0,$len).$suffix;
            }
            return $str;
        }         
    }
?>    