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
        <table class="table">
          <thead >
            <tr class="bg-info">
              <th scope="col">Imagen</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Total</th>
              <th scope="col">Eliminar</th>
            </tr>
       </thead>
      <tbody>

        <?php
        $sql = "SELECT P.imagen,P.nombre,C.producto, C.cantidad, P.precio, C.total FROM Producto P inner join Carrito C ON P.idProducto = C.producto WHERE C.usuario = '$usuario';";
        $result = $conexion->consulta($sql);
        $total = 0;
        foreach ($result as $k) {
        ?>
        <tr class="table-info">
          <th scope="row"><img src="../images/<?php echo $k['imagen']; ?>" alt="" height="100"></th>
          <td><?php echo $k['nombre']; ?></td>
          <td><?php echo $k['precio']; ?></td>
          <td><?php echo $k['cantidad']; ?></td>
          <td ><?php echo $k['total']; ?></td>
          <td><button class="btn btn-danger eliminarP"  idProducto= <?php echo $k['producto'] ?> ><i class="fas fa-trash"></i></button></td>
        </tr>

        <?php  $total += $k['total'];  } ?>
      </tbody>
    </table>
        <h3>Total es: $<?php echo $total; ?></h3>
        <center>

        </center><br>

        

      </div> 
    </div>

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