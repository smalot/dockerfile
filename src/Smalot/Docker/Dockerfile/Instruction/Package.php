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

namespace Smalot\Docker\Dockerfile\Instruction;

/**
 * Class Package
 * @package Smalot\Docker\Dockerfile\Instruction
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
