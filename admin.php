<?php
    session_start();
    include_once('config.php');
    print_r($_SESSION);
    echo ("<br>");
    echo ("<br>");
    print_r($_SESSION['email_usuario']);
    if((!isset($_SESSION['email_usuario']) == true) and (!isset($_SESSION['usuario_senha']) == true))
    {
        unset($_SESSION['email_usuario']);
        unset($_SESSION['usuario_senha']);
        header('Location: teladelogin.php');
    }

    $login = $_SESSION['email_usuario'];
    
    

?>
<style>
<?php include 'CSS/stylesadmin.css'; ?>
</style>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <title>Khos - Admin</title>
</head>
<body>
    <header>
        <div id="top">
            <div class="topleft">
                <a href="index.html"><img src="images/Khos-removebg-preview.png" alt=""></a>
                <!--<a href="index.html"> <h1>Khos</h1> </a>-->
            </div><!--topleft-->  
            
            <div class="links">
                <a href="exit.php">Sair</a>
            </div><!--links-->
        </div>
    </header>

    <main>
    <a href="user.php">Controle de Usuário</a>
    <br>
    <a href="soli.php">Controle de Solicitações</a>

    </main>
    
</body>
</html>