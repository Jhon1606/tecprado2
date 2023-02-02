<!-- Modal -->
<div class="modal fade" id="myModalEditarTipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Tipo de Ambiente</h5>
                <button type="button" onclick="cerrarModals('EditarTipo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="ideditar" name="id" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" id="descripcion" aria-label="Descripcion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('EditarTipo')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>






