<?php

/**
 * @file    This file is part of Dockerfile generator.
 * @author  Sebastien MALOT <sebastien@malot.fr>
 * @license MIT
 * @url     <https://github.com/smalot/dockerfile>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Smalot\Docker\Dockerfile;

use Smalot\Docker\Dockerfile\Instruction\AbstractLayer;
use Smalot\Docker\Dockerfile\Source\ReaderInterface;
use Smalot\Docker\Dockerfile\Source\WriterInterface;

/**
 * Class Dockerfile
 * @package Smalot\Docker\Dockerfile
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
        $content = 'FROM ' . ($this->from ? $this->from : 'debian:latest') . "\n";

        if ($this->maintainer) {
            $content .= 'MAINTAINER ' . $this->maintainer . "\n";
        }

        foreach ($this->layers as $layer) {
            if ($comments = $layer->getComments()) {
                $content .= "\n# " . implode("\n# ", $comments) . "\n";
            }

            $content .= (string)$layer . "\n";
        }

        return $content;
    }

    /**
     * @param WriterInterface $writer
     * @return bool
     */
    public function write(WriterInterface $writer)
    {
        return $writer->write((string)$this);
    }

    /**
     * @param ReaderInterface $reader
     * @return Dockerfile
     */
    public static function parse(ReaderInterface $reader)
    {
        // TODO
        return new self();
    }
}
