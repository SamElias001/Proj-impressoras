<?php
require_once("../classeimpressora.php");

$impressora = new Impressoras();
$dados = [
    "id_imp" => "",
    "numero_de_serie" => "",
    "setor" => "",
    "marca" => "",
    "ultima_manutencao" => "",
    "problema" => "",
    "peca_utilizada" => "",
    "status_de_conclusao" => "",
    "rede" => ""
];

// Carrega dados se veio por GET
if (isset($_GET['id_imp'])) {
    require("../conexaobd.php");
    $id_imp = $_GET['id_imp'];
    $stmt = $pdo->prepare("SELECT * FROM impressoras WHERE id_imp = :id_imp");
    $stmt->bindParam(":id_imp", $id_imp);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>

    <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: gray; display: flex;">
    <div class="tray">
        <div class="profile">
            <div class="profile-img" onclick=""></div>
            <div class="profile-name">Convidado</div>
        </div>

        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print" onclick="window.location.href='./impressoras.php'"></i>
                <a href="./impressoras.php">
                    Impressoras
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./estoque.php'"></i>
                <a href="./estoque.php">
                    Estoque
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen"></i>
                <a href="">
                    Gerenciamento
                </a>
            </li>
        </ul>
    </div>

    <div class="content" id="edicao">
        <div class="container container-gerenciamento">
            <ul class="op-edit">
                <li onclick="">Impressoras</li>
                <li onclick="">Estoque</li>
            </ul>

            <div class="content-edit">
                <form action="" method="post">
                    <input type="hidden" name="id_imp" value="<?php echo htmlspecialchars($dados['id_imp']); ?>">
                    <div class="form-group">
                        <label for="serial">Número de Série:</label>
                        <input type="text" id="serial" name="serial" style="text-transform: uppercase;" required value="<?php echo htmlspecialchars($dados['numero_de_serie']); ?>" readonly>

                        <label for="setor">Setor:</label>
                        <input type="text" id="setor" name="setor" required value="<?php echo htmlspecialchars($dados['setor']); ?>">

                        <label for="marca">Marca:</label>
                        <select id="marca" name="marca" required>
                            <option value="Samsung" <?php if($dados['marca']=='Samsung') echo 'selected'; ?>>Samsung</option>
                            <option value="HP" <?php if($dados['marca']=='HP') echo 'selected'; ?>>HP</option>
                            <option value="Epson" <?php if($dados['marca']=='Epson') echo 'selected'; ?>>Epson</option>
                        </select>

                        <label for="ultima_manutencao">Última Manutenção:</label>
                        <input type="date" id="ultima_manutencao" name="ultima_manutencao" required value="<?php echo htmlspecialchars($dados['ultima_manutencao']); ?>">

                        <label for="servico">Serviço:</label>
                        <input type="text" id="servico" name="servico" required value="<?php echo htmlspecialchars($dados['problema']); ?>">

                        <label for="peca">Peça:</label>
                        <input type="text" id="peca" name="peca" required value="<?php echo htmlspecialchars($dados['peca_utilizada']); ?>">

                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="Pendente" <?php if($dados['status_de_conclusao']=='Pendente') echo 'selected'; ?>>Pendente</option>
                            <option value="Em andamento" <?php if($dados['status_de_conclusao']=='Em andamento') echo 'selected'; ?>>Em andamento</option>
                            <option value="Feito" <?php if($dados['status_de_conclusao']=='Feito') echo 'selected'; ?>>Feito</option>
                        </select>

                        <label for="rede">Rede:</label>
                        <select id="rede" name="rede" required>
                            <option value="Sim" <?php if($dados['rede']=='Sim') echo 'selected'; ?>>Rede</option>
                            <option value="Não" <?php if($dados['rede']=='Não') echo 'selected'; ?>>USB</option>
                        </select>

                        <button type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
</body>
</html>