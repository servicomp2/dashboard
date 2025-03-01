<?php

class InicioModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
}