<!-- Inicio de Sesion -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h1>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        			<form class="form-signin" method="post" action="../settings/proceso.php?ac=1&cod=1">
                <img class="mb-4" src="../images/icon.png" alt="profile" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Jacd's Bags & Backpacks</h1>
                <label for="inputEmail" class="sr-only mt-2">Correo electronico</label>
                <input type="email" id="inputEmail" class="form-control mt-3" placeholder="Correo electronico" name="user" required autofocus>
                <label for="inputPassword" class="sr-only mt-2">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control mt-3" placeholder="Contraseña" required name="password">
                <button class="btn btn-lg btn-primary btn-block mt-2" name="sesion" type="submit">Sign in</button>
                
              </form>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- Inicio de Sesion -->

	<!-- Registro -->
	<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h1 class="modal-title" id="exampleModalLabel">Registrate</h1>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
        		  <form action="../settings/proceso.php?ac=1&cod=2" method="POST">

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" required>
                  </div>
                  <div class="form-group col-md-6">
                    Sexo
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                   </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Femenino" >
                    <label class="form-check-label" for="exampleRadios1">
                      Femenino
                   </label>
                  </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Correo electronico</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="psw1" placeholder="Password" required>
                  </div>
 
                   <div class="form-group col-md-6 mt-4">
                    <!-- <label for="inputPassword4">Son diferentes</label> -->  
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputAddress">Dirección</label>
                  <input type="text" class="form-control" name="direccion" placeholder="1234 Main St">
                </div>
                <button class="btn btn-lg btn-primary btn-block mt-2" name="registro" type="submit">Registrarse</button>
              </form>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- Registro -->