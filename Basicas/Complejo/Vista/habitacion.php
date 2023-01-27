<!-- Modal -->
<div class="modal fade" id="myModalHabitacion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Habitación</h5>
                <button type="button" onclick="cerrarModals('Habitacion')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/habitacionadd.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3 col-6">
                        <input class="form-control" type="number" placeholder="Número de habitación" name="piso" required="">
                        <input type="hidden" id="centro_costo" name="centro_costo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('Habitacion')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>

            <div class="table-responsive" style='padding:30px;'>
                <table class="table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">Habitación</th> 
                            <th scope="col">Complejo</th> 
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    
                    <tbody id="tablaHabitaciones">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>