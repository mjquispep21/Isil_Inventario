<body class="with-side-menu">
    <header class="site-header">
        <div class="container-fluid">

            <a href="#" class="site-logo">
                <img class="hidden-md-down" src="../../assets/img/logo-2-blanco.png" alt="">
                <img class="hidden-lg-up" src="../../assets/img/logo-2-mob.png" alt="">
            </a>
            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>
            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../../assets/img/avatar-2-64.png" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="<?php echo Conectar::ruta() . "views/perfil/" ?>"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                                
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Ayuda</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
                            </div>
                        </div>
                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->
                    <div class="mobile-menu-right-overlay"></div>

                    <input type="hidden" id="ID_usuariox" value="<?php echo $_SESSION["ID_usuario"] ?>"><!-- ID del Usuario -->
                    <input type="hidden" id="ID_rolesx" value="<?php echo $_SESSION["ID_roles"] ?>"><!-- Rol del Usuario-->
                    <div class="site-header-collapsed">
                        <div class="site-header-collapsed-in">
                            <div class="dropdown dropdown-typical">
                                <a href="<?php echo Conectar::ruta() . "views/perfil/" ?>" class="dropdown-toggle no-arr">
                                    <span class="font-icon font-icon-user"></span>
                                    <span class="lblcontactonomx"><?php echo $_SESSION["Nombre"] ?></span>
                                </a>
                            </div>
                            <!--.help-dropdown-->

                        </div><!--.site-header-collapsed-in-->
                    </div><!--.site-header-collapsed-->
                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
    </header>
    <?php require_once("page_menu.php") ?>