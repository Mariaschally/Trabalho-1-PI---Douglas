<?php
include 'conecta.php';
if(isset($_POST['nome']))
{

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $raca = mysqli_real_escape_string($conexao, trim($_POST['raca']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $servico = mysqli_real_escape_string($conexao, trim($_POST['servico']));


    $sql = "UPDATE pet SET nome = '$nome', raca = '$raca', descricao = '$descricao',
        id_servico = '$servico' WHERE id = '$_GET[id]'";
    
    if (mysqli_query($conexao, $sql)) {
        echo"<script>
                alert('Os dados do pet foram atualizados com sucesso!');
                window.location.href='../listaPet.php';
            </script>";
    } else {
       echo"<script>
                alert('Erro ao atualizar os dados do pet!');
                window.location.href='../'editaPet.php/?id=$_GET[id]';
            </script>";
    }
    mysqli_close($conexao);

}

?>