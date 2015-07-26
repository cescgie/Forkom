<?php

namespace DPK\Model;


class DPKRegional
{
    const REGION_1 = 'jerman-barat';
    const REGION_2 = 'jerman-selatan';
    const REGION_3 = 'jerman-timur';
    const REGION_4 = 'jerman-utara';

    private static $CITY_REGIONAL  = [
        'berlin'    => self::REGION_3,
        'frankfurt' => self::REGION_1,
        'muenchen'  => self::REGION_2,
        'karlsruhe' => self::REGION_2,
        'dresden'   => self::REGION_4
    ];

    public static function getRegional($city){
        return self::$CITY_REGIONAL[strtolower($city)];
    }
}