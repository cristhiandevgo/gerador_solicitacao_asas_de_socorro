<?php
header ('Content-type: text/html; charset=UTF-8');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao
 *
 * @author IVAN
 */
class conexao {
    
    public $db;
    public $usuario = "solicitacao";
    public $senha = "solicitacao";
    public $host = "sistemas";
    public $dbname = "solicitacao";
    
    public function conecta(){
        try{
            $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->usuario, $this->senha);
        }catch (PDOException $e) {
            echo "Falha na conexão com o banco de dados!<br>";
            print "Erro: " . $e->getMessage() . "<br/>";
            die();            
        }
    }//FIM CONECTA
    
    public function inserir($solicitante,$fornecedor,$endereco,$telefone,$base,$cpfcnpj,$dataCompra,$dataVencimento,$formaPagamento,$numeroDocumento,$item,$obs,$dataSolicitacao,$qntCampos,$conta,$custo,$departamento,$valor){
        $sql = "INSERT INTO `solicitacao`(`solicitante`, `fornecedor`, `endereco`, `telefone`, `base`, `cpfcnpj`, `numeroDocumento`, `dataCompra`, `dataVencimento`, `formaPagamento`, `dataSolicitacao`, `obs`) VALUES ('$solicitante','$fornecedor','$endereco','$telefone','$base','$cpfcnpj','$numeroDocumento','$dataCompra','$dataVencimento','$formaPagamento','$dataSolicitacao','$obs');";
        $sql2 = "SELECT idsolicitacao FROM solicitacao ORDER BY idsolicitacao DESC LIMIT 1;";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $stmt = $this->db->prepare($sql2);
        $stmt->execute();
        $res = $stmt->fetchObject();
            
        for($n=0;$n<=$qntCampos;$n++){
            if(@$item[$n]){
                @$sql3 = "INSERT INTO item(solicitacao_idsolicitacao,item,planoContas,centroCusto,departamento,valor) VALUES ('$res->idsolicitacao','$item[$n]','$conta[$n]','$custo[$n]','$departamento[$n]','$valor[$n]');";
                @$stmt = $this->db->prepare($sql3);
                @$stmt->execute();
            }
        }
        
    }
    
}
