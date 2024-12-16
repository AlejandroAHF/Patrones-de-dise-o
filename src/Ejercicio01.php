<?php
    // Clase abstracta que define la lógica básica para un enemigo
    abstract class LogicaEnemigo {
        // Método abstracto que deben implementar las clases concretas
        abstract public function AtaqueVelocidad();
    }

    // Clase concreta que representa un enemigo tipo "Esqueleto"
    class Esqueleto extends LogicaEnemigo {
        // Implementación del método AtaqueVelocidad para Esqueleto
        public function AtaqueVelocidad() {
            echo "Se ha creado un Esqueleto".PHP_EOL; // Mensaje de creación
            echo "Ataque: 25".PHP_EOL;               // Muestra la fuerza de ataque
            echo "Velocidad: 20".PHP_EOL;            // Muestra la velocidad
        }
    }

    // Clase concreta que representa un enemigo tipo "Zombi"
    class Zombi extends LogicaEnemigo {
        // Implementación del método AtaqueVelocidad para Zombi
        public function AtaqueVelocidad() {
            echo "Se ha creado un Zombi".PHP_EOL;    // Mensaje de creación
            echo "Ataque: 50".PHP_EOL;              // Muestra la fuerza de ataque
            echo "Velocidad: 25".PHP_EOL;           // Muestra la velocidad
        }
    }

    // Clase que actúa como fábrica para la creación de enemigos
    class Monstruos {
        // Método que crea un monstruo en función del nivel de dificultad
        public function CreacionMonstruos($nivel) {
            if ($nivel == "facil") {
                // Si el nivel es fácil, se crea un Esqueleto
                return new Esqueleto();
            }
            if ($nivel == "dificil") {
                // Si el nivel es difícil, se crea un Zombi
                return new Zombi();
            } else {
                // Si el nivel no es reconocido, lanza una excepción
                throw new Exception('Nivel no reconocido');
            }
        }
    }

    // Crear una instancia de la clase Monstruos
    $monstruos = new Monstruos();

    // Crear un monstruo según el nivel de dificultad especificado
    $monstruo = $monstruos->CreacionMonstruos("facil");

    // Llamar al método AtaqueVelocidad del monstruo creado
    $monstruo->AtaqueVelocidad();
?>
