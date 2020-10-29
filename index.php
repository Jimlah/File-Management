<?php
session_start();
require('./public/config/config.php');

$data = new Database;

if (isset($_POST['register'])) {

    $name = $_POST['firstname'] . ' ' .  $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    if ($data->checkMail($email, $username) == 'present') {
        $data->registerUser($name, $username, $email, $password);
        $msg = 'Successfully Registered';


        echo '<script type="text/javascript">';
        echo ' alert("working")';  //not showing an alert box.
        echo '</script>';
    } else {
        echo $data->checkMail($email, $username);
    }
}

if (isset($_POST['log_in'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['email'];

    $msg = $data->sign_in($email, $username, $password);

    echo $msg;

    header('location:user/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>File Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="jquery.twbsPagination.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <!-- Navbar  -->

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Fm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill-rule="evenodd" d="M12 2.5a5.5 5.5 0 00-3.096 10.047 9.005 9.005 0 00-5.9 8.18.75.75 0 001.5.045 7.5 7.5 0 0114.993 0 .75.75 0 101.499-.044 9.005 9.005 0 00-5.9-8.181A5.5 5.5 0 0012 2.5zM8 8a4 4 0 118 0 4 4 0 01-8 0z"></path>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sign">Sign In</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#register">Register</a>
                    </div>

                </li>
            </ul>
        </div>
    </nav>


    <!-- Top Bar -->

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>File upload And Management System</h1>
    </div>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12 ">




                <!-- Main Body -->
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">

                            <?php
                            $dt = $data->getAllFiles();
                            // $dt = json_decode($dt);
                            foreach ($dt as $value) {
                            ?>

                                <li class="media shadow p-3 mb-5 bg-white rounded" class='el' style>
                                    <img src="./images/database.svg" class="align-self-center mr-3" alt="...">
                                    <div class="media-body">
                                        <p><?php echo $value->name ?><strong><?php echo $value->date ?></strong></p>
                                        <p>By: <?php echo $data->getSingleUser($value->user_id)->name . '   <em>' . $value->status ?></em> <img src="<?php echo ($value->status == 'private') ? 'images/lock.svg' : 'images/unlock.svg' ?>" />
                                    </div>

                                    <?php

                                    if ($value->status == 'private') { ?>
                                        <a href="#" class="align-self-center ml-3" data-toggle="modal" data-target="#sign">
                                            <img src="images/paper-airplane.svg" />
                                        </a><?php
                                        } else {
                                            ?>
                                        <a href="document/<?php echo $value->name ?>" class="align-self-center ml-3" download>
                                            <img src="images/download.svg" />
                                        </a>
                                    <?php
                                        } ?>





                                    <!-- <a href="#" class="align-self-center ml-3">

                                        <img src="../images/trash.svg" />

                                    </a> -->
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


                <!-- Modal -->
                <div class="modal fade" id="sign" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Sign In</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Default form login -->
                            <form class="text-center border border-light p-5 modal-body" action="index.php" method="POST">

                                <p class="h4 mb-4">Sign in</p>

                                <!-- Email -->
                                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

                                <!-- Password -->
                                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">

                                <div class="d-flex justify-content-around">
                                    <div>
                                        <!-- Remember me -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Forgot password -->
                                        <a href="">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Sign in button -->
                                <button class="btn btn-secondary btn-block my-4" type="submit" name='log_in'>Sign
                                    in</button>

                                <!-- Register -->
                                <p>Not a member?
                                    <a href="#" data-toggle="modal" data-target="#register" data-dismiss="modal">Register</a>
                                </p>

                            </form>
                            <!-- Default form login -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Default form register -->
                            <form class=" modal-bodytext-center border border-light p-5" action="index.php" method="POST">

                                <p class="h4 mb-4">Sign up</p>

                                <div class="form-row mb-4">
                                    <div class="col">
                                        <!-- First name -->
                                        <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="firstname">
                                    </div>
                                    <div class="col">
                                        <!-- Last name -->
                                        <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="lastname">
                                    </div>
                                </div>

                                <!-- E-mail -->
                                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

                                <!-- Name -->
                                <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Username" name="username">

                                <!-- Password -->
                                <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" name="password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                    At least 8 characters and 1 digit
                                </small>

                                <!-- Sign up button -->
                                <button class="btn btn-secondary my-4 btn-block" type="submit" name="register">Register</button>

                                <hr>

                                <!-- Terms of service -->
                                <p>By clicking
                                    <em>Sign up</em> you agree to our
                                    <a href="" target="_blank">terms of service</a>

                            </form>
                            <!-- Default form register -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <!-- Footer -->

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>"when you don't create things, you become defined by your tastes rather than ability."</p>
    </div>

    <script>

    </script>

</body>

</html>