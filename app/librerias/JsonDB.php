<?php
class JsonDB
{
  private $filePath;

  public function __construct($fileName)
  {
    $this->filePath = RUTA_DATOS . $fileName . '.json';
    if (!file_exists($this->filePath)) {
      file_put_contents($this->filePath, '[]');
    }
  }
  public function leerTodo()
  {
    $data = file_get_contents($this->filePath);
    return json_decode($data, true);
  }
  public function buscar($campo, $valor)
  {
    $data = $this->leerTodo();
    return array_filter($data, function ($item) use ($campo, $valor) {
      return $item[$campo] == $valor;
    });
  }
  private function obtenerUltimoId($data)
  {
    if (empty($data)) {
      return 0;
    }
    $ids = array_column($data, 'id');
    return max($ids);
  }
  public function crear($nuevoRegistro)
  {
    $data = $this->leerTodo();

    // Asignar ID autoincremental si no viene en el registro
    if (!isset($nuevoRegistro['id'])) {
      $nuevoRegistro['id'] = $this->obtenerUltimoId($data) + 1;
    } else {
      // Verificar si el ID ya existe
      $idExistente = array_filter($data, function ($item) use ($nuevoRegistro) {
        return $item['id'] == $nuevoRegistro['id'];
      });
      if (!empty($idExistente)) {
        throw new Exception("El ID ya existe en la base de datos");
      }
    }

    $data[] = $nuevoRegistro;
    return $this->guardar($data);
  }
  public function actualizar($campo, $valor, $nuevosDatos)
  {
    $data = $this->leerTodo();
    foreach ($data as &$item) {
      if ($item[$campo] == $valor) {
        $item = array_merge($item, $nuevosDatos);
      }
    }
    return $this->guardar($data);
  }
  public function eliminar($campo, $valor)
  {
    $data = $this->leerTodo();
    $data = array_filter($data, function ($item) use ($campo, $valor) {
      return $item[$campo] != $valor;
    });
    return $this->guardar($data);
  }
  public function buscarPorId($id)
  {
    $data = $this->leerTodo();
    foreach ($data as $item) {
      if ($item['id'] == $id) {
        return $item;
      }
    }
    return null;
  }
  private function guardar($data)
  {
    return file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
  }
}
