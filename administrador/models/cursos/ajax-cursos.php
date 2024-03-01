<?php

require_once '../../../includes/conexion.php';
if (!empty($_POST)) {
    if (empty($_POST['nombreC']) || empty($_POST['creditos']) || empty($_POST['profesor'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idCurso = $_POST['idCurso'];
        $nombre = $_POST['nombreC'];
        $creditos = $_POST['creditos'];
        $profesor = $_POST['profesor'];
        $horario = $_POST['horario'];

        $sql = 'SELECT * FROM curso WHERE NOMBRE_CURSO = ? AND ID_CURSO != ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre, $idCurso));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'El curso ya existe');
        } else {
            if ($idCurso == 0) {
                $sqlInsert = 'INSERT INTO curso (nombre_curso, creditos, profesor, horario) VALUES (?, ?, ?, ?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $creditos, $profesor, $horario));
                $accion = 1;
            } else {
                if (empty($horario)) {
                    $sqlUpdate = 'UPDATE curso SET nombre_curso = ?, creditos = ?, profesor = ? WHERE id_curso = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $creditos, $profesor, $idCurso));
                    $accion = 2;
                }else{
                    $sqlUpdate = 'UPDATE curso SET nombre_curso = ?, creditos = ?, profesor = ?, horario = ? WHERE id_curso = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $creditos, $profesor, $horario, $idCurso));
                    $accion = 3;
                }
            }

            if ($request > 0) {
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Curso registrado correctamente');
                }else{
                    $respuesta = array('status' => true, 'msg' => 'Curso actualizado correctamente');
                }
            } 
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
