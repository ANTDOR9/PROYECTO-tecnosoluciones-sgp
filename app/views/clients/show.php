<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Detalle del Cliente</h5>
        <small style="color:var(--text-secondary);">Informacion completa del cliente</small>
    </div>
    <div class="d-flex gap-2">
        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/edit/<?= $cliente['id'] ?>" 
           class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
            <i class="bi bi-pencil me-1"></i>Editar
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients" 
           class="btn btn-sm" style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
            <i class="bi bi-arrow-left me-1"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Info principal -->
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body py-4">
                <div class="avatar-circle-lg mx-auto mb-3">
                    <?= strtoupper(substr($cliente['nombre'], 0, 1)) ?>
                </div>
                <h5 class="fw-bold mb-1"><?= htmlspecialchars($cliente['nombre']) ?></h5>
                <p style="color:var(--text-secondary);" class="mb-3">
                    <?= htmlspecialchars($cliente['empresa'] ?? 'Sin empresa') ?>
                </p>
                <span class="badge-estado badge-completado">Cliente Activo</span>
            </div>
        </div>
    </div>

    <!-- Datos de contacto -->
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-person-lines-fill me-2" style="color:#0d6efd;"></i>
                Informacion de Contacto
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-person me-2"></i>Nombre
                            </div>
                            <div class="info-value">
                                <?= htmlspecialchars($cliente['nombre']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-building me-2"></i>Empresa
                            </div>
                            <div class="info-value">
                                <?= htmlspecialchars($cliente['empresa'] ?? '-') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-envelope me-2"></i>Email
                            </div>
                            <div class="info-value">
                                <?= htmlspecialchars($cliente['email']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-telephone me-2"></i>Telefono
                            </div>
                            <div class="info-value">
                                <?= htmlspecialchars($cliente['telefono'] ?? '-') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-geo-alt me-2"></i>Direccion
                            </div>
                            <div class="info-value">
                                <?= htmlspecialchars($cliente['direccion'] ?? '-') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-calendar me-2"></i>Registrado
                            </div>
                            <div class="info-value">
                                <?= date('d/m/Y H:i', strtotime($cliente['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle-lg {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(13,110,253,0.2);
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
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
