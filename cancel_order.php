<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $order_id = $_POST['order_id'];

   $delete_query = "DELETE FROM `orders` WHERE id = '$order_id' AND user_id = '$user_id'";
   $result = mysqli_query($conn, $delete_query);

   if ($result) {
      $_SESSION['message'] = "Order canceled successfully.";
   } else {
      $_SESSION['message'] = "Failed to cancel the order.";
   }
}

header('location:orders.php');
exit;

?>
