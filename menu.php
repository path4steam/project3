<?php

require_once("config.php");

session_start();
if(!$_SESSION['logged']){
    header("Location: index.php");
    die;
}

// Connect to mysql */
$link = mysql_connect(HOST, USER, PW) 
or die ("Error connecting to the database: " . mysql_error());

// Select database */
$db_selected = mysql_select_db(DB, $link) 
or die ("Error selecting the database: " . mysql_error());


  if(isset($_SESSION['cart'][0])){
        }
        else {
                $_SESSION['cart'][0]=array(
                        "quantity" => 0,
                        "price" => 0
                    );
        }
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
    <link href="css/bootstrap-lumen.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">eCommerce Project</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form action="logout.php" class="navbar-form navbar-right" role="search" method="post">
                    <button type="submit" class="btn btn-default" name="logout">Logout</button>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php echo $_SESSION['username'] ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Go to<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="newPost.php"><span class="glyphicon glyphicon-plus"></span>  New Post</a></li>
                            <li><a href="inventory.php"><span class="glyphicon glyphicon-list-alt"></span>  My Inventory</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-tags"></span>  My Customers</a></li>
                            <li class="divider"></li>
                            <li><a href="viewCart.php"><span class="glyphicon glyphicon-shopping-cart"></span>  My Cart</a></li>
                            <li><a href="checkout.php"><span class="glyphicon glyphicon-credit-card"></span>  Checkout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <?php
        $message = @$_GET['message'];
        $error = @$_GET['error'];
        switch ($message) {
             case 'posted_new':
                 echo "<div class=\"alert alert-success\" role=\"alert\">You succesfully posted a new item!</div>";
                 break;
             case 'added_to_cart':
                 echo "<div class=\"alert alert-success\" role=\"alert\">Item added to cart!</div>";
                 break;
             default:
                 # code...
                 break;
         } 

        switch ($error) {
            // case 'fields_empty':
            //     echo "<div class=\"alert alert-danger\" role=\"alert\">Fields were missing! Enter username AND password!</div>";
            //     break;
            case 'post_failed':
                echo "<div class=\"alert alert-danger\" role=\"alert\">Post failed! We have no idea what happened!</div>";
                break;
            case 'cart_error':
                echo "<div class=\"alert alert-danger\" role=\"alert\">Add to cart failed! But why!</div>";
                break;
            default:
                # code...
            break;
        }
        ?>

        <div class="row">

            <div class="row">


                <?php
                $query = "SELECT inventory.item_title, inventory.item_price, users.user_name, inventory.item_description, inventory.item_id FROM inventory INNER JOIN users ON inventory.user_id=users.user_id;";
                $result = mysql_query($query);
                        // echo "<h2>All Blogs</h2>";
                while ($row = mysql_fetch_array($result)) {
                            // echo "<p><a class='blogTitles' name='$row[0]' href='index.php?view=$row[0]'>$row[0]</a> - By: $row[1] $row[2]</p><br/>";
                    echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                    <div class=\"thumbnail\">
                    <img src=\"http://placehold.it/320x150\" alt=\"\">
                    <div class=\"caption\">
                    
                    <h4 class=\"pull-right\">$$row[1]</h4>
                    <h4><a href=\"viewItem.php?id=$row[4]\">$row[0]</a></h4>
                    <a href=\"addToCart.php?id=$row[4]\" class=\"btn btn-default btn-sm pull-right\" name=\"addToCart\">Add To Cart</a>
                    <h5>By $row[2]</h5>
                    
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

<?php
include("footer.html");
?>
