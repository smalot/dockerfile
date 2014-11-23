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
 * Class Add
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class Add extends AbstractLayer
{
    /**
     * @var array
     */
    protected $sources;

    /**
     * @var string
     */
    protected $destination;

    /**
     * @param array $sources
     * @param string $destination
     * @param array $comments
     */
    public function __construct($sources, $destination, $comments = array())
    {
        parent::__construct($comments);

        $this->sources = (array)$sources;
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return array
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        $sources = array_map('escapeshellarg', $this->sources);

        return 'ADD ' . implode(' ', $sources) . ' ' . escapeshellarg($this->destination);
    }
}
