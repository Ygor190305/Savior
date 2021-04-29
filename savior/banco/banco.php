<?php

    $conn = "host=200.19.1.18 port=5432 dbname=ygorm user=ygorm password=gremio1903";
    
    try{
        $conexao = pg_connect($conn);
        if(!$conexao)
        {
            echo "Falha na conexão com o banco de dados";
        }
    }catch(Exception $e){
        echo "Exceção capturada:".$e;
    }
    



?>