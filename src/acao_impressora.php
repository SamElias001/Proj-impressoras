<?php
require_once("./classeimpressora.php");

$impressora = new Impressoras();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    if ($acao === 'inserir') {
        $impressora->inserirImpressora(
            null,
            $_POST['numero_de_serie'],
            $_POST['setor'],
            $_POST['marca'],
            $_POST['ultima_manutencao'],
            $_POST['problema'],
            $_POST['peca_utilizada'],
            $_POST['status_de_conclusao'],
            $_POST['rede']
//colocar novas atribuições 
        );
        header("Location: gerenciamento.php?msg=Impressora cadastrada");
        exit;
    }

    if ($acao === 'atualizar') {
        $impressora->alterarImpressora(
            null,
            $_POST['numero_de_serie'],
            null,
            null,
            $_POST['ultima_manutencao'],
            $_POST['problema'],
            $_POST['peca_utilizada'],
            $_POST['status_de_conclusao'],
            null
        );
        header("Location: gerenciamento.php?msg=Manutenção atualizada");
        exit;
    }

    if ($acao === 'alterar_ou_excluir') {
        if (isset($_POST['alterar'])) {
            // Aqui você pode redirecionar para um formulário de alteração detalhada
            header("Location: gerenciamento.php?msg=Use o formulário de atualização para alterar.");
            exit;
        }
        if (isset($_POST['excluir'])) {
            $impressora->excluirImpressora($_POST['id_imp']);
            header("Location: gerenciamento.php?msg=Impressora excluída");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['acao']) && $_GET['acao'] === 'consultar') {
    $numero_de_serie = $_GET['numero_de_serie'];
    // Aqui você pode buscar e exibir os dados, ou redirecionar para uma página de consulta
    // Exemplo:
    // $dados = $impressora->consultarImpressoraPorNumeroSerie($numero_de_serie);
    header("Location: gerenciamento.php?msg=Consulta realizada");
    exit;
}
?>