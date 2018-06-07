<?php

    session_start();

    require('db/db.php');

    if($_SESSION["login"]){
        header('Location: home.php');
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass'";
    
        $result = $mysqli->query($sql);

        if($result -> num_rows > 0){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $result -> fetch_assoc()["id"];
            $_SESSION["nombre"] = $nombre;
            $_SESSION["email"] = $email;

            header('Location: home.php');
        } else {
            $error = "Ha ocurrido un error al iniciar sesión, verifica tus datos";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="hero is-link">
            <div class="hero-body">
                <h1 class="title">Login</h1>

                <?php 
                
                    if(isset($error)) {
                ?>
                    <div class="notification is-danger">
                        <p><?php echo $error; ?></p>
                    </div>
                <?php
                    }
                ?>

                <form action="/login.php" method="post">
                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <input type="email" name="email" placeholder="Ingresa tu email" class="input" required>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Contraseña</label>
                        <input type="password" placeholder="********" name="password" class="input" required>
                    </div>
                    <br>
                    <a href="/register.php">¿Aún no tienes una cuenta?</a>
                    <br>
                    <button type="submit" class="button is-light">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>