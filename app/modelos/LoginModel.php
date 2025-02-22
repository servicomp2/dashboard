<?php

class LoginModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
    public function autenticado($email){
        $sql = "SELECT * FROM autenticados WHERE email = '$email'";
        $this->db->query($sql);
        return $this->db->rowsCount();
    }
    public function getUsuario($email){
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $this->db->query($sql);
        return $this->db->fetchArray();
    }
    public function setUsuario($nombre,$correo,$clave,$codigo){
        $sql = "INSERT INTO usuarios(nombre,correo,clave,codigo,verifica,activo,acceso) VALUES(:nombre,:correo,:clave,:cod,'',0,100)";
        $this->db->query($sql);
        $this->db->bind(':nombre',$nombre);
        $this->db->bind(':correo',$correo);
        $this->db->bind(':clave',$clave);
        $this->db->bind(':cod',$codigo);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}