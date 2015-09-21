<?php namespace Anomaly\TagsFieldType\Command;

use Anomaly\TagsFieldType\TagsFieldType;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class BuildOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType\Command
 */
class BuildOptions implements SelfHandling
{

    /**
     * The field type instance.
     *
     * @var TagsFieldType
     */
    protected $fieldType;

    /**
     * Create a new BuildOptions instance.
     *
     * @param TagsFieldType $fieldType
     */
    function __construct(TagsFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $container->call(array_get($this->fieldType->getConfig(), 'handler'), ['fieldType' => $this->fieldType]);
    }
}
