<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Solicitação de Pagamento</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <style media="print">
            .nao_imprimir {
                display: none;
            }
        </style>
        <script src="js.js"></script>
        
    </head>
    <body>
        <form id="cadastrar" name="cadastrar" action="cadastrar.php" method="post" >
            <input type="text" id="qntCampos" hidden="hidden" name="qntCampos" value="">
            <?php
                header ('Content-type: text/html; charset=UTF-8');
                include_once "class/pag.php";

                $pag = new pag();
                $pag->geraHtml();
                $pag->imprime();

            ?>       
        </form>
    </body>
</html>
