
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

    <?php
        include("../banco/banco.php");
        include("../usuarios/verifica-login-adm.php");
    ?>
    

</head>
<body>

    <header>
        <nav class="navbar navbar-primary bg-dark">
            <a class="navbar-brand offset-1 text-white" href="../painel-adm.php">
                <img src="../img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior</h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="../usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>
    <br><br>
    <section class="container">
        
            <form class="row g-3" action="chamadosSetor.php" method="GET">
                <div class="col-auto">
                    <label>Número do Chamado:</label>
                    <input type="number" placeholder="Número do chamado" name="nuChamado" class="form-control">
                </div>
                <div class="col-auto">
                    <label>Palavra Chave:</label>
                    <input type="text" placeholder="Palavra" name="chave" class="form-control">
                </div>
                <div class="col-auto">
                    <label>Status:</label>
                    <select name="status" class="form-control">
                        <option value="null">Selecione</option>
                        <option value="1">Aberto</option>
                        <option value="2">Aberto - com modificação</option>
                        <option value="3">Encerrado</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label>Última Modificação:</label>
                    <select name="ordenar" class="form-control">
                        <option value="null">Selecione</option>
                        <option value="1">Mais Recentes</option>
                        <option value="2">Mais antigos</option>
                    </select>
                </div>
                <div class="col-auto">
                    <br>
                    <input type="submit" value="Buscar" name="enviar" class="btn btn-primary mb-3">
                </div>
            </form>
            <br>
            <button type="submit" class="btn btn-large btn-primary mb-3"  data-bs-toggle="modal" data-bs-target="#newchamadoModal">Novo chamado</button>
            
        
        
    <?php

        $filtro1 = " ";
        $filtro2 = " ";
        $filtro3 = " ";
        $filtro4 = " ";
        if(isset($_GET['enviar'])){ 
        
            if($_GET['nuChamado'] != null){
                $nuChamado = $_GET['nuChamado'];
                $filtro1 = " and a.id_chamado = $nuChamado ";
            }else {
                $filtro1 = "";
            }

            if(isset($_GET['status'])){
                if($_GET['status'] == '1'){
                    $filtro2 = " and b.id_status = 1 ";
                }elseif ($_GET['status'] == '2') {
                    $filtro2 = " and b.id_status = 2 ";
                }elseif ($_GET['status'] == '3') {
                    $filtro2 = " and b.id_status = 3 ";
                }elseif ($_GET['status'] == 'null') {
                    $filtro2 = "";
                }
            }

            if(isset($_GET['ordenar'])){
                if($_GET['ordenar'] == '1'){
                    $filtro3 = " ORDER BY c.dh_mudanca_status DESC ";
                }elseif ($_GET['ordenar'] == '2') {
                    $filtro3 = " ORDER BY c.dh_mudanca_status ASC ";
                }elseif ($_GET['ordenar'] == 'null') {
                    $filtro3 = " ";
                }
            }

            if($_GET['chave'] != null){
                $pChave = $_GET['chave'];
                
                $filtro4 = " and a.ds_chamado like '%$pChave%'";
            }else {
                $filtro4 = "";
            }
            
            


        }





        if(!$_SESSION['matricula']){
            session_start();
        }   

        $matricula = $_SESSION['matricula'];

        //{idpretorna id do usuario logado
        $select = "select id_pessoa from tb_pessoa where nu_matricula = '$matricula';";
        $query  = pg_query($conexao, $select);
        while($row = pg_fetch_array($query)) 
        {
            $idPessoa = $row['id_pessoa'];
        }


        //retorna id do setor usuario logado
        $select2 = "select a.id_setor from tb_setor a, tb_pessoa b where a.id_setor = b.id_setor and b.id_pessoa = $idPessoa ";
        $query2  = pg_query($conexao, $select2);
        while($row = pg_fetch_array($query2)) 
        {
            $idSetor = $row['id_setor'];
        }


        $selectPrincipal = "select a.id_chamado, e.nm_pessoa, d.nm_setor, a.ds_chamado, b.nm_status, c.dh_mudanca_status
                                                                    from tb_chamado a, tb_status b, tb_chamado_status c, tb_setor d, tb_pessoa e
                                                                    where a.id_chamado = c.id_chamado 
                                                                    and a.id_pessoa    = e.id_pessoa
                                                                    and b.id_status    = c.id_status 
                                                                    and a.id_setor     = d.id_setor
                                                                    and d.id_setor     = $idSetor"
                                                                    .$filtro1
                                                                    .$filtro2
                                                                    .$filtro4
                                                                    .$filtro3;

        $queryPrincipal = pg_query($conexao, $selectPrincipal);
                

                

                
                
                            echo "<table class='table'>";
                                echo "<thead class='bg-secondary text-dark'>";
                                    echo "<tr>";
                                        echo "<th scope='col'>";
                                            echo "Número do Chamado";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Aberto por";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Setor Responsável";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Descrição do Chamado";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Status do Chamado";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Última alteração";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "Ações";
                                        echo "</th>";
                                        echo "<th>";
                                            echo "";
                                        echo "</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody class='bg-light text-dark'>";
                                    while($row = pg_fetch_array($queryPrincipal)) 
                                    {
                                        $id_chamado = $row['id_chamado'];
                                        $nm_pessoa  = $row['nm_pessoa'];
                                        $nm_setor   = $row['nm_setor'];
                                        $descricao  = $row['ds_chamado'];
                                        $nm_status  = $row['nm_status'];
                                        $alteracao  = $row['dh_mudanca_status'];
                
                                        echo "<tr>";
                                            echo "<td>";
                                                echo $id_chamado;
                                            echo "</td>";
                                            echo "<td>";
                                                echo $nm_pessoa;
                                            echo "</td>";
                                            echo "<td>";
                                                echo $nm_setor;
                                            echo "</td>";
                                            echo "<td>";
                                                echo $descricao;
                                            echo "</td>";
                                            echo "<td>";
                                                echo $nm_status;
                                            echo "</td>";
                                            echo "<td>";
                                                echo $alteracao;
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<a href='retornaChamado.php?nu_chamado=$id_chamado'>Editar</a>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<a href='vizualizaChamado.php?nu_chamado=$id_chamado'>Vizualizar</a>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";
                            echo "</table>";
        ?>
    </section>

    <div class="modal fade" id="newchamadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Chamado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-8 bg-white text-left p-2 offset-2">
                        <form action="cadastroChamadoAdm.php" method="post">
                            <div class="form-group">
                                <p class="text-start">Para qual setor abrir o chamado?</p>
                                <select name="setor" id="setor" class="form-control shadow-sm">
                                    <option value="null">Selecione</option>
                                    <?php
                                        include ("../model/banco.php");

                                        $select = "select * from tb_setor";
                                        $query  = pg_query($conexao, $select);
                                        while($row = pg_fetch_array($query)) 
                                        {
                                    ?>
                                            <option value="<?php echo $row['id_setor']; ?>"><?php echo $row['nm_setor']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <p class="text-start">Descrição:</p>
                                <textarea type="text" class="form-control shadow-sm" placeholder="Descrição do chamado" name="msg"></textarea>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary btn-lg">Escalar</button>
                            </div>
                        </form>      
                    </div>
                </div>            
            </div>
        </div>
    </div>
</body>
</html>