<?php include('../banco-de-dados/conexao.php');

$SALVAR = $_POST['SALVAR'];

if (isset($SALVAR)) {
    $nome = $_POST['nome_projeto'];
    $coordenadas = $_POST['coordenadas_projeto'];
    $endereco = $_POST['endereco_projeto'];
    $telefone = $_POST['telefone_projeto'];
    $imagem = $_POST['imagem_projeto'];
    $site = $_POST['site_projeto'];
    $descricao = $_POST['descricao_projeto'];
    $categoria = $_POST['categoria_projeto'];
    $horarios = $_POST['horarios_projeto'];

    $inserir = "INSERT INTO projetos (nome_projeto, coordenadas_projeto, endereco_projeto, telefone_projeto, imagem_projeto, site_projeto, descricao_projeto, categoria_projeto, horarios_projeto) VALUES ('$nome','$coordenadas','$endereco','$telefone','$imagem','$site','$descricao', '$categoria', '$horarios')";


    if (mysqli_query($conn, $inserir)) {
        echo "<script> alert('Criado com sucesso!')</script>";
        echo "<script> window.location.href='listar.php'</script>";
    } else {
        echo "Error: " . $inserir . "<br>" . mysqli_error($conn);
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

        <h1>CRIAR</h1>

        <br><br>



        <form action="" method="post">
            <div class="form-group">
                <label for="nome_projeto">Nome do projeto</label>
                <input id="nome_projeto" name="nome_projeto" type="text" class="form-control" placeholder="Nome do projeto" required>
            </div>

            <div class="form-group">
                <label for="coordenadas_projeto">Coordenadas do projeto</label>
                <input id="coordenadas_projeto" name="coordenadas_projeto" type="text" class="form-control" placeholder="Coordenadas do projeto" required>
            </div>

            <div class="form-group">
                <label for="endereco_projeto">Endereço do projeto</label>
                <input id="endereco_projeto" name="endereco_projeto" type="text" class="form-control" placeholder="Endereço do projeto" required>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <label for="telefone_projeto">Telefone do projeto</label>
                    <input id="telefone_projeto" name="telefone_projeto" type="number" class="form-control" placeholder="Telefone do projeto" required>
                </div>

                <div class="col-8">
                    <label for="imagem_projeto">Imagem do projeto</label>
                    <input id="imagem_projeto" name="imagem_projeto" type="text" class="form-control" placeholder="Imagem do projeto" required>
                </div>
            </div>

            <div class="form-group">
                <label for="site_projeto">Site do projeto</label>
                <input id="site_projeto" name="site_projeto" type="text" class="form-control" placeholder="Site do projeto" required>
            </div>


            <div class="form-group">
                <label for="descricao_projeto">Descrição do projeto</label>
                <textarea id="descricao_projeto" name="descricao_projeto" type="text" class="form-control" placeholder="Descrição do projeto" required></textarea>
                <br>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <label for="categoria_projeto">Categoria do projeto</label>
                    <input id="categoria_projeto" name="categoria_projeto" type="text" class="form-control" placeholder="categoria do projeto" required>
                </div>

                <div class="col-8">
                    <label for="horarios_projeto">horario do projeto</label>
                    <input id="horarios_projeto" name="horarios_projeto" type="text" class="form-control" placeholder="horarios do projeto" required>
                </div>
            </div>

            <button type="submit" id="SALVAR" name="SALVAR" class="btn btn-success btn-lg btn-block">Criar projeto</button>
        </form>
    </div>
</body>

</html>