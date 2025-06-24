<?php

class Impressoras
{
    private $id_imp;
    private $numero_de_serie;
    private $setor;
    private $marca;
    private $ultima_manutencao;
    private $problema;
    private $peca_utilizada;
    private $status_de_conclusao;
    private $rede;

    // GETs
    public function getIdImp() { return $this->id_imp; }
    public function getNumSerie() { return $this->numero_de_serie; }
    public function getSetor() { return $this->setor; }
    public function getMarca() { return $this->marca; }
    public function getUltimaManutencao() { return $this->ultima_manutencao; }
    public function getProblema() { return $this->problema; }
    public function getPecaUtilizada() { return $this->peca_utilizada; }
    public function getStatusDeConclusao() { return $this->status_de_conclusao; }
    public function getRede() { return $this->rede; }

    // SETs
    public function setIdImp($id_imp) { $this->id_imp = $id_imp; }
    public function setNumSerie($numero_de_serie) { $this->numero_de_serie = $numero_de_serie; }
    public function setSetor($setor) { $this->setor = $setor; }
    public function setMarca($marca) { $this->marca = $marca; }
    public function setUltimaManutencao($ultimaManutencao) { $this->ultima_manutencao = $ultimaManutencao; }
    public function setProblema($problema) { $this->problema = $problema; }
    public function setPecaUtilizada($pecaUtilizada) { $this->peca_utilizada = $pecaUtilizada; }
    public function setStatusDeConclusao($status_de_conclusao) { $this->status_de_conclusao = $status_de_conclusao; }
    public function setRede($rede) { $this->rede = $rede; }

