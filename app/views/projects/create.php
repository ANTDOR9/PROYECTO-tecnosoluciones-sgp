<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Nuevo Proyecto</h5>
        <small style="color:var(--text-secondary);">Completa los datos del nuevo proyecto</small>
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
                <i class="bi bi-kanban me-2" style="color:#6f42c1;"></i>
                Datos del Proyecto
            </div>
            <div class="card-body">

                <?php if (empty($clientes)): ?>
                    <div class="alert" style="background:rgba(255,193,7,0.1);border:1px solid rgba(255,193,7,0.3);color:#ffc107;">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Debes registrar al menos un cliente antes de crear un proyecto.
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/create" class="text-decoration-underline" style="color:#ffc107;">
                            Registrar cliente
                        </a>
                    </div>
                <?php else: ?>

                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/projects/store">

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Nombre del proyecto *</label>
                            <input type="text" name="nombre" class="form-control" 
                                   placeholder="Ej: Rediseño de sitio web" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cliente *</label>
                            <select name="cliente_id" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <?php foreach ($clientes as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"
                                      placeholder="Describe el alcance del proyecto..."></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="en_progreso">En Progreso</option>
                                <option value="completado">Completado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Presupuesto (S/)</label>
                            <input type="number" step="0.01" name="presupuesto" class="form-control" 
                                   placeholder="0.00">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="fecha_fin" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Guardar Proyecto
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects" 
                           class="btn" style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
                            Cancelar
                        </a>
                    </div>

                </form>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
