$('#tableInscritos').DataTable();
var tableInscritos;

document.addEventListener('DOMContentLoaded', function(){
    tableInscritos = $('#tableInscritos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/inscritos/table_inscritos.php",
            "dataSrc": ""
        },
        "columns": [
            {"data": "acciones"},
            {"data": "id_inscrito"},
            {"data": "nombre"},
            {"data": "NOMBRE_CURSO"},
            {"data": "PROFESOR"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    })
})

function openModalInscritos(){
    $('#modalInscritos').modal('show');
}