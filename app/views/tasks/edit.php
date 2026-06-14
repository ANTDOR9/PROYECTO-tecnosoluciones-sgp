<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Editar Tarea</h5>
        <small style="color:var(--text-secondary);">Modifica los datos de la tarea</small>
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
                <i class="bi bi-pencil-square me-2" style="color:#ffc107;"></i>
                Editando: <?= htmlspecialchars($tarea['titulo']) ?>
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/tasks/update/<?= $tarea['id'] ?>">

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Titulo de la tarea *</label>
                            <input type="text" name="titulo" class="form-control"
                                   value="<?= htmlspecialchars($tarea['titulo']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proyecto *</label>
                            <select name="proyecto_id" class="form-select" required>
                                <?php foreach ($proyectos as $p): ?>
                                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $tarea['proyecto_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($p['nombre']) ?> (<?= htmlspecialchars($p['cliente_nombre']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Asignar a</label>
                            <select name="usuario_id" class="form-select">
                                <option value="">Sin asignar</option>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= $u['id'] ?>" <?= $u['id'] == $tarea['usuario_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($u['nombre']) ?> (<?= ucfirst($u['rol']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="3"><?= htmlspecialchars($tarea['descripcion'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente" <?= $tarea['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                <option value="en_progreso" <?= $tarea['estado'] == 'en_progreso' ? 'selected' : '' ?>>En Progreso</option>
                                <option value="completado" <?= $tarea['estado'] == 'completado' ? 'selected' : '' ?>>Completado</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prioridad</label>
                            <select name="prioridad" class="form-select">
                                <option value="baja" <?= $tarea['prioridad'] == 'baja' ? 'selected' : '' ?>>Baja</option>
                                <option value="media" <?= $tarea['prioridad'] == 'media' ? 'selected' : '' ?>>Media</option>
                                <option value="alta" <?= $tarea['prioridad'] == 'alta' ? 'selected' : '' ?>>Alta</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha Limite</label>
                            <input type="date" name="fecha_limite" class="form-control"
                                   value="<?= $tarea['fecha_limite'] ?>">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Actualizar Tarea
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks"
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
