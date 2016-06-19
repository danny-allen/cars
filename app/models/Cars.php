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


}