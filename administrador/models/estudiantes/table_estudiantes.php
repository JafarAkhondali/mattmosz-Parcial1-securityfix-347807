<?php
require_once '../../../includes/conexion.php';

$sql = 'SELECT * FROM estudiante';
$query = $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i=0;$i<count($consulta);$i++){

    $consulta[$i]['acciones'] = '
          <button class="btn btn-primary" title="Editar" onclick="editarEstudiante('.$consulta[$i]['ID_ESTUDIANTE'].')">Editar</button>
          <button class="btn btn-danger" title="Eliminar" onclick="eliminarEstudiante('.$consulta[$i]['ID_ESTUDIANTE'].')">Eliminar</button>
                                ';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);

?>