<?php

require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idEstudiante = $_GET['idEstudiante'];

    $sql = 'SELECT * FROM estudiante WHERE ID_ESTUDIANTE = ?';
    $query = $pdo->prepare($sql);
    $query->execute(array($idEstudiante));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false,'msg' => 'Datos no encontrados');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>