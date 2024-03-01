<?php

require_once '../../../includes/conexion.php';
if(!empty($_POST)){
    if(empty($_POST['nombreE']) || empty($_POST['edad']) || empty($_POST['carrera'])){
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    }else{
        $nombre = $_POST['nombreE'];
        $edad = $_POST['edad'];
        $carrera = $_POST['carrera'];
        $promedio = $_POST['promedio'];

        $sql = 'SELECT * FROM estudiante WHERE NOMBRE = ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'El usuario ya existe');
        }else{
            $sqlInsert = 'INSERT INTO estudiante (nombre, edad, carrera, promedio) VALUES (?, ?, ?, ?)';
            $queryInsert = $pdo->prepare($sqlInsert);
            $resultInsert = $queryInsert->execute(array($nombre, $edad, $carrera, $promedio));
            if($resultInsert){
                $respuesta = array('status' => true, 'msg' => 'Estudiante registrado correctamente');
            }else{
                $respuesta = array('status' => false, 'msg' => 'Error al registrar el estudiante');
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>