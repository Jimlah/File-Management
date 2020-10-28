<?php
session_start();

require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {
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
                                <h5 style="text-align:center;"><strong id="user-name"><?= $data->getSingleUser($_SESSION['id'])->name ?></strong></h5>
                                <p style="text-align:center;font-size: smaller;" id="user-frid"><?= $data->getSingleUser($_SESSION['id'])->username ?> </p>
                                <p style="text-align:center;font-size: smaller;overflow-wrap: break-word;" id="user-email"><?= $data->getSingleUser($_SESSION['id'])->email ?> </p>
                                <p style="text-align:center;font-size: smaller;"><strong>A/C status: </strong><span class="tags" id="user-status">Active</span></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                <p style="text-align:center;font-size: smaller;"><strong>Password</strong></p>
                                <p style="text-align:center;font-size: smaller;" id="user-role">******************</p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center"></div>
                                <div class="row">
                                    <div class="col-lg-6" style="text-align:center;overflow-wrap: break-word;">
                                        <h4>
                                            <p style="text-align: center;"><strong id="user-globe-rank">245 </strong></p>
                                        </h4>
                                        <p><small class="label label-success">Number of Uploads</small></p>
                                        <!--<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
                                    </div>
                                    <div class=" col-lg-6" style="text-align:center;overflow-wrap: break-word;">
                                        <h4>
                                            <p style="text-align: center;"><strong id="user-college-rank">245 </strong></p>
                                        </h4>
                                        <p> <small class="label label-warning">Number of Requests</small></p>
                                        <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

        <script>

        </script>

    </body>

    </html>
<?php
} ?>