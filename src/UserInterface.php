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
 * Interface UserInterface
 * @package Chokidar
 */
interface UserInterface
{
    /**
     * @return string
     */
    public function getUsername();

    /**
     * @return string
     */
    public function getPassword();
}
