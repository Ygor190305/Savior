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
            $id = $row["id_pessoa"]; 
        }
    }

    date_default_timezone_set('America/Sao_Paulo');
    $time_ab  = date('d-m-Y H:i');
    $mensagem = $_POST['msg'];
    $time_enc = $_POST['time_enc'];
    
    
    $insert = "insert into tb_aviso (ds_aviso, dh_publicacao, dh_retirada, id_pessoa) values ('$mensagem','$time_ab','$time_enc','$id');";
    
    try{
        $query2 = pg_query($conexao, $insert);
        if($query2){           
            header('Location:../painel-adm.php');
        }else{
            echo "<script>alert('Falha ao enviar Mensagem')</script>";
        }
        }catch(Exception $e){
            echo $e;
    }
    


   
        
        
    
    
?>
<html>
    <head>
        <script>
            function retornar() {
                window.history.back();
            }
        </script>
    </head>
        <body>
            <button onclick="location.href = document.referrer;">Voltar</button>
        </body>
</html>