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

<header class="header">

   <section class="flex">

      <a href="employee_dashboard.php" class="logo">Employee<span>Panel</span></a>

      <nav class="navbar">
         <a href="employee_dashboard.php">home</a>
         <a href="products.php">products</a>
         <a href="placed_orders.php">orders</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
         $select_profile = $conn->prepare("SELECT * FROM `employee` WHERE id = ?");
         $select_profile->execute([$employee_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <div class="flex-btn">
         </div>
         <a href="../components/employee_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>