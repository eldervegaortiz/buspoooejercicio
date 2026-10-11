<?php
require_once __DIR__ . "/bus.php";

class buspequeño extends bus 
{
    public function __construct(string $placa)
    {
        parent::__construct($placa, 20, 2000.0); // Capacidad 20, Precio pasaje 2000
    }
}