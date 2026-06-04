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
    const count = 60;
    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');

        const size = Math.random() * 3 + 1;
        const left = Math.random() * 100;
        const duration = Math.random() * 15 + 8;
        const delay = Math.random() * 10;

        particle.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${left}vw;
            bottom: -10px;
            animation-duration: ${duration}s;
            animation-delay: ${delay}s;
            opacity: ${Math.random() * 0.5 + 0.2};
        `;

        document.body.appendChild(particle);
    }
}

createParticles();
