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
                $tipo              = $user_data['tipo'];

            }
            

        }
        else
        {
            header('Location: user.php');
        }
    }
    else
    {
        header('Location: user.php');
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
    <title>Edição de Usuários</title>

    <style>
        <?php include 'CSS/stylesedit.css'; ?>
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
        <form action="salvarUsuario.php" method="POST">
            <fieldset>

                <legend class="legend"><b>Editar Usuário</b></legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome_usuario" id="nome_usuario" class="inputUser" value="<?php echo $nome_usuario?>" required><!--nome-->
                    <label for="nome">Nome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="sobrenome_usuario" id="sobrenome_usuario" class="inputUser" value="<?php echo $sobrenome_usuario?>" required><!--sobrenome-->
                    <label for="sobrenome">Sobrenome</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" value="<?php echo $data_nascimento?>"required><!--data de nascimento-->
                    <label for="datnasc">Data de Nascimento</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email_usuario" id="email_usuario" class="inputUser" value="<?php echo $email_usuario?>" required><!--email-->
                    <label for="email">E-mail</label>
                </div>

                <br>
                <p>Tipo de Usuário</p>
                <input type="radio" id="Desenvolvedor" name="tipo" class="dev" value="1" <?php echo $tipo == '1' ? 'checked' : '' ?> required>
                <label for="Desenvolvedor">Desenvolvedor</label>
                <br>
                <input type="radio" id="Administrador" name="tipo" class="adm" value="2" <?php echo $tipo == '2' ? 'checked' : '' ?> required>
                <label for="Desenvolvedor">Administrador</label>
                <br>
                <input type="radio" id="Usuário" name="tipo" class="usuario" value="3" <?php echo $tipo == '3' ? 'checked' : '' ?> required>
                <label for="Usuário">Usuário</label>
                <br><br>
                <br>
                <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
    
</body>
</html>