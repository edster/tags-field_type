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
        if (!$this->needsModifying($value)) {
            return $value;
        }

        return serialize($value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return mixed
     */
    public function restore($value)
    {
        if (!$this->needsRestoring($value)) {
            return $value;
        }

        return unserialize($value);
    }

    /**
     * Return whether the value
     * needs to be modified.
     *
     * @param $value
     * @return bool
     */
    protected function needsModifying($value)
    {
        return $value && is_array($value);
    }

    /**
     * Return whether the value
     * needs to be resotred.
     *
     * @param $value
     * @return bool
     */
    protected function needsRestoring($value)
    {
        return $value && is_string($value);
    }
}
