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
 * Class Expose
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Expose extends AbstractLayer
{
    /**
     * @var array
     */
    protected $ports;

    /**
     * @param int|array $ports
     * @param array $comments
     */
    public function __construct($ports, $comments = array())
    {
        parent::__construct($comments);

        $this->ports = (array)$ports;
    }

    /**
     * @return array
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        $ports = array_map('intval', $this->ports);

        return 'EXPOSE ' . implode(' ', $ports);
    }
}
