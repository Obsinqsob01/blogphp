<?php
    session_start();    

    require('./db/db.php');

    if(!$_SESSION["login"]){
        header('Location: login.php');
    }

    $id = $_GET["id"];
    $titulo = $_GET["titulo"];

    $sql = "SELECT * FROM posts WHERE id = $id AND titulo = '$titulo'";

    $result = $mysqli -> query($sql);

    if(!$result -> num_rows > 0){
        header('Location: 404.php');
    }

    $post = $result->fetch_assoc();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $post["titulo"]; ?></title>

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
        <div class="card is-link">
            <div class="card-header">
                <h1 class="title"><?php echo $post["titulo"];?></h1>
            </div>
            <div class="card-content">
                <p>
                    <?php echo $post["contenido"]; ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>