-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 01:20 PM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `big` varchar(200) NOT NULL,
  `small` varchar(200) NOT NULL,
  `t1` varchar(200) NOT NULL,
  `t2` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `big`, `small`, `t1`, `t2`, `link`) VALUES
(1, 'image1_1748710669_88739.jpg', 'image2_1748710669_29614.jpg', 'Hundai Car', 'Smart & Innovative Technology', 'https://www.hyundai.com/in/en/find-a-car/grand-i10-nios/highlights'),
(2, 'image1_1748712008_60865.png', 'image2_1748712008_75370.png', 'RANGE ROVER', 'RANGE ROVER SV BESPOKE RANTHAMBORE EDITION', 'https://www.rangerover.com/en-in/special-vehicle-operations/new-range-rover-sv-bespoke/ranthambore-edition.html'),
(3, 'image1_1748714396_99831.webp', 'image2_1748714396_69343.webp', 'MG Hector', 'DISCOVER THE DIFFERENCE. DRIVE THE FUTURE.', 'https://www.mgmotor.co.in/'),
(4, 'image1_1748714834_14319.webp', 'image2_1748714834_86494.webp', 'Suzuki Nexa ', 'HEARTECT-e, the pure electric platform offers a long wheelbase, maximises interior space to provide unparalleled legroom and comfort.', 'https://www.nexaexperience.com/e-vitara');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) DEFAULT NULL,
  `p_id` varchar(200) DEFAULT NULL,
  `qty` varchar(200) DEFAULT '1',
  `size` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `u_id`, `p_id`, `qty`, `size`) VALUES
(3, '2', '1', '1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `subcat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `logo`, `cat`, `subcat`) VALUES
(5, '../cat/image_683b177d1689b7.58874971.jpg', 'Petrol Car', 'Petrol Engine'),
(6, '../cat/image_683b179e39f186.06357703.png', 'Diesel Car', 'Diesel Engine'),
(7, '../cat/image_683b17bfc49263.26524943.png', 'Electric Car', 'Battery Cars'),
(8, '../cat/image_683b346fb35881.27711088.png', 'CNG Cars', 'CNG Natural Gas');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `max_use` int(11) DEFAULT NULL,
  `used_yet` int(11) DEFAULT 0,
  `expired` varchar(200) DEFAULT '0',
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `des` text DEFAULT NULL,
  `cond` varchar(200) DEFAULT NULL,
  `max_cart` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `discount`, `type`, `max_use`, `used_yet`, `expired`, `date`, `des`, `cond`, `max_cart`) VALUES
