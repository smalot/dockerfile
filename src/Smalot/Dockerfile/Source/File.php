<?php

namespace Smalot\Dockerfile\Source;

/**
 * Class File
 * @package Smalot\Dockerfile\Source
 */
class File implements ReaderInterface, WriterInterface
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function read()
    {
        return file_get_contents($this->file);
    }

    /**
     * @param string $content
     * @return bool
     * @throws \Exception
     */
    public function write($content)
    {
        return (bool) file_put_contents($this->file, $content);
    }

}
