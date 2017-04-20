<?php
/**
 * Created by PhpStorm.
 * User: fgoris
 * Date: 4/17/2017
 * Time: 4:54 PM
 */

namespace models;

class DB
{
    /**
     *
     */
    const USER = 'root';
    /**
     *
     */
    const HOST = 'localhost';
    /**
     *
     */
    const DATABASE  = 'ticket';
    /**
     *
     */
    const PASSWORD = '';

    /**
     * @return \PDO
     */
    public static function create()
    {
        return new \PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USER, self::PASSWORD);
    }
}