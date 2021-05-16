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
            <a class="navbar-brand offset-1 text-white" href="painel-adm.php">
                <img src="img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top">Savior</h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>
    
    <br>
    
    <section class="container-fluid">
        <div class="col-6">
                <p class="text-start offset-1">
                    <b>Reiniciar o CliQQ</b>
                    <br>
                    1. acessar 10.204 via putty
                    <br>
                    2. rodar os comandos abaixo em ordem
                    <br>
                        - cd Guilherme
                        <br>
                        - ./web sh numero da filial
                        <br>

                    <br><br>


                    <b>Reiniciar o VA</b>
                    <br>
                    1. acessar o servidor da loja
                    <br>
                    2. rodar os comandos abaixo em ordem
                    <br>
                        - /usr/local/apache-tomcat-6.0.16/bin/shutdown.sh
                        <br>
                        - /usr/local/apache-tomcat-6.0.16/bin/shutdown.sh
                        <br>
                        - /usr/local/apache-tomcat-6.0.16/bin/startup.sh
                        <br>

                    <br><br>

                   

                    <b>Reiniciar o Squid</b>
                    <br>
                    1. conectar-se via Putty no servidor da filial
                    <br>
                    2. rodar os comandos abaixo em ordem
                    <br>
                        - killall run.squid  (até aparecer a mensagem Nenhum processo abortado)
                        <br>
                        - killall squid (até aparecer a mensagem Nenhum processo abortado)
                        <br>
                        - /usr/local/bin/run.squid &
                        <br>

                    <br><br>

                    

                    <b>Limpar os Trabalhos no CUPS</b>
                    <br>
                    1. acessar o servidor da loja
                    <br>
                    2. rodar o comando abaixo
                    <br>
                        - lprm -Plaser_01
                    <br>

                    <br><br>



                    <b>Vizualizar senha Wi-fi - CORPLQQ</b>
                    <br>
                    1. conectar-se via Putty no 10.0.0.204
                    <br>
                    2. executar os comandos abaixo em ordem
                    <br>
                    - cd /root/Cesar/WIFI
                    <br>
                    - ./pesquisa_wifi
                    <br>
                    vai aparecer uma confirmação pedindo a matricula do usuario
                    <br>

                    <br><br>
                </p>
        </div>
    </section>
    

    
    
</body>
</html>