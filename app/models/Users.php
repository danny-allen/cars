<?php

use \Phalcon\Mvc\Model\Validator\Uniqueness;

class Users extends AbstractModel
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
    public $login;

    /**
     *
     * @var string
     */
    public $password;

    /**
     * validate
     * 
     * @return [type] [description]
     */
    public function validation()
    {

        $this->validate(
            new Uniqueness(
                [
                    "field"   => "login",
                    "message" => "The login must be unique"
                ]
            )
        );

        return $this->validationHasFailed() != true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Posts', 'users_id', array('alias' => 'Posts'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }
}
