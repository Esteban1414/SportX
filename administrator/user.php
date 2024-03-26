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
    .main-user {
        margin-top: 90px;
    }

    /* Increase the height of the modal body */
    .modal-body {
        max-height: calc(100vh - 210px);
        overflow-y: auto;
    }
</style>

<body class="body-content ">
    <main id="main" class="main-user">
        <h1>Users List</h1>
        <br>
        <div>
            <?php if ($row["role_name"] == "Administrator" && $row["access_level"] == 1) { ?>
                <button type="submit" data-toggle="modal" data-target="#adduser" class="btn btn-primary">Add User:<i class="bi bi-person-fill-add"></i></button>
            <?php } ?>

            <a class="btn btn-secondary" href="../config/logout.php">Log Out <i class="bi bi-power"></i>
            </a>
            <a target="_blank" href="./function/pdf_user.php" class="btn btn-danger"><b>PDF <i class="bi bi-filetype-pdf"></i></b></a>
        </div>
        <br>

        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Search users">
                <hr>
            </form>
        </div>
        <br>

        <table id="adm" class="table table-striped table_id ">
            <thead class="thead-dark">
                <tr>
                    <th hidden scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Modify</th>
                    <?php if ($row["role_name"] == "Administrator" && $row["access_level"] == 1) { ?>
                        <th scope="col">Delete</th>
                    <?php } ?>
                </tr>
            </thead>
            <?php
            $sql = $conne->prepare("SELECT * FROM users WHERE role_name != 'Administrator' and status = 1 ORDER BY name");
            $sql->execute();
            $user = $sql;
            foreach ($user as $user_loop) {
                $users_array = $user_loop['id_user'] . ',' . $user_loop['name'] . ',' . $user_loop['employee_key'] . ',' . $user_loop['email'] . ',' . $user_loop['phone_number'] . ',' . $user_loop['role_name'] . ',' . $user_loop['access_level'];
                $name = $user_loop["name"];
                $name = explode(' ', $name);
                $firstname = $name[0];
                $lastname = $user_loop["lastname"];
                $lastname = explode(' ', $lastname);
                $firstlastname = $lastname[0];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $firstname . ' ' . $firstlastname ?></td>
                        <td><?php echo $user_loop['employee_key'] ?></td>
                        <td><?php echo $user_loop['email'] ?></td>
                        <td><?php echo $user_loop['phone_number'] ?></td>
                        <td>
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modifyuser" onclick="modify_user('<?php echo $users_array ?>')"><i class="bi bi-person-fill-gear"></i></button>
                        </td>
                        <?php if ($row["role_name"] == "Administrator") { ?>
                            <td>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser" onclick="delete_user('<?php echo $users_array ?>')"><i class="bi bi-person-fill-down"></i></button>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

        <!-- --------------------------------ADD USER--------------------------------------- -->
        <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="adduser" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_user" method="post">

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" name="add_name" id="add_name">

                                    <label for="recipient-name" class="col-form-label">Lastame:</label>
                                    <input type="text" class="form-control" name="add_lastname" id="add_lastname">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" name="add_email" id="add_email">

                                    <label for="recipient-name" class="col-form-label">Birthdate:</label>
                                    <input type="date" min="1950-01-01" max="2005-12-31" class="form-control" name="add_bday" id="add_bday">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="text" maxlength="10" class="form-control" name="add_pnumber" id="add_pnumber">
                                    <p id="invalidpnumber"></p>

                                    <label class="form-label">Role:</label>
                                    <select name="add_role" id="add_role" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM role");
                                        $sql->execute();
                                        $role = $sql;
                                        foreach ($role as $role_loop) {  ?>
                                            <option value="<?php echo $role_loop["role_name"]; ?>"><?php echo $role_loop["role_name"]; ?></option>
                                        <?php } ?>
                                    </select>

                                    <label class="form-label">Access Level</label>
                                    <select name="add_permission" id="add_permission" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM permission");
                                        $sql->execute();
                                        $permissions = $sql;
                                        foreach ($permissions as $permissions_loop) {  ?>
                                            <option value="<?php echo $permissions_loop["id_permission"]; ?>"><?php echo $permissions_loop["access_level"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="add" class="btn btn-primary">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- --------------------------------MODIFY USER--------------------------------------- -->
        <div class="modal fade" id="modifyuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="modifyuser" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modify User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="user_data">

                                <div class="mb-3">
                                    <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                    <input hidden type="text" readonly id="mod_id_user" name="mod_id_user" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Employee_key:</label>
                                    <input type="text" readonly id="mod_empkey" name="mod_empkey" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" id="mod_email" name="mod_email" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="text" maxlength="10" id="mod_pnumber" name="mod_pnumber" class="form-control">
                                    <p id="invalidpnumber2"></p>
                                </div>

                                <?php if ($row["role_name"] == "Editor" && $row["access_level"] == 2) { ?>
                                    <label hidden class="form-label">Role:</label>
                                    <select hidden name="mod_role" id="mod_role" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM role");
                                        $sql->execute();
                                        $role = $sql;
                                        foreach ($role as $role_loop) {  ?>
                                            <option value="<?php echo $role_loop["role_name"]; ?>"><?php echo $role_loop["role_name"]; ?></option>
                                        <?php } ?>
                                    </select>

                                    <label hidden class="form-label">Permissions:</label>
                                    <select hidden name="mod_permission" id="mod_permission" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM permission");
                                        $sql->execute();
                                        $permissions = $sql;
                                        foreach ($permissions as $permissions_loop) {  ?>
                                            <option value="<?php echo $permissions_loop["id_permission"]; ?>"><?php echo $permissions_loop["access_level"]; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } elseif ($row["role_name"] == "Administrator" && $row["access_level"] == 1) { ?>
                                    <label class="form-label">Role:</label>
                                    <select name="mod_role" id="mod_role" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM role");
                                        $sql->execute();
                                        $role = $sql;
                                        foreach ($role as $role_loop) {  ?>
                                            <option value="<?php echo $role_loop["role_name"]; ?>"><?php echo $role_loop["role_name"]; ?></option>
                                        <?php } ?>
                                    </select>

                                    <label class="form-label">Permissions:</label>
                                    <select name="mod_permission" id="mod_permission" class="form-select form-control">
                                        <?php
                                        $sql = $conne->prepare("SELECT * FROM permission");
                                        $sql->execute();
                                        $permissions = $sql;
                                        foreach ($permissions as $permissions_loop) {  ?>
                                            <option value="<?php echo $permissions_loop["id_permission"]; ?>"><?php echo $permissions_loop["access_level"]; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="modify" class="btn btn-warning">Modify</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

        <!-- --------------------------------DELETE USER--------------------------------------- -->
        <div class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="deleteuser" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this user?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="delete_user">

                                <div class="mb-3">
                                    <label hidden for="recipient-name" class="col-form-label">ID:</label>
                                    <input hidden type="text" readonly id="del_id_user" name="del_id_user" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" readonly id="del_name" name="del_name" class="form-control">


                                    <label for="recipient-name" class="col-form-label">Employee_key:</label>
                                    <input type="text" readonly id="del_empkey" name="del_empkey" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="text" readonly id="del_email" name="del_email" class="form-control">

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
    <script type="text/javascript" src="../JS/user_function.js"></script>
    <script type="text/javascript">
        modal_add_pnumber = document.querySelector('#add_user');
        modal_mod_pnumber = document.querySelector('#user_data');
        validarCampoNumerico(modal_add_pnumber.add_pnumber);
        validarCampoNumerico(modal_mod_pnumber.mod_pnumber);

        miFormulario = document.querySelector('#add_user');
        validarCampoTexto(miFormulario.add_name);
        validarCampoTexto(miFormulario.add_lastname);

        // Para el modal de agregar
        configurarModal('#adduser', 'add_email', 'add_pnumber', '#invalidpnumber', 'add_role', 'add_permission');

        // Para el modal de modificar
        configurarModal('#modifyuser', 'mod_email', 'mod_pnumber', '#invalidpnumber2', 'mod_role', 'mod_permission');

        // Llamada para configurar el selector del modal de agregar
        sectionselect('add_role', 'add_permission');

        // Llamada para configurar el selector del modal de modificar
        sectionselect('mod_role', 'mod_permission');

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

        function sectionselect(roleId, permissionsId) {
            document.addEventListener('DOMContentLoaded', function() {
                var roleSelect = document.getElementById(roleId);
                var permiSelect = document.getElementById(permissionsId);
                roleSelect.addEventListener('change', function() {
                    var seleccion = this.value;
                    var tipoActual = permiSelect.value;
                    if (seleccion === 'Administrator') {
                        permiSelect.innerHTML = '<option value="1">Total</option>';
                    } else if (seleccion === 'Editor') {
                        permiSelect.innerHTML = '<option value="2">High</option><option value="3">Medium</option>';
                    } else if (seleccion === 'User') {
                        permiSelect.innerHTML = '<option value="4">Low</option>';
                    }

                    // Si hay un tipo seleccionado, asegúrate de que esté seleccionado
                    if (tipoActual && permiSelect.querySelector('option[value="' + tipoActual + '"]')) {
                        permiSelect.value = tipoActual;
                    }
                });

                function agregarOpcion(select, value, text) {
                    var opcion = document.createElement('option');
                    opcion.value = value;
                    opcion.text = text;
                    select.add(opcion);
                }
            });
        }
    </script>