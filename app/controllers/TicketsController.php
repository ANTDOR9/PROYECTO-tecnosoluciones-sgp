<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/TicketModel.php';
require_once BASE_PATH . '/app/models/ClienteModel.php';
require_once BASE_PATH . '/app/models/ProyectoModel.php';

class TicketsController extends Controller {

    private $model;
    private $clienteModel;
    private $proyectoModel;

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
        $this->model = new TicketModel();
        $this->clienteModel = new ClienteModel();
        $this->proyectoModel = new ProyectoModel();
    }

    // Listar tickets
    public function index() {
        $tickets = $this->model->findAllWithInfo();
        $this->view('tickets/index', [
            'title'   => 'Tickets',
            'active'  => 'tickets',
            'tickets' => $tickets
        ]);
    }

    // Formulario crear
    public function create() {
        $clientes = $this->clienteModel->findActivos();
        $proyectos = $this->proyectoModel->findAllWithCliente();

        $this->view('tickets/create', [
            'title'     => 'Nuevo Ticket',
            'active'    => 'tickets',
            'clientes'  => $clientes,
            'proyectos' => $proyectos
        ]);
    }

    // Guardar nuevo ticket
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('tickets');
        }

        $data = [
            'cliente_id'  => $_POST['cliente_id'] ?? null,
            'proyecto_id' => $_POST['proyecto_id'] ?: null,
            'titulo'      => trim($_POST['titulo'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'estado'      => $_POST['estado'] ?? 'abierto',
            'prioridad'   => $_POST['prioridad'] ?? 'media'
        ];

        $this->model->create($data);
        $this->redirect('tickets');
    }

    // Formulario editar
    public function edit($id) {
        $ticket = $this->model->findById($id);
        if (!$ticket) $this->redirect('tickets');

        $clientes = $this->clienteModel->findActivos();
        $proyectos = $this->proyectoModel->findAllWithCliente();

        $this->view('tickets/edit', [
            'title'     => 'Editar Ticket',
            'active'    => 'tickets',
            'ticket'    => $ticket,
            'clientes'  => $clientes,
            'proyectos' => $proyectos
        ]);
    }

    // Guardar edicion
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('tickets');
        }

        $data = [
            'cliente_id'  => $_POST['cliente_id'] ?? null,
            'proyecto_id' => $_POST['proyecto_id'] ?: null,
            'titulo'      => trim($_POST['titulo'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'estado'      => $_POST['estado'] ?? 'abierto',
            'prioridad'   => $_POST['prioridad'] ?? 'media'
        ];

        $this->model->update($id, $data);
        $this->redirect('tickets');
    }

    // Eliminar ticket
    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('tickets');
    }

    // Ver detalle
    public function show($id) {
        $ticket = $this->model->findByIdWithInfo($id);
        if (!$ticket) $this->redirect('tickets');

        $this->view('tickets/show', [
            'title'  => 'Detalle Ticket',
            'active' => 'tickets',
            'ticket' => $ticket
        ]);
    }
}
