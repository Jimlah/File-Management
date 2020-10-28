<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    if (isset($_GET['reply'])) {

        $id = $_GET['id'];
        $reply = $_GET['reply'];

        $data->sendReply($id, $reply);
        header('location:request.php');
    }

    if (isset($_GET['del'])) {

        $id = $_GET['id'];
        $table = $_GET['del'];

        $data->delete($id, $table);
        header('location:request.php');
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
                                <th>File Name</th>
                                <th>Reason</th>
                                <th>Sender</th>
                                <th>Reply</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $rq = $data->getRequest($_SESSION['id']);
                            // $rq = json_decode($rq);
                            $cnt = 1;
                            foreach ($rq as $value) {
                            ?>
                                <tr>
                                    <td><?= $cnt ?></td>
                                    <td><?= $data->getSingleFile($value->file_id)->name ?></td>
                                    <td><?= $value->reason ?></td>
                                    <td><?= $data->getSingleUser($value->sent_id)->name ?></td>
                                    <td><?= (!$value->reply) ? 'Pending' : $value->reply ?></td>
                                    <td><?= (!$value->reply) ? 'Pending' : 'sent' ?></td>
                                    <td><?= date("Y-m-d", strtotime($value->date)) ?></td>
                                    <?= $value->receive_id == $_SESSION['id']? '<td><a href="request.php?reply=accept&id='. $value->id.'" class="align-self-center ml-3"><img src="../images/reply.svg" alt="reply" /></a></td>': '<td><a href="request.php?del=request&id=' . $value->id . '" class="align-self-center ml-3" ><img src="../images/x.svg" alt="reply" /></a></td>'?>
                                    

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