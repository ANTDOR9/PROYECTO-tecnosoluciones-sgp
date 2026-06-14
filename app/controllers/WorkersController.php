<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/UsuarioModel.php';

class WorkersController extends Controller {

    private $model;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
        $this->model = new UsuarioModel();
    }

    // Listar trabajadores
    public function index() {
        $workers = $this->model->findAllWorkers();
        $this->view('workers/index', [
            'title'   => 'Trabajadores',
            'active'  => 'workers',
            'workers' => $workers
        ]);
    }

    // Formulario crear
    public function create() {
        $this->view('workers/create', [
            'title'  => 'Nuevo Trabajador',
            'active' => 'workers'
        ]);
    }

    // Guardar nuevo trabajador
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('workers');
        }

        $data = [
            'nombre'   => trim($_POST['nombre'] ?? ''),
            'email'    => trim($_POST['email'] ?? ''),
            'password' => password_hash($_POST['password'] ?? 'temporal123', PASSWORD_DEFAULT),
            'rol'      => $_POST['rol'] ?? 'developer',
            'activo'   => 1
        ];

        // Validar email duplicado
        if ($this->model->findByEmail($data['email'])) {
            $_SESSION['error_worker'] = 'Ya existe un usuario con ese email.';
            $this->redirect('workers/create');
        }

        $this->model->create($data);
        $this->redirect('workers');
    }

    // Formulario editar
    public function edit($id) {
        $worker = $this->model->findById($id);
        if (!$worker) $this->redirect('workers');

        $this->view('workers/edit', [
            'title'  => 'Editar Trabajador',
            'active' => 'workers',
            'worker' => $worker
        ]);
    }

    // Guardar edicion
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('workers');
        }

        $data = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'email'  => trim($_POST['email'] ?? ''),
            'rol'    => $_POST['rol'] ?? 'developer',
            'activo' => isset($_POST['activo']) ? 1 : 0
        ];

        $this->model->update($id, $data);

        // Si se proporciono nueva contraseña
        if (!empty($_POST['password'])) {
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->model->updatePassword($id, $hashed);
        }

        $this->redirect('workers');
    }

    // Eliminar trabajador
    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('workers');
    }
}
