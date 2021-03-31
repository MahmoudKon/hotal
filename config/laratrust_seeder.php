<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'employee'     => 'c,r,u,d',
            'user'         => 'c,r,u,d',
            'floor'        => 'c,r,u,d',
            'room'         => 'c,r,u,d',
            'reservation'  => 'c,r,u,d',
            'room_image'   => 'c,r,u,d',
        ],
        'admin' => [
            'employee'     => 'c,r,u,d',
            'user'         => 'c,r,u,d',
            'floor'        => 'c,r',
            'room'         => 'c,r',
            'room_image'   => 'c,r,u,d',
        ],
        'manager' => [
            'employee'     => 'r',
            'user'         => 'r',
            'floor'        => 'c,r,u',
            'room'         => 'r',
            'reservation'  => 'r',
        ],
        'employee' => [
            'user'         => 'r',
            'floor'        => 'r',
            'room'         => 'r,u',
            'reservation'  => 'r,c',
            'room_image'   => 'r,c,u,d'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
