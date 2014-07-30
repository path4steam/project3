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




<div class="container">
    <div class="row">
     <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">My Profile</div>


          <!-- info Table -->
          <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>User ID</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION['firstname']?></td>
                <td><?php echo $_SESSION['lastname']?></td>
                <td><?php echo $_SESSION['user_email']?></td>
                <td><?php echo $_SESSION['user_id']?></td>
            </tr>
        </table>
            <br>
          <!-- order Table -->
          <div class="panel-heading">My Orders</div>
          <table class="table">
            <tr>
                <th>Date and Time</th>
                <th>Order Number</th>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
            </tr>
            <?php
            // first half of query
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM orders WHERE user_id = {$user_id};";
            // $query = substr($query, 0, -1).") ORDER BY item_title ASC";
            $result = mysql_query($query);
            // $total = 0;

            while (@$row = mysql_fetch_array($result)){
                // $quantity = $_SESSION['cart'][$row['item_id']]['quantity'];
                // $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $row['item_price'];
                // $total += $subtotal;
                echo "<tr> 
                <td>$row[5]</td>
                <td>$row[0]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$$row[4]</td>
                </tr>";
            }
            // echo "<td></td>
            // <td></td>
            // <td><strong>Total</strong></td>
            // <td>$$total</td>"
            ?>
            </table>
            </div>
            <!-- <a href="checkout.php" class="btn btn-success pull-right " name="Checkout">Checkout</a> -->
            </div>
        </div>
</div>



<?php
include("footer.html");
?>