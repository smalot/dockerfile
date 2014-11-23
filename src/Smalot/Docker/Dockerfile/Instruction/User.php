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
 * Class User
 * @package Smalot\Docker\Dockerfile\Instruction
 */
class User extends AbstractLayer
{
    /**
     * @var string
     */
    protected $user;

    /**
     * @param string $user
     * @param array $comments
     */
    public function __construct($user, $comments = array())
    {
        parent::__construct($comments);

        $this->user = $user;;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string|void
     */
    public function __toString()
    {
        return 'USER ' . escapeshellarg($this->user);
    }
}
