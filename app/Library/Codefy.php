<?php

namespace App\Library;

class Codefy{

    protected static $lowChar = [
        'a','b','c','d','e','f',
        'g','h','i','j','k','l',
        'm','n','o','p','q','r',
        's','t','u','v','w','x',
        'y','z'
    ];

    protected static $upChar = [
        'A','B','C','D','E','F',
        'G','H','I','J','K','L',
        'M','N','O','P','Q','R',
        'S','T','U','V','W','X',
        'Y','Z'
    ];

    protected static $number = [
        '0','1','2','3','4',
        '5','6','7','8','9'
    ];

    public static function getAllLowChar(){
        return self::$lowChar;
    }

    public static function getAllUpChar(){
        return self::$upChar;
    }

    public static function getAllNumber(){
        return self::$number;
    }

    public static function getRandomInteger(){
        return self::$number[rand(0, 9)];
    }

    public static function getRandomUppercase(){
        return self::$upChar[rand(0, 25)];
    }

    public static function getRandomLowcase(){
        return self::$lowChar[rand(0, 25)];
    }
}