-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2019 at 04:29 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `dashboard_watchlist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` int(11) DEFAULT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accounts_account_type_id_foreign` (`account_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `code`, `description`, `dashboard_watchlist`, `required`, `account_type_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Advance Tax', 'Advance Tax', 'Any tax which is paid in advance is recorded into the advance tax account. This advance tax payment could be a quarterly, half yearly or yearly payment.', '0', 1, 3, 1, 1, '1995-12-30 16:21:16', '1983-02-20 22:44:32'),
(2, 'Employee Advance', 'Employee Advance', 'Money paid out to an employee in advance can be tracked here till it is repaid or shown to be spent for company purposes.', '0', 1, 3, 1, 1, '2013-06-13 11:12:41', '1977-11-07 08:53:39'),
(3, 'Petty Cash', 'Petty Cash', 'It is a small amount of cash that is used to pay your minor or casual expenses rather than writing a check.', '0', 1, 4, 1, 1, '2001-08-12 12:18:08', '2003-06-11 02:37:50'),
(4, 'Undeposited Funds', 'Undeposited Funds', 'Record funds received by your company yet to be deposited in a bank as undeposited funds and group them as a current asset in your balance sheet.', '0', 1, 4, 1, 1, '1988-05-15 11:58:06', '2010-03-11 04:25:25'),
(5, 'Accounts Receivable', 'Accounts Receivable', 'The money that customers owe you becomes the accounts receivable. A good example of this is a payment expected from an invoice sent to your customer.', '0', 1, 2, 1, 1, '2009-03-26 03:47:32', '1989-04-08 19:02:06'),
(6, 'Inventory Asset', 'Inventory Asset', 'An account which tracks the value of goods in your inventory.', '0', 1, 7, 1, 1, '2015-03-02 22:26:59', '2012-04-05 00:05:36'),
(7, 'Opening Balance Adjustments', 'Opening Balance Adjustments', 'This account will hold the difference in the debits and credits entered during the opening balance.', '0', 1, 9, 1, 1, '2007-12-25 08:41:21', '2018-08-29 14:09:17'),
(8, 'Employee Reimbursements', 'Employee Reimbursements', 'This account can be used to track the reimbursements that are due to be paid out to employees.', '0', 1, 9, 1, 1, '2013-08-23 21:33:09', '1988-09-13 14:29:33'),
(9, 'Tax Payable', 'Tax Payable', 'The amount of money which you owe to your tax authority is recorded under the tax payable account. This amount is a sum of your outstanding in taxes and the tax charged on sales.', '0', 1, 9, 1, 1, '2002-03-17 08:37:26', '2010-04-25 11:54:47'),
(10, 'Unearned Revenue', 'Unearned Revenue', 'A liability account that reports amounts received in advance of providing goods or services. When the goods or services are provided, this account balance is decreased and a revenue account is increased.', '0', 1, 9, 1, 1, '1985-08-01 00:28:44', '1986-01-21 11:33:27'),
(11, 'Accounts Payable', 'Accounts Payable', 'This is an account of all the money which you owe to others like a pending bill payment to a vendor,etc.', '0', 1, 13, 1, 1, '2004-01-13 05:58:25', '2001-11-26 02:18:45'),
(12, 'Tag Adjustments', 'Tag Adjustments', 'This adjustment account tracks the transfers between different reporting tags.', '0', 1, 12, 1, 1, '2003-10-31 18:01:44', '2014-06-23 01:30:57'),
(13, 'Drawings', 'Drawings', 'The money withdrawn from a business by its owner can be tracked with this account.', '0', 1, 14, 1, 1, '1993-04-13 02:05:59', '2001-07-02 01:17:20'),
(14, 'Opening Balance Offset', 'Opening Balance Offset', 'This is an account where you can record the balance from your previous years earning or the amount set aside for some activities. It is like a buffer account for your funds.', '0', 1, 14, 1, 1, '1990-11-23 23:07:35', '1985-01-15 06:11:31'),
(15, 'Owner Equity', 'Owner Equity', 'The owners rights to the assets of a company can be quantified in the owner\'s equity account.', '0', 1, 14, 1, 1, '1987-10-19 04:48:13', '1990-10-11 20:15:51'),
(16, 'Sales', 'Sales', 'The income from the sales in your business is recorded under the sales account.', '0', 1, 15, 1, 1, '2001-11-04 05:57:07', '1975-02-19 07:35:47'),
(17, 'General Income', 'General Income', 'A general category of account where you can record any income which cannot be recorded into any other category.', '0', 1, 15, 1, 1, '1980-10-01 09:14:34', '1996-12-03 13:47:25'),
(18, 'Other Charges', 'Other Charges', 'Miscellaneous charges like adjustments made to the invoice can be recorded in this account.', '0', 1, 15, 1, 1, '2002-02-06 02:25:24', '2012-11-08 02:34:31'),
(19, 'Interest Income', 'Interest Income', 'A percentage of your balances and deposits are given as interest to you by your banks and financial institutions. This interest is recorded into the interest income account.', '0', 1, 15, 1, 1, '1995-10-29 02:52:06', '1990-07-12 08:34:18'),
(20, 'Shipping Charge', 'Shipping Charge', 'Shipping charges made to the invoice will be recorded in this account.', '0', 1, 15, 1, 1, '1986-05-02 11:19:43', '2000-07-07 01:16:50'),
(21, 'Discount', 'Discount', 'Any reduction on your selling price as a discount can be recorded into the discount account.', '0', 1, 15, 1, 1, '2005-08-28 03:23:42', '2013-05-19 03:43:38'),
(22, 'Late Fee Income', 'Late Fee Income', 'Any late fee income is recorded into the late fee income account. The late fee is levied when the payment for an invoice is not received by the due date.', '0', 1, 15, 1, 1, '1984-11-23 10:12:22', '1988-08-27 21:02:38'),
(23, 'Other Expenses', 'Other Expenses', 'Any minor expense on activities unrelated to primary business operations is recorded under the other expense account.', '0', 1, 17, 1, 1, '2017-06-08 11:29:31', '2010-03-02 23:55:14'),
(24, 'Bad Debt', 'Bad Debt', 'Any amount which is lost and is unrecoverable is recorded into the bad debt account.', '0', 1, 17, 1, 1, '1973-02-06 19:07:39', '2004-04-25 16:37:09'),
(25, 'Exchange Gain or Loss', 'Exchange Gain or Loss', 'Changing the conversion rate can result in a gain or a loss. You can record this into the exchange gain or loss account.', '0', 1, 19, 1, 1, '1998-06-05 22:16:37', '2011-11-17 09:36:28'),
(26, 'Cost of Goods Sold', 'Cost of Goods Sold', 'An expense account which tracks the value of the goods sold.', '0', 1, 18, 1, 1, '2002-02-11 04:16:37', '1992-04-30 20:55:50'),
(27, 'Prepaid Expense', 'Prepaid Expense', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', '0', 1, 3, 1, 1, '2000-07-23 09:43:52', '2010-04-12 04:14:33'),
(28, 'Bank 1', 'Bank', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', '0', 1, 5, 1, 1, '2001-09-28 22:23:52', '2019-08-03 23:18:10'),
(29, 'Bank 2', 'Bank', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', '0', 1, 5, 1, 1, '2007-09-02 21:24:59', '1972-06-14 05:49:51'),
(30, 'Agent Commission', 'Agent Commission', 'Agent Commission.', '0', 1, 3, 1, 1, '2019-01-30 13:41:04', '2019-05-28 23:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

DROP TABLE IF EXISTS `account_types`;
CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `parent_account_id` int(10) UNSIGNED NOT NULL,
  `required` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_types_parent_account_id_foreign` (`parent_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `description`, `parent_account_id`, `required`, `created_at`, `updated_at`) VALUES
(1, 'Other Asset', 'Track special assets like goodwill and other intangible assets', 1, 0, '1992-05-04 22:18:31', '1975-05-19 08:55:06'),
(2, 'Accounts Receivable', 'Reflects money owed to you by your customers. Zoho Books provides a default Accounts Receivable account. E.g. Unpaid Invoices', 1, 1, '2013-11-14 16:06:31', '2009-01-05 14:40:56'),
(3, 'Other Current asset', 'Any short term asset that can be converted into cash or cash equivalents easily - Prepaid expenses - Stocks and Mutual Funds', 1, 0, '1975-07-30 08:18:59', '1980-11-06 21:05:44'),
(4, 'Cash', 'To keep track of cash and other cash equivalents like petty cash, undeposited funds, etc.', 1, 0, '1971-11-29 09:16:12', '2015-11-06 05:17:44'),
(5, 'Bank', 'To keep track of bank accounts like Savings, Checking, and Money Market accounts', 1, 0, '1982-05-28 15:46:58', '2013-07-16 14:14:39'),
(6, 'Fixed asset', 'Any long term investment or an asset that cannot be converted into cash easily like:-Land and Buildings - Plant, Machinery and Equipment - Computers -Furniture', 1, 0, '1991-10-26 20:48:42', '1980-03-21 02:38:48'),
(7, 'Stock', 'To keep track of your inventory assets.', 1, 0, '1986-03-28 18:00:51', '2007-04-21 11:21:45'),
(8, 'Stock', 'To keep track of your inventory assets.', 1, 0, '1999-03-07 07:17:06', '1991-08-28 00:48:16'),
(9, 'Other Current Liability', 'Any short term liability like:Customer Deposits - Tax Payable', 2, 0, '2018-06-26 01:19:49', '1997-05-15 14:28:40'),
(10, 'Credit Card', 'Create a trail of all your credit card transactions by creating a credit card account', 2, 0, '1976-10-20 02:29:48', '1991-04-02 00:03:31'),
(11, 'Long Term Liability', 'Liabilities that mature after a minimum period of one year like Notes Payable, Debentures, and Long Term Loans', 2, 0, '1998-03-30 06:28:11', '1999-03-29 05:21:39'),
(12, 'Other Liability', 'Obligation of an entity arising from past transactions or events which would require repayment.- Tax to be paid Loan to be Repaid Accounts Payable etc', 2, 0, '1994-03-30 00:54:15', '1997-02-04 04:05:50'),
(13, 'Accounts Payable', 'Accounts Payable', 2, 1, '1971-07-04 21:09:52', '1994-05-31 02:04:48'),
(14, 'Equity', 'Equity', 3, 0, '1991-05-07 07:02:54', '1974-06-27 15:32:58'),
(15, 'income', 'income', 4, 0, '1991-05-10 16:50:17', '2000-10-01 03:14:28'),
(16, 'Other Income', 'Other Income', 4, 0, '1980-06-12 01:52:43', '1984-12-21 16:01:13'),
(17, 'Expense', 'Expense', 5, 0, '2001-12-21 09:42:11', '1975-08-30 20:50:49'),
(18, 'Cost of Goods Sold', 'Cost of Goods Sold', 5, 0, '1998-08-02 17:13:32', '2013-01-04 20:50:48'),
(19, 'Other Expense', 'Other Expense', 5, 0, '1996-06-23 16:06:54', '2013-06-09 06:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1, '2019-08-13 18:00:00', '2019-08-16 18:00:00', '2019-08-18 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_parent_id_foreign` (`parent_id`),
  KEY `areas_created_by_foreign` (`created_by`),
  KEY `areas_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `title`, `parent_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'dhaka', NULL, 1, 1, '2019-08-16 18:00:00', '2019-08-18 12:46:49'),
