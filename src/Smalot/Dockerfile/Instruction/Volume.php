<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Volume
 * @package Smalot\Dockerfile\Instruction
 */
class Volume extends AbstractLayer
{
    /**
     * @var array
     */
    protected $volumes;

    /**
     * @param string|array $volumes
     * @param array $comments
     */
    public function __construct($volumes, $comments = array())
    {
        parent::__construct($comments);

        $this->volumes = (array) $volumes;
    }

    /**
     * @return array
     */
    public function getVolumes()
    {
        return $this->volumes;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        $volumes = array_map('escapeshellarg', $this->volumes);

        return 'VOLUME ' . implode(' ' , $volumes);
    }
}
