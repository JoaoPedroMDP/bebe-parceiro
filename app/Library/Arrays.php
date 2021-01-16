<?php

namespace App\Library;

class Arrays{

    protected static $housing_condition = [
        'financed', 'owner', 'rented',
        'granted', 'inherited', 'social_program',
        'invasion'
    ];

    protected static $social_benefits = [
        'cadunico' ,'mcasa_mvida', 'bolsa_familia',
        'cadastro_emprego', 'cartao_alimentacao','vale_leite',
        'aposentado'
    ];

    protected static $healthcare_plan = [
        'cartao_sus', 'posto_de_saude'
    ];

    protected static $marital_status = [
        'single', 'married', 'divorced',
        'widowed', 'separated'
    ];

    protected static $sex = [
        'male', 'female', 'unknown'
    ];

    protected static $clothing_size = [
        'RN', 'P' , 'M', 
        'G' , 'GG', '1_ANO'
    ];

    public static function getHousingCondition(){
        return self::$housing_condition;
    }

    public static function getSocialBenefits(){
        return self::$social_benefits;
    }

    public static function getHealthcarePlan(){
        return self::$healthcare_plan;
    }

    public static function getMaritalStatus(){
        return self::$marital_status;
    }

    public static function getSex(){
        return self::$sex;
    }
    
    public static function getClothingSize(){
        return self::$clothing_size;
    }
}