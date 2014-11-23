<?php

namespace Smalot\Docker\Dockerfile\Source;

/**
 * Interface ReaderInterface
 * @package Smalot\Docker\Dockerfile\Source
 */
interface ReaderInterface {
    /**
     * @return string
     * @throws \Exception
     */
    public function read();
}
