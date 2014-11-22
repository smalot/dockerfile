<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class User
 * @package Smalot\Dockerfile\Instruction
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
