<!-- Modal -->
<div class="modal fade" id="myModalTipo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir tipo de ambiente</h5>
                <button type="button" onclick="cerrarModals('Tipo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('Tipo')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>