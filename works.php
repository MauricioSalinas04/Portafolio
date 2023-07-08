<?php 
  require_once(__DIR__ . '/database/conexion.php'); // Incluye el archivo de conexión
  $pdo = obtenerConexion(); // Obtener conexion con servidor 
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">

    <title>Portafolio</title>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="./css/works-Style.css">
    <link href="./main.3f6952e4.css" rel="stylesheet">
  </head>

  <body class="">
    <div id="site-border-left"></div>
    <div id="site-border-right"></div>
    <div id="site-border-top"></div>
    <div id="site-border-bottom"></div>
     <!-- Add your content of header -->
    <header>
      <nav class="navbar  navbar-fixed-top navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav ">
              <li><a href="./index.html" title="">Inicio</a></li>
              <li><a href="./works.php" title="">Proyectos</a></li>
              <li><a href="./about.html" title="">Sobre mí</a></li>
              <li><a href="./contact.html" title="">Contacto</a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </header>

    <div class="section-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 section-container-spacer">
            <div class="text-center">
              <h1 class="h2">Proyectos</h1>
              <hr>
              <p>Nulla facilisi. Vivamus vestibulum, elit in scelerisque ultricies, nisl nunc pulvinar ligula, id sodales arcu sapien in nisi. Quisque libero enim, mattis non augue posuere, venenatis dapibus urna.</p>
              <hr>
            </div>
          </div>
          <div class="col-md-12">
            <div class="gallery">
              <div class="row">

                <!--Aqui se agregan los proyectos de la base de datos-->
                <?php
                  try {
                    // Realiza la consulta
                    $stmt = $pdo->query("SELECT * FROM proyectos");
                
                    // Obtiene los resultados
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    // Muestra los resultados en HTML
                    foreach ($results as $row) {
                      echo '<div class="col-sm-4 main-image">
                      <div class="image-container">
                        <img src="./assets/images/'.$row['portada'].'" alt="" class="img-responsive img-size">
                      </div>
                      <div class="text-center mt-3 full-width-title">
                        <h1 class="h3">' . $row['nombre'] . '</h1>
                      </div>
                      <div class="text-center mt-3">
                        <a href="./work.php" title="" class="btn btn-default full-width">Ver más</a>
                      </div>
                    </div>
                    ';
                    }
                  } catch (PDOException $e) {
                      die("Error de conexión: " . $e->getMessage());
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer-container text-center">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <p>© UNTITLED | Website created with <a href="http://www.mashup-template.com/" title="Create website with free html template">Mashup Template</a>/<a href="https://www.unsplash.com/" title="Beautiful Free Images">Unsplash</a></p>
          </div>
        </div>
      </div>
    </footer>

    <script>
      document.addEventListener("DOMContentLoaded", function (event) {
         navActivePage();
      });
    </script>
    <script type="text/javascript" src="./main.70a66962.js"></script>

  </body>
</html>