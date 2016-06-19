<?php

class Categories extends AbstractModel
{

    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $slug;


    /**
     * initialize
     * 
     * Define relationships with other tables
     */
    public function initialize()
    {
        $this->hasMany('id', 'Posts', 'categories_id', array('alias' => 'Posts'));
        $this->hasMany('id', 'Posts', 'categories_id', NULL);
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
        return 'categories';
    }
}
