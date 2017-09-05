<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'posts' =>'c,r,u,d',
            'categories' => 'c,r,u,d',
            'comments' => 'c,r,u,d',
            'faqs' => 'c,r,u,d',
            'friends' => 'c,r,u,d',
            'inboxes' => 'c,r,u,d',
            'outboxes' => 'c,r,u,d',
            'photos' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'sliders' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'todos' => 'c,r,u,d',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
