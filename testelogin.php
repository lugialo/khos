<?php

    session_start();

    if (isset($_POST['submit']) && !empty($_POST['email_usuario']) && !empty($_POST['usuario_senha']))
    {
        include_once('config.php');
        $email_usuario = $_POST['email_usuario'];
        $usuario_senha = $_POST['usuario_senha'];



        $sql = mysqli_query($conexao, "SELECT * from usuarios WHERE email_usuario = '$email_usuario' and usuario_senha = '$usuario_senha'");

        $num = mysqli_num_rows($sql);

        if ($num == 1){
            while ($percorrer = mysqli_fetch_array($sql)){
                   $adm = $percorrer['tipo'];
            
            if ($adm == 3){
                $_SESSION['email_usuario'] = $email_usuario;
                $_SESSION['usuario_senha'] = $usuario_senha;
                header('Location: admin.php');
            }else{
                $_SESSION['email_usuario'] = $email_usuario;
                $_SESSION['usuario_senha'] = $usuario_senha;
                header('Location: paginainicial.php');
            }
            }
        }
        else{
            header('Location: testelogin.php');
        }

        if ($num < 1)
        {
            unset($_SESSION['email_usuario']);
            unset($_SESSION['usuario_senha']);
            header('Location: teladelogin.php');
        }
        }
            
    else
    {
        header('Location: teladelogin.php');
    }

?>