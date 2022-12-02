<?php

    include('config.php');

    if(isset($_POST['update']))
    {
       $cod_usuario = $_POST['cod_usuario'];
       $nome_usuario = $_POST['nome_usuario'];
       $sobrenome_usuario = $_POST['cod_usuario'];
       $data_nascimento = $_POST['data_nascimento'];
       $email_usuario = $_POST['email_usuario'];
       $tipo = $_POST['tipo'];

       $sqlUpdate = "UPDATE usuarios SET nome_usuario= '$nome_usuario',sobrenome_usuario= '$sobrenome_usuario',data_nascimento='$data_nascimento',email_usuario='$email_usuario',tipo='$tipo' WHERE cod_usuario='$cod_usuario'";

       $result = $conexao->query($sqlUpdate);

    }
     header('Location: user.php');

?>