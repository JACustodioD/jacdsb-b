<?Php
require_once 'settings/connection.php';
require_once 'clases/Product.php';
$connection = new Connection();
$product = new Product($connection); 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Jacd's B&B</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">

	<link rel="stylesheet" type="text/css" href="Librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<script type="text/javascript" src="Librerias/jquery.min.js"></script>
	<script type="text/javascript" src="Librerias/bootstrap/js/bootstrap.min.js"></script>



</head>
<body>

	<!--  HEADER -->
 	<header >
		<div class="tituloPrincipal">
			<div class="col-sm-12 col-md-12">
				<h1>Jacd's bags & backpacks</h1>
			</div>
		</div>
	</header>
	<!--  HEADER -->

	<!--  NAV -->
	<nav class="navbar navbar-expand-lg sticky-top">
  		<a class="navbar-brand" href="../jacdsb&b">JACD's B&B</a>

  		<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<i class="fas fa-bars" id="menuu"></i>
  		</button>


  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" href="../jacdsb&b">Home <i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="pages/bolsas.php">Bolsas <i class="fas fa-shopping-bag"></i></a>

      			</li>
 
      			<li class="nav-item">
        			<a class="nav-link" href="pages/mochilas.php">Mochilas <i class="fas fa-suitcase"></i></a>
      			</li>
    		</ul>

    		<ul class="navbar-nav ml-auto">
    			<li class="nav-item">
    				<a href="#" class="nav-link" data-toggle="modal" data-target="#registroModal">Crea tu cuenta <i class="fas fa-clipboard-list"></i></a>
    			</li>
    			<li class="nav-item">
    				<a href="" class="nav-link" data-toggle="modal" data-target="#exampleModal">Ingresa <i class="far fa-user-circle"></i></a>
    			</li>
    			<li class="nav-item">
    				<a href="pages/carrito.php" class="nav-link">
					<span class="badge bg-primary" id="total_items"></span> Carrito <i class="fas fa-shopping-cart"></i>
    				</a>
    			</li>
    		</ul>
  		</div>
	</nav>
	<!--  NAV -->

	 <!-- ASIDE -->
	<aside class="mt-5">
		<h3 class="text-info mt-2">Promociones del día</h3>
		<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner slider">
				<div class="carousel-item active" data-interval="10000">
				    <img src="images/slider1.jpg" class="d-block w-100" alt="..." height="400px" id="slider1I">
				    <div class="carousel-caption fondoTextS">
          			  	<h5 id="slider1N">Mochila con cargador de bateria</h5>
          				<p id="slider1P">Precio especial de $200.00</p>
          				<!--<button class="btn btn-warning" id="slider1">
          					Comprar
          					<i class="fas fa-cart-plus"></i>
          				</button>-->
        			</div>
				</div>
				<div class="carousel-item" data-interval="2000">
				    <img src="images/slider2.jpg" class="d-block w-100" alt="..." height="400px">
				    <div class="carousel-caption fondoTextS">
          			  	<h5>Mochila con cargador de bateria</h5>
          				<p>Precio especial de $200.00</p>
          				
        			</div>
				</div>
				<div class="carousel-item">
				    <img src="images/slider3.jpg" class="d-block w-100" alt="..." height="400px">
				    <div class="carousel-caption fondoTextS">
          			  	<h5>Mochila con cargador de bateria</h5>
          				<p>Precio especial de $200.00</p>
          				
        			</div>
				</div>
  			</div>
			<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
			   	<!--<span class="carousel-control-prev-icon flecha" aria-hidden="true"></span>-->
			   	<i class="fas fa-angle-double-left flecha"></i>
			    <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next " href="#carouselExampleInterval" role="button" data-slide="next">
			    <!--<span class="carousel-control-next-icon flecha" aria-hidden="true"></span>-->
			    <i class="fas fa-angle-double-right flecha"></i>
			    <span class="sr-only">Next</span>
			</a>
		</div>
	</aside>
	<!-- ASIDE -->

	<!-- SECTION -->
	<section>
		<div class="row">
			<?php 
				$products = $product->getProducts();
				
            	if (!$products) {
        
            	}else{
            		foreach ($products as $product) {
          	?>
          	<div class="col-sm-12 col-md-3 mt-2">
            	<div class="card" style="width: 18rem;">
              		<img src="images/<?php echo $product['imagen'] ?>" class="card-img-top" alt="..." height="270px">
              		<div class="card-body">
                		<h5 class="card-title"><?php echo $product['nombre'] ?> </h5>
                		<hr>
                		<p class="card-text"><?php echo $product['descripcion'] ?></p><hr>
                		<p class="card-text"><?php echo "Precio: $".$product['precio'] ?> </p>
                		<hr>
                		<center>
                  			<button class="btn btn-primary btn-add" idProducto = "<?php echo $product['idProducto'] ?>" precioProducto = "<?php echo $product['precio'] ?>">
                    			Agregar
                    			<i class="fas fa-cart-plus"></i>
                  			</button>
                		</center>
              		</div>
            	</div>
          	</div>
          	<?php
            		}
            	}
          	?>
    	</div>
	</section>
	<!-- SECTION -->

	<!-- FOOTER -->
	<footer>
		<br>
		<h5>Jacd's Bags & Backpacks &copy;2019 Todos los derechos reservados</h5>
		<div class="row mt-3">
			<div class="col-sm-12 col-md-4 mt-2">
			<h6>Siguenos</h6>
			<i class="fab fa-facebook-square"></i>
			/Jacd's_B&B
		</div>
		<div class="col-sm-12 col-md-4 mt-2">
			<h6>Contactanos</h6>
			<i class="far fa-envelope-open"></i>
			contacto@jacdb&b.com <br>
      <i class="fab fa-whatsapp"></i>
      55-26-91-75-68
		</div>
		<div class="col-sm-12 col-md-4 mt-2">
			<h6>Visitanos</h6>
			<i class="fas fa-search-location"></i>
			Av. Real del Oro. Teoloyucan.
		</div>
		</div>
	</footer>
	<!-- FOOTER -->

	<!-- Inicio de Sesion -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h1>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        			<form class="form-signin" method="post" action="settings/proceso.php?ac=1&cod=1">
                <img class="mb-4" src="images/icon.png" alt="profile" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Jacd's Bags & Backpacks</h1>
                <label for="inputEmail" class="sr-only mt-2">Correo electronico</label>
                <input type="email" id="inputEmail" class="form-control mt-3" placeholder="Correo electronico" name="user" required autofocus>
                <label for="inputPassword" class="sr-only mt-2">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control mt-3" placeholder="Contraseña" required name="password">
                <button class="btn btn-lg btn-primary btn-block mt-2" name="sesion" type="submit">Sign in</button>
                
              </form>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- Inicio de Sesion -->

	<!-- Registro -->
	<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title" id="exampleModalLabel">Registrate</h1>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        		  <form action="settings/proceso.php?ac=1&cod=2" method="POST">

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" required>
                  </div>
                  <div class="form-group col-md-6">
                    Sexo
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                   </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Femenino" >
                    <label class="form-check-label" for="exampleRadios1">
                      Femenino
                   </label>
                  </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Correo electronico</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="psw1" placeholder="Password" required>
                  </div>
                   <div class="form-group col-md-6 mt-4">
                    <!-- <label for="inputPassword4">Son diferentes</label> -->  
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputAddress">Dirección</label>
                  <input type="text" class="form-control" name="direccion" placeholder="1234 Main St">
                </div>
                <button class="btn btn-lg btn-primary btn-block mt-2" name="registro" type="submit">Registrarse</button>
              </form>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- Registro -->

	<!-- Mensaje -->

	<!-- Mensaje -->
	<script type="text/javascript" src="Librerias/all.js"></script>
	<script type="text/javascript" src="js/carrito.js"></script>

  <script type="text/javascript">
     /*$(".btn-add").click(function(){
      var id = $(this).attr('idProducto');
      var p  = $(this).attr('precioProducto');
      var cadena = "id="+id+"&precio="+p;

		 $.ajax({
        type:"POST",
        url:"settings/proceso.php?ac=1&cod=3",
        data: cadena,
        success:function(r){
          if (r==1) {
            alert("No selecciono producto");
          }else if(r==2){
            alert("Inicia Sesion");
          }else{
            alert("Producto agregado");
          }
        }
      });
    });*/
  </script>


</body>
</html>