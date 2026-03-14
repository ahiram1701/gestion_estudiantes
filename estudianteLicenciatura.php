<?php

// Incluir clase padre
require_once "estudiante.php";

// Clase EstudianteLicenciatura hereda de Estudiante
class EstudianteLicenciatura extends Estudiante {
 //Atributo especifico de la subclase   
    private $tetramestre;
//Constructor de la subclase
    public function __construct($matricula, $nombre, $materia, $grupo, $tetramestre) {
        parent::__construct($matricula, $nombre, $materia, $grupo);
$this->tetramestre = $tetramestre;
    }

    public function getTetramestre() {
        return $this->tetramestre;
    }

    public function getTipo() {
        return "Licenciatura";
    }
}