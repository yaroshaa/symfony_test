<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures
{
    const ADDRESSES = [
        [
            'user_id' => 1,
            'address' => '34 кв. Академіка Ломоносова, 36',
            'status' => true,
            'tariff' => 'Unlim 1000',
            'balance' => 230,
        ],
        [
            'user_id' => 1,
            'address' => '25 кв. Богдана Хмельницького, 12',
            'status' => false,
            'tariff' => 'Unlim 1000',
            'balance' => -1,
        ]
    ];

    const SERVICES = [
        [
            'address_id' => 1,
            'internet' => 'Unlim 1000',
            'tv' => 'omega 60',
            'ip' => '10.10.10.10'
        ],
        [
            'address_id' => 2,
            'internet' => 'Unlim 1000',
            'tv' => 'omega 60',
            'ip' => '10.10.10.10'
        ]
    ];
}
