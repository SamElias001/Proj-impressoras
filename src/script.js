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
function toggleRedeIPv4() {
    const tds = document.querySelectorAll('.col-rede');
    const btn = document.getElementById('btn-info-icon');
    if (tds.length === 0 || !btn) return;
    const showingRede = tds[0].textContent.trim() === tds[0].getAttribute('data-rede');

    tds.forEach(td => {
        td.textContent = showingRede ? td.getAttribute('data-ipv4') : td.getAttribute('data-rede');
    });

    // Alterna o title do botão
    btn.title = showingRede ? "Mostrar Rede" : "Mostrar IPv4";
}

// Mostrar observação
function showObservacao(texto) {
    let observacaoAberta = false;
    let ultimoTextoObs = "";
    const modal = document.getElementById('observacaoModal');
    const conteudo = document.getElementById('observacaoConteudo');
    if (modal.style.display === 'block' && texto === ultimoTextoObs) {
        modal.style.display = 'none';
        observacaoAberta = false;
        ultimoTextoObs = "";
    } else {
        conteudo.innerText = texto;
        modal.style.display = 'block';
        observacaoAberta = true;
        ultimoTextoObs = texto;
    }
}

function fecharObservacao() {
    document.getElementById('observacaoModal').style.display = 'none';
    observacaoAberta = false;
    ultimoTextoObs = "";
}

// Modo escuro PARA ONTEM
function toggleDarkMode() {
    const root = document.documentElement;
    const isDark = root.classList.toggle('dark-mode');

    if (isDark) {
        root.style.setProperty('--primary', '#4f6781');
        root.style.setProperty('--secondary', '#2d3e50');
        root.style.setProperty('--accent', '#ff804e');
        root.style.setProperty('--accent-dark', '#c93e25');
        root.style.setProperty('--danger', '#ffb4a2');
        root.style.setProperty('--success', '#27ae60');
        root.style.setProperty('--gray', '#bbb');
        root.style.setProperty('--light-gray', '#222');
        root.style.setProperty('--border', '#444');
        root.style.setProperty('--background', 'linear-gradient(135deg, #23272f 0%, #1a1d22 100%)');
    } else {
        root.style.setProperty('--primary', '#2d3e50');
        root.style.setProperty('--secondary', '#f5f6fa');
        root.style.setProperty('--accent', '#ff804e');
        root.style.setProperty('--accent-dark', '#c93e25');
        root.style.setProperty('--danger', '#5c0b02');
        root.style.setProperty('--success', '#27ae60');
        root.style.setProperty('--gray', '#888');
        root.style.setProperty('--light-gray', '#e0e0e0');
        root.style.setProperty('--border', '#bdbdbd');
        root.style.setProperty('--background', 'linear-gradient(135deg, #e0e7ef 0%, #b3c6e0 100%)');
    }
}