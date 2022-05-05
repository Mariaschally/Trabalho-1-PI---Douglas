<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cadastraPet.css">
    <title> Criação de Pet </title>
    <h1>Pet Shop</h1>
</head>

<body>
    <div class="container">
        <h3>Criação de um novo Serviço</h3>
        <form method="POST" action="inserePet.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label for="pwd">Raça:</label>
                <input type="text" class="form-control" name="raca" required>
            </div>
            <div class="form-group">
                <label for="pwd">Descrição:</label>
                <input type="textarea" class="form-control" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="sel1">Servico:</label>
                <select class="form-control" name="servico">
                    <?php
                    include 'conecta.php';
                    $sql = "SELECT servico FROM tb_servico order by id";
                    $servicos = mysqli_query($conexao, $sql);
                    $i = 1;
                    while ($servico = mysqli_fetch_assoc($servicos)) {
                        echo "<option value = $i>" . $servico['servico'] . "</option>";
                        $i = $i + 1;
                    }
                    ?>
                </select>
            </div>
            <div id="button">
            <input class='btn btn-secondary' type="reset" value="Limpar">
            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
                </div>
        </form>
    </div>
</body>

</html>