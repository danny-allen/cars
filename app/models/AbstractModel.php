<?php

use Phalcon\Mvc\Model;

abstract class AbstractModel extends Model implements iModel
{
    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cars[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cars
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
