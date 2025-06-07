<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./src/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: darkcyan; display: flex;">
    <div class="tray">
        <div class="profile">
            <div class="profile-img" onclick=""></div>
            <div class="profile-name">Convidado</div>
        </div>

        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print" onclick="showContent('impressoras')"></i>
                <a href="#impressoras" onclick="showContent('impressoras')">
                    Impressoras
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./src/tabs/estoque.php'"></i>
                <a href="#estoque" onclick="showContent('estoque')">
                    Estoque
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen" onclick="window.location.href='./src/tabs/edicao.php'"></i>
                <a href="#edicao" onclick="showContent('edicao')">
                    Edição
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número de Série</th>
                    <th>Setor</th>
                    <th>Marca</th>
                    <th>Última Manutenção</th>
                    <th>Serviço</th>
                    <th>Peça</th>
                    <th>Status</th>
                    <th>Rede</th> 
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            <?php

            ?>
        </table> 
    </div>

    <script src="./src/script.js"></script>
</body>
</html>