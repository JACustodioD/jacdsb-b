  <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="../pages/admin.php">JACD's B&B</a>

      <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" id="menuu"></i>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../pages/admin.php">Home <i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
            </li>

        </ul>

        <ul class="navbar-nav ml-auto">
           <li class="nav-item">
            <label class="nav-link">
              <?php echo $nombre." ".$ap ?>  
              <i class="far fa-user-circle"></i>
            </label>
          </li>
           <li class="nav-item">
            <a href="../settings/close.php" class="nav-link">
              Cerrar sesion 
              <i class="fas fa-clipboard-list"></i>
            </a>
          </li>
        </ul>
      </div>
  </nav>