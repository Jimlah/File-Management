<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {



    if (isset($_GET['del'])) {

        $id = $_GET['id'];
        $table = $_GET['del'];

        $data->delete($id, $table);
        $data->deleteRequest($id);
        $data->deleteFile($id);


        header('location:user.php');
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <?php
    require_once "includes/header.php";
    ?>


    <body>

        <?php

        require_once "includes/navbar.php";



        require_once "includes/topbar.php";



        ?>


        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-12 ">





                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Sign Up Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $rq = $data->getAllUsers();
                            // $rq = json_decode($rq);
                            $cnt = 1;
                            foreach ($rq as $value) {
                            ?>
                                <tr>
                                    <td><?= $cnt ?></td>
                                    <td><?= $value->name ?></td>
                                    <td><?= $value->username ?></td>
                                    <td><?= $value->email ?></td>
                                    <td><?= date("Y-m-d", strtotime($value->date)) ?></td>

                                    <?= ($value->email == 'admin@admin.com') ? '' : '<td><a href="user.php?del=user&id='  . $value->id . ' " class="align-self-center ml-3" data-toggle="tooltip" data-placement="top" title="Click to remove access"><img src="../images/trash.svg" alt="reply" /></a></td>' ?>

                                </tr>

                            <?php
                                $cnt += 1;
                            }
                            ?>


                        </tbody>
                    </table>






                </div>
            </div>
        </div>

        <?php
        require_once "includes/footer.php";
        ?>

        <script>

        </script>

    </body>

    </html><?php
        } ?>