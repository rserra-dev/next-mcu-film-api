<?php

# Asignar la URL de la API a la variable
const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesión de cURL; ch = cURL Handle
$ch = curl_init(API_URL);

# Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# Ejecutamos petición y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <title>La próxima película de Marvel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <main>
        <section>
            <img src="<?= $data["poster_url"];?>" alt="">
        </section>
        <hgroup>
            <h2><?= $data["title"];?> se estrena en <?= $data["days_until"];?> días </h2>
            <h3>Fecha de Estreno: <?= $data["release_date"];?></h3>
            <h4>La siguiente pelicula es: <?= $data["following_production"]["title"];?></h4>
        </hgroup>
    </main>
</body>

<style>
body {
    margin: auto;
    background-color: darkslategrey;
    display: grid;
    color: white;
    padding: 10px;
}

img {
    margin: auto;
    border-radius: 20%;
    width: 30%;
}

section {
    display: flex;
    justify-content: center;
}

hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
</style>