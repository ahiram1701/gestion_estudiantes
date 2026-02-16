<?php
// incluir la clase estudiante
require_once "estudiante.php";

// iniciar sesión
session_start();

// crear lista de estudiantes si no existe
if (!isset($_SESSION["estudiantes"])) {
    $_SESSION["estudiantes"] = [];
}

// si se envía el formulario
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // obtener datos del formulario
          $matricula = $_POST["matricula"];
          $nombre = $_POST["nombre"];
          $materia = $_POST["materia"];
          $grupo = $_POST["grupo"];
          // crear objeto (estudiante)
          $nuevoEstudiante = new Estudiante($matricula, $nombre, $materia, $grupo);

          $_SESSION["estudiantes"][] = $nuevoEstudiante;

          header("Location: index.php");
          exit();
      }
    ?>
        
<!DOCTYPE html>  
<html lang="es">
  
<!-- head -->
  <head>
    <meta charset="UTF-8">
    <!-- responsive degign -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    
<!-- lista de estudiantes -->
    <?php if (!empty($_SESSION["estudiantes"])): ?>

    <h3 class="mt-4">Lista de estudiantes</h3>

    <div class="row">
    <?php foreach ($_SESSION["estudiantes"] as $e): ?>
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= $e->getNombre() ?></h5>
            <p class="card-text">
              <strong>Matrícula:</strong> <?= $e->getMatricula() ?><br>
              <strong>Materia:</strong> <?= $e->getMateria() ?><br>
              <strong>Grupo:</strong> <?= $e->getGrupo() ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>

<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>