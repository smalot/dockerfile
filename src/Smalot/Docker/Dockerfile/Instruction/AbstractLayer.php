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
 * Class AbstractLayer
 * @package Smalot\Docker\Dockerfile\Instruction
 */
abstract class AbstractLayer
{
    /**
     * @var array
     */
    protected $comments;

    /**
     * @param array $comments
     */
    public function __construct($comments = array())
    {
        $this->comments = (array)$comments;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}
