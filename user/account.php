<?php
session_start();

require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    if (isset($_POST['edit'])) {

        $id = $_SESSION['id'];
        $column = $_POST['column'];
        $input = $_POST['input'];
        $data->editProfile($id, $column, $input);
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <?php
    require_once "includes/header.php";
    ?>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Lato:400,700);

        .profile {
            font-family: 'Lato', 'sans-serif';
        }

        .profile {
            /*    height: 321px;
    width: 265px;*/
            margin-top: 2px;
            padding: 1px;
            display: inline-block;
        }

        .divider {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .emphasis {
            border-top: 1px solid transparent;
        }

        .emphasis h2 {
            margin-bottom: 0;
        }

        span.tags {
            background: #1abc9c;
            border-radius: 2px;
            color: #f5f5f5;
            font-weight: bold;
            padding: 2px 4px;
        }

        .profile strong,
        span,
        div {
            text-transform: initial;
        }
    </style>

    <body>

        <?php

        require_once "includes/navbar.php";



        require_once "includes/topbar.php";



        ?>



        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-sm-12 ">



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-radius: 16px;">
                        <div class="well profile col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <figure>
                                    <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle" style="width:75px;" id="user-img">
                                </figure>
                                <h5 style="text-align:center;"><strong id="user-name"><?= $data->getSingleUser($_SESSION['id'])->name ?></strong> <a href="" id="name" class="align-self-center ml-3" data-toggle="modal" data-target="#edit"><img src="../images/pencil.svg" alt=""></a></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid">
                                    <?= $data->getSingleUser($_SESSION['id'])->username ?> <a href="" id="username" class="align-self-center ml-3" data-toggle="modal" data-target="#edit"><img src="../images/pencil.svg" alt=""></a></p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email">
                                    <?= $data->getSingleUser($_SESSION['id'])->email ?> <a href="" id='email' class="align-self-center ml-3" data-toggle="modal" data-target="#edit"><img src="../images/pencil.svg" alt=""></a></p>
                                <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                <p style="text-align:center;font-size: smaller;"><strong>Password</strong></p>
                                <p style="text-align:center;font-size: smaller;" id="user-role">******************<a href="" id="password" class="align-self-center ml-3" data-toggle="modal" data-target="#edit"><img src="../images/pencil.svg" alt=""></a></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                <div class="row">
                                    <div class="col-lg-6" style="text-align:center;overflow-wrap: break-word;">
                                        <h4>
                                            <p style="text-align: center;"><strong id="user-globe-rank"> <?php
                                                                                                            $dt = $data->getAllFiles();
                                                                                                            $dt = json_decode($dt);
                                                                                                            $cnt = 0;
                                                                                                            foreach ($dt as $value) {
                                                                                                                
                                                                                                                if ($_SESSION['id'] == $value->user_id) {
                                                                                                                    $cnt++;
                                                                                                                    
                                                                                                                }
                                                                                                            }
                                                                                                            echo $cnt;
                                                                                                            ?>
                                                </strong></p>
                                        </h4>
                                        <p><small class="label label-success">Number of Uploads</small></p>
                                        <!--<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
                                    </div>
                                    <div class=" col-lg-6" style="text-align:center;overflow-wrap: break-word;">
                                        <h4>
                                            <p style="text-align: center;"><strong id="user-college-rank"><?= count(json_decode($data->getRequest($_SESSION['id']))) ?>
                                                </strong></p>
                                        </h4>
                                        <p> <small class="label label-warning">Number of Requests</small></p>
                                        <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Send Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Default form request -->
                                <form class=" modal-bodytext-center border border-light p-5" action="account.php" method="POST">

                                    <p class="h4 mb-4">Edit</p>

                                    <div class="md-form">
                                        <input type="text" id="defaultRegisterFormFirstName namevalue" class="form-control" name="input" value="">
                                    </div>

                                    <input type="text" name="column" value="" id="column" hidden>



                                    <!-- Sign in button -->
                                    <button class="btn btn-secondary btn-block my-4" type="submit" name='edit'>Send</button>

                                </form>
                                <!-- Default form register -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#name').click(function() {
                                $('#namevalue').val('<?= $data->getSingleUser($_SESSION['id'])->name ?>');
                                $('#column').val('name');
                            });

                            $('#username').click(function() {
                                $('#namevalue').val('<?= $data->getSingleUser($_SESSION['id'])->username ?>');
                                $('#column').val('username');
                            });

                            $('#email').click(function() {
                                $('#namevalue').val('<?= $data->getSingleUser($_SESSION['id'])->email ?>');
                                $('#column').val('email');
                            });

                            $('#password').click(function() {
                                $('#namevalue').val('<?= $data->getSingleUser($_SESSION['id'])->password ?>');
                                $('#column').val('password');
                            });
                        });
                    </script>

                </div>
            </div>
        </div>




        </div>




        </div>
        </div>
        </div>

        <?php
        require_once "includes/footer.php";
        ?>

    </body>

    </html>
<?php
} ?>