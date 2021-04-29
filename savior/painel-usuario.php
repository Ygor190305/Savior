<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savior</title>

    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-primary bg-dark">
            <a class="navbar-brand offset-1 text-white" href="#">
                <img src="img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior</h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>

    <br>
    <br>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-2 bg-white border border-white">
                <a href="chamados/chamadosMatricula.php" class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/chamado.png" alt="">
                    <h4 class="w-100">Chamados</h4>
                </a>
                <br>
                <a href="duvidas-frequentes.php" class="row bg-secondary border border-white text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/question-mark-regular-132.png" alt="">
                    <h4 class="w-100">Dúvidas</h4>
                </a>
            </div>
            <div href="contatos-usuario.php" class="col-2 bg-white border border-white offset-1">
                <a  href="contatos-usuario.php" class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/telefone.png">
                    <h4 class="w-100">Contatos</h4>
                </a>
                <br>
                <a href="http://api.whatsapp.com/send?1=pt_BR&phone=5551998882738." class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/whatsapp.png">
                    <h4 class="w-100">Suporte</h4> 
                </a>

            </div>
            <div class="col-6 bg-light border border-white offset-1 shadow-lg">
                <div class="row text-center"><h1 class="text-dark">Mural de Avisos</h1></div>  
                <?php
                        
                    include("banco/banco.php"); 
                    include("usuarios/verifica-login-usuario.php");

                    if(!$_SESSION['matricula']){
                        session_start();
                    }   
                                
                    $select = "select b.nm_pessoa, c.nm_setor, a.ds_aviso, a.dh_publicacao, a.dh_retirada from tb_aviso a,tb_pessoa b, tb_setor c where a.id_pessoa = b.id_pessoa and b.id_setor = c.id_setor";
                    $query1 = pg_query($conexao, $select);

                    if(pg_num_rows($query1) > 0){
                        while($row = pg_fetch_array($query1)){
                            $nm_pessoa = $row["nm_pessoa"];
                            $nm_setor = $row["nm_setor"];
                            $ds_aviso = $row["ds_aviso"];
                            $dh_publicacao = $row["dh_publicacao"];
                            $dh_retirada = $row["dh_retirada"];
                            echo "<div class='bg-white text-black text-start '>";
                            echo "<h3>";
                            
                            date_default_timezone_set('America/Sao_Paulo');
                            $data_atual   = date('d-m-Y H:i');

                            $data_at_mod  = strtotime($data_atual);
                            $data_ret_mod = strtotime($dh_retirada);

                            if($data_at_mod < $data_ret_mod){
                                echo "<b>Autor:</b> ".$nm_pessoa;
                                echo "<br><b>Setor:</b> ".$nm_setor;
                                echo "<br><b>Mensagem:</b> ".$ds_aviso;
                                echo "<br><b>Publicado em:</b> ".$dh_publicacao;
                                echo "<br><b>Vencerá em:</b> ".$dh_retirada;
                            }
                            
                            echo "</h3>";
                            echo "</div>";
                            echo "<br>";
                        }
                    }       

                                
                ?>
            </div>
        </div>
    </div>   
</body>
</html>