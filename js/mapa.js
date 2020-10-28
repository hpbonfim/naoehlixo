/* FIM ----------------------- */

const mapaViewControl = (latlgn, zoom) => {
    map.setView(latlgn, 15);
}


/* PIN AZUL ----------------------- */
const adicionarPin = () => {
    let marker = L.marker(teste, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5
    }).addTo(map);
    marker.bindPopup("<b>Hello world!</b><br>Eu sou um popup.<br><img src='https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png' width='100vw'><br><button onclick=`alert('OK')`>OK</button><br>").openPopup();

}
/* FIM ----------------------- */

/* CÍRCULO VERMELHO ----------------------- */
const adicionarCirculo = () => {
    let circle = L.circle([51.508, -0.11], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);

    circle.bindPopup("Eu sou um círculo.");
}

/* FIM ----------------------- */

/* POLÍGONO AMARELO ----------------------- */
const adicionarPoligono = () => {
    let polygon = L.polygon([
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
    ], {
        color: 'yellow',
        fillColor: '#010',
        fillOpacity: 0.6
    }).addTo(map);
    polygon.bindPopup("Eu sou um polígono.");
}

/* FIM ----------------------- */

/* POPUP SOLITÁRIO ----------------------- */
const adicionarPopup = () => {
    let popup = L.popup()
        .setLatLng([51.5, -0.09])
        .setContent("Eu sou apenas um popup.")
        .openOn(map);
}
/* FIM ----------------------- */

/* EVENTO AO CLICAR NO MAPA COM O BOTÃO DIREITO ----------------------- */
const onMapClick = (event) => {
    console.log(event)
    console.log(event.latlng)
    mapaViewControl(event.latlng, 12)

    // OPCIONAL/ADICIONAL
    let popup = L.popup();

    popup
        .setLatLng(event.latlng)
        .setContent("Você clicou no mapa: " + event.latlng.toString())
        .openOn(map);
}
map.on('contextmenu', onMapClick);


/* FIM ----------------------- */

/* ICONE PERSONALIZADO */
const adicionarIconePersonalizado = () => {
    let othergreenIcon = L.icon({
        iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png',
        shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',

        iconSize: [38, 95], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([51.5, -0.19], {
        icon: othergreenIcon
    }).addTo(map);
}
/* FIM */

const adicionarIconePopupPersonalizado = () => {
    let LeafIcon = L.Icon.extend({
        options: {
            shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',
            iconSize: [38, 95],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76]
        }
    });

    let greenIcon = new LeafIcon({
        iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png'
    }),
        redIcon = new LeafIcon({
            iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-red.png'
        }),
        orangeIcon = new LeafIcon({
            iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-orange.png'
        });

    L.icon = function (options) {
        return new L.Icon(options);
    };

    L.marker([51.5, -0.09], {
        icon: greenIcon
    }).addTo(map).bindPopup("Eu sou uma folha verde.");
    L.marker([51.495, -0.083], {
        icon: redIcon
    }).addTo(map).bindPopup("Eu sou uma folha vermelha.");
    L.marker([51.49, -0.1], {
        icon: orangeIcon
    }).addTo(map).bindPopup("Eu sou uma folha laranja.");
}