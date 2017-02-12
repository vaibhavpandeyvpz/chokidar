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
 * Class SimpleHasher
 * @package Chokidar
 */
class SimpleHasher implements HasherInterface
{
    /**
     * @var string
     */
    protected $algorithm;

    /**
     * SimpleHasher constructor.
     * @param string $algorithm
     */
    public function __construct($algorithm = 'md5')
    {
        $this->algorithm = $algorithm;
    }

    /**
     * {@inheritdoc}
     */
    public function hash($password)
    {
        return hash($this->algorithm, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function verify($password, $hash)
    {
        return $hash === $this->hash($password);
    }
}
