<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/ProyectoModel.php';
require_once BASE_PATH . '/app/models/ClienteModel.php';

class ProjectsController extends Controller {

    private $model;
    private $clienteModel;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
        $this->model = new ProyectoModel();
        $this->clienteModel = new ClienteModel();
    }

    public function index() {
        $proyectos = $this->model->findAllWithCliente();
        $this->view('projects/index', [
            'title'     => 'Proyectos',
            'active'    => 'projects',
            'proyectos' => $proyectos
        ]);
    }

    public function create() {
        $clientes = $this->clienteModel->findActivos();
        $this->view('projects/create', [
            'title'    => 'Nuevo Proyecto',
            'active'   => 'projects',
            'clientes' => $clientes
        ]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('projects');
        }

        $data = [
            'cliente_id'   => $_POST['cliente_id'] ?? null,
            'nombre'       => trim($_POST['nombre'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'estado'       => $_POST['estado'] ?? 'pendiente',
            'fecha_inicio' => $_POST['fecha_inicio'] ?? null,
            'fecha_fin'    => $_POST['fecha_fin'] ?: null,
            'presupuesto'  => $_POST['presupuesto'] ?: 0
        ];

        $this->model->create($data);
        $this->redirect('projects');
    }

    public function edit($id) {
        $proyecto = $this->model->findById($id);
        if (!$proyecto) $this->redirect('projects');

        $clientes = $this->clienteModel->findActivos();

        $this->view('projects/edit', [
            'title'    => 'Editar Proyecto',
            'active'   => 'projects',
            'proyecto' => $proyecto,
            'clientes' => $clientes
        ]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('projects');
        }

        $data = [
            'cliente_id'   => $_POST['cliente_id'] ?? null,
            'nombre'       => trim($_POST['nombre'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'estado'       => $_POST['estado'] ?? 'pendiente',
            'fecha_inicio' => $_POST['fecha_inicio'] ?? null,
            'fecha_fin'    => $_POST['fecha_fin'] ?: null,
            'presupuesto'  => $_POST['presupuesto'] ?: 0
        ];

        $this->model->update($id, $data);
        $this->redirect('projects');
    }

    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('projects');
    }

    public function show($id) {
        $proyecto = $this->model->findByIdWithCliente($id);
        if (!$proyecto) $this->redirect('projects');

        $this->view('projects/show', [
            'title'    => 'Detalle Proyecto',
            'active'   => 'projects',
            'proyecto' => $proyecto
        ]);
    }
}
