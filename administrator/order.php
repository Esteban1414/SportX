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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

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

<body>
    <main id="main" class="main-prod">
        <h1>Orders List</h1>
        <br>
        <div>
            <button type="submit" data-toggle="modal" data-target="#addorder" class="btn btn-primary">Add Order <i class="bi bi-upload"></i></button>

            <button type="submit" data-toggle="modal" data-target="#totalorders" class="btn btn-success">Total Orders <i class="bi bi-clipboard-data"></i></button>

            <button type="submit" data-toggle="modal" data-target="#activitylog" class="btn btn-dark">Activity Log <i class="bi bi-file-earmark-text-fill"></i></button>

            <a target="_blank" href="./function/pdf_order_product.php" class="btn btn-danger"><b>PDF <i class="bi bi-filetype-pdf"></i></b></a>

        </div>
        <br>

        <div class="content">
            <div class="container-fluid products-container">
                <form class="d-flex">
                    <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Search orders">
                    <hr>
                </form>
            </div>
            <br>

            <table id="adm" class="table table-striped table_id ">
                <thead align="center" class="thead-dark">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Unit Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Creation Date</th>
                        <?php if ($row["role_name"] == 'Administrator' or $row["role_name"] == 'Editor' && $row["access_level"] < 3) { ?>
                            <th scope="col">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                $sql = $conne->prepare("SELECT * FROM product_orders ORDER BY id_order");
                $sql->execute();
                $order = $sql;
                foreach ($order as $order_loop) {
                    $order_array = $order_loop['id_order'] . ',' . $order_loop['id_product'] . ',' . $order_loop['quantity'] . ',' . $order_loop['status'] . ',' . $order_loop['date'];
                ?>
                    <?php if ($order_loop['status'] == 1) { ?>
                        <tbody align="center">
                            <tr>
                                <td><?php echo $order_loop['id_order'] ?></td>
                                <td><?php echo $order_loop['id_product'] ?></td>
                                <td><?php echo $order_loop['quantity'] ?></td>
                                <td>Pending</td>
                                <td><?php echo $order_loop['date'] ?></td>

                                <?php if ($row["role_name"] == 'Administrator' or $row["role_name"] == 'Editor' && $row["access_level"] < 3) { ?>
                                    <td>
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modstock" onclick="mod_stock('<?php echo $order_array ?>')"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                <?php } ?>

                            </tr>
                        </tbody>
                    <?php } ?>
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
                            <table id="log_orders" class="display" style="width:100%"></table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------TOTAL ORDERS--------------------------------------- -->
            <div class="modal fade" id="totalorders" tabindex="-1" role="dialog">
            <a data-controls-modal="totalorders" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Total Orders</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="orders" class="display" style="width:100%"></table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- --------------------------------ADD ORDER--------------------------------------- -->
            <div class="modal fade" id="addorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a data-controls-modal="addorder" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_order" method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label class="form-label">Search Product: </label>
                                        <select id="add_name" name="add_name" style="width: 200px;" class="form-select form-control">
                                            <option value="" selected disabled hidden>Select a Product</option>
                                        </select>
                                        <br>

                                        <label for="recipient-name" class="col-form-label">Quantity:</label>
                                        <input type="number" min="5" class="form-control" id="add_quantity" name="add_quantity" oninput="validateQuantity()">

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

            <!-- --------------------------------STATUS ORDER--------------------------------------- -->
            <div class="modal fade" id="modstock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a data-controls-modal="modstock" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Product State</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="mod_stock">

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">ID Order:</label>
                                        <input type="text" readonly id="order_status" name="order_status" class="form-control">

                                        <label for="recipient-name" class="col-form-label">ID Product:</label>
                                        <input type="text" readonly id="product_status" name="product_status" class="form-control">

                                        <label for="recipient-name" class="col-form-label">Quantity:</label>
                                        <input type="text" readonly id="quantity_status" name="quantity_status" class="form-control">

                                        <label class="form-label">Status:</label>
                                        <select name="status" id="status" class="form-select form-control product-type-select">
                                            <option value="2">Received</option>
                                            <option value="0">Deniend</option>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="accept" class="btn btn-primary">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php
        include "template/pie.php"
        ?>
    </main>
    <script type="text/javascript" src="../JS/order_function.js"></script>
    <script type="text/javascript">
        const header = document.getElementById('header');
        const mainContent = document.getElementById('main');
        // const mediaQuery1 = window.matchMedia("(min-width: 1698px)");

        // Crear una variable con el tamaño de pantalla
        const screenWidth = window.innerWidth;


        header.addEventListener('mouseover', () => {
            mainContent.style.width = '83%';
            mainContent.style.marginLeft = '16%';
        });



        header.addEventListener('mouseout', () => {
            mainContent.style.width = '';
            mainContent.style.marginLeft = '';
        });

        configurarModal('#addorder', 'add_name', 'add_quantity', 'add_provider');
    </script>
    <script>
    function validateQuantity() {
        var quantityInput = document.getElementById("add_quantity");
        var enteredValue = parseInt(quantityInput.value);

        if (isNaN(enteredValue) || enteredValue < 5) {
            quantityInput.value = 5;
        }
    }
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#add_name').select2({
                ajax: {
                    url: 'ajax/get_products.php',
                    dataType: 'json',
                    delay: 10000,
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

            $('#add_name').on('select2:select', function(e) {
                var data = e.params.data;
                console.log('Selected Product:', data);

                $('.select2-results__option').show();
            });

            $('#add_name').on('select2:open', function(e) {
                var searchBox = $('.select2-search__field');
                searchBox.on('input', function() {
                    var searchText = searchBox.val().toLowerCase();

                    $('.select2-results__option').each(function() {
                        var optionText = $(this).text().toLowerCase();
                        if (optionText.includes(searchText)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            // DataTable initialization with AJAX
            var table = $('#log_orders').DataTable({
                "ajax": "ajax/log/order_ajax.php?table=activity_log_orders",
                "columns": [{
                        title: 'User ID',
                        "data": "id_user"
                    },
                    {
                        title: 'Order ID',
                        "data": "id_order"
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
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // DataTable initialization with AJAX
            var table = $('#orders').DataTable({
                "ajax": "ajax/log/total_orders.php?table=orders",
                "columns": [{
                        title: 'Order ID',
                        "data": "id_order"
                    },
                    {
                        title: 'User ID',
                        "data": "id_user"
                    },
                    {
                        title: 'Provider ID',
                        "data": "id_provider"
                    }
                ]
            });
        });
    </script>
