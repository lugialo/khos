<?php

 include('config.php');
 if (isset($_POST['submit2']))
    {
       $id_solicitacao = $_POST['id_solicitacao'];

       $aprovado = '3';
    
       $sqlUpdate = "UPDATE adotante SET statusa = '$aprovado' WHERE id_solicitacao='$id_solicitacao'";

       $result = $conexao->query($sqlUpdate);

       print_r($result);
    }
elseif(isset($_POST['reprove']))
    {
        $id_solicitacao = $_POST['id_solicitacao'];

        $reprovado = '2';
     
        $sqlUpdate = "UPDATE adotante SET statusa = '$reprovado' WHERE id_solicitacao='$id_solicitacao'";
 
        $result = $conexao->query($sqlUpdate);
 
        print_r($result);   
    }
     header('Location: soli.php');
?>    