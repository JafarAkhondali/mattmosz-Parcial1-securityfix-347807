<?php
require_once '../../../includes/conexion.php';

$sql = 'SELECT * FROM curso';
$query = $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i=0;$i<count($consulta);$i++){

    $consulta[$i]['acciones'] = '
          <button class="btn btn-primary" title="Editar" onclick="editarCurso('.$consulta[$i]['ID_CURSO'].')">Editar</button>
          <button class="btn btn-danger" title="Eliminar" onclick="eliminarCurso('.$consulta[$i]['ID_CURSO'].')">Eliminar</button>
                                ';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);

?>