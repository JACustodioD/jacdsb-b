<?php 
session_start();
require_once '../settings/conexion.php';

if (isset($_SESSION['admin']) ) {
  $usuario = $_SESSION['admin'];
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
<html lang="es">
<head>
	<?php require_once 'complements/head.php'; ?>
	<title>Manager</title>
</head>
<body>
	
	<!-- HEADER --->
	<?php require_once 'complements/header.php'; ?>
	<!-- HEADER -->
	
	<!-- NAV -->
	<?php require_once 'complements/navAdmin.php'; ?>
	<!-- NAV -->

	<!-- SECTION -->
	<section>
		<h3>BIENVENIDO ADMINISTRADOR</h3>
		<article>
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<table class="table">
						<h3>Usuarios</h3>
	          			<thead >
				            <tr class="bg-info">
				              <th scope="col">Email</th>
				              <th scope="col">Nombre</th>
				              <th scope="col">Género</th>
				              <th scope="col">Direccion</th>
				              <th scope="col">Modificar</th>
				              <th scope="col">Eliminar</th>
				            </tr>
	       				</thead>
	      				<tbody>

				        <?php
					       $sql = "SELECT * FROM Usuario";
	            		   $result = $conexion->consulta($sql);
					        foreach ($result as $k) {
				        ?>
					        <tr class="table-info">
					          <th scope="row"><?php echo $k['email']; ?></th>
					          <td><?php echo $k['nombre']." ".$k['apellidoP']." ".$k['apellidoM']; ?></td>
					          <td><?php echo $k['genero']; ?></td>
					          <td><?php echo $k['direccion']; ?></td>
					          <td></td>
					          <td></td>
					        </tr>

	        				<?php } ?>
	      				</tbody>
					</table>
				</div>
			</div>
		</article>

				<article>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<h3>Productos</h3>
						
	          			<thead >
				            <tr class="bg-info">
				              <th scope="col">Imagen</th>
				              <td scope="col">Nombre</td>
				              <th scope="col">Descripcion</th>
				              <th scope="col">Precio</th>
				              <th scope="col">Tipo Producto</th>
				              <th scope="col">Modificar</th>
				              <th scope="col">Eliminar</th>
				            </tr>
	       				</thead>
	      				<tbody>

				        <?php
					       $sql = "SELECT * FROM Producto";
	            		   $result = $conexion->consulta($sql);
					        foreach ($result as $k) {
				        ?>
					        <tr class="table-info">
					          <th scope="row"><img src="../images/<?php echo $k['imagen']; ?>" height="100" width="100"></th>
					          <td><?php echo $k['nombre']?></td>
					          <td><?php echo $k['descripcion']; ?></td>
					          <td><?php echo $k['precio']; ?></td>
					          <td><?php echo $k['tipoProducto']; ?></td>
					          <td></td>
					          <td></td>
					        </tr>

	        				<?php } ?>
	      				</tbody>
					</table>
				</div>
			</div>
		</article>

	</section>
	<!-- SECTION -->

	<!-- FOOTER -->
	<?php require_once 'complements/footer.php'; ?>
	<!-- FOOTER -->
</body>
</html>