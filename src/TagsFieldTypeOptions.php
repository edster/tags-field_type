<?php namespace Anomaly\TagsFieldType;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TagsFieldType\Command\ParseOptions;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Collection;

/**
 * Class TagsFieldTypeOptions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
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
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        if ($options instanceof Collection) {

            // If options is the empty collection
            if ($options->isEmpty()) {
                $options = [];
            }

            // If options is the collection of objects
            if (is_object($first = $options->first())) {
                $value = $first instanceof EntryInterface
                    ? $first->getTitleName()
                    : 'id';

                $options = $options->pluck($value);
            }

            // If options is the collection of string values
            if (is_string($first)) {
                $options = $options->all();
            }
        }

        $fieldType->setOptions((array)$options);
    }
}
