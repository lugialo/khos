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
        header('Location: user.php');
    }
    elseif(!empty($_GET['id_solicitacao']))
    {
        include_once('config.php');

        $id_solicitacao = $_GET['id_solicitacao'];

        $select = "SELECT * from adotante where id_solicitacao =$id_solicitacao";

        $result = $conexao->query($select);

        if($result->num_rows > 0)
        {
            $delete = "DELETE FROM adotante where id_solicitacao=$id_solicitacao";
            $resultdelete = $conexao->query($delete);

        }
        header('Location: soli.php');
    }
?>