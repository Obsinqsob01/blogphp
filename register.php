<?php
    session_start();    

    require('./db/db.php');

    if($_SESSION["login"]){
        header('Location: home.php');
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $sql = "INSERT INTO usuarios(nombre, email, password) VALUES('$nombre', '$email', '$pass')";

        if($mysqli -> query($sql) === TRUE){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $mysqli-> insert_id;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["email"] = $email;

            header("location: home.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="hero is-link">
            <div class="hero-body">
                <h1 class="title">Registro</h1>

                <form action="/register.php" method="post">
                    <div class="field">
                        <label for="nombre" class="label">Nombre:</label>
                        <input required type="text" name="nombre" placeholder="Ingresa tu nombre" class="input">
                    </div>
                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <input required type="email" name="email" placeholder="Ingresa tu email" class="input">
                    </div>
                    <div class="field">
                        <label for="password" class="label">Contraseña</label>
                        <input required type="password" placeholder="********" name="password" class="input">
                    </div>
                    <br>
                    <a href="/login.php">¿Ya tienes una cuenta?</a>
                    <br>
                    <button type="submit" class="button is-light">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>