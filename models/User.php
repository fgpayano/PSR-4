<?php

namespace models;

class User extends Model
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @return string
     */
    public function table()
    {
        return "users";
    }

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->data = [
            ['name' => 'Francis'],
            ['name' => 'Gregory'],
            ['name' => 'Bernabe']
        ];
    }

    public function add(Array $user)
    {
        array_push($this->data, $user);
    }
}