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

<body style="background-color: darkcyan; display: flex;">
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

    <div class="content" id="estoque">
        <div class="container">
            <ul class="op-edit">
                <li onclick="">Impressoras</li>
                <li onclick="">Estoque</li>
            </ul>

            <form action=""></form>

        </div>
    </div>

    <script src="./src/script.js"></script>
</body>
</html>