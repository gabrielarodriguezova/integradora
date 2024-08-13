<?php
    session_start(); // Inicia una nueva sesión o reanuda una existente
    include_once('modulos/enrutador.php'); // Incluye el archivo enrutador.php
    include_once('modulos/controlador.php'); // Incluye el archivo controlador.php
    
    // Verifica si la sesión está validada
    if ($_SESSION['validada'] != 1) {
        header("location: index.html"); // Redirige a la página de inicio de sesión si la sesión no está validada
        exit(); // Asegura que se detenga la ejecución después de redirigir
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="logo.png">
    <title>Veterinaria</title>

    <!-- Fuentes personalizadas para esta plantilla-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">

    <style> 
        /* Estilo para el fondo del menú */
        .bg-gradiente-primary {
            background-color: orange; /* Cambiar color de Menu */
            background-size: cover;
            position: fixed; /* Hacer el menú fijo */
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1000;
        }

        /* Estilo para el botón de cerrar sesión */
        .logout-button:hover {
            transform: translateY(-2px); /* Efecto de levantamiento al pasar el mouse */
        }

        /* cambiar color de fondo en donde están las tablas */
        #content-wrapper12 {
            background-color: white;
            width: calc(100% - 200px); /* Ajustar el ancho para no superponer el menú */
            margin-left: 200px; /* Crear espacio para el menú fijo */
            overflow-x: hidden; 
        }

        /* Asegurar que el contenido no se sobreponga al menú fijo */
        .container-fluid {
            padding-top: 60px; /* Ajustar según la altura del menú superior */
        }
    </style>
</head>

<body id="page-top">

    <!-- Contenedor de la página -->
    <div id="wrapper">

        <!-- Estructura del menú lateral -->
        <ul class="navbar-nav bg-gradiente-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Enlace de cerrar sesión en la palabra veterinaria -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Veterinaria</div>
            </a>

            <!-- Separador del menú -->
            <hr class="sidebar-divider">

            <!-- Menú cliente -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCliente"
                    aria-expanded="true" aria-controls="collapseCliente">
                    <i class="fas fa-users text-white"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseCliente" class="collapse" aria-labelledby="headingCliente" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?cargar=crearcliente">Registrar</a>
                        <a class="collapse-item" href="?cargar=iniciocliente">Consultar</a>
                    </div>
                </div>
            </li>

            <!-- Menú mascota -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpleados"
                    aria-expanded="true" aria-controls="collapseEmpleados">
                    <i class="fas fa-paw text-white"></i>
                    <span>Mascotas</span>
                </a>
                <div id="collapseEmpleados" class="collapse" aria-labelledby="headingEmpleados" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?cargar=crearmascota">Registrar</a>
                        <a class="collapse-item" href="?cargar=iniciomascota">Consultar</a>
                    </div>
                </div>
            </li>

            <!-- Menú vacuna -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
                    aria-expanded="true" aria-controls="collapseInventario">
                    <i class="fas fa-syringe text-white"></i>
                    <span>Vacunas</span>
                </a>
                <div id="collapseInventario" class="collapse" aria-labelledby="headingInventario" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?cargar=crearvacuna">Registrar</a>
                        <a class="collapse-item" href="?cargar=iniciovacuna">Consultar</a>
                    </div>
                </div>
            </li>

            <!-- Menú veterinario -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedor"
                    aria-expanded="true" aria-controls="collapseProveedor">
                    <i class="fas fa-user-md text-white"></i>
                    <span>Veterinarios</span>
                </a>
                <div id="collapseProveedor" class="collapse" aria-labelledby="headingProveedor" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?cargar=crearveterinario">Registrar</a>
                        <a class="collapse-item" href="?cargar=inicioveterinario">Consultar</a>
                    </div>
                </div>
            </li>

            <!-- Menú consulta -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsulta"
                    aria-expanded="true" aria-controls="collapseConsulta">
                    <i class="fas fa-stethoscope text-white"></i>
                    <span>Consultas</span>
                </a>
                <div id="collapseConsulta" class="collapse" aria-labelledby="headingConsulta" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?cargar=crearconsulta">Registrar</a>
                        <a class="collapse-item" href="?cargar=inicioconsulta">Consultar</a>
                    </div>
                </div>
            </li>
        </ul> 
        
        <!-- Ajustar toda la pantalla de los datos de cada tabla -->
        <div id="content-wrapper12" class="d-flex flex-column">
            <!-- Botón de cerrar sesión -->
            <!-- Navbar topbar -->
            <nav class="navbar topbar mb-4">
                <ul class="navbar-nav ml-auto">
                    <!-- Cerrar sesión con botón rojo -->
                    <li class="nav-item">
                        <a class="nav-link logout-button" href="?cargar=cerrar">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <div class="row">

                    <!-- Cargar vistas de tablas -->
                    <div class="col-12 mb-4">
                        <!-- CODIGO DE LA VISTA AQUI -->
                        <section>
                            <?php
                                $enrutador = new enrutador();
                                if ($enrutador->validarGET(@$_GET['cargar'])) {
                                    $enrutador->cargarVista($_GET['cargar']);
                                }
                            ?>
                        </section>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
