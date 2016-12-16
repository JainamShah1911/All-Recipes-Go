<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => 'C:\\wamp64\\www\\wordpress/wp-content/themes/g5_hydrogen/blueprints/content/general/wpautop.yaml',
    'modified' => 1481855380,
    'data' => [
        'name' => 'wpautop Enabled',
        'description' => 'Enables the wpautop WordPress core filter',
        'type' => 'general',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable wpautop.',
                    'default' => 1
                ],
                '_info' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info',
                    'content' => 'Enables the wpautop WordPress core filter that auto adds paragraphs and break lines to your post/page content.'
                ]
            ]
        ]
    ]
];
