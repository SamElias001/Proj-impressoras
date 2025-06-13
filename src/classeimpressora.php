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
    public function getIdImp(){
        return $this->id_imp;
    }
    public function getNumSerie()
    {
        return $this->numero_de_serie;
    }
    public function getSetor()
    {
        return $this->setor;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getUltimaManutencao()
    {
        return $this->ultima_manutencao;
    }
    public function getProblema()
    {
        return $this->problema;
    }
    public function getPecaUtilizada() 
    {
        return $this->peca_utilizada;
    }
    public function getStatusDeConclusao()
    {
        return $this->status_de_conclusao;
    }
    public function getRede()
    {
        return $this->rede;
    }




    // SETs
    public function setIdImp($id_imp)
    {
        $this->id_imp = $id_imp;
    }
    public function setNumSerie($num_serie)
    {
        $this->numero_de_serie = $num_serie;
    }
    public function setSetor($setor)
    {
        $this->setor = $setor;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setUltimaManutencao($ultimaManutencao)
    {
        $this->ultima_manutencao = $ultimaManutencao;
    }
    public function setProblema($problema)
    {
        $this->problema = $problema;
    }
    public function setPecaUtilizada($pecaUtilizada)
    {
        $this->peca_utilizada = $pecaUtilizada;
    }
    public function setStatusDeConclusao($status_de_conclusao)
    {
        $this->status_de_conclusao = $status_de_conclusao;
    }
   public function setRede($rede)
    {
        $this->rede = $rede;
    }
    




    /* Métodos:
    InserirImpressora()
    AlterarImpressora()
    ExcluirImpressora()
    ListarImpressoras()
    ConsultarImpressora()
    */

    public function inserirImpressora($id_imp, $numero_de_serie, $setor, $marca, $ultima_manutencao, $problema, $peca_utilizada, $status_de_conclusao, $rede) {
        require("conexaobd.php");
        $comando = "INSERT INTO impressoras (id_imp, numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede) VALUES (:id_imp, :numero_de_serie, :setor, :marca, :ultima_manutencao, :problema, :peca_utilizada, :status_de_conclusao, :rede);";

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

        if($stmt->rowCount() > 0) {
            $retorna = true;
        } else {
            $retorna = false;
        }
        return $retorna;
    }

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

        if($stmt->rowCount() == 1){
            $retorna = true;
        } else {
            $retorna = false;
        }
        return $retorna; 
    }

    public function excluirImpressora($id_imp) {
        require("conexaobd.php");

        $comando = "DELETE FROM impressoras WHERE id_imp=:id_imp;";

        $stmt = $pdo->prepare($comando);
        $stmt->bindParam(":id_imp", $id_imp);

        $stmt->execute();

        if($stmt->rowCount() == 1){
            $retorna = true;
        } else {
            $retorna = false;
        }
        return $retorna;
    }

    public function listarImpressoras() {
        require("conexaobd.php");

        $comando = "SELECT * FROM impressoras; ORDER BY ultima_manutencao;";

        $stmt = $pdo->prepare($comando);

        $stmt->execute();

        return $stmt;
    }

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
            $retorna = false;
        }   else {
            return $retorna;
        }
    }
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