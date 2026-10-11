<?php
require_once __DIR__ . "/../models/bus.php";
require_once __DIR__ . "/../models/busgrande.php";
require_once __DIR__ . "/../models/busmediano.php";
require_once __DIR__ . "/../models/buspeq.php";

require_once __DIR__ . "/../view/visualizarbus.php";
require_once __DIR__ . "/../view/consultabus.php";

class controladorbus
{
    private $vista;

    public function __construct(visualizarbus $vista)
    {
        $this->vista = $vista;
    }

    public function desarrollar()
    {
        if (isset($_POST["enviar"])) {

            $placa = $_POST["placa"] ?? '';
            $tam = $_POST["tam"] ?? '';

            $bus = null;

            switch ($tam) {
                case "pequeño":
                    $bus = new buspequeño($placa);
                    break;

                case "mediano":
                    $bus = new busmediano($placa);
                    break;

                case "grande":
                    $bus = new busgrande($placa);
                    break;

                default:
                    echo "Tamaño de bus no válido.";
                    return;
            }

            //  entradas de subir pasajeros
            $suben1 = (int)($_POST["suben1"] ?? 0);
            $suben2 = (int)($_POST["suben2"] ?? 0);
            $suben3 = (int)($_POST["suben3"] ?? 0);
            $suben4 = (int)($_POST["suben4"] ?? 0);

            $totalSuben = $suben1 + $suben2 + $suben3 + $suben4;

            // capacidad total al subir
            if ($totalSuben <= $bus->getcapacidad()) {
                $bus->subirpasajeros($suben1);
                $bus->subirpasajeros($suben2);
                $bus->subirpasajeros($suben3);
                $bus->subirpasajeros($suben4);
            } else {
                echo $bus->errorcapacidad();
                return;
            }

            //  entradas de bajar pasajeros
            $bajan2 = (int)($_POST["bajan2"] ?? 0);
            $bajan3 = (int)($_POST["bajan3"] ?? 0);
            $bajan4 = (int)($_POST["bajan4"] ?? 0);

            $totalBajan = $bajan2 + $bajan3 + $bajan4;

            // pasajeros actuales al bajar
            if ($totalBajan <= $bus->getpasajerosactuales()) {
                $bus->bajarpasajeros($bajan2);
                $bus->bajarpasajeros($bajan3);
                $bus->bajarpasajeros($bajan4);
            } else {
                echo $bus->errorpasajeros0();
                return;
            }

            $this->vista->mostrartitulo("RESULTADO FINAL");
            $this->vista->mostrarbus($bus);
        }
    }
}