<?php namespace Anomaly\TagsFieldType\Command;

use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ParseOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\TagsFieldType\Command
 */
class ParseOptions implements SelfHandling
{

    /**
     * The string options.
     *
     * @var string
     */
    protected $options;

    /**
     * Create a new ParseOptions instance.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $options = [];

        foreach (explode("\n", $this->options) as $option) {
            $options[] = ltrim(trim($option));
        }

        return array_filter($options);
    }
}
