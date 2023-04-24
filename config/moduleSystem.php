<?php

return [
    'users' => [
        'name' => 'Quản trị người dùng',
        'icon' => 'fa fa-user-circle',
        'child' => false,
        'check_permision' => 'ADMIN_SYSTEM,ADMIN_OWNER'
    ],
    'listtype' => [
        'name' => 'Quản trị danh mục',
        'icon' => 'fa fa-list',
        'check_permision' => 'ADMIN_SYSTEM',
        'child' => [
            'listtype' => [
                'name' => 'Loại danh mục ',
                'icon' => 'fa fa-angle-double-right',
            ],
            'list' => [
                'name' => 'Danh mục đối tượng',
                'icon' => 'fa fa-angle-double-right',
            ]
        ]
    ],
    'position' => [
        'name' => 'Chức vụ',
        'icon' => 'fas fa-chalkboard-teacher',
        'check_permision' => 'ADMIN_SYSTEM',
        'child' => [
            'positiongroup' => [
                'name' => 'Nhóm chức vụ',
                'icon' => 'fa fa-angle-double-right',
            ],
            'position' => [
                'name' => 'Chức vụ',
                'icon' => 'fa fa-angle-double-right',
            ]
        ]
    ],
    'packet' => [
        'name' => 'Quản trị Packet',
        'icon' => 'fa fa-sitemap',
        'check_permision' => 'ADMIN_SYSTEM',
        'child' => [
            'module' => [
                'name' => 'Quản lý module',
                'icon' => 'fa fa-angle-double-right',
            ],
            'workflow' => [
                'name' => 'Quản lý Workflow',
                'icon' => 'fa fa-angle-double-right',
            ]
        ]
    ],
    'permission' => [
        'name' => 'Quản trị quyền',
        'icon' => 'fa fa-user',

        'check_permision' => 'ADMIN_SYSTEM',
        'child' => [
            'group' => [
                'name' => 'Quản lý nhóm quyền',
                'icon' => 'fa fa-angle-double-right',
            ],
            'field' => [
                'name' => 'Phân quyền lĩnh vực',
                'icon' => 'fa fa-angle-double-right',
            ],

        ],
    ],
    'recordtype' => [
        'name' => 'Quản trị mẫu biểu',
        'icon' => 'fa fa-book',
        'child' => false,
        'check_permision' => 'ADMIN_SYSTEM',
        'child' => [
            'recordtype' => [
                'name' => 'Quản lý mẫu biểu',
                'icon' => 'fa fa-angle-double-right',
            ],
            // 'syscRecordtype' => [
            //     'name' => 'Đồng bộ TTHC',
            //     'icon' => 'fa fa-angle-double-right',
            // ]
        ]

    ],
    'support' => [
        'name' => 'Hỗ trợ hệ thống',
        'icon' => 'fa-solid fa-envelope-open-text',
        'check_permision' => false,
        'child' => [
            'support' => [
                'name' => 'Sao lưu dữ liệu',
                'icon' => 'fa fa-angle-double-right',
            ],
            'userlog' => [
                'name' => 'Nhật ký truy cập',
                'icon' => 'fa fa-angle-double-right',
            ],
            // 'supportData' => [
            //     'name' => 'Nhập xuất dữ liệu',
            //     'icon' => 'fa fa-angle-double-right',
            // ],
        ]
    ],
    // 'minutes' => [
    //     'name' => 'Quản trị biên bản',
    //     'icon' => 'far fa-file-alt',
    //     'check_permision' => 'ADMIN_SYSTEM',
    //     'child' => [
    //         'minutes' => [
    //             'name' => 'Danh sách biên bản',
    //             'icon' => 'fa fa-angle-double-right',
    //         ]
    //     ]
    // ],
    // 'decisionbonus' => [
    //     'name' => 'Quyết định khen thưởng',
    //     'icon' => 'far fa-file-alt',
    //     'check_permision' => 'ADMIN_SYSTEM',
    //     'child' => [
    //         'decisionbonus' => [
    //             'name' => 'Danh sách khen thưởng',
    //             'icon' => 'fa fa-angle-double-right',
    //         ]
    //     ]
    // ],
];
