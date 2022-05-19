<?php

    class MvcControlador{

        public function pagina(){
            
            include "vista/principal.php";
        }

        public function enlacesPaginasControlador(){

            if(isset($_GET['action'])){
                
                $enlace = $_GET['action'];
            }

            else{

                $enlace = "index";

            }
            
            $respuesta = Paginas::enlacesPaginasModelo($enlace);

            include $respuesta;
        }

        public function registroCatalogoControlador(){

                $datosControlador = array(  "titulo"=>$_POST['titulo'],
                                            "autor"=>$_POST['autor'],
                                            "portada"=>$_POST['portada'],
                                            "categoria"=>$_POST['categoria'],
                                        );
                $respuesta = Datos::registroCatalogoModelo($datosControlador,"libros");
                //var_dump($datosControlador);

        }

        public function registroCategoriaControlador(){

            $datosControlador = array(  "categoria"=>$_POST['categoria'],
                                    );
            $respuesta = Datos::registroCategoriaModelo($datosControlador,"categorias");
            //var_dump($datosControlador);

    }

        public function vistaCategoriaControlador(){
            $respuesta = Datos::vistaCategoriaModelo("categorias");

            foreach($respuesta as $row => $item){
                
                echo    
                    '<div class="modal fade" id="ModalEditarCategoria'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="oculto" id="mod_id'.$item["id"].'" value="'.$item["id"].'"/>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="categoria">Categoría</label>
                                            <input type="text" class="form-control" name="titulo" id="categoria'.$item["id"].'" placeholder="Categoría" value="'.$item["categoria"].'"/>
                                        </div>
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" 
                                    onclick="editar_categoria('.$item["id"].');" >Actualizar Categoría</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="modal fade" id="ModalEliminarCategoria'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="oculto" id="mod_del_id'.$item["id"].'" value="'.$item["id"].'"/>
                                        ¿ Desea eliminar la categoría '.$item["id"].': '.$item["categoria"].' ?
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" 
                                    onclick="eliminar_categoria('.$item["id"].');" >Eliminar Categoría</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    
                    <tr>
                        <td>'.utf8_encode($item["categoria"]).'</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEditarCategoria'.$item["id"].'">
                              Editar
                            </button>
                        </td>
                        <td>
                            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarCategoria'.$item["id"].'">Eliminar</a>
                        </td>
                    
                    </tr>';
            }

        }

        public function vistaCatalogoControlador(){

            $respuesta = Datos::vistaCatalogoModelo("libros");
            $respuestacat = Datos::vistaCategoriaModelo("categorias");

            foreach($respuesta as $row => $item){
                
                echo    
                    '<div class="modal fade" id="exampleModal'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Libro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="oculto" id="mod_id'.$item["id"].'" value="'.$item["id"].'"/>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo'.$item["id"].'" placeholder="Título del Libro" value="'.$item["titulo"].'"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="autor">Autor</label>
                                            <input type="text" class="form-control" id="autor'.$item["id"].'" placeholder="Autor" value="'.$item["autor"].'"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="portada">Portada</label>
                                            <input type="text" class="form-control" id="portada'.$item["id"].'" placeholder="Portada" value="'.$item["portada"].'"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="categoria">Categoría</label>
                                            <select class="form-control" id="categoria'.$item["id"].'">';
                                                foreach($respuestacat as $rowcat => $itemcat){
                                                    echo'
                                                <option value="'.$itemcat["categoria"].'">'.$itemcat["categoria"].'</option>
                                                ';
                                                }
                                                echo'
                                            </select>
                                            <!--<input type="text" class="form-control" id="categoria'.$item["id"].'" placeholder="Categoría" value="'.$item["categoria"].'"/>-->
                                        </div>
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" 
                                    onclick="editar_catalogo('.$item["id"].');" >Actualizar Libro</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="modal fade" id="ModalEliminar'.$item["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Libro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="oculto" id="mod_del_id'.$item["id"].'" value="'.$item["id"].'"/>
                                        ¿ Desea eliminar el libro '.$item["id"].': '.$item["titulo"].' ?
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" 
                                    onclick="eliminar_catalogo('.$item["id"].');" >Eliminar Libro</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    
                    <tr>
                        <td>'.utf8_encode($item["titulo"]).'</td>
                        <td>'.utf8_encode($item["autor"]).'</td>
                        <td class="tdimg"><img class="w70" src="'.$item['portada'].'" /></td>
                        <td>'.utf8_encode($item["categoria"]).'</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$item["id"].'">
                              Editar
                            </button>
                        </td>
                        <td>
                            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminar'.$item["id"].'">Eliminar</a>
                        </td>
                    
                    </tr>';
            }
        }
        public function vistaNuevoCatalogoControlador(){ 
            $respuestacat = Datos::vistaCategoriaModelo("categorias");   
            echo    
                    '<div class="modal fade" id="RegistroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Libro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="titulo">Titulo</label>
                                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="autor">Autor</label>
                                            <input rows="5" type="text" class="form-control" id="autor" placeholder="Autor"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="portada">Portada</label>
                                            <input rows="5" type="text" class="form-control" id="portada" placeholder="Portada"></input>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="categoria">Categoría</label>
                                            <select class="form-control" id="categoria">';
                                                foreach($respuestacat as $rowcat => $itemcat){
                                                    echo'
                                                <option value="'.$itemcat["categoria"].'">'.$itemcat["categoria"].'</option>
                                                ';
                                                }
                                                echo'
                                            </select>
                                            <!--<input type="text" class="form-control" id="categoria" placeholder="Categoría"/>-->
                                        </div>
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" 
                                    onclick="registrar_catalogo();" >Agregar Libro</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>';
        }
        public function vistaNuevoCategoriaControlador(){    
            echo    
                    '<div class="modal fade" id="RegistroModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="categoria">Categoría</label>
                                            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoría"/>
                                        </div>
                                    </div>

                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" 
                                    onclick="registrar_categoria();" >Agregar Categoría</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>';
        }


    public function actualizarCatalogoControlador(){

        if(isset($_POST["id"])){

            $datosControlador = array( "id"=>$_POST['id'],
                                      "titulo"=>$_POST['titulo'],
                                      "autor"=>$_POST['autor'],
                                      "portada"=>$_POST['portada'],
                                      "categoria"=>$_POST['categoria'],
                                    );

            $respuesta = Datos::actualizarCatalogoModelo($datosControlador,"libros");

        }
    
    }
    public function actualizarCategoriaControlador(){
        if(isset($_POST["id"])){

            $datosControlador = array( "id"=>$_POST['id'],
                                      "categoria"=>$_POST['categoria'],
                                    );

            $respuesta = Datos::actualizarCategoriaModelo($datosControlador,"categorias");

        }
    }
    

    public function borrarCatalogoControlador(){

            $id_del_catalogo = $_POST["id_del_catalogo"];
            
            $respuesta = Datos::borrarCatalogoModelo($id_del_catalogo, "libros");

    }
    public function borrarCategoriaControlador(){

        $id_del_catalogo = $_POST["id_del_catalogo"];
        
        $respuesta = Datos::borrarCategoriaModelo($id_del_catalogo, "categorias");

    }


    }

?>