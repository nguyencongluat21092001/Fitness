<?php

return [
    'home' => [
        'name' => 'TRANG CHỦ',
        'icon' => 'fas fa-home',
        'role' => false,
        'child' => false,
    ],
    'introduce' => [
        'name' => 'GIỚI THIỆU',
        'icon' => 'fas fa-globe-asia',
        'role' => false,
        'child' => false,
    ],
    'privileges' => [
        'name' => 'ĐẶC QUYỀN HỘI VIÊN',
        'icon' => 'far fa-newspaper',
        'role' => false,
        'child' => false,
    ],
    'datafinancial' => [
        'name' => 'DỮ LIỆU FINTOP',
        'icon' => 'far fa-newspaper',
        'role' => false,
        'child' => [
            'index' => [
                'name' => 'Tra cứu cổ phiếu',
                'icon' => 'fas fa-search',
                'role' => false,
            ],
            'signalIndex' => [
                'name' => 'Tín hiệu mua',
                'icon' => 'fas fa-signal',
                'role' => false,
            ],
            'recommendationsIndex' => [
                'name' => 'Khuyến nghị VIP',
                'icon' => 'fas fa-comments-dollar',
                'role' => false,
            ],
            'categoryFintopIndex' => [
                'name' => 'Danh mục FinTop',
                'icon' => 'fas fa-sitemap',
                'role' => false,
            ]
        ],
    ],
    'about' => [
        'name' => 'BÁO CÁO PHÂN TÍCH',
        'icon' => 'fas fa-hand-holding-usd',
        'role' => false,
        'child' => false,
    ],
    'library' => [
        'name' => 'THƯ VIỆN ĐẦU TƯ',
        'icon' => 'fas fa-book-medical',
        'role' => false,
        'child' => false,
    ],
    'des' => [
        'name' => 'HƯỚNG DẪN ĐẦU TƯ A-Z',
        'icon' => 'far fa-question-circle',
        'role' => false,
        'child' => false,
    ],

];