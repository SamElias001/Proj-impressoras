<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressoras</title>

    <link rel="stylesheet" href="./src/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: gray; display: flex;">
    <div class="tray">
        <div class="profile">
            <div class="profile-img" onclick=""></div>
        </div>

        <ul class="list">
            <li class="op-itens">
                <i class="fa-solid fa-print" onclick="window.location.href='./src/tabs/impressoras.php'"></i>
                <a href="./src/tabs/impressoras.php">
                    Impressoras
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./src/tabs/estoque.php'"></i>
                <a href="./src/tabs/estoque.php">
                    Estoque
                </a>
            </li>
            <li class="op-itens">
                <i class="fa-solid fa-file-pen" onclick="window.location.href='./src/tabs/gerenciamento.php'"></i>
                <a href="./src/tabs/gerenciamento.php">
                    Gerenciamento
                </a>
            </li>
        </ul>
    </div>

    <div class="content" style="align-items: center; justify-content: center;">
        <div class="container container-index">
            <ul class="list list-index">
                <li class="op-itens op-index">
                    <i class="fa-solid fa-print" onclick="window.location.href='./src/tabs/impressoras.php'"></i>
                    <a href="./src/tabs/impressoras.php">
                        Impressoras
                    </a>
                </li>
                <li class="op-itens op-index">
                    <i class="fa-solid fa-boxes-stacked" onclick="window.location.href='./src/tabs/estoque.php'"></i>
                    <a href="./src/tabs/estoque.php">
                        Estoque
                    </a>
                </li>
                <li class="op-itens op-index">
                    <i class="fa-solid fa-file-pen" onclick="window.location.href='./src/tabs/gerenciamento.php'"></i>
                    <a href="./src/tabs/gerenciamento.php">
                        Gerenciamento
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html