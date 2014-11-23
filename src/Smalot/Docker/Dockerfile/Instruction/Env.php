<?php

namespace Smalot\Docker\Dockerfile\Instruction;

/**
 * Class Env
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Env extends AbstractLayer
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $name
     * @param string $value
     * @param array $comments
     */
    public function __construct($name, $value, $comments = array())
    {
        parent::__construct($comments);

        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'ENV ' . escapeshellarg($this->name) . ' ' . escapeshellarg($this->value);
    }
}
