<?php
require('../public/config/config.php');

$data = new Database;

// if (strlen($_SESSION['alogin']) == 0) {
//     header('location:index.php');
// } else {}

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

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>My First Bootstrap 4 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
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
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sign" href="#">Sign In</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#register">Register</a>
                    </div>

                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12 ">





                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">

                            <li class="media shadow p-3 mb-5 bg-white rounded" style>
                                <img src="..." class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <p>Lorem ipsum dolor, sit amet consectetur</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path fill-rule="evenodd" d="M7.5 7.25C7.5 4.58 9.422 2.5 12 2.5c2.079 0 3.71 1.34 4.282 3.242a.75.75 0 101.436-.432C16.971 2.825 14.792 1 12 1 8.503 1 6 3.845 6 7.25V9h-.5A2.5 2.5 0 003 11.5v8A2.5 2.5 0 005.5 22h13a2.5 2.5 0 002.5-2.5v-8A2.5 2.5 0 0018.5 9h-11V7.25zm-3 4.25a1 1 0 011-1h13a1 1 0 011 1v8a1 1 0 01-1 1h-13a1 1 0 01-1-1v-8z">
                                                </path>
                                            </svg></span></p>
                                </div>
                                <a href="#" class="align-self-center ml-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M4.97 11.03a.75.75 0 111.06-1.06L11 14.94V2.75a.75.75 0 011.5 0v12.19l4.97-4.97a.75.75 0 111.06 1.06l-6.25 6.25a.75.75 0 01-1.06 0l-6.25-6.25zm-.22 9.47a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H4.75z">
                                        </path>
                                    </svg>

                                </a>
                                <a href="#" class="align-self-center ml-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M4.97 11.03a.75.75 0 111.06-1.06L11 14.94V2.75a.75.75 0 011.5 0v12.19l4.97-4.97a.75.75 0 111.06 1.06l-6.25 6.25a.75.75 0 01-1.06 0l-6.25-6.25zm-.22 9.47a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H4.75z">
                                        </path>
                                    </svg>

                                </a>
                            </li>

                            <li class="media shadow p-3 mb-5 bg-white rounded" style>
                                <img src="..." class="align-self-center mr-3" alt="...">
                                <div class="media-body">
                                    <p>Lorem ipsum dolor, sit amet consectetur</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                <path fill-rule="evenodd" d="M6 9V7.25C6 3.845 8.503 1 12 1s6 2.845 6 6.25V9h.5a2.5 2.5 0 012.5 2.5v8a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 19.5v-8A2.5 2.5 0 015.5 9H6zm1.5-1.75C7.5 4.58 9.422 2.5 12 2.5c2.578 0 4.5 2.08 4.5 4.75V9h-9V7.25zm-3 4.25a1 1 0 011-1h13a1 1 0 011 1v8a1 1 0 01-1 1h-13a1 1 0 01-1-1v-8z">
                                                </path>
                                            </svg>
                                        </span>
                                    </p>
                                </div> <a href="#" class="align-self-center ml-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M4.97 11.03a.75.75 0 111.06-1.06L11 14.94V2.75a.75.75 0 011.5 0v12.19l4.97-4.97a.75.75 0 111.06 1.06l-6.25 6.25a.75.75 0 01-1.06 0l-6.25-6.25zm-.22 9.47a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H4.75z">
                                        </path>
                                    </svg>

                                </a>
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


                <!-- Modal -->
                <div class="modal fade" id="sign" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
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

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </div>

    <script>

    </script>

</body>

</html>