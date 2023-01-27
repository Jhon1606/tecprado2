<!-- Modal -->
<div class="modal fade" id="myModalHistorialMtto" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial Mantenimiento</h5>
                <button type="button" onclick="cerrarModals('HistorialMtto')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Tabla -->
            <div class="table-responsive" style='padding:30px;'>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Descripción del mantenimiento</th> 
                            <th scope="col">Fecha mantenimiento</th> 
                        </tr>
                    </thead>
                    
                    <tbody id="tablaHistorial">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>