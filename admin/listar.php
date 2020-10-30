<?php include_once('../banco-de-dados/conexao.php');

session_start();
if ((!isset($_SESSION['email_admin']) == true) && (!isset($_SESSION['senha_admin']) == true)) {
    unset($_SESSION['email_admin']);
    unset($_SESSION['senha_admin']);
    header('location:login.php');
}

// QUERY
$palavra_chave = $_POST['FILTRO'];
$opcao = isset($palavra_chave) ? $palavra_chave : false;

if ($opcao) {
$sql = "SELECT * FROM projetos WHERE nome_projeto = '$palavra_chave'";
} else {
$sql = "SELECT * FROM projetos";
}

if (mysqli_query($conn, $sql)) {
$resultado = mysqli_query($conn, $sql);
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// FIM QUERY


// LISTA SELECT CATEGORIAS
$sql_projetos = "SELECT DISTINCT nome_projeto FROM projetos";

if (mysqli_query($conn, $sql_projetos)) {
$projetos = mysqli_query($conn, $sql_projetos);
} else {
echo "Error: " . $sql_projetos . "<br>" . mysqli_error($conn);
}
// FIM LISTA


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<script>
    confirmarRemocao = (id) => {
        let deletar = confirm('Deseja mesmo deletar este projeto?');
        if (deletar) {
            window.location.href = `deletar.php?ID=${id}`;
        }
    }
</script>

<body>

    <br><br>

    <div class="container-fluid">

        <a href='/' style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-primary btn-lg btn-block">
                Voltar para o início
            </button>
        </a>

        <br><br>

        <form action="listar.php" method="post">
            <div class="input-group">
                <select name="FILTRO" class="custom-select">
                    <option value="">Todos</option>
                    <?php while ($info = $projetos->fetch_array()) { ?>
                        <option value="<?php echo $info['nome_projeto']; ?>"><?php echo $info['nome_projeto']; ?></option>
                    <?php } ?>
                </select>
                <div class="input-group-append">

                    <input type="submit" class="btn btn-primary" value="Filtrar">
                </div>
            </div>
        </form>

        <br><br>

        <a href='inserir.php' style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-info btn-lg ">
                Cadastrar novo projeto
            </button>
        </a>

        <br><br>

        <table class="table table-sm">
            <thead class="thead-dark">
                <th>Código</th>
                <th>Nome do Projeto</th>
                <th>Coordenadas do projeto</th>
                <th>Endereço do projeto</th>
                <th>Telefone do projeto</th>
                <th>Imagem do projeto</th>
                <th>Site do projeto</th>
                <th>Descrição do projeto</th>
                <th>Categoria do projeto</th>
                <th>Horarios do projeto</th>
                <th>Ações</th>
            </thead>

            <?php while ($info = $resultado->fetch_array()) { ?>

                <tr>
                    <td><?php echo $info['id_projeto']; ?></td>
                    <td><?php echo $info['nome_projeto']; ?></td>
                    <td><?php echo $info['coordenadas_projeto']; ?></td>
                    <td><?php echo $info['endereco_projeto']; ?></td>
                    <td><?php echo $info['telefone_projeto']; ?></td>
                    <td><?php echo $info['imagem_projeto']; ?></td>
                    <td><?php echo $info['site_projeto']; ?></td>
                    <td><?php echo $info['descricao_projeto']; ?></td>
                    <td><?php echo $info['categoria_projeto']; ?></td>
                    <td><?php echo $info['horarios_projeto']; ?></td>
                    <td style="text-align: center;">
                        <a class="badge badge-info" href="editar.php?ID=<?php echo $info['id_projeto']; ?>">Editar</a>
                        <a class="badge badge-danger" onclick="confirmarRemocao(<?php echo $info['id_projeto']; ?>)">Excluir</a>
                    </td>
                </tr>

            <?php } ?>
        </table>

    </div>


</body>

</html>