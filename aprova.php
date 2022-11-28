<?php
    if(!empty($_GET['id_solicitacao']))
    {
        include('config.php');
        $id_solicitacao = $_GET['id_solicitacao'];

        $sqlSelect = "SELECT * from adotante where id_solicitacao = $id_solicitacao";
        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome_adotante  = $user_data['nome_adotante'];
                $genero         = $user_data['genero'];
                $estado         = $user_data['estado'];
                $cidade         = $user_data['cidade'];
                $endereco       = $user_data['endereco'];
                $situacao_civil = $user_data['situacao_civil'];
                $pergunta1      = $user_data['generico1'];
                $pergunta2      = $user_data['generico2'];
                $pergunta3      = $user_data['generico3'];
                $pergunta4      = $user_data['generico4'];
                $pergunta5      = $user_data['generico5'];

            }
        }
        else
        {
            header('Location: soli.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="iso-88951">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <title>Aprovação de Solicitação</title>

   <style>
        <?php include 'CSS/stylesaprova.css'; ?>
    </style> 
</head>
<body>
    <header>
        
    </header>

    <div id="mid">
        <form action="salvarSolicitacao.php" method="POST">
            <fieldset>
                <legend class="legend"><b>Aprovação de Solicitação</b></legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome_adotante" id="nome_adotante" class="inputUser" required value="<?php echo$nome_adotante ?>" disabled>
                    <label for="nome">Nome do Adotante</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="genero" id="genero" required value="<?php echo$genero ?>" disabled>

                    <label for="gen">Gênero</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required value="<?php echo $estado ?>" disabled>
                    
                    </select>
                    <label for="est">Estado</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required value="<?php echo $cidade ?>" disabled>
                    <label for="cid">Cidade</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required
                    value="<?php echo $endereco ?>" disabled>
                    <label for="cid">Endereço</label>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="situacao_civil" id="situacao_civil" required value="<?php echo $situacao_civil ?>" disabled>
                    <label for="sc">Situação Civil</label>
                </div>

                <div class="inputBox">
                    <p>Quantas pessoas residem na sua família, contando com você?</p>
                    <textarea name="pergunta1" id="pergunta1" required class="inputUser" disabled><?php echo $pergunta1?></textarea>
                </div>

                <br>

                <div class="inputBox">
                    <p>Qual a renda média mensal, por pessoa?</p>
                    <textarea name="pergunta2" id="pergunta2" required class="inputUser" disabled><?php echo $pergunta2?></textarea>
                </div>

                <br>

                <div class="inputBox">
                    <p>O que você considera como "ser responsável por uma vida"?</p>
                    <textarea name="pergunta3" id="pergunta3" required class="inputUser" disabled><?php echo $pergunta3?></textarea>
                </div>

                <br>
                
                <div class="inputBox">
                    <p>Qual o seu real desejo em adotar uma criança ou adolescente?</p>
                    <textarea name="pergunta4" id="pergunta4" required class="inputUser" disabled><?php echo $pergunta4?></textarea>
                </div>

                <br>
                
                <div class="inputBox">
                    <p>Você faz uso de alguma droga e/ou ingere bebidas alcoólicas com frequência? Se sim, detalhe...</p>
                    <textarea name="pergunta5" id="pergunta5" required class="inputUser" disabled><?php echo $pergunta5?></textarea>
                </div>

                <br>

                <div class="button">

                <input type="hidden" name="id_solicitacao" value="<?php echo $id_solicitacao?>">

                <button type="submit2" name="submit2" id="submit2">Aprovar</button>

                <button type="submit" name="reprove" id="reprove">Reprovar</button>
                </div>
                
                
            </fieldset>
        </form>

    </div>
    
</body>
</html>