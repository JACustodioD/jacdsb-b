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

	<!--  NAV -->
   <?php 
  if (isset($_SESSION['user']) != "") {
    require_once ("complements/navUsuario.php");
  }else{
    require_once ('complements/nav.php'); 
  }

  ?>
	<!--  NAV -->

 	<!-- MAIN -->
	<main>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <h2 class="text-center">Mochilas</h2>
                </div>
            </div>
            <div class="row">
                <?php 
				          $products = $product->getProductsPerCategory("Mochila");
				
            	    if (!$products) {
                ?>
                <div class="col-6 col-md-4 my-3">
                    <h2 class="text-center">No hay productos</h2>
                </div>
                <?php
            	    }else{
            		    foreach ($products as $product) {
          	    ?>
                <div class="col-6 col-md-4 my-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="../images/<?php echo $product['imagen'] ?>" class="card-img" alt="producto-<?php echo $product['tipoProducto'] ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo $product['nombre'] ?></h4>
                            <hr class="divider-card">
                            <p class="card-text">
                                <?php echo $product['descripcion'] ?>
                                <br>
                                <br>
                                <span> Precio $<?php echo $product['precio'] ?></span>   
                            </p>
                            <hr class="divider-card">
                            <div class="card-price text-right">
                            <button class="btn btn-outline-warning btn-add"  product-ID = "<?php echo $product['idProducto'] ?>" product-price = "<?php echo $product['precio'] ?>">
                                Añadir
                                <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>        
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </main>
    <!-- MAIN -->

	<!-- FOOTER -->
  <?php require_once("complements/footer.php"); ?>
	<!-- FOOTER -->

  <!-- MODAL LOGIN AND MODAL REGISTER -->
    <?php require_once("complements/modal.php"); ?>
  <!-- MODAL LOGIN AND MODAL REGISTER-->


   <!-- Message ohSnap  -->
   <aside>
        <div id="ohsnap"></div>
    </aside>
    <!-- Message ohSnap  -->

  <!-- SCRIPTS -->
  <?php require_once("complements/scripts.php"); ?>
  <!-- SCRIPTS -->
</body>
</html>