<?php

require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idCurso = $_GET['idCurso'];

    $sql = "SELECT * FROM curso WHERE ID_CURSO = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idCurso));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false,'msg' => 'Curso no encontrado');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>