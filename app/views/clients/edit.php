<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Editar Cliente</h5>
        <small style="color:var(--text-secondary);">Modifica los datos del cliente</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/clients" class="btn btn-sm" 
       style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
        <i class="bi bi-arrow-left me-2"></i>Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2" style="color:#ffc107;"></i>
                Editando: <?= htmlspecialchars($cliente['nombre']) ?>
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/clients/update/<?= $cliente['id'] ?>">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="<?= htmlspecialchars($cliente['nombre']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Empresa</label>
                            <input type="text" name="empresa" class="form-control"
                                   value="<?= htmlspecialchars($cliente['empresa'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($cliente['email']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefono</label>
                            <input type="text" name="telefono" class="form-control"
                                   value="<?= htmlspecialchars($cliente['telefono'] ?? '') ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Direccion</label>
                            <textarea name="direccion" class="form-control" rows="3"><?= htmlspecialchars($cliente['direccion'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Actualizar Cliente
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients"
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
