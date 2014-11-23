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
 * Class Run
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Run extends AbstractLayer
{
    /**
     * @var array
     */
    protected $commands;

    /**
     * @var array
     */
    protected $args;

    /**
     * @param string|array $commands
     * @param array $comments
     */
    public function __construct($commands, $comments = array())
    {
        parent::__construct($comments);

        $this->commands = (array)$commands;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'RUN ' . implode(" && \\\n    ", $this->commands);
    }
}
