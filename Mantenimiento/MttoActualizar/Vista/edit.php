<!-- Modal -->
<div class="modal fade" id="myModalEditarEquipo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Equipo</h5>
                <button type="button" onclick="cerrarModals('EditarEquipo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Codigo</label>
                        <input class="form-control" type="text" placeholder="Codigo..." name="codigo_eqp" id="ideditar" required="" aria-label="Codigo">
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Complejo</label>
                                <select class="form-select" name="centro_costo" id="centro_costo" onchange="cargarAmbienteEditar(this.value,'')">
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
                                <div id="editarAmbiente">
                            
                                </div>
                            </div>
                            <div class="col">
                                <div id="editarHabitacion">
                            
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Grupo</label>
                                <select class="form-select" name="codigo_grupo" id="codigo_grupo" onchange="cargarLineaEditar(this.value,'')">
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
                                <div id="editarLinea">

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Serie</label>
                                <input class="form-control" type="text" placeholder="Serie..." name="serie" id="serie">
                            </div>
                            <div class="col">
                                <label class="form-label">Modelo</label>
                                <input class="form-control" type="text" placeholder="Modelo..." name="modelo" id="modelo">
                            </div>
                            <div class="col">
                                <label class="form-label">Marca</label>
                                <input class="form-control" type="text" placeholder="Marca..." name="marca" id="marca">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">Capacidad </label>
                            <select class="form-select" name="codigo_und" id="codigo_und">
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
                            <label class="form-label">Estandar de consumo</label>
                            <input class="form-control" type="text" placeholder="Estandar de consumo..." name="estandar_combustible" id="estandar_combustible">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Fecha último mantenimiento</label>
                        <input class="form-control" type="date" name="fecha_ultimo_mtto" id="fecha_ultimo_mtto" max="<?php echo date('Y-m-d')?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('EditarEquipo')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>