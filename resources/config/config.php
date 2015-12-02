<?php

return [
    'min'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'max'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'options'       => [
        'type' => 'anomaly.field_type.textarea'
    ],
    'free_input'    => [
        'type'   => 'anomaly.field_type.boolean',
        'config' => [
            'default_value' => true
        ]
    ],
    'filter'        => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'free_input' => false,
            'options'    => [
                'FILTER_VALIDATE_EMAIL',
                'FILTER_VALIDATE_IP',
                'FILTER_VALIDATE_URL'
            ]
        ]
    ],
    /*'source'        => [
        'type' => 'anomaly.field_type.url'
    ],*/
    'default_value' => [
        'type' => 'anomaly.field_type.tags'
    ]
];
