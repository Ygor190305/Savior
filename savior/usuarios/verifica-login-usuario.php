<?php
    session_start();
    if(!$_SESSION['matricula3']){
        header('Location: telaLogin.php');
        exit();
    }
?>