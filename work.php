<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="./css/work-Style.css">
    <link href="./main.3f6952e4.css" rel="stylesheet">

    <title>Portafolio</title> 

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

          <!--Aqui se agregan los proyectos de la base de datos-->
          <?php
            require_once(__DIR__ . '/database/conexion.php'); // Incluye el archivo de conexión
            try {
              $pdo = obtenerConexion(); // Llama a la función que devuelve la conexión
          
              // Realiza la consulta
              $stmt = $pdo->query("SELECT * FROM proyectos WHERE id = 15");
          
              // Obtiene los resultados
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
              // Muestra los resultados en HTML
              foreach ($results as $row) {
                echo 
                '<div class="col-sm-8 col-sm-offset-2 section-container-spacer text-center full-width">
                <h1 class="h2">'.$row['nombre'].'</h1>
                <br>
                <br>
                <hr>
                <h1 class="h3">Acerca del proyecto</h1>
                <hr>
                <p class="text-justify">'.$row['descripcion'].'</p>
              </div>
              ';
              }
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
          ?>

          <div class="col-sm-8 col-sm-offset-2 section-container-spacer  full-width">
            <h1 class="h3">Tecnologías</h1>
            <div class="row">
              <div class="col-xs-2 col-md-1"> <!-- Cambiando el tamaño de la columna a col-md-4 -->
                <img src="./assets/images/cpp.png" class="img-responsive" alt="">
              </div>
              <div class="col-xs-2 col-md-1"> <!-- Agregando otra columna -->
                <img src="./assets/images/cpp.png" class="img-responsive" alt="">
              </div>
              <div class="col-xs-2 col-md-1"> <!-- Cambiando el tamaño de la columna a col-md-4 -->
                <img src="./assets/images/cpp.png" class="img-responsive" alt="">
              </div>
              <div class="col-xs-2 col-md-1"> <!-- Agregando otra columna -->
                <img src="./assets/images/cpp.png" class="img-responsive" alt="">
              </div>
            </div>
            <hr>
          </div>

          <div class="col-xs-12 text-center">
            <h1 class="h3">Capturas de pantalla</h1>
            <hr>
            <img src="./assets/images/work001-04.jpg" class="img-responsive" alt="">
            <img src="./assets/images/work001-04.jpg" class="img-responsive" alt="">
            <br>
            <hr>
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