<?php

require_once BASE_PATH . '/core/Controller.php';

class HomeController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            $this->redirect('auth/login');
        }
    }

    public function index() {
        $this->view('dashboard/index', [
            'title'  => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}
