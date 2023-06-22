<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "app/views/sections/css.php"; ?>
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/avatar.jpg" type="image/x-icon">
    <title>..::BookStore::..</title>
</head>
<body>
    <div class="container">
        <!--Todos los elementos del encabezado-->
        <section id="encabezado">
            <?php include_once "app/views/sections/header.php"; ?>
        </section>
        <!--Opciones de menu-->
        <section id="menu">
            <?php include_once "app/views/sections/menu.php"; ?>
        </section>
        <!-- Todos los elementos que varian-->
        <section id="contenido">
            <!-- listado de libros -->
            <div id="contentList" class="mt-3">
                <h4>
                    <i class="bi bi-book-half"></i>
                    Libros
                    <button type="button" class="btn btn-success float-end" id="btnAgregar">
                        <i class="bi bi-plus-circle"></i>
                        Agregar Libro
                    </button>
                </h4>
                <hr>
                <!-- Cuadro de busqueda -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control"  aria-describedby="basic-addon2" id="txtSearch">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                        </div>
                    </div>
                </div>
                <!-- Fin de cuadro de busqueda -->
                <!-- Inicio de la tabla-->
                    <div id="contentTable">
                        <table class="table">
                            <thead class="table-dark">
                                <th>Código</th>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th>Categoría</th>
                                <th>Autor</th>
                                <th>Fecha publicacion</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>100 años de soledad</td>
                                <td>Es una novela</td>
                                <td>Fantastica</td>
                                <td>Jose Gabriel Garcia Marquez</td>
                                <td>25-09-1980</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                <!-- Fin de la tabla -->
                <!--Paginacion -->
                <div class="row">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Fin de paginacion -->
            </div>
            <!-- Fin del listado de libros -->
            <!--Incio de formulario de libros -->
            <div id="contentForm" class="mt-3 d-none">
                <h4>
                    <i class="bi bi-book-half"></i>
                    Libros
                </h4>
                <hr>
                <form id="formLibro" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="titulo" class="col-sm-2 col-form-label">Titulo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                            <input type="hidden" name="id_libro" id="id_libro" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha_publicacion" class="col-sm-2 col-form-label">Fecha de publicacion:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                        <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_cate" class="col-sm-2 col-form-label">Categoría:</label>
                        <div class="col-sm-10">
                            <select name="id_cate" id="id_cate" class="form-select">
                                <option value="Terror">Terror</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_autor" class="col-sm-2 col-form-label">Autor:</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="id_autor" id="id_autor">
                                
                            </select>
                        </div>
                    </div>
                    <!-- Foto pequeña -->
                    <div class="row mb-3">
                        <label for="fotop" class="col-sm-2 col-form-label">Foto pequeña:</label>
                        <div class="col-sm-10">
                            <div class="img-thumbnail" id="divfotop" style="width:200px; height:200px">

                            </div>
                            <span>
                                Haga click para seleccionar la foto
                            </span>
                            <input type="file" name="fotop" id="fotop" class="d-none">
                        </div>
                    </div>
                    <!-- Foto mediana -->
                    <div class="row mb-3">
                        <label for="fotom" class="col-sm-2 col-form-label">Foto mediana:</label>
                        <div class="col-sm-10">
                            <div class="img-thumbnail" id="divfotom" style="width:200px; height:200px">

                            </div>
                            <span>
                                Haga click para seleccionar la foto
                            </span>
                            <input type="file" name="fotom" id="fotom" class="d-none">
                        </div>
                    </div>
                    <!-- Foto grande -->
                    <div class="row mb-3">
                        <label for="fotog" class="col-sm-2 col-form-label">Foto grande:</label>
                        <div class="col-sm-10">
                            <div class="img-thumbnail" id="divfotog" style="width:200px; height:200px">

                            </div>
                            <span>
                                Haga click para seleccionar la foto
                            </span>
                            <input type="file" name="fotog" id="fotog" class="d-none">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Guardar</button>
                </form>
            </div>
            <!--Fin de formulario de libros -->
        </section>
    <!--Todos los elementos del pie del sitio-->
        <section id="pie">
            <?php include_once "app/views/sections/footer.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/libros.js"></script>
</body>
</html>