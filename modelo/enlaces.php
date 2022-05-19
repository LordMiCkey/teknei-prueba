<?php
    class Paginas{

        public function enlacesPaginasModelo($enlaces){

            if ($enlaces == "libros" || $enlaces == "categorias"){

                $modulo = "vista/modulos/".$enlaces.".php";
                
            }
            else if($enlaces == "index"){

                $modulo =  "vista/modulos/libros.php";
            
            }
            
            
            return $modulo;
            

        }
    }
?>