<?php

    error_reporting(0);

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


    $id_consulta  = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email_usuario = '$login'");
    
    $usuario = mysqli_fetch_object($id_consulta);

    //Transformar objeto em string
    $usuario_int = json_encode($usuario);

    $usuario_substr = substr($usuario_int, 16,2);

    $id_adotante = mysqli_query($conexao, "SELECT * FROM adotante WHERE cod_usuario = '$usuario_substr'");

    print_r($id_adotante);

    $id_consulta2 = "SELECT * from adotante where cod_usuario = '$usuario_substr'";

    $cod_usuario = mysqli_fetch_object($id_adotante);
    $result = $conexao->query($sql);


    //Para mostar as informações da solicitação
    $id_usuario = $usuario->cod_usuario;
    

    //Achar fk da tabela adotante
    $fk_usuario = $cod_usuario->cod_usuario;
    $result2 = $conexao->query($id_consulta2);

     if ($result2->num_rows > 0)
     {
         while($user_data = mysqli_fetch_assoc($result2))
        {
             $id_solicitacao    = $user_data['id_solicitacao'];
             $nome_adotante     = $user_data['nome_adotante'];
             $genero            = $user_data['genero'];
             $estado            = $user_data['estado'];
             $cidade            = $user_data['cidade'];
             $endereco          = $user_data['endereco'];
             $situacao_civil    = $user_data['situacao_civil'];
             $pergunta1         = $user_data['generico1'];
             $pergunta2         = $user_data['generico2'];
             $pergunta3         = $user_data['generico3'];
             $pergunta4         = $user_data['generico4'];
             $pergunta5         = $user_data['generico5'];
             $status            = $user_data['statusa'];

        }
     }
?>
<style>
    <?php include 'CSS/stylesinicio.css'; ?>
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="iso-88951">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <title>Khos - Home</title>
    
</head>
<body>
<header>
        <div id="top">
            <div class="topleft">
                <a href="index.php"><img src="images/Khos-removebg-preview.png" alt=""></a>
                
            </div><!--topleft-->  
            
            <div class="links">
                <a href="exit.php">Sair</a>
            </div><!--links-->

        </div>
    </header>
    <main>
     
     <h1>Bem-vindo <?php while($user_data = mysqli_fetch_assoc($result))
                               echo($user_data['nome_usuario'])?> 😊</h1> 
     <br>                           
    <?php if ($result2 -> num_rows <> 1) {                            
    echo "<a href='sol.php'>Criar uma solicitação</a>";
    }
    else if ($result2 -> num_rows <> 0){
    echo"<div class='card' style='width:18rem;' id='card'>"; 
    echo "<div class='card-header'> Sua solicitação: N°" . $id_solicitacao . "</div>";
    echo "<ul class='list-group list-group-flush'>";
    echo "<li class='list-group list-group-item'>Nome: " . $nome_adotante . "</li>";
    if ($genero = 'M')
    {
        echo "<li class='list-group list-group-item'>Gênero: Masculino</li>";
    }
    elseif ($genero = 'F')
    {
        echo "<li class='list-group list-group-item'>Gênero: Feminino</li>";
    }
    elseif ($genero = 'S')
    {
        echo "<li class='list-group list-group-item'>Gênero: Solteiro</li>";
    }
    elseif ($genero = 'P')
    {
        echo "<li class='list-group list-group-item'>Gênero: Não informado</li>";
    }
    elseif ($genero = 'O')
    {
        echo "<li class='list-group list-group-item'>Gênero: Outro</li>";
    }
    echo "<li class='list-group list-group-item'>Estado: " . $estado . "</li>";
    echo "<li class='list-group list-group-item'>Cidade: " . $cidade . "</li>";
    echo "<li class='list-group list-group-item'>Endereço: " . $endereco ."</li>";
    if ($situacao_civil == 'C')
    {
        echo "<li class='list-group list-group-item'>Situação Civil: Casado(a)</li>";
    }
    elseif ($situacao_civil == 'D')
    {
        echo "<li class='list-group list-group-item'>Situação Civil: Divorciado(a)</li>";
    }
    elseif ($situacao_civil == 'V')
    {
        echo "<li class='list-group list-group-item'>Situação Civil: Viúvo(a)</li>";
    }
    elseif ($situacao_civil == 'O')
    {
        echo "<li class='list-group list-group-item'>Situação Civil: Outro</li>";
    }
    if ($status == 1)
    {
        echo"<li class='list-group list-group-item'>Status: Pendente, aguarde pelo resultado.</li>";
    }
    elseif ($status == 2)
    {
        echo"<li class='list-group list-group-item'>Status: Reprovada, verifique mais informações via e-mail</li>";
    }
    elseif ($status == 3)
    {
        echo"<li class='list-group list-group-item'>Status: Aprovada! Verifique mais informações via e-mail</li>";
    }
            }
     ?>
     </div>
        
</body>
</html>