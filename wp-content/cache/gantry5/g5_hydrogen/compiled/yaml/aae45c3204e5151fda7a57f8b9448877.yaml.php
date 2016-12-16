<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => 'C:\\wamp64\\www\\wordpress/wp-content/themes/g5_hydrogen/blueprints/content/blog/meta-author.yaml',
    'modified' => 1481855380,
    'data' => [
        'name' => 'Author Meta',
        'description' => 'Options for displaying author meta',
        'type' => 'blog',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Author',
                    'description' => 'Display author.',
                    'default' => 1
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Author',
                    'description' => 'Link author to his archives.',
                    'default' => 1
                ],
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Author Prefix',
                    'description' => 'Display text directly before the author name.'
                ]
            ]
        ]
    ]
];
