<?php
// Incluir la clase Estudiante
require_once "estudiante.php";

// Iniciar sesión
session_start();

// Crear lista de estudiantes si no existe
if (!isset($_SESSION["estudiantes"])) {
    $_SESSION["estudiantes"] = [];
}

// Si se envía el formulario
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Obtener datos del formulario
          $matricula = $_POST["matricula"];
          $nombre = $_POST["nombre"];
          $materia = $_POST["materia"];
          $grupo = $_POST["grupo"];
          // Instanciar nuevo objeto de la clase Estudiante con los datos del formulario
          $nuevoEstudiante = new Estudiante($matricula, $nombre, $materia, $grupo);
          // Agregar nuevo objeto a la lista de estudiantes
          $_SESSION["estudiantes"][] = $nuevoEstudiante;

          header("Location: index.php");
          exit();
      }
        // Si se quiere eliminar un estudiante
        if (isset($_GET["eliminar"])) {
            $indice = $_GET["eliminar"];
            // Verificar que exista en la lista de estudiantes
            if (isset($_SESSION["estudiantes"][$indice])) {
                unset($_SESSION["estudiantes"][$indice]); // eliminar estudiante
                $_SESSION["estudiantes"] = array_values($_SESSION["estudiantes"]); // reordenar estudiantes
            }

            header("Location: index.php");
            exit();
        }
    ?>
        
<!DOCTYPE html>  
<html lang="es">
  
<!-- Head -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- diseño responsivo -->
    
    <title>Estudiantes</title>
    
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      rel="stylesheet">
  </head>
  
<!-- Body -->
  <body class="bg-light">
    
  <!-- Navbar -->    
  <nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
      <span class="navbar-brand">Gestión de Estudiantes</span>
    </div>
  </nav>

  <div class="container">

  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title mb-3">Crear nuevo estudiante</h5>
      
<!-- Formulario -->
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
        
  <!-- Botón crear estudiante -->
        <button type="submit" class="btn btn-primary">
          Crear estudiante
        </button>
      </form>
    </div>
  </div>
 
<hr>
    
<!-- Lista de estudiantes -->
    <?php if (!empty($_SESSION["estudiantes"])): ?> <!-- si hay estudiantes -->

    <h3 class="mt-4">Lista de estudiantes</h3>
  <!-- Mostrar los datos de cada objeto usando el método get de la clase Estudiante -->
    <div class="row">
    <?php foreach ($_SESSION["estudiantes"] as $index => $e): ?>
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= $e->getNombre() ?></h5>
            <p class="card-text">
              <strong>Matrícula:</strong> <?= $e->getMatricula() ?><br>
              <strong>Materia:</strong> <?= $e->getMateria() ?><br>
              <strong>Grupo:</strong> <?= $e->getGrupo() ?>
            </p>
            <!-- Botón para eliminar estudiante -->
            <a href="index.php?eliminar=<?= $index ?>" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('¿Borrar este estudiante?')">
               Borrar
            </a>
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