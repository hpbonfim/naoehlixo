<?php include_once('./banco-de-dados/conexao.php');

$TITLE = "Pontos de Coleta";
$PROJETO = "NÃO É LIXO";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="./styles/mapa/index.css">
    <link rel="stylesheet" href="./styles/global/header.css">
    <link rel="stylesheet" href="./styles/global/style.css">
    <link rel="stylesheet" href="./styles/global/rodape.css">
    <title><?php echo $TITLE;?> - Não é Lixo</title>

    <style>

    </style>
</head>

<body>
<!--    
<header>
        <div class="top-container">
            <img src="./images/global/logo.png" alt="logo" class="logo">
        </div>
        <div class="title-container">
            <h1><?php echo $PROJETO;?></h1>
        </div>
        <div class="subtitle-container">
            <p>Um projeto da comunidade para a comunidade!</p>
        </div>
        <div class="nav-container">
            <div class="nav">
                <a href="index.php" class="navbar">INÍCIO</a>
                <a href="sobre.php" class="navbar">SOBRE</a>
                <a href="contato.php" class="navbar">CONTATO</a>
                <a href="mapa.php" class="navbar">MAPA DE PONTOS DE COLETA</a>
            </div>
        </div>
    </header>
-->
    
    <div id="map"></div>
    <script>
        /* CRIAÇÃO DO MAPA  ----------------------- */
        const map = L.map('map').setView([-23.5708175, -46.647965], 11)

        L.tileLayer('https://a.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            tileSize: 256,
            zoomOffset: 0
        }).addTo(map)
        L.control.scale().addTo(map)


        /* CRIAÇÃO DO MAPA  ----------------------- */
        const adicionarPin = (nome, coordenadas, endereco, telefone, imagem, site, descricao, categoria, horarios) => {
            let marker = L.marker(coordenadas).addTo(map);

            let mostrarTelefone = telefone == null || telefone == undefined || telefone == "" || telefone == " " ? "&nbsp;" : `<br><br><small><b>Telefone:&nbsp;</b> ${telefone}</small>`;

            let info = `
            <h1 style="text-align: center;">${nome}</h1>
            <img src='${imagem}' style="display: block; margin: auto; width: 100%; max-width: 200px">
            <br><br>
            <small><b>Endereço:&nbsp;</b> ${endereco}</small>
            ${mostrarTelefone}
            <br><br>
            <small><b>Descrição:&nbsp;</b> ${descricao}</small>
            <br><br>
            <small><b>Site:&nbsp;</b><a href="${site}" target="_blank"> ${nome}</a></small>
            <br><br>
            <small><b>Categoria:&nbsp;</b>${categoria}</small>
            <br><br>
            <small><b>Horario de funcionamento:&nbsp;</b>${horarios}</small>
            <br><br>
            `
            marker.bindPopup(info)
        }

        <?php while ($info = $resultado->fetch_array()) { ?>
            adicionarPin('<?php echo $info['nome_projeto']; ?>', <?php echo $info['coordenadas_projeto']; ?>, '<?php echo $info['endereco_projeto']; ?>', '<?php echo $info['telefone_projeto']; ?>', '<?php echo $info['imagem_projeto']; ?>', '<?php echo $info['site_projeto']; ?>', '<?php echo $info['descricao_projeto']; ?>', '<?php echo $info['categoria_projeto']; ?>', '<?php echo $info['horarios_projeto']; ?>')
        <?php } ?>
    </script>

</body>

</html>