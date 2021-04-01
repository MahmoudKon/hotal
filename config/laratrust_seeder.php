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
            'employees'     => 'c,r,u,d',
            'users'         => 'c,r,u,d',
            'floors'        => 'c,r,u,d',
            'rooms'         => 'c,r,u,d',
            'reservations'  => 'c,r,u,d',
            'room_images'   => 'c,r,u,d',
        ],
        'admin' => [
            'employees'     => 'c,r,u,d',
            'users'         => 'c,r,u,d',
            'floors'        => 'c,r',
            'rooms'         => 'c,r',
            'room_images'   => 'c,r,u,d',
        ],
        'manager' => [
            'employees'     => 'r',
            'users'         => 'r',
            'floors'        => 'c,r,u',
            'rooms'         => 'r',
            'reservations'  => 'r',
        ],
        'employee' => [
            'users'         => 'r',
            'floors'        => 'r',
            'rooms'         => 'r,u',
            'reservations'  => 'r,c',
            'room_images'   => 'r,c,u,d'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
