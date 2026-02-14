<?php
// Clase Estudiante. Representa a un estudiante con sus datos atributos y métodos
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

    public function getNombre() {
        return $this->nombre;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function getGrupo() {
        return $this->grupo;
    }
}