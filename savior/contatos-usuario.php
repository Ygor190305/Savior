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
        <h1>Pessoas</h1>
            <table class="table">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Função</th>
                        <th scope="col">E-Mail</th>
                    </tr>
                </thead>
                <tbody class="bg-light text-dark">
                    <tr>
                        <td>Marcelo Lemmemmeier</td>
                        <td>Gerente Helpdesk N1</td>
                        <td>marcelo.lemmemmeir@quero-quero.com.br</td>
                    </tr>
                    <tr>
                        <td>Daniel Miranda</td>
                        <td>Gerente geral de Atendimento</td>
                        <td>daniel.miranda@quero-quero.com.br</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h1>Setores</h1>
            <table class="table">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th scope="col">Setor</th>
                        <th scope="col">Ramal</th>
                        <th scope="col">E-Mail</th>
                    </tr>
                </thead>
                <tbody class="bg-light text-dark">
                    <tr>
                        <td>Helpdesk N1</td>
                        <td>5757</td>
                        <td>helpdesk@quero-quero.com.br</td>
                    </tr>
                    <tr>
                        <td>SOS Micros</td>
                        <td>5661</td>
                        <td>sosmicros@quero-quero.com.br</td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </section>

    
    
</body>
</html>