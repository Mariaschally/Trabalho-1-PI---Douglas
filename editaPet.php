<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Edição de Pets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="editaPet.css" rel="stylesheet">

</head>

<body id="body">
    <?php
    if (isset($_GET['id'])) {
        include 'conecta.php';
        $sql = "SELECT id, nome, raca, descricao, id_servico FROM pet where id = $_GET[id]";
        $pet = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
    }
    else{
    echo"<script>
                alert('Não foi passado nenhum id, está sendo redirecionada para criação!');
                window.location.href='../cadastraPet.php';
            </script>";
        }
    ?>
    <div class="container">
        <h3>Edição dos dados do Pet</h3>
        <?php
        echo "<form method='POST' action='../atualizaPet.php/?id=$pet[id]' enctype='multipart/form-data'>";
        ?>
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <?php
                echo "<input type='text' class='form-control' name='nome' value='$pet[nome]' required>";
                ?>
            </div>
            <div class="form-group">
                <label for="pwd">Raça:</label>
                <?php
                echo "<input type='text' class='form-control' name='raca' value='$pet[raca]' required>";
                ?>
            </div>
            <div class="form-group">
                <label for="pwd">Descrição:</label>
                <?php
                echo "<input type='textarea' class='form-control' name='descricao' value='$pet[descricao]' required>";
                ?>
            </div>
            <div class="form-group">
                <label for="sel1">Serviço:</label>
                <select class="form-control" name="servico">
                    <?php
                        include 'conecta.php';
                        $sql = "SELECT servico FROM tb_servico order by id";
                        $servicos = mysqli_query($conexao, $sql);
                        $i = 1;
                        while ($servico = mysqli_fetch_assoc($servicos)) {
                            if($i == $pet['id_servico'])
                                echo "<option value = $i selected>" . $servico['servico'] . "</option>";
                            else 
                                echo "<option value = $i>" . $servico['servico'] . "</option>";
                            $i = $i + 1;
                        }
                    ?>
                </select>
            </div>
            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
        </form>

    </div>
</body>

</html>