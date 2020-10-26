<!DOCTYPE html>
<html lang="en">

<head>
    <title>File Upload Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>File Upload And Management System</h1>
            <p>Mission, Vision & Values</p>
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

  
        <!-- Buttons to choose list or grid view -->
        <button onclick="listView()"><i class="fa fa-bars"></i> List</button>
        <button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>

        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <h2>Column 1</h2>
                <p>Some text..</p>
            </div>
            <div class="column" style="background-color:#bbb;">
                <h2>Column 2</h2>
                <p>Some text..</p>
            </div>
        </div>

        <div class="row">
            <div class="column" style="background-color:#ccc;">
                <h2>Column 3</h2>
                <p>Some text..</p>
            </div>
            <div class="column" style="background-color:#ddd;">
                <h2>Column 4</h2>
                <p>Some text..</p>
            </div>
        </div>
    

    <footer class="container-fluid text-center">
        <p>File Upload Copyright</p>
    </footer>

    <script>
        // Get the elements with class="column"
        var elements = document.getElementsByClassName("column");

        // Declare a loop variable
        var i;

        // List View
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
            }
        }

        // Grid View
        function gridView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "50%";
            }
        }
    </script>
</body>

</html>