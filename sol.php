<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-88951">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <title>Cadastro de Solicitação</title>

    <style>
        <?php include 'CSS/stylessol.css'; ?>
    </style>
</head>
<body>
    <header>
        
    </header>

    <div id="mid">
        <form action="sol.php" method="POST">
            <fieldset>

                <legend class="legend"><b>Cadastro de Solicitação</b></legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome_adotante" id="nome_adotante" class="inputUser" required>
                    <label for="nome">Nome do Adotante</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome_adotante" id="nome_adotante" class="inputUser" required>
                    <label for="nome">Nome do Adotante</label>
                </div>

                <br>

                <div class="inputBox">
                    <select name="genero" id="genero" required>
                    <option selected disabled>Escolha</option> 
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="P">Prefiro não dizer</option>
                    <option value="O">Outro</option>
                    </select>
                    <label for="gen">Gênero</label>
                </div>

                <br>

                <div class="inputBox">
                    <select name="situacao_civil" id="situacao_civil" required>
                    <option selected disabled>Escolha</option>
                    <option value="S">Solteiro(a)</option>
                    <option value="C">Casado(a)</option>
                    <option value="D">Divorciado(a)</option>
                    <option value="O">Outro</option>


                    </select>
                    <label for="sc">Situação Civil</label>
                </div>

            </fieldset>
        </form>

    </div>
    
</body>
</html>