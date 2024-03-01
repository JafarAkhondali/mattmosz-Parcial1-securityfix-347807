<?php

require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idInscrito = $_GET['idInscrito'];

    $sql = "SELECT * FROM inscrito_en WHERE id_inscrito = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idInscrito));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false,'msg' => 'Datos no encontrados');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

?>