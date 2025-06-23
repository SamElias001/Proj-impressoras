document.getElementById('serial').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});

function toggleTray() {
    const tray = document.getElementById('trayMenu');
    tray.style.display = (tray.style.display === 'block') ? 'none' : 'block';
}

// Fecha o tray ao clicar fora dele
document.addEventListener('click', function(event) {
    const tray = document.getElementById('trayMenu');
    const profileImg = document.querySelector('.profile-img');
    if (!tray.contains(event.target) && !profileImg.contains(event.target)) {
        tray.style.display = 'none';
    }
});