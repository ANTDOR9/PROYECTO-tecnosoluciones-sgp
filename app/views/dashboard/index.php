<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<!-- KPI Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                    <i class="bi bi-people-fill text-primary fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Clientes</div>
                    <div class="fw-bold fs-4">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                    <i class="bi bi-kanban-fill text-success fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Proyectos</div>
                    <div class="fw-bold fs-4">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                    <i class="bi bi-ticket-perforated-fill text-warning fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Tickets Abiertos</div>
                    <div class="fw-bold fs-4">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 p-3 rounded-3">
                    <i class="bi bi-check-circle-fill text-danger fs-4"></i>
                </div>
                <div>
                    <div class="text-muted small">Tareas Pendientes</div>
                    <div class="fw-bold fs-4">0</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Graficas -->
<div class="row g-4">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h6 class="fw-bold mb-0">Proyectos por Estado</h6>
            </div>
            <div class="card-body">
                <canvas id="projectsChart" height="120"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h6 class="fw-bold mb-0">Tickets por Prioridad</h6>
            </div>
            <div class="card-body">
                <canvas id="ticketsChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
// Grafica proyectos
const ctx1 = document.getElementById('projectsChart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Pendiente', 'En Progreso', 'Completado', 'Cancelado'],
        datasets: [{
            label: 'Proyectos',
            data: [0, 0, 0, 0],
            backgroundColor: ['#ffc107', '#0d6efd', '#198754', '#dc3545'],
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

// Grafica tickets
const ctx2 = document.getElementById('ticketsChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Alta', 'Media', 'Baja'],
        datasets: [{
            data: [0, 0, 0],
            backgroundColor: ['#dc3545', '#ffc107', '#198754'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
