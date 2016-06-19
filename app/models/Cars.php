<?php

class Cars extends AbstractModel
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


}