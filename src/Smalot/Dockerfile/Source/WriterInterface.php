<?php

namespace Smalot\Dockerfile\Source;

/**
 * Interface WriterInterface
 * @package Smalot\Dockerfile\Source
 */
interface WriterInterface {
    /**
     * @param string $content
     * @return bool
     * @throws \Exception
     */
    public function write($content);
}
