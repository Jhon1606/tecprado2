<!-- Modal -->
<div class="modal fade" id="modalHabitacion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Habitación</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/habitacionadd.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="number" placeholder="Número de habitación" name="piso" required="">
                        <input type="hidden" id="centro_costo" name="centro_costo">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button></a> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>

            <div class="table-responsive" style='padding:30px;'>
                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Habitación</th> 
                            <th scope="col">Complejo</th> 
                        </tr>
                    </thead>
                    
                    <tbody id="tablaHabitaciones">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>