<?php

class Resources extends AbstractModel
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
    public $path;

    
    /**
     * getSource
     * 
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'resources';
    }
}
