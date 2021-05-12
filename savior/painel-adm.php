<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
            <a class="navbar-brand offset-1 text-white" href="#">
                <img src="img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior </h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>

    <br>
    <br>
    <br>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-2 bg-white border border-white">
                <a href="chamados/chamadosSetor.php" class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/chamado.png">
                    <h4 class="w-100">Chamados</h4>
                </a>
                <br>
                <a class="row bg-secondary border  text-center text-white shadow-lg" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#senhaModal">
                    <img src="img/update.png">
                    <h4 class="w-100">Alterar Senha</h4>
                </a>
            </div>
            <div class="col-2 bg-white border border-white offset-1">
                <a href="contatos-adm.php" class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/telefone.png">
                    <h4 class="w-100">Contatos</h4>
                </a>
                <br>
                <a href="procedimentos.php" class="row bg-secondary border text-center text-center text-white shadow-lg" style="text-decoration: none">
                    <img src="img/cod.png">
                    <h4 class="w-100">Procedimentos</h4> 
                </a>

            </div>
            <div class="col-6 bg-light border border-white offset-1 shadow-lg">
                <div class="row text-center"><h2 class="text-dark">Mural de Avisos</h2></div>  
                <center>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mensagemModal">
                        Nova Mensagem no Mural
                    </button>

                    <br>

                    <?php
                        
                        include("banco/banco.php"); 
                        include("usuarios/verifica-login-adm.php");
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
                            
                            

                    <!-- Modal -->
                    <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Mensagem</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-8 bg-white text-left p-2">
                                    <form action="cadastroMensagem.php" method="post">
                                        <div class="form-group">
                                            <p class="text-start">Descrição:</p>
                                            <textarea type="text" class="form-control shadow-sm" placeholder="Descrição da mensagem" name="msg"></textarea>
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-start">Data e hora de vencimento:</p>
                                            <textarea type="text" class="form-control shadow-sm" placeholder="dd/mm/aaaa hh:mm" name="time_enc"></textarea>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="senhaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alteração de senha</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-8 bg-white text-left p-2">
                                    <form action="alteraSenha.php" method="post">
                                        <div class="form-group">
                                            <p class="text-start">Matrícula:</p>
                                            <input type="text" class="form-control shadow-sm" placeholder="Digite a matrícula" name="matricula">
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-start">Nova senha:</p>
                                            <input type="password" class="form-control shadow-sm" placeholder="Digite a nova senha" id="novaSenha" name="novaSenha">
                                            <br>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-start">Repita a senha:</p>
                                            <input type="password" class="form-control shadow-sm" placeholder="Repita a nova senha" id="contraSenha" name="contraSenha">
                                            <br>
                                            <script>
                                                function verificaSenhas(){
                                                    var senha       = document.getElementById('novaSenha').value;
                                                    var contraSenha = document.getElementById('contraSenha').value;

                                                    if(senha != contraSenha){
                                                        alert("Senhas Inseridas são diferentes");
                                                    }else{
                                                        alert("Senha Alterada com sucesso");
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary" onclick="verificaSenhas();">Salvar</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>   
    </section>

</body>
</html>