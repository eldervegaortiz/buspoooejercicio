<?php
class bus
{
    protected string $placa;
    protected int $capacidad;
    protected float $preciospasaje;
    protected int $pasajeros;
    protected int $totalpasajeros;

    public function __construct(string $placa, int $capacidad, float $preciospasaje)
    {
        $this->placa = $placa;
        $this->capacidad = $capacidad;
        $this->preciospasaje = $preciospasaje;
        $this->pasajeros = 0;
        $this->totalpasajeros = 0;
    }

    public function getplaca(): string
    {
        return $this->placa;
    }

    public function getcapacidad(): int
    {
        return $this->capacidad;
    }

    public function getpreciopasaje(): float
    {
        return $this->preciospasaje;
    }

    public function getpasajerosactuales(): int
    {
        return $this->pasajeros;
    }

    public function gettotalpasajeros()
    {
        return $this->totalpasajeros;
    }

    public function getdineroacumulado(): float
    {
        return $this->preciospasaje * $this->totalpasajeros;
    }

    public function subirpasajeros(int $pasajeros): void
    {
        if (($this->pasajeros + $pasajeros) <= $this->capacidad) {
            $this->pasajeros = $this->pasajeros + $pasajeros;
            $this->totalpasajeros = $this->totalpasajeros + $pasajeros;
        }
    }

    public function errorcapacidad()
    {
        return "la cantidad de pasajeros que subio es superior a la capacidad del vehiculo";
    }

    public function errorpasajeros0()
    {
        return "ya no se pueden bajar mas pasajeros";
    }

    public function bajarpasajeros(int $pasajeros): void
    {
        if ($pasajeros <= $this->pasajeros) {
            $this->pasajeros -= $pasajeros;
        } else {
            echo "no se pueden bajar mas pasajeros";
        }
    }

    public function mostrar()
    {
        return "
        La placa es: {$this->placa}<br>
        La capacidad es: {$this->capacidad}<br>
        El precio es: {$this->preciospasaje}<br>
        El dinero acumulado es: {$this->getdineroacumulado()}<br>
        La cantidad total de pasajeros que se subió fue: {$this->totalpasajeros}<br>
        Los pasajeros actuales son: {$this->pasajeros}<br>
        ";
    }
}