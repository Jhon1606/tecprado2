<!-- Modal -->
<div class="modal fade" id="myModalEquipo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Equipo</h5>
                <button type="button" onclick="cerrarModals('Equipo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        
                        <input class="form-control" type="text" placeholder="Codigo..." name="codigo_eqp" required="" aria-label="Codigo">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="form-label">Complejo</label>
                                <select class="form-select" name="centro_costo" onchange="cargarAmbiente(this.value)">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $complejos= $modeloEquipo->getComplejos();

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
                            <div class="col">
                                <div id="crearAmbiente">
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="form-label">Descripcion</label>
                        <textarea class="form-control" name="descripcion" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="form-label">Grupo</label>
                                <select class="form-select" name="codigo_grupo">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $grupos= $modeloEquipo->getGrupo();

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
                            <div class="col">
                                <label for="form-label">Linea</label>
                                <select class="form-select" name="codigo_linea">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $lineas= $modeloEquipo->getLinea();

                                    if($lineas != null){
                                        foreach($lineas as $linea){
                                        ?>
                                        <option value="<?php echo $linea['codigo_linea']; ?>"><?php echo $linea['descripcion']; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>  
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Serie..." name="serie">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Modelo..." name="modelo">
                            </div>
                            <div class="col">
                                    <input class="form-control" type="text" placeholder="Marca..." name="marca">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="form-label">Observaciones</label>
                        <textarea class="form-control" name="observaciones" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="form-label">Capacidad</label>
                                <select class="form-select" name="codigo_und">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $capacidades= $modeloEquipo->getCapacidad();

                                    if($capacidades != null){
                                        foreach($capacidades as $capacidad){
                                        ?>
                                        <option value="<?php echo $capacidad['codigo_und']; ?>"><?php echo $capacidad['descripcion']; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>  
                                </select>
                            </div>
                            <div class="col">
                                <label for="form-label">Estandar de consumo</label>
                                <input class="form-control" type="text" placeholder="Estandar de consumo..." name="estandar_combustible">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('Equipo')" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>