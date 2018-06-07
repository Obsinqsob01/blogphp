<?php
    session_start();
    
    require('db/db.php');

    if(!$_SESSION["login"]){
        header('Location: login.php');
    }

    $sql = "SELECT * FROM posts ORDER BY id DESC";

    $posts = $mysqli -> query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

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
        <h1 class="title text-white">Home</h1>
        <?php 
        
            foreach($posts as $post) {
                $iduser = $post['idUsuario'];
                $sqluser = "SELECT * FROM usuarios WHERE id = $iduser";

                $result = $mysqli->query($sqluser);
                $user = $result->fetch_assoc();

                ?>
                <a href="/post.php?id=<?php echo $post["id"]?>&titulo=<?php echo $post["titulo"]?>">
                    <div class="card home">
                        <div class="card-header">
                            </a>
                            <a href="/profile.php?id=<?php echo $post["idUsuario"];?>">
                                <h3 class="subtitle username is-3"><?php echo $user["nombre"];?></h2>
                            </a>
                <a href="/post.php?id=<?php echo $post["id"]?>&titulo=<?php echo $post["titulo"]?>">                            
                            <h3 class="subtitle is-3">
                                <?php echo $post["titulo"]?>  
                            </h3>                      
                        </div>
                        <div class="card-content">
                            <p>
                                <?php echo $post["contenido"]?>
                            </p>
                        </div>
                    </div>
                </a>
                <?php
            }
        ?>
    </div>
</body>
</html>