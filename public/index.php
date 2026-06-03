<?php

session_start();

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/PROYECTO-tecnosoluciones-sgp/public');

require_once BASE_PATH . '/core/App.php';

$app = new App();
