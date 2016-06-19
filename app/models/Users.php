<?php

use \Phalcon\Mvc\Model;

class Users extends Model
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
            new Email(
                [
                    "field"   => "login",
                    "message" => "The email is not valid"
                ]
            )
        );

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

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
