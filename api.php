<?php
if (isset($_POST["input_pokemon"])) {
    $nombre_pokemon = strtolower($_POST["input_pokemon"]);

    // inicializa una petición GET con la url que le demos
    $ch = curl_init("https://pokeapi.co/api/v2/pokemon/$nombre_pokemon/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Realiza la petición GET
    $result = curl_exec($ch);
    // Decodifica la respuesta y la almacena en un array asociativo
    $datos_pokemon = json_decode($result, true);
    curl_close($ch);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <header class="body__header">
        <div class="header__div-logo">
            <img src="./media/images/pokeapi.png" alt="pokeapi">
        </div>
        <nav class="header__nav">
            <a class="nav__a nav__a-selected" href="#">API</a>
            <a class="nav__a" href="index.php">SALIR</a>
        </nav>
    </header>

    <main class="body__main">
        <div class="main__div-form">
            <form action="api.php" method="post">
                <div class="form-group form__div-input">
                    <label for="input_pokemon">Nombre o id Pokemon:</label>
                    <input type="text" class="form-control" id="input_pokemon" name="input_pokemon" aria-describedby="input_pokemon" placeholder="prueba con: Pikachu">
                </div>
                <button type="submit" class="btn btn-primary">BUSCAR</button>
            </form>
        </div>
        <div class="main__div-pokemon">


            <?php for ($i = 0; $i < 10; $i++): ?>
            <?php endfor; ?>

            <?php if (isset($datos_pokemon)): ?>
                <div class="div-pokemon__carta">
                    <?php
                    $color_pokemon;
                    match ($datos_pokemon["types"][0]["type"]["name"]) {
                        "normal" => $color_pokemon = "#A0A2A0",
                        "water" => $color_pokemon = "#2481F0",
                        "electric" => $color_pokemon = "#FAC100",
                        "fire" => $color_pokemon = "#E72324",
                        "fairy" => $color_pokemon = "#EF71F0",
                        "ghost" => $color_pokemon = "#713F71",
                        "psychic" => $color_pokemon = "#EF3F7A",
                        "dragon" => $color_pokemon = "#4F60E2",
                        "bug" => $color_pokemon = "#92A212",
                        "sinister" => $color_pokemon = "#4F3F3D",
                        "steel" => $color_pokemon = "#60A2B9",
                        "ice" => $color_pokemon = "#3DD9FF",
                        "fighting" => $color_pokemon = "#FF8100",
                        "rock" => $color_pokemon = "#B0AB82",
                        "ground" => $color_pokemon = "#92501B",
                        "poison" => $color_pokemon = "#923FCC",
                        "flying" => $color_pokemon = "#82BAF0",
                        default => $color_pokemon = "#3DA224",
                    }
                    ?>
                    <div class="carta__img" style="background-color: <?= $color_pokemon ?>;">
                        <?php
                            echo "<img src=\"" . $datos_pokemon["sprites"]["front_default"] . "\">";
                        ?>
                    </div>
                    <div class="carta__nombre">
                        <?php
                        echo "<h3>" . ucfirst($datos_pokemon["name"]) . "</h3>";
                        ?>
                        <div class="info__pokemon">
                            <span>Type = <?= ucfirst($datos_pokemon["types"][0]["type"]["name"])?></span>
                            <span>HP = <?= $datos_pokemon["stats"][0]["base_stat"] ?></span>
                            <span>ATTACK = <?= $datos_pokemon["stats"][1]["base_stat"] ?></span>
                            <span>DEFENSE = <?= $datos_pokemon["stats"][2]["base_stat"] ?></span>
                            <span>SPECIAL-ATTACK = <?= $datos_pokemon["stats"][3]["base_stat"] ?></span>
                            <span>SPECIAL-DEFENSE = <?= $datos_pokemon["stats"][4]["base_stat"] ?></span>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
