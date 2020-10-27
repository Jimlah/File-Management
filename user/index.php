<?php
require('../public/config/config.php');

$data = new Database;

// if (strlen($_SESSION['id']) == 0) {
//     header('location:../index.php');
// } else {}

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


                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">

                            <?php
                            $dt = $data->getAllFiles();
                            $dt = json_decode($dt);
                            foreach ($dt as $value) {
                            ?>

                                <li class="media shadow p-3 mb-5 bg-white rounded" style>
                                    <img src="..." class="align-self-center mr-3" alt="...">
                                    <div class="media-body">
                                        <p><?php echo $value->name ?><strong><?php echo $value->date ?></strong></p>
                                        <p>By: <?php echo $value->user_id . '   <em>' . $value->status ?></em> <img src="<?php echo ($value->status == 'private')? '../images/lock.svg' : '../images/unlock.svg' ?>" />
                                    </div>
                                    <a href="#" class="align-self-center ml-3">

                                        <img src="../images/download.svg" />

                                    </a>
                                    <a href="#" class="align-self-center ml-3">

                                        <img src="../images/paper-airplane.svg" />

                                    </a>

                                    <a href="#" class="align-self-center ml-3">

                                        <img src="../images/trashcan.svg" />

                                    </a>
                                </li>
                            <?php
                            } ?>

                            
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
    require_once "includes/footer.php";
    ?>

    <script>

    </script>

</body>

</html>