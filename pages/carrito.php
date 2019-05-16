<?php
 require_once '../settings/conexion.php';
 session_start();
 $conexion = new Connection();

if (isset($_SESSION['user']) ) {
  $usuario = $_SESSION['user'];
  
  $sql = "SELECT * FROM Usuario WHERE email = '$usuario' ";
  $result = $conexion->consulta($sql);
  foreach ($result as $k) {
      $nombre = $k['nombre'];
      $ap = $k['apellidoP'];
    }  
}else{
  echo "<script> alert('Debes iniciar sesion primero'); </script>";
  echo "<script> window.location.href='../../jacdsb&b'; </script>"; 
}
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


	<!-- SECTION -->
	<section>
    <h3>Su Carrito</h3>
    <a href="../pages" class="btn btn-success">Volver</a>
		<div class="row">
      <div class="col-sm-12 col-md-12">
        <?php require_once "complements/tablaC.php"; ?>
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



<script>
  $(".eliminarP").click(function(){
    var eliminar = $(this).attr('idProducto');
    //alert (eliminar);
    window.location.href = "../settings/proceso.php?ac=1&cod=4&prod="+eliminar;
  });


</script>

</body>
</html>