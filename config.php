<?php
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pi353_khos';

    // $dbHost = 'www.cedup.net.br:33061';
    // $dbUsername = 'pi353khos';
    // $dbPassword = 'paozinhodoce123';
    // $dbName = 'pi353khos';

    $conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);

    // if ($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso.";
    // }
?>