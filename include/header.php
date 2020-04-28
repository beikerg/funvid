<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>FUN</b>VID</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
             
                <img src="img/CAMINO.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides thce username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo ucwords(strtolower($_SESSION['nombre'])); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/CAMINO.png" class="img-circle" alt="User Image">

                <p>
                <?php echo ucwords(strtolower($_SESSION['nombre'])); ?>              
                </p>
                <p><?php echo ucwords(strtolower($_SESSION['rol'])); ?></p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil.php" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="ajax/login/salir.php" class="btn btn-default btn-flat">Cerrar Sección</a>
                </div>
              </li>
              
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>