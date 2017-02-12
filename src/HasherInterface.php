<?php

/*
 * This file is part of vaibhavpandeyvpz/chokidar package.
 *
 * (c) Vaibhav Pandey <contact@vaibhavpandey.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.md.
 */

namespace Chokidar;

/**
 * Interface HasherInterface
 * @package Chokidar
 */
interface HasherInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function hash($password);

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function verify($password, $hash);
}
