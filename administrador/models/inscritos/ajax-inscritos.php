<?php

require_once '../../../includes/conexion.php';
if(!empty($_POST)){
    if(empty($_POST['estudianteID']) || empty($_POST['cursoID'])){
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    }else{
        $estudianteID = $_POST['estudianteID'];
        $cursoID = $_POST['cursoID'];

        $sql = 'SELECT * FROM inscrito_en WHERE id_curso = ? AND id_estudiante = ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($cursoID, $estudianteID));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'El registro ya existe');
        }else{
            $sqlInsert = 'INSERT INTO inscrito_en (id_curso, id_estudiante) VALUES (?, ?)';
            $queryInsert = $pdo->prepare($sqlInsert);
            $resultInsert = $queryInsert->execute(array($cursoID, $estudianteID));
            if($resultInsert){
                $respuesta = array('status' => true, 'msg' => 'Registrado correctamente');
            }else{
                $respuesta = array('status' => false, 'msg' => 'Error al registrar');
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>