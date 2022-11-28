<?php 
    session_start();
    include_once('config.php');
    if((!isset($_SESSION['email_usuario']) == true) and (!isset($_SESSION['usuario_senha']) == true))
    {
        unset($_SESSION['email_usuario']);
        unset($_SESSION['usuario_senha']);
        header('Location: teladelogin.php');
    }

    $login = $_SESSION['email_usuario'];

    $solicitacoes = "SELECT * from adotante where statusa = 1 ORDER BY id_solicitacao";


    $result = $conexao->query($solicitacoes);

    // print_r($result);
    // echo"<br>";
    // echo"<br>";
    // print_r($login);

?>

<style>

</style>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Khos - Controle de Solicitações</title>

    <style>
        <?php include 'CSS/stylessoli.css'; ?>
    </style>
</head>

<body>
<header>
        <div id="top">
            <div class="topleft">
                <a href="index.html"><img src="images/Khos-removebg-preview.png" alt=""></a>
                <!--<a href="index.html"> <h1>Khos</h1> </a>-->
            </div><!--topleft-->  
            
            <div class="links">
                <a href="admin.php">Voltar</a>
            </div><!--links-->
        </div>
    </header>

    <main>
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Buscar" id="buscar">
            <button class="btn btn-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>   
            </button>
        </div>
        <br>
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Situação Civil</th>
                    <th scope="col">Status</th>
                    <th scope="col">Usuário Solicitante</th>
                    <th scope="cpç">...</th>          
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($user_data = mysqli_fetch_assoc($result))
                        {
                            $cod_usuario = $user_data['cod_usuario'];

                            $id_usuario = "SELECT * from usuarios where cod_usuario = '$cod_usuario'";

                            $result2 = $conexao->query($id_usuario);

                            $id_usuario_solicitante = mysqli_fetch_assoc($result2);

                            echo "<tr>";
                            echo "<td>".$user_data['id_solicitacao']."</td>";
                            echo "<td>".$user_data['nome_adotante']."</td>";
                            if ($user_data['genero'] == 'F')
                            {
                                echo "<td>".'Feminino'."</td>";
                            }
                            elseif ($user_data['genero'] == 'M')
                            {
                                echo "<td>".'Masculino'."</td>";        
                            }
                            elseif ($user_data['genero'] == 'P')
                            {
                                echo "<td>".'Não informado'."</td>";
                            }
                            elseif ($user_data['genero'] == 'O')
                            {
                                echo "<td>".'Outro'."</td>";
                            }
                            echo "<td>".$user_data['estado']."</td>";
                            echo "<td>".$user_data['cidade']."</td>";
                            echo "<td>".$user_data['endereco']."</td>";
                            if ($user_data['situacao_civil'] == 'S')
                            {
                                echo "<td>".'Solteiro(a)'."</td>";
                            }
                            elseif ($user_data['situacao_civil'] == 'C')
                            {
                                echo "<td>".'Casado(a)'."</td>";
                            }
                            elseif ($user_data['situacao_civil'] == 'D')
                            {
                                echo "<td>".'Divorciado'."</td>";
                            }
                            elseif ($user_data['situacao_civil'] == 'O')
                            {
                                echo "<td>".'Outro'."</td>";
                            }
                            echo "<td>".$user_data['statusa']."</td>";
                            echo "<td>".$id_usuario_solicitante['nome_usuario']."</td>";
                            echo "<td>
                                <a class='btn btn-sm btn-dark ' href='aprova.php?id_solicitacao=$user_data[id_solicitacao]&nome_usuario=$id_usuario_solicitante[nome_usuario]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-person' viewBox='0 0 16 16'>
                                <path d='M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                                <path d='M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z'/>
                                </svg>
                                </a>
                                    <a class='btn btn-sm btn-danger ' href='delete.php?id_solicitacao=$user_data[id_solicitacao]' onClick='return confirmation();'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash2' viewBox='0 0 16 16'>
                                    <path d='M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z'/>
                                  </svg>  
                                    </a>
                                </td>";
                                echo"</tr>";
                

                        }
                    ?>
                </tbody>
            </table>
        </div>

    </main>




</body>

</html>