<?php

namespace Smalot\Dockerfile;

use Smalot\Dockerfile\Source\ReaderInterface;
use Smalot\Dockerfile\Source\WriterInterface;

/**
 * Class Generator
 * @package Smalot\Dockerfile
 */
class Generator
{
    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param Dockerfile $dockerfile
     * @param WriterInterface $writer
     * @return bool
     */
    public function write(Dockerfile $dockerfile, WriterInterface $writer = null)
    {
        return $writer->write((string) $dockerfile);
    }

    /**
     * @param ReaderInterface $reader
     * @return Dockerfile
     */
    public function load(ReaderInterface $reader)
    {
        return Dockerfile::parse($reader->read());
    }

    /**
     * @param string $content
     * @return Dockerfile
     */
    protected function parse($content)
    {
        return new Dockerfile();
    }
}
