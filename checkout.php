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
    $user_id = $_SESSION['user_id'];

    foreach ($_SESSION['cart'] as $key => $value) {
        $item_price = $value['price'];
        echo "$value['price']";
        $query1 = "SELECT * FROM inventory WHERE item_id = $value && user_id = $user_id";
        $result1 = mysql_query($query1);
        echo $result1 . "EYFUEIufgieyugfiugesyufgsyugfuygeufygsuyefgy";
        $row = mysql_fetch_array($result1);
        // $_SESSION['cart'][$row['item_id']] = array(
        //                 "quantity" => 1,
        //                 "price" => $row['item_price']
        // header("Location: menu.php?message=gothere");
        $query2 = sprintf("INSERT INTO orders (user_id, item_id, item_title, item_price) 
                VALUES ('%s', '%s', '%s', '%s')", $_SESSION['user_id'], $row[0], $row[2], $row[3]);
        $result = mysql_query($query);
        if (!$result) {
            die("Error: ". mysql_error());
    }
        }

        // $id = intval($_GET['id']);
        if(isset($_SESSION['cart'])){
            // $_SESSION['cart'][$id]['quantity']++;
            unset($_SESSION['cart']);
            
        }
    // header("Location: menu.php?message=checkout_complete");
?>