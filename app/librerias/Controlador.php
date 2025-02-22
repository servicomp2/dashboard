<?php

class Controlador
{
    protected $rutaModelos = '../app/modelos/';
    protected $rutaVistas = '../app/vistas/';

    public function modelo(string $modelo): object
    {
        $rutaModelo = $this->rutaModelos . $modelo . '.php';

        if (!file_exists($rutaModelo)) {
            throw new Exception("Error 404: El modelo '{$modelo}' no existe.");
        }

        require_once $rutaModelo;

        if (!class_exists($modelo)) {
            throw new Exception("Error: La clase '{$modelo}' no está definida.");
        }

        return new $modelo();
    }

    public function vista(string $vista, array $datos = []): void
    {
        $rutaVista = $this->rutaVistas . $vista . '.php';

        if (!file_exists($rutaVista)) {
            throw new Exception("Error 404: La vista '{$vista}' no existe.");
        }

        // Pasar los datos a la vista sin usar extract()
        require_once $rutaVista;
    }
}
