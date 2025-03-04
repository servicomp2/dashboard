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
        if(count($datos) > 0)
        {
            extract($datos, EXTR_PREFIX_SAME, 'acg_');
        }

        // Pasar los datos a la vista sin usar extract()
        require_once $rutaVista;
    }
    public function respuesta(array $respuesta){
        echo json_encode($respuesta);
    }
    public function generarClave($longitudMinima = 8, $longitudMaxima = 12) {
        $mayusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $minusculas = 'abcdefghijklmnopqrstuvwxyz';
        $numeros = '0123456789';
        $especiales = '!@#$%&*()_+{}[]<>-';

        $todosLosCaracteres = $mayusculas . $minusculas . $numeros . $especiales;
        $longitud = random_int($longitudMinima, $longitudMaxima);
        $clave = '';

        // Aseguramos que haya al menos un carácter de cada tipo
        $clave .= $mayusculas[random_int(0, strlen($mayusculas) - 1)];
        $clave .= $minusculas[random_int(0, strlen($minusculas) - 1)];
        $clave .= $numeros[random_int(0, strlen($numeros) - 1)];
        $clave .= $especiales[random_int(0, strlen($especiales) - 1)];

        // Rellenamos el resto de la clave con caracteres aleatorios
        for ($i = 4; $i < $longitud; $i++) {
            $clave .= $todosLosCaracteres[random_int(0, strlen($todosLosCaracteres) - 1)];
        }

        // Mezclamos los caracteres para mayor aleatoriedad
        return str_shuffle($clave);
    }
}
