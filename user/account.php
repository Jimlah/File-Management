<?php
session_start();

require('../public/config/config.php');

$data = new Database;

// if (strlen($_SESSION['alogin']) == 0) {
//     header('location:index.php');
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
                                        <path fill-rule="evenodd" d="M1.513 1.96a1.374 1.374 0 011.499-.21l19.335 9.215a1.146 1.146 0 010 2.07L3.012 22.25a1.374 1.374 0 01-1.947-1.46L2.49 12 1.065 3.21a1.374 1.374 0 01.448-1.25zm2.375 10.79l-1.304 8.042L21.031 12 2.584 3.208l1.304 8.042h7.362a.75.75 0 010 1.5H3.888z"></path>
                                    </svg>

                                </a>

                                <a href="#" class="align-self-center ml-3">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24">
                                        <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
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