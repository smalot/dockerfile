<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Run
 * @package Smalot\Dockerfile\Instruction
 */
class Run extends AbstractLayer
{
    /**
     * @var array
     */
    protected $commands;
    /**
     * @param array $commands
     * @param array $comments
     */
    public function __construct($commands, $comments = array())
    {
        parent::__construct($comments);

        $this->commands = $commands;
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
        $commands = array_map('escapeshellcmd', $this->commands);

        $content = parent::__toString() . "\n";
        $content .= 'RUN ' . implode(' && ', $commands);

        return trim($content);
    }
}
