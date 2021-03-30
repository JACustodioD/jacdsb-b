<?php
session_start();
require_once '../settings/connection.php';
require_once '../clases/Product.php';
require_once '../clases/User.php';

if (isset($_SESSION['user']) ) {
  $usuario = $_SESSION['user'];
  $conexion = new Connection();
  $product = new Product($conexion); 
  $userData = new User(); 
    if($userData->getUserData($usuario)) {

    } else {

    }
}else{
  header("Location: ../../jacdsb-b");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jacd's B&B</title>
    <?php require_once("complements/head.php"); ?>
</head>
<body>

  <!--  HEADER -->
 <?php require_once("complements/header.php"); ?>
  <!--  HEADER -->

  <!--  NAV -->
  <?php require_once("complements/navUsuario.php"); ?>
  <!--  NAV -->


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
              		<img src="../images/<?php echo $product['imagen'] ?>" class="card-img-top" alt="..." height="270px">
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
  <?php require_once("complements/footer.php"); ?>
  <!-- FOOTER -->

	<script type="text/javascript" src="../js/carrito.js"></script>

</body>
</html>