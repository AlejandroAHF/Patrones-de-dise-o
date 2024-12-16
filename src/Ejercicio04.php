<?php
    // Interfaz que define el comportamiento de las estrategias de salida
    interface Salida {
        public function mostrar($mensaje);
    }

    // Estrategia concreta para mostrar mensajes en consola
    class SalidaConsola implements Salida {
        public function mostrar($mensaje) {
            echo "Salida por consola: $mensaje\n";
        }
    }

    // Estrategia concreta para simular salida en formato JSON
    class SalidaJSON implements Salida {
        public function mostrar($mensaje) {
            echo "Salida en formato JSON: {\"mensaje\": \"$mensaje\"}\n";
        }
    }

    // Estrategia concreta para simular guardar el mensaje en un archivo TXT
    class SalidaArchivoTXT implements Salida {
        public function mostrar($mensaje) {
            echo "Salida en archivo TXT: (Guardando...) \"$mensaje\"\n";
        }
    }

    // Contexto que utiliza una estrategia de salida
    class ContextoSalida {
        private $estrategia;

        // Se asigna la estrategia de salida en el constructor
        public function __construct(Salida $estrategia) {
            $this->estrategia = $estrategia;
        }

        // Permite cambiar dinámicamente la estrategia
        public function setEstrategia(Salida $estrategia) {
            $this->estrategia = $estrategia;
        }

        // Muestra el mensaje usando la estrategia actual
        public function mostrarMensaje($mensaje) {
            $this->estrategia->mostrar($mensaje);
        }
    }

    // Ejemplo práctico del uso del patrón Strategy

    $mensaje = "Hola, este es un mensaje";

    // Mostrar el mensaje por consola
    $consola = new SalidaConsola();
    $contexto = new ContextoSalida($consola);
    $contexto->mostrarMensaje($mensaje);

    // Cambiar la estrategia para simular salida en JSON
    $json = new SalidaJSON();
    $contexto->setEstrategia($json);
    $contexto->mostrarMensaje($mensaje);

    // Cambiar la estrategia para simular salida en archivo TXT
    $archivoTXT = new SalidaArchivoTXT();
    $contexto->setEstrategia($archivoTXT);
    $contexto->mostrarMensaje($mensaje);
?>
