<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Editar Trabajador</h5>
        <small style="color:var(--text-secondary);">Modifica los datos del trabajador</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/workers" class="btn btn-sm" 
       style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
        <i class="bi bi-arrow-left me-2"></i>Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2" style="color:#ffc107;"></i>
                Editando: <?= htmlspecialchars($worker['nombre']) ?>
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/workers/update/<?= $worker['id'] ?>">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="<?= htmlspecialchars($worker['nombre']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($worker['email']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rol *</label>
                            <select name="rol" class="form-select" required>
                                <option value="developer" <?= $worker['rol'] == 'developer' ? 'selected' : '' ?>>Developer</option>
                                <option value="manager" <?= $worker['rol'] == 'manager' ? 'selected' : '' ?>>Manager</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nueva Contrasena</label>
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Dejar en blanco para no cambiar" minlength="6">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="activo" id="activoCheck"
                                       <?= $worker['activo'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="activoCheck">
                                    Trabajador activo
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Actualizar Trabajador
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/workers"
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
