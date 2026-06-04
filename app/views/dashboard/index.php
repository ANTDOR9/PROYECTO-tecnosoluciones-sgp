<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<!-- KPI Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="kpi-card">
            <div class="kpi-icon" style="background: rgba(13,110,253,0.15);">
                <i class="bi bi-people-fill" style="color:#0d6efd;"></i>
            </div>
            <div class="kpi-info">
                <div class="label">Total Clientes</div>
                <div class="value">0</div>
                <div class="sub">Registrados en el sistema</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="kpi-card">
            <div class="kpi-icon" style="background: rgba(111,66,193,0.15);">
                <i class="bi bi-kanban-fill" style="color:#6f42c1;"></i>
            </div>
            <div class="kpi-info">
                <div class="label">Total Proyectos</div>
                <div class="value">0</div>
                <div class="sub">Activos e inactivos</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="kpi-card">
            <div class="kpi-icon" style="background: rgba(255,193,7,0.15);">
                <i class="bi bi-ticket-perforated-fill" style="color:#ffc107;"></i>
            </div>
            <div class="kpi-info">
                <div class="label">Tickets Abiertos</div>
                <div class="value">0</div>
                <div class="sub">Pendientes de atencion</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="kpi-card">
            <div class="kpi-icon" style="background: rgba(25,135,84,0.15);">
                <i class="bi bi-check2-square" style="color:#198754;"></i>
            </div>
            <div class="kpi-info">
                <div class="label">Tareas Pendientes</div>
                <div class="value">0</div>
                <div class="sub">Por completar</div>
            </div>
        </div>
    </div>
</div>

<!-- Graficas -->
<div class="row g-4 mb-4">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Proyectos por Estado</span>
                <small class="text-muted">Este mes</small>
            </div>
            <div class="card-body">
                <canvas id="projectsChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Tickets por Prioridad</span>
                <small class="text-muted">Total</small>
            </div>
            <div class="card-body">
                <canvas id="ticketsChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Tabla proyectos recientes + Actividad -->
<div class="row g-4">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Proyectos Recientes</span>
                <a href="/PROYECTO-tecnosoluciones-sgp/public/projects" 
                   class="btn btn-sm btn-primary">Ver todos</a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Proyecto</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Presupuesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center py-4" 
                                style="color:var(--text-secondary);">
                                <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                Sin proyectos registrados aun
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <span>Tickets Recientes</span>
            </div>
            <div class="card-body">
                <div class="text-center py-3" style="color:var(--text-secondary);">
                    <i class="bi bi-ticket-perforated fs-4 d-block mb-2"></i>
                    Sin tickets registrados
                </div>
            </div>
        </div>
    </div>
</div>

<script>
Chart.defaults.color = '#8a9bb0';
Chart.defaults.borderColor = 'rgba(255,255,255,0.07)';

// Grafica proyectos
const ctx1 = document.getElementById('projectsChart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Pendiente', 'En Progreso', 'Completado', 'Cancelado'],
        datasets: [{
            label: 'Proyectos',
            data: [0, 0, 0, 0],
            backgroundColor: [
                'rgba(255,193,7,0.8)',
                'rgba(13,110,253,0.8)',
                'rgba(25,135,84,0.8)',
                'rgba(220,53,69,0.8)'
            ],
            borderRadius: 8,
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1 } },
            x: { grid: { display: false } }
        }
    }
});

// Grafica tickets
const ctx2 = document.getElementById('ticketsChart').getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Critica', 'Alta', 'Media', 'Baja'],
        datasets: [{
            data: [0, 0, 0, 0],
            backgroundColor: [
                'rgba(220,53,69,0.8)',
                'rgba(255,193,7,0.8)',
                'rgba(13,110,253,0.8)',
                'rgba(25,135,84,0.8)'
            ],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        cutout: '70%',
        plugins: { legend: { position: 'bottom' } }
    }
});
</script>

<?php require_once BASE_PATH . '/app/views/layouts/footer.php'; ?>
