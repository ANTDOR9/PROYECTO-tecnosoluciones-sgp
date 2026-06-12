<?php require_once BASE_PATH . '/app/views/layouts/header.php'; ?>

<!-- Bienvenida simple -->
<div class="mb-4">
    <h5 class="fw-bold mb-1" style="color:#fff;">
        Bienvenido, <?= $_SESSION['usuario_nombre'] ?? 'Admin' ?> 👋
    </h5>
    <small style="color:var(--text-secondary);">
        <?= date('d/m/Y') ?> - Panel de administracion TecnoSoluciones
    </small>
</div>

<!-- KPI Coverflow 3D -->
<div class="kpi-coverflow">
    <button class="kpi-arrow left" onclick="kpiMove(-1)">
        <i class="bi bi-chevron-left"></i>
    </button>

    <div class="kpi-track" id="kpiTrack">

        <!-- KPI 1: Clientes -->
        <div class="kpi-card" data-index="0">
            <!-- TODO: reemplazar el div .kpi-bg por <img class="kpi-bg" src="...kpi-clientes.gif" style="object-fit:cover;width:100%;height:100%;"> -->
            <div class="kpi-bg" style="background: linear-gradient(135deg, #0d6efd, #6610f2);"></div>
            <div class="kpi-overlay"></div>
            <div class="kpi-content">
                <div class="kpi-icon">
                    <i class="bi bi-people-fill" style="color:#fff;"></i>
                </div>
                <div class="kpi-info">
                    <div class="label">Total Clientes</div>
                    <div class="value">0</div>
                    <div class="sub">Registrados en el sistema</div>
                </div>
            </div>
        </div>

        <!-- KPI 2: Proyectos -->
        <div class="kpi-card" data-index="1">
            <!-- TODO: reemplazar el div .kpi-bg por <img class="kpi-bg" src="...kpi-proyectos.gif" style="object-fit:cover;width:100%;height:100%;"> -->
            <div class="kpi-bg" style="background: linear-gradient(135deg, #6f42c1, #d63384);"></div>
            <div class="kpi-overlay"></div>
            <div class="kpi-content">
                <div class="kpi-icon">
                    <i class="bi bi-kanban-fill" style="color:#fff;"></i>
                </div>
                <div class="kpi-info">
                    <div class="label">Total Proyectos</div>
                    <div class="value">0</div>
                    <div class="sub">Activos e inactivos</div>
                </div>
            </div>
        </div>

        <!-- KPI 3: Tickets -->
        <div class="kpi-card" data-index="2">
            <!-- TODO: reemplazar el div .kpi-bg por <img class="kpi-bg" src="...kpi-tickets.gif" style="object-fit:cover;width:100%;height:100%;"> -->
            <div class="kpi-bg" style="background: linear-gradient(135deg, #ffc107, #fd7e14);"></div>
            <div class="kpi-overlay"></div>
            <div class="kpi-content">
                <div class="kpi-icon">
                    <i class="bi bi-ticket-perforated-fill" style="color:#fff;"></i>
                </div>
                <div class="kpi-info">
                    <div class="label">Tickets Abiertos</div>
                    <div class="value">0</div>
                    <div class="sub">Pendientes de atencion</div>
                </div>
            </div>
        </div>

        <!-- KPI 4: Tareas -->
        <div class="kpi-card" data-index="3">
            <!-- TODO: reemplazar el div .kpi-bg por <img class="kpi-bg" src="...kpi-tareas.gif" style="object-fit:cover;width:100%;height:100%;"> -->
            <div class="kpi-bg" style="background: linear-gradient(135deg, #198754, #20c997);"></div>
            <div class="kpi-overlay"></div>
            <div class="kpi-content">
                <div class="kpi-icon">
                    <i class="bi bi-check2-square" style="color:#fff;"></i>
                </div>
                <div class="kpi-info">
                    <div class="label">Tareas Pendientes</div>
                    <div class="value">0</div>
                    <div class="sub">Por completar</div>
                </div>
            </div>
        </div>

    </div>

    <button class="kpi-arrow right" onclick="kpiMove(1)">
        <i class="bi bi-chevron-right"></i>
    </button>

    <div class="kpi-dots" id="kpiDots">
        <button class="kpi-dot active" onclick="kpiGoTo(0)"></button>
        <button class="kpi-dot" onclick="kpiGoTo(1)"></button>
        <button class="kpi-dot" onclick="kpiGoTo(2)"></button>
        <button class="kpi-dot" onclick="kpiGoTo(3)"></button>
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
// ===== KPI COVERFLOW 3D =====
const kpiCards = document.querySelectorAll('#kpiTrack .kpi-card');
const kpiDots  = document.querySelectorAll('#kpiDots .kpi-dot');
let kpiCurrent = 0;
const kpiTotal = kpiCards.length;
let kpiAutoplay;

function kpiRender() {
    kpiCards.forEach((card, i) => {
        card.classList.remove(
            'position-center', 'position-left', 'position-right',
            'position-far-left', 'position-far-right', 'position-hidden'
        );

        const diff = (i - kpiCurrent + kpiTotal) % kpiTotal;

        if (diff === 0) card.classList.add('position-center');
        else if (diff === 1) card.classList.add('position-right');
        else if (diff === kpiTotal - 1) card.classList.add('position-left');
        else if (diff === 2) card.classList.add('position-far-right');
        else card.classList.add('position-far-left');
    });

    kpiDots.forEach((dot, i) => {
        dot.classList.toggle('active', i === kpiCurrent);
    });
}

function kpiMove(direction) {
    kpiCurrent = (kpiCurrent + direction + kpiTotal) % kpiTotal;
    kpiRender();
    kpiResetAutoplay();
}

function kpiGoTo(index) {
    kpiCurrent = index;
    kpiRender();
    kpiResetAutoplay();
}

function kpiResetAutoplay() {
    clearInterval(kpiAutoplay);
    kpiAutoplay = setInterval(() => kpiMove(1), 4500);
}

// Click en tarjeta lateral la lleva al centro
kpiCards.forEach((card, i) => {
    card.addEventListener('click', () => {
        if (i !== kpiCurrent) kpiGoTo(i);
    });
});

kpiRender();
kpiResetAutoplay();

// ===== GRAFICAS =====
Chart.defaults.color = '#8a9bb0';
Chart.defaults.borderColor = 'rgba(255,255,255,0.07)';

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
