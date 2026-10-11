<?php
require_once __DIR__ . "/bus.php";

class busgrande extends bus
{
    public function __construct(string $placa)
    {
        parent::__construct($placa, 40, 3000.0); // Capacidad 40, Precio pasaje 3000
    }
}