// Toggle sidebar
const sidebar    = document.getElementById('sidebar');
const topbar     = document.getElementById('topbar');
const mainContent = document.getElementById('mainContent');
const btnToggle  = document.getElementById('btnToggle');

btnToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    topbar.classList.toggle('collapsed');
    mainContent.classList.toggle('collapsed');
});
