<?php
$title="MODACHIKOS";
?>
<!DOCTYPE html>
<html>
<head>
<?php include("head.php");?>
</head>
<body>
<?php include "navbar.php"; ?>
<div class="espacio">
	<div class="container">
		<div class="jumbotron text-center">
    <h1><script>
//Colores utilizados en el texto
var colors=new Array('#14c6fc','#ef325e','#226615','#f1c40f');


function printCSS(){
    document.write('<style>');
   
    for(var i=0;i<colors.length;i++){
        document.write('.color-'+i+'{color:'+colors[i]+'}');
    }
   
    document.write('</style>');
}

function generateText(text){
    for(var i=0;i<text.length;i++){
        var rnd=Math.floor(Math.random()*colors.length);
   
        document.write('<span id="letter-'+i+'" class="color-'+rnd+'" onmouseover="changeColor(this.id)">');
        document.write(text[i]);
        document.write('</span>');
    }
}

function changeColor(el){
    el=document.getElementById(el);
    var rnd=Math.floor(Math.random()*colors.length);
  
    while(el.className=='color-'+rnd){
        rnd=Math.floor(Math.random()*colors.length);
    }
  
    el.className='color-'+rnd;
}


printCSS();
generateText('  MODACHIKOS  ');
</script></h1>
<p style="color:green">Moda para niños, damas y caballeros</p>
		</div>
	</div>
</div>
<!--El carruzel-->
<div class="separador">
<div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  	<!-- Indicadores -->
  		<ol class="carousel-indicators">
    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    	<li data-target="#myCarousel" data-slide-to="1"></li>
    	<li data-target="#myCarousel" data-slide-to="2"></li>
  		</ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/vendedora.jpg" alt="atencion">
      <div class="carousel-caption">
      	<h2>Atencion de calidad</h2>
      	<p>Contamos con un personal de calidad.</p>
      </div>
    </div>
    <div class="item">
      <img src="img/estilo.jpg" alt="estilo">
      <div class="carousel-caption">
      	<h2>Estilos unicos</h2>
      	<p>A la moda en toda ocación</p>
      </div>
    </div>
    <div class="item">
      <img src="img/local.jpg" alt="Flower">
      <div class="carousel-caption">
      	<h2>Ubicanos</h2>
      	<p>Trabajamos de 9:00am a 6:00pm </p>
      </div>
    </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>
<!--Grid (separar el contenido en varias columnas)-->
<div class="separador">
	<div class="container text-center">
		<h3>Mira nuestra amplia gama de estilos en:</h3><br>
		<div class="row">
			<div class="col-sm-4">
				<img src="img/ropanino.jpg" class="img-respon"  alt="Image">
				<p>Ropa de niños</p>
			</div>
			<div class="col-sm-4">
				<img src="img/ropamujer.jpg" class="img-respon" alt="Image">
				<p>Ropa de damas</p>
			</div>
			<div class="col-sm-4">
				<img src="img/ropahombre.jpg" class="img-respon" alt="Image">
				<p>Ropa de caballeros</p>
			</div>
			</div>	
		</div>
	</div>
  <?php
  include("footer.php");
  ?>
  <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  <script type="text/javascript" src="js/facturas.js"></script>
</body>
</html>
