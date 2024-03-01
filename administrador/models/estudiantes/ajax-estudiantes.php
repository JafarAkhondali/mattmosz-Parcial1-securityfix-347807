<?php

require_once '../../../includes/conexion.php';
if (!empty($_POST)) {
    if (empty($_POST['nombreE']) || empty($_POST['edad']) || empty($_POST['carrera'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idEstudiante = $_POST['idEstudiante'];
        $nombre = $_POST['nombreE'];
        $edad = $_POST['edad'];
        $carrera = $_POST['carrera'];
        $promedio = $_POST['promedio'];

        $sql = 'SELECT * FROM estudiante WHERE NOMBRE = ? AND ID_ESTUDIANTE != ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre, $idEstudiante));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'El usuario ya existe');
        } else {
            if ($idEstudiante == 0) {
                $sqlInsert = 'INSERT INTO estudiante (nombre, edad, carrera, promedio) VALUES (?, ?, ?, ?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $edad, $carrera, $promedio));
                $accion = 1;
            } else {
                if (empty($_POST['promedio'])) {
                    $sqlUpdate = 'UPDATE estudiante SET nombre = ?, edad = ?, carrera = ? WHERE id_estudiante = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $edad, $carrera, $idEstudiante));
                    $accion = 2;
                } else {
                    $sqlUpdate = 'UPDATE estudiante SET nombre = ?, edad = ?, carrera = ?, promedio = ? WHERE id_estudiante = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $edad, $carrera, $promedio, $idEstudiante));
                    $accion = 3;
                }
            }

            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Estudiante registrado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Estudiante actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
