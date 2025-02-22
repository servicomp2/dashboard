<?php

class Core {
    protected $controladorActual = 'Login';
    protected $metodoActual = 'index';
    protected $parametros = [];

    public function __construct() {
        $url = $this->getUrl();
        
        // Controlador
        $controlador = isset($url[0]) ? ucwords($url[0]) : $this->controladorActual;
        unset($url[0]);
        
        if (!file_exists('../app/controladores/' . $controlador . '.php')) {
            $controlador = 'E404';
        }
        
        require_once '../app/controladores/' . $controlador . '.php';
        $this->controladorActual = new $controlador;
        
        // Método
        if (isset($url[1])) {
            if (method_exists($this->controladorActual, $url[1])) {
                $this->metodoActual = $url[1];
                unset($url[1]);
            } else {
                $this->metodoActual = 'e404';
            }
        }
        
        // Parámetros
        $this->parametros = $url ? array_values($url) : [];
        
        // Llamada al método
        call_user_func_array(
            [$this->controladorActual, $this->metodoActual],
            $this->parametros
        );
    }

    protected function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
