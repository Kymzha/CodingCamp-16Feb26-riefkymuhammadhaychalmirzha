<?php

return [

    'crawl' => true,

    'base_url' => env('APP_URL', 'http://127.0.0.1:8000'),

    'urls' => [
        '/',
        '/dokters',
        '/pasiens',
        '/administrasis',
        '/laporan/dokter',
        '/laporan/pasien',
        '/laporan/administrasi',
    ],

    'include' => [
        [
            'source' => 'public/css',
            'target' => 'css',
        ],
        [
            'source' => 'public/js',
            'target' => 'js',
        ],
        [
            'source' => 'public/vendor',
            'target' => 'vendor',
        ],
        [
            'source' => 'public/img',
            'target' => 'img',
        ],
    ],

    'exclude' => [],

    'disk' => 'export',

];
