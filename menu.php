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


  // if(isset($_SESSION['cart']['id'])){
  //       }
  //       else {
  //           $_SESSION['cart']['id']=array(
  //                   "quantity" => 0,
  //                   "price" => 0
  //               );
  //       }
include("header.php");
?>



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
             case 'post_deleted':
                echo "<div class=\"alert alert-success\" role=\"alert\">Item deleted!</div>"; 
                 break;
             case 'checkout_complete':
                echo "<div class=\"alert alert-success\" role=\"alert\">Checkout complete! You can continue shopping!</div>"; 
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
                $query = "SELECT inventory.item_title, inventory.item_price, users.user_name, inventory.item_description, inventory.item_id, inventory.item_image_ref FROM inventory INNER JOIN users ON inventory.user_id=users.user_id;";
                $result = mysql_query($query);
                while ($row = mysql_fetch_array($result)) {
                    echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                    <div class=\"thumbnail\">
                    <img src=\"$row[5]\" alt=\"\">
                    <div class=\"caption\">
                    
                    <h4 class=\"pull-right\">$$row[1]</h4>

                    <h4><a href=\"viewItem.php?id=$row[4]\">$row[0]</a></h4>";

                        if ($_SESSION['username'] == $row[2]) {
                            echo "<a href=\"deletePost.php?id=$row[4]\" class=\"btn btn-danger btn-sm pull-right\" name=\"deletePost\">Delete post</a>";
                        } 
                        else{
                           echo "<a href=\"addToCart.php?id=$row[4]\" class=\"btn btn-default btn-sm pull-right\" name=\"addToCart\">Add To Cart</a>";
                        }
                    
                        echo "
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
