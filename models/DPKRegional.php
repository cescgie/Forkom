<?php

namespace DPK\Model;


class DPKRegional
{
    const REGION_1 = 'jerman-barat';
    const REGION_2 = 'jerman-selatan';
    const REGION_3 = 'jerman-timur';
    const REGION_4 = 'jerman-utara';

    private static $CITY_REGIONAL  = [
        'freiburg'          => self::REGION_2,
        'stuttgart'         => self::REGION_2,
        'darmstadt'         => self::REGION_1,
        'mannheim'          => self::REGION_1,
        'muenchen'          => self::REGION_2,
        'berlin'            => self::REGION_3,
        'halle'             => self::REGION_3,
        'leipzig'           => self::REGION_3,
        'nordhausen'        => self::REGION_4,
        'koethen'           => self::REGION_3,
        'dresden'           => self::REGION_3,
        'ruhr'              => self::REGION_1,
        'frankfurt'         => self::REGION_1,
        'aachen'            => self::REGION_1,
        'bonn'              => self::REGION_1,
        'giessen'           => self::REGION_1,
        'kaiserslautern'    => self::REGION_2,
        'kassel'            => self::REGION_1,
        'jena'              => self::REGION_3,
        'ilmenau'           => self::REGION_3,
        'erfurt'            => self::REGION_3,
        'hamburg'           => self::REGION_4,
        'goettingen'        => self::REGION_1,
        'kiel'              => self::REGION_4,
        'hannover'          => self::REGION_4,
        'braunschweig'      => self::REGION_4,
        'bremen'            => self::REGION_4,
        'nuernberg'         => self::REGION_2,
        'karlsruhe'         => self::REGION_2
    ];

    public static function getRegional($city){
        return self::$CITY_REGIONAL[strtolower($city)];
    }
}