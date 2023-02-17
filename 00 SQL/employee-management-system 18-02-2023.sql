-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '1 = present, 2 = absent, 3 = leave, 4 = holiday, 5 = late, 6 = half day',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-02-01', '1', NULL, NULL),
(2, 8, '2023-02-02', '2', NULL, NULL),
(3, 8, '2023-02-03', '3', NULL, NULL),
(4, 8, '2023-02-04', '5', NULL, NULL),
(5, 8, '2023-02-06', '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_favicon` varchar(255) DEFAULT NULL,
  `company_career_mail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `company_address`, `company_phone`, `company_email`, `company_website`, `company_logo`, `company_favicon`, `company_career_mail`, `created_at`, `updated_at`) VALUES
(1, 'Tech Rajshahi', '4th Floor, Sheikh Kamal IT Training And Incubation Center, Rajshahi 6201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

CREATE TABLE `company_policies` (
  `id` int(10) UNSIGNED NOT NULL,
  `late_attendance_rule` varchar(255) DEFAULT NULL,
  `half_day_absent_rule` varchar(255) DEFAULT NULL,
  `half_day_absent_rule_value` varchar(255) DEFAULT NULL,
  `half_day_absent_rule_value_type` varchar(255) DEFAULT NULL,
  `full_day_absent_rule` varchar(255) DEFAULT NULL,
  `full_day_absent_rule_value` varchar(255) DEFAULT NULL,
  `full_day_absent_rule_value_type` varchar(255) DEFAULT NULL,
  `paid_leave_rule` varchar(255) DEFAULT NULL,
  `unpaid_leave_rule` varchar(255) DEFAULT NULL,
  `office_start_time` time DEFAULT NULL,
  `office_end_time` time DEFAULT NULL,
  `attendance_buffer_time` bigint(20) DEFAULT NULL,
  `attendance_bonus_rule` varchar(255) DEFAULT NULL,
  `attendance_bonus_rule_value` varchar(255) DEFAULT NULL,
  `attendance_bonus_rule_value_type` varchar(255) DEFAULT NULL,
  `overtime_rule` varchar(255) DEFAULT NULL,
  `overtime_rule_value` varchar(255) DEFAULT NULL,
  `overtime_rule_value_type` varchar(255) DEFAULT NULL,
  `launch_wastage_rule` varchar(255) DEFAULT NULL,
  `launch_wastage_rule_value` varchar(255) DEFAULT NULL,
  `yearly_paid_leaves` varchar(255) DEFAULT NULL,
  `festival_bonus_rule` varchar(255) DEFAULT NULL,
  `festival_bonus_rule_value` varchar(255) DEFAULT NULL,
  `festival_bonus_rule_value_type` varchar(255) DEFAULT NULL,
  `weekly_holiday` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_policies`
--

INSERT INTO `company_policies` (`id`, `late_attendance_rule`, `half_day_absent_rule`, `half_day_absent_rule_value`, `half_day_absent_rule_value_type`, `full_day_absent_rule`, `full_day_absent_rule_value`, `full_day_absent_rule_value_type`, `paid_leave_rule`, `unpaid_leave_rule`, `office_start_time`, `office_end_time`, `attendance_buffer_time`, `attendance_bonus_rule`, `attendance_bonus_rule_value`, `attendance_bonus_rule_value_type`, `overtime_rule`, `overtime_rule_value`, `overtime_rule_value_type`, `launch_wastage_rule`, `launch_wastage_rule_value`, `yearly_paid_leaves`, `festival_bonus_rule`, `festival_bonus_rule_value`, `festival_bonus_rule_value_type`, `weekly_holiday`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '50', NULL, '1', '100', NULL, '6', '1', '09:00:00', '17:00:00', 30, '1', '1000', '2', '1', NULL, NULL, '2', '2', '7', '2', '20', '1', '0', 1, NULL, '2023-02-10 11:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Active, 2 for Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NuDawn', 'nudawn', 'NuDawn', 1, '2023-02-15 12:39:28', '2023-02-15 12:39:28'),
(2, 'ZonHack', 'zonhack', '--', 1, '2023-02-15 12:39:40', '2023-02-15 12:39:40'),
(3, 'Graphics', 'graphics', '--', 1, '2023-02-15 12:39:49', '2023-02-15 12:39:49'),
(4, 'GearShark & RamPeaks', 'gearshark-rampeaks', '--', 1, '2023-02-15 12:40:15', '2023-02-15 12:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `temporary_role` bigint(20) UNSIGNED DEFAULT NULL,
  `monthly_salary` double(8,2) DEFAULT NULL,
  `awards_won` int(11) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `user_id`, `department_id`, `designation_id`, `team_lead_id`, `temporary_role`, `monthly_salary`, `awards_won`, `joining_date`, `created_at`, `updated_at`) VALUES
(1, '1612001', 5, 4, 1, NULL, NULL, NULL, NULL, NULL, '2023-02-17 10:53:06', '2023-02-17 10:53:06'),
(2, '1612003', 6, 1, 3, NULL, NULL, 25000.00, NULL, NULL, '2023-02-17 10:54:22', '2023-02-17 10:54:22'),
(3, '1612004', 7, 1, 2, NULL, NULL, 35000.00, NULL, NULL, '2023-02-17 10:56:16', '2023-02-17 10:56:16'),
(6, '1612008', 10, 3, 8, NULL, NULL, 15000.00, 0, NULL, '2023-02-17 11:21:04', '2023-02-17 11:21:04'),
(7, '1612009', 11, 3, 8, NULL, NULL, 15000.00, 0, NULL, '2023-02-17 11:25:11', '2023-02-17 11:25:11'),
(8, '1612010', 12, 1, 3, NULL, NULL, 20000.00, 2, NULL, '2023-02-17 11:26:18', '2023-02-17 11:26:18'),
(9, '1612011', 13, 2, 3, NULL, NULL, 15000.00, 1, NULL, '2023-02-17 11:27:53', '2023-02-17 11:27:53'),
(10, '1612012', 14, 3, 7, NULL, NULL, 20000.00, 0, NULL, '2023-02-17 11:31:46', '2023-02-17 11:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Active, 2 for Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Business Development Manager', 'business-development-manager', '-', 1, '2023-02-15 12:46:33', '2023-02-15 12:46:33'),
(2, 'E-commerce Account Manager', 'e-commerce-account-manager', '-', 1, '2023-02-15 12:46:50', '2023-02-15 12:46:50'),
(3, 'E-Commerce Account Coordinator', 'e-commerce-account-coordinator', '-', 1, '2023-02-15 12:47:00', '2023-02-15 12:47:00'),
(4, 'E-Commerce Account Coordinator Team Lead', 'e-commerce-account-coordinator-team-lead', '-', 1, '2023-02-15 12:47:10', '2023-02-15 12:47:10'),
(5, 'Senior PPC Manager', 'senior-ppc-manager', '-', 1, '2023-02-15 12:47:32', '2023-02-15 12:47:32'),
(6, 'Junior PPC Manager', 'junior-ppc-manager', '-', 1, '2023-02-15 12:47:40', '2023-02-15 12:47:40'),
(7, 'Senior Graphic Designer', 'senior-graphic-designer', '-', 1, '2023-02-15 12:47:50', '2023-02-15 12:47:50'),
(8, 'Mid Graphic Designer', 'mid-graphic-designer', '-', 1, '2023-02-15 12:48:01', '2023-02-15 12:48:01'),
(9, 'Junior Graphic Desinger', 'junior-graphic-desinger', '-', 1, '2023-02-15 12:48:09', '2023-02-15 12:48:09'),
(10, 'Senior Content Writter', 'senior-content-writter', '-', 1, '2023-02-15 12:48:20', '2023-02-15 12:48:20'),
(11, 'Junior Content Writer', 'junior-content-writer', '-', 1, '2023-02-15 12:48:35', '2023-02-15 12:48:35'),
(12, 'E-Commerce Account Coordinator [Walmart]', 'e-commerce-account-coordinator-walmart', '-', 1, '2023-02-15 12:48:58', '2023-02-15 12:48:58');

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
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `is_weekend` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `date`, `is_weekend`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pohela Boishakh', '2023-04-14', 0, '', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_29_190855_create_holidays_table', 1),
(7, '2023_02_09_161540_create_company_details_table', 1),
(8, '2023_01_30_164632_create_company_policies_table', 2),
(26, '2023_02_10_185848_create_departments_table', 7),
(27, '2023_02_10_190714_create_employee_roles_table', 8),
(32, '2023_02_10_191011_create_role_managers_table', 9),
(33, '2023_02_10_191108_create_permission_managers_table', 9),
(34, '2014_10_12_000000_create_users_table', 10),
(38, '2023_02_12_201650_create_employees_table', 11),
(39, '2023_02_17_182123_create_attendances_table', 12);

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
-- Table structure for table `permission_managers`
--

