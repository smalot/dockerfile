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
 * Class Volume
 * @package Smalot\Docker\Dockerfile\Instruction
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

        $this->volumes = (array)$volumes;
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

        return 'VOLUME ' . implode(' ', $volumes);
    }
}
