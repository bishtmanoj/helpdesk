<?php

return [
    'sidebar' => [
        'left' => [
            'group' => [
                [
                    'title' => 'MAIN NAVIGATION',
                    'group' => ['user','admin'],
                    'content' => [
                        [
                            'title' => 'navigation.ticket.all',
                            'hasSub' => true,
                            'icon' => 'fa fa-ticket',
                            'hidden' => ['ticket.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'navigation.ticket.open',
                                    'route' => 'ticket.open',
                                    'icon' => 'fa fa-expand'
                                ],
                                [
                                    'title' => 'navigation.ticket.add',
                                    'route' => 'ticket.add',
                                    'icon' => 'fa fa-plus'
                                ],
                                [
                                    'title' => 'navigation.ticket.view',
                                    'route' => 'ticket.list',
                                    'icon' => 'fa fa-eye'
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'title' => 'SETTINGS',
                    'group' => ['admin'],
                    'content' => [
                        [
                            'title' => 'navigation.department.all',
                            'hasSub' => true,
                            'icon' => 'fa fa-ticket',
                            'hidden' => ['department.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'navigation.department.add',
                                    'route' => 'department.add',
                                    'icon' => 'fa fa-plus'
                                ],
                                [
                                    'title' => 'navigation.department.view',
                                    'route' => 'department.list',
                                    'icon' => 'fa fa-eye'
                                ],
                            ]
                        ],
                        [
                            'title' => 'navigation.request.all',
                            'hasSub' => true,
                            'icon' => 'fa fa-ticket',
                            'hidden' => ['request.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'navigation.request.add',
                                    'route' => 'request.add',
                                    'icon' => 'fa fa-plus'
                                ],
                                [
                                    'title' => 'navigation.request.view',
                                    'route' => 'request.list',
                                    'icon' => 'fa fa-eye'
                                ],
                            ]
                        ],
                        [
                            'title' => 'navigation.device.all',
                            'hasSub' => true,
                            'icon' => 'fa fa-ticket',
                            'hidden' => ['device.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'navigation.device.add',
                                    'route' => 'device.add',
                                    'icon' => 'fa fa-plus'
                                ],
                                [
                                    'title' => 'navigation.device.view',
                                    'route' => 'device.list',
                                    'icon' => 'fa fa-eye'
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'title' => 'MANAGE',
                    'group' => ['admin'],
                    'content' => [
                        [
                            'title' => 'user.navbar.main',
                            'hasSub' => true,
                            'icon' => 'fa fa-user',
                            'hidden' => ['users.edit'],
                            'subMenu' => [
                                [
                                    'title' => 'user.navbar.all',
                                    'route' => 'users.list',
                                    'icon' => 'fa fa-eye'
                                ],
                                [
                                    'title' => 'user.navbar.add',
                                    'route' => 'users.add',
                                    'icon' => 'fa fa-plus'
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'account' => [
        [
            'title' => 'Personal Information',
            'id' => 'information',
        ],
        [
            'title' => 'Edit Profile',
            'id' => 'edit-profile',
        ],
        [
            'title' => 'Change Account Password',
            'id' => 'change-password',
        ]
    ]
];
