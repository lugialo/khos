<?php
    session_start();
    unset($_SESSION['email_usuario']);
    unset($_SESSION['usuario_senha']);
    header("Location: index.html");

?>