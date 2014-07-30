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

include("header.php"); 
?>



<!-- Page Content -->
<div class="container">
    <div class="row">
     <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">My Cart</div>

          <!-- Table -->
          <table class="table">
            <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php
    // first half of query
            $query = "SELECT * FROM inventory WHERE item_id IN (";

    // second half is all the ids of the items in our cart
                if (isset($_SESSION['cart'])){
                foreach(@$_SESSION['cart'] as $id => $value) {
                    $query.= $id.",";
                }

                $query = substr($query, 0, -1).") ORDER BY item_title ASC";
$result = mysql_query($query);}
$total = 0;

while (@$row = mysql_fetch_array($result)){
    $quantity = $_SESSION['cart'][$row['item_id']]['quantity'];
    $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $row['item_price'];
    $total += $subtotal;
    echo "<tr> 
    <td>$row[2]</td>
    <td>$$row[3]</td>
    <td>$quantity</td>
    <td>$$subtotal</td>
    </tr>";
}
echo "<td></td>
<td></td>
<td><strong>Total</strong></td>
<td>$$total</td>"
?>
</table>
</div>
<a href="checkout.php" class="btn btn-success pull-right " name="Checkout">Checkout</a>
</div>

</div>


</div>
<!-- ./container -->
<?php

include("footer.html");

?>