CREATE TABLE `permission_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `employee_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `employee_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `employee_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `employee_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `attendance_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `attendance_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `attendance_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `attendance_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `holiday_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `holiday_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `holiday_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `holiday_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `company_policy_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `company_policy_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `company_policy_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `company_policy_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `launch_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `launch_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `launch_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `launch_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `leaves_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `leaves_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `leaves_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `leaves_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `departments_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `departments_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `departments_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `departments_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `accounts_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `accounts_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `accounts_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `accounts_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `payroll_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `payroll_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `payroll_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `payroll_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `report_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `report_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `report_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `report_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `task_management_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `task_management_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `task_management_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `task_management_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `administration_read` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `administration_create` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `administration_update` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `administration_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1 for Granted, 0 for Rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_managers`
--

INSERT INTO `permission_managers` (`id`, `role_id`, `employee_read`, `employee_create`, `employee_update`, `employee_delete`, `attendance_read`, `attendance_create`, `attendance_update`, `attendance_delete`, `holiday_read`, `holiday_create`, `holiday_update`, `holiday_delete`, `company_policy_read`, `company_policy_create`, `company_policy_update`, `company_policy_delete`, `launch_read`, `launch_create`, `launch_update`, `launch_delete`, `leaves_read`, `leaves_create`, `leaves_update`, `leaves_delete`, `departments_read`, `departments_create`, `departments_update`, `departments_delete`, `accounts_read`, `accounts_create`, `accounts_update`, `accounts_delete`, `payroll_read`, `payroll_create`, `payroll_update`, `payroll_delete`, `report_read`, `report_create`, `report_update`, `report_delete`, `task_management_read`, `task_management_create`, `task_management_update`, `task_management_delete`, `administration_read`, `administration_create`, `administration_update`, `administration_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-02-15 12:53:58', '2023-02-15 12:53:58'),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-02-15 12:54:09', '2023-02-16 10:31:39'),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, '2023-02-15 12:54:27', '2023-02-16 10:39:01'),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

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
-- Table structure for table `role_managers`
--

