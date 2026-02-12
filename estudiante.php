<?php
// Clase Estudiante. Representa a un estudiante con sus datos básicos
class Estudiante {
    // Atributos
    private $matricula;
    private $nombre;
    private $materia;
    private $grupo;

    // Constructor
    public function __construct($matricula, $nombre, $materia, $grupo) {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->materia = $materia;
        $this->grupo = $grupo;
    }

    // Método para obtener información del estudiante
    public function mostrarInfo() {
        return "Matrícula: $this->matricula <br>
                Nombre: $this->nombre <br>
                Materia: $this->materia <br>
                Grupo: $this->grupo <br>";
    }

   
}
?>