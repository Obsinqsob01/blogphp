<?php
    session_start();    

    require('./db/db.php');

    if(!$_SESSION["login"]){
        header('Location: login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $titulo = $_POST["titulo"];
        $contenido = $_POST["contenido"];
        $idUsuario = $_SESSION["id"];

        $sql = "INSERT INTO posts(titulo, contenido, idUsuario) VALUES('$titulo', '$contenido', $idUsuario)";
        echo $sql;
        if($mysqli -> query($sql) === TRUE){
            header("location: post.php?id=$mysqli->insert_id&titulo=$titulo");
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
    <div class="container">
        <div class="hero is-success">
            <div class="hero-body">
                <h1 class="title">Hola agrega un post</h1>

                <form action="/nuevoPost.php" method="post">
                    <div class="field">
                        <label for="titulo" class="label">Titulo:</label>
                        <input required type="text" name="titulo" placeholder="Ingresa el titulo del post" class="input">
                    </div>
                    <div class="field">
                        <label for="contenido" class="label">Contenido:</label>
                        <textarea required name="contenido" placeholder="Ingresa el contenido" class="textarea"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="button is-light">Publicar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>