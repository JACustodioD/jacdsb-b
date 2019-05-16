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