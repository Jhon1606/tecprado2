<!-- Modal -->
<div class="modal fade" id="modalActualizarEquipo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar mantenimiento</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/actualizar.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3"> 
                        <label class="form-label">Código</label>
                        <input class="form-control" type="text" placeholder="Codigo..." name="codigo_eqp" id="codigo_eqp" readonly>
                    </div>

                    <div class="mb-3"> 
                        <label class="form-label">Descripción: </label>
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" id="descripcion" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="form-label">Fecha mantenimiento</label>
                        <input class="form-control" type="date" name="fecha_ultimo_mtto" id="fecha_ultimo_mtto" max="<?php echo date('Y-m-d')?>">
                    </div>

                    <div class="mb-3">
                        <label for="form-label">Descripción Mtto:</label>
                        <textarea class="form-control" name="descripcion_mtto" id="descripcion_mtto"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button></a> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>