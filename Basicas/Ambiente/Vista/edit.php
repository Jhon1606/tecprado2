<!-- Modal -->
<div class="modal fade" id="modalEditarAmbiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Ambiente</h5>
                <a href="index.php"> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="ideditar" name="codigo" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Descripción..." name="descripcion" id="descripcion" aria-label="Descripcion">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Complejo</label>
                        <select class="form-select" name="centro_costo" id="centro_costo">
                            <option value="">Seleccione</option>
                            <?php
                            $complejos= $modeloAmbiente->getComplejos();

                            if($complejos != null){
                                foreach($complejos as $complejo){
                                ?>
                                <option value="<?php echo $complejo['codigo']; ?>"><?php echo $complejo['descripcion']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tipo de ambiente</label>
                        <select class="form-select" aria-label="Default select example" name="tipo_ubicacion" id="tipo_ubicacion"> 
                            <option value="">Seleccione</option>
                            <?php
                            $tipoAmbientes= $modeloAmbiente->getTipoA();

                            if($tipoAmbientes != null){
                                foreach($tipoAmbientes as $tipoAmbiente){
                                ?>
                                <option value="<?php echo $tipoAmbiente['id']; ?>"><?php echo $tipoAmbiente['descripcion']; ?></option>
                                <?php
                                }
                            }
                            ?> 
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button></a> 
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>






