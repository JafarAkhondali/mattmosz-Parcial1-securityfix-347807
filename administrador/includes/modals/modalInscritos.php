<div class="modal fade" id="modalInscritos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloModalC">Nuevo Inscrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formInscrito" name="formInscrito">
                    <input type="hidden" name="idInscrito" id="idInscrito" value="">
                    <div class="mb-3">
                        <label for="control-label">Estudiante ID:</label>
                        <input type="text" class="form-control" name="estudianteID" id="estudianteID">
                    </div>
                    <div class="mb-3">
                        <label for="control-label">Curso ID:</label>
                        <input type="text" class="form-control" name="cursoID" id="cursoID">
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