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

</head>

<style>
    .main-prov {
        margin-top: 90px;
    }

    /* Increase the height of the modal body */
    .modal-body {
        max-height: calc(100vh - 210px);
        overflow-y: auto;
    }
</style>

<body class="body-content">
    <main id="main" class="main-prov">
        <h1>Providers List</h1>
        <br>
        <div>
            <button type="submit" data-toggle="modal" data-target="#addprovider" class="btn btn-primary">Add Provider:<i class="bi bi-person-fill-add"></i></button>

            <a class="btn btn-secondary" href="../config/logout.php">Log Out <i class="bi bi-power"></i>
            </a>
            <a target="_blank" href="./function/pdf_provider.php" class="btn btn-danger"><b>PDF <i class="bi bi-filetype-pdf"></i></b></a>
        </div>
        <br>

        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Search providers">
                <hr>
            </form>
        </div>
        <br>

        <table id="adm" class="table table-striped table_id ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Domicile</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Modify</th>
                    <?php if ($row["role_name"] == "Administrator" || $row["role_name"] == "Editor" && $row["access_level"] < 3) { ?>
                        <th scope="col">Delete</th>
                    <?php } ?>
                </tr>
            </thead>
            <?php
            $sql = $conne->prepare("SELECT * FROM providers ORDER BY name");
            $sql->execute();
            $providers = $sql;
            foreach ($providers as $providers_loop) {
                $providers_array = $providers_loop['provider_key'] . ',' . $providers_loop['name'] . ',' . $providers_loop['lastname'] . ',' . $providers_loop['email'] . ',' . $providers_loop['domicile'] . ',' . $providers_loop['phone_number'];

                $name = $providers_loop['name'];
                $name = explode(' ', $name);
                $firstname = $name[0];
                $lastname = $providers_loop['lastname'];
                $lastname = explode(' ', $lastname);
                $firstlastname = $lastname[0];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $firstname . ' ' . $firstlastname ?></td>
                        <td><?php echo $providers_loop['email'] ?></td>
                        <td><?php echo $providers_loop['domicile'] ?></td>
                        <td><?php echo $providers_loop['phone_number'] ?></td>

                        <td>
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modifyprovider" onclick="modify_provider('<?php echo $providers_array ?>')"><i class="bi bi-person-fill-gear"></i></button>
                        </td>
                        <?php if ($row["role_name"] == "Administrator" || $row["role_name"] == "Editor" && $row["access_level"] < 3) { ?>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteprovider" onclick="delete_provider('<?php echo $providers_array ?>')"><i class="bi bi-person-fill-down"></i></button>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>

            <?php } ?>
        </table>

        <!-- --------------------------------ADD PROVIDERS--------------------------------------- -->
        <div class="modal fade" id="addprovider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="addprovider" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Provider:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_provider" method="post">
                                <div class="mb-3">

                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" name="add_name" id="add_name">

                                    <label for="recipient-name" class="col-form-label">Lastame:</label>
                                    <input type="text" class="form-control" name="add_lastname" id="add_lastname">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" name="add_email" id="add_email">

                                    <label for="recipient-name" class="col-form-label">Domicile:</label>
                                    <input type="text" class="form-control" name="add_domicile" id="add_domicile">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="text" maxlength="10" class="form-control" name="add_pnumber" id="add_pnumber">
                                    <p id="invalidpnumber"></p>

                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="add" class="btn btn-primary">ADD</button>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- --------------------------------MODIFY PROVIDERS--------------------------------------- -->

        <div class="modal fade" id="modifyprovider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="modifyprovider" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modify Provider:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="provider_data">
                                <div class="mb-3">
                                    <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                    <input hidden type="text" readonly id="mod_id_provider" name="mod_id_provider" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" id="mod_email" name="mod_email" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Domicile:</label>
                                    <input type="text" id="mod_domicile" name="mod_domicile" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="text" maxlength="10" id="mod_pnumber" name="mod_pnumber" class="form-control">
                                    <p id="invalidpnumber2"></p>
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="modify" class="btn btn-warning">Modify</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

        <!-- --------------------------------DELETE PROVIDERS--------------------------------------- -->
        <div class="modal fade" id="deleteprovider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="deleteprovider" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this provider?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="delete_provider">
                                <div class="mb-3">
                                    <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                    <input hidden type="text" readonly id="del_id_provider" name="del_id_provider" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" readonly id="del_email" name="del_email" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Domicile:</label>
                                    <input type="text" readonly id="del_domicile" name="del_domicile" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="number" readonly id="del_pnumber" name="del_pnumber" class="form-control">
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <?php
        include "template/pie.php"
        ?>
    </main>
</body>
<script type="text/javascript" src="../JS/provider_function.js"></script>
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

    modal_add_pnumber = document.querySelector('#add_provider');
    modal_mod_pnumber = document.querySelector('#provider_data');
    validarCampoNumerico(modal_add_pnumber.add_pnumber);
    validarCampoNumerico(modal_mod_pnumber.mod_pnumber);

    miFormulario = document.querySelector('#add_provider');
    validarCampoTexto(miFormulario.add_name);
    validarCampoTexto(miFormulario.add_lastname);

    // Para el modal de agregar
    configurarModal('#addprovider', 'add_email', 'add_pnumber', '#invalidpnumber');

    // Para el modal de modificar
    configurarModal('#modifyprovider', 'mod_email', 'mod_pnumber', '#invalidpnumber2');
</script>