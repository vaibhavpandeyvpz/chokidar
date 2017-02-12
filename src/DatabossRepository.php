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

use Databoss\ConnectionInterface;

/**
 * Class DatabossRepository
 * @package Chokidar
 */
class DatabossRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var ConnectionInterface
     */
    protected $db;

    /**
     * @var string
     */
    protected $table;

    /**
     * DatabossRepository constructor.
     * @param ConnectionInterface $db
     * @param string $table
     * @param string $column
     */
    public function __construct(ConnectionInterface $db, $table = 'users', $column = 'username')
    {
        $this->db = $db;
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * {@inheritdoc}
     */
    public function find($username)
    {
        $user = $this->db->first($this->table, array($this->column => $username));
        if (false !== $user) {
            return new User($user);
        }
        return $user;
    }
}
