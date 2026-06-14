<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Detalle del Proyecto</h5>
        <small style="color:var(--text-secondary);">Informacion completa del proyecto</small>
    </div>
    <div class="d-flex gap-2">
        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects/edit/<?= $proyecto['id'] ?>" 
           class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
            <i class="bi bi-pencil me-1"></i>Editar
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects" 
           class="btn btn-sm" style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
            <i class="bi bi-arrow-left me-1"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body py-4">
                <div class="proyecto-icon mx-auto mb-3">
                    <i class="bi bi-kanban-fill"></i>
                </div>
                <h5 class="fw-bold mb-1"><?= htmlspecialchars($proyecto['nombre']) ?></h5>
                <p style="color:var(--text-secondary);" class="mb-3">
                    Cliente: <?= htmlspecialchars($proyecto['cliente_nombre']) ?>
                </p>
                <span class="badge-estado badge-<?= $proyecto['estado'] ?>">
                    <?= ucfirst(str_replace('_', ' ', $proyecto['estado'])) ?>
                </span>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="info-item mb-3">
                    <div class="info-label"><i class="bi bi-cash-stack me-2"></i>Presupuesto</div>
                    <div class="info-value">$<?= number_format($proyecto['presupuesto'], 2) ?></div>
                </div>
                <div class="info-item mb-3">
                    <div class="info-label"><i class="bi bi-calendar-event me-2"></i>Fecha Inicio</div>
                    <div class="info-value"><?= $proyecto['fecha_inicio'] ? date('d/m/Y', strtotime($proyecto['fecha_inicio'])) : '-' ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="bi bi-calendar-check me-2"></i>Fecha Fin</div>
                    <div class="info-value"><?= $proyecto['fecha_fin'] ? date('d/m/Y', strtotime($proyecto['fecha_fin'])) : '-' ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-file-text me-2" style="color:#0d6efd;"></i>
                Descripcion del Proyecto
            </div>
            <div class="card-body">
                <p style="color:var(--text-primary);">
                    <?= !empty($proyecto['descripcion']) ? nl2br(htmlspecialchars($proyecto['descripcion'])) : '<span style="color:var(--text-secondary);">Sin descripcion</span>' ?>
                </p>

                <hr style="border-color:var(--border-color);">

                <h6 class="fw-bold mb-3">Informacion del Cliente</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label"><i class="bi bi-person me-2"></i>Nombre</div>
                            <div class="info-value"><?= htmlspecialchars($proyecto['cliente_nombre']) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label"><i class="bi bi-envelope me-2"></i>Email</div>
                            <div class="info-value"><?= htmlspecialchars($proyecto['cliente_email']) ?></div>
                        </div>
                    </div>
                </div>

                <hr style="border-color:var(--border-color);">

                <h6 class="fw-bold mb-3">Tareas del Proyecto</h6>
                <div class="text-center py-3" style="color:var(--text-secondary);">
                    <i class="bi bi-check2-square fs-4 d-block mb-2"></i>
                    Modulo de tareas en desarrollo
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.proyecto-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(111,66,193,0.2);
    color: #6f42c1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}
.info-label {
    font-size: 0.78rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 6px;
    font-weight: 600;
}
.info-value {
    font-size: 0.95rem;
    color: var(--text-primary);
    font-weight: 500;
}
</style>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
