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
            <a class="navbar-brand offset-1 text-white" href="painel-usuario.php">
                <img src="img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior</h3>
            </a>
            <a class="navbar-brand btn btn-sm btn-outline-danger" href="usuarios/logout.php"><h5 class="text-white mx-5">Sair</h5></a>
        </nav>
    </header>

    <br>
    

    <section>
        <div class="container">
            <h1 class="text-left">Dúvidas Frequentes</h1>    
            <br>       
            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-secondary list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Links</a>
                        <a class="list-group-item list-group-item-secondary list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Recuperação de Senhas</a>
                        <a class="list-group-item list-group-item-secondary list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Com quem falar</a>
                        <a class="list-group-item list-group-item-secondary list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Aplicativos</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="bg-secondary text-white shadow-lg rounded p-3">
                                <h3><b>Portal</b></h3>
                                <h5 class="mx-5">portal.qq</h5>
                                <h3><b>CliQQ</b></h3>
                                <h3><b>VA</b></h3>
                                <h3><b>Gestor de Contatos</b></h3>
                                <h3><b>Painel do Colaborador</b></h3>
                                <h3><b>Verdesys</b></h3> 
                            </div>  
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        
                            <h3><b>Verdesys | Digitaliza | Verdecob</b></h3>
                            <h3><b>CliQQ | VA | Gestor de Contatos | Painel do Colaborador | PDV</b></h3>
                            <h3><b>Escola Virtual</b></h3>
                            <h3><b>Totvs</b></h3>
                            <h3><b>Workplace</b></h3>
                            <h3><b>Helpdesk</b></h3>
                            <h3><b>SAP</b></h3>
                            <h3><b>Zimbra</b></h3>
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</body>

</html>