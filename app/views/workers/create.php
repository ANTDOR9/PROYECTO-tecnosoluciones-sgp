<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Nuevo Trabajador</h5>
        <small style="color:var(--text-secondary);">Registra un nuevo miembro del equipo</small>
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
                <i class="bi bi-person-badge me-2" style="color:#0dcaf0;"></i>
                Datos del Trabajador
            </div>
            <div class="card-body">

                <?php if (!empty($_SESSION['error_worker'])): ?>
                    <div class="alert" style="background:rgba(220,53,69,0.1);border:1px solid rgba(220,53,69,0.3);color:#dc3545;">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?= $_SESSION['error_worker'] ?>
                    </div>
                    <?php unset($_SESSION['error_worker']); ?>
                <?php endif; ?>

                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/workers/store">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="nombre" class="form-control" 
                                   placeholder="Ej: Maria Lopez" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" 
                                   placeholder="correo@tecnosoluciones.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rol *</label>
                            <select name="rol" class="form-select" required>
                                <option value="developer">Developer</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contrasena *</label>
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Minimo 6 caracteres" required minlength="6">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Registrar Trabajador
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
