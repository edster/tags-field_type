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
     * The decorated object.
     * This is for IDE support.
     *
     * @var TagsFieldType
     */
    protected $object;

    /**
     * Return the tags wrapped in labels.
     *
     * @param string $class
     * @return string
     */
    public function labels($class = 'label-default')
    {
        return implode(
            ' ',
            array_map(
                function ($tag) use ($class) {
                    return '<span class="label ' . $class . '">' . $tag . '</span>';
                },
                $this->object->getValue()
            )
        );
    }
}
