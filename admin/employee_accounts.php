<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_employees = $conn->prepare("DELETE FROM `employee` WHERE id = ?");
   $delete_employees->execute([$delete_id]);
   header('location:employee_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>employees accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php' ?>

   <!-- employee accounts section starts  -->

   <section class="accounts">

      <h1 class="heading">employees account</h1>


      <div class="box-container">

         <div class="box">
            <p>register new employee</p>
            <a href="register_employee.php" class="option-btn">register</a>
         </div>

         <div class="box-container">

            <?php
            $select_account = $conn->prepare("SELECT * FROM `employee`");
            $select_account->execute();
            if ($select_account->rowCount() > 0) {
               while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <div class="box">
                     <p> employee id : <span><?= $fetch_accounts['id']; ?></span> </p>
                     <p> employeename : <span><?= $fetch_accounts['name']; ?></span> </p>
                     <a href="employee_accounts.php?delete=<?= $fetch_accounts['id']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">delete</a>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">no accounts available</p>';
            }
            ?>

         </div>

   </section>

   <!-- employee accounts section ends -->







   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>

</body>

</html>