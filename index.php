<?php
require_once "Estudiante.php";

$estudiante = null;

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibir datos del formulario
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $materia = $_POST["materia"];
    $grupo = $_POST["grupo"];

    // Crear nuevo objeto
    $estudiante = new Estudiante($matricula, $nombre, $materia, $grupo);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Estudiantes</title>
</head>
<body>

<h2>Crear nuevo estudiante</h2>

<form method="POST">
    Matrícula: <input type="number" name="matricula" required><br><br>
    Nombre: <input type="text" name="nombre" required><br><br>
    Materia: <input type="text" name="materia" required><br><br>
    Grupo: <input type="text" name="grupo" required><br><br>
    
    <button type="submit">Crear</button>
</form>

<hr>

<?php
// Si ya existe un objeto, mostrarlo
if ($estudiante != null) {
    echo "<h3>Estudiantes:</h3>";
    echo $estudiante->mostrarInfo();
}
?>

</body>
</html>