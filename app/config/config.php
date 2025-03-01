<?php
    //Ruta física de la carpeta app
    define('RUTA_APP', dirname(dirname(__FILE__)));
    //Ruta de la aplicacion, dominio
    define('BASE_URL', 'http://localhost/dashboard/');
    //Nombre de la aplicacion
    define('NOMBRE_APP', 'Dashboard de Clientes');

    //base de datos
    //Host
    define('DB_HOST', 'localhost');
    //Usuario
    define('DB_USER', 'root');
    //Contraseña
    define('DB_PASS', '');
    //Base de datos
    define('DB_DATA', 'dashboard');
    //Puerto
    define('DB_PORT', '3306');

    // Rutas de archivos
    define('RUTA_DATOS', RUTA_APP . DIRECTORY_SEPARATOR . 'datos' . DIRECTORY_SEPARATOR);
    define('RUTA_UPLOADS', dirname(RUTA_APP) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR);