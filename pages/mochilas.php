<?php
 require_once '../settings/conexion.php';
 session_start();
 $con = new Connection();

if (isset($_SESSION['user']) ) {
  $usuario = $_SESSION['user'];
  
  $sql = "SELECT * FROM Usuario WHERE email = '$usuario' ";
  $result = $con->consulta($sql);
  foreach ($result as $k) {
      $nombre = $k['nombre'];
      $ap = $k['apellidoP'];
    }  
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mochilas</title>
  <?php require_once 'complements/head.php'; ?>

</head>
<body>

	<!--  HEADER -->
<?php require_once("complements/header.php"); ?>
	</header>
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
        $sql = "SELECT * FROM Producto WHERE tipoProducto = 'Mochila' ";
        $result = $con->consulta($sql);
        $datos = mysqli_num_rows($result);

        if ($datos == 0) {
        }else{
          foreach ($result as $k) {
          ?>
            <div class="col-sm-12 col-md-3 mt-2">
              <div class="card" style="width: 18rem;">
                <img src="../images/<?php echo $k['imagen'] ?>" class="card-img-top" alt="..." height="270px">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $k['nombre'] ?></h5>
                  <hr>
                  <p class="card-text"><?php echo $k['descripcion'] ?></p><hr>
                  <p class="card-text"><?php echo "Precio: $".$k['precio'] ?></p>
                  <hr>
                  <center>
                    <button class="btn btn-primary btnAgregar" idProducto = "<?php echo $k['idProducto'] ?>" precioProducto = "<?php echo $k['precio'] ?>">
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

  <script type="text/javascript">
    $(".btnAgregar").click(function(){
      var id = $(this).attr('idProducto');
      var p  = $(this).attr('precioProducto');
      agregarCarrito(id,p);
      
    });
  </script>
</body>
</html>