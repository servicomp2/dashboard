<?php
class Inicio extends Controlador
{
    private $inicioModel;

    public function __construct()
    {
      if(!isset($_SESSION['log']) || $_SESSION['log'] != 1){
        header('Location: '.BASE_URL.'login/logout');
      }
      $this->inicioModel = $this->modelo('InicioModel');
    }
    public function index(){
      echo $_SESSION['nombreUsuario'];
    }
}