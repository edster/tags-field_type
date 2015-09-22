<?php namespace Anomaly\TagsFieldType;

use Anomaly\TagsFieldType\Command\ParseOptions;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class TagsFieldTypeOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType
 */
class TagsFieldTypeOptions
{

    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param TagsFieldType $fieldType
     */
    public function handle(TagsFieldType $fieldType)
    {
        $options = (array)array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        $fieldType->setOptions($options);
    }
}
