<?php

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/app/models/ClienteModel.php';
require_once BASE_PATH . '/app/models/ProyectoModel.php';
require_once BASE_PATH . '/app/models/TareaModel.php';
require_once BASE_PATH . '/app/models/UsuarioModel.php';

class HomeController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
    }

    public function index() {
        $clienteModel  = new ClienteModel();
        $proyectoModel = new ProyectoModel();
        $tareaModel    = new TareaModel();
        $usuarioModel  = new UsuarioModel();

        // KPIs
        $totalClientes  = $clienteModel->countAll();
        $totalProyectos = $proyectoModel->countAll();
        $tareasPendientes = $tareaModel->countPendientes();
        $equipoActivo = $usuarioModel->countActivos();

        $proyectosPendientes  = $proyectoModel->countByEstado('pendiente');
        $proyectosEnProgreso  = $proyectoModel->countByEstado('en_progreso');
        $proyectosCompletados = $proyectoModel->countByEstado('completado');
        $proyectosCancelados  = $proyectoModel->countByEstado('cancelado');

        // Proyectos recientes
        $proyectosRecientes = $proyectoModel->findRecientes(5);

        $this->view('dashboard/index', [
            'title'  => 'Dashboard',
            'active' => 'dashboard',

            'totalClientes'    => $totalClientes,
            'totalProyectos'   => $totalProyectos,
            'tareasPendientes' => $tareasPendientes,
            'equipoActivo'     => $equipoActivo,

            'proyectosPendientes'  => $proyectosPendientes,
            'proyectosEnProgreso'  => $proyectosEnProgreso,
            'proyectosCompletados' => $proyectosCompletados,
            'proyectosCancelados'  => $proyectosCancelados,

            'proyectosRecientes' => $proyectosRecientes
        ]);
    }
}
