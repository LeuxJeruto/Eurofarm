<?php
 //handles all the requests concerning cart (add, product quantity remove cart items) using php sessions

 //add to cart.
 session_start();
 if(isset($_POST["add_to_cart"])){
     // check if session has data.
     echo $_POST["quantity"];
     if(isset($_SESSION["shopping_cart"])){
        echo "session cart set";
        $item_array_id= array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET['id'], $item_array_id))
        {
           $count = count($_SESSION["shopping_cart"]);
           $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
            'item_picture' => $_POST["hidden_picture"]
          );
          $_SESSION["shopping_cart"][$count] = $item_array;
          $_SESSION['cart_message'] = "Added in cart";
          $_SESSION['cart_msg_type'] = "success";
          header('location: ../users/single_product.php?view='.$_GET["id"].'');

        }
        else
        {
          //ITEM ALREADY IN CART.
          echo "item in cart";
          $_SESSION['cart_message'] = "Item already in cart";
          $_SESSION['cart_msg_type'] = "success";
          header('location: ../users/single_product.php?view='.$_GET["id"].'');
        }
     }
     else
     {
        echo "session cart  not set";
        $item_array = array(
           'item_id' => $_GET["id"],
           'item_name' => $_POST["hidden_name"],
           'item_price' => $_POST["hidden_price"],
           'item_quantity' => $_POST["quantity"],
           'item_picture' => $_POST["hidden_picture"]
        );
        foreach($item_array as $items){
            echo $items;
        }
        $_SESSION['shopping_cart'][0] = $item_array;
        $_SESSION['cart_message'] = "Item added to cart";
        $_SESSION['cart_msg_type'] = "success";
        header('location: ../users/single_product.php?view='.$_GET["id"].'');
     }
 }

 //delete item from cart

 if(isset($_GET['action']))
 {
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
              //unset the session
              unset($_SESSION["shopping_cart"][$keys]);  
              $_SESSION['cart_message'] = "Deleted cart item";
              $_SESSION['cart_msg_type'] = "danger";
              header('location: ../pages/cart.php');
            }
        }
    } 
 }
?>