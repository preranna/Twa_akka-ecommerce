<?php
$orders_id = $_GET['orders_id'];
require_once('../config.php');
$delete = "DELETE FROM Twa_akka_orders where orders_id = $orders_id";
mysqli_query($conn, $delete);
header("Location: view_orders.php");
?>