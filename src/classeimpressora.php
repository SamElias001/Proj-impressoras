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

    public function getIdImp()
    {
        return $this->id_imp;
    }

    public function
}

class Pecas {
    private $id_peca;
    private $nome;
    private $marca;
    private $descricao;
}

class Estoque {
    private $id_estoque;
    private $id_peca;
    private $quantidade;
}
?>