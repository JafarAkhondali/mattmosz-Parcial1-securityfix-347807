<div class="modal fade" id="modalCursos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModalC">Nuevo Curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCurso" name="formCurso">
                    <div class="mb-3">
                        <label for="control-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombreC" id="nombreC">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Creditos:</label>
                        <input type="text" class="form-control" name="creditos" id="creditos">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Profesor:</label>
                        <input type="text" class="form-control" name="profesor" id="profesor">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Horario:</label>
                        <input type="text" class="form-control" name="horario" id="horario">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>