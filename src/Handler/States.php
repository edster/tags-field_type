<?php namespace Anomaly\TagsFieldType\Handler;

use Anomaly\TagsFieldType\TagsFieldType;
use Illuminate\Contracts\Config\Repository;

/**
 * Class States
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\TagsFieldType\Handler
 */
class States
{

    /**
     * Handle the options.
     *
     * @param TagsFieldType $fieldType
     * @param Repository    $config
     */
    public function handle(TagsFieldType $fieldType, Repository $config)
    {
        $options = [];

        $countries = (array)$fieldType->config('countries', 'US');

        foreach ($countries as $code) {

            $country = $config->get('streams::countries.' . $code);

            if ($states = $config->get('streams::states/' . $code)) {
                $options[$country['name']] = array_combine(
                    array_keys($states),
                    array_map(
                        function ($state) {
                            return $state['name'];
                        },
                        $states
                    )
                );
            }
        }

        if (count($options) == 1) {
            $options = array_pop($options);
        }

        $fieldType->setOptions($options);
    }
}
