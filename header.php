<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scamazon</title>

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
                <a class="navbar-brand" href="index.php">Scamazon</a>
                <a class="navbar-text">--"It's all a lie!"</a>
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