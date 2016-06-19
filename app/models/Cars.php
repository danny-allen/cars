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
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $featured_image;


    public function initialize()
    {
        $this->hasOne("featured_image", "resources", "id");
    }

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
     * getFormattedPrice
     *
     * format the price to 2 decimal places
     * 
     * @return string
     */
    public function getFormattedPrice() {
        return "£".number_format($this->price/100, 2, '.', ',');
    }

    public function getTitle() {
        return $this->make . " " . $this->model;
    }


}