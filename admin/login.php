<?php include_once('../banco-de-dados/conexao.php');

$PROJETO = "NÃO É LIXO";
$TITLE = "Login";

session_start();
$submit = $_POST['autorizado'];
$autorizar = isset($submit) ? $submit : false;

if ($autorizar) {
    $email = $_POST['email_admin'];
    $senha = $_POST['senha_admin'];

    $sql = "SELECT * FROM admin WHERE senha_admin = '$senha'";

    if (mysqli_query($conn, $sql)) {
        $resultado = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultado) <= 0) {
            echo "<script>alert('Não Autorizado')</script>";
        } else {
            $_SESSION['email_admin'] = $email;
            $_SESSION['senha_admin'] = $senha;
            header('location:listar.php');
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/global/header.css">
    <link rel="stylesheet" href="../styles/global/style.css">
    <link rel="stylesheet" href="../styles/global/rodape.css">
    <link rel="stylesheet" href="../styles/admin/login.css">
    <title><?php echo $TITLE; ?> - Não é Lixo</title>
</head>

<body>
    <header>
        <div class="top-container">
            <img src="../images/global/logo.png" alt="logo" class="logo">
        </div>
        <div class="title-container">
            <h1><?php echo $PROJETO; ?></h1>
        </div>
        <div class="subtitle-container">
            <p>Um projeto da comunidade para a comunidade!</p>
        </div>
        <div class="nav-container">
            <div class="nav">
                <a href="/index.php" class="navbar">INÍCIO</a>
                <a href="/sobre.php" class="navbar">SOBRE</a>
                <a href="/contato.php" class="navbar">CONTATO</a>
                <a href="/mapa.php" class="navbar">MAPA DE PONTOS DE COLETA</a>
            </div>
        </div>
        <br><br>
    </header>

    <br><br>
    <section class="login">
        <form action="" method="POST">
            <div class="login-container">
                <p>Administração</p>
                <input type="text" class="form-control-plaintext" id="email_admin" name="email_admin" value="admin@naoehlixo.com" readonly disabled>
                <br><br>
                <label for="senha_admin" class="sr-only">Password</label>
                <input type="password" class="form-control" id="senha_admin" name="senha_admin" value="" placeholder="Digite a senha master">
                <br><br>
                <button type="submit" value="autorizado" name="autorizado">Confirmar identidade</button>
            </div>
        </form>
    </section>
    <br><br>

    <footer id="footer">
        <img src="../images/global/rodape/background.png" class="background" alt="background header">
        <div class="text-container">
            <a style="text-decoration: none;" href="/admin/login.php">
                <p>&copy; NÃO É LIXO </p>
            </a>
        </div>
        <div class="social-container">
            <a href="#">
                <img src="../images/global/rodape/facebook.png" alt="facebook">
            </a>
            <a href="#">
                <img src="../images/global/rodape/instagram.png" alt="instagram">
            </a>
            <a href="#">
                <img src="../images/global/rodape/youtube.png" alt="youtube">
            </a>
            <a href="#">
                <img src="../images/global/rodape/whatsapp.png" alt="whatsapp">
            </a>
            <a href="#">
                <img src="../images/global/rodape/twitter.png" alt="twitter">
            </a>
        </div>
    </footer>

</body>

</html>