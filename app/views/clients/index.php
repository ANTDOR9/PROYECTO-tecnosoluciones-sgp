<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Clientes</h5>
        <small style="color:var(--text-secondary);">Gestiona los clientes registrados en el sistema</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Nuevo Cliente
    </a>
</div>

<!-- Buscador -->
<div class="card mb-4">
    <div class="card-body py-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" style="background:var(--bg-primary);border-color:var(--border-color);color:var(--text-secondary);">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar cliente...">
                </div>
            </div>
            <div class="col-md-3">
                <small style="color:var(--text-secondary);">
                    Total: <strong style="color:var(--text-primary);"><?= count($clientes) ?></strong> clientes
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Tabla -->
<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0" id="clientesTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Registrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($clientes)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5" style="color:var(--text-secondary);">
                            <i class="bi bi-people fs-2 d-block mb-2"></i>
                            No hay clientes registrados aun
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clientes as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-circle">
                                        <?= strtoupper(substr($c['nombre'], 0, 1)) ?>
                                    </div>
                                    <span><?= htmlspecialchars($c['nombre']) ?></span>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($c['empresa'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= htmlspecialchars($c['telefono'] ?? '-') ?></td>
                            <td><?= date('d/m/Y', strtotime($c['created_at'])) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/show/<?= $c['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(13,110,253,0.15);color:#0d6efd;">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/clients/edit/<?= $c['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button onclick="deleteCliente(<?= $c['id'] ?>, '<?= htmlspecialchars($c['nombre']) ?>')"
                                            class="btn btn-sm" style="background:rgba(220,53,69,0.15);color:#dc3545;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.avatar-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(13,110,253,0.2);
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
    flex-shrink: 0;
}
.input-group-text {
    border-radius: 10px 0 0 10px !important;
}
</style>

<script>
// Busqueda en tiempo real
document.getElementById('searchInput').addEventListener('keyup', function() {
    const search = this.value.toLowerCase();
    const rows   = document.querySelectorAll('#clientesTable tbody tr');
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(search) ? '' : 'none';
    });
});

// Confirmar eliminar
function deleteCliente(id, nombre) {
    Swal.fire({
        title: '¿Eliminar cliente?',
        text: `Se eliminara a "${nombre}" del sistema.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar',
        background: '#1a1d2e',
        color: '#fff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `/PROYECTO-tecnosoluciones-sgp/public/clients/delete/${id}`;
        }
    });
}
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
