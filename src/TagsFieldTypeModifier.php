<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;

/**
 * Class TagsFieldTypeModifier
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType
 */
class TagsFieldTypeModifier extends FieldTypeModifier
{

    /**
     * Return the serialized value.
     *
     * @param $value
     * @return string
     */
    public function modify($value)
    {
        return serialize((array)$value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return mixed
     */
    public function restore($value)
    {
        if (!$value) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        return (array)unserialize($value);
    }
}
