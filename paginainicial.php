<?php
    session_start();
    include_once('config.php');
    print_r($_SESSION);
    if((!isset($_SESSION['email_usuario']) == true) and (!isset($_SESSION['usuario_senha']) == true))
    {
        unset($_SESSION['email_usuario']);
        unset($_SESSION['usuario_senha']);
        header('Location: teladelogin.php');
    }

    $login = $_SESSION['email_usuario'];

    $sql = "SELECT * from usuarios where email_usuario = '$login'";

    $result = $conexao->query($sql);
    
    print_r($result);

    

?>
<style>
    <?php include 'CSS/stylesinicio.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <title>Khos - Home</title>
    
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
     <h1>Bem-vindo <?php while($user_data = mysqli_fetch_assoc($result))
                               echo($user_data['nome_usuario'])?> 😊</h1>
    <a href="sol.php">Criar uma solicitação</a>
    </main>
    
    
</body>
</html>