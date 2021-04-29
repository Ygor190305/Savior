<?php
    session_start();
    include('../banco/banco.php');

    if(empty($_POST['matricula']) || empty($_POST['senha'])){
        header('Location: telaLogin.php');
        exit();
    }

    $matricula = $_POST['matricula'];
    $senha     = $_POST['senha'];
    
    $query1 = "select * from tb_pessoa where nu_matricula = '$matricula' and ps_pessoa = md5('$senha') and fl_adm = true;";
    $query2 = "select * from tb_pessoa where nu_matricula = '$matricula' and ps_pessoa = md5('$senha') and fl_adm = false;";


    $result1 = pg_query($conexao, $query1);
    $result2 = pg_query($conexao, $query2);

    $row1 = pg_num_rows($result1);
    $row2 = pg_num_rows($result2);


    if($row1 == 1){
        $_SESSION['matricula'] = $matricula;
        $_SESSION['matricula2'] = $matricula;
        header('Location: ../painel-adm.php');
        exit();
    }elseif($row2 == 1){
        $_SESSION['matricula'] = $matricula;
        $_SESSION['matricula3'] = $matricula;
        header('Location: ../painel-usuario.php');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: telaLogin.php');
        exit();
    }