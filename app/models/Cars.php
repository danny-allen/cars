<?php

use \Phalcon\Mvc\Model;

class Cars extends Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $make;

    /**
     *
     * @var string
     */
    public $model;

    /**
     *
     * @var string
     */
    public $color;

    /**
     *
     * @var string
     */
    public $price;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cars';
    }

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


}