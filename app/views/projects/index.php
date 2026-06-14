<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Proyectos</h5>
        <small style="color:var(--text-secondary);">Gestiona los proyectos de tus clientes</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/projects/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Nuevo Proyecto
    </a>
</div>

<div class="card mb-4">
    <div class="card-body py-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text" style="background:var(--bg-primary);border-color:var(--border-color);color:var(--text-secondary);">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar proyecto...">
                </div>
            </div>
            <div class="col-md-3">
                <select id="filterEstado" class="form-select">
                    <option value="">Todos los estados</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="en_progreso">En Progreso</option>
                    <option value="completado">Completado</option>
                    <option value="cancelado">Cancelado</option>
                </select>
            </div>
            <div class="col-md-4 text-end">
                <small style="color:var(--text-secondary);">
                    Total: <strong style="color:var(--text-primary);"><?= count($proyectos) ?></strong> proyectos
                </small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0" id="proyectosTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Proyecto</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Presupuesto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($proyectos)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5" style="color:var(--text-secondary);">
                            <i class="bi bi-kanban fs-2 d-block mb-2"></i>
                            No hay proyectos registrados aun
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($proyectos as $p): ?>
                        <tr data-estado="<?= $p['estado'] ?>">
                            <td><?= $p['id'] ?></td>
                            <td><strong><?= htmlspecialchars($p['nombre']) ?></strong></td>
                            <td><?= htmlspecialchars($p['cliente_nombre']) ?></td>
                            <td>
                                <span class="badge-estado badge-<?= $p['estado'] ?>">
                                    <?= ucfirst(str_replace('_', ' ', $p['estado'])) ?>
                                </span>
                            </td>
                            <td>$<?= number_format($p['presupuesto'], 2) ?></td>
                            <td><?= $p['fecha_inicio'] ? date('d/m/Y', strtotime($p['fecha_inicio'])) : '-' ?></td>
                            <td><?= $p['fecha_fin'] ? date('d/m/Y', strtotime($p['fecha_fin'])) : '-' ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/projects/show/<?= $p['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(13,110,253,0.15);color:#0d6efd;">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/projects/edit/<?= $p['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button onclick="deleteProyecto(<?= $p['id'] ?>, '<?= htmlspecialchars($p['nombre']) ?>')"
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

<script>
document.getElementById('searchInput').addEventListener('keyup', filterTable);
document.getElementById('filterEstado').addEventListener('change', filterTable);

function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const estado = document.getElementById('filterEstado').value;
    const rows   = document.querySelectorAll('#proyectosTable tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const rowEstado = row.getAttribute('data-estado');
        const matchesSearch = text.includes(search);
        const matchesEstado = !estado || rowEstado === estado;
        row.style.display = (matchesSearch && matchesEstado) ? '' : 'none';
    });
}

function deleteProyecto(id, nombre) {
    Swal.fire({
        title: '¿Eliminar proyecto?',
        text: `Se eliminara "${nombre}" y todas sus tareas asociadas.`,
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
            window.location.href = `/PROYECTO-tecnosoluciones-sgp/public/projects/delete/${id}`;
        }
    });
}
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
