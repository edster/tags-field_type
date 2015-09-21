<?php

return [
    'min'                 => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'max'                 => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'allow_creating_tags' => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => true
        ]
    ],
    'options'             => [
        'type' => 'anomaly.field_type.textarea'
    ],
    'source'              => [
        'type' => 'anomaly.field_type.url'
    ],
    'default_value'       => [
        'type' => 'anomaly.field_type.tags'
    ]
];
