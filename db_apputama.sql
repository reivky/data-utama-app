-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 06:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apputama`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_18_175442_create_products_table', 1),
(6, '2023_01_18_175506_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quia repellendus.', 5000, 61, 'Voluptatem totam facere cum dignissimos dolorum.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(2, 'Magnam voluptatibus repellat.', 5000, 59, 'Qui consequuntur vero laboriosam error corporis.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(3, 'At illum.', 20000, 70, 'Dolore iure accusantium totam consequuntur odit sit.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(4, 'In praesentium.', 1500, 90, 'Et nobis molestias voluptatem deleniti voluptatem.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(5, 'Qui reiciendis natus.', 20000, 61, 'Sequi est delectus ad.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(6, 'Assumenda blanditiis sint.', 1500, 60, 'Dicta ratione voluptatum quo ut omnis iure.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(7, 'Dolorem illo corrupti.', 5000, 100, 'Qui aut velit ipsa qui ducimus.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(8, 'Minus vel.', 20000, 52, 'Officia quo illum beatae voluptas et.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(9, 'Quo hic.', 5000, 87, 'Eaque fugiat quas omnis suscipit.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(10, 'Perferendis esse.', 5000, 59, 'Ab qui ratione enim dolorem accusamus.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(11, 'Et maxime.', 5000, 57, 'Sunt in ex similique.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(12, 'Omnis iure.', 5000, 71, 'Dignissimos accusantium eos et laborum.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(13, 'Sapiente magnam.', 1500, 55, 'Magnam tempora accusamus illo expedita omnis corporis.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(14, 'Corrupti dolor.', 10000, 82, 'Omnis ea cupiditate consectetur et enim consequatur distinctio.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(15, 'Aut iste dolorem.', 15000, 54, 'Sapiente fugiat facere aut veniam aperiam aut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(16, 'Voluptatibus praesentium.', 10000, 51, 'Omnis repudiandae porro aut tempore.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(17, 'Ea ducimus ea.', 20000, 62, 'Aliquid ex sed ut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(18, 'Totam repellendus quia.', 10000, 78, 'Autem distinctio rerum est aut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(19, 'Eveniet dolor.', 20000, 53, 'Molestiae et dolores dolor.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(20, 'Rerum rerum ea.', 1500, 70, 'Reprehenderit exercitationem laborum ea.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(21, 'Accusamus et aut.', 1500, 97, 'Consequuntur commodi eos voluptatem alias corporis fuga.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(22, 'Et error.', 20000, 92, 'Expedita occaecati tempore magnam.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(23, 'Beatae sunt officiis.', 1500, 80, 'Ab soluta omnis ipsum.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(24, 'Molestias ullam.', 1500, 97, 'Alias quia labore optio illo quia sed.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(25, 'Sunt corporis consequuntur.', 5000, 78, 'Quibusdam architecto at ab facere animi dolores.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(26, 'Vero dolorem.', 5000, 101, 'Voluptas molestias earum dolore sint ab ut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(27, 'Voluptatibus et.', 1500, 78, 'Consequuntur tenetur voluptatem delectus dolor officia.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(28, 'Illum quibusdam omnis.', 1500, 69, 'Nesciunt aut enim qui quia quia mollitia.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(29, 'Commodi incidunt tempore.', 20000, 100, 'Omnis dolorum excepturi ut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05'),
(30, 'Ut quis saepe.', 15000, 76, 'Rerum sunt dolorem fugit at enim ut.', '2023-01-18 22:00:05', '2023-01-18 22:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `payment_amount` bigint(20) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `reference_no`, `price`, `quantity`, `payment_amount`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'INV23011912003300545', 5000, 10, 50000, 7, '2023-01-18 22:00:33', '2023-01-18 22:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$NheHumML5Ls1tSTE9PrRO..Q0.yFuq08D7l5w2FmV1P9CEYIPo8DO', 'uO1YENgt2m', '2023-01-18 22:00:05', '2023-01-18 22:00:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
