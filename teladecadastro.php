<?php
    if(isset($_POST['submit']))
    {
        // print_r($_POST['nome_usuario']);
        // print_r('<br>');
        // print_r($_POST['sobrenome_usuario']);
        // print_r('<br>');
        // print_r($_POST['cpf_usuario']);
        // print_r('<br>');
        // print_r($_POST['data_nascimento']);
        // print_r('<br>');
        // print_r($_POST['email_usuario']);
        // print_r('<br>');
        // print_r($_POST['usuario_senha']);

        include('config.php');

    $timezone = new DateTimeZone('America/Sao_Paulo');
    $agora = new DateTime('now', $timezone);

    $dataAtual = $agora->format('Y-d-m H:i:s');

        // nome_usuario
        // sobrenome_usuario
        // cpf_usuario
        // data_nascimento
        // email_usuario
        // usuario_senha

        $nome_usuario      = $_POST['nome_usuario'];
        $sobrenome_usuario = $_POST['sobrenome_usuario'];
        $cpf_usuario       = $_POST['cpf_usuario'];
        $data_nascimento   = $_POST['data_nascimento'];
        $email_usuario     = $_POST['email_usuario'];
        $usuario_senha     = $_POST['usuario_senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome_usuario,sobrenome_usuario,cpf_usuario,data_nascimento,email_usuario,usuario_senha,tipo,dta_cadastro) VALUES ('$nome_usuario','$sobrenome_usuario','$cpf_usuario','$data_nascimento','$email_usuario','$usuario_senha',3,'$dataAtual')");
        header('Location: teladelogin.php');
    }
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="iso-88951">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link rel="stylesheet" href="stylescadastro.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <script type="text/javascript" src="JS/cadastro.js"></script>
    <title>Cadastro</title>

    <style>
        <?php include 'CSS/stylescadastro.css'; ?>
    </style>
</head>
<body>
    <header>
        <div id="top">
            <div class="topleft">
                <a href="index.html"><img src="images/Khos-removebg-preview.png" alt=""></a>
                <!--<a href="index.html"> <h1>Khos</h1> </a>-->
            </div><!--topleft-->        
    </header>

    <div id="mid">
        <form action="teladecadastro.php" method="POST">
            <fieldset>

                <legend class="legend"><b>Cadastro de Usuário</b></legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome_usuario" id="nome_usuario" class="inputUser" required><!--nome-->
                    <label for="nome">Nome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="sobrenome_usuario" id="sobrenome_usuario" class="inputUser" required><!--sobrenome-->
                    <label for="sobrenome">Sobrenome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="cpf_usuario" id="cpf_usuario" class="inputUser" required placeholder="" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
                    <label for="cpf">CPF</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="date" name="data_nascimento" id="data_nascimento" class="datnasc" required><!--data de nascimento-->
                    <label for="datnasc">Data de Nascimento</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email_usuario" id="email_usuario" class="inputUser" required><!--email-->
                    <label for="email">E-mail</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="password" name="usuario_senha" id="usuario_senha" class="inputUser" required> <!--senha-->
                    <label for="senha">Senha</label>
                </div>

                <br><br>
                <a href="teladelogin.php">Já possui uma conta?</a>
                <br>
                <br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
    
</body>
</html>