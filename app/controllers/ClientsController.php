<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/ClienteModel.php';

class ClientsController extends Controller {

    private $model;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
        $this->model = new ClienteModel();
    }

    // Listar clientes
    public function index() {
        $clientes = $this->model->findActivos();
        $this->view('clients/index', [
            'title'    => 'Clientes',
            'active'   => 'clients',
            'clientes' => $clientes
        ]);
    }

    // Formulario crear
    public function create() {
        $this->view('clients/create', [
            'title'  => 'Nuevo Cliente',
            'active' => 'clients'
        ]);
    }

    // Guardar nuevo cliente
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('clients');
        }

        $data = [
            'nombre'    => trim($_POST['nombre'] ?? ''),
            'empresa'   => trim($_POST['empresa'] ?? ''),
            'email'     => trim($_POST['email'] ?? ''),
            'telefono'  => trim($_POST['telefono'] ?? ''),
            'direccion' => trim($_POST['direccion'] ?? '')
        ];

        $this->model->create($data);
        $this->redirect('clients');
    }

    // Formulario editar
    public function edit($id) {
        $cliente = $this->model->findById($id);
        if (!$cliente) $this->redirect('clients');

        $this->view('clients/edit', [
            'title'   => 'Editar Cliente',
            'active'  => 'clients',
            'cliente' => $cliente
        ]);
    }

    // Guardar edicion
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('clients');
        }

        $data = [
            'nombre'    => trim($_POST['nombre'] ?? ''),
            'empresa'   => trim($_POST['empresa'] ?? ''),
            'email'     => trim($_POST['email'] ?? ''),
            'telefono'  => trim($_POST['telefono'] ?? ''),
            'direccion' => trim($_POST['direccion'] ?? '')
        ];

        $this->model->update($id, $data);
        $this->redirect('clients');
    }

    // Eliminar cliente
    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('clients');
    }

    // Ver detalle
    public function show($id) {
        $cliente = $this->model->findById($id);
        if (!$cliente) $this->redirect('clients');

        $this->view('clients/show', [
            'title'   => 'Detalle Cliente',
            'active'  => 'clients',
            'cliente' => $cliente
        ]);
    }
}
