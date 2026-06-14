<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/TareaModel.php';
require_once BASE_PATH . '/app/models/ProyectoModel.php';
require_once BASE_PATH . '/app/models/UsuarioModel.php';

class TasksController extends Controller {

    private $model;
    private $proyectoModel;
    private $usuarioModel;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
        $this->model = new TareaModel();
        $this->proyectoModel = new ProyectoModel();
        $this->usuarioModel = new UsuarioModel();
    }

    // Listar tareas
    public function index() {
        $tareas = $this->model->findAllWithInfo();
        $this->view('tasks/index', [
            'title'  => 'Tareas',
            'active' => 'tasks',
            'tareas' => $tareas
        ]);
    }

    // Formulario crear
    public function create() {
        $proyectos = $this->proyectoModel->findAllWithCliente();
        $usuarios  = $this->usuarioModel->findAll();

        $this->view('tasks/create', [
            'title'     => 'Nueva Tarea',
            'active'    => 'tasks',
            'proyectos' => $proyectos,
            'usuarios'  => $usuarios
        ]);
    }

    // Guardar nueva tarea
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('tasks');
        }

        $data = [
            'proyecto_id'  => $_POST['proyecto_id'] ?? null,
            'usuario_id'   => $_POST['usuario_id'] ?: null,
            'titulo'       => trim($_POST['titulo'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'estado'       => $_POST['estado'] ?? 'pendiente',
            'prioridad'    => $_POST['prioridad'] ?? 'media',
            'fecha_limite' => $_POST['fecha_limite'] ?: null
        ];

        $this->model->create($data);
        $this->redirect('tasks');
    }

    // Formulario editar
    public function edit($id) {
        $tarea = $this->model->findById($id);
        if (!$tarea) $this->redirect('tasks');

        $proyectos = $this->proyectoModel->findAllWithCliente();
        $usuarios  = $this->usuarioModel->findAll();

        $this->view('tasks/edit', [
            'title'     => 'Editar Tarea',
            'active'    => 'tasks',
            'tarea'     => $tarea,
            'proyectos' => $proyectos,
            'usuarios'  => $usuarios
        ]);
    }

    // Guardar edicion
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('tasks');
        }

        $data = [
            'proyecto_id'  => $_POST['proyecto_id'] ?? null,
            'usuario_id'   => $_POST['usuario_id'] ?: null,
            'titulo'       => trim($_POST['titulo'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'estado'       => $_POST['estado'] ?? 'pendiente',
            'prioridad'    => $_POST['prioridad'] ?? 'media',
            'fecha_limite' => $_POST['fecha_limite'] ?: null
        ];

        $this->model->update($id, $data);
        $this->redirect('tasks');
    }

    // Eliminar tarea
    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('tasks');
    }

    // Cambiar estado via AJAX (para Kanban)
    public function updateEstado() {
        header('Content-Type: application/json');

        $id     = $_POST['id'] ?? null;
        $estado = $_POST['estado'] ?? null;

        if (!$id || !$estado) {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
            return;
        }

        $this->model->updateEstado($id, $estado);
        echo json_encode(['success' => true]);
    }
}
