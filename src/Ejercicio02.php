<?php
    // Clase que representa Windows 7 y su manejo de archivos
    class Window7 {
        // Método para mostrar la versión de archivo compatible con Windows 7
        public function ArchivosW7() {
            echo "version de archivo window 7";
        }
    }

    // Clase que representa Windows 10 y su manejo de archivos
    class Window10 {
        // Método para mostrar la versión de archivo compatible con Windows 10
        public function ArchivosW10() {
            echo "version de archivo window 10";
        }
    }

    // Clase Adaptador que permite a Windows 10 manejar archivos de Windows 7
    class AdaptadorArchivos {
        private $window; // Referencia a un objeto de tipo Window7

        // Constructor que inicializa el adaptador con una instancia de Window7
        public function __construct(Window7 $window) {
            $this->window = $window;
        }

        // Método que simula la apertura de un archivo de Windows 7 en Windows 10
        public function ArchivosW10() {
            echo "Abriendo "; // Mensaje inicial
            $this->window->ArchivosW7(); // Llama al método de Window7 para abrir el archivo
        }
    }

    // Crear una instancia de la clase Window7
    $window7 = new Window7();

    // Crear una instancia del adaptador, pasándole la instancia de Window7
    $adaptador = new AdaptadorArchivos($window7);

    // Llamar al método ArchivosW10 del adaptador para abrir un archivo de Windows 7
    $adaptador->ArchivosW10();
?>
