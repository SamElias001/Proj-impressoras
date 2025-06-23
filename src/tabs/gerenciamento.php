<?php
require_once("../classeimpressora.php");
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .hidden { display: none; }
        .btn-switch {
            margin: 1rem;
            padding: 0.7rem 2rem;
            border-radius: 10px;
            border: 2px solid #333;
            background: #bbb;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-switch.active {
            background: #888;
            color: #fff;
        }
        .area-gerenciamento {
            margin-top: 2rem;
            width: 90%;
            background: #eee;
            border-radius: 10px;
            padding: 2rem;
        }
        .msg-retorno {
            margin: 1rem auto;
            padding: 1rem 2rem;
            background: #d1ffd1;
            border: 1.5px solid #4a4;
            border-radius: 8px;
            color: #222;
            font-weight: bold;
            width: fit-content;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: gray; display: flex;">
    <div class="profile">
        <div class="profile-img" onclick="toggleTray()"></div>
        <div class="profile-name">Convidado</div>
    </div>

    <div class="tray" id="trayMenu">
        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print" onclick="window.location.href='./impressoras.php'"></i>
                <a href="./impressoras.php">Impressoras</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./estoque.php'"></i>
                <a href="./estoque.php">Estoque</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen"></i>
                <a href="">Gerenciamento</a>
            </li>
        </ul>
    </div>

    <div class="content" id="edicao">
        <?php if ($msg): ?>
            <div class="msg-retorno"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <div style="width: 100%; display: flex; justify-content: center; gap: 2rem;">
            <button class="btn-switch active" id="btnImpressoras" onclick="showArea('impressoras')">Impressoras</button>
            <button class="btn-switch" id="btnEstoque" onclick="showArea('estoque')">Estoque</button>
        </div>

        <!-- Área Impressoras -->
        <div class="area-gerenciamento" id="areaImpressoras">
            <h2>Gerenciamento de Impressoras</h2>
            <h3>Relatório de Nova Impressora</h3>
            <form action="../acao_impressora.php" method="post">
                <input type="hidden" name="acao" value="inserir">
                <div class="form-group">
                    <label>Número de Série:</label>
                    <input type="text" name="numero_de_serie" required>
                    <label>Setor:</label>
                    <input type="text" name="setor" required>
                    <label>Marca:</label>
                    <select name="marca" required>
                        <option value="Samsung">Samsung</option>
                        <option value="HP">HP</option>
                        <option value="Epson">Epson</option>
                    </select>
                    <label>Rede:</label>
                    <select name="rede" required>
                        <option value="Sim">Rede</option>
                        <option value="Não">USB</option>
                    </select>
                    <button type="submit">Cadastrar Impressora</button>
                </div>
            </form>

            <h3>Atualizar Manutenção</h3>
            <form action="../acao_impressora.php" method="post">
                <input type="hidden" name="acao" value="atualizar">
                <div class="form-group">
                    <label>ID Impressora:</label>
                    <input type="number" name="id_imp" required>
                    <label>Última Manutenção:</label>
                    <input type="date" name="ultima_manutencao" required>
                    <label>Serviço:</label>
                    <input type="text" name="problema" required>
                    <label>Peça Utilizada:</label>
                    <input type="text" name="peca_utilizada">
                    <label>Status:</label>
                    <select name="status_de_conclusao" required>
                        <option value="Pendente">Pendente</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Feito">Feito</option>
                    </select>
                    <button type="submit">Atualizar</button>
                </div>
            </form>

            <h3>Consultar Impressora</h3>
            <form action="../acao_impressora.php" method="get">
                <input type="hidden" name="acao" value="consultar">
                <div class="form-group">
                    <label>Número de Série:</label>
                    <input type="text" name="numero_de_serie">
                    <button type="submit">Consultar</button>
                </div>
            </form>

            <h3>Alterar ou Excluir Impressora</h3>
            <form action="../acao_impressora.php" method="post">
                <input type="hidden" name="acao" value="alterar_ou_excluir">
                <div class="form-group">
                    <label>ID Impressora:</label>
                    <input type="number" name="id_imp" required>
                    <button type="submit" name="alterar">Alterar</button>
                    <button type="submit" name="excluir">Excluir</button>
                </div>
            </form>
        </div>

        <!-- Área Estoque -->
        <div class="area-gerenciamento hidden" id="areaEstoque">
            <h2>Gestão de Estoque</h2>
            <h3>Relatório de Nova Peça</h3>
            <form action="../acao_estoque.php" method="post">
                <input type="hidden" name="acao" value="inserir_peca">
                <div class="form-group">
                    <label>Nome da Peça:</label>
                    <input type="text" name="nome_peca" required>
                    <label>Marca:</label>
                    <select name="marca_peca" required>
                        <option value="Samsung">Samsung</option>
                        <option value="HP">HP</option>
                    </select>
                    <label>Descrição:</label>
                    <input type="text" name="descricao_peca">
                    <button type="submit">Cadastrar Peça</button>
                </div>
            </form>

            <h3>Relatório de Peça Usada</h3>
            <form action="../acao_estoque.php" method="post">
                <input type="hidden" name="acao" value="usar_peca">
                <div class="form-group">
                    <label>ID da Peça:</label>
                    <input type="number" name="id_peca" required>
                    <label>Quantidade Usada:</label>
                    <input type="number" name="quantidade" required>
                    <button type="submit">Registrar Uso</button>
                </div>
            </form>

            <h3>Consultar Peça</h3>
            <form action="../acao_estoque.php" method="get">
                <input type="hidden" name="acao" value="consultar">
                <div class="form-group">
                    <label>ID da Peça:</label>
                    <input type="number" name="id_peca">
                    <button type="submit">Consultar</button>
                </div>
            </form>

            <h3>Alterar ou Excluir Peça</h3>
            <form action="../acao_estoque.php" method="post">
                <input type="hidden" name="acao" value="alterar_ou_excluir">
                <div class="form-group">
                    <label>ID da Peça:</label>
                    <input type="number" name="id_peca" required>
                    <button type="submit" name="alterar">Alterar</button>
                    <button type="submit" name="excluir">Excluir</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../script.js">
        function showArea(area) {
            document.getElementById('areaImpressoras').classList.add('hidden');
            document.getElementById('areaEstoque').classList.add('hidden');
            document.getElementById('btnImpressoras').classList.remove('active');
            document.getElementById('btnEstoque').classList.remove('active');
            if (area === 'impressoras') {
                document.getElementById('areaImpressoras').classList.remove('hidden');
                document.getElementById('btnImpressoras').classList.add('active');
            } else {
                document.getElementById('areaEstoque').classList.remove('hidden');
                document.getElementById('btnEstoque').classList.add('active');
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
    </script>
</body>
</html>