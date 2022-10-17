<?php
    if(!empty($_GET['cod_usuario']))
    {

        include('config.php');

        $cod_usuario = $_GET['cod_usuario'];

        $sqlSelect = "SELECT * FROM usuarios WHERE cod_usuario= $cod_usuario";
        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {

                $nome_usuario      = $user_data['nome_usuario'];
                $sobrenome_usuario = $user_data['sobrenome_usuario'];
                $cpf_usuario       = $user_data['cpf_usuario'];
                $data_nascimento   = $user_data['data_nascimento'];
                $email_usuario     = $user_data['email_usuario'];
                $usuario_senha     = $user_data['usuario_senha'];

            }
            

        }
        else
        {
            header('Location: user.php');
        }
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
                <a href="user.php"><img src="images/Khos-removebg-preview.png" alt=""></a>
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