document.getElementById('serial').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});

function showArea(area) { 
    const areaImp = document.getElementById('areaImpressoras');
    const areaEst = document.getElementById('areaEstoque');

    if (area === 'impressoras') {
        areaImp.style.display = 'flex';
        areaEst.style.display = 'none';
    } 
    if (area === 'estoque') {
        areaEst.style.display = 'flex';
        areaImp.style.display = 'none';
    }

    // Dentro da área de impressoras
    const subAreaRelatorioImpressoras = document.getElementById('relatarioImpressoras');
    const subAreaRelatorioManutencao = document.getElementById('relatarioManutencao');
    const subAreaConsultarImpressoras = document.getElementById('consultarImpressora');
    const subAreaAlterarImpressora = document.getElementById('alterarExcluirImpressora');

    if (area === 'relatorioImpressoras') {
        subAreaRelatorioImpressoras.style.display = 'flex';
        subAreaRelatorioManutencao.style.display = 'none';
        subAreaConsultarImpressoras.style.display = 'none';
        subAreaAlterarImpressora.style.display = 'none';
    }

    if (area === 'relatorioManutencao') {
        subAreaRelatorioImpressoras.style.display = 'none';
        subAreaRelatorioManutencao.style.display = 'flex';
        subAreaConsultarImpressoras.style.display = 'none';
        subAreaAlterarImpressora.style.display = 'none';
    }

    if (area === 'consultarImpressora'){
        subAreaRelatorioImpressoras.style.display = 'none';
        subAreaRelatorioManutencao.style.display = 'none';
        subAreaConsultarImpressoras.style.display = 'flex';
        subAreaAlterarImpressora.style.display = 'none';
    }

    if (area === 'alterarExcluirImpressora') {
        subAreaRelatorioImpressoras.style.display = 'none';
        subAreaRelatorioManutencao.style.display = 'none';
        subAreaConsultarImpressoras.style.display = 'none';
        subAreaAlterarImpressora.style.display = 'flex';
    }

    // Dentro da área de estoque
    const subAreaRelatorioPeca = document.getElementById('relatorioPeca');
    const subAreaRelatorioPecaUsada = document.getElementById('relatorioPecaUsada');
    const subAreaConsultarPeca = document.getElementById('consultarPeca');
    const subAreaAlterarExcluirPeca = document.getElementById('alterarExcluirPeca');

    if (area === 'relatorioPeca') {
        subAreaRelatorioPeca.style.display = 'flex';
        subAreaRelatorioPecaUsada.style.display = 'none';
        subAreaConsultarPeca.style.display = 'none';
        subAreaAlterarExcluirPeca.style.display = 'none';
    }
    
    if (area === 'pecaUsada') {
        subAreaRelatorioPeca.style.display = 'none';
        subAreaRelatorioPecaUsada.style.display = 'flex';
        subAreaConsultarPeca.style.display = 'none';
        subAreaAlterarExcluirPeca.style.display = 'none';
    }

    if (area === 'consultarPeca') {
        subAreaRelatorioPeca.style.display = 'none';
        subAreaRelatorioPecaUsada.style.display = 'none';
        subAreaConsultarPeca.style.display = 'flex';
        subAreaAlterarExcluirPeca.style.display = 'none';
    }

    if (area === 'alterarExcluirPeca') {
        subAreaRelatorioPeca.style.display = 'none';
        subAreaRelatorioPecaUsada.style.display = 'none';
        subAreaConsultarPeca.style.display = 'none';
        subAreaAlterarExcluirPeca.style.display = 'flex';
    }
}

// Tray toggle
function toggleTray() {
    const tray = document.getElementById('trayMenu');
        tray.style.display = (tray.style.display === 'block') ? 'none' : 'block';
}

// Fecha o tray ao clicar fora dele
// Não está funcionando com os arquivos em Pendrive
document.addEventListener('click', function(event) {
    const tray = document.getElementById('trayMenu');
    const profileImg = document.querySelector('.profile-img');
    if (!tray.contains(event.target) && !profileImg.contains(event.target)) {
        tray.style.display = 'none';
    }
});



// Alterna entre mostrar rede e ipv4
document.getElementById('btn-info-icon').addEventListener('click', function() {
    const tds = document.querySelectorAll('.col-rede');
    const showingRede = tds[0].textContent.trim() === tds[0].getAttribute('data-rede');
    tds.forEach(td => {
        td.textContent = showingRede ? td.getAttribute('data-ipv4') : td.getAttribute('data-rede');
    });
});

// Mostrar a Observação
function showObservacao() {
    const observacao = document.getElementById('obs');

    if (observacao.style.display === 'none') {
        observacao.style.display = 'block';
    } else {
        observacao.style.display = 'none';
    }
}
