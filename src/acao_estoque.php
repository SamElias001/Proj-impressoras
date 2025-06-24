<?php
require_once("./classeimpressora.php");

$peca = new Pecas();
$estoque = new Estoque();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    if ($acao === 'inserir_peca') {
        $peca->inserirPeca(
            $_POST['nome_peca'],
            $_POST['marca_peca'],
            $_POST['descricao_peca'],
            $_POST['quantidade']
        );
        header("Location: gerenciamento.php?msg=Peça cadastrada");
        exit;
    }

    if ($acao === 'usar_peca') {
        // Reduz a quantidade no estoque
        $dados = $estoque->consultarEstoque($_POST['id_peca']);
        if ($dados) {
            $novaQtd = $dados['quantidade'] - intval($_POST['quantidade']);
            $estoque->atualizarEstoque($_POST['id_peca'], max(0, $novaQtd));
        }
        header("Location: gerenciamento.php?msg=Uso registrado");
        exit;
    }

    if ($acao === 'alterar_ou_excluir') {
        if (isset($_POST['alterar'])) {
            // Aqui você pode redirecionar para um formulário de alteração detalhada
            header("Location: gerenciamento.php?msg=Use o formulário de cadastro para alterar.");
            exit;
        }
        if (isset($_POST['excluir'])) {
            $peca->excluirPeca($_POST['id_peca']);
            $estoque->excluirEstoque($_POST['id_peca']);
            header("Location: gerenciamento.php?msg=Peça excluída");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['acao']) && $_GET['acao'] === 'consultar') {
    $id_peca = $_GET['id_peca'];
    // Aqui você pode buscar e exibir os dados, ou redirecionar para uma página de consulta
    // Exemplo:
    // $dados = $peca->consultarPeca($id_peca);
    header("Location: gerenciamento.php?msg=Consulta realizada");
    exit;
}
?>