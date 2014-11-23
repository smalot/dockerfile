<?php

namespace Smalot\Docker\Dockerfile\Instruction;

/**
 * Class Workdir
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Workdir extends AbstractLayer
{
    /**
     * @var string
     */
    protected $dir;

    /**
     * @param string $dir
     * @param array $comments
     */
    public function __construct($dir, $comments = array())
    {
        parent::__construct($comments);

        $this->dir = $dir;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'WORKDIR ' . escapeshellarg($this->dir);
    }
}
