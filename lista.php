<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "./pag.php";

$pagina = $_GET["pagina"];

if($pagina=="centroCusto"){
    $pag = new pag();
    $pag->centroCusto();
    $pag->imprimeCentroCusto();
}

if($pagina=="planoContas"){
    $pag = new pag();
    $pag->planoContas();
    $pag->imprimePlanoContas();
}

