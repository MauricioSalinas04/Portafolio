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

          <!--Aqui se agrega la informacion del proyecto seleccionado-->
          <?php
            try {
              //Realizar consulta a tabla PROYECTOS
              $stmt = $pdo->query("SELECT * FROM proyectos WHERE id = 15");                         //
              $results = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene los resultados
            
              // Verifica si se encontraron resultados
              if ($results) {
                
                //Obtiene datos del registro
                $nombre = $results['nombre'];
                $descripcion = $results['descripcion'];
                $repo = $results['repositorio'];

                //Imprime Titulo y Descripcion
                echo 
                '<div class="col-sm-8 col-sm-offset-2 section-container-spacer text-center full-width">
                  <h1 class="h2">'.$nombre.'</h1>
                  <br>
                  <br>
                  <hr>
                  <h1 class="h3">Acerca del proyecto</h1>
                  <hr>
                  <p class="text-justify">'.$descripcion.'</p>
                </div>
                ';
              } else {
                // No se encontraron resultados
                echo "No se encontraron resultados.";
                return;
              }

              // Realiza consulta con intermediario
              $stmt = $pdo->query("SELECT * FROM proyectos_tecnologias WHERE proyecto_id = 15");                            //
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados

              echo '
              <div class="col-sm-8 col-sm-offset-2 section-container-spacer  full-width">
              <h1 class="h3">Tecnologías</h1>
              <div class="row">';
            
              // Almacena los resultados en HTML en una variable
              $html = '';
              foreach ($results as $row) {
                $tecnologia = $row['tecnologia_id'];
                // Realiza consulta para obtener la ruta del icono en base a la información dada por el intermediario
                $stmtTecnologias = $pdo->query("SELECT * FROM tecnologias WHERE id = $tecnologia");
                $resultsTecnologias = $stmtTecnologias->fetch(PDO::FETCH_ASSOC); // Obtiene los resultados
              
                // Verifica si se encontraron resultados
                if ($resultsTecnologias && $stmtTecnologias->rowCount() > 0) {
                  // Obtiene ruta
                  $rutaIcono = $resultsTecnologias['ruta'];
                
                  $html .= '
                    <div class="col-xs-2 col-md-1"> <!-- Cambiando el tamaño de la columna a col-md-4 -->
                      <img src="./assets/images/tecnologias/'.$rutaIcono.'" class="img-responsive" alt="">
                    </div>';
                }
              }

              // Verifica si se encontraron tecnologias y muestra el mensaje en caso contrario
              if (empty($html)) {
                $html = '
                  <div class="col-xs-6 col-md-6"> <!-- Cambiando el tamaño de la columna a col-md-4 -->
                    <h1 class="h4">No se encontraron tecnologias.</h1>
                  </div>';
              }

              // Imprime el contenido HTML
              echo $html;

              //Continuacion de codigo HTML
              echo '
              </div>
              <hr>
              </div>

              <div class="col-xs-12">
              <h1 class="h3 text-center">Capturas de pantalla</h1>
              <hr>';

              // Realiza consulta a tabla CAPTURAS
              $stmt = $pdo->query("SELECT ruta FROM capturas WHERE proyecto_id = 15");                            //
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados

              if($results){
                // Muestra las capturas en HTML
                foreach ($results as $row) {
                  $ruta = $row['ruta'];
                  echo '<img src="./assets/images/capturas/'.$ruta.'" class="img-responsive" alt="">';
                }
              }else{
                echo '<h1 class="h4 text-center">No hay capturas.</h1>';
              }
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
          ?>
            <div class="col-xs-12 text-justify">
              <h1 class="h3">Repositorio</h1>
              <div class="row">
                <?php 
                  if($repo){
                    echo 
                    '<div class="col-xs-2 col-md-1">
                    <a href="'.$repo.'" target="_blank">
                    <img src="./assets/images/social.png" class="img-responsive" alt="" style="width:75%; height: auto; margin: 10px 0px;">
                    </a>
                    </div>';
                  }else{
                    echo 
                    '<div class="col-xs-6 col-md-6">
                    <h1 class="h4">No hay repositorio.</h1>
                    </div>';
                  } 
                ?>
              </div>
              <hr>
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