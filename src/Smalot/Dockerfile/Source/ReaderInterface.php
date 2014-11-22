<?php

namespace Smalot\Dockerfile\Source;

/**
 * Interface ReaderInterface
 * @package Smalot\Dockerfile\Source
 */
interface ReaderInterface {
    /**
     * @return string
     * @throws \Exception
     */
    public function read();
}
