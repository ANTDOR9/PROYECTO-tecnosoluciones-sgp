<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Tareas</h5>
        <small style="color:var(--text-secondary);">Gestiona las tareas de todos los proyectos</small>
    </div>
    <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Nueva Tarea
    </a>
</div>

<!-- Buscador y filtros -->
<div class="card mb-4">
    <div class="card-body py-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text" style="background:var(--bg-primary);border-color:var(--border-color);color:var(--text-secondary);">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar tarea...">
                </div>
            </div>
            <div class="col-md-3">
                <select id="filterEstado" class="form-select">
                    <option value="">Todos los estados</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="en_progreso">En Progreso</option>
                    <option value="completado">Completado</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="filterPrioridad" class="form-select">
                    <option value="">Todas las prioridades</option>
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
            </div>
            <div class="col-md-2 text-end">
                <small style="color:var(--text-secondary);">
                    Total: <strong style="color:var(--text-primary);"><?= count($tareas) ?></strong>
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Tabla -->
<div class="card">
    <div class="card-body p-0">
        <table class="table mb-0" id="tareasTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Proyecto</th>
                    <th>Asignado a</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha Limite</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tareas)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5" style="color:var(--text-secondary);">
                            <i class="bi bi-check2-square fs-2 d-block mb-2"></i>
                            No hay tareas registradas aun
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tareas as $t): ?>
                        <tr data-estado="<?= $t['estado'] ?>" data-prioridad="<?= $t['prioridad'] ?>">
                            <td><?= $t['id'] ?></td>
                            <td><strong><?= htmlspecialchars($t['titulo']) ?></strong></td>
                            <td><?= htmlspecialchars($t['proyecto_nombre']) ?></td>
                            <td><?= $t['usuario_nombre'] ? htmlspecialchars($t['usuario_nombre']) : '<span style="color:var(--text-secondary);">Sin asignar</span>' ?></td>
                            <td>
                                <span class="badge-estado badge-<?= $t['prioridad'] ?>">
                                    <?= ucfirst($t['prioridad']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge-estado badge-<?= $t['estado'] ?>">
                                    <?= ucfirst(str_replace('_', ' ', $t['estado'])) ?>
                                </span>
                            </td>
                            <td><?= $t['fecha_limite'] ? date('d/m/Y', strtotime($t['fecha_limite'])) : '-' ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/PROYECTO-tecnosoluciones-sgp/public/tasks/edit/<?= $t['id'] ?>"
                                       class="btn btn-sm" style="background:rgba(255,193,7,0.15);color:#ffc107;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button onclick="deleteTarea(<?= $t['id'] ?>, '<?= htmlspecialchars($t['titulo']) ?>')"
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
document.getElementById('filterPrioridad').addEventListener('change', filterTable);

function filterTable() {
    const search    = document.getElementById('searchInput').value.toLowerCase();
    const estado    = document.getElementById('filterEstado').value;
    const prioridad = document.getElementById('filterPrioridad').value;
    const rows      = document.querySelectorAll('#tareasTable tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const rowEstado    = row.getAttribute('data-estado');
        const rowPrioridad = row.getAttribute('data-prioridad');

        const matchesSearch    = text.includes(search);
        const matchesEstado    = !estado || rowEstado === estado;
        const matchesPrioridad = !prioridad || rowPrioridad === prioridad;

        row.style.display = (matchesSearch && matchesEstado && matchesPrioridad) ? '' : 'none';
    });
}

function deleteTarea(id, titulo) {
    Swal.fire({
        title: '¿Eliminar tarea?',
        text: `Se eliminara "${titulo}".`,
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
            window.location.href = `/PROYECTO-tecnosoluciones-sgp/public/tasks/delete/${id}`;
        }
    });
}
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
