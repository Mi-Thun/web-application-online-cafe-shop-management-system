<?php

include '../components/connect.php';

session_start();

$employee_id = $_SESSION['employee_id'];

if (!isset($employee_id)) {
   header('location:employee_login.php');
};

if (isset($_POST['update_payment'])) {

   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/dashboard_style.css">
   <link rel="stylesheet" href="../css/table.css">

</head>

<body>

   <?php include '../components/employee_header.php' ?>

   <!-- placed orders section starts  -->

   <section class="placed-orders">

      <h1 class="heading">placed orders</h1>

      <div class="table_header">
         <p>Order Details</p>
         <div>
            <input placeholder="order number">
            <button class="add_new">search</button>
         </div>
      </div>

      <div>
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>products</th>
                  <th>Price</th>
                  <th>PaymentType</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $select_orders = $conn->prepare("SELECT * FROM `orders`");
               $select_orders->execute();
               if ($select_orders->rowCount() > 0) {
                  while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
               ?>
                     <tr>
                        <td><?= $fetch_orders['user_id']; ?></td>
                        <td><?= $fetch_orders['placed_on']; ?></td>
                        <td><?= $fetch_orders['name']; ?></td>
                        <td><?= $fetch_orders['email']; ?></td>
                        <td><?= $fetch_orders['number']; ?></span></td>
                        <td><?= $fetch_orders['address']; ?></td>
                        <td><?= $fetch_orders['total_products']; ?></td>
                        <td><?= $fetch_orders['total_price']; ?></td>
                        <td><?= $fetch_orders['method']; ?></td>
                        <td>
                           <form action="" method="POST">
                              <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                              <select name="payment_status" class="drop-down">
                                 <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
                                 <option value="pending">pending</option>
                                 <option value="completed">completed</option>
                              </select>
                              <div class="flex-btn">
                                 <input type="submit" value="update" class="btn" name="update_payment">
                                 <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                              </div>
                           </form>
                        </td>
                     </tr>
               <?php
                  }
               } else {
                  echo '<p class="empty">no orders placed yet!</p>';
               }
               ?>
            </tbody>
         </table>
      </div>



   </section>

   <!-- placed orders section ends -->

   <!-- placed orders section ends -->

   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>

</body>

</html>