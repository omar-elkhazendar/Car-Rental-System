-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2026 at 06:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Car_ID` int(11) NOT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `description` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `country_made` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `Plate_ID` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `approve` int(11) DEFAULT 1,
  `cat_id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Car_ID`, `Model`, `description`, `price`, `status`, `country_made`, `date`, `Plate_ID`, `avatar`, `approve`, `cat_id`, `member`, `office_id`) VALUES
(1, 'Toyota Yaris 2022', 'Reliable economy hatchback', 700, 1, 'Japan', '2026-04-18', 1001, 'toyota-yaris.jpg', 1, 1, 1, 1),
(2, 'Hyundai Accent 2021', 'Comfortable compact sedan', 760, 1, 'Korea', '2026-04-18', 1002, 'hyundai-accent.jpg', 1, 2, 1, 2),
(3, 'Nissan Sunny 2023', 'Practical city sedan', 790, 1, 'Japan', '2026-04-18', 1003, 'nissan-sunny.jpg', 1, 3, 1, 3),
(4, 'Kia Cerato 2022', 'Popular mid-size sedan', 850, 1, 'Korea', '2026-04-18', 1004, 'kia-cerato.jpg', 1, 3, 1, 4),
(5, 'Honda Civic 2021', 'Balanced performance sedan', 920, 1, 'Japan', '2026-04-18', 1005, 'honda-civic.jpg', 1, 3, 1, 5),
(6, 'Toyota Corolla 2020', 'Trusted family sedan', 880, 1, 'Japan', '2026-04-18', 1006, 'toyota-corolla.jpg', 1, 3, 1, 6),
(7, 'Mazda 3 2022', 'Stylish compact sedan', 940, 1, 'Japan', '2026-04-18', 1007, 'mazda-3.jpg', 1, 2, 1, 7),
(8, 'Volkswagen Jetta 2021', 'German compact sedan', 960, 1, 'Germany', '2026-04-18', 1008, 'vw-jetta.jpg', 1, 3, 1, 8),
(9, 'Skoda Octavia 2022', 'Spacious practical sedan', 990, 1, 'Czech Republic', '2026-04-18', 1009, 'skoda-octavia.jpg', 1, 3, 1, 1),
(10, 'Renault Logan 2020', 'Budget-friendly sedan', 730, 1, 'France', '2026-04-18', 1010, 'renault-logan.jpg', 1, 1, 1, 2),
(11, 'Peugeot 301 2021', 'Efficient city sedan', 810, 1, 'France', '2026-04-18', 1011, 'peugeot-301.jpg', 1, 2, 1, 3),
(12, 'Chevrolet Optra 2022', 'Roomy economical sedan', 800, 1, 'USA', '2026-04-18', 1012, 'chevy-optra.jpg', 1, 3, 1, 4),
(13, 'Ford Focus 2020', 'Compact reliable hatchback', 860, 1, 'USA', '2026-04-18', 1013, 'ford-focus.jpg', 1, 2, 1, 5),
(14, 'Suzuki Swift 2021', 'Agile compact car', 720, 1, 'Japan', '2026-04-18', 1014, 'suzuki-swift.jpg', 1, 2, 1, 6),
(15, 'Mitsubishi Attrage 2022', 'Economic daily commute', 740, 1, 'Japan', '2026-04-18', 1015, 'mitsubishi-attrage.jpg', 1, 1, 1, 7),
(16, 'Toyota Camry 2023', 'Comfortable premium sedan', 1150, 1, 'Japan', '2026-04-18', 1016, 'toyota-camry.jpg', 1, 5, 1, 8),
(17, 'Nissan Altima 2022', 'Modern stylish sedan', 1100, 1, 'Japan', '2026-04-18', 1017, 'nissan-altima.jpg', 1, 5, 1, 1),
(18, 'Honda Accord 2021', 'Business-class sedan', 1180, 1, 'Japan', '2026-04-18', 1018, 'honda-accord.jpg', 1, 5, 1, 2),
(19, 'BMW 320i 2022', 'Premium German sedan', 1700, 1, 'Germany', '2026-04-18', 1019, 'bmw-320i.jpg', 1, 5, 1, 3),
(20, 'Mercedes C200 2021', 'Luxury comfort sedan', 1850, 1, 'Germany', '2026-04-18', 1020, 'mercedes-c200.jpg', 1, 5, 1, 4),
(21, 'Audi A4 2022', 'Executive compact luxury sedan', 1780, 1, 'Germany', '2026-04-18', 1021, 'audi-a4.jpg', 1, 5, 1, 5),
(22, 'Lexus ES 2021', 'Smooth premium driving', 1820, 1, 'Japan', '2026-04-18', 1022, 'lexus-es.jpg', 1, 5, 1, 6),
(23, 'Tesla Model 3 2023', 'Electric performance sedan', 1600, 1, 'USA', '2026-04-18', 1023, 'tesla-model3.jpg', 1, 10, 1, 7),
(24, 'Tesla Model Y 2023', 'Electric crossover SUV', 1750, 1, 'USA', '2026-04-18', 1024, 'tesla-modely.jpg', 1, 10, 1, 8),
(25, 'Hyundai Kona EV 2022', 'Compact electric crossover', 1400, 1, 'Korea', '2026-04-18', 1025, 'kona-ev.jpg', 1, 10, 1, 1),
(26, 'Kia Niro Hybrid 2022', 'Efficient hybrid crossover', 1320, 1, 'Korea', '2026-04-18', 1026, 'kia-niro.jpg', 1, 11, 1, 2),
(27, 'Toyota Prius 2021', 'Legendary hybrid efficiency', 1280, 1, 'Japan', '2026-04-18', 1027, 'toyota-prius.jpg', 1, 11, 1, 3),
(28, 'Toyota RAV4 2022', 'Popular family SUV', 1350, 1, 'Japan', '2026-04-18', 1028, 'rav4.jpg', 1, 4, 1, 4),
(29, 'Hyundai Tucson 2023', 'Modern midsize SUV', 1380, 1, 'Korea', '2026-04-18', 1029, 'tucson.jpg', 1, 4, 1, 5),
(30, 'Kia Sportage 2022', 'Stylish compact SUV', 1360, 1, 'Korea', '2026-04-18', 1030, 'sportage.jpg', 1, 4, 1, 6),
(31, 'Nissan X-Trail 2021', 'Versatile crossover SUV', 1420, 1, 'Japan', '2026-04-18', 1031, 'xtrail.jpg', 1, 9, 1, 7),
(32, 'Honda CR-V 2022', 'Comfortable family SUV', 1450, 1, 'Japan', '2026-04-18', 1032, 'crv.jpg', 1, 4, 1, 8),
(33, 'Mazda CX-5 2021', 'Refined compact SUV', 1480, 1, 'Japan', '2026-04-18', 1033, 'cx5.jpg', 1, 9, 1, 1),
(34, 'Ford Escape 2022', 'Balanced utility crossover', 1390, 1, 'USA', '2026-04-18', 1034, 'escape.jpg', 1, 9, 1, 2),
(35, 'Chevrolet Captiva 2021', 'Spacious crossover', 1290, 1, 'USA', '2026-04-18', 1035, 'captiva.jpg', 1, 9, 1, 3),
(36, 'Jeep Wrangler 2020', 'Classic offroad icon', 1650, 1, 'USA', '2026-04-18', 1036, 'wrangler.jpg', 1, 12, 1, 4),
(37, 'Toyota Land Cruiser 2022', 'Heavy-duty offroad SUV', 2200, 1, 'Japan', '2026-04-18', 1037, 'landcruiser.jpg', 1, 12, 1, 5),
(38, 'Mitsubishi Pajero 2021', 'Rugged offroad SUV', 1700, 1, 'Japan', '2026-04-18', 1038, 'pajero.jpg', 1, 12, 1, 6),
(39, 'Nissan Patrol 2023', 'Powerful large SUV', 2300, 1, 'Japan', '2026-04-18', 1039, 'patrol.jpg', 1, 12, 1, 7),
(40, 'Ford Ranger 2022', 'Reliable pickup truck', 1500, 1, 'USA', '2026-04-18', 1040, 'ford-ranger.jpg', 1, 7, 1, 8),
(41, 'Toyota Hilux 2021', 'Durable utility pickup', 1520, 1, 'Japan', '2026-04-18', 1041, 'hilux.jpg', 1, 7, 1, 1),
(42, 'Isuzu D-Max 2022', 'Heavy-duty pickup truck', 1490, 1, 'Japan', '2026-04-18', 1042, 'dmax.jpg', 1, 7, 1, 2),
(43, 'Chevrolet Silverado 2020', 'Full-size pickup power', 1850, 1, 'USA', '2026-04-18', 1043, 'silverado.jpg', 1, 7, 1, 3),
(44, 'Mercedes Vito 2022', 'Premium passenger van', 1600, 1, 'Germany', '2026-04-18', 1044, 'vito.jpg', 1, 8, 1, 4),
(45, 'Toyota Hiace 2021', 'Reliable transport van', 1450, 1, 'Japan', '2026-04-18', 1045, 'hiace.jpg', 1, 8, 1, 5),
(46, 'Hyundai H1 2020', 'Spacious family van', 1380, 1, 'Korea', '2026-04-18', 1046, 'h1.jpg', 1, 8, 1, 6),
(47, 'Kia Carnival 2023', 'Luxury family minivan', 1700, 1, 'Korea', '2026-04-18', 1047, 'carnival.jpg', 1, 8, 1, 7),
(48, 'Porsche 911 2022', 'Iconic sports coupe', 3200, 1, 'Germany', '2026-04-18', 1048, 'porsche-911.jpg', 1, 6, 1, 8),
(49, 'BMW M4 2021', 'High-performance sports coupe', 2950, 1, 'Germany', '2026-04-18', 1049, 'bmw-m4.jpg', 1, 6, 1, 1),
(50, 'Audi R8 2020', 'Exotic supercar performance', 3900, 1, 'Germany', '2026-04-18', 1050, 'audi-r8.jpg', 1, 6, 1, 2),
(51, 'Chevrolet Camaro 2022', 'American muscle sports car', 2500, 1, 'USA', '2026-04-18', 1051, 'camaro.jpg', 1, 6, 1, 3),
(52, 'Ford Mustang 2021', 'Classic performance coupe', 2450, 1, 'USA', '2026-04-18', 1052, 'mustang.jpg', 1, 6, 1, 4),
(53, 'Subaru BRZ 2022', 'Lightweight fun sports coupe', 2100, 1, 'Japan', '2026-04-18', 1053, 'brz.jpg', 1, 6, 1, 5),
(54, 'Nissan 370Z 2020', 'Balanced rear-wheel sports', 2250, 1, 'Japan', '2026-04-18', 1054, '370z.jpg', 1, 6, 1, 6),
(55, 'Lamborghini Huracan 2021', 'Extreme supercar experience', 5500, 1, 'Italy', '2026-04-18', 1055, 'huracan.jpg', 1, 6, 1, 7),
(56, 'Ferrari F8 2022', 'Top-tier supercar thrill', 6200, 1, 'Italy', '2026-04-18', 1056, 'f8.jpg', 1, 6, 1, 8),
(57, 'Dodge Charger 2021', 'Powerful sporty sedan', 2400, 1, 'USA', '2026-04-18', 1057, 'charger.jpg', 1, 6, 1, 1),
(58, 'Volvo XC60 2022', 'Safe premium crossover', 1650, 1, 'Sweden', '2026-04-18', 1058, 'xc60.jpg', 1, 9, 1, 2),
(59, 'Volvo S90 2021', 'Elegant luxury sedan', 1900, 1, 'Sweden', '2026-04-18', 1059, 's90.jpg', 1, 5, 1, 3),
(60, 'Mini Cooper 2020', 'Iconic compact hatchback', 1300, 1, 'UK', '2026-04-18', 1060, 'mini-cooper.jpg', 1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `visibility` tinyint(1) DEFAULT 0,
  `allow_comment` tinyint(1) DEFAULT 1,
  `allow_ads` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `ordering`, `visibility`, `allow_comment`, `allow_ads`) VALUES
(1, 'Economy', 'Fuel-efficient and affordable daily cars', 1, 0, 1, 1),
(2, 'Compact', 'Small city-friendly vehicles', 2, 0, 1, 1),
(3, 'Sedan', 'Comfortable family and business sedans', 3, 0, 1, 1),
(4, 'SUV', 'Spacious SUVs for road trips', 4, 0, 1, 1),
(5, 'Luxury', 'Premium comfort and performance cars', 5, 0, 1, 1),
(6, 'Sports', 'High-performance sports cars', 6, 0, 1, 1),
(7, 'Pickup', 'Utility pickup trucks', 7, 0, 1, 1),
(8, 'Van', 'Passenger and cargo vans', 8, 0, 1, 1),
(9, 'Crossover', 'Balanced city-highway crossover models', 9, 0, 1, 1),
(10, 'Electric', 'Fully electric cars', 10, 0, 1, 1),
(11, 'Hybrid', 'Hybrid fuel-saving models', 11, 0, 1, 1),
(12, 'Offroad', '4x4 off-road capable vehicles', 12, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `c_date` date NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `comment`, `status`, `c_date`, `car_id`, `user_id`) VALUES
(1, 'Excellent condition and smooth drive.', 1, '2026-04-18', 1, 1),
(2, 'Very clean interior and good fuel economy.', 1, '2026-04-18', 2, 1),
(3, 'Great value for the price.', 1, '2026-04-18', 3, 1),
(4, 'Comfortable for city rides.', 1, '2026-04-18', 4, 1),
(5, 'Nice acceleration and braking.', 1, '2026-04-18', 5, 1),
(6, 'I recommend this car for daily use.', 1, '2026-04-18', 6, 1),
(7, 'The SUV was perfect for family travel.', 1, '2026-04-18', 28, 1),
(8, 'Electric car experience was impressive.', 1, '2026-04-18', 23, 1),
(9, 'Reservation process was fast and clear.', 1, '2026-04-18', 16, 1),
(10, 'Pickup truck handled cargo very well.', 1, '2026-04-18', 41, 1),
(11, 'Luxury sedan was super comfortable.', 1, '2026-04-18', 20, 1),
(12, 'Sports car performance is outstanding.', 1, '2026-04-18', 48, 1),
(13, 'Good customer support at pickup.', 1, '2026-04-18', 12, 1),
(14, 'Clean, punctual and easy return process.', 1, '2026-04-18', 18, 1),
(15, 'Strong engine and stable on highway.', 1, '2026-04-18', 39, 1),
(16, 'Affordable and practical.', 1, '2026-04-18', 10, 1),
(17, 'Looks modern and drives quietly.', 1, '2026-04-18', 24, 1),
(18, 'Office staff were very helpful.', 1, '2026-04-18', 32, 1),
(19, 'Perfect for long distance trips.', 1, '2026-04-18', 37, 1),
(20, 'Will rent this one again.', 1, '2026-04-18', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `mgr_ssn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_name`, `location`, `mgr_ssn`) VALUES
(1, 'Downtown Branch', 'Cairo - Downtown', 1),
(2, 'Airport Branch', 'Cairo - Airport Road', 1),
(3, 'Nasr City Branch', 'Cairo - Nasr City', 1),
(4, 'Maadi Branch', 'Cairo - Maadi', 1),
(5, 'Alex Branch', 'Alexandria - Smouha', 1),
(6, 'Mansoura Branch', 'Mansoura - University District', 1),
(7, 'Tanta Branch', 'Tanta - Center', 1),
(8, 'Giza Branch', 'Giza - Dokki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `start_rented_date` date NOT NULL,
  `end_rented_date` date NOT NULL,
  `office_id` int(11) DEFAULT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `fullname`, `email`, `city`, `state`, `zipcode`, `card_name`, `card_number`, `start_rented_date`, `end_rented_date`, `office_id`, `car_id`) VALUES
(1, 'Ahmed Salah', 'ahmed.salah1@mail.com', 'Cairo', 'Cairo', '11511', 'Ahmed Salah', '4111111111111111', '2026-05-01', '2026-05-05', 1, 1),
(2, 'Mona Hany', 'mona.hany2@mail.com', 'Giza', 'Giza', '12555', 'Mona Hany', '4111111111111112', '2026-05-02', '2026-05-07', 2, 4),
(3, 'Youssef Omar', 'youssef.omar3@mail.com', 'Alexandria', 'Alexandria', '21521', 'Youssef Omar', '4111111111111113', '2026-05-03', '2026-05-08', 5, 8),
(4, 'Sara Tarek', 'sara.tarek4@mail.com', 'Cairo', 'Cairo', '11771', 'Sara Tarek', '4111111111111114', '2026-05-04', '2026-05-09', 3, 12),
(5, 'Khaled Samy', 'khaled.samy5@mail.com', 'Mansoura', 'Dakahlia', '35511', 'Khaled Samy', '4111111111111115', '2026-05-05', '2026-05-12', 6, 16),
(6, 'Nour Ali', 'nour.ali6@mail.com', 'Tanta', 'Gharbia', '31511', 'Nour Ali', '4111111111111116', '2026-05-06', '2026-05-10', 7, 20),
(7, 'Heba Adel', 'heba.adel7@mail.com', 'Cairo', 'Cairo', '11661', 'Heba Adel', '4111111111111117', '2026-05-07', '2026-05-11', 4, 24),
(8, 'Mostafa Nabil', 'mostafa.nabil8@mail.com', 'Giza', 'Giza', '12666', 'Mostafa Nabil', '4111111111111118', '2026-05-08', '2026-05-13', 8, 28),
(9, 'Laila Emad', 'laila.emad9@mail.com', 'Alexandria', 'Alexandria', '21622', 'Laila Emad', '4111111111111119', '2026-05-09', '2026-05-14', 5, 32),
(10, 'Karim Ashraf', 'karim.ashraf10@mail.com', 'Cairo', 'Cairo', '11881', 'Karim Ashraf', '4111111111111120', '2026-05-10', '2026-05-16', 2, 36),
(11, 'Rawan Ehab', 'rawan.ehab11@mail.com', 'Cairo', 'Cairo', '11991', 'Rawan Ehab', '4111111111111121', '2026-05-11', '2026-05-14', 1, 40),
(12, 'Tamer Hossam', 'tamer.hossam12@mail.com', 'Mansoura', 'Dakahlia', '35622', 'Tamer Hossam', '4111111111111122', '2026-05-12', '2026-05-18', 6, 44),
(13, 'Hagar Wael', 'hagar.wael13@mail.com', 'Tanta', 'Gharbia', '31622', 'Hagar Wael', '4111111111111123', '2026-05-13', '2026-05-17', 7, 48),
(14, 'Omar Nasser', 'omar.nasser14@mail.com', 'Giza', 'Giza', '12777', 'Omar Nasser', '4111111111111124', '2026-05-14', '2026-05-20', 8, 52),
(15, 'Rana Farouk', 'rana.farouk15@mail.com', 'Cairo', 'Cairo', '11444', 'Rana Farouk', '4111111111111125', '2026-05-15', '2026-05-21', 3, 56),
(16, 'Hossam Fathy', 'hossam.fathy16@mail.com', 'Alexandria', 'Alexandria', '21733', 'Hossam Fathy', '4111111111111126', '2026-05-16', '2026-05-23', 5, 60),
(17, 'Mai Shady', 'mai.shady17@mail.com', 'Cairo', 'Cairo', '11333', 'Mai Shady', '4111111111111127', '2026-05-17', '2026-05-19', 4, 5),
(18, 'Ali Sherif', 'ali.sherif18@mail.com', 'Giza', 'Giza', '12888', 'Ali Sherif', '4111111111111128', '2026-05-18', '2026-05-25', 2, 10),
(19, 'Dina Amr', 'dina.amr19@mail.com', 'Mansoura', 'Dakahlia', '35733', 'Dina Amr', '4111111111111129', '2026-05-19', '2026-05-24', 6, 15),
(20, 'Seif Gamal', 'seif.gamal20@mail.com', 'Tanta', 'Gharbia', '31733', 'Seif Gamal', '4111111111111130', '2026-05-20', '2026-05-27', 7, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `Fullname` varchar(60) NOT NULL,
  `user_email` varchar(120) DEFAULT NULL,
  `user_group_id` int(11) NOT NULL DEFAULT 0,
  `approval` int(11) DEFAULT 1,
  `stat` varchar(20) DEFAULT 'C',
  `user_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `Fullname`, `user_email`, `user_group_id`, `approval`, `stat`, `user_date`) VALUES
