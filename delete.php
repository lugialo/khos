<?php


    if(!empty($_GET['cod_usuario']))
    {
        include_once('config.php');

        $cod_usuario = $_GET['cod_usuario'];


        $select = "SELECT * FROM usuarios where cod_usuario=$cod_usuario";

        $result = $conexao->query($select);

        if($result->num_rows > 0)
        {
            
            $delete = "DELETE FROM usuarios where cod_usuario=$cod_usuario";
            $resultdelete = $conexao->query($delete);
        }
    }
    header('Location: user.php');
?>