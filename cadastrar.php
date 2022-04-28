<?php
header ('Content-type: text/html; charset=UTF-8');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "model/conexao.php";
include_once "controller/cadastra.php";

/* DADOS CADASTRO */
$solicitante = $_POST["solicitante"];
$fornecedor = $_POST["fornecedor"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$base = $_POST["base"];
$cpfcnpj = $_POST["cpfcnpj"];
$dataCompra = $_POST["dataCompra"];
$numeroDocumento = $_POST["numeroDocumento"];
$obs = $_POST["obs"];
$qntCampos=$_POST["qntCampos"];
$dataSolicitacao = date("d/m/Y");
$dataVencimento = $_POST["dataVencimento"];
$formaPagamento = $_POST["formaPagamento"];

@$item[$qntCampos];
@$conta[$qntCampos];
@$custo[$qntCampos];
@$departamento[$qntCampos];
@$valor[$qntCampos];

$n=0;

//ITENS
for($n=0;$n<=$qntCampos;$n++){
    if(@$_POST["item".$n.""]!=""){
        $item[$n] = $_POST["item".$n.""];
    }
}
//PLANO DE CONTAS
for($n=0;$n<=$qntCampos;$n++){
    if(@$_POST["item".$n.""]!=""){
        $conta[$n] = $_POST["conta".$n.""];
    }
}
//CENTRO DE CUSTO
for($n=0;$n<=$qntCampos;$n++){
    if(@$_POST["item".$n.""]!=""){
        $custo[$n] = $_POST["custo".$n.""];
    }
}
//DEPARTAMENTO
for($n=0;$n<=$qntCampos;$n++){
    if(@$_POST["item".$n.""]!=""){
        $departamento[$n] = $_POST["departamento".$n.""];
    }
}
//VALOR
for($n=0;$n<=$qntCampos;$n++){
    if(@$_POST["item".$n.""]!=""){
        $valor[$n] = $_POST["valor".$n.""];
    }
}

/* CONEXÂO */
$conexao = new conexao();
$conexao->conecta();

/* INSERIR NO BANCO */
$conexao->inserir($solicitante,$fornecedor,$endereco,$telefone,$base,$cpfcnpj,$dataCompra,$dataVencimento,$formaPagamento,$numeroDocumento,$item,$obs,$dataSolicitacao,$qntCampos,$conta,$custo,$departamento,$valor);

echo "<script>alert('Solicitação Cadastrada com Sucesso!');window.print();window.location.assign('../solicitacao/');</script>";

?>