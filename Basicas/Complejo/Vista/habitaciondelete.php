<!-- Modal -->
<div class="modal fade" id="myModalEliminarHabitacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Habitación</h5>
                <button type="button" onclick="cerrarModals('EliminarHabitacion')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
            </div>
            <!-- Formulario -->
            <form action="../Controlador/habitaciondelete.php" method="POST" >
                <input type="hidden" id="id_piso" name="id_piso">
                <div class="modal-body">
                    ¿Está seguro que desea eliminar la habitación?
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('EliminarHabitacion')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cancelar</button> 
                    <button type="submit" class="btn btn-primary btn-sm">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>