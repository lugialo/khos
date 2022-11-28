<?php
    session_start();
    include_once('config.php');
    print_r($_SESSION);
    echo ("<br>");
    echo ("<br>");

    print_r($_SESSION['email_usuario']);

    $login = $_SESSION['email_usuario'];

    $id_consulta = mysqli_query($conexao, "SELECT * from usuarios where email_usuario = '$login'");

    $usuario = mysqli_fetch_object($id_consulta);

    $id_usuario = $usuario->cod_usuario;
    echo("<br>");
    print_r($id_usuario);


    if(isset($_POST['submit']))
    {
        $nome_adotante     = $_POST['nome_adotante'];
        $genero            = $_POST['genero'];
        $estado            = $_POST['estado'];
        $cidade            = $_POST['cidade'];
        $endereco          = $_POST['endereco'];
        $situacao_civil    = $_POST['situacao_civil'];
        $pergunta1         = $_POST['pergunta1'];
        $pergunta2         = $_POST['pergunta2'];
        $pergunta3         = $_POST['pergunta3'];
        $pergunta4         = $_POST['pergunta4'];
        $pergunta5         = $_POST['pergunta5'];
        
        $result = mysqli_query($conexao, "INSERT INTO adotante (nome_adotante,genero,estado,cidade,endereco,situacao_civil,generico1,generico2,generico3,generico4,generico5,statusa,cod_usuario) VALUES ('$nome_adotante','$genero','$estado','$cidade','$endereco','$situacao_civil','$pergunta1','$pergunta2','$pergunta3','$pergunta4','$pergunta5',1,'$id_usuario')");
        header('Location: paginainicial.php');

        //1 - pendente
        //2 - reprovado
        //3 - aprovado
    }
    

?>


<!DOCTYPE html>
<html lang="pt_BR">
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
                    <select name="estado" id="estado" required>
                    <option selected disabled>Escolha</option> 
                    <option value="AC">AC</option>	
                    <option value="AL">AL</option>	
                    <option value="AP">AP</option>	
                    <option value="AM">AM</option>	
                    <option value="BA">BA</option>	
                    <option value="CE">CE</option>	
                    <option value="DF">DF</option>	
                    <option value="ES">ES</option>	
                    <option value="GO">GO</option>	
                    <option value="MA">MA</option>	
                    <option value="MT">MT</option>	
                    <option value="MS">MS</option>	
                    <option value="MG">MG</option>	
                    <option value="PA">PA</option>	
                    <option value="PB">PB</option>	
                    <option value="PR">PR</option>	
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>	
                    <option value="RJ">RJ</option>	
                    <option value="RN">RN</option>	
                    <option value="RS">RS</option>	
                    <option value="RO">RO</option>	
                    <option value="RR">RR</option>	
                    <option value="SC">SC</option>	
                    <option value="SP">SP</option>	
                    <option value="SE">SE</option>	
                    <option value="TO">TO</option>
                    
                    </select>
                    <label for="est">Estado</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cid">Cidade</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="cid">Endereço</label>
                </div>

                <br>

                <div class="inputBox">
                    <select name="situacao_civil" id="situacao_civil" required>
                    <option selected disabled>Escolha</option>
                    <option value="S">Solteiro(a)</option>
                    <option value="C">Casado(a)</option>
                    <option value="D">Divorciado(a)</option>
                    <option value="V">Viúvo(a)</option>
                    <option value="O">Outro</option>

                    </select>
                    <label for="sc">Situação Civil</label>
                </div>

                <div class="inputBox">
                    <p>Quantas pessoas residem na sua família, contando com você?</p>
                    <textarea name="pergunta1" id="pergunta1" required class="inputUser"></textarea>
                </div>

                <br>

                <div class="inputBox">
                    <p>Qual a renda média mensal, por pessoa?</p>
                    <textarea name="pergunta2" id="pergunta2" required class="inputUser"></textarea>
                </div>

                <br>

                <div class="inputBox">
                    <p>O que você considera como "ser responsável por uma vida"?</p>
                    <textarea name="pergunta3" id="pergunta3" required class="inputUser"></textarea>
                </div>

                <br>
                
                <div class="inputBox">
                    <p>Qual o seu real desejo em adotar uma criança ou adolescente?</p>
                    <textarea name="pergunta4" id="pergunta4" required class="inputUser"></textarea>
                </div>

                <br>
                
                <div class="inputBox">
                    <p>Você faz uso de alguma droga e/ou ingere bebidas alcoólicas com frequência? Se sim, detalhe...</p>
                    <textarea name="pergunta5" id="pergunta5" required class="inputUser"></textarea>
                </div>

                <br>

                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>

    </div>
    
</body>
</html>
<!-- it's my house! -->