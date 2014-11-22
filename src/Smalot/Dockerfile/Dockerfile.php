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
    protected $from;

    /**
     * @var string
     */
    protected $maintainer;

    /**
     * @var AbstractLayer[]
     */
    protected $layers;

    /**
     * @param string $from
     * @param string $maintainer
     */
    public function __construct($from = '', $maintainer = '')
    {
        $this->from = $from;
        $this->maintainer = $maintainer;

        $this->layers = array();
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getMaintainer()
    {
        return $this->maintainer;
    }

    /**
     * @param string $maintainer
     */
    public function setMaintainer($maintainer)
    {
        $this->maintainer = $maintainer;
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
        if (!$this->from) {
            throw new \InvalidArgumentException('Missing "FROM" instruction.');
        }

        $content = 'FROM ' . $this->from . "\n";

        if ($this->maintainer) {
            $content .= 'MAINTAINER ' . $this->maintainer . "\n";
        }

        foreach ($this->layers as $layer) {
            $content .= "\n# " . implode("\n# ", $layer->getComments()) . "\n";
            $content .= (string) $layer . "\n";
        }

        $content .= "\n" . implode("\n\n", $this->getLayers());

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
