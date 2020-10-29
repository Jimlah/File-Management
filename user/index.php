<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    if (isset($_GET['sent_id'])) {

        $reason = "Request Access";
        $sent_id = $_GET['sent_id'];
        $file_id = $_GET['file_id'];
        $recieve_id = $_GET['receive_id'];

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
                                // $dt = json_decode($dt);
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
                                        ?>

                                        <?= ($value->status == 'private' & $_SESSION['id'] != $value->user_id & $acc != '["accept"]') ? '<td><a href="index.php?sent_id=' . $_SESSION['id'] . '&receive_id=' . $value->user_id . '&file_id=' . $value->id . '" class="align-self-center ml-3" data-toggle="tooltip" data-placement="top" title="Click to Send Request"><img src="../images/paper-airplane.svg" /></a></td>' : '<td><a href="../document/<?php echo $value->name ?>"
                                class="align-self-center ml-3" download data-toggle="tooltip" data-placement="top" title="Click To Download">
                                <img src="../images/download.svg" />
                                </a></td>' ?>


                                    </li>


                                <?php } ?>

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