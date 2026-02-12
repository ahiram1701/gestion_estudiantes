<?php
// Se incluye la clase Estudiante
require_once "Estudiante.php";

// Instanciación de objetos
$estudiante1 = new Estudiante(95548, "Alberto Saucedo", "Programación Orientada a Objetos", "A");
$estudiante2 = new Estudiante(95549, "Hiram Guajardo", "Bases de Datos Relacionales", "B");

// Mostrar información de los estudiantes
echo "<h2>Información de Estudiantes</h2>";
echo $estudiante1->mostrarInfo();
echo "<hr>";
echo $estudiante2->mostrarInfo();
?>