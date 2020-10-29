<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {



    if (isset($_POST['submit'])) {
        $status = $_POST['status'];
        $user_id = $_SESSION['id'];
        echo $data->upload($status, $user_id);
        header('location:uploads.php');
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
                <div class="col-sm-8 ">


                    <div class="card">
                        <div class="card-header">
                            My Uploads
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">

                                <?php
                                $dt = $data->getAllFiles();
                                // $dt = json_decode($dt);
                                foreach ($dt as $value) {
                                    if ($_SESSION['id'] == $value->user_id) {
                                ?>

                                        <li class="media shadow p-3 mb-5 bg-white rounded" class='el' style>
                                            <img src="../images/database.svg" class="align-self-center mr-3" alt="...">
                                            <div class="media-body">
                                                <p><?php echo $value->name ?><strong><?php echo $value->date ?></strong></p>
                                                <p>By: <?php echo $data->getSingleUser($value->user_id)->name . '   <em>' . $value->status ?></em> <img src="<?php echo ($value->status == 'private') ? '../images/lock.svg' : '../images/unlock.svg' ?>" />
                                            </div>


                                            <a href="../document/<?php echo $value->name ?>" class="align-self-center ml-3" download data-toggle="tooltip" data-placement="top" title="Click To Download">
                                                <img src="../images/download.svg" />
                                            </a>

                                            <a href="#" class="align-self-center ml-3" data-toggle="modal" data-target="#delete" data-toggle="tooltip" data-placement="top" title="Click to Delete">

                                                <img src="../images/trash.svg" />

                                            </a>
                                        </li>

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
                                                        <form class="text-center" action="uploads.php" method="POST">

                                                            <h1>Do yo want to revoke Delete <?= $data->getSingleUser($value->user_id)->name ?></h1>

                                                            <input type="text" name="id" value="<?= $value->id ?>" hidden>
                                                            <input type="text" name="table" value="file" hidden>

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
                                    }
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


                <div class="col-sm-4 ">

                    <form action="uploads.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="input-group-prepend">

                                <button type="submit" name="submit" class="input-group-text" id="inputGroupFileAddon01" data-toggle="tooltip" data-placement="top" title="Click To Upload">Upload</button>

                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="uploadedFile">
                                <label class="custom-file-label" for="inputGroupFile01" id="demo">Choose file</label>
                                <p id="demo"></p>
                            </div>
                            <div class="input-group-append">
                                <a href="#" class="align-self-center ml-3">
                                    <img src="../images/lock.svg" id="tog" />
                                </a>
                            </div>
                            <input type="text" name="status" value="private" hidden>
                        </div>
                    </form>
                </div>

                <script>
                    $(document).ready(function() {
                        $('input[type="file"]').change(function(e) {
                            var fileName = e.target.files[0].name;
                            $('#demo').text(fileName);
                        });

                        $('#tog').on({
                            'click': function() {
                                var src = ($(this).attr('src') === '../images/lock.svg') ?
                                    '../images/unlock.svg' :
                                    '../images/lock.svg';
                                $(this).attr('src', src);

                                var vl = ($(this).attr('src') === '../images/lock.svg') ?
                                    'private' :
                                    'public';
                                $('input[name="status"]').val(vl);
                            }
                        });
                    });
                </script>

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
<?php
} ?>