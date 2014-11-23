<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Package
 * @package Smalot\Dockerfile\Instruction
 */
class Package extends AbstractLayer
{
    /**
     * @var array
     */
    protected $packages;

    /**
     * @param array $packages
     * @param array $comments
     */
    public function __construct($packages, $comments = array())
    {
        parent::__construct($comments);

        $this->packages = $packages;
    }

    /**
     * @return array
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y ' . implode(
            ' ',
            $this->packages
        );
    }
}
