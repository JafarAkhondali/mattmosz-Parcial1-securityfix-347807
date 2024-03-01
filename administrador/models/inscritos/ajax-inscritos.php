<?php

require_once '../../../includes/conexion.php';
if (!empty($_POST)) {
    if (empty($_POST['estudianteID']) || empty($_POST['cursoID'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idInscrito = $_POST['idInscrito'];
        $estudianteID = $_POST['estudianteID'];
        $cursoID = $_POST['cursoID'];

        $sql = 'SELECT * FROM inscrito_en WHERE id_curso = ? AND id_estudiante = ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($cursoID, $estudianteID));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'El registro ya existe');
        } else {
            if ($idInscrito == 0) {
                $sqlInsert = 'INSERT INTO inscrito_en (id_curso, id_estudiante) VALUES (?, ?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($cursoID, $estudianteID));
                $accion = 1;
            }else{
                $sqlUpdate = 'UPDATE inscrito_en SET id_curso = ?, id_estudiante = ? WHERE id_inscrito = ?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($cursoID, $estudianteID, $idInscrito));
                $accion = 2;
            }

            if ($request > 0) {
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Registrado correctamente');
                }else{
                    $respuesta = array('status' => true, 'msg' => 'Actualizado correctamente');
                }  
            } 
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
