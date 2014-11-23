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
 * Interface WriterInterface
 * @package Smalot\Docker\Dockerfile\Source
 */
interface WriterInterface
{
    /**
     * @param string $content
     * @return bool
     * @throws \Exception
     */
    public function write($content);
}
