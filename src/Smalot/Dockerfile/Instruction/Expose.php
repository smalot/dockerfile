<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Expose
 * @package Smalot\Dockerfile\Instruction
 */
class Expose extends AbstractLayer
{
    /**
     * @var array
     */
    protected $ports;

    /**
     * @param int|array $ports
     * @param array $comments
     */
    public function __construct($ports, $comments = array())
    {
        parent::__construct($comments);

        $this->ports = (array) $ports;
    }

    /**
     * @return array
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        $ports = array_map('intval', $this->ports);

        return 'EXPOSE ' . implode(' ' , $ports);
    }
}
