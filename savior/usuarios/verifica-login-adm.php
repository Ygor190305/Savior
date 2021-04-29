<?php
    session_start();
    if(!$_SESSION['matricula2']){
        header('Location: telaLogin.php');
        exit();
    }
?>