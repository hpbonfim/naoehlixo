<?php 
$PROJETO = "NÃO É LIXO";
$TITLE = "Início"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index/header.css">
    <link rel="stylesheet" href="./styles/index/inicio.css">
    <link rel="stylesheet" href="./styles/index/sobre.css">
    <link rel="stylesheet" href="./styles/index/projetos.css">
    <link rel="stylesheet" href="./styles/index/blog.css">
    <link rel="stylesheet" href="./styles/global/style.css">
    <link rel="stylesheet" href="./styles/global/rodape.css">
    <title><?php echo $TITLE;?> - Não é Lixo</title>
</head>

<body>
    <header>
        <img src="./images/index/header/header.png" class="background" alt="background header">
        <div class="top-container">
            <img src="./images/global/logo.png" alt="logo" class="logo">
            <div class="nav-container">
                <a href="index.php" class="navbar">INÍCIO</a>
                <a href="sobre.php" class="navbar">SOBRE</a>
                <a href="projetos.php" class="navbar">PROJETOS</a>
                <a href="blog.php" class="navbar">BLOG</a>
                <a href="contato.php" class="navbar">CONTATO</a>
                <a href="mapa.php" class="navbar">MAPA DE PONTOS DE COLETA</a>
            </div>
        </div>
        <div class="title-container">
            <h1><?php echo $PROJETO;?></h1>
        </div>
        <div class="subtitle-container">
            <h1>VAMOS CRIAR UM MUNDO MAIS LIMPO E SUSTENTÁVEL?</h1>
        </div>
        <div class="botao-container">
            <a href="#footer">
                <img src="./images/index/header/button.png" alt="botao">
            </a>
        </div>
    </header>

    <section class="inicio">
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>

    </section>

    <section class="sobre">
        <img src="./images/index/sobre/background.png" class="background" alt="background header">
    </section>

    <section class="projetos">
        <img src="./images/index/projetos/background.png" class="background" alt="background header">
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
    </section>

    <section class="blog">
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
    </section>

    <footer id="footer">
        <img src="./images/global/rodape/background.png" class="background" alt="background header">
        <div class="text-container">
            <p>&copy; NÃO É LIXO </p>
        </div>
        <div class="social-container">
            <a href="">
                <img src="./images/global/rodape/facebook.png" alt="facebook">
            </a>
            <a href="">
                <img src="./images/global/rodape/instagram.png" alt="instagram">
            </a>
            <a href="">
                <img src="./images/global/rodape/youtube.png" alt="youtube">
            </a>
            <a href="">
                <img src="./images/global/rodape/whatsapp.png" alt="whatsapp">
            </a>
            <a href="">
                <img src="./images/global/rodape/twitter.png" alt="twitter">
            </a>
        </div>
    </footer>
</body>

</html>