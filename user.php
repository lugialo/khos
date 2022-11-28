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
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        
        $sql = "SELECT * from usuarios WHERE cod_usuario like '%$data%' or nome_usuario LIKE '%$data%' or email_usuario LIKE '%$data%' ORDER BY cod_usuario DESC";
    }
    else
    {
        $sql = "SELECT * from usuarios ORDER BY cod_usuario DESC";
    }
    $result = $conexao->query($sql);
    
    // print_r($result);
    
    

?>
<style>
<?php include 'CSS/stylesuser.css'; ?>
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
    <title>Khos - Controle de Usuários</title>
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
    </header>

    <main>
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Buscar" id="buscar">  
            <button onclick="searchUser()" class="btn btn-dark">
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
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data de Cadastro</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Tipo de Usuário</th>
                        <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$user_data['cod_usuario']."</td>";
                                echo "<td>".$user_data['nome_usuario']."</td>";
                                echo "<td>".$user_data['sobrenome_usuario']."</td>";
                                echo "<td>".$user_data['email_usuario']."</td>";
                                echo "<td>".$user_data['dta_cadastro']."</td>";
                                echo "<td>".$user_data['data_nascimento']."</td>";
                                echo "<td>".$user_data['cpf_usuario']."</td>";
                                if ($user_data['tipo'] == 1)
                                {
                                echo "<td>".'Desenvolvedor'."</td>";
                                }
                                elseif ($user_data['tipo'] == 2)
                                {
                                echo"<td>".'Administrador'."</td>";
                                }
                                elseif ($user_data['tipo'] == 3)
                                {
                                echo"<td>".'Usuário'."</td>";
                                }
                                echo "<td>
                                <a class='btn btn-sm btn-dark ' href='edit.php?cod_usuario=$user_data[cod_usuario]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
                                <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>
                                </svg>
                                </a>
                                    <a class='btn btn-sm btn-danger ' href='delete.php?cod_usuario=$user_data[cod_usuario]' onClick='return confirmation();'>
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



    <script src="JS/confirmation.js"></script>
    <script src="JS/searchuser.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</body>
</html>