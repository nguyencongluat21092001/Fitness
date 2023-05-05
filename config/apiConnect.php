<?php

/*
|------------------------------------------------------------------------------
| Thông tin cấu hình api connect api chứng khoán
|------------------------------------------------------------------------------
|
| Updated at: 04/05/2023
| By        : luatnc
|
*/

return [
    'financial' => [
        'api'         => '192.168.2.148:7600/api/',
        "token"       => "fintopluatnc2023",
        'apiChild' => [
            'list-coin-code' => "list-coin-code", // lấy chỉ số chứng khoán việt Nam 
            'list-top-coin' => "list-top-coin" // lấy top chỉ số chứng khoán việt Nam 
        ],
    ],
];
