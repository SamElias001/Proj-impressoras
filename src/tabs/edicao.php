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
                <i class="fa-solid fa-print" onclick="window.location.href='../../index.php'"></i>
                <a href="../../index.php">
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
                    Edição
                </a>
            </li>
        </ul>
    </div>

    <div class="content" id="edicao">
        <div class="container container-edicao">
            <ul class="op-edit">
                <li onclick="">Impressoras</li>
                <li onclick="">Estoque</li>
            </ul>

            <div class="content-edit">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="serial">Número de Série:</label>
                        <input type="text" id="serial" name="serial" required>

                        <label for="setor">Setor:</label>
                        <input type="text" id="setor" name="setor" required>

                        <label for="marca">Marca:</label>
                        <select id="marca" name="marca" required>
                            <option value="marcaSamsung">Samsung</option>
                            <option value="marcaHP">HP</option>
                            <option value="marcaEpson">Epson</option>
                        </select>

                        <label for="ultima_manutencao">Última Manutenção:</label>
                        <input type="date" id="ultima_manutencao" name="ultima_manutencao" required>

                        <label for="servico">Serviço:</label>
                        <input type="text" id="servico" name="servico" required>

                        <label for="peca">Peça:</label>
                        <input type="text" id="peca" name="peca" required>

                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="operacional">Operacional</option>
                            <option value="manutencao">Em Manutenção</option>
                            <option value="inativo">Inativo</option>
                        </select>

                        <label for="rede">Rede:</label>
                        <select id="rede" name="rede" required>
                            <option value="redeOn">Rede</option>
                            <option value="redeOff">USB</option>
                            <option value="redeUnk">Não verificado</option>
                        </select>

                        <button type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./src/script.js"></script>
</body>
</html>