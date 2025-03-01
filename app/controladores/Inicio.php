<?php
class Inicio extends Controlador
{
  private $inicioModel;
  private $jsondb;

  public function __construct()
  {
    if (!isset($_SESSION['log']) || $_SESSION['log'] != 1) {
      header('Location: ' . BASE_URL . 'login/logout');
    }
    $this->inicioModel = $this->modelo('InicioModel');
    $this->jsondb = new JsonDB('sucursales');
  }
  public function index()
  {
    $this->vista('layout/header');
    $this->vista('layout/sidebar');
    $this->vista('layout/topbar');
    $this->vista('inicio/index');
    $this->vista('layout/footer');
    $this->vista('layout/script');
  }
  public function perfil(){
    
  }
  public function leersucursales(){
    $sucursales = $this->jsondb->leerTodo();
    echo json_encode(['success'=>true,'sucursales'=>$sucursales]);
  }
}
