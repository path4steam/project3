<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: index.php");
    die;
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
    <link href="css/register.css" rel="stylesheet">

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
                <a class="navbar-brand" href="menu.php">eCommerce Project</a>
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
                            <li><a href="newPost.php">New Post</a></li>
                            <li><a href="inventory.php">My Inventory</a></li>
                            <li><a href="#">My Customers</a></li>
                            <li class="divider"></li>
                            <li><a href="viewCart.php">My Cart</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="createPost.php" method="post" accept-charset="utf-8" class="form-horizontal" role="form">

                    <!-- Form Name -->
                    <legend>New Post</legend>

                    <h4>Create a new post to be placed in inventory.</h4>
                    <!-- Item Title-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="item_title">Title</label>  
                      <div class="col-md-4">
                          <input id="item_title" name="item_title" type="text" placeholder="" class="form-control input-md">
                          <!--   <span class="help-block">help</span>   -->
                      </div>
                  </div>

                  <!-- Item Price -->
                  <div class="form-group">
                      <label class="col-md-4 control-label" for="item_price">Price</label>
                      <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input id="item_price" name="item_price" class="form-control prepended" placeholder="" type="text">
                      </div>
                      <!--     <p class="help-block">help</p> -->
                  </div>
              </div>

              <!-- Upload Image --> 
              <div class="form-group">
                  <label class="col-md-4 control-label" for="item_image">Image Upload</label>
                  <div class="col-md-4">
                    <input id="item_image" name="item_image" class="input-file" type="file">
                </div>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="item_description">Description</label>
                <div class="col-md-4">                     
                    <textarea class="form-control" id="item_description" name="item_description"></textarea>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="submitPost">Create New Post</button>

        </form>

    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

<?php
include("footer.html");
?>