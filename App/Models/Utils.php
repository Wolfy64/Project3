<?php

class Utils
{
    static function CheckRequest()
    {
        switch ( $_REQUEST['REQUEST_METHOD'] ){
            case 'GET':
                echo 'GET';
            case 'POST':
                echo 'POST';
            default:
                echo 'Default';

        }
    }
}