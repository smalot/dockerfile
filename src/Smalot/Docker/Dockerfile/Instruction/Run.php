<?php

namespace Smalot\Docker\Dockerfile\Instruction;

/**
 * Class Run
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Run extends AbstractLayer
{
    /**
     * @var array
     */
    protected $commands;

    /**
     * @var array
     */
    protected $args;

    /**
     * @param string|array $commands
     * @param array $comments
     */
    public function __construct($commands, $comments = array())
    {
        parent::__construct($comments);

        $this->commands = (array) $commands;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'RUN ' . implode(" && \\\n    ", $this->commands);
    }
}
