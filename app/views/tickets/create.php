<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Nuevo Ticket</h5>
        <small style="color:var(--text-secondary);">Registra una solicitud o incidencia de un cliente</small>
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
                <i class="bi bi-ticket-perforated me-2" style="color:#0dcaf0;"></i>
                Datos del Ticket
            </div>
            <div class="card-body">

                <?php if (empty($clientes)): ?>
                    <div class="alert" style="background:rgba(255,193,7,0.1);border:1px solid rgba(255,193,7,0.3);color:#ffc107;">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Debes registrar al menos un cliente antes de crear un ticket.
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/create" class="text-decoration-underline" style="color:#ffc107;">
                            Registrar cliente
                        </a>
                    </div>
                <?php else: ?>

                <form method="POST" action="/PROYECTO-tecnosoluciones-sgp/public/tickets/store">

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Titulo del ticket *</label>
                            <input type="text" name="titulo" class="form-control" 
                                   placeholder="Ej: Error al iniciar sesion" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cliente *</label>
                            <select name="cliente_id" id="clienteSelect" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <?php foreach ($clientes as $c): ?>
                                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proyecto relacionado (opcional)</label>
                            <select name="proyecto_id" id="proyectoSelect" class="form-select">
                                <option value="">Sin proyecto especifico</option>
                                <?php foreach ($proyectos as $p): ?>
                                    <option value="<?= $p['id'] ?>" data-cliente="<?= $p['cliente_id'] ?>">
                                        <?= htmlspecialchars($p['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="4"
                                      placeholder="Describe el problema o solicitud..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select">
                                <option value="abierto">Abierto</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="resuelto">Resuelto</option>
                                <option value="cerrado">Cerrado</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prioridad</label>
                            <select name="prioridad" class="form-select">
                                <option value="baja">Baja</option>
                                <option value="media" selected>Media</option>
                                <option value="alta">Alta</option>
                                <option value="critica">Critica</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Crear Ticket
                        </button>
                        <a href="/PROYECTO-tecnosoluciones-sgp/public/tickets" 
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

<script>
// Filtrar proyectos segun el cliente seleccionado
const clienteSelect = document.getElementById('clienteSelect');
const proyectoSelect = document.getElementById('proyectoSelect');
const allProjectOptions = Array.from(proyectoSelect.options);

clienteSelect.addEventListener('change', function() {
    const clienteId = this.value;
    
    proyectoSelect.innerHTML = '<option value="">Sin proyecto especifico</option>';
    
    allProjectOptions.forEach(opt => {
        if (opt.value === '') return;
        if (!clienteId || opt.dataset.cliente === clienteId) {
            proyectoSelect.appendChild(opt.cloneNode(true));
        }
    });
});
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
