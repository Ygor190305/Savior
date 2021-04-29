<?php
    session_start();
?>
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
                <img src="../img/fone.png"  width="40px" height="40px" class="d-inline-block align-top" alt="Savior">
                <h3  class="d-inline-block align-top" >Savior </h3>
            </a>
        </nav>
    </header>
    <br><br>
    <div class="container col-3 bg-light p-3">
        <h1 class="text-center">Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="matricula">Matrícula</label>
                <input type="number" name="matricula" id="matricula" class="form-control" placeholder="Digite sua matrícula" required>
            </div>
            <br>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
            </div>
            <br><br>
            <div class="form-group">
                <input type="submit" value="Login" name="login" class="form-control btn btn-secondary">
            </div>
        </form>
        <br>
        <?php
            if(isset($_SESSION['nao_autenticado'])):
        ?>
        <h3 class="alert alert-danger w-100">Usuário ou senha inválidos</h3>
        <?php
            unset($_SESSION['nao_autenticado']);
            endif
        ?>
        <br>
    </div>
    
  
    
    

  
</body>
</html>