<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>menu</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- header section starts  -->
   <?php include 'components/user_header.php'; ?>
   <!-- header section ends -->

   <div class="heading">
      <h3>our menu</h3>
      <p><a href="home.php">home</a> <span> / menu</span></p>
   </div>

   <!-- menu section starts  -->


   <section class="reviews">

      <h1 class="title">Coffee</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` where category='coffee'");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <div class="swiper-slide slide">

                     <form action="" method="post" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                        <h3><?= $fetch_products['name']; ?></h3>
                        <div class="flex">
                           <a style="padding-right: 120px;"><span>$</span><?= $fetch_products['price']; ?></a>
                           <input style="border: 2px solid black;" type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                           <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>

                        </div>
                     </form>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>


         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>

   <section class="reviews">

      <h1 class="title">main dish</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` where category='main dish'");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <div class="swiper-slide slide">

                     <form action="" method="post" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                        <p><?= $fetch_products['name']; ?></p>
                        <div class="flex">
                           <a style="padding-right: 120px;"><span>$</span><?= $fetch_products['price']; ?></a>
                           <input style="border: 1px;" type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                           <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>

                        </div>
                     </form>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>


         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>

   <section class="reviews">

      <h1 class="title">drinks</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` where category='drinks'");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <div class="swiper-slide slide">

                     <form action="" method="post" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                        <p><?= $fetch_products['name']; ?></p>
                        <div class="flex">
                           <a style="padding-right: 120px;"><span>$</span><?= $fetch_products['price']; ?></a>
                           <input style="border: 1px;" type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                           <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>

                        </div>
                     </form>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>


         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>

   <section class="reviews">

      <h1 class="title">desserts</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` where category='desserts'");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <div class="swiper-slide slide">

                     <form action="" method="post" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                        <p><?= $fetch_products['name']; ?></p>
                        <div class="flex">
                           <a style="padding-right: 120px;"><span>$</span><?= $fetch_products['price']; ?></a>
                           <input style="border: 1px;" type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                           <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>

                        </div>
                     </form>
                  </div>
            <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>


         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>

   <!-- menu section ends -->

   <!-- footer section starts  -->
   <?php include 'components/footer.php'; ?>
   <!-- footer section ends -->

   <!-- custom js file link  -->
   <script src=" js/script.js"></script>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script>
      var swiper = new Swiper(".reviews-slider", {
         loop: true,
         grabCursor: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
            },
            700: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });
   </script>

</body>

</html>