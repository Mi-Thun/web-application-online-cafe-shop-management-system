<?php

include '../components/connect.php';

session_start();

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE name = ? AND password = ?");
   $select_employee->execute([$name, $pass]);

   if ($select_employee->rowCount() > 0) {
      $fetch_employee_id = $select_employee->fetch(PDO::FETCH_ASSOC);
      $_SESSION['employee_id'] = $fetch_employee_id['id'];
      header('location:employee_dashboard.php');
   } else {
      $message[] = 'incorrect username or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Employee login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/custom_login.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <section class="box">

      <form action="" method="POST">
         <h1>Employee logIn</h1>
         <ul>
            <li><label for="name">User name</label></li>
            <li><input type="text" name="name" maxlength="20" required placeholder="" oninput="this.value = this.value.replace(/\s/g, '')"></li>
            <li><label for="name">Password</label></li>
            <li><input type="password" name="pass" maxlength="20" required placeholder="" oninput="this.value = this.value.replace(/\s/g, '')"></li>
         </ul>
         <label for="name"></label>
         <input type="submit" value="login now" name="submit" class="button">
      </form>

   </section>

   <!-- employee login form section ends -->
</body>

</html>