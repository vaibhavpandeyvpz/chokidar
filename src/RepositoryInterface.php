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
 * Interface RepositoryInterface
 * @package Chokidar
 */
interface RepositoryInterface
{
    /**
     * @param string $username
     * @return UserInterface|false
     */
    public function find($username);
}
