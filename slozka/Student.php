<?php

class Student extends Clovek
{
    public function __construct($jmeno, public $obor)
    {
        //var_dump($this->jmeno); null
        parent::__construct($jmeno);
        //var_dump($this->jmeno); Standa
    }
}