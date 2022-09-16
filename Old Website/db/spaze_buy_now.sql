<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2021 at 09:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaze_buy_now`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `id` int(11) NOT NULL,
  `snapToken` varchar(255) NOT NULL,
  `transactionId` varchar(55) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `country` varchar(55) NOT NULL,
  `productName` varchar(55) NOT NULL,
  `location` varchar(55) NOT NULL,
  `terms` varchar(25) NOT NULL,
  `promoCode` varchar(25) NOT NULL,
  `priceGross` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_data`
--

INSERT INTO `customer_data` (`id`, `snapToken`, `transactionId`, `fName`, `lName`, `email`, `phoneNumber`, `address`, `city`, `state`, `zip`, `country`, `productName`, `location`, `terms`, `promoCode`, `priceGross`) VALUES
(1, '', '1885712674', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(2, '', '1646664535', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(3, '', '1442510258', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(4, '', '887839993', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(5, '', '1486112127', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(6, 'db7abb3e-0151-456d-bb7b-dcfce0d91b77', '817236056', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(7, 'b2e2a9be-d997-4de8-813e-49fd9f6adda5', '318212002', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(8, '415b083b-06d1-4b6d-bc37-1731f72b5efa', '1783750788', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(9, '5308d99f-b3ed-4967-ae23-f38ed302313a', '1949995264', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(10, '4e7678e9-37c2-46c1-8b79-5a8442fdc2f8', '756414417', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(11, '3e8536f7-6558-4f92-b298-97ae7c73f9a1', '283854634', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(12, 'd9629fa1-2b18-4fc3-81c2-e4d6699abd91', '1963615878', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(13, 'e821473f-feb8-401a-8394-919003239938', '1700479544', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(14, 'd3a71a01-bb18-484b-a53b-b57aee7b85be', '1958975091', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(15, 'd73a43cf-4f89-419b-ae1e-024d8800fd43', '124506638', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(16, '195da752-020e-4314-a326-7b5793500bd7', '1045055517', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(17, 'b0f7e533-dcad-4f52-ace1-f03a10afe8c8', '160131786', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(18, 'caf8837f-a025-4284-be33-0744127f4138', '1949291115', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(19, '480afc6e-e1a5-4c0e-8394-0842a04c5278', '1105267830', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(20, 'f1c7ddbc-2ee2-49e0-8b7c-0fed855a1e91', '1797138677', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(21, '077af566-9fb3-4112-af91-6d5d4f3513fa', '1901893629', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(22, '17a6c6c2-27bf-4c69-ac47-7b8dd43bf821', '2059399983', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(23, '20116fff-a01a-4a2e-b8e4-7b4eddf35b09', '486848126', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(24, '21b3d029-b0bf-4d12-b6cd-6c13293c7d42', '823925604', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(25, 'd8a98395-ac28-4365-9a29-30c6d19e45d4', '936824294', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(26, '2075421c-3736-4cb2-8f5b-185779857bc0', '2146169004', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(27, '9ad81353-31fa-4806-aa64-24a076818d78', '498941898', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(28, '4e5c02cb-c2cb-4ed8-a345-5c282f5bea5f', '2099826570', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(29, '4cd3fa24-bad3-4927-813e-a53c2fd9e581', '1913436344', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(30, '91813d9d-d7da-4425-bc48-2b79959aab44', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(31, 'ff4617a3-7877-4255-b9b0-b69cf9796d4f', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(32, '87d1aa6b-f983-4435-8653-1accef777c4f', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(33, '5f6de72e-2e4e-4c2d-98c9-265b7425a959', '146896530', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(34, 'cf62a66c-6081-4ed4-9b1d-7a2a176a9b4d', '797034542', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(35, 'b5ad6b34-e195-404f-9d62-94d853a92945', '853768263', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(36, '63524085-0a1c-48b4-82c5-84078190ab59', '1920221761', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(37, '59f0b32e-8a2f-446a-8b50-3239ed11503f', '1920221761', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(38, '1691f04f-143f-47cf-b71d-e47618f7f0a1', '1226623241', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(39, '39cd00fc-8d07-4db7-93d8-242c17911a41', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(40, '4357f120-04d1-4448-b38c-4d4722eda454', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(41, '23cc9e25-9e22-4c0d-81a9-b43f86071441', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(42, 'cfb11268-0d6e-4fa3-bfd9-170b425c480c', 'VO-08054114', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(43, '93e7a088-604d-442a-86c8-c6aacc529f82', 'VO-08054114', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(44, '03688388-aa37-451f-bc1c-4d75354fd3a9', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(45, '266f10c0-b5a6-4614-9ce6-51cc273309b4', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(46, 'be65e648-1f05-4de6-9d2b-5a0ac29df64f', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(47, 'bf84bc3f-bc14-4e91-8c43-532c834e7c1f', 'VO-08050915', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(48, 'fa292659-6d17-49c1-8312-044c0ee2b50b', 'VO-08050915', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(49, '4647623b-c263-4437-b577-bff71dc50b7a', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(50, '5363483e-86f6-473f-87be-31a0f783e56a', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(51, '0cb1ad07-1074-42e7-aa62-121ceae1ab60', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(52, '29ded432-a9ad-400b-ae35-e50a7bd1fdac', 'VO-08055998', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(53, 'c4ab28c4-6dbc-441a-bf7f-584699dabef5', 'VO-08050313', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(54, 'aaeb88c0-8105-47a1-9ba1-c4b926ad8ed7', 'VO-08050313', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(55, '97fd6a65-ba1b-4762-aa4c-c4b9ede02ef7', 'VO-08053165', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(56, '2a4fdbf2-e5f2-431d-b603-a84f973135b0', 'VO-08053530', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(57, '9d6d2f2c-1132-4d90-b9d0-f1ca4599ce3b', 'VO-08050917', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(58, '1f096e64-8cf5-4032-a4a9-4552c1e50685', 'VO-08051095', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(59, '5b4b09cb-c2d6-4bd9-b8d4-43c65fe080ab', 'VO-08052886', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(60, 'd09d15b3-2e0d-4db4-8860-e4cb2e34fcc0', 'VO-08053367', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(61, 'a4eb00ee-6f64-4a70-ac77-3ba85ad16f43', 'VO-08054936', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(62, 'f5393e64-8142-414c-ae13-1150af85fc71', 'VO-08054061', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(63, 'c125adc9-030e-4d9e-a29f-49cd72e82dbd', 'VO-08050213', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(64, 'b1ecebc5-fe75-420c-894a-49ac613414f2', 'VO-08051196', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(65, '0d002646-a33e-404b-94fc-e89ab5d44f80', 'VO-08052550', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(66, '51d7d9bf-e562-4da7-88f6-0d732f88046a', 'VO-08053159', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(67, 'c10532b6-f0fb-40d5-9af4-bce61697fbb9', 'VO-08051660', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(68, 'a84c4a34-a80a-4dba-af39-5c7d5a27119a', 'VO-08052526', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(69, '489d48a4-75c8-4ad3-8e9e-61dca942517a', 'VO-08055211', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(70, '80066d9a-3a32-44c4-98c3-2b73e75153e4', 'VO-08054228', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(71, '61690a74-1fae-46cb-931f-d002f25760a1', 'VO-08055053', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(72, '334ccca9-45e3-4612-a753-f744d46c3056', 'VO-08054228', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(73, '6ed7157c-4648-4149-8a52-19a2d0a5bd36', 'VO-08055426', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(74, '2dad9091-4ebf-4610-b8d7-8c273d1c0db3', 'VO-08050419', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(75, '07057c1a-8547-4f61-a8dd-12dc50cfb4c1', 'VO-08052761', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(76, '8c6c0f8f-bae9-457f-9d16-1dc869afb68d', 'VO-08055057', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(77, '90f4eaa1-94de-4c70-bd70-44f6a270e15a', 'VO-08054479', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(78, 'd5dbc040-14c8-46f4-801a-5f61f93040b1', 'VO-08050383', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(79, '827ddd30-2ef1-4537-a67d-7a7dc8aab6cc', 'VO-08053536', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(80, '676f8dc4-4a6e-4446-b44a-868949cd5f3a', 'FS-08061775', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Flex Space', 'Spaze Grogol', '1 Month', '', '150000'),
(81, '3eff8666-d94d-43f2-bf3c-6012d158fa59', 'FS-08062619', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Flex Space', 'Spaze Grogol', '1 Month', '', '150000'),
(82, '2ad8b8db-185d-4f94-8f06-265c1712d821', 'FS-08060073', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '08111111', '', '', '', '', '', 'Flexible Workspace', 'Spaze Grogol', '10 Hours', '', '1375000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2021 at 09:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaze_buy_now`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `id` int(11) NOT NULL,
  `snapToken` varchar(255) NOT NULL,
  `transactionId` varchar(55) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `country` varchar(55) NOT NULL,
  `productName` varchar(55) NOT NULL,
  `location` varchar(55) NOT NULL,
  `terms` varchar(25) NOT NULL,
  `promoCode` varchar(25) NOT NULL,
  `priceGross` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_data`
--

INSERT INTO `customer_data` (`id`, `snapToken`, `transactionId`, `fName`, `lName`, `email`, `phoneNumber`, `address`, `city`, `state`, `zip`, `country`, `productName`, `location`, `terms`, `promoCode`, `priceGross`) VALUES
(1, '', '1885712674', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(2, '', '1646664535', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(3, '', '1442510258', 'Test', '', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(4, '', '887839993', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(5, '', '1486112127', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(6, 'db7abb3e-0151-456d-bb7b-dcfce0d91b77', '817236056', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(7, 'b2e2a9be-d997-4de8-813e-49fd9f6adda5', '318212002', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(8, '415b083b-06d1-4b6d-bc37-1731f72b5efa', '1783750788', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(9, '5308d99f-b3ed-4967-ae23-f38ed302313a', '1949995264', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(10, '4e7678e9-37c2-46c1-8b79-5a8442fdc2f8', '756414417', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(11, '3e8536f7-6558-4f92-b298-97ae7c73f9a1', '283854634', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(12, 'd9629fa1-2b18-4fc3-81c2-e4d6699abd91', '1963615878', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(13, 'e821473f-feb8-401a-8394-919003239938', '1700479544', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(14, 'd3a71a01-bb18-484b-a53b-b57aee7b85be', '1958975091', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(15, 'd73a43cf-4f89-419b-ae1e-024d8800fd43', '124506638', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(16, '195da752-020e-4314-a326-7b5793500bd7', '1045055517', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(17, 'b0f7e533-dcad-4f52-ace1-f03a10afe8c8', '160131786', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(18, 'caf8837f-a025-4284-be33-0744127f4138', '1949291115', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(19, '480afc6e-e1a5-4c0e-8394-0842a04c5278', '1105267830', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(20, 'f1c7ddbc-2ee2-49e0-8b7c-0fed855a1e91', '1797138677', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(21, '077af566-9fb3-4112-af91-6d5d4f3513fa', '1901893629', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(22, '17a6c6c2-27bf-4c69-ac47-7b8dd43bf821', '2059399983', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(23, '20116fff-a01a-4a2e-b8e4-7b4eddf35b09', '486848126', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(24, '21b3d029-b0bf-4d12-b6cd-6c13293c7d42', '823925604', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(25, 'd8a98395-ac28-4365-9a29-30c6d19e45d4', '936824294', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(26, '2075421c-3736-4cb2-8f5b-185779857bc0', '2146169004', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(27, '9ad81353-31fa-4806-aa64-24a076818d78', '498941898', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(28, '4e5c02cb-c2cb-4ed8-a345-5c282f5bea5f', '2099826570', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(29, '4cd3fa24-bad3-4927-813e-a53c2fd9e581', '1913436344', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(30, '91813d9d-d7da-4425-bc48-2b79959aab44', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(31, 'ff4617a3-7877-4255-b9b0-b69cf9796d4f', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(32, '87d1aa6b-f983-4435-8653-1accef777c4f', '626428346', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(33, '5f6de72e-2e4e-4c2d-98c9-265b7425a959', '146896530', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(34, 'cf62a66c-6081-4ed4-9b1d-7a2a176a9b4d', '797034542', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(35, 'b5ad6b34-e195-404f-9d62-94d853a92945', '853768263', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(36, '63524085-0a1c-48b4-82c5-84078190ab59', '1920221761', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(37, '59f0b32e-8a2f-446a-8b50-3239ed11503f', '1920221761', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(38, '1691f04f-143f-47cf-b71d-e47618f7f0a1', '1226623241', 'Test', 'Snaptoken', 'hadiyusufalghifari@gmail.com', '08111111', 'assa', 'asas', 'asas', '121222', 'asasas', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(39, '39cd00fc-8d07-4db7-93d8-242c17911a41', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(40, '4357f120-04d1-4448-b38c-4d4722eda454', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(41, '23cc9e25-9e22-4c0d-81a9-b43f86071441', 'VO-08052539', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(42, 'cfb11268-0d6e-4fa3-bfd9-170b425c480c', 'VO-08054114', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(43, '93e7a088-604d-442a-86c8-c6aacc529f82', 'VO-08054114', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(44, '03688388-aa37-451f-bc1c-4d75354fd3a9', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(45, '266f10c0-b5a6-4614-9ce6-51cc273309b4', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(46, 'be65e648-1f05-4de6-9d2b-5a0ac29df64f', 'VO-08053038', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(47, 'bf84bc3f-bc14-4e91-8c43-532c834e7c1f', 'VO-08050915', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(48, 'fa292659-6d17-49c1-8312-044c0ee2b50b', 'VO-08050915', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(49, '4647623b-c263-4437-b577-bff71dc50b7a', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(50, '5363483e-86f6-473f-87be-31a0f783e56a', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(51, '0cb1ad07-1074-42e7-aa62-121ceae1ab60', 'VO-08051826', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(52, '29ded432-a9ad-400b-ae35-e50a7bd1fdac', 'VO-08055998', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(53, 'c4ab28c4-6dbc-441a-bf7f-584699dabef5', 'VO-08050313', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(54, 'aaeb88c0-8105-47a1-9ba1-c4b926ad8ed7', 'VO-08050313', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(55, '97fd6a65-ba1b-4762-aa4c-c4b9ede02ef7', 'VO-08053165', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(56, '2a4fdbf2-e5f2-431d-b603-a84f973135b0', 'VO-08053530', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(57, '9d6d2f2c-1132-4d90-b9d0-f1ca4599ce3b', 'VO-08050917', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', 'jl Jendral Sudirman', 'Jakarta', 'DKI Jakarta', '15111', 'Indonesia', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(58, '1f096e64-8cf5-4032-a4a9-4552c1e50685', 'VO-08051095', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(59, '5b4b09cb-c2d6-4bd9-b8d4-43c65fe080ab', 'VO-08052886', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(60, 'd09d15b3-2e0d-4db4-8860-e4cb2e34fcc0', 'VO-08053367', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(61, 'a4eb00ee-6f64-4a70-ac77-3ba85ad16f43', 'VO-08054936', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(62, 'f5393e64-8142-414c-ae13-1150af85fc71', 'VO-08054061', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(63, 'c125adc9-030e-4d9e-a29f-49cd72e82dbd', 'VO-08050213', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(64, 'b1ecebc5-fe75-420c-894a-49ac613414f2', 'VO-08051196', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(65, '0d002646-a33e-404b-94fc-e89ab5d44f80', 'VO-08052550', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(66, '51d7d9bf-e562-4da7-88f6-0d732f88046a', 'VO-08053159', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(67, 'c10532b6-f0fb-40d5-9af4-bce61697fbb9', 'VO-08051660', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(68, 'a84c4a34-a80a-4dba-af39-5c7d5a27119a', 'VO-08052526', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(69, '489d48a4-75c8-4ad3-8e9e-61dca942517a', 'VO-08055211', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(70, '80066d9a-3a32-44c4-98c3-2b73e75153e4', 'VO-08054228', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(71, '61690a74-1fae-46cb-931f-d002f25760a1', 'VO-08055053', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(72, '334ccca9-45e3-4612-a753-f744d46c3056', 'VO-08054228', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(73, '6ed7157c-4648-4149-8a52-19a2d0a5bd36', 'VO-08055426', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(74, '2dad9091-4ebf-4610-b8d7-8c273d1c0db3', 'VO-08050419', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(75, '07057c1a-8547-4f61-a8dd-12dc50cfb4c1', 'VO-08052761', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(76, '8c6c0f8f-bae9-457f-9d16-1dc869afb68d', 'VO-08055057', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(77, '90f4eaa1-94de-4c70-bd70-44f6a270e15a', 'VO-08054479', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(78, 'd5dbc040-14c8-46f4-801a-5f61f93040b1', 'VO-08050383', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(79, '827ddd30-2ef1-4537-a67d-7a7dc8aab6cc', 'VO-08053536', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Virtual Office', 'Spaze Grogol', '1 Month', '', '3700000'),
(80, '676f8dc4-4a6e-4446-b44a-868949cd5f3a', 'FS-08061775', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Flex Space', 'Spaze Grogol', '1 Month', '', '150000'),
(81, '3eff8666-d94d-43f2-bf3c-6012d158fa59', 'FS-08062619', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '0877777777', '', '', '', '', '', 'Flex Space', 'Spaze Grogol', '1 Month', '', '150000'),
(82, '2ad8b8db-185d-4f94-8f06-265c1712d821', 'FS-08060073', 'Hadi', 'Yusuf', 'hadiyusufalghifari@gmail.com', '08111111', '', '', '', '', '', 'Flexible Workspace', 'Spaze Grogol', '10 Hours', '', '1375000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> 74fb2cee (update)
