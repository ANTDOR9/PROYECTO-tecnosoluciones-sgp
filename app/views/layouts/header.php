<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TecnoSoluciones SGP' ?></title>
    <link rel="icon" type="image/x-icon" href="/PROYECTO-tecnosoluciones-sgp/public/assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/PROYECTO-tecnosoluciones-sgp/public/assets/css/main.css" rel="stylesheet">
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <img src="/PROYECTO-tecnosoluciones-sgp/public/assets/img/logo.svg" alt="Logo" class="logo-full">
        <img src="/PROYECTO-tecnosoluciones-sgp/public/assets/img/logo-icon.svg" alt="Logo" class="logo-icon">
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">Principal</div>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/home"
           class="nav-item <?= ($active ?? '') == 'dashboard' ? 'active' : '' ?>"
           data-label="Dashboard">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <div class="nav-section-label">Gestion</div>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients"
           class="nav-item <?= ($active ?? '') == 'clients' ? 'active' : '' ?>"
           data-label="Clientes">
            <i class="bi bi-people"></i>
            <span>Clientes</span>
        </a>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects"
           class="nav-item <?= ($active ?? '') == 'projects' ? 'active' : '' ?>"
           data-label="Proyectos">
            <i class="bi bi-kanban"></i>
            <span>Proyectos</span>
        </a>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks"
           class="nav-item <?= ($active ?? '') == 'tasks' ? 'active' : '' ?>"
           data-label="Tareas">
            <i class="bi bi-check2-square"></i>
            <span>Tareas</span>
        </a>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets"
           class="nav-item <?= ($active ?? '') == 'tickets' ? 'active' : '' ?>"
           data-label="Tickets">
            <i class="bi bi-ticket-perforated"></i>
            <span>Tickets</span>
        </a>

        <div class="nav-section-label">Reportes</div>

        <a href="/PROYECTO-tecnosoluciones-sgp/public/reports"
           class="nav-item <?= ($active ?? '') == 'reports' ? 'active' : '' ?>"
           data-label="Reportes">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>Reportes</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <a href="/PROYECTO-tecnosoluciones-sgp/public/auth/logout"
           class="nav-item"
           data-label="Cerrar Sesion">
            <i class="bi bi-box-arrow-left"></i>
            <span>Cerrar Sesion</span>
        </a>
    </div>
</aside>

<!-- TOPBAR -->
<header class="topbar" id="topbar">
    <div class="topbar-left">
        <button class="btn-toggle" id="btnToggle">
            <i class="bi bi-list"></i>
        </button>
        <span class="topbar-title"><?= $title ?? 'Dashboard' ?></span>
    </div>
    <div class="topbar-right">
        <a href="#" class="topbar-icon-btn" title="Notificaciones">
            <i class="bi bi-bell"></i>
        </a>
        <a href="#" class="topbar-icon-btn" title="Configuracion">
            <i class="bi bi-gear"></i>
        </a>
        <div class="avatar-btn">
            <img src="/PROYECTO-tecnosoluciones-sgp/public/assets/img/avatar.svg" alt="Avatar">
            <div>
                <span><?= $_SESSION['usuario_nombre'] ?? 'Admin' ?></span>
                <small><?= ucfirst($_SESSION['usuario_rol'] ?? 'admin') ?></small>
            </div>
        </div>
    </div>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="main-content" id="mainContent">
