<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Nuevo Cliente</h5>
        <small style="color:var(--text-secondary);">Completa los datos del nuevo cliente</small>
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
                <i class="bi bi-person-plus me-2" style="color:#0d6efd;"></i>
                Datos del Cliente
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/clients/store">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="nombre" class="form-control" 
                                   placeholder="Ej: Juan Perez" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Empresa</label>
                            <input type="text" name="empresa" class="form-control" 
                                   placeholder="Ej: Empresa S.A.">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" 
                                   placeholder="correo@empresa.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Telefono</label>
                            <input type="text" name="telefono" class="form-control" 
                                   placeholder="Ej: +51 999 999 999">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Direccion</label>
                            <textarea name="direccion" class="form-control" rows="3"
                                      placeholder="Direccion completa..."></textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Guardar Cliente
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
