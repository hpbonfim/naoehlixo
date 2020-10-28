<?php include_once('./banco-de-dados/conexao.php');

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
    <link rel="stylesheet" href="./styles/map/index.css">
    <title>Mapa - NãoEhLixo</title>

    <style>
        
    </style>
</head>

<body>
    <div id="map"></div>
    <script>
        /* CRIAÇÃO DO MAPA  ----------------------- */
        const map = L.map('map').setView([-23.5708175, -46.647965], 11);

        L.tileLayer('https://a.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            tileSize: 256,
            zoomOffset: 0
        }).addTo(map);
        L.control.scale().addTo(map);


        /* CRIAÇÃO DO MAPA  ----------------------- */
        const adicionarPin = (nome, coordenadas, endereco, telefone, imagem, site, descricao) => {
            let marker = L.marker(coordenadas).addTo(map);

            let info = `
            <h1>${nome}</h1>
            <img src='${imagem}' width='100%'>
            <small><b>Endereço:</b> ${endereco}</small>
            <br>
            <small><b>Telefone:</b> ${telefone}</small>
            <br>
            <small><b>Descrição:</b> ${descricao}</small>
            <br>
            <small><b>Site:</b><a href="${site}" target="_blank"> ${site}</a></small>
            <br>
            `
            marker.bindPopup(info);
        }

        <?php while ($info = $resultado->fetch_array()) { ?>
            adicionarPin('<?php echo $info['nome_projeto']; ?>', <?php echo $info['coordenadas_projeto']; ?>, '<?php echo $info['endereco_projeto']; ?>', '<?php echo $info['telefone_projeto']; ?>', '<?php echo $info['imagem_projeto']; ?>', '<?php echo $info['site_projeto']; ?>', '<?php echo $info['descricao_projeto']; ?>')
        <?php } ?>
    </script>

</body>

</html>