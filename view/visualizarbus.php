<?php
class visualizarbus {
    

    public function mostrarbus(bus $bus){
        echo $bus->mostrar();
    }
        public function mostrarseparador(){
        echo"<br>";
        echo str_repeat( "-",60);
        echo"<br>";
    }
    
    public function mostrartitulo($titulo){
        echo "== {$titulo} ==";
        echo"<br>";
    }

}