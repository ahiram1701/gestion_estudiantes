<?php
//Incluir clase padre
require_once "estudiante.php";

class EstudiantePosgrado extends Estudiante {

    private $especialidad;

    public function __construct($matricula, $nombre, $materia, $grupo, $especialidad) {
        parent::__construct($matricula, $nombre, $materia, $grupo);
        $this->especialidad = $especialidad;
    }
// método para obtener atributo de subclase
    public function getEspecialidad() {
        return $this->especialidad;
    }
// método que sobreescribe el metodo de la clase padre
    public function getTipo() {
        return "Posgrado";
    }
}