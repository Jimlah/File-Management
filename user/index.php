<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    if (isset($_POST['request'])) {

        $reason = $_POST['reason'];
        $sent_id = $_POST['sent_id'];
        $file_id = $_POST['file_id'];
        $recieve_id = $_POST['receive_id'];

        $msg = $data->sendRequest($recieve_id, $sent_id, $file_id, $reason);

        echo $msg;

        header('location:index.php');
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <?php
    require_once "includes/header.php"; ?>


    <body>

        <?php

        require_once "includes/navbar.php";



        require_once "includes/topbar.php"; ?>



        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-12 ">


                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled" id="lr">

                                <?php
                                $dt = $data->getAllFiles();
                                $dt = json_decode($dt);
                                foreach ($dt as $value) {
                                ?>

                                    <li class="media shadow p-3 mb-5 bg-white rounded" class='el' style>
                                        <img src="../images/database.svg" class="align-self-center mr-3" alt="...">
                                        <div class="media-body">
                                            <p><?php echo $value->name ?><strong><?php echo $value->date ?></strong></p>
                                            <p>By:
                                                <?php echo $data->getSingleUser($value->user_id)->name . '   <em>     ' . $value->status ?></em>
                                                <img src="<?php echo ($value->status == 'private') ? '../images/lock.svg' : '../images/unlock.svg' ?>" />
                                        </div>

                                        <?php


                                        $accept =  json_encode($data->getRequestReply($value->id, $_SESSION['id']));
                                        $acc = (json_decode($accept));


                                        if ($value->status == 'private' & $_SESSION['id'] != $value->user_id & $acc != '["accept"]') { ?>

                                            <a href="#" class="align-self-center ml-3" data-toggle="modal" data-target="#request">
                                                <img src="../images/paper-airplane.svg" />

                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="request" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Send Request</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <!-- Default form request -->
                                                        <form class=" modal-bodytext-center border border-light p-5" action="index.php" method="POST">

                                                            <p class="h4 mb-4">Request</p>

                                                            <div class="md-form">
                                                                <textarea id="form7" class="md-textarea form-control" name='reason' rows="3"></textarea>
                                                                <label for="form7">State Your Reason</label>
                                                            </div>

                                                            <input type="text" name="sent_id" value="<?= $_SESSION['id'] ?>" hidden>
                                                            <input type="text" name="receive_id" value="<?= $value->user_id  ?>" hidden>
                                                            <input type="text" name="file_id" value="<?= $value->id ?>" hidden>



                                                            <!-- Sign in button -->
                                                            <button class="btn btn-secondary btn-block my-4" type="submit" name='request'>Send</button>

                                                        </form>
                                                        <!-- Default form register -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php

                                        } else {
                                        ?>
                                            <a href="../document/<?php echo $value->name ?>" class="align-self-center ml-3" download>
                                                <img src="../images/download.svg" />
                                            </a>
                                        <?php
                                        }
                                        ?>



                                    <?php
                                } ?>



                                    </li>




                            </ul>
                        </div>


                        <div class="card-footer text-right">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>




                    </div>




                </div>
            </div>
        </div>

        <?php
        require_once "includes/footer.php"; ?>

        <script>

        </script>

    </body>

    </html>

<?php
} ?>