CREATE TABLE `role_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Active, 2 for Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_managers`
--

INSERT INTO `role_managers` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SA Admin', 'sa-admin', '-', 1, '2023-02-15 12:51:11', '2023-02-15 12:51:11'),
(2, 'Super Admin', 'super-admin', '-', 1, '2023-02-15 12:51:22', '2023-02-15 12:51:22'),
(3, 'Admin', 'admin', '-', 1, '2023-02-15 12:51:29', '2023-02-15 12:51:29'),
(4, 'Launch Manager', 'launch-manager', '-', 1, '2023-02-15 12:51:37', '2023-02-15 12:51:37'),
(5, 'Employee', 'employee', '-', 1, '2023-02-15 12:52:03', '2023-02-15 12:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `cspwdbycrt` longtext DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `blood_group`, `email_verified_at`, `password`, `role_id`, `cspwdbycrt`, `remember_token`, `status`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mahfuz', 'Rahman', '1612000', 'support@techrajshahi.com', 'XXXXXXX', 'A+', NULL, '$2y$10$FreFl0YVMlWvuOJr0i7/M.E7YCHCYypIJEd375FBkjG91tjrrFTsG', 2, 'eyJpdiI6IjYvcTA3WmFnME9KajgwemY1SGxtR2c9PSIsInZhbHVlIjoibEZDVEM1cG90UGplQkpRU0ltaWlDQT09IiwibWFjIjoiODkxOTFjZDNjZjM2ZjE4NjUxYjgzYWVkYjU3MTRjYmUzNjBjOGVlMDNmYzM2N2NmMzZlNDc2OTM0ZWU5YjJmYiIsInRhZyI6IiJ9', NULL, 1, 'img_1676568703.png', NULL, '2023-02-16 11:31:43', '2023-02-16 11:31:43'),
(5, 'Md. Shahinur', 'Rahman', '1612001', 'support-x@techrajshahi.com', 'XXXXXXX', 'A+', NULL, '$2y$10$Zqavc5Epmo0.qT0WPvJF9O9titNnOStcc2PGrGhSy3yljRRmLK.3a', 3, 'eyJpdiI6IjVDeUpvMm9UZks2ZVV6SitNRFZsT3c9PSIsInZhbHVlIjoibFUwUEM0SllUZjI0aWhFSHYwcyswUT09IiwibWFjIjoiYTkxY2JjNWZiY2ExOTA5YzBkODczYjQyNTBlOTYyYWI0YTBlNTBiMDA2MTEzNzUwNzUxMjZmNGYwNDIwYTIzZSIsInRhZyI6IiJ9', NULL, 1, 'img_1676652786.png', NULL, '2023-02-17 10:53:06', '2023-02-17 10:53:06'),
(6, 'MD. Gajiur Rahman', 'Shihab', '1612003', 'support-xx@techrajshahi.com', 'XXXXXXX', 'A+', NULL, '$2y$10$6TNlfme.WHRJVtQdGYV1eOwDl52jBd0opapJGZfFYUr5NPq5MVQq6', 5, 'eyJpdiI6IitkWDBYaExFd3kzdXdwVEZ5RTQzc1E9PSIsInZhbHVlIjoiZGptTXh3WmljS3N1aDN5MlNKeHJkUT09IiwibWFjIjoiMTFhYjZmYjMwMzU3MjM1NjJhMDE1M2Y1NThkMTM2YTdiODEzN2Q3ZjU4NDA4NWNhNWIzYjU5NGM4MWFjYTFkMiIsInRhZyI6IiJ9', NULL, 1, 'img_1676652862.png', NULL, '2023-02-17 10:54:22', '2023-02-17 10:54:22'),
(7, 'Md. Mahfuzur', 'Rahman', '1612004', 'support-xxx@techrajshahi.com', 'XXXXXXX', 'A+', NULL, '$2y$10$yMtu4XUVTkWQL1OcRzprMOrEE6KN8UFOJ4FRVbsaQto.a9byDn2Ta', 3, 'eyJpdiI6ImxrWmh2TWNWb0pWRURSYWpzNkNPQnc9PSIsInZhbHVlIjoidmFEdjVBZGo3NUVCZ3JuQjRUbDdNQT09IiwibWFjIjoiY2Y3Zjg1ZTQxZjM5MGE4OGY3NjRhNGExYzg0OWQzODM2ZTk1Mjc2MGNhZmNkOGUxNjY2MzUwZTA5ZTc4NjkwNSIsInRhZyI6IiJ9', NULL, 1, 'img_1676652976.png', NULL, '2023-02-17 10:56:16', '2023-02-17 10:56:16'),
(10, 'Mst. Iffat', 'Ara', '1612008', 'support-08@techrajshahi.com', 'XXXXXXX', 'B+', NULL, '$2y$10$OMtubDgGWXL0bzUdL02Q2.r.64vvtzZ9FRDymDw97kx/vDEgENbpi', 5, 'eyJpdiI6ImQ3ZWNZdVVWelVkOERJb0laR2twVkE9PSIsInZhbHVlIjoiWThMV21xSFBEME5mUUcydUdpalFIdz09IiwibWFjIjoiZWM3N2E4OWIyYjM3ZTlmMzlkMWI4N2RmZTUzMjYyYjNkMmZiYzMzNWRmZWY4N2RkMzFmMzM4YzY0ZjdhNTQ1NCIsInRhZyI6IiJ9', NULL, 1, 'img_1676654464.png', NULL, '2023-02-17 11:21:04', '2023-02-17 11:21:04'),
(11, 'Md. Mejanur Rahman', 'Mejan', '1612009', 'support-09@techrajshahi.com', 'XXXXXXX', 'B+', NULL, '$2y$10$YaQNxPlSzdnEWiEqAbDXROwCsyg8SeBeBa8cncpWFbqNR/9Lroh0W', 5, 'eyJpdiI6Ijhya1grcmNVS1RPak5MdGNmU0tvaEE9PSIsInZhbHVlIjoiVFFRak5nUFRVWVpzMThNOUR4MGQwUT09IiwibWFjIjoiZDMwN2IwMDA5N2M1NzhlODA4ZDQ3MzdhNDViODc5ZWEwNWRiMDk5Njg1MzEwNzRlMzRjNTRiMTExZmM3M2M4MyIsInRhZyI6IiJ9', NULL, 1, 'img_1676654711.png', NULL, '2023-02-17 11:25:11', '2023-02-17 11:25:11'),
(12, 'Sagin Jahan', 'Jahan', '1612010', 'support-10@techrajshahi.com', 'XXXXXXX', 'B+', NULL, '$2y$10$/J.C67VX3j3cezAcg4ydIeJnUenOweU5BhpT4bI8QCicHtrvWE9Z.', 5, 'eyJpdiI6Imx2M1NZMmxQOVpLK0RCSVdsMWJjV0E9PSIsInZhbHVlIjoiMEdhMHQzNTU1ejkyUVR4OVh5N0RsUT09IiwibWFjIjoiNzYwMjcwYTQ1YzlmYjdlYzIzNjJkZmRjZTk3ZmM5NTcyNzkyYTE0ZWE3YWQwMGU5ODIwZjc5YzIxNTg2Njk5ZCIsInRhZyI6IiJ9', NULL, 1, 'img_1676654778.png', NULL, '2023-02-17 11:26:18', '2023-02-17 11:26:18'),
(13, 'A.z.m Amanullah', 'Shahariar', '1612011', 'support-11@techrajshahi.com', 'XXXXXXX', 'AB+', NULL, '$2y$10$BwjTZqJ1geUOc9.bSYD9YOAhG9ncrDVAtHN9kYLBc.y1yDe/5Jupm', 5, 'eyJpdiI6InFXS21lVkVmZkczc2xxYVlybmdoRVE9PSIsInZhbHVlIjoiTHNMUGxmbGZNeWZoVEVELzVrK1huUT09IiwibWFjIjoiMzNhNWI5MWRhYzdlYmY3ZTNlMjUxZGUxNmViZjJlOTk2ZWY2MTljMGY1M2EzMjgyOGZlZGQ5ZDJlZWQ0OTBkMyIsInRhZyI6IiJ9', NULL, 1, 'img_1676654873.png', NULL, '2023-02-17 11:27:53', '2023-02-17 11:27:53'),
(14, 'Md. Iqbal', 'Hossain', '1612012', 'support-12@techrajshahi.com', 'XXXXXXX', 'AB+', NULL, '$2y$10$eBO.n7xUROZopzl9.1Y8GOjO/t9t.cPI01wfxYy9FzJiUCForyllO', 5, 'eyJpdiI6InlndW5leWQvckgwejluMzRLbHFkYlE9PSIsInZhbHVlIjoiT09UcGVBMmJBVkdkc1lXbGprTm01dz09IiwibWFjIjoiNWU5MDM3ZDA0OTJiOWRmYjE1MGRjYjExY2FjMzkwOTE0Njc2N2Q2ZTkxY2M3NWI0M2UzZGRiNGEzM2Q3M2E4YiIsInRhZyI6IiJ9', NULL, 1, 'img_1676655106.png', NULL, '2023-02-17 11:31:46', '2023-02-17 11:31:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_policies`
--
ALTER TABLE `company_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`),
  ADD KEY `employees_team_lead_id_foreign` (`team_lead_id`),
  ADD KEY `employees_temporary_role_foreign` (`temporary_role`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_roles_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permission_managers`
--
ALTER TABLE `permission_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_managers_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role_managers`
--
ALTER TABLE `role_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_policies`
--
ALTER TABLE `company_policies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_roles`
--
ALTER TABLE `employee_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permission_managers`
--
ALTER TABLE `permission_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_managers`
--
ALTER TABLE `role_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `employee_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_team_lead_id_foreign` FOREIGN KEY (`team_lead_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_temporary_role_foreign` FOREIGN KEY (`temporary_role`) REFERENCES `role_managers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_managers`
--
ALTER TABLE `permission_managers`
  ADD CONSTRAINT `permission_managers_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_managers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_managers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
