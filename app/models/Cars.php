<?php

class Cars extends AbstractModel
{

    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var int
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
     * @var int (decimal)
     */
    public $price;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var int
     */
    public $featured_image;


    /**
     * initialize
     *
     * Define relationships with other tables
     */
    public function initialize()
    {
        $this->hasOne("featured_image", "Resources", "id");
        $this->hasOne("make_id", "Makes", "id");
    }


    /**
     * getSource
     * 
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
     * Format the price to 2 decimal places
     * 
     * @return string Formatted price.
     */
    public function getFormattedPrice() {
        return "£" . number_format($this->price/100, 2, '.', ',');
    }


    /**
     * getTitle
     *
     * Cars don't really have a title, but if they did, it would be the
     * make and model
     * 
     * @return string Make and model concatenated.
     */
    public function getTitle() {
        return $this->makes->name . " " . $this->model;
    }
}