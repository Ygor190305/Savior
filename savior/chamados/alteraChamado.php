<?php
    include("../banco/banco.php");

    $nuChamado  = $_GET['idChamado'];
    $setor      = $_GET['setor'];
    date_default_timezone_set('America/Sao_Paulo');
    $timeAtual  = date('d-m-Y H:i');
    $descricao  = $_GET['msg'];
    $status     = $_GET['status'];

    $update1 = "update tb_chamado
               set id_setor = $setor, ds_chamado = '$descricao'
               where id_chamado = $nuChamado ; ";

    $query1  = pg_query($conexao, $update1);

    $update2 = "update tb_chamado_status
    set dh_mudanca_status = '$timeAtual', id_status = $status
    where id_chamado = $nuChamado ; ";

    $query2  = pg_query($conexao, $update2);

    if($query1 && $query2){
        header("Location: ./painel-adm.php");
    }else{
        echo "Erro na alteração";
        echo "<a href='../painel-adm.php'>Voltar para a página inicial</a>";
    }
    

    
?>
