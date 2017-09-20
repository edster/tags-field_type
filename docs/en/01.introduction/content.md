## Introduction[](#introduction)

The tag field type provides a flexible tag management input.


### Configuration[](#introduction/configuration)

Below is the full configuration available with defaults values:

    "example" => [
        "type"   => "anomaly.field_type.tags",
        "config" => [
            "min"           => null,
            "max"           => null,
            "options"       => [],
            "free_input"    => true,
            "filter"        => null,
            "default_value" => null,
            "handler"       => "Anomaly\TagsFieldType\TagsFieldTypeOptions@handle"
        ]
    ]

###### Configuration

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Example</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

min

</td>

<td>

2

</td>

<td>

The minimum number of allowed tags.

</td>

</tr>

<tr>

<td>

max

</td>

<td>

2

</td>

<td>

The maximum number of allowed tags.

</td>

</tr>

<tr>

<td>

options

</td>

<td>

["foo", "bar"]

</td>

<td>

An array of available options.

</td>

</tr>

<tr>

<td>

free_input

</td>

<td>

false

</td>

<td>

If enabled tags not defined in available options can be entered.

</td>

</tr>

<tr>

<td>

filter

</td>

<td>

FILTER_VALIDATE_EMAIL

</td>

<td>

A validation filter to apply. Valid options are `FILTER_VALIDATE_EMAIL`, `FILTER_VALIDATE_URL`, and `FILTER_VALIDATE_IP`.

</td>

</tr>

<tr>

<td>

default_value

</td>

<td>

["foo"]

</td>

<td>

The default value.

</td>

</tr>

<tr>

<td>

handler

</td>

<td>

App\MyTags@handle

</td>

<td>

The options handler.

</td>

</tr>

</tbody>

</table>


### Option Handlers[](#introduction/option-handlers)

Option handlers are responsible for setting the available options on the field type. You can define your own option handler to add your own logic to available options.

You can define custom handlers as a callable string where `@handle will be assumed if no method is provided:

    "handler" => "App/Example/MyTags@handle"

Option handlers can also a handler with a closure:

    "example" => [
        "config" => [
            "handler" => function (TagsFieldType $fieldType) {
                $fieldType->setOptions(
                    [
                        "foo",
                        "bar"
                    ]
                );
            }
        ]
    ]

<div class="alert alert-info">**Remember:** Closures can not be stored in the database so your closure type handlers must be set / overridden from the form builder.</div>


#### Writing Option Handlers[](#introduction/option-handlers/writing-option-handlers)

Writing custom option handlers is easy. To begin create a class with the method you defined in the config option.

    "handler" => "App/Example/MyTags@handle"

The handler string is called via Laravel's service container. The `TagsFieldType $fieldType` is passed as an argument.

<div class="alert alert-primary">**Pro Tip:** Handlers are called through Laravel's service container so method and class injection is supported.</div>

    <?php namespace App\Example;

    class MyTags
    {
        public function handle(TagsFieldType $fieldType)
        {
            $fieldType->setOptions(
                [
                    "foo",
                    "bar",
                ]
            );
        }
    }
