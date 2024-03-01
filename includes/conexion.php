<?php

$host = 'localhost';
$user = 'root';
$db = 'evaluacion_parcial1';
$pass = '';

    try{
        $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8',$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
        exit;
    }

?>