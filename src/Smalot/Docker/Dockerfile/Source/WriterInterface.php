<?php

namespace Smalot\Docker\Dockerfile\Source;

/**
 * Interface WriterInterface
 * @package Smalot\Docker\Dockerfile\Source
 */
interface WriterInterface {
    /**
     * @param string $content
     * @return bool
     * @throws \Exception
     */
    public function write($content);
}
