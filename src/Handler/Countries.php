<?php namespace Anomaly\TagsFieldType\Handler;

use Anomaly\TagsFieldType\TagsFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class Countries
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TagsFieldType\Handler
 */
class Countries
{

    /**
     * Handle the options.
     *
     * @param TagsFieldType $fieldType
     * @param Repository    $config
     */
    public function handle(TagsFieldType $fieldType, Repository $config)
    {
        $fieldType->setOptions(
            array_combine(
                array_keys($config->get('streams::countries')),
                array_map(
                    function ($country) {
                        return $country['name'];
                    },
                    $config->get('streams::countries')
                )
            )
        );
    }
}
