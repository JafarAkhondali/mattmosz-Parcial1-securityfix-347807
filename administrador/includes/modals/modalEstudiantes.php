<div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModalE">Nuevo Estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEstudiante" name="formEstudiante">
                    <div class="mb-3">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombreE" id="nombreE">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Edad:</label>
                        <input type="text" class="form-control" name="edad" id="edad">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Carrera:</label>
                        <input type="text" class="form-control" name="carrera" id="carrera">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Promedio:</label>
                        <input type="text" class="form-control" name="promedio" id="promedio">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>