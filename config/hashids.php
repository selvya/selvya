<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'coba' => [
            'salt' => 'Ilhwamwarajelekaskjdhaskdhdek',
            'length' => 20,
            'alphabet' => 'PG1234567890EAWI'
        ],

        'iku' => [
            'salt' => 'Bismillahirrohmanirrohim',
            'length' => 8,
            'alphabet' => 'INDKATOREJUM1234567890'
        ],

        'daftarindikator' => [
            'salt' => 'Alhamdulillahirrohmanirrohim',
            'length' => 10,
            'alphabet' => 'FRINDKATO1234567890'
        ],
        'persentase' => [
            'salt' => 'Arrahmanirrahim',
            'length' => 4,
            'alphabet' => 'PRESNT1234567890'
        ],
        'programbudaya' => [
            'salt' => 'Malikiyaumiddin',
            'length' => 6,
            'alphabet' => 'PROGAMBUDY1234567890'
        ],
        'alatukur' => [
            'salt' => 'Iyakanabuduwaiyyakanastain',
            'length' => 6,
            'alphabet' => 'ALTUKR1234567890'
        ],
        'definisinilai' => [
            'salt' => 'Ihdinashshirathalmustaqim',
            'length' => 6,
            'alphabet' => 'DEFINSLA1234567890'
        ],

        'user' => [
            'salt' => 'Shirathalladzinaanamtaalaihim',
            'length' => 10,
            'alphabet' => 'PENGUASTKR1234567890'
        ],

        'report' => [
            'salt' => 'jhashagsjhajhavdmnabsmanbs234/@%$56',
            'length' => 100,
            'alphabet' => 'ZXCVBNMLKJHGFDSAQWERTYUIOPqwertyuiopasdfghjklmnbvcxz1234567890'
        ],

        'tahun' => [
            'salt' => '@.,zTpMqBeAuZgUiSaO8Ittyfgqtd6',
            'length' => 20,
            'alphabet' => 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890'
        ],

        'triwulan' => [
            'salt' => 'UYKvxquHGyehgxZ6ryfmhqwgetuyghnvasJJH',
            'length' => 20,
            'alphabet' => 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890'
        ],

        'stakeholder' => [
            'salt' => 'UYKvxquHGyehgxZ6ryfmhqwgetuyghnvasJJH',
            'length' => 40,
            'alphabet' => 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890'
        ],
    ],

];
