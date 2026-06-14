<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Trabajadores</h5>
        <small style="color:var(--text-secondary);">Gestiona el equipo de TecnoSoluciones</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/workers/create" class="btn btn-primary">
        <i class="bi bi-person-plus me-2"></i>Nuevo Trabajador
    </a>
</div>

<div class="card mb-4">
    <div class="card-body py-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" style="background:var(--bg-primary);border-color:var(--border-color);color:var(--text-secondary);">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar trabajador...">
                </div>
            </div>
            <div class="col-md-6 text-end">
                <small style="color:var(--text-secondary);">
                    Total: <strong style="color:var(--text-primary);"><?= count($workers) ?></strong> trabajadores
                </small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0" id="workersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Registrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($workers)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5" style="color:var(--text-secondary);">
                            <i class="bi bi-people fs-2 d-block mb-2"></i>
                            No hay trabajadores registrados aun
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($workers as $w): ?>
                        <tr>
                            <td><?= $w['id'] ?></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-circle">
                                        <?= strtoupper(substr($w['nombre'], 0, 1)) ?>
                                    </div>
                                    <span><?= htmlspecialchars($w['nombre']) ?></span>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($w['email']) ?></td>
                            <td>
                                <span class="badge-estado badge-en_progreso">
                                    <?= ucfirst($w['rol']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($w['activo']): ?>
                                    <span class="badge-estado badge-completado">Activo</span>
                                <?php else: ?>
                                    <span class="badge-estado badge-cancelado">Inactivo</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d/m/Y', strtotime($w['created_at'])) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/workers/edit/<?= $w['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button onclick="deleteWorker(<?= $w['id'] ?>, '<?= htmlspecialchars($w['nombre']) ?>')"
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
</style>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const search = this.value.toLowerCase();
    document.querySelectorAll('#workersTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(search) ? '' : 'none';
    });
});

function deleteWorker(id, nombre) {
    Swal.fire({
        title: '¿Eliminar trabajador?',
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
            window.location.href = `/PROYECTO-tecnosoluciones-sgp/public/workers/delete/${id}`;
        }
    });
}
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
