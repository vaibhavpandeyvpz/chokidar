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
 * Class BlowfishHasher
 * @package Chokidar
 */
class BlowfishHasher extends HasherAbstract
{
    /**
     * @var int
     */
    protected $cost;

    /**
     * BlowfishHasher constructor.
     * @param int $cost
     */
    public function __construct($cost = 16)
    {
        $this->cost = $cost;
    }

    /**
     * {@inheritdoc}
     */
    public function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, array('cost' => $this->cost));
    }
}