(2, 'Rangpur', NULL, 1, 1, '2019-08-18 11:11:37', '2019-08-18 11:11:37'),
(3, 'park gonj', 2, 1, 1, '2019-08-18 11:55:51', '2019-08-18 11:55:51'),
(4, 'asdsd', 1, 1, 1, '2019-08-18 11:57:51', '2019-08-18 11:57:51'),
(5, 'Motijhil', 1, 1, 1, '2019-08-18 12:45:49', '2019-08-18 12:45:49'),
(6, 'park2', 2, 1, 1, '2019-08-18 13:44:26', '2019-08-18 13:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` int(11) DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `ward_union` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_para` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ofiice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentcategories`
--

DROP TABLE IF EXISTS `contentcategories`;
CREATE TABLE IF NOT EXISTS `contentcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contentcategories_parent_id_foreign` (`parent_id`),
  KEY `contentcategories_created_by_foreign` (`created_by`),
  KEY `contentcategories_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_category_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_encode_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_thumb_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` tinyint(4) NOT NULL DEFAULT '0',
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `shareable` tinyint(4) NOT NULL DEFAULT '0',
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL DEFAULT '0',
  `copy_protect` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `use_count` int(11) NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_content_category_id_foreign` (`content_category_id`),
  KEY `contents_created_by_foreign` (`created_by`),
  KEY `contents_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `content_category_id`, `type`, `file_name`, `file_encode_path`, `cover_thumb_img`, `tags`, `license`, `description`, `shareable`, `paid`, `price`, `size`, `copy_protect`, `status`, `use_count`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 's', NULL, 's', 's', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(2, 'as', NULL, 'as', 'as', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2019-08-22 18:00:00', '2019-08-22 18:00:00'),
(3, 's', NULL, 'image', 'file_0a358cd1921af28fad222f42a1a8f6ec5fabbc8f.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(4, 's', NULL, 'image', 'file_873785065e75c78a2ff0f71d2a7296c1110a64e4.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(5, 's', NULL, 'image', 'file_6d1d1290bf85c8336b8b2e5477cbbe34ed6f56e0.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(6, 'ss', NULL, 'image', 'file_1af87300dc0b96933844c9dc760e837753818846.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(7, 'aaas', NULL, 'audio', 'file_dcbe5f94cc4bef4c4727d7331de7b0b5d2610d07.mp4', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(8, 'a', NULL, 'image', 'file_34c78e4d6e30e5cf6ee18b4bea376318b024ae24.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(9, 'ss', NULL, 'image', 'file_7b4e3fcf5c34736a99798b8d57b6de8196a04166.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(10, 'ss', NULL, 'image', 'file_f07b23e81f0d0db3a16766722f91e7a4c9c0fe9c.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(11, 'dd', NULL, 'image', 'file_4a900ec05396adc99c11856c7e45dd2b5a421786.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01'),
(12, 'mm', NULL, 'image', 'file_d1a531436416e734703dbe939050868ed3a16b27.jpg', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '1970-01-01 00:00:01', '1970-01-01 00:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `utility` double DEFAULT NULL,
  `car_parking` double DEFAULT NULL,
  `registration_cost` double DEFAULT NULL,
  `other_cost` double DEFAULT NULL,
  `gift` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `account_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `bank_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incomes_account_id_foreign` (`account_id`),
  KEY `incomes_agent_id_foreign` (`agent_id`),
  KEY `incomes_customer_id_foreign` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` longtext COLLATE utf8mb4_unicode_ci,
  `tax_total` double DEFAULT NULL,
  `shipping_charge` double DEFAULT NULL,
  `adjustment` double DEFAULT NULL,
  `commission` double DEFAULT NULL,
  `commission_id` int(10) UNSIGNED DEFAULT NULL,
  `pr_adjustment` double DEFAULT NULL,
  `pr_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_note` longtext COLLATE utf8mb4_unicode_ci,
  `save` tinyint(4) DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  `installment_status` int(11) DEFAULT NULL,
  `installment_type` int(11) DEFAULT NULL,
  `installment_date` int(11) DEFAULT NULL,
  `installment_number` int(11) DEFAULT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  KEY `invoices_agent_id_foreign` (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_infos`
--

DROP TABLE IF EXISTS `land_infos`;
CREATE TABLE IF NOT EXISTS `land_infos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `land_amount` double(8,2) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `land_infos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_01_21_053110_create_contacts_table', 1),
(8, '2019_01_28_154408_create_land_infos_table', 1),
(9, '2019_01_28_154519_create_product_categories_table', 1),
(10, '2019_01_28_154554_create_products_table', 1),
(11, '2019_01_29_055730_create_project_categories_table', 1),
(12, '2019_01_29_055937_create_projects_table', 1),
(13, '2019_02_03_161728_create_payment_modes_table', 1),
(14, '2019_02_03_161729_create_parent_accounts_table', 1),
(15, '2019_02_03_161818_create_account_types_table', 1),
(16, '2019_02_03_161828_create_accounts_table', 1),
(17, '2019_02_03_161849_create_taxes_table', 1),
(18, '2019_02_03_161850_create_incomes_table', 1),
(20, '2019_08_17_115631_create_areas_table', 2),
(21, '2019_08_09_034202_create_ContentCategories_table', 3),
(22, '2019_08_09_034332_create_Contents_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3dbdf475a4559dd233a60959cdca0bbdeb573ccd3f8323bcc77e0560cb0ba0c792ff390a674da430', 1, 1, 'Password Access Token', '[]', 0, '2019-08-23 09:23:36', '2019-08-23 09:23:36', '2020-08-23 15:23:36'),
('5550f36859548146da7fedc03a87746b3650d7069c7b6e6cd71ef374158171dcb8dbb4eac0212227', 1, 1, 'Password Access Token', '[]', 0, '2019-08-17 17:29:10', '2019-08-17 17:29:10', '2020-08-17 23:29:10'),
('73be96382ec010a0ac83851ab401643f2dbfd724fa66d9b0248a05b94acc52a74789c05fa06f9904', 1, 1, 'Password Access Token', '[]', 0, '2019-08-16 05:45:41', '2019-08-16 05:45:41', '2020-08-16 11:45:41'),
('81c1a29b89eed95d7b9073e4f4686fc5755c636d8b53ce1282493e6e91e3bf82b673a6d9473ca5a0', 1, 1, 'Password Access Token', '[]', 0, '2019-08-22 19:53:27', '2019-08-22 19:53:27', '2020-08-23 01:53:27'),
('8f321659f3e7c2ab1bd405bfe560fb154ae60192e35a8b0704b95b2ac0fb155dc2ea5df446bbe823', 1, 1, 'Password Access Token', '[]', 0, '2019-08-21 06:05:59', '2019-08-21 06:05:59', '2020-08-21 12:05:59'),
('d39e04209b3ce314774ed85e57fcb2cf08aeaf798be7fb46daffe5cf535aeef1f4c3c792e9ab4701', 1, 1, 'Password Access Token', '[]', 0, '2019-08-24 00:45:55', '2019-08-24 00:45:55', '2020-08-24 06:45:55'),
('e7086adc4626e4edb8e63def26404f147a504353723c2e3b9b74666c87ed1780a4837543d4c44662', 1, 1, 'Password Access Token', '[]', 0, '2019-08-24 13:19:13', '2019-08-24 13:19:13', '2020-08-24 19:19:13'),
('f4972317d9f98c67e03f84dbe49058c5db8ad4896b5a9199d66617d40ef227038a1009e409dabace', 1, 1, 'Password Access Token', '[]', 0, '2019-08-20 11:49:53', '2019-08-20 11:49:53', '2020-08-20 17:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'V3c0OewHhz0A5cxREz3h519CfcQ0ElO8k6SFA59G', 'http://localhost', 1, 0, 0, '2019-08-16 04:46:54', '2019-08-16 04:46:54'),
(2, NULL, 'Laravel Password Grant Client', 'We1Dc98ahCCt2CQuqcMgbXt6BzdBldjhieCR5aT2', 'http://localhost', 0, 1, 0, '2019-08-16 04:46:55', '2019-08-16 04:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-16 04:46:55', '2019-08-16 04:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_accounts`
--

DROP TABLE IF EXISTS `parent_accounts`;
CREATE TABLE IF NOT EXISTS `parent_accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_accounts`
--

INSERT INTO `parent_accounts` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Assets', 'Assets', '2013-10-27 14:56:29', '1999-03-27 23:31:51'),
(2, 'Liability', 'Liability', '2002-04-23 08:35:05', '1970-04-12 14:31:58'),
(3, 'Equity', 'Equity', '2014-03-10 21:35:26', '1999-04-07 12:03:31'),
(4, 'Income', 'income', '1979-08-28 19:04:43', '2017-05-16 13:02:55'),
(5, 'Expense', 'Expense', '2008-08-19 19:20:12', '2002-09-18 04:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

DROP TABLE IF EXISTS `payment_modes`;
CREATE TABLE IF NOT EXISTS `payment_modes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, '5P9930DYW9fFJVe2WojgNy1ktGI1sKqd', '2019-08-16 05:45:36', '2019-08-16 05:45:36'),
(2, 1, 'sPY3eQTkmMCtHaUh4cmxFB3orII1kcSi', '2019-08-17 17:29:05', '2019-08-17 17:29:05'),
(3, 1, 'D7jRNqRGX1niRLaCGJwYZGdQZ3J2enwS', '2019-08-20 11:49:52', '2019-08-20 11:49:52'),
(4, 1, 'V9gCAXfVpArlJ4ozKIWDF3jwddRBLwUv', '2019-08-21 06:05:58', '2019-08-21 06:05:58'),
(5, 1, 'Ag34okVlIAn1TsJsDX9NnxlarYQfWrX8', '2019-08-22 19:53:26', '2019-08-22 19:53:26'),
(6, 1, 't3b8rYySr8lw4VDRDjVBp3FfY3tMt5mn', '2019-08-23 09:23:35', '2019-08-23 09:23:35'),
(7, 1, 'l5KT50vKQWQPswdb5kSMDQZgDm5ZQi26', '2019-08-24 00:45:54', '2019-08-24 00:45:54'),
(8, 1, 'hR575mNIrR5aiSfkSpFyWx35vb29PdAX', '2019-08-24 13:19:13', '2019-08-24 13:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `block_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sales_price` double(8,2) DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_product_category_id_foreign` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `project_category_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sales_price` double(8,2) DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_project_category_id_foreign` (`project_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

DROP TABLE IF EXISTS `project_categories`;
CREATE TABLE IF NOT EXISTS `project_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `permissions2` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `permissions2`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'abc', '1', '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_percentage` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taxes_created_by_foreign` (`created_by`),
  KEY `taxes_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `email_verified_at`, `name`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1', '2019-08-24 13:19:13', '2019-08-16 05:16:19', 'Dale Lebsack', 'F65E7RAF9t', 1, '2019-08-16 05:16:19', '2019-08-24 13:19:13'),
(2, 'bergstrom.baby@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Cyril Hill', '8DMw9joZt5', NULL, '2019-08-16 05:16:19', '2019-08-16 05:16:19'),
(3, 'xhalvorson@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Norbert Blanda', 'FKCceHEf7o', NULL, '2019-08-16 05:16:19', '2019-08-16 05:16:19'),
(4, 'fritsch.soledad@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Timmothy Mante', 'Vr17iquKaM', NULL, '2019-08-16 05:16:19', '2019-08-16 05:16:19'),
(5, 'gerhold.raul@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Miss Emelia Rogahn', 'DrMYtrymgS', NULL, '2019-08-16 05:16:19', '2019-08-16 05:16:19'),
(6, 'qflatley@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Tabitha Rohan', '0UnCNf0fXW', NULL, '2019-08-16 05:16:19', '2019-08-16 05:16:19'),
(7, 'marvin.carlos@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Catherine Mertz DVM', 'yC7KaFHnqW', NULL, '2019-08-16 05:16:20', '2019-08-16 05:16:20'),
(8, 'inikolaus@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Prof. Tina Dooley', 'PZx5flnk4p', NULL, '2019-08-16 05:16:20', '2019-08-16 05:16:20'),
(9, 'izaiah.collier@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Paris Fritsch', 'PPsEJ7qmxm', NULL, '2019-08-16 05:16:20', '2019-08-16 05:16:20'),
(10, 'tremblay.gerson@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', NULL, NULL, '2019-08-16 05:16:19', 'Robb Tillman', 'xolQ923C85', NULL, '2019-08-16 05:16:20', '2019-08-16 05:16:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_types`
--
ALTER TABLE `account_types`
  ADD CONSTRAINT `account_types_parent_account_id_foreign` FOREIGN KEY (`parent_account_id`) REFERENCES `parent_accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `areas_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `areas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land_infos`
--
ALTER TABLE `land_infos`
  ADD CONSTRAINT `land_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taxes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
