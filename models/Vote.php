<?php
/**
 * Created by PhpStorm.
 * User: fgoris
 * Date: 4/18/2017
 * Time: 12:16 PM
 */

namespace models;

/**
 * Class Vote
 * @package models
 */
class Vote extends Model
{
    /**
     * @return string
     */
    public function table()
    {
        return "votes";
    }

    /**
     * Ticket constructor.
     */
    public function __construct($db)
    {
        parent::__construct($db);
    }

}