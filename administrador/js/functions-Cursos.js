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
    });

    var formCurso = document.querySelector('#formCurso');
    formCurso.onsubmit = function(e){
        e.preventDefault();
        var nombre = document.querySelector('#nombreC').value;
        var creditos = document.querySelector('#creditos').value;
        var profesor = document.querySelector('#profesor').value;
        var horario = document.querySelector('#horario').value;

        if(nombre == '' || creditos == '' || profesor == ''|| horario == ''){
            swal('Atencion', 'Todos los campos son obligatorios', 'error');
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/cursos/ajax-cursos.php';
        var form = new FormData(formCurso);
        request.open('POST', url, true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    $('#modalCursos').modal('hide');
                    formCurso.reset();
                    swal('Usuario Registrado', data.msg, 'success');
                    tableCursos.ajax.reload();
                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }
    }
})

function openModalCursos(){
    $('#modalCursos').modal('show');
}

function editarCurso(id){
    idCurso = id;

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/cursos/edit-cursos.php?idCurso='+idCurso;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){
                    document.querySelector('#idCurso').value = data.data.ID_CURSO;
                    document.querySelector('#nombreC').value = data.data.NOMBRE_CURSO;
                    document.querySelector('#creditos').value = data.data.CREDITOS;
                    document.querySelector('#profesor').value = data.data.PROFESOR;
                    document.querySelector('#horario').value = data.data.HORARIO;

                    $('#modalCursos').modal('show');

                }else{
                    swal('Error', data.msg, 'error');
                }
            } 
            return false;   
        }

}