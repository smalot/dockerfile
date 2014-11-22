<?php

namespace Smalot\Dockerfile;

use Smalot\Dockerfile\Instruction\AbstractLayer;

/**
 * Class Dockerfile
 * @package Smalot\Dockerfile
 */
class Dockerfile
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var AbstractLayer[]
     */
    protected $layers;

    /**
     * @param string $name
     */
    public function __construct($name = '')
    {
        $this->name = '';
        $this->layers = array();
    }

    /**
     * @param AbstractLayer $layer
     * @return $this
     */
    public function addLayer(AbstractLayer $layer)
    {
        $this->layers[] = $layer;

        return $this;
    }

    /**
     * @return AbstractLayer[]
     */
    public function getLayers()
    {
        return $this->layers;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $content = implode("\n\n", (string) $this->getLayers());

        return $content;
    }

    /**
     * @param $content
     * @return Dockerfile
     */
    public static function parse($content)
    {
        return new self();
    }
}
