<?php
require_once("config.php");
session_start();
if (isset($_SESSION['logged'])) {
// if($_SESSION['logged']){
    header("Location: menu.php");
    die;
}

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) 
or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link) 
or die ("Error selecting the database: " . mysql_error());

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eCommerce Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap-yeti.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/store-style.css" rel="stylesheet">

    <!-- You can forget about IE8 or lower support. This is the future baby. -->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Scamazon</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <p class="navbar-text">--"It's all a lie!"</p>

                <div class="register">
                    <a class="btn navbar-btn btn-default navbar-right" href="register.php">Register</a>
                </div>
                <p class="navbar-text navbar-right">or</p>
                <form action="login.php" class="navbar-form navbar-right" role="search" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default" name="login">Login</button>
                </form>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- Error and success messages -->
        <?php
        $registered = @$_GET['registered'];
        $error = @$_GET['error'];
        if ($registered) {
            echo "<div class=\"alert alert-success\" role=\"alert\">You have registered successfully.</div>";
        }

        switch ($error) {
            case 'fields_empty':
            echo "<div class=\"alert alert-danger\" role=\"alert\">Fields were missing! Enter username AND password!</div>";
            break;
            case 'auth_failed':
            echo "<div class=\"alert alert-danger\" role=\"alert\">Authentication failed! Check that username and password are correct!</div>";
            break;
            default:
                # code...
            break;
        }
        ?>
        <div class="row">

            <div class="row">

                <?php
                $query = "SELECT inventory.item_title, inventory.item_price, users.user_name, inventory.item_description, inventory.item_id, inventory.item_image_ref FROM inventory INNER JOIN users ON inventory.user_id=users.user_id;";
                $result = mysql_query($query);
                        // echo "<h2>All Blogs</h2>";
                while ($row = mysql_fetch_array($result)) {
                           
                    echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                    <div class=\"thumbnail\">
                    <img src=\"$row[5]\" alt=\"\">
                    <div class=\"caption\">
                    
                    <h4 class=\"pull-right\">$$row[1]</h4>
                    <h4><a href=\"#\">$row[0]</a></h4>
                    <a href=\"register.php\" class=\"btn btn-default btn-sm pull-right\" name=\"addToCart\">Register to buy</a>
                    <h5>$row[2]</h5>
                    
                    <p>$row[3]</p>



                    </div>
                    </div>
                    </div>";
                }
                ?>

            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Scamazon 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
