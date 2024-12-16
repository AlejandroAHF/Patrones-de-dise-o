<?php
    // Interfaz base que define el método común para equipamiento
    interface Iequipamiento {
        public function Armas(); // Método que devuelve las armas del personaje
    }

    // Clase que representa un Ninja implementando la interfaz Iequipamiento
    class Ninja implements Iequipamiento {
        // Implementa el método Armas, inicialmente el Ninja solo usa sus manos
        public function Armas() {
            return "manos";
        }
    }

    // Clase que representa un Soldado implementando la interfaz Iequipamiento
    class Soldado implements Iequipamiento {
        // Implementa el método Armas, inicialmente el Soldado solo usa sus manos
        public function Armas() {
            return "manos";
        }
    } 

    // Clase base para decoradores que implementa la interfaz Iequipamiento
    class Equipamiento implements Iequipamiento {
        protected $armas; // Objeto que será decorado (puede ser un Ninja o Soldado)

        // Constructor que recibe un objeto que implemente Iequipamiento
        public function __construct(Iequipamiento $armas) {
            $this->armas = $armas;
        }

        // Delegación: llama al método Armas del objeto decorado
        public function Armas() {
            return $this->armas->Armas();
        }
    }

    // Decorador concreto para un Ninja con armas adicionales
    class NinjaArmado extends Equipamiento {
        // Extiende el método Armas para añadir más equipamiento
        public function Armas() {
            return $this->armas->Armas() . ", Katanas"; // El Ninja ahora tiene Katanas
        }
    }

    // Decorador concreto para un Soldado con armas adicionales
    class SoldadoArmado extends Equipamiento {
        // Extiende el método Armas para añadir más equipamiento
        public function Armas() {
            return $this->armas->Armas() . ", Fusil de asalto"; // El Soldado ahora tiene un Fusil de asalto
        }
    }

    // Crear una instancia de Ninja
    $personaje1 = new Ninja();

    // Crear una instancia de Soldado
    $personaje2 = new Soldado();

    // Decorar al Ninja para que tenga Katanas
    $personaje1armado = new NinjaArmado($personaje1);
    echo $personaje1armado->Armas() . PHP_EOL; // Salida: manos, Katanas

    // Decorar al Soldado para que tenga un Fusil de asalto
    $personaje2armado = new SoldadoArmado($personaje2);
    echo $personaje2armado->Armas(); // Salida: manos, Fusil de asalto
?>
