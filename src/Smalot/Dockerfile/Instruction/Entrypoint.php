<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Entrypoint
 * @package Smalot\Dockerfile\Instruction
 */
class Entrypoint extends AbstractLayer
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $args;

    /**
     * @param string $command
     * @param array $args
     * @param array $comments
     */
    public function __construct($command, $args = array(), $comments = array())
    {
        parent::__construct($comments);

        $this->command = $command;
        $this->args = $args;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        $command = escapeshellcmd($this->command);
        $args = array_map('escapeshellarg', $this->args);

        return 'ENTRYPOINT ' . $command . ' ' . implode(' ', $args);
    }
}
