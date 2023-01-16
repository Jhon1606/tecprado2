<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/reportes.php');

    $modeloReporte= new reporte();
    // $equipos = $modeloEquipo->get();

    if (isset($_SESSION['Nombre'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reportes de equipos</title>
    <link href="../../../Bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../Bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../Bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../../../Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../Bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../Bootstrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../Bootstrap/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../Bootstrap/js/demo/chart-area-demo.js"></script>
    <script src="../../../Bootstrap/js/demo/chart-pie-demo.js"></script>

    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="noopener"></script> -->
    <script src="../../../Bootstrap/js/javascript.js?v=<?php echo(rand()); ?>"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once('../../../Nav/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once('../../../Nav/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container">
                    <h2>Reportes de equipos</h2>
                    <p class="p-2"> <b>Criterios de consulta</b></p>

                    <form action="lst_equipos.php" method="POST" target="_blank">
                        <!-- Codigo -->
                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Codigo: </label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" name="codigo" placeholder="Codigo...">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Complejo: </label>
                                </div>
                                <div class="col-4">
                                    <select name="complejo" class="form-select">
                                        <option value="">Seleccione</option>
                                        <?php 
                                            $complejos = $modeloReporte->getComplejos();
                                            if ($complejos != ""){
                                                foreach($complejos as $complejo){
                                        ?>
                                        <option value="<?php echo $complejo['descripcion'] ?>"><?php echo $complejo['descripcion'];?></option>
                                        <?php 
                                                }
                                            }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Ambiente: </label>
                                </div>
                                <div class="col-4">
                                    <select name="ambiente" class="form-select">
                                        <option value="">Seleccione</option>
                                        <?php 
                                            $ambientes = $modeloReporte->getAmbiente();
                                            if ($ambientes != ""){
                                                foreach($ambientes as $ambiente){
                                        ?>
                                        <option value="<?php echo $ambiente['descripcion'] ?>"><?php echo $ambiente['descripcion'];?></option>
                                        <?php 
                                                }
                                            }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Habitación: </label>
                                </div>
                                <div class="col-4">
                                    <select name="habitacion" class="form-select">
                                        <option value="">Seleccione</option>
                                        <?php 
                                            $habitaciones = $modeloReporte->getHabitacion();
                                            if ($habitaciones != ""){
                                                foreach($habitaciones as $habitacion){
                                        ?>
                                        <option value="<?php echo $habitacion['piso'] ?>"><?php echo $habitacion['piso'];?></option>
                                        <?php 
                                                }
                                            }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Grupo: </label>
                                </div>
                                <div class="col-4">
                                    <select name="grupo" class="form-select">
                                        <option value="">Seleccione</option>
                                        <?php 
                                            $grupos = $modeloReporte->getGrupo();
                                            if ($grupos != ""){
                                                foreach($grupos as $grupo){
                                        ?>
                                        <option value="<?php echo $grupo['descripcion'] ?>"><?php echo $grupo['descripcion'];?></option>
                                        <?php 
                                                }
                                            }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-2">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Linea: </label>
                                </div>
                                <div class="col-4">
                                    <select name="linea" class="form-select">
                                        <option value="">Seleccione</option>
                                        <?php 
                                            $lineas = $modeloReporte->getLinea();
                                            if ($lineas != ""){
                                                foreach($lineas as $linea){
                                        ?>
                                        <option value="<?php echo $linea['descripcion'] ?>"><?php echo $linea['descripcion'];?></option>
                                        <?php 
                                                }
                                            }    
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 p-2">
                           <a href=""> <button type="submit" class="btn btn-primary"> Ver reporte </button> </a>
                        </div>
                    </form>

                </div>
                
                <!-- /.container-fluid -->
                
            </div>
           
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 
                require_once("../../../Nav/footer.php");
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Estás seguro de cerrar sesión?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../../Usuarios/Controlador/salir.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php show_flash_messages() ?> 

</body>

</html>
<?php } else{
    header('Location: ../../index.php');
} ?>