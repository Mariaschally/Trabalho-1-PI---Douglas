<?php
    $conexao = mysqli_connect("localhost", "root", "");

    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $mysql = "CREATE DATABASE pet";

    if (mysqli_query($conexao, $mysql)) {
        echo "Base de dados criada com sucesso";
    } else {
        echo "Erro ao criar a base de dados: " . mysqli_error($conexao);
    }
    mysqli_close($conexao);
?>