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
   <link rel="stylesheet" href="../css/nav.css">
   <link rel="stylesheet" href="../css/dashboard_style.css">

</head>

<body>

   <?php include '../components/employee_header.php' ?>

   <!-- employee dashboard section starts  -->
   <div class="container">

      <section class="dashboard">

         <h1 class="heading" style="text-align: center; margin-top:3rem">DASHBOARD </h1>
         <section class="dashboard">

            <div class="box-container">

               <div class="box">
                  <h3>welcome!</h3>
                  <p><?= $fetch_profile['name']; ?></p>

               </div>

            </div>

         </section>
         <div class="cardBox">

            <div class="card">
               <?php
               $select_orders = $conn->prepare("SELECT * FROM `orders`");
               $select_orders->execute();
               $numbers_of_orders = $select_orders->rowCount();
               ?>
               <div>
                  <div class="numbers"><?= $numbers_of_orders; ?></div>
                  <div class="cardName">total orders</div>
               </div>

               <div class="iconBx">
                  <a href="placed_orders.php">
                     <ion-icon name="grid-outline"></ion-icon>
                  </a>
               </div>
            </div>

            <div class="card">
               <?php
               $total_pendings = 0;
               $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
               $select_pendings->execute(['pending']);
               while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                  $total_pendings += $fetch_pendings['total_price'];
               }
               ?>
               <div>
                  <div class="numbers"><span>$</span><?= $total_pendings; ?><span>/-</span></div>
                  <div class="cardName">total pendings</div>
               </div>

               <div class="iconBx">
                  <a href="placed_orders.php">
                     <ion-icon name="wallet-outline"></ion-icon>
                  </a>
               </div>
            </div>

            <div class="card">
               <?php
               $total_completes = 0;
               $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
               $select_completes->execute(['completed']);
               while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                  $total_completes += $fetch_completes['total_price'];
               }
               ?>
               <div>
                  <div class="numbers"><span>$</span><?= $total_completes; ?><span>/-</span></div>
                  <div class="cardName">total completes</div>
               </div>

               <div class="iconBx">
                  <a href="placed_orders.php" class="ho">
                     <ion-icon name="wallet-outline"></ion-icon>
                  </a>
               </div>
            </div>

            <div class="card">
               <?php
               $select_orders = $conn->prepare("SELECT * FROM `orders`");
               $select_orders->execute();
               $numbers_of_orders = $select_orders->rowCount();
               ?>
               <div>
                  <div class="numbers"><span>$</span><?= $total_completes + $total_pendings; ?><span>/-</span></div>
                  <div class="cardName">total orders</div>
               </div>

               <div class="iconBx">
                  <a href="placed_orders.php">
                     <ion-icon name="wallet-outline"></ion-icon>
                  </a>
               </div>
            </div>

            <div class="card">
               <?php
               $select_products = $conn->prepare("SELECT * FROM `products`");
               $select_products->execute();
               $numbers_of_products = $select_products->rowCount();
               ?>
               <div>
                  <div class="numbers"><?= $numbers_of_products; ?></div>
                  <div class="cardName">products added</div>
               </div>

               <div class="iconBx">
                  <a href="products.php">
                     <ion-icon name="grid-outline"></ion-icon>
                  </a>
               </div>
            </div>

         </div>

   </div>
   </div>

   <!-- employee dashboard section ends -->

   <!-- custom js file link  -->
   <script src="../js/employee_script.js"></script>
   <script src="../js/nav.js"></script>

   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>