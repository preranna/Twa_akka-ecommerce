<?php
session_start();
require_once('config.php');

$amount = $_GET['amount'];
$users_id = $_SESSION['user_users_id'];
$transaction_id = $_GET['transaction_id'];

$total = $amount / 100; // Convert paisa to rupees
$update_order_query = "UPDATE Twa_akka_orders SET transaction_id = '$transaction_id' WHERE users_id = '$users_id'";
$update_order_result = mysqli_query($conn, $update_order_query);

if ($update_order_result) 
    // Clear cart after successful order insertion
    unset($_SESSION['cart']);
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twa_akka</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
    <link rel="manifest" href="../../favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/louis-george-cafe" rel="stylesheet">
    <link rel="stylesheet" href="../../css/user.css">

    <style>
        body{
            background-color: #f6f4f9;
        }
    </style>
</head>
<body>

    <div class="container payment-container">
        <div class="row text-center">
            <div class="col-md-12 mb-3">
                <img src="uploads/success.png" class="mt-5" alt="">
                <h3 class="fw-bold mt-5">Payment Success</h3>
                <h6 class="mt-3">Thank you for purchasing via Khalti Payment Gateway! Your payment has been confirmed successfully.</p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <h6 class="fw-bold">Paid Amount: NRs. <?php echo $total ?></h6>
                <h6 class="fw-bold">Transaction ID: <?php echo $transaction_id ?></h6>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <a href="index.php">
                    <button class="btn cart-btn py-2 fw-bold w-50">Back to Homepage</button>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
