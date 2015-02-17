<?php

return array (

    // Name of server
    'server_name' => 'Erezia',

    // Theme (see /public/imgs/carousel)
    'theme' => false,

    // Base points in shop
    'points' => 100,

    // Base points for vote
    'vote' => 10,

    // Delay between two vote
    'vote_delay' => 10810, // 3h and 1 minute to avoid problems

    // Promotions
    'promos' => array(
        /*'fr|sms' => 20,
        'fd|audiotel' => 20,
        'ca|audiotel' => 30,
        'ca|mobilecall' => 30,*/
    ),

    // Payments options
    'payment' => array(
        'used' => 'oneopay', // starpass, oneopay

        'starpass' => array(
            "name"       => 'Starpass',
            'url'        => 'starpass.json',
            'validation' => 'http://script.starpass.fr/check_php.php?ident={ID}&codes={CODE}DATAS=',
            'idp'        => 137990,
            'idd'        => 267769,
        ),

        'oneopay' => array(
            "name"       => 'OneoPay',
            //'url'        => 'http://oneopay.com/api/rates.php?service=15',
            'url'        => 'oneopay.json',
            'validation' => 'https://oneopay.com/api/checkcode.php?service=1&rate={ID}&code={CODE}',
            'id'         => 15,
            'secret'     => '',
        ),
    ),

    // RPG Paradize Top Vote
    'rpg-paradize' => array(
        'id' => 101591,
        'time' => 7205,
    ),

    // Dofus Web API
    'web-api' => 'http://api.voidmx.net/',

);
