<?php
    include 'conecta.php';

    $mysql = "CREATE TABLE tb_usuario(
        id int unsigned auto_increment primary key,
        nome varchar (50) not null,
        email varchar (100) not null unique,
        senha varchar (255) not null
    )";

    if (mysqli_query($conexao, $mysql)){
        echo "Tabela usuário criada com sucesso";
    }else{
        echo "Erro ao criar a tabela: ". mysqli_error($conexao);
    }

    $mysql = "CREATE TABLE tb_servico(
        id int unsigned auto_increment primary key,
        servico varchar (30) not null
    )";

    if (mysqli_query($conexao, $mysql)){
        echo "Tabela serviço criada com sucesso";
    }else{
        echo "Erro ao criar a tabela: ". mysqli_error($conexao);
    }

    $mysql = "CREATE TABLE pet(
        id int unsigned auto_increment primary key,
        nome varchar (50) not null,
        raca varchar (60) not null,
        descricao varchar (200) not null,
        id_servico int UNSIGNED,
        FOREIGN KEY (id_servico) REFERENCES tb_servico(id)
    )";

    if (mysqli_query($conexao, $mysql)){
        echo "Tabela pet criada com sucesso";
    }else{
        echo "Erro ao criar a tabela: ". mysqli_error($conexao);
    }

    mysqli_close($conexao);
?>
