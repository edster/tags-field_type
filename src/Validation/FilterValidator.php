<?php namespace Anomaly\TagsFieldType\Validation;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Validation\Validator;

/**
 * Class FilterValidator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType\Validation
 */
class FilterValidator
{

    /**
     * @param FormBuilder $builder
     * @param Validator   $validator
     * @param             $parameters
     * @param             $attribute
     * @param             $value
     * @return bool
     */
    public function handle(FormBuilder $builder, Validator $validator, $parameters, $attribute, $value)
    {
        $field = $builder->getFormField($attribute);

        $filters = array_get($field->getConfig(), 'filter', []);

        if (!$filters) {
            return true;
        }

        foreach ($value as $tag) {
            foreach ($filters as $filter) {
                if (!$this->passes($tag, $filter)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Return if a tag passes the filter.
     *
     * @param $tag
     * @param $filter
     * @return bool
     */
    protected function passes($tag, $filter)
    {
        if (str_contains($filter, '*')) {
            return str_contains($tag, $filter);
        }

        switch ($filter) {

            case 'FILTER_VALIDATE_EMAIL':
                return filter_var($tag, FILTER_VALIDATE_EMAIL) !== false;

            case 'FILTER_VALIDATE_URL':
                return filter_var($tag, FILTER_VALIDATE_URL) !== false;

            case 'FILTER_VALIDATE_IP':
                return filter_var($tag, FILTER_VALIDATE_IP) !== false;

            default:
                return true;
        }
    }
}
