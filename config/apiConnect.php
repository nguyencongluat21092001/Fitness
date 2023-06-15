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
        'api'         => 'http://fintopdata.vn/api/',
        "token"       => "key0000",
        'apiChild' => [
            'list-coin-code' => "list-coin-code", // lấy chỉ số chứng khoán việt Nam 
            'list-top-coin' => "list-top-coin", // lấy top chỉ số chứng khoán việt Nam 
            'send-sms' => "send-sms" // lấy otp
        ],
    ],
];
