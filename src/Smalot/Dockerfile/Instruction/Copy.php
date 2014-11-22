<?php

namespace Smalot\Dockerfile\Instruction;

/**
 * Class Copy
 * @package Smalot\Dockerfile\Instruction
 */
class Copy extends AbstractLayer
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

        return 'COPY ' . implode(' ', $sources) . ' ' . escapeshellarg($this->destination);
    }
}
