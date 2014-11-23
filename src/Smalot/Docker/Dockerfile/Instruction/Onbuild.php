<?php

namespace Smalot\Docker\Dockerfile\Instruction;

/**
 * Class Onbuild
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Onbuild extends AbstractLayer
{
    /**
     * @var AbstractLayer
     */
    protected $layer;

    /**
     * @param AbstractLayer $layer
     * @param array $comments
     */
    public function __construct(AbstractLayer $layer, $comments = array())
    {
        parent::__construct($comments);

        $this->layer = $layer;
    }

    /**
     * @return AbstractLayer
     */
    public function getLayer()
    {
        return $this->layer;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'ONBUILD ' . (string) $this->layer;
    }
}
