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
</head>

<body style="display: flex;">
    <div class="profile">
        <div class="profile-img" onclick="toggleTray()"></div>
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
        <div style="width: 100%; display: flex; justify-content: center; gap: 2rem;">
            <button class="btn-switch" id="btnImpressoras" onclick="showArea('impressoras')">Impressoras</button>
            <button class="btn-switch" id="btnEstoque" onclick="showArea('estoque')">Estoque</button>
        </div>

        <!-- Área Impressoras -->
        <div class="area-gerenciamento" id="areaImpressoras">
            <div id="gerenciamentoImpressoras">
                <h2 style="text-align: center;">Gerenciamento de Impressoras</h2>

                <div style="width: 100%; display: flex; justify-content: center; gap: 2rem;">
                    <button class="btn-switch" id="btnRelatorioImpressoras"
                        onclick="showArea('relatorioImpressoras')">Relatório de Impressoras</button>
                    <button class="btn-switch" id="btnRelatorioManutencao"
                        onclick="showArea('relatorioManutencao')">Relatório de Manutenção</button>
                    <button class="btn-switch" id="btnConsultarImpressora"
                        onclick="showArea('consultarImpressora')">Consultar Impressora [Em progresso]</button>
                    <button class="btn-switch" id="btnAlterarExcluirImpressora"
                        onclick="showArea('alterarExcluirImpressora')">Alterar[Em progresso] ou Excluir Impressora</button>
                </div>
            </div>

            <div id="relatarioImpressoras" class="subArea">
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
                        <label>Ultima Manutenção:</label>
                        <input type="date" name="ultima_manutencao" required>
                        <label>Problema:</label>
                        <input type="text" name="problema" required>
                        <label>Peça Utilizada:</label>
                        <input type="text" name="peca_utilizada">
                        <label>Status de Conclusão:</label>
                        <select name="status_de_conclusao" required>
                            <option value="Pendente">Pendente</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Feito">Feito</option>
                        </select>
                        <label>Rede:</label>
                        <select name="rede" required>
                            <option value="Sim">Rede</option>
                            <option value="Não">USB</option>
                        </select>
                        <button type="submit">Cadastrar Impressora</button>
                    </div>
                </form>
            </div>

            <div id="relatarioManutencao" class="subArea">
                <h3>Relatório de Manutenção</h3>
                <form action="../acao_impressora.php" method="post">
                    <input type="hidden" name="acao" value="atualizar">
                    <div class="form-group">
                        <label>Número de série da Impressora:</label>
                        <input type="text" name="numero_de_serie" required>
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
            </div>

            <div id="consultarImpressora" class="subArea">
                <h3>Consultar Impressora</h3>
                <form action="../acao_impressora.php" method="get">
                    <input type="hidden" name="acao" value="consultar">
                    <div class="form-group">
                        <label>Número de Série:</label>
                        <input type="text" name="numero_de_serie">
                        <button type="submit">Consultar</button>
                    </div>
                </form>
            </div>

            <div id="alterarExcluirImpressora" class="subArea">
                <h3>Alterar ou Excluir Impressora</h3>
                <form action="../acao_impressora.php" method="post">
                    <input type="hidden" name="acao" value="alterar_ou_excluir">
                    <div class="form-group">
                        <label>ID Impressora:</label>
                        <input type="number" name="id_imp" required>
                        <button type="submit" name="alterar">Alterar [Em progresso]</button>
                        <button type="submit" name="excluir">Excluir</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Área Estoque -->
        <div class="area-gerenciamento" id="areaEstoque">
            <div class="gestaoEstoque">
                <h2 style="text-align: center;">Gestão de Estoque</h2>
                <div style="width: 100%; display: flex; justify-content: center; gap: 2rem;">
                    <button class="btn-switch" id="btnRelatorioPeca" onclick="showArea('relatorioPeca')">Relatório de Nova Peça</button>
                    <button class="btn-switch" id="btnPecaUsada" onclick="showArea('pecaUsada')">Relatório de Peça Usada [Em progresso]</button>
                    <button class="btn-switch" id="btnConsultarPeca"onclick="showArea('consultarPeca')">Consultar Peça [Em progresso]</button>
                    <button class="btn-switch" id="btnAlterarExcluirPeca"onclick="showArea('alterarExcluirPeca')">Alterar ou Excluir Peça [Em progresso]</button>
                </div>
            </div>

            <div id="relatorioPeca" class="subArea">
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
                            <option value="Epson">Epson</option>
                        </select>
                        <label>Quantidade:</label>
                        <input type="number" name="quantidade" required>
                        <label>Descrição:</label>
                        <input type="text" name="descricao_peca">
                        <button type="submit">Cadastrar Peça</button>
                    </div>
                </form>
            </div>

            <div id="relatorioPecaUsada" class="subArea">
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
            </div>

            <div id="consultarPeca" class="subArea">
                <h3>Consultar Peça</h3>
                <form action="../acao_estoque.php" method="get">
                    <input type="hidden" name="acao" value="consultar">
                    <div class="form-group">
                        <label>ID da Peça:</label>
                        <input type="number" name="id_peca">
                        <button type="submit">Consultar</button>
                    </div>
                </form>
            </div>

            <div id="alterarExcluirPeca" class="subArea">
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
    </div>

    <script src="../script.js"></script>
</body>

</html>