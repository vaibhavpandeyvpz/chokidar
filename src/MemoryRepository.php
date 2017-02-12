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
 * Class MemoryRepository
 * @package Chokidar
 */
class MemoryRepository implements RepositoryInterface
{
    /**
     * @var array
     */
    protected $users;

    /**
     * MemoryRepository constructor.
     * @param array $users
     */
    public function __construct(array $users)
    {
        foreach ($users as $username => $user) {
            if ($user instanceof UserInterface) {
                continue;
            }
            throw new \InvalidArgumentException(sprintf(
                'User must be an instance of "%s"; "%s" given',
                'Chokidar\\UserInterface',
                is_object($user) ? get_class($user) : gettype($user)
            ));
        }
        $this->users = $users;
    }

    /**
     * {@inheritdoc}
     */
    public function find($username)
    {
        return isset($this->users[$username]) ? $this->users[$username] : false;
    }
}
