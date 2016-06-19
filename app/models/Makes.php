<?php

class Makes extends AbstractModel
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
    public $name;

    /**
     *
     * @var string
     */
    public $slug;

    
    /**
     * getSource
     * 
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'makes';
    }
}
