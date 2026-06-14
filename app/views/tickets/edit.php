<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Editar Ticket</h5>
        <small style="color:var(--text-secondary);">Modifica los datos del ticket</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets" class="btn btn-sm" 
       style="background:rgba(255,255,255,0.08);color:var(--text-primary);">
        <i class="bi bi-arrow-left me-2"></i>Volver
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2" style="color:#ffc107;"></i>
                Editando: <?= htmlspecialchars($ticket['titulo']) ?>
            </div>
            <div class="card-body">
                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/tickets/update/<?= $ticket['id'] ?>">

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Titulo del ticket *</label>
                            <input type="text" name="titulo" class="form-control"
                                   value="<?= htmlspecialchars($ticket['titulo']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cliente *</label>
                            <select name="cliente_id" class="form-select" required>
                                <?php foreach ($clientes as $c): ?>
                                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $ticket['cliente_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($c['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proyecto relacionado (opcional)</label>
                            <select name="proyecto_id" class="form-select">
                                <option value="">Sin proyecto especifico</option>
                                <?php foreach ($proyectos as $p): ?>
                                    <option value="<?= $p['id'] ?>" <?= $p['id'] == $ticket['proyecto_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($p['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="4"><?= htmlspecialchars($ticket['descripcion'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="abierto" <?= $ticket['estado'] == 'abierto' ? 'selected' : '' ?>>Abierto</option>
                                <option value="en_proceso" <?= $ticket['estado'] == 'en_proceso' ? 'selected' : '' ?>>En Proceso</option>
                                <option value="resuelto" <?= $ticket['estado'] == 'resuelto' ? 'selected' : '' ?>>Resuelto</option>
                                <option value="cerrado" <?= $ticket['estado'] == 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prioridad</label>
                            <select name="prioridad" class="form-select">
                                <option value="baja" <?= $ticket['prioridad'] == 'baja' ? 'selected' : '' ?>>Baja</option>
                                <option value="media" <?= $ticket['prioridad'] == 'media' ? 'selected' : '' ?>>Media</option>
                                <option value="alta" <?= $ticket['prioridad'] == 'alta' ? 'selected' : '' ?>>Alta</option>
                                <option value="critica" <?= $ticket['prioridad'] == 'critica' ? 'selected' : '' ?>>Critica</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Actualizar Ticket
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets"
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
