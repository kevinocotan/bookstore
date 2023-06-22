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
            <!-- listado de Categorias -->
            <div id="contentList" class="mt-3">
                <h4>
                    <i class="bi bi-bookmarks-fill"></i>
                    Categorías
                    <button type="button" class="btn btn-success float-end" id="btnAgregar">
                        <i class="bi bi-plus-circle"></i>
                        Agregar Categorías
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
                                <th>Nombre de la Categoría</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>Drama y Terror</td>
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
            <!-- Fin del listado de Categorias -->
            <!--Incio de formulario de Categorias -->
            <div id="contentForm" class="mt-3 d-none">
                <h4>
                    <i class="bi bi-bookmarks-fill"></i>
                    Categorías
                </h4>
                <hr>
                <form id="formCategoria" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoría:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                            <input type="hidden" name="id_cate" id="id_cate" value="0">
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="btnCancelar"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd"></i> Guardar</button>
                </form>
            </div>
            <!--Fin de formulario de Categorias -->
        </section>
    <!--Todos los elementos del pie del sitio-->
        <section id="pie">
            <?php include_once "app/views/sections/footer.php"; ?>
        </section>
    </div>
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/categorias.js"></script>
</body>
</html>