<?Php
    require_once 'settings/connection.php';
    require_once 'clases/Product.php';
    $connection = new Connection();
    $product = new Product($connection); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Jacd's B&B</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">

    <!--  STYLE  -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--  STYLE  -->
</head>
<body>

    <!-- HEADER -->
    <header> 
        <!--  NAV -->
	    <nav class="navbar navbar-expand-lg sticky-top">
            <a class="navbar-brand" href="../jacdsb-b">JACD's B&B</a>

            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" id="menuu"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="pages/bolsas.php">
                                <i class="fas fa-shopping-bag"></i>
                                Bolsas
                            </a>
                            </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pages/mochilas.php">
                                <i class="fas fa-suitcase"></i>
                                Mochilas
                            </a>
                        </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#registerModal">
                            <i class="fas fa-clipboard-list"></i>
                            Crea tu cuenta 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#modalLogin">
                            <i class="far fa-user-circle"></i>
                            Ingresa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/carrito.php" class="nav-link">
                            <i class="fas fa-shopping-cart"></i> 
                            Carrito
                            <span class="badge  rounded-pill bg-dark" id="total_items"></span>
                        </a>
                    </li>
                </ul>
             </div>
        </nav>
        <!--  NAV -->

        <!--Principal title -->   
        <div class="principal-title">
			<div class="col-sm-12 col-md-12">
				<h1>Jacd's bags & backpacks</h1>
			</div>
		</div>
        <!-- Principal title -->

        <!-- Slider offers -->
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-offset-5">
                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner slider">
                                <div class="carousel-item active" data-interval="2000">
                                    <img src="images/slider1.png" class="d-block w-100 img-slider" alt="..." height="400px">
                                    <div class="carousel-caption">
                                        <h5>Mochila con cargador de bateria</h5>
                                        <p>Precio especial de $200.00</p>
                                    </div>
                                </div>
                            <div class="carousel-item">
                                <img src="images/slider2.png" class="d-block w-100 " alt="..." height="400px">
                                <div class="carousel-caption fondoTextS">
                                    <h5>Mochila con cargador de bateria</h5>
                                    <p>Precio especial de $200.00</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <i class="fas fa-angle-double-left slider-arrow"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next " href="#carouselExampleInterval" role="button" data-slide="next">
                            <i class="fas fa-angle-double-right slider-arrow"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider offers-->

    </header>  
    <!-- HEADER -->

    <!-- MAIN -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <h2 class="text-center">Nuestros Productos</h2>
                </div>
            </div>
            <div class="row">
                <?php 
				    $products = $product->getProducts();
				
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
                            <img src="images/<?php echo $product['imagen'] ?>" class="card-img" alt="producto-<?php echo $product['tipoProducto'] ?>">
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
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-4">
                    <h5 class="text-center">Jacd's Bags & Backpacks</h5>
                    <hr class="divider-footer">
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-12 col-md-4">
                    <h5>Siguenos</h5>
			        <i class="fab fa-facebook-square"></i>
			        /Jacd's_B&B
                </div>
                <div class="col-12 mt-4 col-md-4 mt-md-0">
                    <h5>Contactanos</h5>
			        <i class="far fa-envelope-open"></i>
			        contacto@jacdb&b.com <br>
                    <i class="fab fa-whatsapp"></i>
                    55-26-91-75-68
                </div>
                <div class="col-12 mt-4 col-md-4 mt-md-0">
                    <h5>Visitanos</h5>
			        <i class="fas fa-search-location"></i>
			        Av. Real del Oro. Teoloyucan.
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr class="divider-footer">
                    <h5 class="text-center"> &copy;<?php echo Date('Y'); ?> Todos los derechos reservados</h5>
                </div>
            </div>
        </div>
	</footer>
    <!-- FOOTER -->


	<!-- Modal LOGIN -->
	<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title" id="modalLoginLabel">Inicio de Sesión</h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" method="post" action="settings/proceso.php?ac=1&cod=1">
                        <img class="mb-4" src="images/icon.png" alt="profile" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Jacd's Bags & Backpacks</h1>
                        <label for="inputEmail" class="sr-only mt-2">Correo electronico</label>
                        <input type="email" id="inputEmail" class="form-control mt-3" placeholder="Correo electronico" name="user" required autofocus>
                        <label for="inputPassword" class="sr-only mt-2">Contraseña</label>
                        <input type="password" id="inputPassword" class="form-control mt-3" placeholder="Contraseña" required name="password">
                        <button class="btn btn-lg btn-outline-danger btn-block mt-2" name="sesion" type="submit">Iniciar</button>
              
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal LOGIN -->

    <!-- Modal REGISTER -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="registerModalLabel">Registrate</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="settings/proceso.php?ac=1&cod=2" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Apellido Paterno</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastNameM">Apellido Materno</label>
                                <input type="text" class="form-control" name="lastNameM" placeholder="Apellido Materno" required>
                            </div>
                            <div class="form-group col-md-6">
                                Sexo
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-option" value="Masculino" checked>
                                    <label class="form-check-label" for="gender-option">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-option" value="Femenino" >
                                    <label class="form-check-label" for="gender-option">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Correo electronico</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-pass">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="input-pass" placeholder="Password" required>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <label for="inputAddress">Dirección</label>
                            <input type="text" class="form-control" name="address" placeholder="1234 Main St">
                        </div>
                        <button class="btn btn-lg btn-outline-danger btn-block mt-2" name="register" type="submit">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal REGISTER -->


    <!-- SCRIPTS -->
    <script type="text/javascript" src="vendor/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/all.js"></script>
	<script type="text/javascript" src="js/sticky-menu.js"></script>
	<script type="text/javascript" src="js/carrito.js"></script>
    <!-- SCRIPTS -->


</body>
</html>