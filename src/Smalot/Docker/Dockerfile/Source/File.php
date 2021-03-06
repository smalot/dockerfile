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

namespace Smalot\Docker\Dockerfile\Source;

/**
 * Class File
 * @package Smalot\Docker\Dockerfile\Source
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
        return (bool)file_put_contents($this->file, $content);
    }

}
