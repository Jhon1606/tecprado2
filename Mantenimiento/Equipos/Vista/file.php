<!-- Modal -->
<div class="modal fade" id="myModalArchivo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                <button type="button" onclick="cerrarModals('Archivo')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Formulario -->
            <form action="../Controlador/file.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="equipo" name="equipo">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nomdocumento" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentario</label>
                        <input class="form-control" type="text" name="comentario" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subir archivo</label>
                        <input class="form-control" type="file" name="arch">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModals('Archivo')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <div class="table-responsive container-fluid">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Comentario</th> 
                            <th scope="col">Archivo</th> 
                        </tr>
                    </thead>

                    <tbody id='equiposDoc'>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>

