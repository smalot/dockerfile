<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class AbstractLayer
 * @package Smalot\Dockerfile\Instruction
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
        $this->comments = (array) $comments;
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
