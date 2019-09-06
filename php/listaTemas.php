<?PHP

    $consulta="select tema.nombre from tema inner join materia on tema.idMatera=materia.idMateria where materia.nombre=";
echo $consulta;

?>