<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <!-- <link rel="stylesheet" href="styleslogin.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
    <style>
        
        <?php include 'CSS/styleslogin.css'; ?>
    
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
        <div class="inputcontent">
        <h1>Login</h1>
            <form action="testelogin.php" method="POST">
                <input type="text" name="email_usuario" placeholder="E-mail">
                <br>
                <input type="password" name="usuario_senha" placeholder="Senha">
                <br>
                <a href="teladecadastro.php">Não possui uma conta?</a>
                <br><br>

                <!-- <button class="button">
                    <span class="text">Entrar</span>
                    <i class="text-check icon"></i>
                </button> -->
                <input type="submit" class="inputSubmit" name="submit" value="Enviar">
            </form>

        </div><!--inputcontent-->
    </div><!--mid-->
    
</body>
</html>