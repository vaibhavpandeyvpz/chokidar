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
 * Class HasherAbstract
 * @package Chokidar
 */
abstract class HasherAbstract implements HasherInterface
{
    /**
     * {@inheritdoc}
     */
    public function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
