<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Pets</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="listaPet.css" rel="stylesheet">
    </head>

    <body>
        <?php
            session_start();
            if (isset($_SESSION['usuario'])) {
                echo "Bem vindo {$_SESSION['usuario']} :) !<br><br>";  
                echo"Deseja fazer o <a href='logout.php'>Logout?</a>";     
            } else {
                echo "Fazer o <a href='login.html'>Login </a> <br> <br>";
            }
        ?>
        <div class="container">
            <a href='cadastraPet.php'>
                <button id="botao" type="submit" name="submit">Adicionar um novo pet</button>
            </a>
        </div>
        <div class="container">
            <br>
            <h2>Listagem dos Pets cadastrados</h2>
            <table class="table">
                <thead>
                        <tr>
                        <th>Nome</th>
                        <th>Raça</th>
                        <th>Descrição</th>
                        <th>Serviço</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conecta.php';
                        $sql = "SELECT pet.id, pet.nome, pet.raca as raca, descricao, servico FROM pet, tb_servico WHERE pet.id_servico = tb_servico.id" ;
                        $result = mysqli_query($conexao, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td> $row[nome] </td>";
                            echo "<td> $row[raca] </td>";
                            echo "<td> $row[descricao] </td>";
                            echo "<td> $row[servico] </td>";
                            echo "<td><a href='editaPet.php/?id=$row[id]'>
                                    <span class='material-icons'> Editar </span>
                                    </a></td>";
                            echo "<td><a href='deletPet.php/?id=$row[id]' >
                            <span class='material-icons'> Deletar </span></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>