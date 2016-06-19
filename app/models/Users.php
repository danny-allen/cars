<?php

use \Phalcon\Mvc\Model\Validator\Uniqueness;

class Users extends AbstractModel
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
    public $login;

    /**
     *
     * @var string
     */
    public $password;


    /**
     * validation
     *
     * Validate the login
     * 
     * @return boolean Whether the valiation failed or not
     */
    public function validation()
    {

        //make sure the login name is unique
        $this->validate(
            new Uniqueness([
                "field"   => "login",
                "message" => "The login must be unique"
            ])
        );
        return $this->validationHasFailed() != true;
    }


    /**
     * initialize
     * 
     * Identify db table relationships
     */
    public function initialize()
    {
        $this->hasMany('id', 'Posts', 'users_id', array('alias' => 'Posts'));
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
        return 'users';
    }
}
