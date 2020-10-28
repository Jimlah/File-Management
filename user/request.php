<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    if (isset($_POST['reply'])) {

        $id = $_POST['id'];
        $reply = $_POST['reply'];

        $data->sendReply($id, $reply);
    }

    if (isset($_POST['delete'])) {

        $id = $_POST['id'];
        $table = $_POST['table'];

        $data->delete($id, $table);
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
                            $rq = json_decode($rq);
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
                                    <?php if ($value->receive_id == $_SESSION['id']) {
                                    ?>
                                        <td><a href="#" class="align-self-center ml-3" data-toggle="modal" data-target="#reply"><img src="../images/reply.svg" alt="reply" /></a></td>
                                    <?php
                                    } else { ?>
                                        <td><a href="#" class="align-self-center ml-3" data-toggle="modal" data-target="#delete"><img src="../images/x.svg" alt="reply" /></a></td>
                                    <?php } ?>

                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="reply" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Send Request</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!-- Default form request -->
                                            <div class="modal-bodytext-center border border-light p-5">
                                                <form class="text-center" action="request.php" method="POST">

                                                    <input type="text" name="id" value="<?= $value->id ?>" hidden>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block" name="reply" value="accept">Accept</button>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger btn-lg btn-block" name="reply" value="reject">Reject</button>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- Default form register -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Send Request</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!-- Default form request -->
                                            <div class="modal-bodytext-center border border-light p-5">
                                                <form class="text-center" action="request.php" method="POST">

                                                    <h1>Do yo want to revoke the request</h1>

                                                    <input type="text" name="id" value="<?= $value->id ?>" hidden>
                                                    <input type="text" name="table" value="request" hidden>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block" name="delete">Yes</button>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg btn-block">No</button>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- Default form register -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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