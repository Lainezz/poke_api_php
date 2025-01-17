<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <header class="body__header">
        <div class="header__div-logo">
            <img src="./media/images/pokeapi.png" alt="pokeapi">
        </div>
        <nav class="header__nav">
            <a class="nav__a nav__a-selected" href="login.html">Login</a>
            <a class="nav__a" href="#">Registro</a>
        </nav>
    </header>

    <main class="body__main">

        <form class="main__login-form" action="do_login.php" method="post">
            <div class="login-form__container">
                <div class="form-group">
                    <label for="input_email">Email</label>
                    <input type="email" class="shadow form-control <?php echo isset($credenciales_incorrectas) && $credenciales_incorrectas ? "border border-danger border border-4" : "" ?>" id="input_email" name="input_email" aria-describedby="emailHelp"
                        placeholder="Introduce tu email">
                </div>
                <div class="form-group">
                    <label for="input_password">Password</label>
                    <input type="password" class="shadow form-control <?php echo isset($credenciales_incorrectas) && $credenciales_incorrectas ? "border border-danger border border-4" : "" ?>" id="input_password" name="input_password" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="check_shiny">
                    <label class="form-check-label" for="check_shiny">Make it shiny!</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>