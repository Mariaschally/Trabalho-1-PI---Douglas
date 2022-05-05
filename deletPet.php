<?php
    include 'conecta.php';
    if (isset($_GET['id'])) {
        $sql = "Delete FROM pet WHERE id='$_GET[id]'";
        if (mysqli_query($conexao, $sql)) {
            echo "<script>
                    alert('Os dados do pet foram apagados com sucesso!');
                    window.location.href='../listaPet.php';
                </script>";
        } else {
            echo "<script>
                    alert('Erro ao apagar os dados do pet!');
                    window.location.href='../listaPet.php';
                </script>";
        }
        mysqli_close($conexao);
    }
?>