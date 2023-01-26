<!-- Modal -->
<div class="modal fade" id="myModalLinea" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir linea de equipos</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Codigo..." name="codigo_linea" required="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo: </label>
                        <select name="grupo" class="form-select" required="">
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
                    <a href="index.php"><button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button></a> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>