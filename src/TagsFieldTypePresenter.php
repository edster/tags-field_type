<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class TagsFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType
 */
class TagsFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return a string of values.
     *
     * @param string $glue
     * @return string
     */
    public function string($glue = ',')
    {
        return implode($glue, $this->object->getValue());
    }
}
