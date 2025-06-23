<?php
class Evento {
    //Atributos
    private $id;
    private $nombre;
    private $fecha;
    private $lugar;
    private $aforo;
    private $precio;
    
    //Setters
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setLugar($lugar): void {
        $this->lugar = $lugar;
    }

    public function setAforo($aforo): void {
        $this->aforo = $aforo;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }
    
    //Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getLugar() {
        return $this->lugar;
    }

    public function getAforo() {
        return $this->aforo;
    }

    public function getPrecio() {
        return $this->precio;
    }
}