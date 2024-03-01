$('#tableCursos').DataTable();
var tableCursos;

document.addEventListener('DOMContentLoaded', function(){
    tableCursos = $('#tableCursos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/cursos/table_cursos.php",
            "dataSrc": ""
        },
        "columns": [
            {"data": "acciones"},
            {"data": "ID_CURSO"},
            {"data": "NOMBRE_CURSO"},
            {"data": "CREDITOS"},
            {"data": "PROFESOR"},
            {"data": "HORARIO"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    })
})

function openModalCursos(){
    $('#modalCursos').modal('show');
}