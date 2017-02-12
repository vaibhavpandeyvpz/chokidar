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
 * Class Authenticator
 * @package Chokidar
 */
class Authenticator implements AuthenticatorInterface
{
    /**
     * @var HasherInterface|null
     */
    protected $hasher;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * Authenticator constructor.
     * @param RepositoryInterface $repository
     * @param HasherInterface|null $hasher
     */
    public function __construct(RepositoryInterface $repository, HasherInterface $hasher = null)
    {
        $this->repository = $repository;
        $this->hasher = $hasher ?: new BlowfishHasher();
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate($username, $password)
    {
        $user = $this->repository->find($username);
        return ($user instanceof UserInterface) && $this->verify($user, $password) ? $user : false;
    }

    /**
     * {@inheritdoc}
     */
    public function hash($password)
    {
        return $this->hasher->hash($password);
    }

    /**
     * {@inheritdoc}
     */
    public function impersonate($username)
    {
        return $this->repository->find($username);
    }

    /**
     * {@inheritdoc}
     */
    public function verify(UserInterface $user, $password)
    {
        return $this->hasher->verify($password, $user->getPassword());
    }
}