(1, '03', '', 'PERCENT', 0, 0, '0', '2025-05-31 16:59:33', '', '3', ''),
(2, '03', '2', 'AMOUNT', 4, 0, '0', '2025-05-31 17:00:10', 'The New Grand i10 NIOS will catch your eye with its bold stance and contemporary design', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `ban` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`id`, `email`, `name`, `lname`, `company`, `phone`, `state`, `city`, `address1`, `address2`, `pincode`, `landmark`, `ban`) VALUES
(1, 'chinthanvinyasa@gmail.com', 'Chinthan', 'Vinyasa', 'Vinyasa', '9743903683', 'Karnataka', ' Mangalore ', 'Smart Tower1st floor', 'Jyothi, Mangalore', '575001', 'Balmatta New Road', '0'),
(2, 'deepubhandary2003@gmail.com', 'New User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `p_id`, `u_id`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 3, 1),
(4, 2, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `stock` varchar(200) DEFAULT '1',
  `num` varchar(200) DEFAULT '0',
  `price` varchar(200) DEFAULT NULL,
  `cat` varchar(200) DEFAULT NULL,
  `subcat` varchar(200) DEFAULT NULL,
  `shop` varchar(200) DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `reviews` varchar(200) DEFAULT '0',
  `star` varchar(200) DEFAULT '0',
  `discount` varchar(200) DEFAULT NULL,
  `shop_id` varchar(200) DEFAULT NULL,
  `des_short` text DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `img3` varchar(200) DEFAULT NULL,
  `img4` varchar(200) DEFAULT NULL,
  `max_price` varchar(200) DEFAULT NULL,
  `disable` varchar(200) DEFAULT '0',
  `size` varchar(200) DEFAULT NULL,
  `specs` text DEFAULT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `stock`, `num`, `price`, `cat`, `subcat`, `shop`, `img1`, `reviews`, `star`, `discount`, `shop_id`, `des_short`, `img2`, `img3`, `img4`, `max_price`, `disable`, `size`, `specs`, `state`) VALUES
(1, 'Hundai i20 N Line', '1', '2', '894600', '5', '0', 'Ram', '1748709498hundai-i20-n-line7pc.jpg', '0', '0', '10', '1', 'Hyundai offers a diverse range of Hyundai cars, from stylish Hyundai hatchback cars and comfortable Hyundai sedan cars to powerful Hyundai SUVs cars, each designed for performance, safety, and innovation. Leading the way in sustainable mobility, Hyundai electric cars provide eco-friendly driving without compromising on power and style. With advanced technology, seamless connectivity, and cutting-edge safety features, Hyundai ensures a superior driving experience for every journey. Explore Hyundai’s world-class vehicles and drive into the future with confidence!', '1748709498hundai-i20-n-line_pc.png', '1748709498hundai-i20-n-line2pc.jpg', '1748709498hundai-i20-n-line4pc.jpg', '994000', '0', '', 'Created to maximise driving fun every time you hit the road, the new Hyundai i20 N Line delivers a sporty experience that will make you want to play. Featuring the perfect balance of motorsport styling and innovative technology, this car is built for every day fun, with an ex-showroom price starting at just Rs. 9.99* Lakh.\r\n\r\nBold & Stylish Design\r\nThe New Grand i10 NIOS will catch your eye with its bold stance and contemporary design\r\n\r\nSmart & Innovative Technology\r\nThe New Grand i10 NIOS comes with Best-in-segment 20.25 cm Touchscreen Infotainment system with smartphone connectivity.', 'Karnataka'),
(2, 'RANGE ROVER SV BESPOKE RANTHAMBORE EDITION', '1', '7', '10876800', '5', '0', 'Ram', '1748711541Range_Rover_Ranthambore_Editon_Front_Hero_48487498_IN.avif', '0', '0', '4', '1', 'RANGE ROVER SV BESPOKE RANTHAMBORE EDITION\r\n\r\nLimited to 12 examples, Ranthambore Edition is the first ever specially crafted vehicle for India. The special edition evokes the strong presence and character of the Tiger in its natural habitat and draws inspiration from the important role that Ranthambore National Park plays in the preservation of this rare species. Curated by SV Bespoke, it showcases the pinnacle of Range Rover brand’s luxury personalization service.', '1748711541Range_Rover_Ranthambore_Edition_Rear_48487498_IN.avif', '1748711541RR_SV_Ranthembore_Full_Cabin_48487498_IN.avif', '1748711541RR_SV_Ranthembore_Full_Cabin_48487498_IN.avif', '11330000', '0', 'First Edition', 'EXPERTLY CRAFTED BESPOKE INTERIOR\r\n\r\nThe interior of the Ranthambore Edition epitomises SV Bespoke luxury and craftsmanship. It is a striking combination of Caraway and light Perlino semi-aniline leather with contrast stitching, and the artistic embroidery on the seats is inspired by the dynamic motif of the stripes on the spine of the tiger. Customised scatter cushions, noble chrome jewellery finishes, light linear wenge veneers and white ceramic dials also make striking contributions to a truly unique and ultra-luxurious cabin.\r\nFully reclinable seats provide optimal comfort in the rear of the long wheelbase Range Rover SV Ranthambore Edition. A powered club table, deployable cupholders and a refrigerated compartment complete with SV etched glassware further add to the exclusivity of the SV Signature Suite. Custom details on the Ranthambore Edition include Bespoke paint, accents, wheels, embroidered seats and cushions and SV Bespoke branded tread plates with ‘Ranthambore Edition’ and ‘1 of 12’ designation.', 'Karnataka'),
(3, 'MG Hector', '1', '5', '1382250', '8', '0', 'Ram', '1748714058front-374079685_600x400.avif', '0', '0', '3', '1', 'MG Hector is a 5-seater SUV car with price starting from Rs. 14.25 lakh. The car is available in petrol manual, petrol automatic and diesel manual configurations in 7 colours and 19 variants. The car is offered with 2 liter diesel & 1.5 liter petrol engines. Hector has petrol mileage of 13.79 and diesel mileage of 15.58 kmpl. Hector is a tough competitor to Mahindra XUV700, Tata Harrier and Toyota Innova Hy cross.', '1748714058front-1-4-left-1465287064_600x400.avif', '1748714058front-374079685_600x400.avif', '1748714058fog-lamp-with-control-373778166_600x400.avif', '1425000', '0', 'First Edition', 'MG Hector price starts at Rs. 14.25 Lakh(ex-showroom) for the base model in India while the top model price goes upto Rs. 23.14 Lakh. Hector diesel models price starts from Rs. 18.58 Lakh . Moreover the Hector automatic models in petrol starts at Rs. 17.97 Lakh onwards.\r\n\r\nFeatures: The MG Hector packs a 14-inch portrait-style infotainment screen, automatic turn indicators, improved connected car technology, a panoramic sunroof (control the percentage of opening via the infotainment), and ambient lighting (multiple colours). The list of features further includes a powered tailgate, ventilated front seats, wireless phone charging and heated outer rear-view mirrors. Safety features include up to six airbags, ABS with EBD, parking sensors, a 360-degree camera, ADAS technology and electronic stability control.\r\n\r\nEngine: The MG Hector gets two powertrain options: a 143PS 1.5-litre turbo-petrol and a 170PS 2-litre diesel engine. A 6-speed manual gearbox comes as standard, while an optional CVT transmission is offered with the petrol powertrain. The MG Hector has a length of 4699mm, width of 1835mm and height of 1760mm. It has a wheelbase of 2750mm.\r\n\r\nRivals: The MG Hector fights it out with the Hyundai Creta, Tata Harrier, Jeep Compass, Maruti Suzuki Grand Vitara, Kia Seltos and Mahindra XUV700 5-seater.\r\n\r\nVariants: The MG Hector is offered in six variants: Style, Shine Pro, Select Pro, Smart Pro, Sharp Pro and the range-topping Savvy Pro. The MG Hector gets seven colour options: Dune Brown, Havana Grey, Candy White, Aurora Silver, White and Black (dual-tone), Glaze Red, and Starry Black.', '--SELECT STATE--'),
(4, 'Maruthi Suzuki Swift', '1', '14', '548799', '6', '0', 'Ram', '1748715336suzuki_swift_ext_360_blue_v-1_0.webp', '0', '0', '2', '1', 'The Maruti Suzuki Swift is a household name in India. It has achieved a cult status with all three generations of the Maruti Swift improving on the mantra of a sporty hatchback that would be fun for enthusiasts, but at the same time, not cost a lot to maintain and be a comfortable car for the family as well. The Swift is instantly recognisable on Indian roads because of its years of service and the fact that it looks different than anything else on the road. This little fact has always been a key ingredient of the Swift since the onset.', '1748715336suzuki_swift_ext_360_blue_v-1_6.webp', '1748715336suzuki_swift_ext_360_blue_v-1_38.webp', '1748715336suzuki_swift_ext_360_blue_v-1_52.webp', '559999', '0', 'First Edition', 'The price of the Maruti Suzuki Swift starts at Rs. 5.92 lakh for the base variant and goes up to Rs. 8.85 lakh for the top end variant. The Swift is offered in a total of 9 variants, that include LXi, VXi, VXi CNG, VXi AGS, ZXi, ZXi AGS, ZXi AGS, ZXi+, and ZXi+ AGS.\r\n\r\nThe Maruti Suzuki Swift is a 5-seater hatchback measuring 3845 mm in length, 1735 mm in width, 1530 mm in height, and a 2450 mm wheelbase. A ground clearance of 163 mm allows the Swift to handle rough patches of road with ease. The Maruti Swift is equipped with a 1.2-litre petrol engine offered with either a 5-speed manual or a 5-speed AMT automatic transmission.\r\n\r\nThe Maruti Suzuki Swift is a household name in India. It has achieved a cult status with all three generations of the Maruti Swift improving on the mantra of a sporty hatchback that would be fun for enthusiasts, but at the same time, not cost a lot to maintain and be a comfortable car for the family as well.', 'Karnataka'),
(5, 'Battery Car', '1', '1', '610007', '7', '0', 'Ram', '1748775993suzuki_swift_ext_360_blue_v-1_6.webp', '0', '0', '39', '1', 'hi', '1748775993suzuki_swift_ext_360_blue_v-1_52.webp', '1748775993suzuki_swift_ext_360_blue_v-1_0.webp', '1748775993fog-lamp-with-control-373778166_600x400.avif', '1000012', '0', 'BIG,VERY BIG', 'Origin:India,Model:Big Model,Color:Blue', 'Arunachal Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `shop_id` varchar(200) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` varchar(200) DEFAULT '0',
  `order_id` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'ordered',
  `order_time` varchar(200) DEFAULT NULL,
  `pickup_time` varchar(200) DEFAULT NULL,
  `del_time` varchar(200) DEFAULT NULL,
  `t_id` varchar(200) DEFAULT NULL,
  `coupon` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `paid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_id`, `p_id`, `shop_id`, `qty`, `price`, `order_id`, `status`, `order_time`, `pickup_time`, `del_time`, `t_id`, `coupon`, `discount`, `size`, `paid`) VALUES
(1, 1, 1, '1', 1, '894600', 'ID5525234829', 'delivered', '31-05-2025', '31-05-2025', '31-05-2025', 'Order Recived', '', '', '', 'COD'),
(2, 1, 4, '1', 1, '548799', 'ID5525234829', 'delivered', '31-05-2025', '31-05-2025', '31-05-2025', 'Order Recived', '', '', '0', 'COD'),
(3, 1, 2, '1', 1, '10876800', 'ID4806153538', 'ordered', '01-06-2025', NULL, NULL, NULL, '', '', '0', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) DEFAULT NULL,
  `review` varchar(2000) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `star` varchar(200) DEFAULT NULL,
  `short_rev` varchar(50) DEFAULT NULL,
  `p_id` varchar(200) DEFAULT NULL,
  `abuse` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `pending` varchar(200) DEFAULT '1',
  `lat` varchar(200) DEFAULT NULL,
  `lon` varchar(200) DEFAULT NULL,
  `ban` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `email`, `phone`, `address`, `password`, `pending`, `lat`, `lon`, `ban`) VALUES
(1, 'Ram', 'Ram@gmail.com', '9743903683', 'Mangalore', '123', '0', 'Jyothi', 'Jyothi', '0'),
(2, 'Royal Cars', 'royal@gmail.com', '784596123', ' Ujjodi, near Alva’s tyre care, Pumpwell, Mangaluru', '123', '0', 'Mangalore', 'mangalore', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) DEFAULT NULL,
  `p_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
