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
