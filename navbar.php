<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Modachiko</a>
    </div>


<?php
require_once("libraries/password_compatibility_library.php");

require_once("config/db.php");
require_once ("config/conexion.php");

require_once("classes/Login.php");

$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
 ?>

 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class='  glyphicon glyphicon-asterisk'></i> Moda<span class="caret"></span></a>
       <ul class="dropdown-menu">
    <li class="<?php echo $active_ninos;?>"><a href="ninos.php"><i class='glyphicon glyphicon-barcode'></i> Niños</a></li>
    <li class="<?php echo $active_caballeros;?>"><a href="caballeros.php"><i class='glyphicon glyphicon-barcode'></i> Caballeros</a></li>
    <li class="<?php echo $active_damas;?>"><a href="damas.php"><i class='glyphicon glyphicon-barcode'></i> Damas</a></li>
    <li class="<?php echo $active_ofertas;?>"><a href="ofertas.php"><i class='glyphicon glyphicon-barcode'></i> Ofertas</a></li>
      </ul>
      </li>
      </ul>

      <ul class="nav navbar-nav">
      <?php
                    $sql_user=mysqli_query($con,"select * from users where user_tipo = 1 or user_tipo = 2");
                    while ($rw=mysqli_fetch_array($sql_user)){
                      $id_user=$rw["user_id"];
                      if ($id_user==$_SESSION['user_id']){
                        ?>
                  <li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Facturas</a></li>
                  <li class="<?php echo $active_compras;?>"><a href="compras.php"><i  class=' glyphicon glyphicon-shopping-cart'></i> Compras</a></li>               
                   <?php
                      } 
                    }
                  ?>
    
        <li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>
		    <li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-star-empty'></i> Clientes</a></li>
        <li class="<?php echo $active_proveedores;?>"><a href="proveedores.php"><i class='glyphicon glyphicon-star'></i>Proveedores</a></li>               
                  <?php
                    $sql_user=mysqli_query($con,"select * from users where user_tipo = 1");
                    while ($rw=mysqli_fetch_array($sql_user)){
                      $id_user=$rw["user_id"];
                      if ($id_user==$_SESSION['user_id']){
                        ?>
              <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-user'></i> Usuarios</a></li>
               
                   <?php
                      } 
                    }
                  ?>
 </ul>
      <ul class="nav navbar-nav navbar-right">
    <li><a href="index.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
       </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
	<ul class="nav navbar-nav">
    <li class="<?php echo $active_ninos;?>"><a href="ninos.php"><i class='glyphicon glyphicon-barcode'></i> Niños</a></li>
    <li class="<?php echo $active_caballeros;?>"><a href="caballeros.php"><i class='glyphicon glyphicon-barcode'></i> Caballeros</a></li>
    <li class="<?php echo $active_damas;?>"><a href="damas.php"><i class='glyphicon glyphicon-barcode'></i> Damas</a></li>
     <li class="<?php echo $active_ofertas;?>"><a href="ofertas.php"><i class='glyphicon glyphicon-barcode'></i> Ofertas</a></li>
     </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class='glyphicon glyphicon-user'></i> Ingresar<span class="caret"></span></a>
       <ul class="dropdown-menu">
       <form method="post" accept-charset="utf-8" action="index.php" name="loginform" autocomplete="off" role="form" class="form-signin">
      <?php
        // show potential errors / feedback (from login object)
        if (isset($login)) {
          if ($login->errors) {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error!</strong> 
            
            <?php 
            foreach ($login->errors as $error) {
              echo $error;
            }
            ?>
            </div>
            <?php
          }
        }
        ?>
                <div class="from-group">
                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
                </div>
                <div class="from-group">
                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
                </div>
                <div class="from-group">
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
             </div>
            </form>
            </ul>
            </li>
            </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
}
?>
