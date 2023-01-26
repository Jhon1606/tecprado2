<!-- Modal -->
<div class="modal fade" id="myModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Complejo</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/delete.php" method="POST" >
                <input type="hidden" id="codigo" name="codigo">
                <div class="modal-body">
                    ¿Está seguro que desea eliminar el Complejo?
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cancelar</button></a> 
                    <button type="submit" class="btn btn-primary btn-sm">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>