(1, 'Admin', '$2y$10$hjyZtftibWu.E3RmJuM2FeHmwNKur9rd3VywNSYdi5LfZ3v6yAOY6', 'Admin', 'admin@automotors.com', 1, 1, 'A', '2026-04-18'),
(5, 'Employee', '$2y$10$TIgSxCCxwMiYz1mpzrtww.6tRsFJcj2lVOKGSptY/g4rukyaoiQ.G', 'Omar', 'employee@automotors.com', 0, 1, 'E', '2026-04-18'),
(6, 'Customer', '$2y$10$78s5movKlJhFMMzcC3WvQ.N6YhcT0EtreGocXI7bJ9Kihjgb5gRJ6', 'Customer', 'customer@automotors.com', 0, 1, 'C', '2026-04-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Car_ID`),
  ADD KEY `FK_Office_id_Car` (`office_id`),
  ADD KEY `FK_user_id_Car` (`member`),
  ADD KEY `FK_Category_id_Car` (`cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK_car_id_comment` (`car_id`),
  ADD KEY `FK_user_id_comment` (`user_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `FK_mgr_ssn_Office` (`mgr_ssn`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `FK_Office_id_Reservation` (`office_id`),
  ADD KEY `FK_car_id_Reservation` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Car_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_Category_id_Car` FOREIGN KEY (`cat_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Office_id_Car` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_Car` FOREIGN KEY (`member`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_car_id_comment` FOREIGN KEY (`car_id`) REFERENCES `car` (`Car_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_id_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `FK_mgr_ssn_Office` FOREIGN KEY (`mgr_ssn`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Office_id_Reservation` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_car_id_Reservation` FOREIGN KEY (`car_id`) REFERENCES `car` (`Car_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
