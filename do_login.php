<?php
if (isset($_POST["input_email"]) && isset($_POST["input_password"])) {

    require_once "jsonhandler.php";

    $email_input = $_POST["input_email"];
    $password_input = $_POST["input_password"];
    $nombre_user = "";

    $usuarios = loadEventsFromJson();
    $flag_login_correcto = false;

    foreach ($usuarios as $usuario) {
        $credenciales_incorrectas = false;
        if ($usuario["email"] ==  $email_input && $usuario["password"] ==  $password_input) {
            $nombre_user = $usuario["nombre"] ?? "Invitado";
            $flag_login_correcto = true;
            require_once "api.php";
            break;
        }
    }

    if (!$flag_login_correcto) {
        $credenciales_incorrectas = true;
        require_once "index.php";
    }
} else {

    $faltan_datos = true;

    require_once "index.php";
}