    // Inserir impressora
    public function inserirImpressora($id_imp, $numero_de_serie, $setor, $marca, $ultima_manutencao, $problema, $peca_utilizada, $status_de_conclusao, $rede) {
        require("conexaobd.php");
        $comando = "INSERT INTO impressoras (id_imp, numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede) 
                    VALUES (:id_imp, :numero_de_serie, :setor, :marca, :ultima_manutencao, :problema, :peca_utilizada, :status_de_conclusao, :rede);";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_imp", $id_imp);
        $stmt->bindParam(":numero_de_serie", $numero_de_serie);
        $stmt->bindParam(":setor", $setor);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":ultima_manutencao", $ultima_manutencao);
        $stmt->bindParam(":problema", $problema);
        $stmt->bindParam(":peca_utilizada", $peca_utilizada);
        $stmt->bindParam(":status_de_conclusao", $status_de_conclusao);
        $stmt->bindParam(":rede", $rede);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Alterar impressora
    public function alterarImpressora($id_imp, $numero_de_serie, $setor, $marca, $ultima_manutencao, $problema, $peca_utilizada, $status_de_conclusao, $rede) {
        require("conexaobd.php");
        $comando = "UPDATE impressoras SET numero_de_serie=:numero_de_serie, setor=:setor, marca=:marca, ultima_manutencao=:ultima_manutencao, problema=:problema, peca_utilizada=:peca_utilizada, status_de_conclusao=:status_de_conclusao, rede=:rede WHERE id_imp=:id_imp;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_imp", $id_imp);
        $stmt->bindParam(":numero_de_serie", $numero_de_serie);
        $stmt->bindParam(":setor", $setor);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":ultima_manutencao", $ultima_manutencao);
        $stmt->bindParam(":problema", $problema);
        $stmt->bindParam(":peca_utilizada", $peca_utilizada);
        $stmt->bindParam(":status_de_conclusao", $status_de_conclusao);
        $stmt->bindParam(":rede", $rede);
        $stmt->execute();
        return $stmt->rowCount() == 1;
    }

    // Excluir impressora
    public function excluirImpressora($id_imp) {
        require("conexaobd.php");
        $comando = "DELETE FROM impressoras WHERE id_imp=:id_imp;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_imp", $id_imp);
        $stmt->execute();
        return $stmt->rowCount() == 1;
    }

    // Listar todas as impressoras
    public function listarImpressoras() {
        require("conexaobd.php");
        $comando = "SELECT * FROM impressoras ORDER BY ultima_manutencao;";
        $stmt = $pdo->prepare($comando);
        $stmt->execute();
        return $stmt;
    }

    // Consultar impressora por ID
    public function consultarImpressora($id_imp) {
        require("conexaobd.php");
        $comando = "SELECT * FROM impressoras WHERE id_imp=:id_imp;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_imp", $id_imp);
        $stmt->execute();
        if($stmt->rowCount() == 0) {
            $this->id_imp = 0;
            $this->numero_de_serie = "";
            $this->setor = "";
            $this->marca = "";
            $this->ultima_manutencao = "";
            $this->problema = "";
            $this->peca_utilizada = "";
            $this->status_de_conclusao = "";
            $this->rede = "";
            return false;
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function consultarImpressorasAvancado($filtros = []) {
        require("conexaobd.php");
        $comando = "SELECT * FROM impressoras WHERE 1=1";
        $params = [];

        if (!empty($filtros['id_imp'])) {
            $comando .= " AND id_imp = :id_imp";
            $params[':id_imp'] = $filtros['id_imp'];
        }
        if (!empty($filtros['numero_de_serie'])) {
            $comando .= " AND numero_de_serie = :numero_de_serie";
            $params[':numero_de_serie'] = $filtros['numero_de_serie'];
        }
        if (!empty($filtros['setor'])) {
            $comando .= " AND setor = :setor";
            $params[':setor'] = $filtros['setor'];
        }
        if (!empty($filtros['marca'])) {
            $comando .= " AND marca = :marca";
            $params[':marca'] = $filtros['marca'];
        }
        if (!empty($filtros['ultima_manutencao'])) {
            $comando .= " AND ultima_manutencao = :ultima_manutencao";
            $params[':ultima_manutencao'] = $filtros['ultima_manutencao'];
        }
        if (!empty($filtros['rede'])) {
            $comando .= " AND rede = :rede";
            $params[':rede'] = $filtros['rede'];
    }

    // Adicione outros filtros conforme necessário
    $stmt = $pdo->prepare($comando);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

class Pecas
{
    private $id_peca;
    private $nome_peca;
    private $marca_peca;
    private $descricao_peca;

    // GETs
    public function getIdPeca() { return $this->id_peca; }
    public function getNomePeca() { return $this->nome_peca; }
    public function getMarcaPeca() { return $this->marca_peca; }
    public function getDescricaoPeca() { return $this->descricao_peca; }

    // SETs
    public function setIdPeca($id_peca) { $this->id_peca = $id_peca; }
    public function setNomePeca($nome_peca) { $this->nome_peca = $nome_peca; }
    public function setMarcaPeca($marca_peca) { $this->marca_peca = $marca_peca; }
    public function setDescricaoPeca($descricao_peca) { $this->descricao_peca = $descricao_peca; }

    // Inserir peça
    public function inserirPeca($nome_peca, $marca_peca, $descricao_peca) {
        require("conexaobd.php");
        $comando = "INSERT INTO pecas (nome_peca, marca_peca, descricao_peca) VALUES (:nome_peca, :marca_peca, :descricao_peca);";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":nome_peca", $nome_peca);
        $stmt->bindParam(":marca_peca", $marca_peca);
        $stmt->bindParam(":descricao_peca", $descricao_peca);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Listar todas as peças
    public function listarPecas() {
        require("conexaobd.php");
        $comando = "SELECT * FROM pecas;";
        $stmt = $pdo->prepare($comando);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consultar peça por ID
    public function consultarPeca($id_peca) {
        require("conexaobd.php");
        $comando = "SELECT * FROM pecas WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Alterar peça
    public function alterarPeca($id_peca, $nome_peca, $marca_peca, $descricao_peca) {
        require("conexaobd.php");
        $comando = "UPDATE pecas SET nome_peca = :nome_peca, marca_peca = :marca_peca, descricao_peca = :descricao_peca WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->bindParam(":nome_peca", $nome_peca);
        $stmt->bindParam(":marca_peca", $marca_peca);
        $stmt->bindParam(":descricao_peca", $descricao_peca);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Excluir peça
    public function excluirPeca($id_peca) {
        require("conexaobd.php");
        $comando = "DELETE FROM pecas WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}

class Estoque
{
    private $id_estoque;
    private $id_peca;
    private $quantidade;

    // GETs
    public function getIdEstoque() { return $this->id_estoque; }
    public function getIdPeca() { return $this->id_peca; }
    public function getQuantidade() { return $this->quantidade; }

    // SETs
    public function setIdEstoque($id_estoque) { $this->id_estoque = $id_estoque; }
    public function setIdPeca($id_peca) { $this->id_peca = $id_peca; }
    public function setQuantidade($quantidade) { $this->quantidade = $quantidade; }

    // Inserir item no estoque
    public function inserirEstoque($id_peca, $quantidade) {
        require("conexaobd.php");
        $comando = "INSERT INTO estoque (id_peca, quantidade) VALUES (:id_peca, :quantidade);";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Atualizar quantidade do estoque
    public function atualizarEstoque($id_peca, $quantidade) {
        require("conexaobd.php");
        $comando = "UPDATE estoque SET quantidade = :quantidade WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Listar estoque com nome da peça e marca (JOIN)
    public function listarEstoque() {
        require("conexaobd.php");
        $comando = "SELECT e.id_estoque, p.nome_peca, p.marca_peca, e.quantidade
                    FROM estoque e
                    JOIN pecas p ON e.id_peca = p.id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consultar item do estoque por id_peca
    public function consultarEstoque($id_peca) {
        require("conexaobd.php");
        $comando = "SELECT * FROM estoque WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Excluir item do estoque
    public function excluirEstoque($id_peca) {
        require("conexaobd.php");
        $comando = "DELETE FROM estoque WHERE id_peca = :id_peca;";
        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_peca", $id_peca);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>

// Necessita ajustes

public function consultarImpressorasAvancado($filtros = []) {
    require("conexaobd.php");
    $comando = "SELECT * FROM impressoras WHERE 1=1";
    $params = [];

    if (!empty($filtros['id_imp'])) {
        $comando .= " AND id_imp = :id_imp";
        $params[':id_imp'] = $filtros['id_imp'];
    }
    if (!empty($filtros['numero_de_serie'])) {
        $comando .= " AND numero_de_serie = :numero_de_serie";
        $params[':numero_de_serie'] = $filtros['numero_de_serie'];
    }
    if (!empty($filtros['setor'])) {
        $comando .= " AND setor = :setor";
        $params[':setor'] = $filtros['setor'];
    }
    if (!empty($filtros['marca'])) {
        $comando .= " AND marca = :marca";
        $params[':marca'] = $filtros['marca'];
    }
    if (!empty($filtros['ultima_manutencao'])) {
        $comando .= " AND ultima_manutencao = :ultima_manutencao";
        $params[':ultima_manutencao'] = $filtros['ultima_manutencao'];
    }
    if (!empty($filtros['rede'])) {
        $comando .= " AND rede = :rede";
        $params[':rede'] = $filtros['rede'];
    }
    // Adicione outros filtros conforme necessário

    $stmt = $pdo->prepare($comando);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Exemplo de uso:
$filtros = [
    'setor' => 'Elz_M - Enferm',
    'rede' => 'Sim',
    'marca' => 'Samsung'
];
$resultado = $impressora->consultarImpressorasAvancado($filtros);