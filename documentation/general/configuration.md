# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'min' => 1,
            'max' => 10,
            'default_value' => 'Tag 1, Tag 2, Tag 3'
        ]
    ]
];
```

### `min`

Minimum number of tags required.

### `max`

Maximum number of tags allowed.

### `default_value`

The default value of the tags. This is a comma separated value.
