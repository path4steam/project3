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


    // if(isset($_GET['action']) && $_GET['action']=="add"){
        $id = intval($_GET['id']);
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity']++;
        }
        else {
            $query = "SELECT * FROM inventory WHERE item_id={$id}";
            $result = mysql_query($query);
            if(mysql_num_rows($result)!= 0){
                $row = mysql_fetch_array($result);
                  
                $_SESSION['cart'][$row['item_id']] = array(
                        "id" => $row['item_id'],
                        "quantity" => 1,
                        "price" => $row['item_price']
                    );
                header("Location: menu.php?message=added_to_cart");
            }else{
                $header("Location: menu.php?error=cart_error");
            }
        }
    // }
    header("Location: menu.php?message=added_to_cart");
?>