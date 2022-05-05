<?php
    include 'conecta.php';

    if (isset($_POST['nome'])) {
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

        $mysql = "SELECT senha from tb_usuario where email = '{$email}'";
        
        $retorno = mysqli_query($conexao, $mysql);
        if (mysqli_num_rows($retorno) > 0) {
            echo "<script>
                    alert('Já existe o email cadastrado!');
                    window.location.href='cadastro.html';
                </script>";
        }
        
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
        $mysql = "INSERT INTO tb_usuario (nome, email, senha)
                    VALUES ('$nome', '$email', '$senha_criptografada')";


        if (mysqli_query($conexao, $mysql)) {
            echo "<script>
                    alert('Novo cadastro realizado com sucesso!');
                    window.location.href='login.html';
                </script>";
        } else {
            echo "<script>
                    alert('Erro ao realizar o cadastro!');
                    window.location.href='cadastro.html';
                </script>";
        }
    }
?>