<?php 
session_start();
$connect=mysqli_connect("localhost","root","", "produce");
 

if (isset($_GET["action"])) {
    if ($_GET["action"]=="insert") {
      foreach ($_SESSION["cart"] as $keys => $values) {
  
        if ($values["item_id"]== $_GET["id"]) {
          $name=$values['item_name'];
          $qty=$values['item_qty'];
          $price=$values['item_price'];
          $totalprice=number_format($values["item_qty"]* $values["item_price"] ,2);
          $customerid=$_SESSION['customerid'];
        
          $slq1=" INSERT INTO `orders_t`(`customerId`,`name`, `quantity`, `unitPrice`, `totalPrice`) VALUES('".$customerid."','".$name."','".$qty."','".$price."','".$totalprice."') ";
       $data1=mysqli_query($connect,$slq1);
          echo '<script>alert("Product Ordered Successfully")</script>';
          echo '<script>window.location="cart.php" </script>';
        }
      }
    }
    
  }


?>

