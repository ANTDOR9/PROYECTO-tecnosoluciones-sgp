<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Nueva Tarea</h5>
        <small style="color:var(--text-secondary);">Asigna una nueva tarea a un proyecto</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks" class="btn btn-sm" 
       style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
        <i class="bi bi-arrow-left me-2"></i>Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-check2-square me-2" style="color:#198754;"></i>
                Datos de la Tarea
            </div>
            <div class="card-body">

                <?php if (empty($proyectos)): ?>
                    <div class="alert" style="background:rgba(255,193,7,0.1);border:1px solid rgba(255,193,7,0.3);color:#ffc107;">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Debes registrar al menos un proyecto antes de crear una tarea.
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/projects/create" class="text-decoration-underline" style="color:#ffc107;">
                            Crear proyecto
                        </a>
                    </div>
                <?php else: ?>

                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/tasks/store">

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Titulo de la tarea *</label>
                            <input type="text" name="titulo" class="form-control" 
                                   placeholder="Ej: Diseñar pantalla de login" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proyecto *</label>
                            <select name="proyecto_id" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <?php foreach ($proyectos as $p): ?>
                                    <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nombre']) ?> (<?= htmlspecialchars($p['cliente_nombre']) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Asignar a</label>
                            <select name="usuario_id" class="form-select">
                                <option value="">Sin asignar</option>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nombre']) ?> (<?= ucfirst($u['rol']) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"
                                      placeholder="Detalles de la tarea..."></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="en_progreso">En Progreso</option>
                                <option value="completado">Completado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prioridad</label>
                            <select name="prioridad" class="form-select">
                                <option value="baja">Baja</option>
                                <option value="media" selected>Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha Limite</label>
                            <input type="date" name="fecha_limite" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Guardar Tarea
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks" 
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
