<?php
    
    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes y Raices">   
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="DarkMode">
                    <nav class="navegacion">
                        <a href="../nosotros.php">Nosotros</a>
                        <a href="../anuncios.php">Anuncios</a>
                        <a href="../blog.php">Blog</a>
                        <a href="../contacto.php">Contacto</a>
                        <a href="../login.php">Login</a>
                        <?php if($auth): ?>
                            <a href="../cerrar-session.php">Cerrar Session</a>
                        <?php endif; ?>
                    </nav>
                </div>



            </div>
            <?php
                if($inicio){
                    echo "<h1>Ventas de Casas y Apartamentos de Lujos</h1>";
                }
            ?>
        </div>
    </header>