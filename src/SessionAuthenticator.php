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
 * Class SessionAuthenticator
 * @package Chokidar
 */
class SessionAuthenticator extends Authenticator
{
    const STORAGE_NAMESPACE = __NAMESPACE__;

    const STORAGE_KEY = 'username';

    /**
     * @var array
     */
    protected $storage;

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * SessionAuthenticator constructor.
     * @param RepositoryInterface $repository
     * @param HasherInterface|null $hasher
     */
    public function __construct(RepositoryInterface $repository, HasherInterface $hasher = null)
    {
        parent::__construct($repository, $hasher);
        if (empty($_SESSION[self::STORAGE_NAMESPACE])) {
            $_SESSION[self::STORAGE_NAMESPACE] = array();
        }
        $this->storage = &$_SESSION[self::STORAGE_NAMESPACE];
        if (isset($this->storage[self::STORAGE_KEY])) {
            $this->impersonate($this->storage[self::STORAGE_KEY]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate($username, $password)
    {
        $user = parent::authenticate($username, $password);
        if ($user instanceof UserInterface) {
            $this->storage[self::STORAGE_KEY] = $user->getUsername();
            $this->user = $user;
        }
        return $user;
    }

    /**
     * @return bool
     */
    public function check()
    {
        return $this->user instanceof UserInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function impersonate($username)
    {
        $user = parent::impersonate($username);
        if ($user instanceof UserInterface) {
            $this->storage[self::STORAGE_KEY] = $user->getUsername();
            $this->user = $user;
        }
        return $user;
    }

    public function logout()
    {
        unset($this->storage[self::STORAGE_KEY]);
        $this->user = false;
    }
}
