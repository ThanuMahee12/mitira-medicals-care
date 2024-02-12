-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 07:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `userid` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` text NOT NULL,
  `email` int(11) NOT NULL,
  `role` char(50) NOT NULL DEFAULT 'patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseses`
--

CREATE TABLE `diseses` (
  `disescode` varchar(30) NOT NULL,
  `DisesName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseses`
--

INSERT INTO `diseses` (`disescode`, `DisesName`, `Category`, `description`) VALUES
('ALPS', 'Autoimmune Lymphoproliferative Syndrome', '', ''),
('Autoimmune', 'Autoimmune Diseases', '', ''),
('C19', 'Covid19', '', ''),
('Cholera', 'Cholera', '', ''),
('Dengue', 'Dengue Fever', '', ''),
('HIV', 'Aids', '', ''),
('ICD-CM', 'Asthma', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dises_images`
--

CREATE TABLE `dises_images` (
  `image_id` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `dises_code` varchar(30) DEFAULT NULL,
  `alt` int(11) NOT NULL,
  `isPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicinecode` varchar(50) NOT NULL,
  `MedicineName` varchar(200) NOT NULL,
  `Include` varchar(800) NOT NULL,
  `Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicinecode`, `MedicineName`, `Include`, `Category`) VALUES
('Anti001', 'amoxicillin*', ' Amoxicillin 250mg and 500mg capsule shells contain Gelatin, Carmoisine (E122), Quinoline Yellow (E104), Titanium Dioxide (E171), and Iron Oxide Yellow (E172).', 'AntiBoitic'),
('bab120', '.newlife.*', '.Acid Phos 6: It helps to reduce the weakness, tiredness associated with all the complaints. Calc Phos 6x: For Delayed & Dentition walking, Heals fracture, Joint pains, Weakness it helps. Ferrum Phos 6x.', 'babySurup'),
('bb123', '.BabyBilss.*', '.Podophyllum Pel. Q Chamomilla Q Ocimum Sanc. Q Mentha Pip. 3x Calc. Phos. 3x Calc. Fluor. 3x Lecithin 3x Pepsin 3x.', 'babySurup'),
('bfit120', 'Babyfit', 'Calcarea Phosphorica 1X, Chamomilla 3X Kali Muriaticum 1X, Magnesium Phosphoricum 1X, Natrum Carbonicum 1X, Natrum Podophyllum 3X, Podophyllum 3X..', 'babySurup'),
('Cep100', 'Cephalexin*', ' magnesium stearate, microcrystalline cellulose, polyethylene glycol, polysorbate 80, sodium starch glycolate, and titanium dioxide', 'AntiBoitic'),
('Cev150', 'Cenvitan', ' CENVITAN (MULTIVITAMIN SYRUP) Vitamin A (as a Acetate 20000 I.U)) 40 mg. Vitamin D (as D3 2000 I.U) 50 mcg. Vitamin B1 (Thiamin) 25 mg', 'babySurup'),
('Cip565', 'Ciprofloxacin ', 'microcrystalline cellulose, silicon dioxide, crospovidone, magnesium stearate, hypromellose, titanium dioxide, and polyethylene glycol.', 'AntiBoitic'),
('Cli34', ' Clindamycin ', '', 'AntiBoitic'),
('Com001', 'Panadol500', 'starch,pregelatinised, povidone, maize starch, potassium sorbate, talc, stearic acid, hypromellose, triacetin, and carnauba wax', 'Common'),
('CSy001', 'Infant’s Cough Syrup', 'Tolu 0.04 ml, Acetic acid diluted 0.33 ml, ammonium chloride 80 mg, sodium citrate 40 mg, glycerine 0.20 ml, syrup q.s. to 4 ml.', 'babySurup'),
('Do23', 'Doxycycline', 'are gelatin, magnesium stearate, shellac glaze, sodium lauryl sulfate, starch, quinoline yellow (E104), erythrosine (E127), patent blue V (E131), titanium dioxide (E171), iron oxide black (E172), and propylene glycol.', 'AntiBoitic'),
('Mlt123', 'Multivitamin', 'Grape seed Extract, Ginseng Extract, Green Tea Extract, Ginkgo Biloba Extract, Garlic, Antioxidant, Vitamins, Minerals & Trace Elements Softgel Capsules', 'Common'),
('Parace120mg/5ml', 'Paracetamol 120mg/5ml Oral Suspension', 'Methyl hydroxybenzoate (E218),Propyl hydroxybenzoate (E216),Sucrose 3g/5ml,Sorbitol (E420),Propylene Glycol (E1520)', 'babySurup'),
('VitC500', 'VitaminC500mg', ' gluten, wheat, milk derivatives, preservatives, artificial flavours or artificial sweeteners.', 'Common'),
('wel100', 'Wellbaby', 'With vitamins A, C and D. Vitamin D contributes to', 'babySurup');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_images`
--

CREATE TABLE `medicines_images` (
  `imageId` int(11) NOT NULL DEFAULT current_timestamp(),
  `IMage` longblob NOT NULL,
  `medicinecode` varchar(50) DEFAULT NULL,
  `alt` varchar(100) DEFAULT NULL,
  `isMain` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines_uses`
--

CREATE TABLE `medicines_uses` (
  `medicinecode` varchar(50) DEFAULT NULL,
  `useCode` int(11) NOT NULL,
  `uses` varchar(500) NOT NULL,
  `create_at` varchar(500) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_price`
--

CREATE TABLE `medicine_price` (
  `medicine_cateogry` varchar(300) NOT NULL,
  `medicine_type_code` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `medicinecode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `medicinecode` varchar(50) NOT NULL,
  `serial_num` int(11) NOT NULL,
  `manufacturing_date` date NOT NULL,
  `expried_date` date NOT NULL,
  `store_at` date NOT NULL DEFAULT current_timestamp(),
  `capacity` decimal(8,2) NOT NULL,
  `volume` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_medicine`
--

CREATE TABLE `purchase_medicine` (
  `billlno` int(11) NOT NULL,
  `Medicinecode` varchar(50) NOT NULL,
  `numberofitem` int(11) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_medicine`
--

INSERT INTO `purchase_medicine` (`billlno`, `Medicinecode`, `numberofitem`, `Total`) VALUES
(1001, 'Anti001', 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Reportno` int(11) NOT NULL,
  `patientno` int(11) NOT NULL,
  `Doctorno` int(11) NOT NULL,
  `Descrption` varchar(500) NOT NULL,
  `Medicine` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `symtoms`
--

CREATE TABLE `symtoms` (
  `Symtomcode` int(11) NOT NULL,
  `Symtom` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `create_at` varchar(500) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `rolecode` char(50) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `email` varchar(200) NOT NULL,
  `email_code` varchar(200) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usercode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `user_image_code` varchar(500) NOT NULL,
  `image` longblob NOT NULL,
  `alt` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usercode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile`
--

CREATE TABLE `user_mobile` (
  `mobileid` int(11) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `country_code` char(4) NOT NULL DEFAULT '+94',
  `usercode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `diseses`
--
ALTER TABLE `diseses`
  ADD PRIMARY KEY (`disescode`);

--
-- Indexes for table `dises_images`
--
ALTER TABLE `dises_images`
  ADD KEY `dises_code` (`dises_code`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicinecode`);

--
-- Indexes for table `medicines_images`
--
ALTER TABLE `medicines_images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `medicinecode` (`medicinecode`);

--
-- Indexes for table `medicines_uses`
--
ALTER TABLE `medicines_uses`
  ADD PRIMARY KEY (`useCode`),
  ADD KEY `medicinecode` (`medicinecode`);

--
-- Indexes for table `medicine_price`
--
ALTER TABLE `medicine_price`
  ADD PRIMARY KEY (`medicine_type_code`),
  ADD KEY `medicinecode` (`medicinecode`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`serial_num`),
  ADD KEY `medicinecode` (`medicinecode`);

--
-- Indexes for table `purchase_medicine`
--
ALTER TABLE `purchase_medicine`
  ADD PRIMARY KEY (`billlno`),
  ADD KEY `Medicinecode` (`Medicinecode`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Reportno`);

--
-- Indexes for table `symtoms`
--
ALTER TABLE `symtoms`
  ADD PRIMARY KEY (`Symtomcode`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`rolecode`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`email_code`),
  ADD KEY `usercode` (`usercode`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`user_image_code`),
  ADD KEY `usercode` (`usercode`);

--
-- Indexes for table `user_mobile`
--
ALTER TABLE `user_mobile`
  ADD PRIMARY KEY (`mobileid`),
  ADD KEY `usercode` (`usercode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines_uses`
--
ALTER TABLE `medicines_uses`
  MODIFY `useCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `serial_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_medicine`
--
ALTER TABLE `purchase_medicine`
  MODIFY `billlno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Reportno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symtoms`
--
ALTER TABLE `symtoms`
  MODIFY `Symtomcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_mobile`
--
ALTER TABLE `user_mobile`
  MODIFY `mobileid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`role`) REFERENCES `userroles` (`rolecode`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dises_images`
--
ALTER TABLE `dises_images`
  ADD CONSTRAINT `dises_images_ibfk_1` FOREIGN KEY (`dises_code`) REFERENCES `diseses` (`disescode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `medicines_images`
--
ALTER TABLE `medicines_images`
  ADD CONSTRAINT `medicines_images_ibfk_1` FOREIGN KEY (`medicinecode`) REFERENCES `medicine` (`Medicinecode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `medicines_uses`
--
ALTER TABLE `medicines_uses`
  ADD CONSTRAINT `medicines_uses_ibfk_1` FOREIGN KEY (`medicinecode`) REFERENCES `medicine` (`Medicinecode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `medicine_price`
--
ALTER TABLE `medicine_price`
  ADD CONSTRAINT `medicine_price_ibfk_1` FOREIGN KEY (`medicinecode`) REFERENCES `medicine` (`medicinecode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD CONSTRAINT `medicine_stock_ibfk_1` FOREIGN KEY (`medicinecode`) REFERENCES `medicine` (`Medicinecode`) ON UPDATE CASCADE;

--
-- Constraints for table `user_email`
--
ALTER TABLE `user_email`
  ADD CONSTRAINT `user_email_ibfk_1` FOREIGN KEY (`usercode`) REFERENCES `auth` (`userid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_image`
--
ALTER TABLE `user_image`
  ADD CONSTRAINT `user_image_ibfk_1` FOREIGN KEY (`usercode`) REFERENCES `auth` (`userid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_mobile`
--
ALTER TABLE `user_mobile`
  ADD CONSTRAINT `user_mobile_ibfk_1` FOREIGN KEY (`usercode`) REFERENCES `auth` (`userid`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
