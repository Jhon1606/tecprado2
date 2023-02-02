<!-- Modal -->
<div class="modal fade" id="myModalEditarLinea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Linea de Equipos</h5>
                <button type="button" onclick="cerrarModals('EditarLinea')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="ideditar" name="codigo_linea" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" id="descripcion" aria-label="Descripcion">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo: </label>
                        <select name="grupo" id="grupo" class="form-select">
                            <option value="">Seleccione</option>
                            <?php 
                            $grupos = $modeloLinea->getGrupo(); 
                                
                            if($grupos != null){
                                foreach($grupos as $grupo){
                                ?>
                                <option value="<?php echo $grupo['codigo_gru']; ?>"><?php echo $grupo['descripcion']; ?></option>
                                <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('EditarLinea')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>






