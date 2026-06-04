// Toggle sidebar
const sidebar     = document.getElementById('sidebar');
const topbar      = document.getElementById('topbar');
const mainContent = document.getElementById('mainContent');
const btnToggle   = document.getElementById('btnToggle');

btnToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    topbar.classList.toggle('collapsed');
    mainContent.classList.toggle('collapsed');
});

// Generar particulas intensas
function createParticles() {
    const count = 200;
    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');

        const size = Math.random() * 6 + 2;
        const left = Math.random() * 100;
        const duration = Math.random() * 20 + 10;
        const delay = Math.random() * 15;
        const isBlue = Math.random() > 0.4;
        const color = isBlue ? '100,160,255' : '255,255,255';

        particle.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${left}vw;
            bottom: -10px;
            animation-duration: ${duration}s;
            animation-delay: -${delay}s;
            opacity: ${Math.random() * 0.7 + 0.3};
            background: rgba(${color}, 0.9);
            box-shadow: 0 0 ${size * 3}px rgba(${color}, 0.8),
                        0 0 ${size * 6}px rgba(${color}, 0.4);
        `;

        document.body.appendChild(particle);
    }
}

createParticles();
