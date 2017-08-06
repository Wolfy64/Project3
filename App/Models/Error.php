<?php

class ErrorTest
{
    public static function errorMessage($function)
    {
        try{
            throw new Exception("Error Processing Request" . $function, 1);
        } catch(Exception $e){
                die($e->getMessage());
            }
    }
}