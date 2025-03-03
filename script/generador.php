<?php
// scripts/generator.php

if (php_sapi_name() !== 'cli') {
    die('Este script solo puede ser ejecutado desde la terminal.');
}

if ($argc < 3) {
    die("Uso: php generator.php [controller|model] Nombre\n");
}

$type = strtolower($argv[1]);
$name = $argv[2];

$basePath = __DIR__ . '/../app/';

switch ($type) {
    case 'controlador':
        generateController($name, $basePath);
        break;
    case 'modelo':
        generateModel($name, $basePath);
        break;
    default:
        die("Tipo no válido. Usa 'controlador' o 'modelo'.\n");
}

function generateController($name, $basePath) {
    $controllerPath = $basePath . 'controladores/' . ucfirst($name) . '.php';
    if (file_exists($controllerPath)) {
        die("El controlador ya existe.\n");
    }

    $template = "<?php\n\n"
              . "class " . ucfirst($name) . " extends Controlador\n"
              . "{\n"
              . '    private $'. strtolower($name) .'Model;'."\n"
              . "    public function __construct()\n"
              . "    {\n"
              . '      $this->'. strtolower($name) .'Model = $this->modelo("'. ucfirst($name) .'Model");'."\n"
              . "    }\n"
              . "    public function index()\n"
              . "    {\n"
              . "        // Lógica del método index\n"
              . "    }\n"
              . "}\n";

    file_put_contents($controllerPath, $template);
    echo "Controlador creado exitosamente en: $controllerPath\n";
    generateModel($name, $basePath);
}

function generateModel($name, $basePath) {
    $modelPath = $basePath . 'modelos/' . ucfirst($name) . 'Model.php';
    if (file_exists($modelPath)) {
        die("El modelo ya existe.\n");
    }

    $template = "<?php\n\n"
              . "class " . ucfirst($name) . "Model\n"
              . "{\n"
              . '    private $db;'."\n"
              . '    public function __construct()'."\n"
              . '    {'."\n"
              . '        $this->db = new Base;'."\n"
              . '    }'."\n"
              . "}\n";

    file_put_contents($modelPath, $template);
    echo "Modelo creado exitosamente en: $modelPath\n";
}
