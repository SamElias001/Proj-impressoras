<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressoras</title>

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="display: flex;">
    <div class="profile">
        <div class="profile-img" onclick="toggleTray()"></div>
    </div>

    <div class="tray" id="trayMenu">
        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print"></i>
                <a>Impressoras</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./estoque.php'"></i>
                <a href="./estoque.php">Estoque</a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen" onclick="window.location.href='./gerenciamento.php'"></i>
                <a href="./gerenciamento.php">Gerenciamento</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número de Série</th>
                    <th>Obs</th>
                    <th>Setor</th>
                    <th>Marca</th>
                    <th>Última Manutenção</th>
                    <th>Serviço</th>
                    <th>Peça</th>
                    <th>Status</th>
                    <th>Contador de Uso</th>
                    <th>Redes <button type="button" class="info-icon" id="btn-info-icon" title="Mostrar IPv4" onclick="toggleRedeIPv4()">IPv4</button></th>
                </tr>
            </thead>
            <tbody>
            <?php
            require("../classeimpressora.php");

            $impressora = new Impressoras();
            $listaDeimpressoras = $impressora->listarImpressoras();

            foreach ($listaDeimpressoras as $registro) {
                $id_imp = $registro['id_imp'];
                $numero_de_serie = $registro['numero_de_serie'];
                $setor = $registro['setor'];
                $marca = $registro['marca'];
                $ultima_manutencao = $registro['ultima_manutencao'];
                $problema = $registro['problema'];
                $peca_utilizada = $registro['peca_utilizada'];
                $status_de_conclusao = $registro['status_de_conclusao'];
                $contador_de_uso = $registro['contador_de_uso'];
                $rede = $registro['rede'];
                $ipv4_impressora = $registro['ipv4_impressora'];
                $observacao = $registro['observacao'];

                echo "<tr>";
                echo "<td>$id_imp</td>";
                echo "<td>$numero_de_serie</td>";
                echo "<td>
                <div class='obs-container'>
                    <i class='fa-solid fa-circle-info' style='cursor:pointer;' onclick=\"showObservacao('".htmlspecialchars($observacao, ENT_QUOTES)."')\"></i>
                </div>
                </td>";
                echo "<td>$setor</td>";
                echo "<td>$marca</td>";
                echo "<td>$ultima_manutencao</td>";
                echo "<td>$problema</td>";
                echo "<td>$peca_utilizada</td>";
                echo "<td>$status_de_conclusao</td>";
                echo "<td>$contador_de_uso</td>";
                echo "<td class='col-rede' data-rede='$rede' data-ipv4='$ipv4_impressora'>$rede</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table> 
    </div>
    <div class="observacao" id="observacaoModal" style="display:none;">
        <button class="observacao-fechar" onclick="fecharObservacao()">&times;</button>
        <div id="observacaoConteudo"></div>
    </div>
    <script src="../script.js"></script>
</body>
</html>