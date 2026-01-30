 <?php
    $active_caballeros="active";  
   $title="MODACHIKOS Caballeros";
    /* Conectarse a la bd*/
    require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>

    <!DOCTYPE html>
    <html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
    <?php
    include("navbar.php");
    ?>
    <div class="espacio">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/hombre.jpg" alt="">
                                </div>
                                <div class="item">
                                <img class="slide-image" src="img/joven.jpeg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/caballero.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>

                    </div>
                </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="espacio">
            <div class="container text-center">
            <form class="form-horizontal" role="form" id="datos_cotizacion">
                
                        <div class="form-group row">
                            <div class="col-md-5 col-md-offset-4">
                                <div class="input-group">
                                <input type="text" class="form-control" id="q" placeholder="Buscar producto" onkeyup='load(1);'>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success" onclick='load(1);'>
                                    <span class="glyphicon glyphicon-search" ></span></button> 
                                <span id="loader"></span>
                                </span>
                            </div>
                            </div>
                            </div>
                            </form></div></div>

                <div id="resultados"></div><!-- Carga los datos ajax -->
                <div class='outer_div'></div><!-- Carga los datos ajax -->
<hr>
    <?php
    include("footer.php");
    ?>
  </body>
  <script type="text/javascript" src="js/caballeros.js"></script>
</html>