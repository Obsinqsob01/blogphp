<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Pagina no encontrada!</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php 
    
        session_start();

        if($_SESSION["login"]) {
    ?>
            <nav class="navbar is-danger">
                <div class="navbar-brand">
                    <h1 class="title">
                        <a href="home.php">Blog</a>
                    </h1>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <a href="profile.php?id=<?php echo $_SESSION["id"];?>">Mi perfil</a>
                        </div>
                        <div class="navbar-item">
                            <a href="nuevoPost.php">Nuevo post</a>
                        </div>
                        <div class="navbar-item">
                            <a href="logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
    <?php
        }
    ?>

    <div class="container">
        <div class="hero is-link">
            <div class="hero-body">
                <h1 class="title">404 Pagina no encontrada</h1>
            </div>
        </div>
    </div>
</body>
</html>