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
 * Class User
 * @package Chokidar
 */
class User implements UserInterface
{
    /**
     * @var array|object
     */
    protected $data;

    /**
     * User constructor.
     * @param array|object $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return is_object($this->data) ? $this->data->{$key} : $this->data[$key];
    }

    /**
     * @return array|object
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->getAttribute('username');
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->getAttribute('password');
    }
}
