# Output

This field type returns the tags assigned to an entry

### String

Return a string of values. Argument is the separator between the selected tags. Argument can be omitted and the default will be used.  
Default is `,`.

```
// Twig usage
{{ entry.example.string(',') }}

// API usage
$entry->example->string(',');
```
