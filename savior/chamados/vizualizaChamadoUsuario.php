<?php
    include('../banco/banco.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savior</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-primary bg-dark">
            <a class="navbar-brand offset-1 text-white" href="../painel-usuario.php">
                <img src="../img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior </h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="../usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>
    <section class="container">
    <br>
    <h1>Atualização do chamado</h1>
    <br>
        <?php
            $nu_chamado = $_GET['nu_chamado'];
            $select = "select a.id_chamado, e.nm_pessoa, d.nm_setor, a.ds_chamado, b.nm_status, c.dh_mudanca_status 
                                        from tb_chamado a, tb_status b, tb_chamado_status c, tb_setor d, tb_pessoa e
                                        where a.id_chamado = c.id_chamado 
                                        and b.id_status    = c.id_status 
                                        and a.id_setor     = d.id_setor
                                        and e.id_pessoa    = a.id_pessoa
                                        and a.id_chamado   = $nu_chamado;";

            $query = pg_query($conexao, $select);

            if(pg_num_rows($query) > 0){
                while($row = pg_fetch_array($query)){
                    $idChamado = $row["id_chamado"]; 
                    $nmPessoa  = $row["nm_pessoa"];
                    $nm_setor  = $row["nm_setor"];
                    $descricao = $row["ds_chamado"];
                    $nm_status = $row["nm_status"];
                    $alteracao = $row["dh_mudanca_status"];
                }
            }

        
        ?>

        <div class="form-group">
            <label class="form-label">Número do Chamado:</label>
            <input type="text" disabled  value="<?php echo $idChamado;?>" class="form-control">
        </div> 
        <div class="form-group">
            <label class="form-label">Aberto por:</label>
            <input type="text" disabled  value="<?php echo $nmPessoa;?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Setor Responsável:</label>
            <input type="text" disabled  value="<?php echo $nm_setor;?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Descrição:</label>
            <input type="text" disabled  value="<?php echo $descricao;?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Status:</label>
            <input type="text" disabled  value="<?php echo $nm_status;?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Aberto por:</label>
            <input type="text" disabled  value="<?php echo $alteracao;?>" class="form-control">
        </div>
    </section>
    
</body>
</html>