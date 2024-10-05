<?php
require_once('config.php');
session_start();

// Check if all required POST data is set
$required_post_data = ['hidden_product_name', 'hidden_product_id', 'hidden_product_price', 'product_quantity', 'hidden_product_total', 'hidden_total_amount', 'delivery_date', 'payment_method'];

foreach ($required_post_data as $post_field) {
    if (!isset($_POST[$post_field])) {
        echo "<script>alert('Required POST data is missing: $post_field');</script>";
        exit; // Exit the script if any required POST data is missing
    }
}

// Ensure the session variables are set
if (!isset($_SESSION['user_users_id']) || !isset($_SESSION['user_users_username'])) {
    echo "<script>
            alert('Please login.');
            location.assign('login_users.php');
          </script>";
    exit;
}

// Retrieve data from the POST request
$users_id = $_SESSION['user_users_id'];
$username = $_SESSION['user_users_username'];
$product_name = $_POST['hidden_product_name'];
$product_id = $_POST['hidden_product_id'];
$price = $_POST['hidden_product_price'];
$quantity = $_POST['product_quantity'];
$total = $_POST['hidden_product_total'];
$total_amount = $_POST['hidden_total_amount'];
$delivery_date = $_POST['delivery_date'];
$payment_method = $_POST['payment_method'];

// Insert order into Twa_akka_orders table
$insert_orders_query = "INSERT INTO Twa_akka_orders (users_id, delivery_date, payment_method, total_amount) VALUES ('$users_id', '$delivery_date', '$payment_method', '$total_amount')";
$insert_orders_result = mysqli_query($conn, $insert_orders_query);

if ($insert_orders_result) {
    $orders_id = mysqli_insert_id($conn);

    // Insert order details into Twa_akka_orders_detail table
    for ($i = 0; $i < count($product_name); $i++) {
        $insert_orders_detail_query = "INSERT INTO Twa_akka_orders_detail (orders_id, product_id, product_name, quantity) VALUES ('$orders_id', '{$product_id[$i]}', '{$product_name[$i]}', '{$quantity[$i]}')";
        $insert_orders_detail_result = mysqli_query($conn, $insert_orders_detail_query);

        if (!$insert_orders_detail_result) {
            echo "<script>alert('Failed to insert order details into database.');</script>";
            exit;
        }
    }

    // Clear cart after successful order insertion
    unset($_SESSION['cart']);

    // Redirect to payment page with necessary parameters
    header("Location: payment.php?username=" . urlencode($username) . "&total_amount=" . urlencode($total_amount));
    exit; // Terminate the script after redirection
} else {
    echo "<script>alert('Failed to insert order into database.');</script>";
    exit;
}
?>
