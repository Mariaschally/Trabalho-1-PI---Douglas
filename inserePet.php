<?php
    include 'conecta.php';
    if(isset($_POST['nome'])){
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $raca = mysqli_real_escape_string($conexao, trim($_POST['raca']));
        $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
        $servico = mysqli_real_escape_string($conexao, trim($_POST['servico']));


        $sql = "INSERT INTO pet (nome, raca, descricao, id_servico)
        VALUES ('$nome', '$raca', '$descricao', '$servico')";
        
        if (mysqli_query($conexao, $sql)) {
            echo"<script>
                    alert('Novo pet adicionado com sucesso!');
                    window.location.href='listaPet.php';
                </script>";
        } else {
        echo"<script>
                    alert('Erro ao inserir os dados!');
                    window.location.href='cadastraPet.php';
                </script>";
        }
        mysqli_close($conexao);

    }
?>