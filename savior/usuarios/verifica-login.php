<?php
    session_start();
    if(!$_SESSION['matricula']){
        header('Location: telaLogin.php');
        exit();
    }
?>