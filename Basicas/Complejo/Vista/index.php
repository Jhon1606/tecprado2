<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/complejo.php');


    $modeloComplejo= new complejo();
    $complejos = $modeloComplejo->get();
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

    <title>Complejos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="noopener"></script>
    <link href="../../../Bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../Bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../../Bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   

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
                <div class="container-fluid">
                    <h2>Complejos</h2>
                    <div class="col p-2">
                        <a href="javascript:void(0);" onclick="modalAgregar('Complejo')"><button type="button" class="btn btn-info" title="A??adir"><i class="fa fa-plus-circle"></i> Agregar Complejo </button></a> 
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descripci??n</th> 
                                    <th scope="col" style="text-align:right"></th> 
                                </tr>
                            </thead>

                            <tbody>
                            <?php         
                                if($complejos != null){ 
                                    foreach($complejos as $complejo){
                            ?>
                                <tr>
                                    <td><?php echo $complejo['codigo']; ?></td>
                                    <td><?php echo $complejo['descripcion']; ?></td>
                                    <td style="text-align:right;">
                                        <a href="javascript:void(0);" onclick="modalEditarComplejo('<?php echo $complejo['codigo']; ?>')"><button type="button" class="btn btn-success my-1 btn-sm" title="Editar"><i class="bi bi-pencil-fill"></i> </button></a>
                                        <a href="javascript:void(0);" onclick="modalEliminar('<?php echo $complejo['codigo']; ?>')"><button type="button" class="btn btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash3"></i> </button></a>
                                        <a href="javascript:void(0);" onclick="modalHabitacion('<?php echo $complejo['codigo']; ?>')"><button type="button" class="btn btn-primary btn-sm" title="Habitaci??n"> <i class="bi bi-door-closed"></i> </button></a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- /.container-fluid -->
                
            </div>
           
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesi??n</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Est??s seguro de cerrar sesi??n?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary btn-sm" href="../../../Usuarios/Controlador/salir.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once('add.php');
    ?>

    <?php
        require_once('edit.php');
    ?>

    <?php
        require_once('delete.php');
    ?>

    <?php
        require_once('habitacion.php');
    ?>

    <?php
        require_once('habitaciondelete.php');
    ?>

    <!-- Bootstrap core JavaScript-->
    
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

    <script src="../../../Bootstrap/js/javascript.js"></script>
    <?php show_flash_messages() ?> 

</body>

</html>
<?Php } else{
    header('Location: ../../../index.php');
} ?>