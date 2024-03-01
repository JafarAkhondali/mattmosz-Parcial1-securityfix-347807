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
    });

    var formInscrito = document.querySelector('#formInscrito');
    formInscrito.onsubmit = function(e){
        e.preventDefault();
        var estudianteID = document.querySelector('#estudianteID').value;
        var cursoID = document.querySelector('#cursoID').value;

        if(estudianteID == '' || cursoID == ''){
            swal('Atencion', 'Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/inscritos/ajax-inscritos.php';
        var form = new FormData(formInscrito);
        request.open('POST', url, true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    $('#modalInscritos').modal('hide');
                    formInscrito.reset();
                    swal('Registrado', data.msg, 'success');
                    tableInscritos.ajax.reload();
                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }
    }

})

function openModalInscritos(){
    $('#modalInscritos').modal('show');
}

function editarInscrito(id){
    var idInscrito = id;

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/inscritos/edit-inscritos.php?idInscrito='+idInscrito;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    document.querySelector('#idInscrito').value = data.data.id_inscrito;
                    document.querySelector('#cursoID').value = data.data.id_curso;
                    document.querySelector('#estudianteID').value = data.data.id_estudiante;

                    $('#modalInscritos').modal('show');
                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }

}