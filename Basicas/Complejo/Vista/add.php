<!-- Modal -->
<div class="modal fade" id="myModalComplejo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Complejo</h5>
                <button type="button" onclick="cerrarModals('Complejo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="number" placeholder="Codigo..." name="codigo" required="" aria-label="Codigo">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" required="" aria-label="Descripcion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('Complejo')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>