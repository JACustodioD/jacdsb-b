<?php
 require_once '../settings/connection.php';
 require_once '../clases/User.php';
 session_start();

 $conexion = new Connection();

 if (isset($_SESSION['user']) ) {
   $usuario = $_SESSION['user'];
   $conexion = new Connection();
   $userData = new User(); 
     if($userData->getUserData($usuario)) {
 
     } else {
 
     }
 }else{
 
  echo "<script> alert('Debes iniciar sesion primero'); </script>";
  echo "<script> window.location.href='../../jacdsb-b'; </script>"; }
?>

<!DOCTYPE html>
<html lang="en">
<head>


	<title>Bolsas</title>
   <?php require_once 'complements/head.php'; ?>


</head>
<body >

	<!--  HEADER -->
 	  <?php require_once("complements/header.php"); ?>
	<!--  HEADER -->

	<!--  NAV -->
  <?php require_once("complements/navUsuario.php"); ?>
	<!--  NAV -->

  <!-- SECTION CAR -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
        <h2 class="text-center">Carrito</h2>

        <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Total</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody id="table-content">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- SECTION CAR -->

	<!-- SECTION -->
	<section>
    <h3>Su Carrito</h3>
    <a href="../pages" class="btn btn-success">Volver</a>
		<div class="row">
      <div class="col-sm-12 col-md-12">
        <?php //require_once "complements/tablaC.php"; ?>
        <h3>Total es: $<?php echo $total; ?></h3>
        <center>

        </center><br>

        

      </div> 
    </div>
    <?php 
      if ($total > 0) { ?>


      <!-- PAGO CON PAYPAL -->
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="jacustodiod@hotmail.com">
    <input type="hidden" name="currency_code" value="MXN">

    <input type="hidden" name="item_name_1" value="Productos Varios">
    <input type="hidden" name="amount_1" value="1">
    <input type="hidden" name="quantity_1" value="<?php echo $total; ?>">

    <center><div class="col-md-8" > 
      <button class="btn btn-warning">
        Comprar Ahora
        <i class="far fa-credit-card"></i>
      </button>
    </div></center><br>
     
  </form>

      <?php
      }else{
        
      }
    ?>
  <!-- PAGO CON PAYPAL -->
	</section>
	<!-- SECTION -->



	<!-- FOOTER -->
	 <?php require_once ("complements/footer.php"); ?>
	<!-- FOOTER -->


	<script type="text/javascript" src="../js/carrito.js"></script>

  <script>

    $(document).ready(function(){
      show_car_items();


      $(document).on("change", ".amount_item", function(){
        let value = $(this).val();
        let product = $(this).attr("product");
        
        if(value <= 0 ) {
          $(this).val(1);
          value = 1;
        } 
        update_car(product, value);
      });

      $(document).on("click", ".btn-delete", function(){
        let product = $(this).attr("product");

        let confirm_delete = confirm("¿Desea eliminar este producto?");

        if(confirm_delete) {
          if(delete_product(product) ) {
            alert("Producto eliminado");
          } else {
            alert("El producto no se encontro revise su carrito");
          }
        } 

        amount_items();
        show_car_items();

      });
      
    });
    
</script>


<script>
  $(".eliminarP").click(function(){
    var eliminar = $(this).attr('idProducto');
    //alert (eliminar);
    window.location.href = "../settings/proceso.php?ac=1&cod=4&prod="+eliminar;
  });


</script>

</body>
</html>