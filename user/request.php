<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

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
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        
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