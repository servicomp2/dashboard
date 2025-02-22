<?php
class Login extends Controlador
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = $this->modelo('LoginModel');
    }

    public function index()
    {
        $this->vista('login/index');
    }
    public function login()
    {
        $email = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['clave'];
        $autenticado = $this->loginModel->autenticado($email);
        if ($autenticado > 0) {
            $usuario = $this->loginModel->getUsuario($email);
            if ($usuario[0]['activo'] == 0) {
                echo json_encode(['success' => false, 'message' => 'Usuario inactivo o no registrado']);
            } else {
                if ($usuario[0]['codigo'] != $usuario[0]['verifica']) {
                    echo json_encode(['success' => false, 'message' => 'Usuario no verificado']);
                } else {
                    if (password_verify($password, $usuario[0]['clave'])) {
                        $_SESSION['idUsuario'] = $usuario[0]['id'];
                        $_SESSION['nombreUsuario'] = $usuario[0]['nombre'];
                        $_SESSION['emailUsuario'] = $usuario[0]['correo'];
                        $_SESSION['accesoUsuario'] = $usuario[0]['acceso'];
                        $_SESSION['log'] = 1;
                        echo json_encode(['success' => true, 'message' => '']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Usuario no autenticado o no registrado']);
                    }
                }
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
        }
    }
    public function logout()
    {
        session_destroy();
        header('location:' . BASE_URL);
    }
    public function registro()
    {
        $this->vista('login/registro');
    }
    public function registrar()
    {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_ADD_SLASHES);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $clave = password_hash($password, PASSWORD_DEFAULT);
        if ($this->loginModel->autenticado($email) == 0) {
            echo json_encode(['success' => false, 'message' => 'No posee los permisos para registrarse en la aplicación.']);
        } else {
            if (count($this->loginModel->getUsuario($email)) > 0) {
                echo json_encode(['success' => false, 'message' => 'Este email ya se encuentra registrado.']);
            } else {
                $codigo = rand(10000000, 99999999);
                if ($this->loginModel->setUsuario($nombre, $email, $clave, $codigo)) {
                    //Agregar sentencia de envio de Correo Electrónico con el codigo de verificación
                    echo json_encode(['success' => true, 'message' => '']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario - 450.']);
                }
            }
        }
    }
    public function forgot()
    {
        $this->vista('login/forgot');
    }
}
