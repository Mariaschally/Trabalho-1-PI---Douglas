<?php

    include 'conecta.php';

    $sql = "INSERT INTO tb_servico (servico)
    VALUES ('Banho'), ('Banho e Tosa'), ('Hidratação'), ('Corte de Unha'), ('Tosa Higiênica'), ('Tosa')";

    if (mysqli_query($conexao, $sql)) {
        echo "Novos registros adicionados com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
    mysqli_close($conexao);

?>