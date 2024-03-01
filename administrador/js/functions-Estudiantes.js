$('#tableEstudiantes').DataTable();
var tableEstudiantes;

document.addEventListener('DOMContentLoaded', function(){
    tableEstudiantes = $('#tableEstudiantes').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/estudiantes/table_estudiantes.php",
            "dataSrc": ""
        },
        "columns": [
            {"data": "acciones"},
            {"data": "ID_ESTUDIANTE"},
            {"data": "NOMBRE"},
            {"data": "EDAD"},
            {"data": "CARRERA"},
            {"data": "PROMEDIO"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    })
})

function openModalEstudiantes(){
    $('#modalEstudiante').modal('show');
}