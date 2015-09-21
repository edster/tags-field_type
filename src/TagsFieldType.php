<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class TagsFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Tags
 */
class TagsFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    public $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.tags::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.tags::filter';

    /**
     * The field type rules.
     *
     * @var array
     */
    protected $rules = [
        'array'
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    protected $config = [
        'allow_creating_tags' => true
    ];

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($min = array_get($this->getConfig(), 'min')) {
            $rules[] = 'min:' . $min;
        }

        if ($max = array_get($this->getConfig(), 'max')) {
            $rules[] = 'max:' . $max;
        }

        return $rules;
    }

    /**
     * Get the validation value.
     *
     * Because the input does not provide
     * an array but we're expecting one, this
     * helps us out in standardizing the input
     * before modification and storage.
     *
     * @param null $default
     * @return array
     */
    public function getValidationValue($default = null)
    {
        return $this->getInputValue();
    }

    /**
     * Get the input value.
     *
     * Because the input does not provide
     * an array but we're expecting one, this
     * helps us out in standardizing the input
     * before modification and storage.
     *
     * @param null $default
     * @return array
     */
    public function getInputValue($default = null)
    {
        return explode(',', parent::getValidationValue($default));
    }

    /**
     * Return the required flag.
     *
     * @return bool
     */
    public function isRequired()
    {
        if ((!$required = parent::isRequired()) && array_get($this->getConfig(), 'min')) {
            return true;
        }

        return $required;
    }
}
