<?php

    include("../banco/banco.php");
    include("../usuarios/verifica-login-adm.php");

    if(!$_SESSION['matricula']){
       session_start();
    } 

   
    
    
    $matricula = $_SESSION['matricula'];
    $select = "select id_pessoa from tb_pessoa where nu_matricula = '$matricula'";
    $query1 = pg_query($conexao, $select);

    

    if(pg_num_rows($query1) > 0){
        while($row = pg_fetch_array($query1)){
            $idPessoa = $row["id_pessoa"]; 
        }
    }

    $setor        = $_POST['setor'];
    $descricao    = $_POST['msg'];
    
    date_default_timezone_set('America/Sao_Paulo');
    $timeAtual = date('d-m-Y H:i');

    $insert1 = "insert into tb_chamado(id_setor,dh_abertura,ds_chamado,id_pessoa) values($setor, '$timeAtual', '$descricao', $idPessoa);";
    $query2 = pg_query($conexao, $insert1);  
    
    $select2 = "select id_chamado from tb_chamado ORDER BY id_chamado DESC limit 1;";

    $query3 = pg_query($conexao, $select2);

    if(pg_num_rows($query3) > 0){
        while($row = pg_fetch_array($query3)){
            $idChamado = $row["id_chamado"];  
        }
    } 

    $insert2 = "insert into tb_chamado_status(id_chamado,id_status,dh_mudanca_status) values($idChamado,1,'$timeAtual');";
    $query4 = pg_query($conexao, $insert2);

    header('Location: chamadosSetor.php');
    
?>