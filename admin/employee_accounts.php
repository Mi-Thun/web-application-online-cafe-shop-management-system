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

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/dashboard_style.css">
   <link rel="stylesheet" href="../css/table.css">

</head>

<body>
   <?php include '../components/admin_header.php' ?>
   <!-- employee accounts section starts  -->
   <section class="accounts">
      <h1 class="heading">Employees Management</h1>
      <div class="box-container">

         <!-- <div class="box">
            <p>register new employee</p>
            <a href="register_employee.php" class="option-btn">register</a>
         </div> -->

      </div>

      <div class="table_header">
         <p>Employee Details</p>
         <div>
            <input placeholder="employee name">
            <button class="add_new">search</button>
            <a href="register_employee.php"><button class="add_new">Add Employee</button></a>
         </div>
      </div>

      <div>
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>address</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $select_account = $conn->prepare("SELECT * FROM `employee`");
               $select_account->execute();
               if ($select_account->rowCount() > 0) {
                  while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {
               ?>
                     <tr>
                        <td><span><?= $fetch_accounts['id']; ?></span></td>
                        <td><span><?= $fetch_accounts['name']; ?></span></td>
                        <td><span><?= $fetch_accounts['age']; ?></span></td>
                        <td><span><?= $fetch_accounts['sex']; ?></span></td>
                        <td><span><?= $fetch_accounts['phone']; ?></span></td>
                        <td><span><?= $fetch_accounts['email']; ?></span></td>
                        <td><span><?= $fetch_accounts['address']; ?></span></td>
                        <td>
                           <a href="employee_accounts.php?update=<?= $fetch_products['id']; ?>"><button><i class="fa-solid fa-pen-to-square"></i></button></a>
                           <a href="employee_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account?');"><button><i class="fa-solid fa-trash"></i></button></a>
                        </td>
                     </tr>

               <?php
                  }
               } else {
                  echo '<p class="empty">no accounts available</p>';
               }
               ?>

            </tbody>
         </table>
      </div>


   </section>

   <!-- employee accounts section ends -->

   <!-- custom js file link  -->
   <script src="../js/admin_script.js"></script>

</body>

</html>