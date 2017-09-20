## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You can set the tags field type value with an array of selected options:

    $entry->example = ["foo", "bar"];


### Basic Output[](#usage/basic-output)

The tags field type returns the option values:

    $entry->example; // ["foo", "bar"]


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\TagsFieldType\TagsFieldTypePresenter` class.


#### TagsFieldTypePresenter::labels()[](#usage/presenter-output/tagsfieldtypepresenter-labels)

The `labels` method returns an array of labels from select tags.

###### Returns: `array`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$context

</td>

<td>

false

</td>

<td>

string

</td>

<td>

defaut

</td>

<td>

The label context color. Valid options are `success`, `info`, `warning`, `danger`, and `default`.

</td>

</tr>

<tr>

<td>

$size

</td>

<td>

false

</td>

<td>

string

</td>

<td>

sm

</td>

<td>

The label size. Valid options are `xs`, `sm`, and `lg`.

</td>

</tr>

</tbody>

</table>

###### Example

    foreach ($decorated->labels('success') as $label) {
        echo $label;
    }

###### Twig

    {{ decorated.labels('success')|join(' ')|raw }}
