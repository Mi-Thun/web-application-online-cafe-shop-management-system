<?php

include '../components/connect.php';

session_start();

$employee_id = $_SESSION['employee_id'];

if (!isset($employee_id)) {
   header('location:employee_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>employee dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/employee_style.css">

</head>

<body>

   <?php include '../components/employee_header.php' ?>

   <!-- employee dashboard section starts  -->

   <section class="dashboard">

      <h1 class="heading">employee dashboard</h1>

      <div class="box-container">

         <div class="box">
            <h3>welcome!</h3>
            <p><?= $fetch_profile['name']; ?></p>

         </div>

         <div class="box">
            <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
               $total_pendings += $fetch_pendings['total_price'];
            }
            ?>
            <h3><span>$</span><?= $total_pendings; ?><span>/-</span></h3>
            <p>Total Pending Amount</p>
            <a href="placed_orders.php" class="btn">View Orders</a>
         </div>

         <div class="box">
            <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['completed']);
            while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
               $total_completes += $fetch_completes['total_price'];
            }
            ?>
            <h3><span>$</span><?= $total_completes; ?><span>/-</span></h3>
            <p>total completes</p>
            <a href="placed_orders.php" class="btn">see orders</a>
         </div>

         <div class="box">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $numbers_of_orders = $select_orders->rowCount();
            ?>
            <h3><?= $numbers_of_orders; ?></h3>
            <p>total orders</p>
            <a href="placed_orders.php" class="btn">see orders</a>
         </div>

         <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $numbers_of_products = $select_products->rowCount();
            ?>
            <h3><?= $numbers_of_products; ?></h3>
            <p>products added</p>
            <a href="products.php" class="btn">see products</a>
         </div>



      </div>

   </section>

   <!-- employee dashboard section ends -->









   <!-- custom js file link  -->
   <script src="../js/employee_script.js"></script>

</body>

</html>