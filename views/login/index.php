<?php
require_once("../../Config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
    require_once("../../Models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Isil | Sisinvet</title>
    <meta name="description" content="User login example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({

            google: {
                "families": [
                    "Poppins:300,400,500,600,700"
                ]
            },

            active: function() {

                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->
    <!--begin::Page Custom Styles(used by this page) -->
    <link href="../../assets/login/login-v2.default.css" rel="stylesheet" type="text/css" />
    
    <!--end::Page Custom Styles -->
    <!--begin:: Global Optional Vendors -->
    <link href="../../assets/login/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/login/flaticon/flaticon.css" rel="stylesheet" type="text/css" />

    
    <!--end:: Global Optional Vendors -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="../../assets/login/style.bundle.css" rel="stylesheet" type="text/css" />
    
    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="../../assets/login/logos/favicon.ico" />
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="kt-login-v2--enabled kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid kt-grid--hor kt-login-v2" id="kt_login_v2">
            <!--begin::Item-->
            <div class="kt-grid__item kt-grid--hor">
                <!--begin::Heade-->
                <div class="kt-login-v2__head">
                    <div class="kt-login-v2__signup">
                        <span></span>
                        <a href="#" class="kt-link kt-font-brand"></a>
                    </div>
                </div>
                <!--begin::Head-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="kt-grid__item kt-grid kt-grid--ver kt-grid__item--fluid">
                <!--begin::Body-->
                <div class="kt-login-v2__body">
                    <!--begin::Wrapper-->
                    <div class="kt-login-v2__wrapper">
                        <div class="kt-login-v2__container">
                            <div class="kt-login-v2__title">
                                <br>
                                <div class="kt-login-v2__logo">
                                    <a href="#">
                                        <img src="../../assets/login/logos/isil-logo.png" alt="logo" />
                                    </a>
                                </div>
                                <h3>
                                    Sistema de Inventario RT
                                </h3>
                            </div>


                            <!--begin::Form-->
                            <form method="POST" class="kt-login-v2__form kt-form" action="" autocomplete="off">
                                <!--begin::Alertas-->

                                <?php
                                if (isset($_GET["m"])) {
                                    switch ($_GET["m"]) {
                                        case '1':
                                ?>

                                            <div class=" alert alert-outline-danger fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">El Usuario y/o Contraseña son incorrectos</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>

                                        <?php
                                            break;
                                        case '2':
                                        ?>

                                            <div class="alert alert-outline-success fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">Los campos estan vacios.</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>

                                <?php
                                            break;
                                    }
                                }
                                ?>
                                <!--end::Alertas-->

                                <div class="form-group">
                                    <input id="usuario" class="form-control" type="text" placeholder="Usuario" name="Usuario" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input id="input" class="form-control" type="password" placeholder="Contraseña" name="contrasena" autocomplete="off">
                                </div>
                                <!--begin::Action-->
                                <div class="kt-login-v2__actions">
                                    <input type="hidden" name="enviar" value="si">
                                    <button type="submit" class="btn btn-brand btn-elevate btn-pill  col 6">Acceder</button>
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Image-->
                    <div class="kt-login-v2__image">
                        <img src="../../assets/login/logos/bg_icon.png" alt="">
                    </div>
                    <!--begin::Image-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="kt-grid__item">
                <div class="kt-login-v2__footer">
                    <div class="kt-login-v2__link"> <a href="#" class="kt-link kt-font-brand">Privacy</a> <a href="#" class="kt-link kt-font-brand">Legal</a> <a href="#" class="kt-link kt-font-brand">Contact</a> </div>
                    <div class="kt-login-v2__info"> <a href="#" class="kt-link">&copy; 2024 ISIL</a> </div>
                </div>
            </div>
            <!--end::Item-->
        </div>
    </div>
    <!-- end:: Page -->
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {

            "colors": {

                "state": {

                    "brand": "#5d78ff",

                    "metal": "#c4c5d6",

                    "light": "#ffffff",

                    "accent": "#00c5dc",

                    "primary": "#5867dd",

                    "success": "#34bfa3",

                    "info": "#36a3f7",

                    "warning": "#ffb822",

                    "danger": "#fd3995",

                    "focus": "#9816f4"
                },

                "base": {

                    "label": [

                        "#c5cbe3",

                        "#a1a8c3",

                        "#3d4465",

                        "#3e4466"
                    ],

                    "shape": [

                        "#f0f3ff",

                        "#d9dffa",

                        "#afb4d4",

                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->

    <script src="../../assets/login/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="../../assets/login/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/login/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <script src="../../assets/login/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->



</body>
<!-- end::Body -->

</html>