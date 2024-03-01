<?php
require_once '../../../includes/conexion.php';

$sql = 'SELECT inscrito_en.id_inscrito, estudiante.nombre, curso.NOMBRE_CURSO, curso.PROFESOR FROM inscrito_en INNER JOIN estudiante ON inscrito_en.id_estudiante = estudiante.ID_ESTUDIANTE INNER JOIN curso ON inscrito_en.id_curso = curso.ID_CURSO;';
$query = $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i=0;$i<count($consulta);$i++){

    $consulta[$i]['acciones'] = '
          <button class="btn btn-primary" title="Editar" onclick="editarInscrito('.$consulta[$i]['id_inscrito'].')">Editar</button>
          <button class="btn btn-danger" title="Eliminar" onclick="eliminarInscrito('.$consulta[$i]['id_inscrito'].')">Eliminar</button>
                                ';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);

?>