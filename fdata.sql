INSERT INTO products (id, name, category, price, image) VALUES
(1, 'Aaaaa', 'main dish', 200, 'menu-1.png'),
(4, 'coffee1', 'main dish', 100, 'gallery-2.webp'),
(5, 'sdffgd', 'coffee', 500, 'gallery-6.webp'),
(6, 'mithun', 'coffee', 10000, 'gallery-3.webp');


INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'mithun', '22', 'mohsenulkabirmi8486@gmail.com', 'cash on delivery', 's, s, sfsd, sfdf, sdfdsdfs, sffdsgfdg, fdgdfgfdg - 1111', 'Aaaaa (200 x 1) - Bbb (200 x 1) - ', 400, '2022-08-14', 'completed'),
(2, 1, 'mithun', '22', 'mohsenulkabirmi8486@gmail.com', 'paytm', 's, s, sfsd, sfdf, sdfdsdfs, sffdsgfdg, fdgdfgfdg - 1111', 'Bbb (200 x 1) - ', 200, '2022-08-14', 'completed'),
(3, 1, 'mithun', '22', 'mohsenulkabirmi8486@gmail.com', 'credit card', 's, s, sfsd, sfdf, sdfdsdfs, sffdsgfdg, fdgdfgfdg - 1111', 'Aaaaa (200 x 1) - Bbb (200 x 1) - ', 400, '2022-08-14', 'completed'),
(4, 1, 'mithun', '22', 'mohsenulkabirmi8486@gmail.com', 'cash on delivery', 'sifat, sifat, sifat, sifat, sifat, sifat, sifat - 1212', 'Aaaaa (200 x 1) - ', 200, '2022-08-14', 'completed');


INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`) VALUES
(1, 'mithun', 'mohsenulkabirmi8486@gmail.com', '22', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'sifat, sifat, sifat, sifat, sifat, sifat, sifat - 1212');
