<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/actualizar.php');

    $modeloActualizar= new actualizar();

    if(isset($_POST['verTodos'])){
        $equipos = $modeloActualizar->get();
    }

    if($_POST['consulta'] != ""){
        $consulta = $_POST['consulta'];
        $equipos = $modeloActualizar->buscar($consulta);
    } else{
    $equipos = $modeloActualizar->get();
    }

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

    <title>Registro de mantenimientos</title>
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
                <div class="container-fluid">
                    <h2>Registro de mantenimiento</h2>
                    <div class="row">
                        <div class="col p-2 m-3" style="text-align:left;">
                            <div class="row">
                                <div class="col-2 p-1"> <label class="form-label">Filtrar</label></div>
                                <div class="col-10">
                                    <select class="form-select" onchange="">
                                        <option value="">Seleccione</option>
                                        <option value="codigo">Codigo</option>
                                        <option value="complejo">Complejo</option>
                                        <option value="ambiente">Ambiente</option>
                                        <option value="habitacion">Habitación</option>
                                        <option value="grupo">Grupo</option>
                                        <option value="descripcion">Descripción</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 p-2 m-3">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-8"> <input class="form-control" type="search" placeholder="Buscar..." name="consulta"></div>
                                <div class="col-4"> <button type="submit" class="btn btn-primary">Buscar</button></div>
                            </div>
                        </form>
                        </div>
                       
                        
                        <div class="col p-2 m-3">
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-primary" name="verTodos">Ver todos</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descripción</th> 
                                    <th scope="col">Complejo</th> 
                                    <th scope="col">Ambiente</th> 
                                    <th scope="col">Hab</th> 
                                    <th scope="col">Grupo</th> 
                                    <th scope="col">Linea</th> 
                                    <th scope="col">Ultimo mtto</th> 
                                    <th scope="col"></th> 
                                </tr>
                            </thead>

                            <tbody>
                            <?php         
                                if($equipos != null){ 
                                    foreach($equipos as $equipo){
                            ?>
                                <tr>
                                    <th><?php echo $equipo['codigo_eqp']; ?></th>
                                    <td><?php echo $equipo['descripcion']; ?></td>
                                    <td><?php echo $equipo['centro_costo']; ?></td>
                                    <td><?php echo $equipo['ambiente']; ?></td>
                                    <td><?php echo $equipo['habitacion']; ?></td>
                                    <td><?php echo $equipo['codigo_grupo']; ?></td>
                                    <td><?php echo $equipo['codigo_linea']; ?></td>
                                    <td><?php echo $equipo['fecha_ultimo_mtto']; ?></td>
                                    <td style="text-align:right;">
                                        <a href="javascript:void(0);" onclick="modalActualizarEquipo('<?php echo $equipo['codigo_eqp']; ?>')"><button type="button" class="btn-xs btn-success my-1" title="Actualizar">Actualizar</button></a>
                                        <a href="javascript:void(0);" onclick="modalHistorialMtto('<?php echo $equipo['codigo_eqp']; ?>')"><button type="button" class="btn-xs btn-success my-1" title="Historial">Historial</button></a>
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
                    <a class="btn btn-primary" href="../../../Usuarios/Controlador/salir.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once('actualizar.php');
    ?>

    <?php
        require_once('historial.php');
    ?>

    <?php
        require_once('delete.php');
    ?>

    <?php show_flash_messages() ?> 

</body>

</html>
<?php } else{
    header('Location: ../../../index.php');
} ?>