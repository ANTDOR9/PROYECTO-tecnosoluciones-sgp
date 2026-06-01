<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TecnoSoluciones SGP' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
        }
        body { background: #f0f2f5; }
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: #1e2a3a;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: all 0.3s;
        }
        .sidebar .brand {
            padding: 20px;
            border-bottom: 1px solid #2d3f55;
        }
        .sidebar .nav-link {
            color: #8a9bb0;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 10px;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #2d3f55;
            color: #fff;
        }
        .sidebar .nav-link i { margin-right: 10px; }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
        }
        .topbar {
            background: #fff;
            padding: 15px 30px;
            margin-left: var(--sidebar-width);
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 99;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">
        <h5 class="text-white mb-0"><i class="bi bi-hexagon-fill text-primary"></i> TecnoSoluciones</h5>
        <small class="text-muted">Sistema de Gestión</small>
    </div>
    <nav class="nav flex-column mt-3">
        <a href="/PROYECTO-tecnosoluciones-sgp/public/" class="nav-link <?= ($active ?? '') == 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients" class="nav-link <?= ($active ?? '') == 'clients' ? 'active' : '' ?>">
            <i class="bi bi-people"></i> Clientes
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects" class="nav-link <?= ($active ?? '') == 'projects' ? 'active' : '' ?>">
            <i class="bi bi-kanban"></i> Proyectos
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets" class="nav-link <?= ($active ?? '') == 'tickets' ? 'active' : '' ?>">
            <i class="bi bi-ticket-perforated"></i> Tickets
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/reports" class="nav-link <?= ($active ?? '') == 'reports' ? 'active' : '' ?>">
            <i class="bi bi-file-earmark-pdf"></i> Reportes
        </a>
    </nav>
</div>

<!-- Topbar -->
<div class="topbar d-flex justify-content-between align-items-center">
    <h6 class="mb-0 text-muted"><?= $title ?? '' ?></h6>
    <div class="d-flex align-items-center gap-3">
        <span class="badge bg-primary"><i class="bi bi-person-circle"></i> Admin</span>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/auth/logout" class="btn btn-sm btn-outline-danger">
            <i class="bi bi-box-arrow-right"></i> Salir
        </a>
    </div>
</div>

<!-- Contenido -->
<div class="main-content">
