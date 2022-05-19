<?php

     require_once "conexion.php";

    class Datos extends Conexion{

        public function registroCatalogoModelo($datosModelo, $tabla){
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo,autor,portada,categoria) VALUES(:titulo,:autor,:portada,:categoria)");

            $stmt->bindParam(":titulo", $datosModelo["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":autor", $datosModelo["autor"], PDO::PARAM_STR);
            $stmt->bindParam(":portada", $datosModelo["portada"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $datosModelo["categoria"], PDO::PARAM_STR);

            if($stmt->execute()){

                return "success";
            }else{

                return "error";
            }

            $stmt->closeCursor();

        }

        public function registroCategoriaModelo($datosModelo, $tabla){
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(:categoria)");

            $stmt->bindParam(":categoria", $datosModelo["categoria"], PDO::PARAM_STR);

            if($stmt->execute()){

                return "success";
            }else{

                return "error";
            }

            $stmt->closeCursor();

        }

        public function vistaCatalogoModelo($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT id, titulo, autor, portada, categoria FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->closeCursor();
        }

        public function vistaCategoriaModelo($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT id, categoria FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->closeCursor();
        }

        public function actualizarCatalogoModelo($datosModelo, $tabla){

            //$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, autor= :autor, portada = :portada, categoria = :categoria WHERE id = :id");

            $stmt->bindParam(":id", $datosModelo["id"], PDO::PARAM_INT);
            $stmt->bindParam(":titulo", $datosModelo["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":autor", $datosModelo["autor"], PDO::PARAM_STR);
            $stmt->bindParam(":portada", $datosModelo["portada"], PDO::PARAM_STR);
            $stmt->bindParam(":categoria", $datosModelo["categoria"], PDO::PARAM_STR);
            
            if($stmt->execute()){
    
                return "success";
    
            }
    
            else{
    
                return "error";
    
            }
    
            $stmt->closeCursor();
    
        }

        public function actualizarCategoriaModelo($datosModelo, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

            $stmt->bindParam(":id", $datosModelo["id"], PDO::PARAM_INT);
            $stmt->bindParam(":categoria", $datosModelo["categoria"], PDO::PARAM_STR);
            
            if($stmt->execute()){
    
                return "success";
    
            }
    
            else{
    
                return "error";
    
            }
    
            $stmt->closeCursor();
        }

        


    public function borrarCatalogoModelo($datosModelo, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id_del_catalogo");
        $stmt->bindParam(":id_del_catalogo", $datosModelo, PDO::PARAM_INT);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        $stmt->closeCursor();

    }
    public function borrarCategoriaModelo($datosModelo, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id_del_catalogo");
        $stmt->bindParam(":id_del_catalogo", $datosModelo, PDO::PARAM_INT);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        $stmt->closeCursor();

    }

    }

?>