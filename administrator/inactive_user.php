<?php
include 'template/cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportX</title>
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
        <h1>Inactive Users List</h1>
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
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
            $sql = $conne->prepare("SELECT * FROM users WHERE status = 0 ORDER BY name");
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
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#userstate" onclick="user_state('<?php echo $users_array ?>')"><i class="bi bi-person-fill-gear"></i></button>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

        <!-- --------------------------------MODIFY USER--------------------------------------- -->
        <div class="modal fade" id="userstate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <a data-controls-modal="userstate" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inactive Users</h5>
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
                                    <input type="text" readonly id="mod_email" name="mod_email" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                    <input type="text" readonly id="mod_pnumber" name="mod_pnumber" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Role:</label>
                                    <input type="text" readonly id="mod_role" name="mod_role" class="form-control">

                                    <label for="recipient-name" class="col-form-label">Permission:</label>
                                    <input type="text" readonly id="mod_permission" name="mod_permission" class="form-control">

                                    <label class="form-label">Status:</label>
                                    <select name="mod_status" id="mod_status" class="form-select form-control">
                                        <option value="1">Activate</option>
                                        <option value="0">Delete</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="accept" class="btn btn-warning">Accept</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <?php
        include "template/pie.php"
        ?>
    </main>
    <script type="text/javascript" src="../JS/inactive_user_function.js"></script>