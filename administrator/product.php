<?php
include 'template/cabecera.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--IMPORTANTE -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <style>
        .main-prod {
            margin-top: 10px;
        }

        /* Increase the height of the modal body */
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

        .log {
            width: 50%;
            /* Ajusta el ancho del cuadro de diálogo al 100% */
            max-width: 50%;
            /* Ajusta el ancho máximo del cuadro de diálogo al 100% */
        }
    </style>
</head>

<body>
<script>
        let timerInterval;
Swal.fire({
  title: "Cargando productos",
  html: "Espere, por favor!",
  timer: 1000,
  timerProgressBar: true,
  didOpen: (alert) => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
    // alert.style.backgroundColor = 'rgb(50, 50, 50)'; // Cambia el color de fondo a tu preferencia
    // alert.style.color = '#ffffff'; // Cambia el color del texto si es necesario
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("Productos cargados");
  }
});
    </script>    
    <main id="main" class="main-prod">
        <h1>Products List</h1>
        <br>
        <div>
            <button type="submit" data-toggle="modal" data-target="#addproduct" class="btn btn-primary">Add Product:<i class="bi bi-upload"></i></button>

            <button type="submit" data-toggle="modal" data-target="#activitylog" class="btn btn-dark">Activity Log <i class="bi bi-file-earmark-text-fill"></i></button>

        </div>
        <br>

        <div class="content">
            <div class="container-fluid products-container">
                <form class="d-flex">
                    <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Search products">
                    <hr>
                </form>
            </div>
            <br>

            <table id="adm" class="table table-striped table_id ">
                <thead class="thead-dark">
                    <tr>
                        <th hidden scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Section</th>
                        <th scope="col">Mark</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Size range</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Unity Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Modify</th>
                        <?php if ($row["role_name"] == "Administrator" || $row["role_name"] == "Editor" && $row["access_level"] < 3) { ?>
                            <th scope="col">Delete</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                $sql = $conne->prepare("SELECT * FROM products ORDER BY category,product_type");
                $sql->execute();
                $product = $sql;
                foreach ($product as $product_loop) {
                    $products_array = $product_loop['id_product'] . ',' . $product_loop['category'] . ',' . $product_loop['product_type'] . ',' . $product_loop['section'] . ',' . $product_loop['mark'] . ',' . $product_loop['name'] . ',' . $product_loop['description'] . ',' . $product_loop['size'] . ',' . $product_loop['stock'] . ',' . $product_loop['price'] . ',' . $product_loop['image'] . ',' . $product_loop['provider_key'];
                    $price = "$" . $product_loop['price'];
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $product_loop['category'] ?></td>
                            <td><?php echo $product_loop['product_type'] ?></td>
                            <td><?php echo $product_loop['section'] ?></td>
                            <td><?php echo $product_loop['mark'] ?></td>
                            <td><?php echo $product_loop['name'] ?></td>
                            <td><?php echo $product_loop['description'] ?></td>
                            <td><?php echo $product_loop['size'] ?></td>
                            <td><?php echo $product_loop['stock'] ?></td>
                            <td><?php echo $price ?></td>
                            <td>
                                <?php if ($product_loop["image"] != "") { ?>
                                    <img src="./ajax/img/<?php echo $product_loop["image"]; ?>" width="80">
                                <?php   }   ?>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modifyproduct" onclick="modify_product('<?php echo $products_array ?>')"><i class="bi bi-gear-fill"></i></button>
                            </td>
                            <?php if ($row["role_name"] == "Administrator" || $row["role_name"] == "Editor" && $row["access_level"] < 3) { ?>
                                <td>
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteproduct" onclick="delete_product('<?php echo $products_array ?>')"><i class="bi bi-trash-fill"></i></button>
                                </td>
                            <?php } ?>

                        </tr>
                    </tbody>

                <?php } ?>
            </table>
            <!-- --------------------------------ACTIVITY LOG--------------------------------------- -->
            <div class="modal fade" id="activitylog" tabindex="-1" role="dialog">
                <a data-controls-modal="activitylog" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog log" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Activity Log</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- DataTable will be displayed here -->
                                <table id="log_orders" class="display" style="width:100%"></table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- --------------------------------ADD PRODUCT--------------------------------------- -->
            <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a data-controls-modal="addproduct" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_product" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label class="form-label">Category:</label>
                                        <select name="add_category" id="add_category" class="form-select form-control">
                                            <?php
                                            $sql = $conne->prepare("SELECT * FROM category");
                                            $sql->execute();
                                            $category = $sql;
                                            foreach ($category as $category_loop) {  ?>
                                                <option value="<?php echo $category_loop["categories"]; ?>"><?php echo $category_loop["categories"]; ?></option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Product type:</label>
                                        <select name="add_type" id="add_type" class="form-select form-control product-type-select">
                                            <?php
                                            $sql = $conne->prepare("SELECT * FROM type");
                                            $sql->execute();
                                            $types = $sql;
                                            foreach ($types as $types_loop) {  ?>
                                                <option value="<?php echo $types_loop["types"]; ?>"><?php echo $types_loop["types"]; ?></option>
                                            <?php } ?>
                                        </select>

                                        <div id="add_cont_section">
                                            <label class="form-label">Section:</label>
                                            <select name="add_section" id="add_section" class="form-select form-control">
                                            </select>
                                        </div>

                                        <label for="recipient-name" class="col-form-label">Mark:</label>
                                        <input type="text" class="form-control" name="add_mark" id="add_mark">

                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" name="add_name" id="add_name">

                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <input type="text" class="form-control" name="add_description" id="add_description">

                                        <div id="add_cont_size">
                                            <label for="recipient-name" class="col-form-label">Size:</label>
                                            <input type="text" maxlength="8" class="form-control" name="add_size" id="add_size">
                                        </div>

                                        <label for="recipient-name" class="col-form-label">Price:</label>
                                        <input type="number" class="form-control" name="add_price" id="add_price">

                                        <label for="recipient-name" class="col-form-label">Stock:</label>
                                        <input type="number" min="5" oninput="validateQuantity()" class="form-control" name="add_stock" id="add_stock">

                                        <label for="recipient-name" class="col-form-label">Image:</label>
                                        <input type="file" class="form-control" name="add_image" id="add_image">

                                        <label class="form-label">Provider:</label>
                                        <select name="add_provider" id="add_provider" class="form-select form-control">
                                            <?php
                                            $sql = $conne->prepare("SELECT * FROM providers");
                                            $sql->execute();
                                            $provider = $sql;
                                            foreach ($provider as $provider_loop) {  ?>
                                                <option value="<?php echo $provider_loop["provider_key"]; ?>"><?php echo $provider_loop["name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="add" class="btn btn-primary">Add</button>

                                </form>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- --------------------------------MODIFY PRODUCT--------------------------------------- -->
            <div class="modal fade" id="modifyproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a data-controls-modal="modifyproduct" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modify Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="product_data" method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                        <input hidden type="text" required readonly id="mod_id_product" name="mod_id_product" class="form-control">

                                        <label class="form-label">Category:</label>
                                        <select name="mod_category" id="mod_category" class="form-select form-control">
                                            <?php
                                            $sql = $conne->prepare("SELECT * FROM category");
                                            $sql->execute();
                                            $category = $sql;
                                            foreach ($category as $category_loop) {  ?>
                                                <option value="<?php echo $category_loop["categories"]; ?>"><?php echo $category_loop["categories"]; ?></option>
                                            <?php } ?>
                                        </select>

                                        <label class="form-label">Product type:</label>
                                        <select name="mod_type" id="mod_type" class="form-select form-control product-type-select">
                                            <?php
                                            $sql = $conne->prepare("SELECT * FROM type");
                                            $sql->execute();
                                            $types = $sql;
                                            foreach ($types as $types_loop) {  ?>
                                                <option value="<?php echo $types_loop["types"]; ?>"><?php echo $types_loop["types"]; ?></option>
                                            <?php } ?>
                                        </select>

                                        <div id="mod_cont_section">
                                            <label class="form-label">Section:</label>
                                            <select name="mod_section" id="mod_section" class="form-select form-control">
                                            </select>
                                        </div>

                                        <label for="recipient-name" class="col-form-label">Mark:</label>
                                        <input type="text" id="mod_mark" name="mod_mark" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" id="mod_name" name="mod_name" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <input type="text" id="mod_description" name="mod_description" class="form-control">

                                        <div id="mod_cont_size">
                                            <label for="recipient-name" class="col-form-label">Size:</label>
                                            <input type="text" maxlength="8" class="form-control" name="mod_size" id="mod_size">
                                        </div>

                                        <label for="recipient-name" class="col-form-label">Stock:</label>
                                        <input type="number" min="5" oninput="validateQuantity2()" id="mod_stock" name="mod_stock" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Price:</label>
                                        <input type="number" min="1" id="mod_price" name="mod_price" class="form-control">

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Image:</label>
                                            <img id="mod_image_preview" name="mod_image_preview" src="" alt="" width="50" srcset="">
                                            <br>
                                            <label for="recipient-name" class="col-form-label">Modify image:</label>
                                            <input type="file" class="form-control" name="mod_image" id="mod_image">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="modify" class="btn btn-warning">Modify</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- --------------------------------DELETE PRODUCT--------------------------------------- -->
            <div class="modal fade" id="deleteproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a data-controls-modal="deleteproduct" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Product?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="delete_product">

                                    <div class="mb-3">
                                        <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                        <input hidden type="text" readonly id="del_id_product" name="del_id_product" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Category:</label>
                                        <input type="text" readonly id="del_category" name="del_category" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Type:</label>
                                        <input type="text" readonly id="del_type" name="del_type" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Section:</label>
                                        <input type="text" readonly id="del_section" name="del_section" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Mark:</label>
                                        <input type="text" readonly id="del_mark" name="del_mark" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" readonly id="del_name" name="del_name" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Description:</label>
                                        <input type="text" readonly id="del_description" name="del_description" class="form-control">
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
</body>
<?php include("template/pie.php") ?>

<script src="../JS/product_function.js"></script>
<script>
    const header = document.getElementById('header');
    const mainContent = document.getElementById('main');
    // const mediaQuery1 = window.matchMedia("(min-width: 1698px)");

    // Crear una variable con el tamaño de pantalla
    const screenWidth = window.innerWidth;


    header.addEventListener('mouseover', () => {
        mainContent.style.width = '85%';
        mainContent.style.marginLeft = '16%';
    });



    header.addEventListener('mouseout', () => {
        mainContent.style.width = '';
        mainContent.style.marginLeft = '';
    });

    function validateQuantity() {
        var quantityInput = document.getElementById("add_stock");
        var minValue = parseInt(quantityInput.min);
        var enteredValue = parseInt(quantityInput.value);

        if (isNaN(enteredValue) || enteredValue < minValue) {
            quantityInput.value = minValue;
        }
    }

    function validateQuantity2() {
        var quantityInput = document.getElementById("mod_stock");
        var minValue = parseInt(quantityInput.min);
        var enteredValue = parseInt(quantityInput.value);

        if (isNaN(enteredValue) || enteredValue < minValue) {
            quantityInput.value = minValue;
        }
    }
    // Para el modal de agregar
    configurarModal('#addproduct', 'add', 'add_category', 'add_type', 'add_section', 'add_mark', 'add_name', 'add_description', 'add_size', 'add_price', 'add_stock', 'add_image');
    // Para el modal de modificar
    configurarModal('#modifyproduct', 'modify', 'mod_category', 'mod_type', 'mod_section', 'mod_mark', 'mod_name', 'mod_description', 'mod_size', 'mod_price', 'mod_stock', 'mod_image');

    // Llamada para configurar el selector del modal de agregar
    configurarSelectores('add_category', 'add_type');

    // Llamada para configurar el selector del modal de modificar
    configurarSelectores('mod_category', 'mod_type');

    // Llamada para configurar el selector del modal de agregar
    sectionselect('add_type', 'add_section', 'add_cont_section', 'add_cont_size');

    // Llamada para configurar el selector del modal de modificar
    sectionselect('mod_type', 'mod_section', 'mod_cont_section', 'mod_cont_size');

    addform = document.querySelector('#add_product');
    validarCampoTexto(addform.add_mark);

    modform = document.querySelector('#product_data');
    validarCampoTexto(modform.mod_mark);
    //--------------------------------------------------------------------------------------------------------------------------------------
    function configurarSelectores(categoriaId, tipoId) {
        var categoriaSelect = document.getElementById(categoriaId);
        var productoSelect = document.getElementById(tipoId);

        categoriaSelect.addEventListener('change', function() {
            var seleccion = this.value;

            // Almacena el tipo seleccionado actual
            var tipoActual = productoSelect.value;

            // Limpia las opciones, manteniendo las opciones predeterminadas
            productoSelect.innerHTML = '<option value="Footwear">Footwear</option><option value="Accessories">Accessories</option>';

            if (seleccion === 'Soccer' || seleccion === 'Basketball') {
                agregarOpcion(productoSelect, 'Jerseys', 'Jerseys');
                agregarOpcion(productoSelect, 'Bottoms', 'Bottoms');
                agregarOpcion(productoSelect, 'Balls', 'Balls');
            } else if (seleccion === 'Tennis') {
                agregarOpcion(productoSelect, 'Clothes', 'Clothes');
                agregarOpcion(productoSelect, 'Rackets', 'Rackets');
                agregarOpcion(productoSelect, 'Balls', 'Balls');
            } else if (seleccion === 'Baseball') {
                agregarOpcion(productoSelect, 'Bats', 'Bats');
                agregarOpcion(productoSelect, 'Jerseys', 'Jerseys');
                agregarOpcion(productoSelect, 'Bottoms', 'Bottoms');
            } else if (seleccion === 'Swimming') {
                agregarOpcion(productoSelect, 'Googles', 'Googles');
                agregarOpcion(productoSelect, 'Swimsuit', 'Swimsuit');
            } else if (seleccion === 'Football') {
                agregarOpcion(productoSelect, 'Jerseys', 'Jerseys');
                agregarOpcion(productoSelect, 'Bottoms', 'Bottoms');
                agregarOpcion(productoSelect, 'Balls', 'Balls');
                agregarOpcion(productoSelect, 'Protections', 'Protections');
            }

            // Si hay un tipo seleccionado, asegúrate de que esté seleccionado
            if (tipoActual && productoSelect.querySelector('option[value="' + tipoActual + '"]')) {
                productoSelect.value = tipoActual;
            }
        });

        function agregarOpcion(select, value, text) {
            var opcion = document.createElement('option');
            opcion.value = value;
            opcion.text = text;
            select.add(opcion);
        }
    }

    function sectionselect(tipoId, sectionId, sectioncont, sizecont) {
        var productoSelect = document.getElementById(tipoId);
        var sectionSelect = document.getElementById(sectionId);

        productoSelect.addEventListener('change', function() {
            var seleccion = this.value;

            // Almacena el tipo seleccionado actual
            var tipoActual = sectionSelect.value;

            // Limpia las opciones, manteniendo las opciones predeterminadas

            if (seleccion === 'Balls' || seleccion === 'Accessories') {
                sectionSelect.innerHTML = '';

            } else if (seleccion === 'Bottoms' || seleccion === 'Clothes' || seleccion === 'Footwear' || seleccion === 'Jerseys' || seleccion === 'Swimsuit') {
                sectionSelect.innerHTML = '<option value="M">Man</option><option value="W">Woman</option><option value="K">Kids</option>';
            } else if (seleccion === 'Bats' || seleccion === 'Googles' || seleccion === 'Protections' || seleccion === 'Rackets') {
                sectionSelect.innerHTML = '<option value="A">Adults</option><option value="K">Kids</option>';
            }

            // Si hay un tipo seleccionado, asegúrate de que esté seleccionado
            if (tipoActual && sectionSelect.querySelector('option[value="' + tipoActual + '"]')) {
                sectionSelect.value = tipoActual;
            }
        });

        function agregarOpcion(select, value, text) {
            var opcion = document.createElement('option');
            opcion.value = value;
            opcion.text = text;
            select.add(opcion);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var typeSelect = document.getElementById(tipoId);
            var sectionField = document.getElementById(sectionId);
            var sizeContainer = document.getElementById(sizecont);
            var sectionContainer = document.getElementById(sectioncont);

            typeSelect.addEventListener('change', function() {
                var selectedType = this.value;

                if (selectedType === 'Balls' || selectedType === 'Accessories') {
                    sectionContainer.style.display = 'none';
                } else {
                    sectionContainer.style.display = 'block';
                }
                if (selectedType === 'Bats' || selectedType === 'Googles' || selectedType === 'Protections' || selectedType === 'Rackets' || selectedType === 'Balls' || selectedType === 'Accessories') {
                    sizeContainer.style.display = 'none';
                } else {
                    sizeContainer.style.display = 'block';
                }

            });
        });
    }
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        // DataTable initialization with AJAX
        var table = $('#log_orders').DataTable({
            "ajax": "ajax/log/product_ajax.php?table=activity_log_products",
            "columns": [{
                    title: 'User ID',
                    "data": "id_user"
                },
                {
                    title: 'Product ID',
                    "data": "id_product"
                },
                {
                    title: 'Action',
                    "data": "action"
                },
                {
                    title: 'IP address',
                    "data": "ip_address"
                },
                {
                    title: 'Date',
                    "data": "date"
                }
            ],
            "initComplete": function(settings, json) {
                // Acceder a los datos 'data' después de la inicialización completa
                var data = table.ajax.json();
                console.log("Datos en 'data':", data);
            }
        });
    });
</script>