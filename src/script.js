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

function showArea(area) { 
    const aImp = document.getElementById('areaImpressoras');
    const aEst = document.getElementById('areaEstoque');

    if (area === 'impressoras') {
        aImp.style.display = 'flex';
        aEst.style.display = 'none';
    } 
    if (area === 'estoque') {
        aEst.style.display = 'flex';
        aImp.style.display = 'none';
    }
}

// Tray toggle
function toggleTray() {
    const tray = document.getElementById('trayMenu');
        tray.style.display = (tray.style.display === 'block') ? 'none' : 'block';
}
document.addEventListener('click', function(event) {
    const tray = document.getElementById('trayMenu');
    const profileImg = document.querySelector('.profile-img');
    if (!tray.contains(event.target) && !profileImg.contains(event.target)) {
        tray.style.display = 'none';
    }
});