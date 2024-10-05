<?php
if (isset($_GET['remove_success']) && $_GET['remove_success'] == 1) {
    echo "<script>alert('Product removed!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_success']) && $_GET['order_success'] == 1) {
    echo "<script>alert('Order placed!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Twa-akka - Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
</head>

<body>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">Twa-akka</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                                <?php
                                require_once('config.php');
                                $select = "SELECT * FROM Twa_akka_category";
                                $query = mysqli_query($conn, $select);
                                while ($res = mysqli_fetch_assoc($query)) {
                                ?>
                                    <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id']; ?>">
                                        <?php echo $res['category_name']; ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="account_users.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="login_users.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="logout_users.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
        <div class="container-fluid dashboard-content">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Cart</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Your cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <form action="insert_orders.php" method="POST">
                                    <tbody>
                                        <?php
                                        if ($printCount == 0) {
                                        ?>
                                            <tr>
                                                <td colspan="6" align="center">Your cart is empty!</td>
                                            </tr>
                                        <?php } else { ?>
                                            <?php
                                            $total_amount = 0;
                                            require_once('config.php');
                                            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                                $select = "SELECT * FROM Twa_akka_product where product_id = {$_SESSION['cart'][$i]}";
                                                $query = mysqli_query($conn, $select);
                                                $j = $i;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                    $total_amount = $total_amount + $res['product_price'];
                                            ?>
                                                  <tr>
    <td><?php echo ++$j; ?></td>
    <td><?php echo $res['product_name']; ?><input type="hidden" name="hidden_product_name[]" value="<?php echo $res['product_name']; ?>"></td>
    <td>Rs. <?php echo $res['product_price']; ?><input type="hidden" name="hidden_product_price[]" value="<?php echo $res['product_price']; ?>"></td>
    <td><input class="form-control" type="number" min="1" max="9" step="1" value="1" name="product_quantity[]" onchange="prodTotal(this)"></td>
    <td><span>Rs. <?php echo $res['product_price'] * 1; ?></span><input type="hidden" name="hidden_product_total[]" value="<?php echo $res['product_price']; ?>"></td>
    <td align="center"><a href="remove_product.php?val_i=<?php echo $i; ?>"><i class="fas fa-trash-alt"></i></a></td>
    <input type="hidden" name="hidden_product_id[]" value="<?php echo $res['product_id']; ?>"> <!-- Include product ID -->
</tr>

                                            <?php }
                                            } ?>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4" align="right">Total Amount:</td>
                                            <td colspan="2" id="total_amount"><span>Rs. <?php if ($printCount == 0) {
                                                                                            echo 0;
                                                                                        } else {
                                                                                            echo $total_amount;
                                                                                        } ?></span><input type="hidden" name="hidden_total_amount" value="<?php echo $total_amount; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                Delivery Date:
                                                <input id="delivery_date" class="form-control" type="date" name="delivery_date" required="">
                                            </td>
                                            <script>
                                                // Get current date
                                                var currentDate = new Date();

                                                // Convert current date to string in YYYY-MM-DD format
                                                var year = currentDate.getFullYear();
                                                var month = String(currentDate.getMonth() + 1).padStart(2, '0');
                                                var day = String(currentDate.getDate()).padStart(2, '0');
                                                var today = year + '-' + month + '-' + day;

                                                // Set minimum date for delivery_date input
                                                document.getElementById('delivery_date').setAttribute('min', today);
                                            </script>
                                              <td colspan="3">
                                                Payment Method:
                                                <select class="form-control" name="payment_method" id="payment_method">
                                                <option>khalti Payment</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td colspan="6" align="right">
                                                <form id="checkoutForm" method="POST" action="payment.php" onsubmit="return checkLoggedIn()">
    <input type="hidden" name="amount" value="<?php echo $total_amount; ?>">
    <input type="hidden" name="username" value="<?php echo $printUsername; ?>">
    <button class="btn btn-warning" type="button" onclick="clear_cart()">Clear</button>
    <button class="btn btn-info" id="checkoutButton">Checkout</button>
</form>
                                            </td>
                                        </tr>
                                        <script>
function checkLoggedIn() {
        // Check if the user is logged in
        if ('<?php echo $printUsername; ?>' === 'None') {
            window.location.href = "login_users.php"; // Redirect to login page
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }

    function clear_cart() {
        var flag = confirm("Do you want to clear the cart?");
        if (flag) {
            window.location.href = "clear_cart.php";
        }
    }
</script>
                                    </tbody>
</form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2024 Concept</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
        <!-- </div> -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script>
        function add_cart(product_id) {
            $.ajax({
                url: 'fetch_cart.php',
                data: 'id=' + product_id,
                method: 'get',
                dataType: 'json',
                success: function(cart) {
                    console.log(cart);
                    $('.badge').html(cart.length);
                }
            });
        }

        function prodTotal(quantity) {
            var price = $(quantity).parent().prev().find('input').val();
            var total = quantity.value * price;
            $(quantity).parent().next().find('input').val(total);
            $(quantity).parent().next().find('span').html("Rs. " + total);
            var total_amount = 0;
            $('input[name="hidden_product_total[]"]').each(function() {
                total_amount += parseInt($(this).val());
            });
            $('#total_amount').find('span').html("Rs. " + total_amount);
            $('#total_amount').find('input').val(total_amount);
        }

    
    </script>
</body>

</html>

