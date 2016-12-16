<?php
return [
    '@class' => 'Gantry\\Component\\Config\\CompiledConfig',
    'timestamp' => 1480814702,
    'checksum' => '9a266b5f50602bc4b6f2d7632544f3ac',
    'files' => [
        'wp-content/themes/g5_hydrogen/custom/config/_body_only' => [
            'index' => [
                'file' => 'wp-content/themes/g5_hydrogen/custom/config/_body_only/index.yaml',
                'modified' => 1477008834
            ],
            'layout' => [
                'file' => 'wp-content/themes/g5_hydrogen/custom/config/_body_only/layout.yaml',
                'modified' => 1477008834
            ]
        ],
        'wp-content/themes/g5_hydrogen/config/_body_only' => [
            'page' => [
                'file' => 'wp-content/themes/g5_hydrogen/config/_body_only/page.yaml',
                'modified' => 1477008823
            ]
        ]
    ],
    'data' => [
        'page' => [
            'doctype' => 'html',
            'body' => [
                'class' => 'gantry body-only'
            ]
        ],
        'index' => [
            'name' => '_body_only',
            'timestamp' => 1477008834,
            'version' => 7,
            'preset' => [
                'image' => 'gantry-admin://images/layouts/default.png',
                'name' => 'default',
                'timestamp' => 1477008823
            ],
            'positions' => [
                'header' => 'Header',
                'breadcrumbs' => 'Breadcrumbs',
                'footer' => 'Footer'
            ],
            'sections' => [
                'header' => 'Header',
                'navigation' => 'Navigation',
                'main' => 'Main',
                'footer' => 'Footer',
                'offcanvas' => 'Offcanvas'
            ],
            'particles' => [
                'logo' => [
                    'logo-8596' => 'Logo'
                ],
                'position' => [
                    'position-header' => 'Header',
                    'position-breadcrumbs' => 'Breadcrumbs',
                    'position-footer' => 'Footer'
                ],
                'menu' => [
                    'menu-7956' => 'Menu'
                ],
                'messages' => [
                    'system-messages-9042' => 'System Messages'
                ],
                'content' => [
                    'system-content-9940' => 'Page Content'
                ],
                'copyright' => [
                    'copyright-5107' => 'Copyright'
                ],
                'spacer' => [
                    'spacer-8479' => 'Spacer'
                ],
                'branding' => [
                    'branding-2285' => 'Branding'
                ],
                'mobile-menu' => [
                    'mobile-menu-6316' => 'Mobile-menu'
                ]
            ],
            'inherit' => [
                
            ]
        ],
        'layout' => [
            'version' => 2,
            'preset' => [
                'image' => 'gantry-admin://images/layouts/default.png',
                'name' => 'default',
                'timestamp' => 1477008823
            ],
            'layout' => [
                '/header/' => [
                    0 => [
                        0 => 'logo-8596 30',
                        1 => 'position-header 70'
                    ]
                ],
                '/navigation/' => [
                    0 => [
                        0 => 'menu-7956'
                    ]
                ],
                '/main/' => [
                    0 => [
                        0 => 'position-breadcrumbs'
                    ],
                    1 => [
                        0 => 'system-messages-9042'
                    ],
                    2 => [
                        0 => 'system-content-9940'
                    ]
                ],
                '/footer/' => [
                    0 => [
                        0 => 'position-footer'
                    ],
                    1 => [
                        0 => 'copyright-5107 40',
                        1 => 'spacer-8479 30',
                        2 => 'branding-2285 30'
                    ]
                ],
                'offcanvas' => [
                    0 => [
                        0 => 'mobile-menu-6316'
                    ]
                ]
            ],
            'structure' => [
                'header' => [
                    'attributes' => [
                        'boxed' => ''
                    ]
                ],
                'navigation' => [
                    'type' => 'section',
                    'attributes' => [
                        'boxed' => ''
                    ]
                ],
                'main' => [
                    'attributes' => [
                        'boxed' => ''
                    ]
                ],
                'footer' => [
                    'attributes' => [
                        'boxed' => ''
                    ]
                ]
            ],
            'content' => [
                'position-header' => [
                    'attributes' => [
                        'key' => 'header'
                    ]
                ],
                'position-breadcrumbs' => [
                    'attributes' => [
                        'key' => 'breadcrumbs'
                    ]
                ],
                'position-footer' => [
                    'attributes' => [
                        'key' => 'footer'
                    ]
                ]
            ]
        ]
    ]
];
