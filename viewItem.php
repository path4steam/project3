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

$id = intval($_GET['id']);

// $query = "SELECT * FROM inventory WHERE item_id = {$id}";
$query = "SELECT inventory.item_title, inventory.item_price, users.user_name, inventory.item_description, inventory.item_id FROM inventory INNER JOIN users ON inventory.user_id=users.user_id;";
$result = mysql_query($query);
if(mysql_num_rows($result)!= 0){
    $row = mysql_fetch_array($result);
}

include("header.php");
?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">$<?php echo $row[1]; ?></h4>
                        <h4><a href="#"><?php echo $row[0]; ?></a>
                        </h4>
                        <?php 
                        if ($_SESSION['username'] == $row[2]) {
                            echo "<a href=\"deletePost.php?id=$row[4]\" class=\"btn btn-danger pull-right\" name=\"deletePost\">Delete post</a>";
                        } 
                        else{
                           echo "<a href=\"addToCart.php?id=$row[4]\" class=\"btn btn-default pull-right\" name=\"addToCart\">Add To Cart</a>";
                        }
                        ?>
                        <!-- <a href="addToCart.php?id=<?php echo $row[4]; ?>" class="btn btn-default pull-right" name="addToCart">Add To Cart</a> -->
                        <h5><?php echo $row[2]; ?></h5>

                        <p><?php echo $row[3]; ?></p>
                        
                    </div>
                    <div class="ratings">
                        <!-- <p class="pull-right">3 reviews</p> -->
                        <p>
                           <!--  <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars -->
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                           <!--  <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous -->
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <!--                     <hr> -->


                </div>

            </div>
        </div>


    </div>
    <!-- ./container -->

    <?php
    include("footer.html");
    ?>