<?php include_once('../banco-de-dados/conexao.php');

// PEGA AS INFORMAÇOES DO BANCO
$ID_PRODUTO = $_GET['ID'];
$opcao = isset($ID_PRODUTO) ? $ID_PRODUTO : false;

if ($opcao) {
    $sql = "SELECT * FROM projetos WHERE id_projeto = '$ID_PRODUTO'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) <= 0) {
        // retorna a listagem se não existir o id digitado
        echo "<script>alert('Página invalida')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
} else {
    // Retorna a listagem se caso ocorra da pessoa digitar o endereço (http://localhost/editar.php?id=1) sem o (?id=1)
    echo "<script>alert('Página invalida')</script>";
    echo "<script>window.location.href='index.php'</script>";
}

// FIM

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR)) {

    $id = $_POST['id_projeto'];
    $nome = $_POST['nome_projeto'];
    $coordenadas = $_POST['coordenadas_projeto'];
    $endereco = $_POST['endereco_projeto'];
    $telefone = $_POST['telefone_projeto'];
    $imagem = $_POST['imagem_projeto'];
    $site = $_POST['site_projeto'];
    $descricao = $_POST['descricao_projeto'];
    $categoria = $_POST['categoria_projeto'];
    $horarios = $_POST['horarios_projeto'];

    $update = "UPDATE projetos SET nome_projeto='$nome', coordenadas_projeto='$coordenadas', endereco_projeto='$endereco', telefone_projeto='$telefone', imagem_projeto='$imagem', site_projeto='$site', descricao_projeto='$descricao', categoria_projeto='$categoria', horarios_projeto='$horarios' WHERE id_projeto=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script> alert('Editado com sucesso!')</script>";
        echo "<script> window.location.href='listar.php'</script>";
    } else {
        echo "Error: " . $update . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    h1 {
        text-align: center;
        font-size: 50px;
    }
</style>

<body>
    <br><br>

    <div class="container-lg">


        <a href="listar.php">
            <button type="button" class="btn btn-primary btn-lg btn-block">
                Voltar para a lista
            </button>
        </a>

        <br><br>
        <h1>EDITAR</h1>
        <br><br>


        <form action="" method="post">
            <?php while ($info = $resultado->fetch_array()) { ?>

                <input id="id_projeto" name="id_projeto" type="hidden" value="<?php echo $info['id_projeto'] ?>">

                <div class="form-group">
                    <label for="nome_projeto">Nome do projeto</label>
                    <input id="nome_projeto" name="nome_projeto" type="text" class="form-control" placeholder="Nome do projeto" value="<?php echo $info['nome_projeto']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="coordenadas_projeto">Coordenadas do projeto</label>
                    <input id="coordenadas_projeto" name="coordenadas_projeto" type="text" class="form-control" placeholder="Coordenadas do projeto" value="<?php echo $info['coordenadas_projeto']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="endereco_projeto">Endereço do projeto</label>
                    <input id="endereco_projeto" name="endereco_projeto" type="text" class="form-control" placeholder="Endereço do projeto" value="<?php echo $info['endereco_projeto']; ?>" required>
                </div>

                <div class="form-row">
                    <div class="col-4">
                        <label for="telefone_projeto">Telefone do projeto</label>
                        <input id="telefone_projeto" name="telefone_projeto" type="text" class="form-control" placeholder="Telefone do projeto" value="<?php echo $info['telefone_projeto']; ?>">
                    </div>

                    <div class="col-8">
                        <label for="imagem_projeto">Imagem do projeto</label>
                        <input id="imagem_projeto" name="imagem_projeto" type="text" class="form-control" placeholder="Imagem do projeto" value="<?php echo $info['imagem_projeto']; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="site_projeto">Site do projeto</label>
                    <input id="site_projeto" name="site_projeto" type="text" class="form-control" placeholder="Site do projeto" value="<?php echo $info['site_projeto']; ?>" required>
                </div>


                <div class="form-group">
                    <label for="descricao_projeto">Descrição do projeto</label>
                    <textarea id="descricao_projeto" name="descricao_projeto" type="text" class="form-control" placeholder="Descrição do projeto" required><?php echo $info['descricao_projeto']; ?></textarea>
                    <br>
                </div>

                <div class="form-row">
                    <div class="col-4">
                        <label for="categoria_projeto">Categoria do projeto</label>
                        <input id="categoria_projeto" name="categoria_projeto" type="text" class="form-control" placeholder="categoria do projeto" value="<?php echo $info['categoria_projeto']; ?>" required>
                    </div>

                    <div class="col-8">
                        <label for="horarios_projeto">horário do projeto</label>
                        <input id="horarios_projeto" name="horarios_projeto" type="text" class="form-control" placeholder="horarios do projeto" value="<?php echo $info['horarios_projeto']; ?>">
                    </div>
                </div>

            <?php } ?>
            <br>
            <button type="submit" id="SALVAR" value="SALVAR" name="SALVAR" class="btn btn-success btn-lg btn-block">Salvar edição</button>
        </form>
    </div>
</body>

</html>