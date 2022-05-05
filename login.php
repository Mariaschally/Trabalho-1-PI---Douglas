<?php
    include 'conecta.php';

    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));


      $mysql = "SELECT senha, nome from tb_usuario where email = '{$email}'";

        $retorno = mysqli_query($conexao, $mysql);
        $dados = mysqli_fetch_assoc($retorno);
        
        if (mysqli_num_rows($retorno) == 1 ) {
            if (password_verify($senha, $dados['senha'])) {
                session_start();
                $_SESSION['usuario'] = $dados['nome'];
                echo "<script>
                        alert('Login realizado com sucesso!');
                        window.location.href='menu.html';
                    </script>";
            } else {
                echo "<script>
                        alert('Senha incorreta!');
                        window.location.href='login.html';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('E-mail não encontrado!');'   
                    window.location.href='login.html';
                </script>";
        }
    }
?>