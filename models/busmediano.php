<?php
require_once __DIR__ . "/bus.php";

class busmediano extends bus
{
    public function __construct(string $placa)
    {
        parent::__construct($placa, 30, 2500.0); // Capacidad 30, Precio pasaje 2500
    }
}