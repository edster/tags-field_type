<?php

return [
    'min'           => [
        'label'        => 'Minimum Values',
        'instructions' => 'Enter the minimum number of allowed values if any.'
    ],
    'max'           => [
        'label'        => 'Maximum Values',
        'instructions' => 'Enter the maximum number of allowed values if any.'
    ],
    'filter'        => [
        'label'        => 'Filter',
        'instructions' => 'Specify any filters to apply to the tags. You may also enter string matching patterns like <strong>https://*.com</strong>.'
    ],
    'options'       => [
        'label'        => 'Available Options',
        'instructions' => 'Enter options below in a <strong>key: Value</strong> or <strong>Value</strong> only format. Enter each option on a new line.',
        'placeholder'  => "foo\n\rbar\n\rbaz"
    ],
    'free_input'    => [
        'label'        => 'Free Input',
        'instructions' => 'Allow adding custom tag values not defined in the <strong>Available Options</strong>?'
    ],
    'default_value' => [
        'label'        => 'Default Value',
        'instructions' => 'Enter default values if any.'
    ]
];
