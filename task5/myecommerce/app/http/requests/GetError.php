<?php
namespace app\http\requests;
class GetError{
    public static function message(string $message){
        return str_replace('_',' ',$message);
    }
} 
?>