<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => 'C:/wamp64/www/wordpress/wp-content/themes/g5_hydrogen/custom/config/home/layout.yaml',
    'modified' => 1481855381,
    'data' => [
        'version' => 2,
        'preset' => [
            'image' => 'gantry-admin://images/layouts/home.png',
            'name' => 'home',
            'timestamp' => 1477008823
        ],
        'layout' => [
            '/header/' => [
                0 => [
                    0 => 'logo-6215 25',
                    1 => 'menu-2427 75'
                ]
            ],
            '/navigation/' => [
                
            ],
            '/showcase/' => [
                
            ],
            '/feature/' => [
                0 => [
                    0 => 'custom-8471'
                ]
            ],
            '/main/' => [
                0 => [
                    0 => 'system-messages-2497'
                ]
            ],
            '/subfeature/' => [
                
            ],
            '/footer/' => [
                0 => [
                    0 => 'position-footer'
                ],
                1 => [
                    0 => 'copyright-1146 50',
                    1 => 'social-9486 50'
                ]
            ],
            'offcanvas' => [
                0 => [
                    0 => 'mobile-menu-8733'
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
            'showcase' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => ''
                ]
            ],
            'feature' => [
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
            'subfeature' => [
                'type' => 'section',
                'attributes' => [
                    'class' => 'flush',
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
            'logo-6215' => [
                'title' => 'Logo / Image',
                'attributes' => [
                    'image' => 'gantry-media://ARlogo.svg'
                ]
            ],
            'menu-2427' => [
                'attributes' => [
                    'menu' => 'main'
                ]
            ],
            'custom-8471' => [
                'title' => 'Custom HTML',
                'attributes' => [
                    'html' => '<img src="wp-content/uploads/2016/10/415364.jpg">
'
                ]
            ],
            'position-footer' => [
                'attributes' => [
                    'key' => 'footer'
                ]
            ],
            'social-9486' => [
                'attributes' => [
                    'css' => [
                        'class' => 'social-items'
                    ],
                    'items' => [
                        0 => [
                            'icon' => 'fa fa-twitter',
                            'text' => 'Twitter',
                            'link' => 'http://twitter.com/rockettheme',
                            'name' => 'Twitter'
                        ],
                        1 => [
                            'icon' => 'fa fa-facebook',
                            'text' => 'Facebook',
                            'link' => 'http://facebook.com/rockettheme',
                            'name' => 'Facebook'
                        ],
                        2 => [
                            'icon' => 'fa fa-google',
                            'text' => 'Google',
                            'link' => 'http://plus.google.com/+rockettheme',
                            'name' => 'Google'
                        ],
                        3 => [
                            'icon' => 'fa fa-rss',
                            'text' => 'RSS',
                            'link' => 'http://www.rockettheme.com/product-updates?rss',
                            'name' => 'RSS'
                        ]
                    ]
                ],
                'block' => [
                    'variations' => 'center'
                ]
            ],
            'mobile-menu-8733' => [
                'title' => 'Mobile Menu'
            ]
        ]
    ]
];
