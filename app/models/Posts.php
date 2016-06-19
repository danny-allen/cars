<?php

class Posts extends AbstractModel
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
    public $title;

    /**
     *
     * @var string
     */
    public $slug;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var integer
     */
    public $users_id;

    /**
     *
     * @var integer
     */
    public $categories_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('users_id', 'Users', 'id', array('alias' => 'Users'));
        $this->belongsTo('categories_id', 'Categories', 'id', array('alias' => 'Categories'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'posts';
    }
}
