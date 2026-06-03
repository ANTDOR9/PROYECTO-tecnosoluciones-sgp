<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/UsuarioModel.php';

class AuthController extends Controller {

    public function login() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (isset($_SESSION['usuario_id'])) {
            $this->redirect('home');
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            $model   = new UsuarioModel();
            $usuario = $model->findByEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id']     = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_rol']    = $usuario['rol'];
                $this->redirect('home');
            } else {
                $error = 'Correo o contraseña incorrectos.';
            }
        }

        $this->view('auth/login', [
            'title' => 'Iniciar Sesion',
            'error' => $error
        ]);
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        $this->redirect('auth/login');
    }
}
