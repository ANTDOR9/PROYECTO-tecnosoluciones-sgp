<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Editar Proyecto</h5>
        <small style="color:var(--text-secondary);">Modifica los datos del proyecto</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/projects" class="btn btn-sm" 
       style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
        <i class="bi bi-arrow-left me-2"></i>Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2" style="color:#ffc107;"></i>
                Editando: <?= htmlspecialchars($proyecto['nombre']) ?>
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/projects/update/<?= $proyecto['id'] ?>">

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Nombre del proyecto *</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="<?= htmlspecialchars($proyecto['nombre']) ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cliente *</label>
                            <select name="cliente_id" class="form-select" required>
                                <?php foreach ($clientes as $c): ?>
                                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $proyecto['cliente_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($c['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"><?= htmlspecialchars($proyecto['descripcion'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente" <?= $proyecto['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                <option value="en_progreso" <?= $proyecto['estado'] == 'en_progreso' ? 'selected' : '' ?>>En Progreso</option>
                                <option value="completado" <?= $proyecto['estado'] == 'completado' ? 'selected' : '' ?>>Completado</option>
                                <option value="cancelado" <?= $proyecto['estado'] == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Presupuesto (S/)</label>
                            <input type="number" step="0.01" name="presupuesto" class="form-control"
                                   value="<?= $proyecto['presupuesto'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control"
                                   value="<?= $proyecto['fecha_inicio'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="fecha_fin" class="form-control"
                                   value="<?= $proyecto['fecha_fin'] ?>">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Actualizar Proyecto
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects"
                           class="btn" style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
