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
    });

    var formEstudiante = document.querySelector('#formEstudiante');
    formEstudiante.onsubmit = function(e){
        e.preventDefault();
        var nombre = document.querySelector('#nombreE').value;
        var edad = document.querySelector('#edad').value;
        var carrera = document.querySelector('#carrera').value;
        var promedio = document.querySelector('#promedio').value;

        if(nombre == '' || edad == '' || carrera == '' || promedio ==''){
            swal('Atencion', 'Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/estudiantes/ajax-estudiantes.php';
        var form = new FormData(formEstudiante);
        request.open('POST', url, true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    $('#modalEstudiante').modal('hide');
                    formEstudiante.reset();
                    swal('Estudiante Registrado', data.msg, 'success');
                    tableEstudiantes.ajax.reload();
                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }
    }
})

function openModalEstudiantes(){
    $('#modalEstudiante').modal('show');
}

function editarEstudiante(id){
    var idEstudiante = id;

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/estudiantes/edit-estudiantes.php?idEstudiante='+idEstudiante;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    document.querySelector('#idEstudiante').value = data.data.ID_ESTUDIANTE;
                    document.querySelector('#nombreE').value = data.data.NOMBRE;
                    document.querySelector('#edad').value = data.data.EDAD;
                    document.querySelector('#carrera').value = data.data.CARRERA;
                    document.querySelector('#promedio').value = data.data.PROMEDIO;

                    $('#modalEstudiante').modal('show');

                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }
}