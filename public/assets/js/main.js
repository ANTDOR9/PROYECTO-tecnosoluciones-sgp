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

// Generar particulas
function createParticles() {
    const count = 80;
    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');

        const size = Math.random() * 5 + 2;
        const left = Math.random() * 100;
        const duration = Math.random() * 12 + 6;
        const delay = Math.random() * 8;

        particle.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${left}vw;
            bottom: -10px;
            animation-duration: ${duration}s;
            animation-delay: -${delay}s;
            opacity: ${Math.random() * 0.6 + 0.3};
            background: rgba(${Math.random() > 0.5 ? '100,160,255' : '255,255,255'}, 0.8);
            box-shadow: 0 0 ${size * 2}px rgba(100,160,255,0.6);
        `;

        document.body.appendChild(particle);
    }
}

createParticles();
