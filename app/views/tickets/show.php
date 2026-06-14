<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Detalle del Ticket</h5>
        <small style="color:var(--text-secondary);">Informacion completa del ticket</small>
    </div>
    <div class="d-flex gap-2">
        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets/edit/<?= $ticket['id'] ?>" 
           class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
            <i class="bi bi-pencil me-1"></i>Editar
        </a>
        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets" 
           class="btn btn-sm" style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
            <i class="bi bi-arrow-left me-1"></i>Volver
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body py-4">
                <div class="ticket-icon mx-auto mb-3">
                    <i class="bi bi-ticket-perforated-fill"></i>
                </div>
                <h5 class="fw-bold mb-1">#<?= $ticket['id'] ?> - <?= htmlspecialchars($ticket['titulo']) ?></h5>
                <p style="color:var(--text-secondary);" class="mb-3">
                    Cliente: <?= htmlspecialchars($ticket['cliente_nombre']) ?>
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <span class="badge-estado badge-<?= $ticket['estado'] ?>">
                        <?= ucfirst(str_replace('_', ' ', $ticket['estado'])) ?>
                    </span>
                    <span class="badge-estado badge-<?= $ticket['prioridad'] ?>">
                        <?= ucfirst($ticket['prioridad']) ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="info-item mb-3">
                    <div class="info-label"><i class="bi bi-person me-2"></i>Cliente</div>
                    <div class="info-value"><?= htmlspecialchars($ticket['cliente_nombre']) ?></div>
                </div>
                <div class="info-item mb-3">
                    <div class="info-label"><i class="bi bi-envelope me-2"></i>Email</div>
                    <div class="info-value"><?= htmlspecialchars($ticket['cliente_email']) ?></div>
                </div>
                <div class="info-item mb-3">
                    <div class="info-label"><i class="bi bi-kanban me-2"></i>Proyecto</div>
                    <div class="info-value"><?= $ticket['proyecto_nombre'] ? htmlspecialchars($ticket['proyecto_nombre']) : 'Sin proyecto especifico' ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="bi bi-calendar me-2"></i>Creado</div>
                    <div class="info-value"><?= date('d/m/Y H:i', strtotime($ticket['created_at'])) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header">
                <i class="bi bi-file-text me-2" style="color:#0dcaf0;"></i>
                Descripcion del Ticket
            </div>
            <div class="card-body">
                <p style="color:var(--text-primary);">
                    <?= !empty($ticket['descripcion']) ? nl2br(htmlspecialchars($ticket['descripcion'])) : '<span style="color:var(--text-secondary);">Sin descripcion</span>' ?>
                </p>

                <hr style="border-color:var(--border-color);">

                <h6 class="fw-bold mb-3">Conversacion / Mensajes</h6>
                <div class="text-center py-3" style="color:var(--text-secondary);">
                    <i class="bi bi-chat-dots fs-4 d-block mb-2"></i>
                    Modulo de mensajeria en desarrollo
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ticket-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(13,202,240,0.2);
    color: #0dcaf0;
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
