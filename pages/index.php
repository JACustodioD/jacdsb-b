<?php
session_start();
require_once '../settings/conexion.php';

if (isset($_SESSION['user']) ) {
  $usuario = $_SESSION['user'];
  $conexion = new Connection();
  
  $sql = "SELECT * FROM Usuario WHERE email = '$usuario' ";
  $result = $conexion->consulta($sql);
  foreach ($result as $k) {
      $nombre = $k['nombre'];
      $ap = $k['apellidoP'];
    }  
}else{
  header("Location: ../../jacdsb&b");
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

   <!-- ASIDE -->
 <!-- <aside class="mt-5">
    <h3 class="text-info mt-2">Promociones del día</h3>
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner slider">
        <div class="carousel-item active" data-interval="10000">
            <img src="../images/slider1.jpg" class="d-block w-100" alt="..." height="400px" id="slider1I">
            <div class="carousel-caption fondoTextS">
                    <h5 id="slider1N">Mochila con cargador de bateria</h5>
                  <p id="slider1P">Precio especial de $200.00</p>
                  <button class="btn btn-warning" id="slider1">
                    Comprar
                    <i class="fas fa-cart-plus"></i>
                  </button>
              </div>
        </div>
        <div class="carousel-item" data-interval="2000">
            <img src="../images/slider2.jpg" class="d-block w-100" alt="..." height="400px">
            <div class="carousel-caption fondoTextS">
                    <h5>Mochila con cargador de bateria</h5>
                  <p>Precio especial de $200.00</p>
                  <button class="btn btn-warning">
                    Comprar
                    <i class="fas fa-cart-plus"></i>
                  </button>
              </div>
        </div>
        <div class="carousel-item">
            <img src="../images/slider3.jpg" class="d-block w-100" alt="..." height="400px">
            <div class="carousel-caption fondoTextS">
                    <h5>Mochila con cargador de bateria</h5>
                  <p>Precio especial de $200.00</p>
                  <button class="btn btn-warning">
                    Comprar
                    <i class="fas fa-cart-plus"></i>
                  </button>
              </div>
        </div>
        </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
          <i class="fas fa-angle-double-left flecha"></i>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next " href="#carouselExampleInterval" role="button" data-slide="next">
          <i class="fas fa-angle-double-right flecha"></i>
          <span class="sr-only">Next</span>
      </a>
    </div>
  </aside> -->
  <!-- ASIDE -->

  <!-- SECTION -->
  <section>
    <div class="row">
          <?php 
            $sql = "SELECT * FROM Producto";
            $result = $conexion->consulta($sql);
            $datos = mysqli_num_rows($result);

            if ($datos == 0) {
        
            }else{
            foreach ($result as $k) {
          ?>
          <div class="col-sm-12 col-md-3 mt-2">
            <div class="card" style="width: 18rem;">
              <img src="../images/<?php echo $k['imagen'] ?>" class="card-img-top" alt="..." height="270px">
              <div class="card-body">
                <h5 class="card-title"><?php echo $k['nombre'] ?> </h5>
                <hr>
                <p class="card-text"><?php echo $k['descripcion'] ?></p><hr>
                <p class="card-text"><?php echo "Precio: $".$k['precio'] ?> </p>
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


  <script type="text/javascript">
    $(".btnAgregar").click(function(){
      var id = $(this).attr('idProducto');
      var p  = $(this).attr('precioProducto');
      
      window.location.href = '../settings/proceso.php?ac=1&cod=3&id='+id+"&p="+p;
      
    });
  </script>


</body>
</html>