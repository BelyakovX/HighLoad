<?php


namespace app\base;


class Test
{
    public static function test() {
        function req(){
            echo 1;
            req();
        }
        req();
    }
}