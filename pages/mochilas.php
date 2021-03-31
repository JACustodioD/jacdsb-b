<?php
session_start();
require_once '../settings/connection.php';
require_once '../clases/Product.php';
require_once '../clases/User.php';
$conexion = new Connection();
$product = new Product($conexion); 

if (isset($_SESSION['user']) ) {
  $usuario = $_SESSION['user'];
  $userData = new User(); 
    if($userData->getUserData($usuario)) {

    } else {

    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>


	<title>Bolsas</title>
   <?php require_once 'complements/head.php'; ?>

</head>
<body>

	<!--  HEADER -->
 	<?php require_once("complements/header.php"); ?>
	<!--  HEADER -->

	<!--  NAV -->
   <?php 
  if (isset($_SESSION['user']) != "") {
    require_once ("complements/navUsuario.php");
  }else{
    require_once ('complements/nav.php'); 
  }

  ?>
	<!--  NAV -->


	<!-- SECTION -->
	<section>
    <h3>Mochilas</h3>
		<div class="row">

      <?php 
        $products = $product->getProductsPerCategory("Mochila");

        if (!$products) {
        }else{
          foreach ($products as $dataProduct) {
          ?>
            <div class="col-sm-12 col-md-3 mt-2">
              <div class="card" style="width: 18rem;">
                <img src="../images/<?php echo $dataProduct['imagen'] ?>" class="card-img-top" alt="..." height="270px">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $dataProduct['nombre'] ?></h5>
                  <hr>
                  <p class="card-text"><?php echo $dataProduct['descripcion'] ?></p><hr>
                  <p class="card-text"><?php echo "Precio: $".$dataProduct['precio'] ?></p>
                  <hr>
                  <center>
                    <button class="btn btn-primary btn-add" idProducto = "<?php echo $dataProduct['idProducto'] ?>" precioProducto = "<?php echo $dataProduct['precio'] ?>">
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

  <!-- MODAL PARA INICIO Y REGISTRO -->
    <?php require_once("complements/modal.php"); ?>
  <!-- MODAL PARA INICIO Y REGISTRO -->

	<script type="text/javascript" src="../js/carrito.js"></script>
</body>
</html>