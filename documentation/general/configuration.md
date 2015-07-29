# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'min' => 1,
            'max' => 10,
            'default_value' => [
                'Tag 1',
                'Tag 2',
                'Tag 3'
            ]
        ]
    ]
];
```

### `min`

The minimum number of allowed tags. By default no minimum is enforced.

### `max`

The maximum number of allowed tags. By default no maximum is enforced.

### `default_value`

The default tags. Any valid array of tags can be used. By default there is no default value.