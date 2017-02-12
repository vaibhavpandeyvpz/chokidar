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
 * Interface AuthenticatorInterface
 * @package Chokidar
 */
interface AuthenticatorInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return UserInterface|false
     */
    public function authenticate($username, $password);

    /**
     * @param string $password
     * @return string
     */
    public function hash($password);

    /**
     * @param string $username
     * @return UserInterface|false
     */
    public function impersonate($username);

    /**
     * @param UserInterface $user
     * @param string $password
     * @return bool
     */
    public function verify(UserInterface $user, $password);
}
