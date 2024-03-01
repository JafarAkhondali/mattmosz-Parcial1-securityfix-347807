<?php

require_once '../../../includes/conexion.php';
if(!empty($_POST)){
    if(empty($_POST['nombreC']) || empty($_POST['creditos']) || empty($_POST['profesor'])){
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    }else{
        $nombre = $_POST['nombreC'];
        $creditos = $_POST['creditos'];
        $profesor = $_POST['profesor'];
        $horario = $_POST['horario'];

        $sql = 'SELECT * FROM curso WHERE NOMBRE_CURSO = ?';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'El curso ya existe');
        }else{
            $sqlInsert = 'INSERT INTO curso (nombre_curso, creditos, profesor, horario) VALUES (?, ?, ?, ?)';
            $queryInsert = $pdo->prepare($sqlInsert);
            $resultInsert = $queryInsert->execute(array($nombre, $creditos, $profesor, $horario));
            if($resultInsert){
                $respuesta = array('status' => true, 'msg' => 'Curso registrado correctamente');
            }else{
                $respuesta = array('status' => false, 'msg' => 'Error al registrar el curso');
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>