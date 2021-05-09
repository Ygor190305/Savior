<?php
    include("banco/banco.php");

    $matricula   = $_POST["matricula"];
    $novaSenha   = $_POST["novaSenha"];
    $contraSenha = $_POST["contraSenha"];
    

    $update = "update tb_pessoa set ps_pessoa = md5('$novaSenha') where nu_matricula = '$matricula';";

    if($novaSenha == $contraSenha){
        $query = pg_query($conexao, $update);
        header('Location: painel-adm.php');
    }else{
        header('Location: painel-adm.php');
    }
    

    
?>