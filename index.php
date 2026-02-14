<?php
// incluir clase
require_once "estudiante.php";

// variable para guardar el objeto
$estudiante = null;

// si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // recibir datos del formulario
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $materia = $_POST["materia"];
    $grupo = $_POST["grupo"];

    // crear nuevo objeto
    $estudiante = new Estudiante($matricula, $nombre, $materia, $grupo);
}
?>
  

<!DOCTYPE html>  
<html lang="es">
  
<!-- head -->
  <head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      rel="stylesheet">
  </head>
  
  <!-- body -->
  <body class="bg-light">
    
  <!-- navbar -->    
  <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
      <span class="navbar-brand">Gestión de Estudiantes</span>
    </div>
  </nav>

  <div class="container">

  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title mb-3">Crear nuevo estudiante</h5>
      
<!-- formulario -->
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Matrícula</label>
          <input type="number" name="matricula" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Materia</label>
          <input type="text" name="materia" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Grupo</label>
          <input type="text" name="grupo" class="form-control" required>
        </div>
<!-- botón crear estudiante -->
        <button type="submit" class="btn btn-primary">
          Crear estudiante
        </button>
      </form>
    </div>
  </div>

  
<hr>

  <!-- mensaje de creado -->
  <?php if ($estudiante != null): ?>
    <div class="alert alert-success">
      Estudiante creado correctamente
    </div>
<!-- estudiantes -->
  <h5 class="card-title"><?= $estudiante->getNombre() ?></h5>

  <strong>Matrícula:</strong> <?= $estudiante->getMatricula() ?><br>
  <strong>Materia:</strong> <?= $estudiante->getMateria() ?><br>
  <strong>Grupo:</strong> <?= $estudiante->getGrupo() ?><br>
  <?php endif; ?>

</div> <!-- container -->

<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>