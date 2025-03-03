-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 03 2025 г., 20:10
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crm-center`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('eskiz_api_token', 's:263:\"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3NDM0NDkyNzEsImlhdCI6MTc0MDg1NzI3MSwicm9sZSI6InVzZXIiLCJzaWduIjoiNjhhNzUwYjlkOGVmZGJkYzU2ZGY4NDkyZjgxZTZjNzAzOWFkYzM0NTY5MjQwOTE4OGU1ZWQ2NzkxMzJjYmM3MiIsInN1YiI6IjYyNDgifQ.sVahJBre9vUj9gz1gUr7o8bZUhZdm2ThXIZJERwcDjw\";', 1743449276),
('illuminate:queue:restart', 'i:1740853888;', 2056213888);

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','false') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cours`
--

INSERT INTO `cours` (`id`, `cours_name`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EPS-TOPIK 50 (2-qism)', 1, 'true', '2025-02-22 16:33:09', '2025-02-22 16:33:09'),
(2, 'EPS-TOPIK 60 (2-qism)', 1, 'true', '2025-02-22 16:33:12', '2025-02-22 16:33:12');

-- --------------------------------------------------------

--
-- Структура таблицы `cours_tests`
--

CREATE TABLE `cours_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `test` text NOT NULL,
  `javob_true` varchar(255) NOT NULL,
  `javob_false_first` varchar(255) NOT NULL,
  `javob_false_two` varchar(255) NOT NULL,
  `javob_false_thre` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cours_videos`
--

CREATE TABLE `cours_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `cours_name` varchar(255) NOT NULL,
  `lessen_number` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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

--
-- Дамп данных таблицы `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '991fefd1-7824-440e-8451-bffeabbd46f3', 'database', 'default', '{\"uuid\":\"991fefd1-7824-440e-8451-bffeabbd46f3\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:16;s:4:\\\"type\\\";s:15:\\\"new_student_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:09:48'),
(2, '616a76bc-49e3-41de-8024-8a323dc6a4f7', 'database', 'default', '{\"uuid\":\"616a76bc-49e3-41de-8024-8a323dc6a4f7\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:17;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:10:24'),
(3, 'd575d16d-0754-4f15-a173-f7a257a30e87', 'database', 'default', '{\"uuid\":\"d575d16d-0754-4f15-a173-f7a257a30e87\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:18;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:13:49'),
(4, '2c877690-bf8c-4a00-b047-1219feca0cf4', 'database', 'default', '{\"uuid\":\"2c877690-bf8c-4a00-b047-1219feca0cf4\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:3;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:14:55'),
(5, 'dbe8edf7-1854-40ee-99ad-d1b087aa5790', 'database', 'default', '{\"uuid\":\"dbe8edf7-1854-40ee-99ad-d1b087aa5790\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:4;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:16:40'),
(6, '74c60d56-d337-4774-96bd-9c3ac0edbe34', 'database', 'default', '{\"uuid\":\"74c60d56-d337-4774-96bd-9c3ac0edbe34\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:5;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:58\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(58): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 58)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:17:29');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(7, 'ea31caaa-3c1f-4fcb-8bd5-91f537861057', 'database', 'default', '{\"uuid\":\"ea31caaa-3c1f-4fcb-8bd5-91f537861057\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:6;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:18:18'),
(8, '7ad9a2f2-bbf4-49d5-8f48-4feac7f3b164', 'database', 'default', '{\"uuid\":\"7ad9a2f2-bbf4-49d5-8f48-4feac7f3b164\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:25;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:24:53'),
(9, '31c92b21-ec36-458b-b31e-f2797d72a0a5', 'database', 'default', '{\"uuid\":\"31c92b21-ec36-458b-b31e-f2797d72a0a5\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:26;s:4:\\\"type\\\";s:13:\\\"new_hodim_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:27:30'),
(10, '98120a62-efe4-4f78-85c4-853739bc8c39', 'database', 'default', '{\"uuid\":\"98120a62-efe4-4f78-85c4-853739bc8c39\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:16;s:4:\\\"type\\\";s:15:\\\"update_pass_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:29:09'),
(11, 'ac5479d5-a916-4c4e-be91-139349d282d2', 'database', 'default', '{\"uuid\":\"ac5479d5-a916-4c4e-be91-139349d282d2\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:18;s:4:\\\"type\\\";s:15:\\\"update_pass_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:38:57'),
(12, 'cb955541-9775-4d6c-93a5-5ab48969fbe7', 'database', 'default', '{\"uuid\":\"cb955541-9775-4d6c-93a5-5ab48969fbe7\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:24;s:4:\\\"type\\\";s:15:\\\"update_pass_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 'ErrorException: Array to string conversion in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php:59\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\SendMessageWork.php(59): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Array to string...\', \'C:\\\\xampp\\\\htdocs...\', 59)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 17:41:52');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(13, '7837b884-10f0-46c1-9ce6-ab01a3d124db', 'database', 'default', '{\"uuid\":\"7837b884-10f0-46c1-9ce6-ab01a3d124db\",\"displayName\":\"App\\\\Jobs\\\\PaymartMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\PaymartMessageWork\",\"command\":\"O:27:\\\"App\\\\Jobs\\\\PaymartMessageWork\\\":5:{s:10:\\\"paymart_id\\\";i:2;s:12:\\\"paymart_type\\\";s:6:\\\"techer\\\";s:7:\\\"user_id\\\";i:4;s:8:\\\"admin_id\\\";i:1;s:12:\\\"message_type\\\";s:13:\\\"pay_hodim_sms\\\";}\"}}', 'ErrorException: Undefined variable $paymart_type in C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\PaymartMessageWork.php:56\nStack trace:\n#0 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(256): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 56)\n#1 C:\\xampp\\htdocs\\crm-center\\app\\Jobs\\PaymartMessageWork.php(56): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Undefined varia...\', \'C:\\\\xampp\\\\htdocs...\', 56)\n#2 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\PaymartMessageWork->handle()\n#3 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(126): Illuminate\\Container\\Container->call(Array)\n#8 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\PaymartMessageWork))\n#9 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PaymartMessageWork))\n#10 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(130): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\PaymartMessageWork), false)\n#12 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(170): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\PaymartMessageWork))\n#13 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(127): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PaymartMessageWork))\n#14 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(121): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(69): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\PaymartMessageWork))\n#16 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(442): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(392): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(178): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(149): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(132): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(696): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(213): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(182): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(1094): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(342): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\xampp\\htdocs\\crm-center\\vendor\\symfony\\console\\Application.php(193): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(198): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\xampp\\htdocs\\crm-center\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 C:\\xampp\\htdocs\\crm-center\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#36 {main}', '2025-03-01 19:25:32');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL,
  `setting_rooms_id` bigint(20) UNSIGNED NOT NULL,
  `techer_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `setting_paymarts` bigint(20) UNSIGNED NOT NULL,
  `weekday` varchar(255) NOT NULL,
  `lessen_count` int(11) NOT NULL,
  `lessen_start` datetime NOT NULL,
  `lessen_end` datetime NOT NULL,
  `lessen_times_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `next` varchar(255) NOT NULL,
  `techer_paymart` varchar(255) NOT NULL,
  `techer_bonus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `cours_id`, `setting_rooms_id`, `techer_id`, `group_name`, `price`, `setting_paymarts`, `weekday`, `lessen_count`, `lessen_start`, `lessen_end`, `lessen_times_id`, `user_id`, `next`, `techer_paymart`, `techer_bonus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'Test Guruh', 350000.00, 1, 'tok_kun', 12, '2025-02-24 00:00:00', '2025-03-24 23:59:59', 1, 1, '8', '150000', '5000', '2025-02-22 16:34:06', '2025-02-27 19:51:45'),
(2, 1, 1, 4, 'Test Uchun', 350000.00, 1, 'tok_kun', 12, '2025-02-24 00:00:00', '2025-03-24 23:59:59', 1, 1, 'new', '200000', '12000', '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(3, 1, 1, 4, 'uchinci guruh', 350000.00, 1, 'tok_kun', 12, '2025-03-31 00:00:00', '2025-04-30 23:59:59', 1, 1, 'new', '170000', '14000', '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(4, 1, 1, 4, 'asdasd', 350000.00, 1, 'tok_kun', 12, '2025-02-28 00:00:00', '2025-03-28 23:59:59', 1, 1, 'new', '121212', '2121', '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(5, 1, 1, 4, 'asdasd', 350000.00, 1, 'tok_kun', 12, '2025-02-28 00:00:00', '2025-03-28 23:59:59', 1, 1, 'new', '121212', '2121', '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(6, 1, 1, 4, 'Test Guruh ddddd', 350000.00, 1, 'juft_kun', 12, '2025-03-01 00:00:00', '2025-03-29 23:59:59', 1, 1, 'new', '5000', '150000', '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(7, 1, 1, 4, 'Test Guruh ddddd', 350000.00, 1, 'juft_kun', 12, '2025-03-01 00:00:00', '2025-03-29 23:59:59', 1, 1, 'new', '5000', '150000', '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(8, 1, 1, 4, 'Test Guruh ddddd', 350000.00, 1, 'juft_kun', 12, '2025-03-01 00:00:00', '2025-03-29 23:59:59', 1, 1, 'new', '5000', '150000', '2025-02-27 19:51:45', '2025-02-27 19:51:45');

-- --------------------------------------------------------

--
-- Структура таблицы `group_davomats`
--

CREATE TABLE `group_davomats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `group_days`
--

CREATE TABLE `group_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `lessen_times_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `group_days`
--

INSERT INTO `group_days` (`id`, `group_id`, `room_id`, `date`, `lessen_times_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-02-24', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(2, 1, 1, '2025-02-26', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(3, 1, 1, '2025-02-28', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(4, 1, 1, '2025-03-03', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(5, 1, 1, '2025-03-05', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(6, 1, 1, '2025-03-07', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(7, 1, 1, '2025-03-10', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(8, 1, 1, '2025-03-12', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(9, 1, 1, '2025-03-14', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(10, 1, 1, '2025-03-17', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(11, 1, 1, '2025-03-19', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(12, 1, 1, '2025-03-24', 1, '2025-02-22 16:34:06', '2025-02-22 16:34:06'),
(13, 2, 1, '2025-02-24', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(14, 2, 1, '2025-02-26', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(15, 2, 1, '2025-02-28', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(16, 2, 1, '2025-03-03', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(17, 2, 1, '2025-03-05', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(18, 2, 1, '2025-03-07', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(19, 2, 1, '2025-03-10', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(20, 2, 1, '2025-03-12', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(21, 2, 1, '2025-03-14', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(22, 2, 1, '2025-03-17', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(23, 2, 1, '2025-03-19', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(24, 2, 1, '2025-03-24', 1, '2025-02-22 19:17:27', '2025-02-22 19:17:27'),
(25, 3, 1, '2025-02-28', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(26, 3, 1, '2025-03-03', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(27, 3, 1, '2025-03-05', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(28, 3, 1, '2025-03-07', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(29, 3, 1, '2025-03-10', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(30, 3, 1, '2025-03-12', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(31, 3, 1, '2025-03-14', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(32, 3, 1, '2025-03-17', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(33, 3, 1, '2025-03-19', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(34, 3, 1, '2025-03-24', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(35, 3, 1, '2025-03-26', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(36, 3, 1, '2025-03-28', 1, '2025-02-26 19:07:38', '2025-02-26 19:07:38'),
(37, 4, 1, '2025-02-28', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(38, 4, 1, '2025-03-03', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(39, 4, 1, '2025-03-05', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(40, 4, 1, '2025-03-07', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(41, 4, 1, '2025-03-10', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(42, 4, 1, '2025-03-12', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(43, 4, 1, '2025-03-14', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(44, 4, 1, '2025-03-17', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(45, 4, 1, '2025-03-19', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(46, 4, 1, '2025-03-24', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(47, 4, 1, '2025-03-26', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(48, 4, 1, '2025-03-28', 1, '2025-02-27 19:27:19', '2025-02-27 19:27:19'),
(49, 5, 1, '2025-02-28', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(50, 5, 1, '2025-03-03', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(51, 5, 1, '2025-03-05', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(52, 5, 1, '2025-03-07', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(53, 5, 1, '2025-03-10', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(54, 5, 1, '2025-03-12', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(55, 5, 1, '2025-03-14', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(56, 5, 1, '2025-03-17', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(57, 5, 1, '2025-03-19', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(58, 5, 1, '2025-03-24', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(59, 5, 1, '2025-03-26', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(60, 5, 1, '2025-03-28', 1, '2025-02-27 19:28:08', '2025-02-27 19:28:08'),
(61, 6, 1, '2025-03-01', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(62, 6, 1, '2025-03-04', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(63, 6, 1, '2025-03-06', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(64, 6, 1, '2025-03-11', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(65, 6, 1, '2025-03-13', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(66, 6, 1, '2025-03-15', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(67, 6, 1, '2025-03-18', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(68, 6, 1, '2025-03-20', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(69, 6, 1, '2025-03-22', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(70, 6, 1, '2025-03-25', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(71, 6, 1, '2025-03-27', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(72, 6, 1, '2025-03-29', 1, '2025-02-27 19:50:15', '2025-02-27 19:50:15'),
(73, 7, 1, '2025-03-01', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(74, 7, 1, '2025-03-04', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(75, 7, 1, '2025-03-06', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(76, 7, 1, '2025-03-11', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(77, 7, 1, '2025-03-13', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(78, 7, 1, '2025-03-15', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(79, 7, 1, '2025-03-18', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(80, 7, 1, '2025-03-20', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(81, 7, 1, '2025-03-22', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(82, 7, 1, '2025-03-25', 1, '2025-02-27 19:50:48', '2025-02-27 19:50:48'),
(83, 7, 1, '2025-03-27', 1, '2025-02-27 19:50:49', '2025-02-27 19:50:49'),
(84, 7, 1, '2025-03-29', 1, '2025-02-27 19:50:49', '2025-02-27 19:50:49'),
(85, 8, 1, '2025-03-01', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(86, 8, 1, '2025-03-04', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(87, 8, 1, '2025-03-06', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(88, 8, 1, '2025-03-11', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(89, 8, 1, '2025-03-13', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(90, 8, 1, '2025-03-15', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(91, 8, 1, '2025-03-18', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(92, 8, 1, '2025-03-20', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(93, 8, 1, '2025-03-22', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(94, 8, 1, '2025-03-25', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(95, 8, 1, '2025-03-27', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(96, 8, 1, '2025-03-29', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45');

-- --------------------------------------------------------

--
-- Структура таблицы `group_users`
--

CREATE TABLE `group_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `start_meneger` bigint(20) UNSIGNED DEFAULT NULL,
  `start_discription` text DEFAULT NULL,
  `end_meneger` bigint(20) UNSIGNED DEFAULT NULL,
  `end_discription` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `jarima_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `group_users`
--

INSERT INTO `group_users` (`id`, `user_id`, `group_id`, `start_meneger`, `start_discription`, `end_meneger`, `end_discription`, `status`, `jarima_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 1, 'testa', NULL, NULL, 1, NULL, '2025-02-22 16:34:18', '2025-02-22 16:34:18'),
(2, 14, 2, 1, 'asfsdfsdf', NULL, NULL, 1, NULL, '2025-02-22 19:17:45', '2025-02-22 19:17:45'),
(3, 15, 2, 1, 'asdasdas', 1, 'sdafsad', 0, 0, '2025-02-23 16:20:31', '2025-02-26 19:09:13'),
(4, 13, 1, 1, 'sfasfasf', NULL, NULL, 1, NULL, '2025-02-23 17:56:51', '2025-02-23 17:56:51'),
(5, 15, 3, 1, 'xzxxzxzxz', NULL, NULL, 1, NULL, '2025-02-26 19:08:40', '2025-02-26 19:08:40'),
(6, 14, 3, 1, 'sdsadsad', NULL, NULL, 1, NULL, '2025-02-27 19:07:41', '2025-02-27 19:07:41'),
(7, 15, 8, 1, 'Test Guruh ddddd', NULL, NULL, 1, NULL, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(8, 13, 8, 1, 'Test Guruh ddddd', NULL, NULL, 1, NULL, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(9, 16, 3, 1, 'dsadsdf', NULL, NULL, 1, NULL, '2025-03-01 20:03:29', '2025-03-01 20:03:29'),
(10, 16, 8, 1, 'asdsadsd', NULL, NULL, 1, NULL, '2025-03-01 20:04:26', '2025-03-01 20:04:26'),
(11, 16, 7, 1, 'sadasdas', NULL, NULL, 1, NULL, '2025-03-01 20:07:41', '2025-03-01 20:07:41');

-- --------------------------------------------------------

--
-- Структура таблицы `hodim_paymarts`
--

CREATE TABLE `hodim_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('naqt','plastik') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2025-03-08', 'Xalqaro xotin-qizlar kuni', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(2, '2025-03-09', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(3, '2025-03-16', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(4, '2025-03-21', 'Navro\'z bayrami', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(5, '2025-03-23', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(6, '2025-03-30', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(7, '2025-04-06', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(8, '2025-04-13', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(9, '2025-04-20', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(10, '2025-04-27', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(11, '2025-05-04', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(12, '2025-05-09', 'Xotira va qadrlash kuni', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(13, '2025-05-11', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(14, '2025-05-18', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(15, '2025-05-25', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(16, '2025-06-01', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(17, '2025-06-08', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(18, '2025-06-15', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(19, '2025-06-22', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(20, '2025-06-29', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(21, '2025-07-06', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(22, '2025-07-13', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(23, '2025-07-20', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(24, '2025-07-27', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(25, '2025-08-03', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(26, '2025-08-10', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(27, '2025-08-17', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(28, '2025-08-24', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(29, '2025-08-31', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(30, '2025-09-01', 'Mustaqillik kuni', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(31, '2025-09-07', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(32, '2025-09-14', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(33, '2025-09-21', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(34, '2025-09-28', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(35, '2025-10-01', 'O\'qituvchilar va murabbiylar kuni', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(36, '2025-10-05', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(37, '2025-10-12', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(38, '2025-10-19', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(39, '2025-10-26', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(40, '2025-11-02', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(41, '2025-11-09', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(42, '2025-11-16', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(43, '2025-11-23', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(44, '2025-11-30', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(45, '2025-12-07', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(46, '2025-12-08', 'Konstitutsiya kuni', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(47, '2025-12-14', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(48, '2025-12-21', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(49, '2025-12-28', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(50, '2026-01-01', 'Yangi yil', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(51, '2026-01-04', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(52, '2026-01-11', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(53, '2026-01-18', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(54, '2026-01-25', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(55, '2026-02-01', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(56, '2026-02-08', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(57, '2026-02-15', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(58, '2026-02-22', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14'),
(59, '2026-03-01', 'Dam olish kuni (Yakshanba)', 1, '2025-03-03 18:57:14', '2025-03-03 18:57:14');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(39, 'default', '{\"uuid\":\"0eb75d8f-9dc2-4bdd-8889-bfc5e693ac17\",\"displayName\":\"App\\\\Jobs\\\\SendMessageWork\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendMessageWork\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\SendMessageWork\\\":3:{s:7:\\\"user_id\\\";i:30;s:4:\\\"type\\\";s:15:\\\"new_student_sms\\\";s:8:\\\"admin_id\\\";i:1;}\"}}', 0, NULL, 1741026999, 1741026999);

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `kassas`
--

CREATE TABLE `kassas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naqt` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_xar_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_chiq_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `naqt_qayt_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_xar_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_chiq_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `plastik_qayt_pedding` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kassas`
--

INSERT INTO `kassas` (`id`, `naqt`, `naqt_xar_pedding`, `naqt_chiq_pedding`, `naqt_qayt_pedding`, `plastik`, `plastik_xar_pedding`, `plastik_chiq_pedding`, `plastik_qayt_pedding`, `created_at`, `updated_at`) VALUES
(1, 746000.00, 0.00, 0.00, 0.00, 740000.00, 0.00, 0.00, 0.00, NULL, '2025-03-01 20:13:32');

-- --------------------------------------------------------

--
-- Структура таблицы `kassa_histories`
--

CREATE TABLE `kassa_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meneger_id` bigint(20) UNSIGNED NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` enum('naqt_chiq','naqt_xar','plastik_chiq','plastik_xar') NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `succes_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kassa_histories`
--

INSERT INTO `kassa_histories` (`id`, `meneger_id`, `create_time`, `description`, `amount`, `status`, `type`, `admin_id`, `succes_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-02-26 05:26:00', 'test', 1200000.00, 'success', 'naqt_chiq', 1, '2025-02-26 05:26:04', NULL, NULL),
(2, 1, '2025-02-26 05:26:14', 'test', 272000.00, 'success', 'plastik_chiq', 1, '2025-02-26 05:26:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lessen_times`
--

CREATE TABLE `lessen_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL COMMENT 'Dars raqami',
  `time` varchar(255) NOT NULL COMMENT 'Dars vaqti MM:SS - MM:SS formatida',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lessen_times`
--

INSERT INTO `lessen_times` (`id`, `number`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, '08:00 - 09:30', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(2, 2, '09:30 - 11:00', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(3, 3, '11:00 - 12:30', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(4, 4, '12:30 - 14:00', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(5, 5, '14:00 - 15:30', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(6, 6, '15:30 - 17:00', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(7, 7, '17:00 - 18:30', '2025-02-22 16:33:00', '2025-02-22 16:33:00'),
(8, 8, '18:30 - 20:00', '2025-02-22 16:33:00', '2025-02-22 16:33:00');

-- --------------------------------------------------------

--
-- Структура таблицы `meneger_charts`
--

CREATE TABLE `meneger_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paymart_add_naqt` int(11) NOT NULL DEFAULT 0,
  `paymart_add_plastik` int(11) NOT NULL DEFAULT 0,
  `chegirma_add` int(11) NOT NULL DEFAULT 0,
  `qaytarildi_add` int(11) NOT NULL DEFAULT 0,
  `create_group` int(11) NOT NULL DEFAULT 0,
  `create_student` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `meneger_charts`
--

INSERT INTO `meneger_charts` (`id`, `user_id`, `paymart_add_naqt`, `paymart_add_plastik`, `chegirma_add`, `qaytarildi_add`, `create_group`, `create_student`, `created_at`, `updated_at`) VALUES
(1, 1, 3139395, 2061000, 300000, 241500, 8, 3, '2025-02-22 16:34:06', '2025-03-03 18:36:37'),
(2, 2, 0, 0, 0, 0, 0, 0, '2025-02-27 18:22:52', '2025-02-27 18:22:52'),
(3, 19, 0, 0, 0, 0, 0, 0, '2025-03-01 17:14:54', '2025-03-01 17:14:54'),
(4, 20, 0, 0, 0, 0, 0, 0, '2025-03-01 17:16:39', '2025-03-01 17:16:39'),
(5, 21, 0, 0, 0, 0, 0, 0, '2025-03-01 17:17:28', '2025-03-01 17:17:28'),
(6, 22, 0, 0, 0, 0, 0, 0, '2025-03-01 17:18:17', '2025-03-01 17:18:17'),
(7, 23, 0, 0, 0, 0, 0, 0, '2025-03-01 17:23:07', '2025-03-01 17:23:07'),
(8, 24, 0, 0, 0, 0, 0, 0, '2025-03-01 17:23:59', '2025-03-01 17:23:59'),
(9, 25, 0, 0, 0, 0, 0, 0, '2025-03-01 17:24:51', '2025-03-01 17:24:51');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_15_164831_create_personal_access_tokens_table', 1),
(5, '2025_02_15_231718_create_settings_table', 1),
(6, '2025_02_16_025735_create_lessen_times_table', 1),
(7, '2025_02_16_120638_create_holidays_table', 1),
(8, '2025_02_16_152810_create_setting_paymarts_table', 1),
(9, '2025_02_16_162427_create_setting_chegirmas_table', 1),
(10, '2025_02_16_194231_create_setting_rooms_table', 1),
(11, '2025_02_16_201009_create_cours_table', 1),
(12, '2025_02_16_201321_create_cours_videos_table', 1),
(13, '2025_02_16_201417_create_cours_tests_table', 1),
(14, '2025_02_18_105321_create_user_histories_table', 1),
(15, '2025_02_18_112724_create_meneger_charts_table', 1),
(16, '2025_02_18_124533_create_send_messages_table', 1),
(17, '2025_02_19_185012_create_socials_table', 1),
(18, '2025_02_19_231643_create_groups_table', 1),
(19, '2025_02_19_233422_create_group_days_table', 1),
(20, '2025_02_19_233914_create_group_davomats_table', 1),
(21, '2025_02_19_234619_create_group_users_table', 1),
(22, '2025_02_20_124550_update_lessen_start_end_in_groups_table', 1),
(23, '2025_02_22_211036_create_kassas_table', 1),
(25, '2025_02_22_211553_create_paymarts_table', 1),
(26, '2025_02_22_211817_create_moliya_histories_table', 1),
(27, '2025_02_22_211138_create_kassa_histories_table', 2),
(28, '2025_02_27_105050_create_techer_paymarts_table', 3),
(31, '2025_02_27_183937_create_hodim_paymarts_table', 4),
(33, '2025_03_02_215230_create_varonkas_table', 5),
(35, '2025_03_02_215435_create_varonka_histories_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `moliya_histories`
--

CREATE TABLE `moliya_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('xar_naqt','xar_plastik','ish_naqt','ish_plas','chiq_naqt','chiq_plastik','chiq_exson') NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moliya_histories`
--

INSERT INTO `moliya_histories` (`id`, `type`, `amount`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'chiq_plastik', 140000.00, 'test', 1, '2025-02-26 18:13:43', '2025-02-26 18:13:43'),
(2, 'chiq_naqt', 140000.00, 'test naqt', 1, '2025-02-26 18:22:44', '2025-02-26 18:22:44'),
(3, 'chiq_exson', 3600.00, 'test', 1, '2025-02-26 18:22:57', '2025-02-26 18:22:57'),
(4, 'xar_naqt', 200000.00, 'Test', 1, '2025-02-26 18:34:01', '2025-02-26 18:34:01'),
(5, 'xar_plastik', 18400.00, 'test xarajat plastik', 1, '2025-02-26 18:34:18', '2025-02-26 18:34:18'),
(6, 'xar_naqt', 5000.00, 'test', 1, '2025-02-26 18:37:01', '2025-02-26 18:37:01'),
(7, 'xar_plastik', 50000.00, 'sss', 1, '2025-02-26 18:37:10', '2025-02-26 18:37:10'),
(8, 'chiq_naqt', 5000.00, 'test', 1, '2025-02-26 18:38:39', '2025-02-26 18:38:39'),
(9, 'chiq_plastik', 10000.00, 'ssss', 1, '2025-02-26 18:38:48', '2025-02-26 18:38:48'),
(10, 'chiq_exson', 20000.00, 'test', 1, '2025-02-26 18:38:59', '2025-02-26 18:38:59'),
(11, 'ish_naqt', 100000.00, 'Test uchun (Hodim)', 1, '2025-02-27 18:23:06', '2025-02-27 18:23:06'),
(12, 'ish_naqt', 90000.00, 'test(O\'qituvchi)', 1, '2025-02-27 18:24:41', '2025-02-27 18:24:41'),
(13, 'ish_naqt', 50000.00, 'Test(O\'qituvchi)', 1, '2025-03-01 19:25:29', '2025-03-01 19:25:29'),
(14, 'ish_naqt', 10000.00, 'ssss(O\'qituvchi)', 1, '2025-03-01 19:27:52', '2025-03-01 19:27:52'),
(15, 'ish_naqt', 50000.00, 'ssss(O\'qituvchi)', 1, '2025-03-01 19:29:24', '2025-03-01 19:29:24'),
(16, 'ish_naqt', 12000.00, 'Test(O\'qituvchi)', 1, '2025-03-01 19:32:17', '2025-03-01 19:32:17'),
(17, 'ish_naqt', 8000.00, 'sdsd (Hodim)', 1, '2025-03-01 19:35:47', '2025-03-01 19:35:47'),
(18, 'ish_naqt', 8000.00, 'sdsd (Hodim)', 1, '2025-03-01 19:36:23', '2025-03-01 19:36:23'),
(19, 'ish_naqt', 8000.00, 'sdsd (Hodim)', 1, '2025-03-01 19:37:33', '2025-03-01 19:37:33'),
(20, 'ish_naqt', 8000.00, 'sdsd (Hodim)', 1, '2025-03-01 19:39:46', '2025-03-01 19:39:46'),
(21, 'ish_naqt', 6000.00, 'test (Hodim)', 1, '2025-03-01 19:40:26', '2025-03-01 19:40:26');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `paymarts`
--

CREATE TABLE `paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymart_type` enum('naqt','plastik','chegirma','qaytarildi') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `paymarts`
--

INSERT INTO `paymarts` (`id`, `user_id`, `group_id`, `amount`, `paymart_type`, `description`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 15, '1', 150000.00, 'naqt', 'Test', 1, '2025-02-22 18:50:18', '2025-02-22 18:50:18'),
(2, 15, '1', 150000.00, 'plastik', 'Test', 1, '2025-02-22 18:50:18', '2025-02-22 18:50:18'),
(3, 15, '1', 150000.00, 'naqt', 'Test Uchun', 1, '2025-02-22 19:03:16', '2025-02-22 19:03:16'),
(4, 15, '1', 150000.00, 'plastik', 'Test Uchun', 1, '2025-02-22 19:03:16', '2025-02-22 19:03:16'),
(5, 15, '1', 150000.00, 'naqt', 'Test Uchun', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(6, 15, '1', 150000.00, 'plastik', 'Test Uchun', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(7, 15, '1', 50000.00, 'chegirma', 'Test Uchun', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(8, 15, 'null', 895.00, 'naqt', 'asdasdasda', 1, '2025-02-22 19:06:25', '2025-02-22 19:06:25'),
(9, 15, 'null', 99000.00, 'plastik', 'Test Uchun', 1, '2025-02-22 19:06:41', '2025-02-22 19:06:41'),
(10, 15, 'null', 50000.00, 'naqt', 'Test', 1, '2025-02-22 19:06:52', '2025-02-22 19:06:52'),
(11, 15, 'null', 50000.00, 'plastik', 'Test', 1, '2025-02-22 19:06:52', '2025-02-22 19:06:52'),
(12, 15, 'null', 200000.00, 'naqt', 'asdasdasd', 1, '2025-02-22 19:11:28', '2025-02-22 19:11:28'),
(13, 15, 'null', 300000.00, 'plastik', 'asdasdasd', 1, '2025-02-22 19:11:28', '2025-02-22 19:11:28'),
(14, 15, 'null', 250000.00, 'naqt', 'Test', 1, '2025-02-22 19:13:03', '2025-02-22 19:13:03'),
(15, 15, 'null', 250000.00, 'naqt', 'Test', 1, '2025-02-22 19:13:53', '2025-02-22 19:13:53'),
(16, 15, 'null', 150000.00, 'plastik', 'Test', 1, '2025-02-22 19:13:53', '2025-02-22 19:13:53'),
(17, 15, 'null', 25000.00, 'naqt', 'asdasdfasdsa', 1, '2025-02-22 19:14:47', '2025-02-22 19:14:47'),
(18, 15, 'null', 50000.00, 'plastik', 'asdasdfasdsa', 1, '2025-02-22 19:14:47', '2025-02-22 19:14:47'),
(19, 15, 'null', 2500.00, 'naqt', 'sdasdas', 1, '2025-02-22 19:17:01', '2025-02-22 19:17:01'),
(20, 15, 'null', 22000.00, 'plastik', 'sdasdas', 1, '2025-02-22 19:17:01', '2025-02-22 19:17:01'),
(21, 14, '2', 150000.00, 'naqt', 'asdasdasd', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(22, 14, '2', 150000.00, 'plastik', 'asdasdasd', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(23, 14, '2', 50000.00, 'chegirma', 'asdasdasd', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(24, 15, '2', 300000.00, 'naqt', 'tests', 1, '2025-02-23 16:20:50', '2025-02-23 16:20:50'),
(25, 15, '2', 50000.00, 'chegirma', 'tests', 1, '2025-02-23 16:20:50', '2025-02-23 16:20:50'),
(26, 15, 'null', 77500.00, 'qaytarildi', 'Test Uchun', 1, '2025-02-23 17:19:18', '2025-02-23 17:19:18'),
(27, 15, 'null', 100000.00, 'qaytarildi', 'Test Uchun Two', 1, '2025-02-23 17:20:13', '2025-02-23 17:20:13'),
(28, 13, '1', 49515.00, 'chegirma', 'Test', 1, '2025-02-23 18:36:24', '2025-02-23 18:36:24'),
(29, 13, 'null', 150000.00, 'naqt', 'test', 1, '2025-02-23 18:50:29', '2025-02-23 18:50:29'),
(30, 13, 'null', 150000.00, 'plastik', 'test', 1, '2025-02-23 18:50:29', '2025-02-23 18:50:29'),
(31, 12, 'null', 500000.00, 'naqt', 'asdasd', 1, '2025-02-23 19:30:53', '2025-02-23 19:30:53'),
(32, 12, 'null', 50000.00, 'chegirma', 'asdasd', 1, '2025-02-23 19:30:53', '2025-02-23 19:30:53'),
(33, 16, 'null', 50000.00, 'qaytarildi', 'Yest uchun', 1, '2025-02-25 18:52:01', '2025-02-25 18:52:01'),
(34, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:47:43', '2025-03-01 19:47:43'),
(35, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:48:03', '2025-03-01 19:48:03'),
(36, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:48:40', '2025-03-01 19:48:40'),
(37, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:48:55', '2025-03-01 19:48:55'),
(38, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:49:08', '2025-03-01 19:49:08'),
(39, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:51:17', '2025-03-01 19:51:17'),
(40, 16, 'null', 4000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:51:54', '2025-03-01 19:51:54'),
(41, 16, 'null', 2000.00, 'qaytarildi', '2000', 1, '2025-03-01 19:52:09', '2025-03-01 19:52:09'),
(42, 16, 'null', 1000.00, 'qaytarildi', 'sdsd', 1, '2025-03-01 19:52:52', '2025-03-01 19:52:52'),
(43, 16, 'null', 1000.00, 'qaytarildi', 'sdsds', 1, '2025-03-01 19:53:23', '2025-03-01 19:53:23'),
(44, 16, 'null', 1000.00, 'qaytarildi', 'sdsd', 1, '2025-03-01 19:53:47', '2025-03-01 19:53:47'),
(45, 16, 'null', 1000.00, 'qaytarildi', 'test', 1, '2025-03-01 19:54:34', '2025-03-01 19:54:34'),
(46, 16, 'null', 100000.00, 'naqt', 'sasasda', 1, '2025-03-01 20:02:17', '2025-03-01 20:02:17'),
(47, 16, 'null', 100000.00, 'plastik', 'sddsds', 1, '2025-03-01 20:02:35', '2025-03-01 20:02:35'),
(48, 16, '3', 170000.00, 'naqt', 'asdfsafsdfs', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(49, 16, '3', 130000.00, 'plastik', 'asdfsafsdfs', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(50, 16, '3', 50000.00, 'chegirma', 'asdfsafsdfs', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(51, 16, '8', 200000.00, 'naqt', 'asdasdsad', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(52, 16, '8', 100000.00, 'plastik', 'asdasdsad', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(53, 16, '8', 50000.00, 'chegirma', 'asdasdsad', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(54, 16, '7', 190000.00, 'naqt', 'asdasdas', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(55, 16, '7', 110000.00, 'plastik', 'asdasdas', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(56, 16, '7', 50000.00, 'chegirma', 'asdasdas', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(57, 16, 'null', 200000.00, 'plastik', 'sdsadfsfsdf', 1, '2025-03-01 20:12:36', '2025-03-01 20:12:36'),
(58, 16, 'null', 200000.00, 'plastik', 'sdsadfsfsdf', 1, '2025-03-01 20:13:17', '2025-03-01 20:13:17'),
(59, 16, 'null', 200000.00, 'plastik', 'sdsadfsfsdf', 1, '2025-03-01 20:13:32', '2025-03-01 20:13:32'),
(60, 16, 'null', 100000.00, 'chegirma', 'sdsadfsfsdf', 1, '2025-03-01 20:13:32', '2025-03-01 20:13:32');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
-- Структура таблицы `send_messages`
--

CREATE TABLE `send_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `send_messages`
--

INSERT INTO `send_messages` (`id`, `phone`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '998945204004', 'Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz', 1, '2025-03-01 19:32:17', '2025-03-01 19:32:17'),
(2, '998908887898', 'Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz', 1, '2025-03-01 19:39:47', '2025-03-01 19:39:47'),
(3, '998908830450', 'Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz', 1, '2025-03-01 19:40:26', '2025-03-01 19:40:26'),
(4, '998908830450', 'Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz', 1, '2025-03-01 19:53:50', '2025-03-01 19:53:50'),
(5, '998908830450', 'Sizning yangi parolingiz Parol: 96987423 websayt: https://crm-atko.uz', 1, '2025-03-01 19:54:35', '2025-03-01 19:54:35');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xX2O5k4cHRvzClc62ijps3AQNlrHkSYrm9kZAktN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiczdZWlZYNEIwVExkanc0WHJ2U3VweXhuUG5Ld2JHQkU4d040aGI2ZiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWVuZWdlci9zdHVkZW50P3BhZ2U9MSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQxMDIyNDMxO319', 1741028996);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('true','false','delete') NOT NULL DEFAULT 'true',
  `balans_naqt` decimal(15,2) NOT NULL DEFAULT 0.00,
  `balans_plastik` decimal(15,2) NOT NULL DEFAULT 0.00,
  `balans_exson` decimal(15,2) NOT NULL DEFAULT 0.00,
  `exson_foiz` decimal(5,2) NOT NULL DEFAULT 0.00,
  `social_telegram` int(11) NOT NULL DEFAULT 0,
  `social_instagram` int(11) NOT NULL DEFAULT 0,
  `social_facebook` int(11) NOT NULL DEFAULT 0,
  `social_youtube` int(11) NOT NULL DEFAULT 0,
  `social_banner` int(11) NOT NULL DEFAULT 0,
  `social_tanish` int(11) NOT NULL DEFAULT 0,
  `social_boshqa` int(11) NOT NULL DEFAULT 0,
  `message_mavjud` int(11) NOT NULL DEFAULT 0,
  `message_count` int(11) NOT NULL DEFAULT 0,
  `message_status` tinyint(1) NOT NULL DEFAULT 0,
  `new_student_sms` tinyint(1) NOT NULL DEFAULT 0,
  `new_hodim_sms` tinyint(1) NOT NULL DEFAULT 0,
  `pay_student_sms` tinyint(1) NOT NULL DEFAULT 0,
  `pay_hodim_sms` tinyint(1) NOT NULL DEFAULT 0,
  `update_pass_sms` tinyint(1) NOT NULL DEFAULT 0,
  `birthday_sms` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `status`, `balans_naqt`, `balans_plastik`, `balans_exson`, `exson_foiz`, `social_telegram`, `social_instagram`, `social_facebook`, `social_youtube`, `social_banner`, `social_tanish`, `social_boshqa`, `message_mavjud`, `message_count`, `message_status`, `new_student_sms`, `new_hodim_sms`, `pay_student_sms`, `pay_hodim_sms`, `update_pass_sms`, `birthday_sms`, `created_at`, `updated_at`) VALUES
(1, 'Asosiy Sozlamalar', 'true', 440000.00, 40000.00, 50000.00, 5.00, 2, 0, 1, 0, 0, 0, 0, 1, 10, 1, 1, 1, 1, 1, 1, 1, '2025-02-22 16:32:33', '2025-03-03 18:36:37');

-- --------------------------------------------------------

--
-- Структура таблицы `setting_chegirmas`
--

CREATE TABLE `setting_chegirmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `chegirma` decimal(15,2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` enum('true','delete') NOT NULL DEFAULT 'true',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting_chegirmas`
--

INSERT INTO `setting_chegirmas` (`id`, `amount`, `chegirma`, `comment`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 400000.00, 50000.00, 'Bayram chegirmasi', 'delete', 1, '2025-02-23 18:52:09', '2025-02-23 18:54:42'),
(2, 300000.00, 50000.00, 'testd', 'delete', 1, '2025-02-23 18:54:42', '2025-02-23 18:54:57'),
(3, 500000.00, 50000.00, 'Bayram chegirma', 'delete', 1, '2025-02-23 18:54:57', '2025-02-23 19:31:35'),
(4, 200000.00, 100000.00, 'test uchun', 'true', 1, '2025-03-01 20:09:22', '2025-03-01 20:09:22');

-- --------------------------------------------------------

--
-- Структура таблицы `setting_paymarts`
--

CREATE TABLE `setting_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `chegirma` decimal(10,2) NOT NULL DEFAULT 0.00,
  `admin_chegirma` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','false','delete') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting_paymarts`
--

INSERT INTO `setting_paymarts` (`id`, `amount`, `chegirma`, `admin_chegirma`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 350000.00, 50000.00, 350000.00, 1, 'true', '2025-02-22 16:33:38', '2025-02-22 16:33:38'),
(2, 400000.00, 50000.00, 400000.00, 1, 'true', '2025-02-27 18:52:16', '2025-02-27 18:52:16');

-- --------------------------------------------------------

--
-- Структура таблицы `setting_rooms`
--

CREATE TABLE `setting_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('true','delete') NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `setting_rooms`
--

INSERT INTO `setting_rooms` (`id`, `room_name`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1-xona', 1, 'true', '2025-02-22 16:33:16', '2025-02-22 16:33:16'),
(2, '2-xona', 1, 'true', '2025-02-27 18:52:05', '2025-02-27 18:52:05');

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `name`, `count`, `created_at`, `updated_at`) VALUES
(1, 'Qarshi_sh', 2, '2025-02-22 16:32:33', '2025-03-03 18:36:37'),
(2, 'Shahrisabz_sh', 1, '2025-02-22 16:32:33', '2025-03-03 18:35:46'),
(3, 'Dehqonobod', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(4, 'G\'uzor', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(5, 'Kasbi', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(6, 'Kitob', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(7, 'Koson', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(8, 'Mirishkor', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(9, 'Muborak', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(10, 'Nishon', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(11, 'Qamashi', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(12, 'Yakkabog', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(13, 'Chiroqchi', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(14, 'Shahrisabz', 0, '2025-02-22 16:32:33', '2025-02-22 16:32:33');

-- --------------------------------------------------------

--
-- Структура таблицы `techer_paymarts`
--

CREATE TABLE `techer_paymarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('naqt','plastik') NOT NULL,
  `description` text DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `techer_paymarts`
--

INSERT INTO `techer_paymarts` (`id`, `user_id`, `group_id`, `amount`, `type`, `description`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 90000.00, 'naqt', 'test', 1, '2025-02-27 18:24:41', '2025-02-27 18:24:41'),
(2, 4, 1, 50000.00, 'naqt', 'Test', 1, '2025-03-01 19:25:29', '2025-03-01 19:25:29'),
(3, 4, 1, 10000.00, 'naqt', 'ssss', 1, '2025-03-01 19:27:52', '2025-03-01 19:27:52'),
(4, 4, 1, 50000.00, 'naqt', 'ssss', 1, '2025-03-01 19:29:24', '2025-03-01 19:29:24'),
(5, 4, 2, 12000.00, 'naqt', 'Test', 1, '2025-03-01 19:32:17', '2025-03-01 19:32:17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `about` text DEFAULT NULL,
  `group_count` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `type` enum('sAdmin','admin','meneger','techer','student') NOT NULL,
  `status` enum('true','false','locked') NOT NULL DEFAULT 'true',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balans` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '+998901234567', NULL, 'Toshkent, Chilonzor', '1990-03-03', 'Tizim administratori', 0, 'sadmin@gmail.com', 'sAdmin', 'true', NULL, '$2y$12$PvLiqNppGjaNWrP/FLW.0uuPUqfKCodUphg.V4NzOvjIS0bRpfvoS', 0, NULL, '2025-02-22 16:32:31', '2025-02-22 16:32:31'),
(2, 'Palonchayev Pistoncha', '+998 90 883 0450', '+998 88 552 4564', 'Qarshi shaxar', '1995-05-15', 'Admin hisobida ishlovchi foydalanuvchi', 2, 'admin@gmail.com', 'meneger', 'true', NULL, '$2y$12$WyWbNkaWsG8g38JXv/vbM.kPqRwz6ETg2VBLB1E51ZGwijmySVAhq', 0, NULL, '2025-02-22 16:32:31', '2025-03-01 19:40:15'),
(3, 'Manager User', '+998901234569', NULL, 'Toshkent, Yunusobod', '1995-05-15', 'Manager hisobida ishlovchi foydalanuvchi', 0, 'manager@gmail.com', 'meneger', 'true', NULL, '$2y$12$6GLZ88WxxtFsHWdztJYnPemoWE8/rYyiBoN86/dq6oT8nqEv3eg7e', 0, NULL, '2025-02-22 16:32:31', '2025-02-22 16:32:31'),
(4, 'Elshod M', '+998 94 520 4004', '+998 90 883 0450', 'Toshkent, Yunusobod', '1995-05-15', 'Teacher hisobida ishlovchi foydalanuvchi', 0, 'teacher@gmail.com', 'techer', 'true', NULL, '$2y$12$EIdlT9Cq7OHg/ioBbxFGL.r/T8Bw63LGmLGLWs9g6LhclrMp1eSYq', 0, NULL, '2025-02-22 16:32:31', '2025-03-01 19:32:05'),
(5, 'Student User', '+998 94 520 4004', NULL, 'Toshkent, Yunusobod', '1995-05-15', 'Student hisobida o‘quvchi', 0, 'student@gmail.com', 'student', 'true', NULL, '$2y$12$UGgE5Q6CU7wNRQ6L14zrD.sMCw2tHYaTGWqwzh6L6Rw5CXAddWBJO', 0, NULL, '2025-02-22 16:32:31', '2025-02-22 16:32:31'),
(6, 'Kailee McKenzie', '530-521-7472', '(260) 397-9019', '43716 Bartoletti Terrace\nJohnstonside, NC 56933-1254', '2014-04-29', 'Corrupti explicabo corrupti beatae expedita.', 4, 'narciso.maggio@example.com', 'student', 'true', NULL, '$2y$12$A9qCnUkuTDF.6lwwPq5iOuq5WNK8AZyp2fHeoush.nCIC.7s4ZSHG', 449, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(7, 'Kyler Homenick', '+15034329144', '281.672.1716', '8211 Pierce Route Suite 645\nSouth Benjamin, MS 32956', '2024-03-04', 'Deserunt veniam sed corporis magni est ut.', 4, 'helena87@example.net', 'student', 'true', NULL, '$2y$12$lDUkYuq2Kuh866QBWfXGAOBxJVKpEPb1WXnEG8wIWWn2ITbK94wKG', 488, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(8, 'Shanel Rempel', '+1-283-283-8023', '(302) 848-2583', '288 Avis Coves Apt. 869\nBartside, MS 24158', '1974-06-09', 'Quos fuga aut in ea qui cupiditate ullam.', 8, 'olga00@example.com', 'student', 'true', NULL, '$2y$12$zn70V7DZK8y/CaL5qchkA.XzOQb0JqtpKmLsLo7caKwJxWfMVZhei', 205, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(9, 'Mr. Milan Schoen', '+16512040307', '+1-380-373-6081', '17819 White Greens\nWest Eldorafort, MO 24690-5135', '2007-08-11', 'Nisi ut tempora eos.', 3, 'ddonnelly@example.com', 'student', 'true', NULL, '$2y$12$1CuqjmMWXHXKKCMba3Xz/eah4EdFm.g.Qw4YVFpe3fBHiLhpD3R8i', 524, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(10, 'Flo Feil', '607.259.5943', '+1.629.475.3849', '740 King Harbor Apt. 424\nHermannmouth, VT 23352', '1987-08-08', 'Corrupti voluptas omnis enim eaque libero.', 6, 'pziemann@example.org', 'student', 'true', NULL, '$2y$12$zR.wPq.hZGrncuUVhJWegOhq6EdTgBb3LC/bpMs49eD/XQbFx7wWy', 407, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(11, 'Willy White', '959.486.8205', '+1 (830) 584-2760', '11249 Rodriguez Junction\nWest Brendamouth, WV 60570-0591', '2015-08-06', 'Earum excepturi magnam aliquam et.', 2, 'marisa.heller@example.com', 'student', 'true', NULL, '$2y$12$Tlhd41Vbe6m1oPHpvtJD0.es9rpNqP/3MfnUl1N6gmMxJ9fqRKfVi', 914, NULL, '2025-02-22 16:32:33', '2025-02-22 16:32:33'),
(12, 'Kip Bogisich Jr.', '+1-919-744-8521', '+18289370435', '9507 Volkman Run Suite 643\nDarrinside, DE 10482-6632', '2011-10-04', 'Rerum et exercitationem incidunt laudantium et voluptatum laboriosam.', 1, 'maud77@example.net', 'student', 'true', NULL, '$2y$12$QwLtjN9PO64ZTabJyjpYX.wN0iqSBA1lfLfkVmapDjIjR/mi.FGSq', 550382, NULL, '2025-02-22 16:32:33', '2025-02-23 19:30:53'),
(13, 'Eric Hansen', '215.986.5341', '+14359849721', '84695 Stanton Port\nRobertsside, NM 02221', '2017-10-10', 'Illum dolor omnis quod fugiat molestias delectus.', 7, 'juana.marvin@example.com', 'student', 'true', NULL, '$2y$12$3/RQMCYF2vdYK4qXiWHoNeIw/wWnM9FjlGt1d0Ha2X93QwndjqkD.', -350000, NULL, '2025-02-22 16:32:33', '2025-02-27 19:51:45'),
(14, 'Victor Walker', '725.429.4248', '1-830-205-4224', '130 Fahey Flats Suite 302\nViolaburgh, CA 27201-4974', '2019-04-29', 'Accusamus aut molestiae consequuntur est voluptas ut explicabo.', 11, 'vborer@example.org', 'student', 'true', NULL, '$2y$12$3LlTX7JKRszd.MKfamPoveykkOI7hV9K8mAkftqRTlwISYl6KkTc.', -349553, NULL, '2025-02-22 16:32:33', '2025-02-27 19:07:41'),
(15, 'Modesta Lowe', '+1 (949) 523-5306', '1-484-251-9824', '439 Millie Court\nNew Russellfurt, WI 93024-6247', '1994-08-23', 'Et quia nesciunt repellendus magnam qui quo atque distinctio.', 10, 'neva57@example.net', 'student', 'true', NULL, '$2y$12$MNeaqUMDK6ugMqjd5YI0vuJDRQCBbCoc9fWTfEto8P2JeauyO7j/.', 1822000, NULL, '2025-02-22 16:32:33', '2025-02-27 19:51:45'),
(16, 'asdasdas', '+998 90 883 0450', '+998 65 465 4654', 'Qarshi_sh', '2002-03-01', 'sdsd', 3, '1740422780@login.com', 'student', 'true', NULL, '$2y$12$cyJppbDfZQwkIasMen9R2O3lS5kYXif2vw9mzUOajuyClx0Vdd6ra', 437000, NULL, '2025-02-24 18:46:20', '2025-03-01 20:13:32'),
(17, 'Dilshod Xolmurodov', '+998 90 885 4589', '+998 85 966 5545', 'Qarshi_sh', '1997-01-01', 'Test', 0, '1740849021gmail.com', 'techer', 'true', NULL, '$2y$12$F8tDDLZXXYCXoyES.6u.HO1e1HXSWHPGPhjAtbK9jiQii3Fqo89ge', 0, NULL, '2025-03-01 17:10:21', '2025-03-01 17:10:21'),
(18, 'Elshod Musurmonov', '+998 85 545 4654', '+998 65 465 4654', 'Qarshi_sh', '1999-01-01', 'szdsad', 0, '1740849228gmail.com', 'techer', 'true', NULL, '$2y$12$OugGa8KWqJqf0Q6hhrQDr.1nO4PPqVVedym86tzknZBAmsI2ZHpry', 0, NULL, '2025-03-01 17:13:48', '2025-03-01 17:38:55'),
(19, 'Muzrob Karimov', '+998 90 885 4265', '+998 55 445 5555', 'Shahrisabz_sh', '1997-10-01', 'sadsadfa', 0, '1740849294@mail', 'admin', 'true', NULL, '$2y$12$zs3nwIf.JFIN4swTREOlFeMTVyeOOy1Nfogr19QI9UevPNKWVNmxG', 0, NULL, '2025-03-01 17:14:54', '2025-03-01 17:14:54'),
(20, 'Aldanma', '+998 90 888 5544', '+998 55 544 4878', 'Qarshi_sh', '1996-01-01', 'test', 0, '1740849399@mail', 'admin', 'true', NULL, '$2y$12$6GZJm/FXlp3X.r3tIIpLaOO4K1vW.2iTfA5e.dSF9.0FA1sET3h02', 0, NULL, '2025-03-01 17:16:39', '2025-03-01 17:16:39'),
(21, 'Alimov', '+998 98 656 6666', '+998 56 565 6565', 'Qarshi_sh', '6565-05-06', 'asdad', 0, '1740849448@mail', 'admin', 'true', NULL, '$2y$12$QXs3X0nikTL0zKABbKiKGOWnvwCjKAuHt1JDnO2BV3B1YMyWZN3ai', 0, NULL, '2025-03-01 17:17:28', '2025-03-01 17:17:28'),
(22, 'Murodov V', '+998 85 245 4545', '+998 45 454 5454', 'Qarshi_sh', '2025-12-31', 'asd', 0, '1740849497@mail', 'admin', 'true', NULL, '$2y$12$Foajl7vwrfslgycM07XrM.p3bOJdlEnwvu4rvkbTbuur.tquZoJFK', 0, NULL, '2025-03-01 17:18:17', '2025-03-01 17:18:17'),
(23, 'Qalandarov', '+998 96 564 5646', '+998 65 465 4654', 'Qarshi_sh', '2002-01-01', 'asdasda', 0, '1740849787@mail', 'admin', 'true', NULL, '$2y$12$loKqZ8//2jHt8y.Rsog3y.uwF9k8lMfTRA9oj5aGyIEBLof2HFR9K', 0, NULL, '2025-03-01 17:23:07', '2025-03-01 17:23:07'),
(24, 'Ermatov Farrux', '+998 90 883 5055', '+998 05 545 4521', 'Qarshi_sh', '1999-01-01', 'asdasdas', 0, '1740849839@mail', 'admin', 'true', NULL, '$2y$12$v3Xa5GNOjWe3JMkPgTUHL.xuW2dKya75LjdrAzfR7JV9DfpXqqr4q', 0, NULL, '2025-03-01 17:23:59', '2025-03-01 17:41:51'),
(25, 'Raximov Elbek', '+998 90 832 5465', '+998 56 465 4654', 'Qarshi_sh', '1988-01-01', 'asa', 0, '1740849891@mail', 'admin', 'true', NULL, '$2y$12$3kA1TJA/0EeSJ/kaTxDHwO5mGvHRAbRxwbW.OarAoAmMGxVes8M/e', 0, NULL, '2025-03-01 17:24:51', '2025-03-01 17:24:51'),
(26, 'Doston Umarov', '+998 90 554 5124', '+998 54 654 6546', 'Qarshi_sh', '1997-01-01', 'sdsd', 0, '1740850047gmail.com', 'techer', 'true', NULL, '$2y$12$5o5Ec6G0vbczqZRl6U6/uuvwG0O2IRCTJjeBpElg8FHaBzc0I4laW', 0, NULL, '2025-03-01 17:27:27', '2025-03-01 17:27:27'),
(28, 'Elshod Musurmonov', '+998 94 520 4006', '+998 90 558 4516', 'Shahrisabz_sh', '1997-02-01', 'asdada', 0, '1741026945@login.com', 'student', 'true', NULL, '$2y$12$0zWPmXH8EWFYYgbBqJDRleFQ2svlprbMrQ2lsOYWehWZVZkQ25JtC', 0, NULL, '2025-03-03 18:35:46', '2025-03-03 18:35:46'),
(30, 'Test Uchun', '+998 94 520 4009', '+998 00 585 4554', 'Qarshi_sh', '1997-01-01', 'sadsds', 0, '1741026997@login.com', 'student', 'true', NULL, '$2y$12$xahhVsoXqutztycitGz32./9cXnfrR1qj5UPlcZg40ZxDeJTM6NP2', 0, NULL, '2025-03-03 18:36:37', '2025-03-03 18:36:37'),
(32, 'Rhett Balistreri DVM', '712-750-0033', '(361) 474-0828', '4022 Mekhi Flats\nWest Kayport, RI 85560-0004', '2023-01-08', 'Provident molestiae et quidem aut dicta adipisci eum omnis.', 1, 'gaylord.bettie@example.net', 'student', 'true', NULL, '$2y$12$OQyiphau6d5BS043QNWFyuBDoaFtG65o5O1XjdYyLUwimQf4WQNJK', 158, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(33, 'Kolby Davis', '1-567-925-7099', '(305) 800-4272', '936 Labadie Squares Apt. 324\nOrrinburgh, UT 14422-1012', '1977-01-05', 'Et in nihil nulla sunt alias repudiandae quo.', 1, 'hrunte@example.net', 'student', 'true', NULL, '$2y$12$GpOLGDljsudyEQp5Fi6rqeVEfTbhdhtj0j1cwst3hfB/KNqGRuqFe', 748, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(34, 'Dr. Ulices Christiansen', '1-651-920-7159', '(689) 483-9114', '4939 Magnus Harbors Apt. 075\nCarterfurt, CT 28991-9642', '1976-10-10', 'Qui dolores eum enim dolore error suscipit esse ea.', 7, 'tremblay.clyde@example.net', 'student', 'true', NULL, '$2y$12$kCgO53X3zHNHjk138ASmE.QDKqfkaT4wqa9XyHAKTWI27S3XSX1ZC', 910, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(35, 'Alfredo Goodwin', '803.419.3297', '(925) 741-1140', '99956 Spinka Well\nNorth Tracestad, NM 52838', '2012-01-07', 'Perferendis id inventore facilis corrupti odio eaque.', 6, 'isom.corwin@example.com', 'student', 'true', NULL, '$2y$12$c6Tml9aBuPZTWxWBYkJVIO6pI5SCc.mAfN5ToBqaCg/w0rh8xYP6K', 460, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(36, 'Florian Jacobi Sr.', '(423) 929-6841', '+15206184786', '2808 Bartoletti Junctions\nEast Maximillian, MS 35175', '2020-12-10', 'Enim dolores et modi voluptatem velit est laudantium laboriosam.', 7, 'frida.rutherford@example.com', 'student', 'true', NULL, '$2y$12$IGepQsqJVbMZ9cwAo59QMeuyoKhS.cA7MN0qNepDnX34TY8dE/bjy', 388, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(37, 'Frederick Tromp II', '(573) 549-6538', '+1 (947) 405-4396', '23470 Flatley View Suite 336\nNorth Vito, MT 26282', '1987-03-01', 'Iste ut non nam.', 9, 'danny00@example.net', 'student', 'true', NULL, '$2y$12$LkepnKmGNYpaO5hFgD/CAezjn4UTI5d62h1nTQitu8Cckuj.dkcQO', 361, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(38, 'Miss Elaina Abernathy PhD', '(919) 645-3420', '+12697723913', '55907 Paris Trail Suite 682\nPort Lorenzo, MO 08495', '2009-11-01', 'Ad amet reiciendis quos deleniti cum.', 7, 'dusty.heidenreich@example.com', 'student', 'true', NULL, '$2y$12$yP3ao/T05jVmFH0cwMp/m.B2xYMtloniEI6kc42LI2Uk7QjL3PBmu', 720, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(39, 'Wilfred Haag', '+1-920-613-1644', '+1.680.753.2498', '7928 Waylon Ports\nLake Jaunita, WV 39561', '1997-09-04', 'Dolor ullam laboriosam explicabo aliquid magnam pariatur magni nisi.', 7, 'ckoch@example.net', 'student', 'true', NULL, '$2y$12$f3meFFuRgG.NrAZ1viBdxuv4Ud4hznVeKOgZ0EJ433new6bmOIhzC', 362, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(40, 'Zoila Kemmer', '+1.747.761.9752', '1-520-809-7537', '64732 Virginia Manors Apt. 278\nNorth Janet, OR 01540', '1983-08-22', 'Nobis asperiores est est quo voluptas.', 4, 'mackenzie.stracke@example.net', 'student', 'true', NULL, '$2y$12$FjvmzCJ8UyAWVV/g5UWjsuW2.x/VHcRzmYmLJ5EYYgZVO9.yhEPN6', 983, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(41, 'Dr. Romaine Reilly DDS', '+1.863.752.8976', '+1-978-562-1304', '189 Donnie Cliffs\nMohrbury, MT 27844-6054', '2004-04-13', 'Nulla reprehenderit ut autem sed reiciendis rerum consequatur sit.', 4, 'kristina.bergstrom@example.org', 'student', 'true', NULL, '$2y$12$xHrNq4JcdvzlIOth78AukeiX/PH9EL1hLr8Q64oFsjTJsCtutkkyu', 345, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(42, 'Courtney Maggio', '+16518514102', '(470) 642-1215', '8606 Jerome Parkway\nNew Marianne, RI 47542-4288', '2017-10-09', 'Vel sit itaque incidunt non illum nisi qui.', 6, 'marlon16@example.net', 'student', 'true', NULL, '$2y$12$hIyBFSIxxLpt3FKuN1sJl.2Emu/wznB/u3XAyT9FvITAMiD4qk/8K', 122, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(43, 'Mrs. Macy Tremblay PhD', '484-349-3896', '1-662-713-3785', '1308 Block Parkways\nTanyahaven, RI 04714-6365', '2007-02-18', 'Ad sapiente voluptatibus voluptas odio officiis aliquam.', 3, 'rau.jeffery@example.net', 'student', 'true', NULL, '$2y$12$LsO9crcU/cOh8jLzPigC7OQzIXDq0fpj80dZNx1UcXZVN.hq1.uki', 484, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(44, 'Gina Conn', '+1 (480) 623-0561', '+17376734909', '812 Abbott Village Apt. 488\nKaybury, IL 15921', '1988-10-24', 'Reprehenderit fugiat illum voluptatum aliquam earum nihil blanditiis.', 1, 'emedhurst@example.org', 'student', 'true', NULL, '$2y$12$CEgh7kGhOerToq8GMi2yd..MIR1liSzTmEJ0tJ.ijRhmPf4BzMiqe', 470, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(45, 'Jermaine Nolan', '430-866-3905', '1-856-234-4781', '590 Ricardo Green Suite 606\nRobertsborough, PA 69120', '1988-05-07', 'Delectus tenetur id sequi qui fuga tenetur.', 4, 'wkohler@example.net', 'student', 'true', NULL, '$2y$12$Fa5TcAAQZvUSl4R6DTcJB.2HnZ.eyfkXiKAQxzYoWlyIPdnerHst6', 531, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(46, 'Evert Mraz', '754.705.8650', '+15593025726', '84166 McClure Island\nSchillerside, WV 60978', '2002-12-19', 'Recusandae culpa id perspiciatis labore sit excepturi et.', 5, 'xrau@example.net', 'student', 'true', NULL, '$2y$12$2Z4W6TI7h2TQKUMg2yua8ObIFMrBbZdN0UYUkrCgEYj643ykilNzm', 703, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(47, 'Arianna Blanda V', '+1-364-495-0228', '+1-603-801-1425', '3892 Davion Green Apt. 800\nCandelarioburgh, MN 44955', '1975-05-19', 'Nobis cumque temporibus sequi non adipisci dolor magnam.', 7, 'hoppe.ubaldo@example.com', 'student', 'true', NULL, '$2y$12$Fs44z9r5Pd.1M6Dv5vSFQOD774fe8TOZDuv0JIHu0Nsdzl96kH7n2', 218, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(48, 'Prof. Colt Jacobs', '+1.251.795.8280', '(540) 301-7142', '397 Grimes Knoll Apt. 048\nWunschview, IL 66739-4141', '2006-08-14', 'Reiciendis dolores qui aut suscipit numquam et culpa.', 1, 'dglover@example.com', 'student', 'true', NULL, '$2y$12$6TqLRy22d2h7ArWjrxufyORlkl6yxReFQV5Sqvy6o5DwoXyjHBdGi', 91, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(49, 'Lenora O\'Connell', '301.371.5020', '+1-530-678-1820', '8876 Lehner Hills Apt. 567\nMarquisland, AZ 16269', '2011-11-09', 'Ducimus aut nostrum hic.', 4, 'koch.wilber@example.net', 'student', 'true', NULL, '$2y$12$691kO4iHCVLdzYSOhwE43Or9qVaWOre1JwrM/iLLF9le4O2E6aas.', 538, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(50, 'Gail Donnelly MD', '972.435.5501', '352-693-5380', '93899 Strosin Road Suite 226\nAbigayleland, CO 83329-5736', '1974-10-30', 'Corrupti totam eveniet commodi impedit suscipit voluptas optio.', 9, 'oreilly.gabriel@example.net', 'student', 'true', NULL, '$2y$12$bN/q3jR9Bg4BDsiEWcprZ.PBLySk5xAfJgCSqHuVDA3p7u0LjRWO2', 844, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(51, 'Jace Zieme', '+1-501-459-9068', '1-413-417-9989', '3879 Christiansen Place\nLittleland, CT 51455', '1997-09-21', 'Iusto expedita nisi maxime fugit et nesciunt ipsam dolorem.', 5, 'theron41@example.com', 'student', 'true', NULL, '$2y$12$RLS23lxrewFG3a4Jx0wilejSUYZ4Q5soVNbkqVQhErfH8qnisZMmW', 942, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(52, 'Sydnie Kris', '530.958.5697', '+1 (240) 852-0272', '5114 Upton Drives\nGerardoside, IA 20885', '1978-06-10', 'Iure illum ut at voluptas quia.', 0, 'kunde.kamren@example.com', 'student', 'true', NULL, '$2y$12$tRyFWfs2ATN6y0cLUHyaPeMAoHd7dndZ2XNk8L5H6sIWzh.9Ml5G6', 315, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(53, 'Griffin Grant Sr.', '+18326993523', '+1.364.234.4083', '2863 Trantow Isle Suite 498\nDooleyhaven, MS 13121-7567', '1997-02-24', 'Dolorem libero est et est nulla.', 1, 'williamson.marisa@example.org', 'student', 'true', NULL, '$2y$12$7gDJHgXYBMqtDogH6Wctm.q3lG.quTB.QLLR.ji4bFQQladi1rFqO', 98, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(54, 'Ozella Braun', '+1-843-586-5625', '1-601-318-2098', '441 Roxane Spring Suite 880\nLeonardoside, MN 91917-2416', '2003-11-11', 'Ipsam rerum atque voluptatem at distinctio ipsam.', 5, 'curtis.douglas@example.org', 'student', 'true', NULL, '$2y$12$2r/xVBnv98nlH3IdLoYAY.BwunweSVGTRYFqSh7jGks1NzgshMEJq', 409, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(55, 'Clinton Bartell II', '+1 (440) 680-2835', '+18027538886', '493 Ines Street Apt. 750\nNew Emie, KY 58697', '2024-07-07', 'Consequatur quos odio ut dolore ad hic.', 9, 'lreichert@example.com', 'student', 'true', NULL, '$2y$12$brOTymnJrAf2kTZLV5xfnuGE6Fvpp7ruwY0cNrRnTIhXN0tuBKFQy', 817, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(56, 'Dr. Lois Daugherty', '+17752261049', '629-891-7557', '38886 Modesto Mountain Suite 937\nKassulkehaven, WI 73538', '1999-06-30', 'Doloremque iste illum maxime placeat.', 5, 'maribel42@example.net', 'student', 'true', NULL, '$2y$12$88IL0lFJfDVAO1/v6iH4k.lf9jljMlZhF5kGhRkg3NnXasEAybtf2', 829, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(57, 'Nicolette Erdman', '(920) 751-5248', '+1-470-386-5700', '18634 Ondricka Plain\nWest Simonefurt, NE 06341-3177', '1992-12-30', 'Qui et architecto at sunt exercitationem et delectus voluptas.', 4, 'kuvalis.terry@example.com', 'student', 'true', NULL, '$2y$12$hZdehNT1oOLZXQqXbELeXOWl83ePGXxe7ZfOSsREMY.a/6h71bBh.', 953, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(58, 'Mallie Zboncak', '+1-610-677-3924', '(256) 516-2335', '48820 Reginald Estates\nPatrickberg, MO 85659', '2022-08-21', 'Expedita nobis quas tempora tenetur qui maxime.', 2, 'veda24@example.net', 'student', 'true', NULL, '$2y$12$VMCnZ0vkRfjlkghFbJNzJOQhRsChQEBERNA0jb3BzgYxlf2hKT0ay', 275, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(59, 'Verna McGlynn', '1-863-744-4947', '(385) 237-8428', '60045 Schaefer Isle Suite 653\nNorth Nicholaus, IA 21099-0008', '2006-04-04', 'Et aut expedita non sit expedita odit.', 1, 'hoppe.linnie@example.com', 'student', 'true', NULL, '$2y$12$M9fBMvDknujfmui00BbR3O6uTuFQjK2EEsNICU1C2xqQtKqXrEA0u', 969, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(60, 'Westley Witting MD', '(640) 459-2882', '657.927.4775', '240 Bauch Extensions Suite 426\nEast Alf, WI 71841-5903', '1972-02-26', 'Aliquam quibusdam aut sit.', 4, 'tremblay.carolanne@example.net', 'student', 'true', NULL, '$2y$12$b6gENMTrO4CITEGKuIkzIuhTOJREk/hyduxftJjB2T25c4Kt9VlUS', 561, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(61, 'Dr. Elmore Rolfson', '678.434.1881', '1-828-549-6111', '954 Syble Isle\nNorth Bobby, SD 84088-3486', '2017-04-22', 'Voluptatibus cumque at debitis inventore laboriosam ab eveniet.', 1, 'yerdman@example.org', 'student', 'true', NULL, '$2y$12$0rY4NapKbOsblyZFdf1lt.WnH3gQ7vqe2/lk8fYijwQhS7pEhQ2K2', 491, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(62, 'Federico Zieme', '(785) 322-6160', '859-406-2635', '182 Joyce Ridge Apt. 128\nLeschmouth, AZ 30694', '1977-05-13', 'Nihil deleniti consequatur quis debitis corrupti.', 9, 'margie21@example.net', 'student', 'true', NULL, '$2y$12$PKEFPdy4lgMERynQymjZiOkO.YjcBQyHn8e4YElo7OktY6SfS01ue', 984, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(63, 'Winona Schulist DVM', '+1 (531) 469-9834', '1-272-525-7930', '92605 Alfredo Extension Suite 767\nSouth Olga, IN 02909-4363', '2010-07-02', 'Tempora repellendus aspernatur doloribus sit dolores architecto totam.', 6, 'koch.elvis@example.net', 'student', 'true', NULL, '$2y$12$XJqg3FZAJgxBOcCD3LMz/OeWMGO55lVtCd7aBWGAsolStC3NkKXH2', 890, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(64, 'Aurelia Roberts', '1-743-861-7097', '917-247-8994', '8246 Yesenia Ways Apt. 728\nFayland, AL 11002', '1997-09-25', 'Illo accusamus cupiditate quam laborum illo.', 3, 'jeramie93@example.net', 'student', 'true', NULL, '$2y$12$IieMrwjyMYKJDNvvbGtWdOyXj/nFSVWyLzvc9vX5QG9JY2n.CVVpS', 536, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(65, 'Ellen Dooley', '878-477-8765', '360-912-8306', '2148 Josue Extensions\nSouth Amalia, CT 12191-3032', '2022-04-18', 'Saepe sapiente et laboriosam fugiat est facilis omnis.', 3, 'eveline14@example.org', 'student', 'true', NULL, '$2y$12$D7skQb81yo4YrTzfrYUFXOSrZ1js4ri0JjX3e7woFc5Vz1H3w4IOm', 988, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(66, 'Mateo Pfeffer', '(651) 970-2870', '1-336-684-0614', '8146 Schneider Shores Suite 929\nNew Greta, VA 32259-2147', '1991-02-26', 'Voluptate rem omnis consequatur similique voluptates repudiandae exercitationem eius.', 6, 'laney61@example.org', 'student', 'true', NULL, '$2y$12$1O5aXe3hRMZeBcUXcWrbEONYwFKCzsA3UjWX1DOMLgPTmypDLkoH.', 196, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(67, 'Berta Hintz', '+19493129509', '(848) 643-0588', '14557 Tito Key\nDeondrechester, AK 11040', '1974-07-02', 'Saepe excepturi aut ut numquam aperiam repudiandae impedit.', 5, 'owalsh@example.org', 'student', 'true', NULL, '$2y$12$nA0iKccgdyoEHOdBQ3lw4umezsC9sS.M92hYY89674iQxPeaEt9ka', 281, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(68, 'Brisa Renner', '+12816378155', '754-214-9263', '61393 Kunze Wall Suite 807\nEast Lizaport, ND 02136', '1977-11-13', 'Itaque sequi velit cum exercitationem eveniet distinctio.', 3, 'friesen.nova@example.net', 'student', 'true', NULL, '$2y$12$oWHKAk/L8m1prxSi6QMbDeYeGxEqzOcTAtxxlRDRCH0gfSl.7WYOC', 582, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(69, 'Dr. Cordell White', '+12484312359', '1-814-431-1386', '253 Malinda Crossroad Apt. 059\nAddisonmouth, AL 26703-0137', '2014-09-10', 'Sunt dolorem qui asperiores alias quae earum sed.', 9, 'beverly43@example.com', 'student', 'true', NULL, '$2y$12$R6DDOzkDPj/I8xfjkpK5COCqFGtm5YeMMpXsp9yvDBKeWrdx3FcG6', 377, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(70, 'Donna Kunde', '+1.580.815.5279', '816-223-9473', '4059 Jaron Groves Suite 761\nWest Noemi, UT 05574', '2024-02-06', 'Eos sed corrupti veniam est.', 2, 'graham.maryjane@example.com', 'student', 'true', NULL, '$2y$12$v4.erXTD0GHaLvAwHMTeTeg75xSdsDC2NRmHP/bitMcZxCMU/G3uu', 253, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(71, 'Nikolas Sporer II', '757-536-7473', '(641) 863-6413', '52481 Gutmann Stream Suite 267\nJulianaport, CA 63934-1261', '1992-02-28', 'Mollitia tempore cum voluptatem saepe mollitia laudantium.', 2, 'eryn40@example.com', 'student', 'true', NULL, '$2y$12$2m92xAzkeFMhKwRP.M7Rw.7m1d8dxkP5.Fu4Xpphv3DX8vbmIkDlO', 462, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(72, 'Ms. Ashtyn Kuhlman', '534-878-1737', '1-802-434-3360', '95770 Leo Lock Apt. 547\nLake Candidoberg, FL 36227', '2007-12-08', 'Pariatur ipsam voluptates id voluptatem ad.', 9, 'qlangosh@example.com', 'student', 'true', NULL, '$2y$12$9kDUGY464uHh.a0VM3IWIeBD7CnRWe8OOxiolJn7hSi9IY3q.YjIW', 770, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(73, 'Marty Champlin', '+1 (934) 724-0546', '802-340-6290', '2625 Bridgette Court Suite 288\nSouth Russell, SC 29265', '2013-08-04', 'Sed consequuntur veritatis sapiente assumenda consequatur dolores.', 5, 'tquitzon@example.com', 'student', 'true', NULL, '$2y$12$RtzOnu8RZyDNg8wXdS.dau/0vzBLHvaUsJaZ/I0P5LWAQY5dG.te2', 176, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(74, 'Kasandra Padberg', '+1-559-805-7722', '+1.432.439.5152', '27299 Auer Field\nSouth Forest, OK 72952', '1992-04-22', 'Facilis veniam sunt quis earum dignissimos a.', 5, 'erice@example.com', 'student', 'true', NULL, '$2y$12$EeFpgpc95O2K1oME3DDvK.HkXjUJakuKZbX5flYSzRn6OPJJZs1S2', 705, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(75, 'Mrs. Britney Ankunding', '(424) 376-2819', '1-458-719-9266', '81644 Price Camp Apt. 205\nNorth Vesta, LA 48755', '2025-02-25', 'Recusandae omnis doloremque ullam.', 2, 'rico.dicki@example.com', 'student', 'true', NULL, '$2y$12$DZbRT.KD6YNyhC1XFuFjK.dPBvWx76NEKGO2InT3OKmrjzRfFFtOq', 677, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(76, 'Gregory Cartwright', '726.254.9956', '203-518-8087', '6766 Abigail Brook Apt. 526\nAntoniohaven, NJ 81229', '1973-01-04', 'Quas magni et sit ex iusto nihil ipsum.', 4, 'pcollier@example.net', 'student', 'true', NULL, '$2y$12$.DUR.8LxccvFtUpgk2fJ6O9.DrVn2raEQwezKIKPYPwBw7J9bnQ1W', 536, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(77, 'Hellen Ernser PhD', '475-494-9993', '1-248-942-0241', '3176 Aron Valleys Apt. 983\nOfeliastad, KS 38392', '1992-03-26', 'Qui non optio architecto aliquid ut nisi est.', 1, 'tleannon@example.org', 'student', 'true', NULL, '$2y$12$ue.UOF8kT4DHC7g1683IDu/QA9ko4i2DrABzdBO.nRe5uOBSDFKNi', 709, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(78, 'Lucious Thiel I', '+19864174821', '872-780-4685', '74484 Heber Roads Suite 783\nTrompstad, AR 59982', '1977-04-06', 'A dolore ab quo velit.', 0, 'mellie46@example.com', 'student', 'true', NULL, '$2y$12$DgVT8NM.qqCXh.hv7Tj9TOjj0h9uhREX4CWUHX21Q6dGGr2nCKSUC', 78, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(79, 'Allen Blanda', '269-404-7186', '1-915-235-1300', '729 Karlee Junctions Suite 900\nAltenwerthchester, VA 67071-7753', '1989-10-05', 'Laudantium aspernatur repellat sequi.', 5, 'frederic55@example.net', 'student', 'true', NULL, '$2y$12$utTHnxUB2Sf4pzFGLJg5seKiPg.C5JJdCBBdPS/9py/TzY63VyW0W', 316, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(80, 'Osvaldo Stroman', '979-841-6632', '863-204-2567', '44224 Anahi Turnpike Suite 262\nWest Isom, CO 04329-6937', '1985-05-15', 'Exercitationem magni autem ut consequatur.', 3, 'garret88@example.com', 'student', 'true', NULL, '$2y$12$i/LHWk0eQ18B2zVw4O5sDOjgIBAIO8mf0KLksQ4JluWif13G9YcCm', 827, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(81, 'Adella Koelpin', '+1 (986) 465-7903', '248-883-3041', '9586 Malcolm Extensions\nLake Ruthburgh, WI 00868', '1998-11-13', 'Qui architecto sunt laboriosam aspernatur architecto vel.', 4, 'eromaguera@example.org', 'student', 'true', NULL, '$2y$12$we0tdTjDZkEeBtaSu67dhef6X3IKjFsQYy69SIh6H2MS.lYAMmxt2', 368, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(82, 'Miss Angeline Windler V', '878-647-8109', '(737) 202-6761', '1388 Wilford Gardens\nCollierland, AK 87537', '1976-07-14', 'Vel aut soluta itaque eius.', 9, 'kreiger.maxime@example.net', 'student', 'true', NULL, '$2y$12$ijxymkisv47OYMdKvDPivewpo/CZx.cApp9im0sh6tE3pNpl.YdTm', 747, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(83, 'Mrs. Flossie Eichmann Sr.', '+1 (712) 260-4872', '(737) 229-2981', '3328 O\'Hara Locks Suite 448\nEast Kavon, LA 65851-5743', '2011-12-26', 'Enim itaque vel eligendi vero.', 1, 'freeman89@example.org', 'student', 'true', NULL, '$2y$12$UuwKiCCy2PV.rVZ8eIXFfOBODo6qXpqb6qcrLuYUN9KD/HYn2.QnC', 697, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(84, 'Prof. June Bergstrom Jr.', '+1.480.482.5587', '(425) 944-4547', '552 Ariane Roads\nPort Barrett, MD 52218', '2000-09-18', 'Odit officiis exercitationem molestias earum.', 5, 'estrella.turner@example.com', 'student', 'true', NULL, '$2y$12$WWm3MptjPuyZv4DIY6MYLO9IJKWc0wqLpJc2yDgOV/nl9ixeDKRty', 197, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(85, 'Mr. Kenny Zemlak', '+1-726-964-5850', '1-940-752-4139', '1864 Schaden Keys\nJerryside, NY 59734', '1980-12-12', 'Molestiae sunt dolorem ut soluta sequi sed.', 9, 'riley69@example.com', 'student', 'true', NULL, '$2y$12$fg4dMSF6j9TDYsQyfMZgruGrxZnpSgu2an0Qp0MMfQVzUuenl3ZsK', 215, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(86, 'Litzy Prosacco', '1-520-914-0928', '+1.854.247.0479', '6668 Carroll Road Apt. 074\nRaoulton, NC 16927-1958', '1984-10-28', 'Fugit quo repellendus consequuntur qui.', 6, 'oratke@example.net', 'student', 'true', NULL, '$2y$12$v6ocRN1E0pMpXq85iaGuROJUdJJ7iYaP/hJXz1nUwPqsf32ygmPve', 702, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(87, 'Eldon Gleason', '1-706-668-9899', '585-899-0825', '99901 Landen Dam Suite 032\nNew Ernieland, RI 54116-5032', '1975-08-26', 'Vero veritatis ipsum consectetur porro vel qui.', 2, 'npfannerstill@example.com', 'student', 'true', NULL, '$2y$12$gCz9GRsNHBbMp772aa5mtuPPKmiQN3we3N1l25fIa4pxBfoStSPyO', 891, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(88, 'Emerald Jacobson', '1-727-324-2025', '980-626-7805', '4681 Izabella Loaf\nGaylordfort, TN 71994', '2013-11-20', 'Adipisci consequuntur pariatur dolorum ipsa aut.', 5, 'streich.zetta@example.net', 'student', 'true', NULL, '$2y$12$La6/euv2I9h1tDn92H0/vOt2UABhL3EknvE9p5UhKceIwrq12j06a', 600, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(89, 'Elvie Lind', '(206) 410-1743', '+1-712-798-9424', '78276 Vivienne Lakes\nLegrosmouth, ND 92191-8155', '1982-01-15', 'Amet animi dolores voluptatem est dolor eum.', 5, 'cindy44@example.net', 'student', 'true', NULL, '$2y$12$h2AaMM98O3KH/BApSk2kgePDcOi2Gp4VISO6DP16ItzJv/ugXIbgi', 331, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(90, 'Pedro Wintheiser PhD', '+1-386-576-0677', '+1 (908) 406-7727', '13156 Walter Neck\nSouth Elbert, AK 12538-3747', '2000-05-31', 'Possimus ut vitae sint rerum.', 0, 'fahey.guiseppe@example.net', 'student', 'true', NULL, '$2y$12$TqwTWUefWwhouExDXC7DyOxX7boVMLCUt00IipjSN8uDaw31/vCdC', 373, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(91, 'Jordy Ondricka PhD', '360.569.6480', '952-588-8598', '889 Aditya Knoll Suite 681\nCollierchester, TN 64503-1200', '1975-04-04', 'Magni enim aliquid qui accusantium quaerat magni.', 0, 'lilyan20@example.net', 'student', 'true', NULL, '$2y$12$tZtiPs0K6xSWty/AGlY09..LuOzzEc4G03kpFU3jYBvpypqESQt0.', 941, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(92, 'Keira Kilback', '352.573.2035', '1-980-982-8929', '2321 Dicki Mall Apt. 029\nNorth Christa, IL 73710-5196', '1987-06-19', 'Cumque molestiae est rem recusandae.', 6, 'irma.steuber@example.net', 'student', 'true', NULL, '$2y$12$kcjJXOFpN1KMDfg.Bk7lWeutipSZnQfJSA.zyEn9H820FpgQs.Qzi', 297, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(93, 'Prof. Breana Kihn', '(248) 358-6162', '1-931-771-3153', '618 Joshua Summit\nKevenstad, NV 65491-3328', '2011-10-29', 'Assumenda porro eos ut tempora quos.', 6, 'eriberto.glover@example.org', 'student', 'true', NULL, '$2y$12$3A9exN1JOmz9JYP2aj2pf.dhG3Epb4X4lCDAnywRgwvSY0k5.S8M6', 564, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(94, 'Janice Roberts', '+1-743-915-3607', '1-838-272-8296', '832 Ladarius Shores\nChristopbury, WA 09269-7381', '2010-07-02', 'Quas quam omnis beatae nihil quo quia vero.', 4, 'kchamplin@example.net', 'student', 'true', NULL, '$2y$12$5ThUUsVdSIocHjcPku9TKOycin8iThbGW9Z8OmzpN8AxYqXH0Cv/W', 689, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(95, 'Ms. Zora Gislason DVM', '+1 (850) 696-1565', '(830) 408-5597', '1867 Okuneva Lake Suite 920\nSatterfieldstad, WI 10176-4944', '2004-03-07', 'Laudantium sed assumenda explicabo illum minus.', 1, 'ystoltenberg@example.com', 'student', 'true', NULL, '$2y$12$JqnZU82j.B1XG46y1QxyCeCnRWi33EqputVkZP0.gHPrmItcD8fxO', 540, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(96, 'Mireille Stroman', '463.291.2433', '+1.413.435.2380', '47981 Orland Keys Suite 600\nBreitenbergton, WA 45912', '2024-11-03', 'Expedita totam cumque quis quis rem ipsam cumque ut.', 2, 'koepp.beverly@example.net', 'student', 'true', NULL, '$2y$12$k/DnrPjGo2Raenj3Y7yfq.rj48uyUzb1Q3/M7mrN.tM9gO5vqJj6G', 374, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(97, 'Ana Heidenreich', '726.622.1908', '559.812.7612', '63429 White Crescent Suite 328\nOzellamouth, AZ 15079', '1984-12-25', 'Veniam sunt enim dolor aspernatur iure impedit.', 9, 'kreiger.zion@example.com', 'student', 'true', NULL, '$2y$12$MsrowHWkxwk1eJGuKwtaoOlo3l.Ofl4iWopfeUTJj3esMJup5PiU6', 397, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(98, 'Foster Klocko', '757.486.3691', '+1 (609) 303-6670', '120 Leila Knoll Suite 618\nDeehaven, SD 90990-0038', '1983-06-02', 'Et saepe et velit eveniet beatae rem.', 0, 'wolf.barry@example.net', 'student', 'true', NULL, '$2y$12$nuAFhCc7lKBHdaJSb2b54eGGMj9PgfYH8MGKKR6.NYFUdTVKHmiDm', 180, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(99, 'Prof. Dalton Bernier DVM', '+1 (949) 618-8514', '+1 (715) 836-0935', '9762 Champlin Land\nHayleebury, AZ 06277', '1996-08-16', 'Temporibus minima sit minus quasi et est sit.', 7, 'hbeier@example.org', 'student', 'true', NULL, '$2y$12$WeWPckT4..FiainGXmfHwOTj3b8IFMCiymdf0fh4CkIUiuK5zaIlC', 954, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(100, 'Mr. Elias Hyatt', '(667) 888-1954', '+1 (870) 371-2581', '94060 Adele Valley\nWest Dave, CA 86670-5438', '2015-02-10', 'Quia repellendus a dolorum natus.', 3, 'mconn@example.net', 'student', 'true', NULL, '$2y$12$k9x2L/Y3maiyVXMuvuVUruUpPeN4o181zUpSQOu3p/BFXUAbeqzRS', 933, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(101, 'Cordie Hackett', '385.660.2170', '+1-848-492-5122', '697 Kody Valley Suite 117\nSouth Maidahaven, UT 09693-3296', '1971-10-10', 'Minima assumenda molestiae omnis et fugiat dolorem.', 2, 'bnolan@example.org', 'student', 'true', NULL, '$2y$12$rkffsgOjEq3MwmuHI/hZxeHuJBTXHEot2BJZiXyGiR19SciL9UN3K', 407, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(102, 'Johanna Balistreri', '860-979-6351', '1-254-606-8914', '5396 Bartoletti Road Apt. 729\nJaimefort, MN 81163-5886', '1974-05-02', 'Earum blanditiis non tempora ut ad.', 9, 'melisa.mitchell@example.net', 'student', 'true', NULL, '$2y$12$Oe9h9YVCoVgwnMUg6gw8wugvrFkfcajJbQHXYC40r3Cof5cQF5faq', 586, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(103, 'Prof. Zelma Shanahan I', '+1-629-548-0507', '317.423.0143', '63485 Marquardt Radial Suite 432\nJenkinschester, CO 07743-1862', '1994-08-28', 'Veniam est quas qui rerum.', 6, 'elmira95@example.org', 'student', 'true', NULL, '$2y$12$mXTi8E3mrEfdiyFXd0AA2O62r6XhyYGyuTQcqxiXoXA7SXsdFaoKe', 444, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(104, 'Caterina Reichert', '+1-405-856-0914', '458-628-0067', '4537 Schaefer Ridges Apt. 549\nSouth Meredith, NH 24698', '1998-02-16', 'Rem corrupti eligendi omnis quibusdam corrupti dolores.', 1, 'jamaal.dickinson@example.com', 'student', 'true', NULL, '$2y$12$u2OvZoPA2D/cFs58LzgMYerZUucEdAjJ/ziAFSKs.0uAdyghMh28S', 588, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(105, 'Darren Kovacek Jr.', '(430) 431-8455', '(952) 719-2651', '900 Adams Common Apt. 874\nCarolinachester, MT 20247', '1972-12-11', 'Earum voluptas molestias placeat ipsum.', 7, 'ntremblay@example.net', 'student', 'true', NULL, '$2y$12$BYbJFpMK0xIgFA0OMYhSVOnL/6kHi9zzkqul0JWr4b3wS5DXpYS7e', 770, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(106, 'Kiley Deckow', '(678) 817-5809', '1-360-309-6791', '1075 Aubree Oval Suite 364\nNew Alexander, SD 18687-8429', '1996-09-26', 'Eaque necessitatibus tempore illo.', 0, 'melvina35@example.org', 'student', 'true', NULL, '$2y$12$kVbCS1nz.jWXVGF/84gt1epKtMXAyObmnXeN4KCMRve3LjBimHan6', 514, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(107, 'Owen Donnelly', '1-283-905-1213', '+17135668176', '352 Herta Station Suite 579\nAufderharmouth, WV 93349-0508', '1991-06-12', 'Exercitationem soluta fugiat quod est deserunt quisquam laboriosam expedita.', 0, 'allison05@example.com', 'student', 'true', NULL, '$2y$12$GkkRxSlpF9pnj0qXBb1pIeyKC6lcMI30WI5Yb9v2BATTKdUw1/82K', 850, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(108, 'Mr. Conor West', '973.792.2526', '+1 (225) 629-6938', '8784 Cassandre Mission Apt. 760\nEast Merle, ID 88366', '1981-03-14', 'Amet non rem sed cumque quia enim.', 4, 'brock.koss@example.net', 'student', 'true', NULL, '$2y$12$htmUL8EBxHdpAdH0MV0MQepv5VaBdooyCLQhhA39zpR38/jBFMvom', 328, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(109, 'Jasen Barrows V', '+18084833983', '856.729.4936', '1479 Pamela Vista\nNorth Theron, MO 18296', '2004-02-12', 'Possimus est nihil minima quasi laudantium.', 6, 'rtromp@example.org', 'student', 'true', NULL, '$2y$12$3P3IgSfyErjl9GP2PLGMKeP8ACxASimDoN1SSoTtbDml9OvYjFMl.', 757, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(110, 'Jermaine Kessler IV', '+1.351.813.1095', '630-609-8040', '3576 Toy Mews Apt. 392\nNew Destiny, MA 01950', '2010-11-26', 'Odio illum perferendis ad qui et sed.', 1, 'francisco52@example.net', 'student', 'true', NULL, '$2y$12$1Wr5LxxvEzufoF7wh7Y/GOsextN1/R0ucllICaJZnp3epix0nBoSu', 667, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(111, 'Alize Marks', '(815) 467-8030', '+1 (323) 495-2640', '599 Alysson Drive Suite 174\nPort Claudine, AZ 49148-9043', '2018-05-01', 'Perferendis et temporibus sunt cupiditate aspernatur fuga ipsa.', 0, 'macy57@example.net', 'student', 'true', NULL, '$2y$12$imRWlbUsJVjU54aaKYG3rO94Wr1tKVwd58HNLwYWyX14PXRxIOoPO', 847, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(112, 'Dr. Rowland Kris', '409-558-2319', '1-424-435-3893', '5998 Weimann Fields Apt. 124\nLake Bette, MI 87908', '2006-06-28', 'Qui autem commodi dolores tempora ut accusamus blanditiis.', 8, 'dherzog@example.net', 'student', 'true', NULL, '$2y$12$6/M2nA9hAgPdysMTVZnwYuuNYcoq/Sr7c23WFDV.XxOcCYUT9rcui', 21, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(113, 'Prof. Estevan Keeling DVM', '720.571.3986', '832-402-5002', '27179 Bode Ways\nLake Davestad, AK 67066-0851', '1973-12-26', 'Inventore ea quia vel aut eum.', 1, 'xstroman@example.com', 'student', 'true', NULL, '$2y$12$P2TL4LrT0xfNp/AE4pMA9eP/noTRgjSFI6Z7KwSkqDasz59tJOJdS', 480, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(114, 'Dr. Joan Kub', '+1-520-206-9522', '(480) 914-8403', '51088 O\'Conner Lane Suite 745\nLaurenceview, IL 36243-1314', '1972-09-02', 'Cum molestiae aliquid repellendus.', 1, 'deshawn43@example.net', 'student', 'true', NULL, '$2y$12$Hbdzd9uP7LkdDIL5W0B5ie8bce3xU9XWK3gZOTP5dweS.iM4tbbNC', 490, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(115, 'Jennie King', '(478) 363-7770', '+19805537451', '80685 Jazmin Tunnel Suite 645\nLake Kory, GA 81320', '2010-09-02', 'A necessitatibus vel fugit laudantium.', 7, 'graciela77@example.com', 'student', 'true', NULL, '$2y$12$BlzpYRUy1oouQuQ/4uPtEe4qYK2yiTUvSfbSKCHnH15Ox9xl76UHC', 185, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(116, 'Miss Tanya Leffler I', '+1-260-522-8050', '843-355-5527', '70941 Rosemary Throughway\nEast Marcelle, WV 94587-8293', '2021-03-17', 'Nam optio eum eos debitis.', 2, 'cherman@example.com', 'student', 'true', NULL, '$2y$12$g0WZBjw7hni85liszK3CO..PnAMbLdh0YmSOugEN3ZJkt0IhOQNLC', 928, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(117, 'Dr. Aimee Monahan', '(586) 298-4509', '+1-901-612-6037', '64066 Aufderhar Fork\nEast Aureliechester, GA 13756-5024', '1999-05-13', 'Eos velit dignissimos sequi modi quae.', 5, 'tanya66@example.com', 'student', 'true', NULL, '$2y$12$4lfjvgKEVDVQBYENCdYNKuT9D25qw6mIIPOZLfSpHY6rZMRqhcBQi', 760, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(118, 'Liliane Simonis DDS', '+1.985.584.1059', '+1-239-670-5539', '905 Raynor Cove Suite 726\nConsidinestad, NY 83323-4052', '2006-05-04', 'Omnis eaque itaque qui sit provident cupiditate aut reprehenderit.', 2, 'evans06@example.org', 'student', 'true', NULL, '$2y$12$BPrUt5PpxPwKR1KJNyINI.wZwKa30r6mDgeB0QWkn7AySxAO1/WlO', 688, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(119, 'Rowland Shields', '(775) 921-5519', '+1-605-902-4119', '21295 Batz Hills\nDurganbury, OK 91486-7180', '2014-12-18', 'Minima assumenda minus aut recusandae sint qui.', 8, 'turcotte.jessie@example.net', 'student', 'true', NULL, '$2y$12$V3xkB/9ywiq6ByK.hm9oKOkY7AxsrkvkurNWLiSBNzaDpn3pnr15S', 679, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(120, 'Mekhi McLaughlin', '+1 (619) 553-3444', '(984) 994-1074', '8462 Zack Club\nPort Name, LA 60588', '2009-06-15', 'Voluptatem veniam nulla veritatis laboriosam ullam et.', 5, 'matilda64@example.com', 'student', 'true', NULL, '$2y$12$637CDsqbqT58kOXeV0xnlOsgo5Yt90ivev5FDtfUVfz8px3X09BRu', 646, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(121, 'Mrs. Josefa Doyle', '947-720-2475', '+1.669.438.1457', '4675 Rowe Via Suite 228\nTerryborough, FL 62799', '1991-04-14', 'Voluptatem unde tenetur et esse cumque eum dignissimos et.', 2, 'linnea.johnston@example.net', 'student', 'true', NULL, '$2y$12$5DO5PmSum6hfWevGotSC7OTx7vAgfWQoJyqFd8wHaadb1BLxEvFPK', 768, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(122, 'Miss Cynthia Donnelly', '234.462.7475', '(516) 932-3868', '10516 Emmanuel Ford Suite 432\nLegrosmouth, IN 47560-7976', '1982-11-23', 'Aut temporibus deserunt vel quo.', 6, 'npagac@example.org', 'student', 'true', NULL, '$2y$12$TjjhrgASeXAviW2CgnFDMOreygakcf9YGEYFVClq.nTAQRxiwKsB6', 401, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(123, 'Beth Bradtke', '1-217-765-8129', '1-430-321-6590', '11498 Brenden Extensions\nEast Chadmouth, TN 71627', '1991-01-03', 'Id quas sed est eius harum explicabo.', 3, 'mcdermott.kelton@example.net', 'student', 'true', NULL, '$2y$12$mCw4OzeS2hROsXVSGSPuq.myRZg685BPZi/84pR8B0HPguKyABxC.', 664, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(124, 'Leon Reilly', '830.717.2835', '+1.308.763.0075', '3414 Marlon Harbors Suite 986\nHarberton, MA 04847-6358', '1995-02-11', 'Dolor id eveniet autem maxime sint doloribus aut.', 2, 'art68@example.net', 'student', 'true', NULL, '$2y$12$G2m9P3vwlTtBqX6cTpG9MOBBTJo2H.Iz/qputz/gL2ILqKQD4wXRy', 628, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(125, 'Talia Rath V', '+1 (562) 820-8608', '1-857-384-1388', '6181 Lamont Vista Apt. 450\nCamilashire, RI 62847-6275', '1980-09-11', 'Nihil officia est soluta dicta sit aut rem.', 3, 'loyal.feeney@example.net', 'student', 'true', NULL, '$2y$12$XX.6lSE3nUQddR05j3Hk6.zY84UhPIQAdTrqbGjAnks/YSHF8A/ha', 490, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(126, 'Hilario Bernhard', '(845) 584-1603', '1-628-378-7022', '4941 Beer Islands\nLake Derrickchester, UT 87624', '1979-07-05', 'Ex ea consequatur aliquid non totam nemo.', 7, 'ystokes@example.com', 'student', 'true', NULL, '$2y$12$PfNxEsJk3vb.hVw7Idg1NeeDGpAzP8pRStTth/cerC7yb2pWQLkyO', 108, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(127, 'Khalil Beahan', '+13853852838', '+1-469-632-3035', '1108 Bartoletti Freeway\nSouth Destineychester, ME 74386-2023', '1973-10-30', 'Qui dolorum recusandae sunt fuga ipsum.', 5, 'schuyler32@example.com', 'student', 'true', NULL, '$2y$12$27yOeQdi7ovK8JIatRmnZOEhk8lpcM0lADzwVx0Y1RN5N/5QUfaM.', 250, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(128, 'Cloyd Mayert', '+16029340621', '+12607715145', '829 Roosevelt Stravenue Apt. 532\nZoeton, TX 46426-1520', '2005-01-07', 'Et quo fugit quia veritatis odio totam.', 1, 'belle.terry@example.com', 'student', 'true', NULL, '$2y$12$8JVw968umIlY.IrHO626UOv9acSwpcK49fp16wTTHhwIGx.H0eEiC', 647, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(129, 'Vincenza Crona', '+1 (539) 266-9264', '220.353.2461', '42696 Champlin Glen\nLake Frederic, RI 54188-0368', '2009-04-08', 'Eveniet unde ipsam itaque sequi earum tempora ea.', 4, 'armstrong.kyler@example.com', 'student', 'true', NULL, '$2y$12$Lr5RhDBzx5v.f1Gn8fRQVe8hfPoRzKmyD/tvuN2zYbdmiVXQEGTeu', 848, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(130, 'Coty Greenfelder Sr.', '+1-743-777-5606', '(248) 214-2414', '24259 Schamberger Island\nShannaburgh, NV 91251-4050', '1988-10-06', 'Accusamus non quia dolorem a et nemo dicta qui.', 9, 'ethan.weber@example.com', 'student', 'true', NULL, '$2y$12$7E5BuX80Rs8erNddpWoAl.s/86CnBFB2hiqQBuStBWC7WF91hhOdi', 863, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(131, 'Dominic Bauch Sr.', '+1-817-664-0183', '272-374-3660', '69029 Naomie Springs Apt. 425\nPort Davidside, KS 99401-4826', '1983-12-31', 'Voluptatem commodi facere aut voluptatum et modi.', 1, 'edwardo.runte@example.org', 'student', 'true', NULL, '$2y$12$nwe7YxHBzH97xP3a4me/2.l7ULNTqA3ZF.dPVml90MT5ct15ziK0a', 334, NULL, '2025-03-03 19:02:47', '2025-03-03 19:02:47'),
(132, 'Scottie Lockman', '865-376-6854', '+1-385-940-7235', '8334 Schiller Drive Apt. 042\nPort Loriport, ID 47061-0694', '1984-02-27', 'Non vel commodi eos ut voluptas ut.', 4, 'moore.anita@example.org', 'student', 'true', NULL, '$2y$12$jN0zRM7JKvUGH1qFmLh0b.L9ca216qTlv0GJKh4C5Pk3brCBvb9M.', 274, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(133, 'Aurelie Miller', '+1-620-519-0116', '+1 (629) 769-1064', '6981 Price Mount\nSouth Deshawnbury, OK 27019', '1988-05-21', 'Nisi in voluptas animi sed repudiandae nemo.', 8, 'wbartoletti@example.org', 'student', 'true', NULL, '$2y$12$UWPupR0Dk1cTSvXw2i5AD.wWrUtruuNNw0JhBKk9okVsD5Ujp9GZy', 520, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(134, 'Austyn Graham', '1-440-596-1476', '+1-530-527-0487', '31479 Korbin Roads\nNew Eli, CT 49777-7191', '2022-04-30', 'Nemo quae consequatur autem magnam ullam.', 6, 'nspinka@example.org', 'student', 'true', NULL, '$2y$12$V31H8tPuUWYca4ZlFVWFZO6Vd5fICPLx1.DvbFg3Xi2jEwKnUhjrG', 203, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(135, 'Oswald Champlin', '1-629-227-3353', '270.330.1081', '8570 Dallas Mountain Apt. 047\nLake Eldredland, MA 65121', '1980-03-06', 'Iusto exercitationem quam rem temporibus.', 1, 'emily12@example.org', 'student', 'true', NULL, '$2y$12$7RAW6FN8h2VL.ojO16MJPuVvYTgUxs9DlHX6yworas2HnIB3OJ2LC', 909, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(136, 'Rachelle Boyer', '231.495.3095', '1-860-347-7893', '92240 Hudson Cape\nEast Dominique, MO 41241', '1992-04-26', 'Sed rerum facere qui saepe quaerat ea est.', 5, 'toney.hills@example.net', 'student', 'true', NULL, '$2y$12$g7k2fCiykSgf48IBHaYF/O.U.V.x.NpljNRbyRv7spXIl9bbRVq6q', 333, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(137, 'Mrs. Vincenza King II', '856.686.7357', '1-973-221-5422', '20132 Gracie Plaza Apt. 725\nGerlachview, ME 13657-0326', '2023-02-18', 'Hic labore tempore non est distinctio similique neque.', 3, 'sabernathy@example.net', 'student', 'true', NULL, '$2y$12$xf1g7IMnO.5F3Zh5Is97ze0f0X7kGIpY5TPFr0CnvExirhdRikFDa', 866, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(138, 'Lora Schoen', '707-693-9711', '475.595.2546', '5151 Pasquale Locks Suite 230\nEichmannchester, DE 89456-3131', '1977-09-15', 'Repudiandae ipsa in consequatur nostrum.', 5, 'kaya.damore@example.com', 'student', 'true', NULL, '$2y$12$3Jbt55dxLW9BtoCifF/hZ.xaurQmsHYe7pFX.X4gcO6kr9hv30iLu', 231, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(139, 'Micah Zieme', '1-573-716-8296', '463.515.5852', '518 General Lake Suite 483\nJasttown, NY 75824', '2017-03-31', 'Qui quas earum sit fuga.', 0, 'mariano.hessel@example.org', 'student', 'true', NULL, '$2y$12$dd2K8eh6UT/VwqjHqkDweuGwR6UbdtdPkGWj1gpOPoyzOTU.Gllvu', 241, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(140, 'Dr. Jesse Thiel DVM', '770-396-6246', '+1 (989) 592-5355', '6931 Nayeli Ways\nEast Gideon, CA 48314-5164', '2017-01-28', 'Mollitia expedita deleniti quibusdam quo.', 6, 'lillie.lindgren@example.net', 'student', 'true', NULL, '$2y$12$TlW1zlQHrvtG6jRwu49xEuvm3j42Pvjs5HV.vRpPeqahhWuohf0Oq', 487, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(141, 'Denis Abbott', '925.743.3932', '831.499.7337', '78265 Kathleen Path Suite 264\nCassinmouth, TX 80849', '1995-02-27', 'Quia non beatae facere quidem.', 0, 'winifred29@example.net', 'student', 'true', NULL, '$2y$12$yht/7q7qOl98AXMoCKviUOeZf0awm4k.By4lOuVlp6Xyw5hPsAUEW', 688, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(142, 'Lesley Daugherty', '+1.386.302.6501', '208-525-5588', '3574 Kuhic Bypass\nBiankamouth, DC 43577-9639', '1982-05-01', 'Omnis illo atque eos veritatis libero voluptatum et.', 6, 'davion93@example.org', 'student', 'true', NULL, '$2y$12$NJ1QqGhfloDg6kEvuk4oG.2sMIBKxCabgv201CxG30JrapBNOB3l.', 39, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(143, 'Braden Bahringer Jr.', '1-224-827-2873', '(765) 623-3858', '86265 Eldred Views Apt. 237\nCamrenton, NE 48629', '2003-10-19', 'Voluptas atque aperiam animi vel.', 3, 'jrodriguez@example.org', 'student', 'true', NULL, '$2y$12$Miht97dOkOubfmKaB4PQBeODQ9vKdvWB1EBJgzNIDf3IxYoiLqhxi', 69, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(144, 'Stewart Grant MD', '678.746.4617', '+1-224-852-6599', '98993 Doris Alley Apt. 265\nNorth Maciebury, NY 44946', '1977-06-29', 'Quidem dolorum placeat veniam quia mollitia at id.', 0, 'vidal46@example.org', 'student', 'true', NULL, '$2y$12$f87UX22yFqebLxhGucHRXeH3aatCSKNYnJL/cE./qXQze6q5QBkAe', 893, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(145, 'Raegan Harber', '712.525.4069', '+1-321-343-9926', '71265 Huel Centers\nTysonshire, NJ 96277', '1998-05-23', 'Similique id asperiores dolorem sit dolor nesciunt reiciendis.', 8, 'steuber.frederick@example.org', 'student', 'true', NULL, '$2y$12$.DPXsyLwUekUO.69zrX7xOi02iOznUSoaIh71UPUDVaN2Yr2xt7bG', 897, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(146, 'Elda Prohaska', '+13619153151', '916-885-6716', '333 Becker Valleys\nPort Hershelside, MN 27291-0410', '1986-01-28', 'Ea voluptatem quibusdam officiis ipsa.', 2, 'pcruickshank@example.net', 'student', 'true', NULL, '$2y$12$8h0TZZ4l6ffNXd8FVpRZ9Osf1yo4H8LYcNpqxguu5l/i8gBiYX6Zm', 104, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(147, 'Kathryne Mohr', '1-757-513-3477', '+1-804-638-4396', '120 Dexter Islands\nHiltonhaven, OH 90197', '1972-03-17', 'Ut recusandae sunt cum.', 4, 'aschmeler@example.com', 'student', 'true', NULL, '$2y$12$3QDNAqfvpsAEvGIqooKm9O3Lfv6KoaorIRIoNlqH1F7dD3c5S3/W.', 49, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(148, 'Prof. Catherine Wiza', '229-753-0320', '331-219-1006', '446 Stamm Expressway\nGloverberg, MT 50831-4497', '1971-06-22', 'Iste iusto occaecati distinctio minus consequatur omnis dolores rerum.', 3, 'ezekiel81@example.com', 'student', 'true', NULL, '$2y$12$WbM2EmxqhA3XPiBW4hhmQej3bT.UZlppUJgTuLn.lEmi16jrZ1L7i', 815, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(149, 'Jesse Bartoletti MD', '1-202-440-1280', '+1-763-951-2282', '1133 Edna Crossing Apt. 198\nGissellemouth, WA 19579', '1997-10-03', 'Et aut similique quo.', 5, 'lavinia.hilpert@example.org', 'student', 'true', NULL, '$2y$12$ySXQ4d/.UREte6jhEJ5/rui8ne82M7aY4rwrq8H7tLBCdiK7xCSQm', 837, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(150, 'Ardith Zieme Sr.', '1-337-461-8501', '+1-754-325-6122', '9156 Gottlieb Grove\nProsaccoberg, IN 09606', '1995-08-25', 'Rerum sed et delectus aut et inventore.', 9, 'ckunde@example.com', 'student', 'true', NULL, '$2y$12$ZxOpwa9ZejGKSu6X/jbKmOwaYRuB2TMXnVHqaIZ84U8rNDyA1y.he', 995, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(151, 'Dr. Jeramy Cartwright', '+1.267.656.6878', '(773) 967-4063', '6247 Melyssa Mall\nPort Ilianaside, MD 29048-0848', '1973-01-19', 'Iusto odio illo rem sunt.', 4, 'halvorson.hilton@example.com', 'student', 'true', NULL, '$2y$12$yzHV.RnJ2ucA5GeTApmanOXxkSWlnU7gxbO.liOdm2T7ytD9ZJd/q', 482, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(152, 'Aimee Purdy', '267-379-8190', '248.779.5693', '3135 Leffler Extensions Apt. 839\nPort Annamae, NH 62197', '2007-04-02', 'Ipsa sequi nihil veritatis fugiat hic est.', 9, 'gbernhard@example.net', 'student', 'true', NULL, '$2y$12$u26h25iq1UHEFCJgrPTgbey/mJddvfOgMTtvshW6OVYBN6eckoQPi', 489, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(153, 'Watson Gleason II', '1-562-278-0492', '831-305-1027', '5940 Jaylen Ports\nBahringerstad, PA 60399-2831', '2008-08-24', 'Odio ad numquam dolor sit quis consequatur.', 2, 'rferry@example.org', 'student', 'true', NULL, '$2y$12$c84Dx1/KHMYvPXOeZV5uTuRLl5viPZ35H1cEN6Gf6.hu9aGw1sbjy', 11, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(154, 'Merl Greenfelder', '+1.615.951.9185', '985-679-3200', '1774 Beahan Parkways\nSherwoodview, NJ 44087', '2000-02-14', 'Voluptas iusto voluptas est quaerat nam inventore minus.', 2, 'ybrekke@example.com', 'student', 'true', NULL, '$2y$12$bskn0GjQOPQzWNvTHCyBrej5SGqe8/o4no/dhuHdPMwYTQxMBxoKS', 256, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(155, 'Lonny Stokes PhD', '+1.937.285.0955', '240-258-5807', '3241 Muhammad Walk\nEast Pierce, PA 85179', '1995-09-21', 'Consectetur nulla vero tempore sed.', 0, 'bridie82@example.net', 'student', 'true', NULL, '$2y$12$p6XnepPYEMEnKFv2jvG1/e936zLCKlzxW5DoazPs/6eZVRZwB9Kw6', 331, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(156, 'Katelyn Hoeger', '+1-442-940-0368', '+16509737514', '998 Eldridge Loaf Apt. 451\nThelmastad, CT 35439', '1985-05-28', 'Odio voluptatem delectus impedit esse amet suscipit voluptatem reprehenderit.', 1, 'harmony.hessel@example.net', 'student', 'true', NULL, '$2y$12$v4tbIQee00dKZrKtLUpqr.sanRlgLQF3.osvbqgRRBQ2cXJ05e7ca', 387, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(157, 'Harrison DuBuque', '330-606-1041', '+1-678-387-1864', '3101 Runolfsson Street Suite 117\nLake Alexanderstad, VA 33296-6718', '2003-12-31', 'Ipsum possimus esse harum enim laboriosam distinctio quam.', 5, 'caden82@example.org', 'student', 'true', NULL, '$2y$12$NYXB1nXFAMrq68vA5W0vZuFJuOgI3zjrB3b2dZ9KkAdHs77pyG9dC', 42, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(158, 'Dr. Rylan Kerluke III', '+1 (878) 252-7551', '629.493.8728', '18405 Wunsch Spurs\nLake Lizzie, VA 51657-8561', '1995-02-11', 'Non cumque expedita vel adipisci accusamus ipsum sint.', 0, 'goodwin.hattie@example.net', 'student', 'true', NULL, '$2y$12$q3100iBnczQ2IGS8hKQ3ous96sLAgeg/9t3SQVFFDyPZxCibU1BNu', 794, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(159, 'Mrs. Alejandra Marks', '+1-424-582-6299', '1-607-352-4995', '329 Green Mountain Suite 993\nBradtkefort, NJ 09866-2946', '2001-10-21', 'Voluptas ex voluptatibus quae sed nulla ut vero.', 8, 'martin20@example.com', 'student', 'true', NULL, '$2y$12$jy/LZcYSnNDso0VWh0HUEu0wLEUZ98Uiku/LPEE8EZ0HW2B9R60U.', 14, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(160, 'Brigitte Ratke', '+1-480-226-9843', '+1-229-955-7758', '42438 Bashirian Via\nHankland, DC 10447', '1976-08-01', 'Et aut quod fuga vero officia fuga ducimus.', 6, 'bode.zelda@example.org', 'student', 'true', NULL, '$2y$12$8Fk4s2JuDh2AqtkVCnrDv.nBftATdnjou/gaiKRoEdD9XxZEMhzdm', 690, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(161, 'Eliane Berge I', '+1-332-736-2866', '+12292499712', '15858 Berniece Rue\nSouth Lesley, TX 60834-8884', '2013-03-04', 'Beatae veritatis dolor corporis quasi ad in doloribus.', 6, 'hudson.jadon@example.com', 'student', 'true', NULL, '$2y$12$yQ/gt5gQ2AvqH98MRh72j.vVk.gJm.t2Uy/jT9cdBkDkz7PDXZqzO', 636, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(162, 'Delia Kshlerin', '(301) 929-8611', '+1 (845) 563-3396', '3949 Morton Creek\nWest Brialand, AR 98238', '1976-03-02', 'Quae id quisquam omnis consequuntur.', 7, 'christina83@example.net', 'student', 'true', NULL, '$2y$12$WtVuGvO4SvxRXd4eXkF65Ohh2W17vD5gRo8Ltv8q9vgYr7y3yXiKi', 655, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(163, 'Heidi Stamm III', '443-937-8469', '+1.848.374.1928', '25694 Alexa Parkway\nNorth Miguel, NH 95354-7936', '2009-11-02', 'Non asperiores molestiae ea dolores occaecati et.', 6, 'daphney.pouros@example.com', 'student', 'true', NULL, '$2y$12$Js/6ooVr7bnIPD2buu8B5.l81QFqCJfKaxwxC9.Sr9Q85EEij4DWu', 101, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(164, 'Thaddeus Schiller DVM', '+1-351-953-9840', '559.372.3072', '393 O\'Hara Inlet\nFerryfurt, MI 61630-7416', '2002-03-29', 'Est numquam tempore eum.', 8, 'shanahan.elda@example.com', 'student', 'true', NULL, '$2y$12$2YUreojoy6fQlC4HxcTi9OooVqjIsYZXJS84o4gROFyEY5V4/7ofG', 768, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(165, 'Javonte Murazik I', '+1-208-533-4362', '1-979-610-3889', '9816 Walsh Stream\nSouth Faustinochester, RI 60811-0140', '1993-07-31', 'Consectetur sit sunt minus doloribus consequatur.', 7, 'johnpaul39@example.org', 'student', 'true', NULL, '$2y$12$eJJZdAFXymNCWqJ/mPGRTeahUztglF3flN54c4Fb4Qy39gg4HQ0Cq', 218, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(166, 'Fabian Reichel V', '+1-283-552-1830', '435.996.2263', '34967 Koepp Flat\nPort Leonor, VT 60072-7579', '2022-08-12', 'Animi ab dolor enim doloribus ut unde corrupti veniam.', 3, 'magali79@example.org', 'student', 'true', NULL, '$2y$12$Y4r3.2Y5NanMDx428ltF8.U41PWm9bOn4iobTagLaRicffnMZLRem', 303, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(167, 'Zane Lang', '520-399-9878', '973-206-5158', '72927 Jenkins Falls\nLake Dulce, SC 04027-7242', '2013-08-24', 'Quo aliquid autem magnam et qui.', 8, 'madelyn10@example.com', 'student', 'true', NULL, '$2y$12$52biGARRQps1EtIa1NtMkOrs2KDbCYX.CrjbP6EB755a39kAjPgaK', 534, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(168, 'Maritza Schneider', '(616) 975-7401', '+1-628-890-0171', '584 Lilla Summit Suite 402\nKohlerport, WY 17765', '1981-04-03', 'Delectus est facilis aut magnam soluta modi quia.', 7, 'alford.jacobi@example.net', 'student', 'true', NULL, '$2y$12$frT.1h8gsaX1UrCqf1WIBOV90H.Yk9bY1oybLjQTZsKTNBwiXUYzK', 493, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(169, 'Riley Bogisich', '865-381-1631', '(657) 630-3867', '41899 Gulgowski Pines Suite 140\nLake Flaviefort, NY 35860-0034', '2021-05-26', 'Beatae molestias nisi non dolorem.', 9, 'mkoepp@example.com', 'student', 'true', NULL, '$2y$12$NU6vBqMt6ziRmux6f3eMzexMlPv9dhX3c7rIb0DLrIVwfrB5uJhxK', 93, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(170, 'Duane Schaden', '+1 (281) 787-9588', '1-484-579-4983', '6408 O\'Keefe Mills Suite 148\nBergnaumton, MI 40928', '1975-02-05', 'Odit dolores at sunt id dolore quia qui.', 3, 'ethyl.purdy@example.org', 'student', 'true', NULL, '$2y$12$WP0Ht79ZY.VpEG9AefjLXue4VGU8.x8DHVLfQSoGIzxTZ14C2ThQW', 189, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(171, 'Reese Kihn', '(816) 906-7259', '347-841-5231', '3607 Kendra Spur Apt. 943\nJaclynville, RI 73880-8390', '2008-05-08', 'Nesciunt nisi autem saepe qui quas est.', 9, 'juliet12@example.com', 'student', 'true', NULL, '$2y$12$zUmm/ZpIxwKA5bNcL8.URueSiL5sagvJtZ6JajVdUB5WP9WCshwB2', 687, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(172, 'Stanford Bode', '732.685.6773', '463-560-8072', '464 Champlin Harbors\nKleinton, FL 15143-0482', '1992-08-20', 'Magnam nam quaerat ut enim error minima aspernatur facilis.', 1, 'aric66@example.org', 'student', 'true', NULL, '$2y$12$0/RlUToidp9D9Ebrs6tPjOazed4g3/yW7Po5VQwRjixi/Cnj9Xvam', 466, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(173, 'Candice Bergnaum', '+1.940.435.1902', '+13399653990', '695 Stewart Street\nKristofferfurt, AL 72663-2273', '2018-05-21', 'Voluptatum itaque et totam minima id mollitia cumque.', 8, 'guiseppe74@example.org', 'student', 'true', NULL, '$2y$12$OoZzu5DhJ4GkWGUoQFxzFeYSuanw9jYEuPgpM4J7wRpAuVNVcE/li', 92, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(174, 'Ole Koss Sr.', '(509) 743-3590', '567-792-0226', '1559 Hoppe View\nSchmelermouth, SD 09925', '2003-04-28', 'Sed itaque labore iusto id.', 6, 'leone.paucek@example.com', 'student', 'true', NULL, '$2y$12$Hmmo/yKwm76WyBFKisYBs.VumyGbtoAOvsbB4uc/YLDMad5V46sOa', 846, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(175, 'Katarina Morissette', '540-678-4910', '(520) 210-3116', '631 Hiram Trace Apt. 852\nAlexieland, NC 15106-1807', '2022-03-16', 'Mollitia rerum blanditiis porro sunt cupiditate ipsam.', 0, 'rharvey@example.com', 'student', 'true', NULL, '$2y$12$mLInl0DzXGF9I15KbHg/f.YpCkn8D6k/KGBwdVvybb7A4yiLfvOha', 331, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(176, 'Nils McGlynn', '(904) 947-0693', '248-560-8971', '19390 Vaughn Plaza\nKutchville, NC 00673-1631', '1992-06-09', 'Facilis nulla similique dolores dolorem.', 9, 'cmarquardt@example.net', 'student', 'true', NULL, '$2y$12$FHbg.t4h9zLAIp0mQOOSR.2C/QP9Rl4TjCtkErg9WW8/36TMz1oi6', 979, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(177, 'Lola Graham', '1-724-717-5503', '+16018062237', '38742 Oceane Skyway\nNew Maudieland, TX 55366-1243', '2004-08-30', 'Amet voluptatem quia iure.', 7, 'brown.harley@example.net', 'student', 'true', NULL, '$2y$12$n3AUG1HMJV3OkZAPrDHS3eFmzvXuP.JdiDYl.OmbANkTf5pZFTGFm', 397, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(178, 'Beverly Berge II', '+1.332.584.1159', '(562) 899-5517', '69812 Schmitt Junction Apt. 609\nPort Sabrynamouth, OH 89614', '1994-09-05', 'Neque omnis ipsam minima quam.', 7, 'llegros@example.org', 'student', 'true', NULL, '$2y$12$eiW9hsTXpGAVufT32.FrS.ti4b2I1BpfNgtKPhzbnhRfuHI5KkrR2', 801, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(179, 'Eldred Braun', '+1-980-935-2233', '1-463-262-4993', '343 Maximilian Mews\nLake Erniebury, MO 75074-0366', '2022-12-29', 'Sed iure quia eum.', 6, 'mokuneva@example.org', 'student', 'true', NULL, '$2y$12$w00ZRBaHf3gktpU7lq1siukE/C3380xQlz0Z9/LY5dAv2eOjghVTy', 136, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(180, 'Dr. Terrell Haag V', '1-631-235-5613', '1-878-332-8297', '43725 Xander Greens\nEast Axel, VT 98877', '1989-09-10', 'Dolorem facilis vero a magnam.', 7, 'gloria11@example.net', 'student', 'true', NULL, '$2y$12$pFGa15awW6jGQ3pPF8O1reFnIGU7A5wEw.pOmaLZC2J5TmlkDNG1G', 850, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(181, 'Mr. Lon Koch', '(859) 291-5798', '+1-479-814-8884', '883 Alexandro Lights Suite 845\nIrvingberg, MI 27282-8440', '1995-11-29', 'Enim sed eius iste assumenda tempora provident.', 8, 'wyman06@example.com', 'student', 'true', NULL, '$2y$12$Ze5vCQlf/ZR4z4dCjctDTeYp1m5CQQW.gIToETKKeqdHTdLXpZu/O', 942, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(182, 'Rowan Miller II', '+12488378144', '419-659-2613', '237 Naomie Ports Suite 376\nNew Jamar, SC 03029-0772', '2001-03-24', 'Eos veniam sed debitis necessitatibus et debitis.', 8, 'nswift@example.net', 'student', 'true', NULL, '$2y$12$2HC9doKIo.3EQT3VGUozPO8QZu5OAN680PVaVyqeTa9kE645zHcku', 134, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(183, 'Josefina Moore', '828.836.4359', '+1 (480) 623-8018', '940 Sonny Centers Apt. 822\nCormierview, MT 91591', '1971-01-31', 'Et id distinctio delectus repellat alias.', 9, 'manley.hagenes@example.com', 'student', 'true', NULL, '$2y$12$3M9TYnUKW2DqSpfxaRCOr.pPJ7YhmfmSS7MPTtv58OdeXUzoFET6i', 629, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(184, 'Issac O\'Keefe', '(820) 520-7852', '(458) 309-0513', '3682 Jakubowski Parkway\nNew Ameliechester, WI 90511', '2011-10-04', 'Ratione magnam quia quo et quaerat.', 6, 'viola.wilderman@example.net', 'student', 'true', NULL, '$2y$12$aIlr8exxBIfHR6aB4CU8IuhZefoK/aXGEgTntwfp/AsWdPOq9yQki', 971, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(185, 'Enrique Schimmel', '+1-820-586-8027', '+1 (947) 589-5288', '752 Bahringer Way Suite 210\nNorth Maymie, FL 64636', '2015-06-07', 'Beatae beatae libero libero sunt.', 9, 'clifton.torphy@example.net', 'student', 'true', NULL, '$2y$12$LqlbV.kXyLVqB5Lp8rg.jOYTTQneOrERDoe5VLmZ3hUkXkJbOSWie', 632, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(186, 'Celine Kiehn II', '+1 (601) 336-9574', '1-253-844-9790', '9042 Blanda Glen Apt. 338\nSouth Camron, ND 53274-8330', '1985-01-26', 'Accusamus optio quidem aut facilis enim sint.', 3, 'fgleichner@example.com', 'student', 'true', NULL, '$2y$12$vVK0.CV8dOQpX.SAM2b8DerednL5Q0PLRBLtxqNPDqbQ6HpyPZQU2', 658, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(187, 'Elinore Bogan', '+1.785.507.5762', '480-792-2443', '37125 Sipes Lane Apt. 360\nSabrynaborough, VA 71167-6532', '1992-08-13', 'Dignissimos dolorem sint autem quasi minima voluptatem.', 7, 'samson.wilkinson@example.com', 'student', 'true', NULL, '$2y$12$vibd9L5wbEb9JW5x6rAN1.IqPgs5RjSdMJ51Ui85Z/oLlp3pMF1nW', 597, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(188, 'Bradly Wintheiser', '850-555-7531', '(248) 694-8660', '879 Camila Lane Apt. 915\nNew Paololand, OH 42831-9088', '1974-09-01', 'Quis laborum in eligendi vero ex amet voluptatum.', 4, 'aschneider@example.org', 'student', 'true', NULL, '$2y$12$pDqcnhZgFOyN1MBmwgPCsehG2k7mRLP81S/aDmmEXxChujuhef97a', 382, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(189, 'Dr. Elyssa Baumbach MD', '+1-551-452-4029', '941.804.6708', '9146 Brown Mission Apt. 905\nWest Jessie, CT 04001-9886', '2023-12-21', 'Ducimus aliquam voluptatem esse ducimus molestiae occaecati dolores qui.', 0, 'maryjane95@example.com', 'student', 'true', NULL, '$2y$12$MazMAiDce5FQ3QFUS2zUnuQSks2mEX1aks3wr22nBHwd..yoMmpv.', 737, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(190, 'Prof. Craig O\'Connell DDS', '207-779-6918', '(458) 815-1253', '6538 Runolfsdottir Stream\nHamillfort, NJ 36182', '2021-07-24', 'Pariatur nihil labore veritatis non eos dolorem nesciunt et.', 0, 'kovacek.liliane@example.org', 'student', 'true', NULL, '$2y$12$OazvI0M.iP4rxetj1z0vO.WSQ8FfN/bDrzLXlnO4Q7w9dPqdCQxN6', 130, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(191, 'Litzy Koelpin', '206-594-7873', '(207) 569-8121', '371 Dooley Motorway Apt. 189\nSchroedermouth, WV 32465', '1974-11-02', 'Velit amet qui ipsam.', 9, 'ihuels@example.net', 'student', 'true', NULL, '$2y$12$O2YeQF7nefPWynUWHLaOEeJ.TYaqs7MQ6ZUZenQTxLWHo1Mak3zaW', 654, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(192, 'Deondre Schimmel IV', '+1-518-282-1114', '1-308-370-7814', '9109 Stacy Corner\nNorth Robertahaven, DE 79225', '1987-04-09', 'Aperiam eos ad et maxime cupiditate ut ullam.', 2, 'cgreenholt@example.org', 'student', 'true', NULL, '$2y$12$K8w3EoLpDzca.SYe9ACbT.xcFviVopIxzvGRNir86WRd8SjY3JqD2', 53, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(193, 'Ms. Stacy Fisher II', '484.569.6362', '504.531.3489', '528 Denesik Forge Apt. 854\nElizabethtown, RI 85924-8792', '2010-05-11', 'Dignissimos tenetur consequatur nesciunt eos est et modi blanditiis.', 9, 'alvah76@example.com', 'student', 'true', NULL, '$2y$12$hiUJKpB2vZjQ99fLT4Z6u.wQKjsHU3S8/6RYOukpYqhF9GZrxXHwm', 953, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(194, 'Candida Morissette', '(713) 253-4888', '+1 (678) 392-3678', '841 Sophia Bypass Suite 066\nNew Antoniettaville, TX 04077-8397', '1992-05-20', 'Qui quia laborum autem et culpa voluptatem fugit.', 2, 'ikoepp@example.org', 'student', 'true', NULL, '$2y$12$fnbtvghZAMxpCgaij88kJefmFMI4fxCsUkWgmJZ1HKwMyz9BlZwyq', 144, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(195, 'Hosea Jenkins', '+1-747-779-5570', '(360) 496-4932', '94820 Chelsey Heights Suite 722\nSauerfort, RI 35228-7051', '2007-01-25', 'Impedit ea molestiae qui culpa soluta neque.', 0, 'runte.alessia@example.net', 'student', 'true', NULL, '$2y$12$ODujkjTOQd/uTJqh7g54cORvJ5RNNCNUPjJ9nYtzJ/lYClnIiNTs.', 832, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(196, 'Audreanne Wisozk', '(820) 238-5114', '706.441.9627', '33247 O\'Reilly Turnpike Suite 399\nNew Karleeberg, TN 73755', '2011-07-06', 'Ullam vel asperiores dolor.', 5, 'doyle.mraz@example.org', 'student', 'true', NULL, '$2y$12$8LRUmOkfWcxzoCTrzOuXbu70kgRTVqI3XuBxu4zkCQTEsbJGtK7cS', 990, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(197, 'Edd Langosh', '423.295.5964', '(657) 420-6736', '2917 Block Highway\nAnabelshire, ID 11283', '2008-09-19', 'Suscipit sit ut perferendis voluptatum et nihil.', 3, 'peyton23@example.com', 'student', 'true', NULL, '$2y$12$gr/OHIRjLGa3ayXiGg8B3eFhVNBcJAXBa66S8BFEXMvLiEjqx4stu', 344, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(198, 'Dr. Fredy Feil DDS', '+1-229-942-2615', '+1-305-697-6389', '3269 Stiedemann Dam\nOlinshire, NJ 18385-8953', '1990-08-02', 'Voluptates ut et et et dolor debitis.', 4, 'vernice.dicki@example.org', 'student', 'true', NULL, '$2y$12$VvhOTKEe.AJW.iR1tUQU9O0MbkfsitTSci6GALBKL1LE/mrKWgVSG', 413, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(199, 'Ms. Jazmyne Rempel Sr.', '+13514628338', '+1-302-221-9615', '918 Demetris Square\nPort Rosannabury, WY 10178-7670', '2014-03-26', 'Et sunt nostrum dolorum ex voluptas.', 6, 'onie.adams@example.net', 'student', 'true', NULL, '$2y$12$Iyz5akttJrbFFgRahRlow.ehFA8w9dwUXT2EgKH9twCBNnu774ERK', 198, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(200, 'Preston Schmidt IV', '949.605.9080', '+1.445.519.6831', '512 Hudson Squares Apt. 240\nOsinskiside, TX 74926-0735', '1996-06-18', 'Ipsam hic omnis quis voluptatem rerum nihil neque.', 0, 'dale.breitenberg@example.org', 'student', 'true', NULL, '$2y$12$VOTiu.U5J1mkMAo0CxnP0ON93Ye/B2FGY16TL6O1I57e1qXD9su0y', 552, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(201, 'Gina Harris', '(605) 952-3197', '1-614-714-3856', '931 Crona Trail\nEast Al, HI 67164-7384', '2013-12-02', 'Dolores consequatur reiciendis qui et non earum sed.', 7, 'carmela62@example.net', 'student', 'true', NULL, '$2y$12$XoiYx1I33QP/7TTDb9A9CeLdy3tG8UEr5vdhnGEfXsMPhht7wHco2', 956, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(202, 'Theron Welch DDS', '1-865-642-9994', '215.687.0329', '23923 Heidenreich Ports\nSouth Carissaside, NJ 67849', '1975-02-13', 'Voluptas ut ratione nihil dolorum recusandae dolore.', 6, 'jovani.huel@example.org', 'student', 'true', NULL, '$2y$12$p4QPrHS0ClBj0en/sKIKHeegot7jphU0A6kBbK14QKc5S2Kvuns0S', 534, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(203, 'Arvel Prosacco', '+15205398896', '+17048718357', '783 Hirthe Ferry\nSouth Devyn, AL 34671-9540', '1999-02-18', 'Natus aut et reprehenderit dolores.', 0, 'bbogisich@example.org', 'student', 'true', NULL, '$2y$12$J8WxmRBgeQwGunSkTyoUuuuxJQRkpTojCwqf9j5kdGdoHxmYeCNla', 176, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(204, 'Adolphus Bechtelar', '903.505.0594', '564.471.8355', '25090 Taya Orchard\nNorth Shainaton, DE 46696-5851', '2023-04-08', 'Deleniti numquam aliquid doloremque perferendis eligendi doloremque ipsum.', 7, 'maud.watsica@example.org', 'student', 'true', NULL, '$2y$12$9Tk3uJyC2Rlnz.zWJpcG8.hiLvQq5aQxclOr3dORTq4ptMQU3V3Ba', 469, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(205, 'Hayden Sporer Jr.', '+1-614-625-6493', '1-870-415-5190', '552 Quentin Stravenue\nHackettmouth, NV 81269', '2003-03-11', 'Porro et quos quaerat et voluptas maiores.', 9, 'yrenner@example.com', 'student', 'true', NULL, '$2y$12$g.fVvfMRhfPw6wFK3ujjBezNBhfG307FdD4t68GAnTqFGHRCMXze2', 994, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(206, 'Nadia Lehner', '+1.507.546.8964', '315.219.6256', '3367 Huels Burgs Apt. 402\nSpencerville, IN 06731', '1977-10-13', 'Consequatur praesentium assumenda nulla beatae consequuntur.', 6, 'tparker@example.net', 'student', 'true', NULL, '$2y$12$sIpi1LcV.kD2QXy8EYSW4OUOjWEbDj2zIUZwtv2VEpmIgHtwYSQwC', 849, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(207, 'Dr. Hollie Osinski', '(984) 623-6375', '+16319415823', '852 Littel Crescent Suite 370\nSouth Burnicefort, MT 89696-0686', '2022-12-10', 'Voluptatem id voluptas tempora sint accusamus deserunt quod a.', 3, 'jenkins.annabel@example.com', 'student', 'true', NULL, '$2y$12$L1XzHGB9ZkxXinxcYiH0yuMabRDWKXOlsAuJpu/9ERwvkKmly7j62', 421, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(208, 'Miss Rossie Olson', '+16192189323', '443.855.6418', '17260 Larson Walks Suite 500\nProhaskachester, IL 93750', '2010-08-13', 'Nemo est reprehenderit repellendus sunt sunt quidem fuga.', 6, 'xdickinson@example.com', 'student', 'true', NULL, '$2y$12$CPDmbe92cu.vnTgcNefgvuDFtKNv2uut6vgcf6iZQhwMDQjk0mnpm', 800, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(209, 'Guadalupe Streich DDS', '1-308-295-9561', '1-725-517-8532', '5700 Schinner Glens Apt. 124\nAmeliabury, WA 07693-8996', '2000-08-28', 'Quae quo est in tempora modi.', 0, 'percival.maggio@example.com', 'student', 'true', NULL, '$2y$12$nsTwEzvXQPDLUAVQVG3JrOkYtYbhc3ztUcRmf5tD7cvxVYvoph1Jy', 427, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(210, 'Prof. Beaulah Buckridge', '+1 (820) 359-2864', '+1.463.271.9961', '3870 Medhurst Skyway\nZackberg, IL 61149', '2008-07-12', 'Sunt consequatur labore nobis consectetur et amet vero.', 7, 'cassin.tre@example.com', 'student', 'true', NULL, '$2y$12$aZTUMXQBJztahziuvk724.muQiM4/WSP.eo9jKyosL4rRDKqsgeWi', 334, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(211, 'Dr. Xzavier Bosco', '(212) 809-0127', '1-386-838-5932', '397 Cassin Inlet\nLake Modestatown, WA 10265', '1980-10-09', 'Assumenda cupiditate at earum est velit rem atque.', 9, 'murphy.maritza@example.org', 'student', 'true', NULL, '$2y$12$MR4HqWaPFf4qvE9D1.MGqOxXdq0JMSX9.mc6ehE9SGWALyLWzbl9.', 845, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(212, 'Dr. Aracely McGlynn MD', '559.671.0858', '+1 (930) 736-6624', '6938 Schuster Highway Apt. 677\nBlandaport, AK 65330', '2006-05-05', 'Et quisquam sed repudiandae facilis dolores tempore quod.', 2, 'powlowski.alena@example.com', 'student', 'true', NULL, '$2y$12$q9HKdOXIg2npJbsCb30IV.oQcKANLx/E6.uZT22/caPukzNLUY0bC', 482, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(213, 'Dr. Mireya Ferry', '+1 (864) 379-8128', '(478) 642-2644', '491 Harris Creek Apt. 614\nEast Felipemouth, WI 67478', '2005-02-04', 'In reiciendis excepturi distinctio maxime sapiente adipisci.', 4, 'sheldon07@example.org', 'student', 'true', NULL, '$2y$12$u.xKru979oPL4.T.M0uoyuA9EOGatPFAnHTTFh8uO23IbXjSDPlgW', 104, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(214, 'Colleen Will', '229.347.0768', '1-276-543-2689', '280 Devonte Cliff\nStrosinfurt, WA 15178-8783', '1993-02-12', 'Fuga illo rerum et aut.', 3, 'igibson@example.com', 'student', 'true', NULL, '$2y$12$V0ko6RL7XgZxF/MPRjNC0.OIcxKAdp4khoBkhdIvefiXAlRsrCdOi', 954, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(215, 'Mrs. Joelle Hegmann DVM', '463.929.7402', '(878) 209-0121', '624 Russel Estates Suite 627\nPort Virginie, MN 60319', '2005-12-02', 'Voluptatem quia omnis doloremque dolorem.', 8, 'bednar.narciso@example.com', 'student', 'true', NULL, '$2y$12$06lDYIOA9LVSFQBt8dfzAucHh9j4NXhRaB63FRLZfPw00jZd1P9mO', 735, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(216, 'Juanita Purdy', '+1.559.608.7438', '+1-463-951-3522', '7739 Gerry Loaf Apt. 513\nJohnstonburgh, OK 98847', '2018-09-25', 'Quo possimus quasi veniam error modi numquam ut.', 6, 'gorczany.dean@example.com', 'student', 'true', NULL, '$2y$12$pzslWttaUwz5ji1LtByA1.s/g2vlN/6H.2KCftq8jBVaO2Re1RLge', 182, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(217, 'Randy Hills', '351-640-7631', '(678) 586-4030', '6171 Zulauf Meadow Apt. 234\nLeopoldoberg, AR 59267', '1994-06-14', 'Eaque quod iste esse eum tempore quia enim.', 6, 'ydamore@example.net', 'student', 'true', NULL, '$2y$12$SfnkXJwljjika8dhzvS04eCgsdLwwcqOkp.H7HKj8v7bHzeeUG02i', 20, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(218, 'Lula Sipes III', '(804) 256-1438', '+19165367820', '7563 Rohan Track\nTowneville, VA 46362-1296', '1976-08-18', 'Dolores asperiores voluptatum consequuntur ea maxime aperiam at.', 3, 'breitenberg.zoey@example.org', 'student', 'true', NULL, '$2y$12$Z/DWWhZHo70vSXJWqe6ry../EsocI113MbuiCSLgpUBZTNeg6vulS', 784, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(219, 'Isabella Wolff', '(954) 432-0580', '+1 (380) 808-6976', '988 Fabian Cove\nOrlandofurt, AK 81008-2714', '2001-12-28', 'At ut dignissimos quae tempora quia.', 1, 'jamie58@example.org', 'student', 'true', NULL, '$2y$12$w8S.DaBFcM4D7U2TJJFObu1LhL9/sHM.4TN59fQtHrjUqU5wF/vE.', 57, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(220, 'Prof. Armand Kulas DDS', '458.820.9481', '+1.617.255.9359', '125 Alycia Islands Apt. 103\nLake Cierrafort, ME 82576-8962', '1972-06-29', 'Eos sunt cum aut temporibus.', 5, 'kim.hoeger@example.net', 'student', 'true', NULL, '$2y$12$gEA1hyESG8kIANzoggGLle3smzP13AhJgy8U8kKCroaJI/u2xuHvW', 989, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(221, 'Rene Kautzer', '678.719.2862', '708-308-8306', '13036 Jaylin Plaza Suite 203\nLake Olafhaven, KS 16709', '2016-05-10', 'Nulla odio dolor laborum qui inventore autem delectus.', 2, 'jewell91@example.net', 'student', 'true', NULL, '$2y$12$zMfFWiKyFv6Ee46O3QpODuiyDm556ClL1Y11TqM2Ho/SQ.Uwu7Rre', 688, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(222, 'Broderick Aufderhar', '(732) 934-7133', '+1.563.772.4847', '61388 Joyce Pines Apt. 274\nEast Franzmouth, NM 53708-8828', '1999-10-08', 'Ad ab quia recusandae exercitationem incidunt ab fugit mollitia.', 3, 'ghansen@example.com', 'student', 'true', NULL, '$2y$12$X9qjemNIPBcxYyP/KjdFMeQd3M2883IIlDaOFZFO2FH7bhh1Pq8Pq', 142, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(223, 'Milan Pollich', '+1.934.509.7333', '(419) 546-3457', '76231 Oberbrunner Glens Suite 605\nOsinskiberg, CA 13324', '1973-04-26', 'Fugit quae amet sunt consequatur rerum molestiae.', 3, 'eulalia.franecki@example.com', 'student', 'true', NULL, '$2y$12$JSN7nNr5LcM0FtSGTnUDPeQGYU/ReOsCSOaUjcBDA2PEogazJd/ki', 766, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(224, 'Dr. Rollin Kunze IV', '(956) 776-1622', '631-222-9145', '8233 Ernser Road Suite 471\nNew Dennis, NE 99235-2028', '2001-02-19', 'Omnis est autem eligendi a molestias corrupti.', 4, 'powlowski.soledad@example.net', 'student', 'true', NULL, '$2y$12$EwgH02XPqr82cFtNSz7CCe2oYjpinjEmTytljYYdeU19ZsEMKC8dS', 880, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(225, 'Jaeden Bogan V', '+1-407-675-4498', '+1-732-264-4906', '5432 Charles Summit\nPort Madyson, WA 25833', '1970-09-09', 'Laudantium dolorum quod facere rerum voluptas asperiores ipsum.', 8, 'davin70@example.com', 'student', 'true', NULL, '$2y$12$G4rxaBBLiaKNuidyuc2/VeUpsQdKA75jPUbfa.mf9sBIHD3Co0Hsm', 952, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(226, 'Amara Kilback', '(501) 851-6585', '+1.318.218.4807', '417 Stacy Corner\nLake Tyreektown, TN 05424-7157', '1981-05-04', 'Molestiae id temporibus temporibus totam.', 2, 'julia44@example.org', 'student', 'true', NULL, '$2y$12$Q235lZDeRUvp7oJ22YRD6.EA6yTZhhbSwjy7zHJ3ve6vx8xE7NRWq', 285, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(227, 'Mrs. Alysa Balistreri V', '+1.223.210.4702', '360.534.8743', '413 Conroy Divide\nClintonside, WY 13192-7050', '1993-08-01', 'Voluptatem nihil libero quo dolores.', 3, 'fabian21@example.net', 'student', 'true', NULL, '$2y$12$oYtaMNBym4luWmuQqvUUBOBrGEcL9b2CP52Y8ypotckj//sDgVD6O', 738, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(228, 'Sage Powlowski', '(540) 310-1284', '+1.252.738.9212', '294 Jeramy Circles Apt. 343\nWest Marianbury, ND 07080-8656', '1972-01-26', 'Ratione qui ipsum magnam quisquam quo.', 9, 'dewitt06@example.org', 'student', 'true', NULL, '$2y$12$DAUQmrnXqyrxkQ7D9yIR9u1oHhCuluKWRbkolpHqn5LjranDWxB1e', 356, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(229, 'Asha Jones', '1-678-548-7549', '+1-661-588-3065', '88734 Bartoletti Pine\nNorth Rupertton, VT 27886', '1984-05-01', 'Cum ut consequatur molestias qui nobis enim exercitationem.', 0, 'mariano30@example.org', 'student', 'true', NULL, '$2y$12$gh6JnAiq92W8PhkYTFMvg.E48z2q0Khs1mMrRq9PoUPwBKgQ/hyXO', 955, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(230, 'Guiseppe Luettgen', '725-783-1031', '1-915-384-1022', '591 Swaniawski Place Suite 726\nCreminbury, MS 58390-3465', '1985-10-23', 'Autem sunt eaque sit corporis perspiciatis dolores.', 6, 'doris92@example.com', 'student', 'true', NULL, '$2y$12$qRQwTGdZgq7OhYt2JU1xg.xjBipU/dgRTtouFkTY030iNca.yfJMe', 854, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(231, 'Jocelyn Luettgen', '1-334-807-7420', '+1-229-547-1426', '9559 Jakubowski Plaza Apt. 647\nNorth Frankie, TX 43093-3255', '2013-08-27', 'Sunt iste nesciunt explicabo facere repudiandae.', 1, 'delmer.bergstrom@example.org', 'student', 'true', NULL, '$2y$12$3JiqD9ZjGiLm98YnqHHxwerqauzdLVvq5ax1CpWVITRn7SfSg5SSS', 328, NULL, '2025-03-03 19:05:10', '2025-03-03 19:05:10'),
(232, 'Lyric Aufderhar', '+1.682.260.5634', '267-732-8236', '25905 Mitchel Mission Apt. 402\nWest Phyllis, SC 14357', '1991-08-13', 'Porro eveniet praesentium aut aut tempora non porro.', 8, 'ayost@example.net', 'student', 'true', NULL, '$2y$12$c5eizzAMl/.1f118A90zA.2zNocapZ.JQF49WtFrdkgnTea6Kyeq2', 184, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(233, 'Kathryne Leannon', '+1 (386) 605-7607', '434.440.4179', '500 Gulgowski Valley Suite 734\nMcGlynnborough, NC 82081', '2008-08-31', 'Qui doloribus nobis labore vel.', 1, 'eryn34@example.com', 'student', 'true', NULL, '$2y$12$FxrtrK0rYEzej4jwCXzJvuG0.Sqzmzx6ty2foySfqJRhSfYgjjQLG', 998, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(234, 'Bettye Ward', '(380) 348-7324', '+19078516904', '9985 Haley Ford Suite 987\nLake Morrisview, NH 10537-9124', '2022-05-31', 'Sequi minus fugit aut reprehenderit.', 3, 'pokeefe@example.net', 'student', 'true', NULL, '$2y$12$DnUaGO.FDRK.gr.z1j9bWO2WhuotHoDb9gcdwWaLQmF9vVk5DdwDq', 639, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(235, 'Lacy Legros', '+1 (931) 460-6045', '(224) 397-3395', '14118 Columbus Heights Apt. 858\nEast Tanya, NE 30487', '1992-05-11', 'Veritatis consectetur aut ipsum a accusantium.', 4, 'arenner@example.com', 'student', 'true', NULL, '$2y$12$ULw/DkSUHqkNDEojwruuW.daj3g8vzvIZaL6w78n2iWOckjcWZUwW', 864, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(236, 'Reynold Veum Sr.', '341-801-7831', '+18728529848', '7511 Dax Mount Suite 580\nThieltown, MS 16264', '1982-07-02', 'Voluptas ab minus eaque est aut.', 3, 'sydney83@example.org', 'student', 'true', NULL, '$2y$12$psVrS2xSMGasS5okpXeRHOlwf1nrnFZBT5qthP0xjRV/ePl7V4szC', 205, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(237, 'Eugenia Schmitt', '+1 (629) 231-8589', '1-360-613-2778', '26240 Sherman Mall Apt. 693\nEast Susie, OK 63236-7202', '1993-04-17', 'Aut libero quisquam voluptas quis mollitia laboriosam.', 1, 'miller.crona@example.net', 'student', 'true', NULL, '$2y$12$qPsn92wawqyMPVjgjq4ZoeC9D4mlY7LPjc5KNp6y7vgopAl5jVmpW', 295, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(238, 'Prof. Houston Rempel', '619.726.9544', '501.282.2824', '3588 Sauer Ridge\nRosenbaumbury, OR 00252', '1999-12-07', 'Accusantium ex vel aliquam ex ut ex soluta.', 5, 'reginald.schowalter@example.com', 'student', 'true', NULL, '$2y$12$sauro1nsZPnZ9jyUP2fI9.gyyBdUYLhCr1c76X9mZWALNBwHLbMKq', 696, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(239, 'Kaylie Strosin', '458-275-1306', '(484) 887-5219', '6488 Idella Underpass\nWest Helenshire, IL 31934-2438', '2015-08-19', 'Itaque mollitia omnis praesentium ut tempora quam praesentium laborum.', 2, 'amos.shields@example.org', 'student', 'true', NULL, '$2y$12$.AfWICypgs0lOg7AbiuZCeUcGTdqhx9Ae.9XQOfcAIVx9chR3xL8C', 273, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(240, 'Sienna Wunsch', '+1.563.423.4653', '+14239711618', '9560 Felix Corners Apt. 908\nNew Herminio, DE 34348', '1985-10-15', 'Placeat earum eaque ab sunt amet adipisci enim.', 3, 'bogan.saige@example.net', 'student', 'true', NULL, '$2y$12$ENYRhy9Ge6a9mEdgO/YupO1Xil2ekQI3GU/smEZPc7WOEDTkUmw0m', 633, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(241, 'Americo Shanahan PhD', '+1.702.499.7966', '1-864-839-7865', '68816 Haylee Station Suite 651\nMaribelborough, UT 47199', '1976-03-15', 'Cupiditate nobis ut perspiciatis et ex et.', 2, 'donna99@example.com', 'student', 'true', NULL, '$2y$12$u.WN1.nCKV3LdOLs.oUynORuIk1rv851dyDjOvw7wAvqYewrPJfjC', 54, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(242, 'Dr. Susana Dooley PhD', '1-779-913-9917', '+1-225-920-0731', '97520 Abernathy Pines\nMyahstad, GA 93283', '2001-04-18', 'Maxime sequi non quasi expedita.', 0, 'haleigh.bradtke@example.net', 'student', 'true', NULL, '$2y$12$omsxCmCb5cQhduqSjtWCluKcBl.i5aKtOM8TNePdIKqZVDm7omQSW', 548, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(243, 'Mr. Hiram Quigley DDS', '+1 (828) 885-5156', '+1.240.659.7306', '979 Ambrose Corner Suite 313\nGoodwinburgh, NM 09340-2716', '1997-07-30', 'Reiciendis cumque quae et quos sunt cupiditate.', 8, 'frankie91@example.net', 'student', 'true', NULL, '$2y$12$Ly2K.ODSJtxsr0dgEAZyluuuTU0JB/1PAwp.tpiZs7MXocpZV76Li', 811, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(244, 'Liam Kulas', '719.693.9718', '616.602.1456', '867 Roberts Place\nRevabury, NH 47064-8716', '2018-02-01', 'Sit sit exercitationem et excepturi quas.', 5, 'guadalupe29@example.com', 'student', 'true', NULL, '$2y$12$XmjrcG4NZghFUWy4ttoMxuUrRv2QuAeh9stwd5MCTLOfFV.0gQ9qq', 831, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(245, 'Etha Wolff', '(551) 808-3062', '+1.757.625.5530', '606 O\'Keefe Avenue\nCaitlynfort, MD 18646', '1993-09-22', 'Numquam officiis tempore amet vero corporis voluptatum quas.', 8, 'legros.alfred@example.com', 'student', 'true', NULL, '$2y$12$f9SskwQC878eH7gkgf1tzeq2bRR.V50YXDj8pRKtIfFyRcwqigPeC', 866, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(246, 'Christine Ebert', '(405) 508-6783', '1-732-684-0318', '3839 Ashleigh Key Apt. 509\nAnjalishire, RI 81596', '2015-08-04', 'Optio modi sint neque aspernatur.', 9, 'mhermiston@example.org', 'student', 'true', NULL, '$2y$12$Opz9XxpYK0Q5Gp/0MzXhfeqUpEDqdiScNVU5Tl1xWeW462K3hd19e', 168, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(247, 'Maxine Streich', '(417) 849-3535', '+1.820.280.1235', '76701 Walsh Valleys Suite 077\nGracefort, NJ 42049-6224', '1976-10-09', 'Numquam itaque maiores occaecati atque et.', 0, 'cali.sauer@example.org', 'student', 'true', NULL, '$2y$12$QunT3LR/beXInmsUAaVDiOuvM20vWRiPY9UkwdCFJYhRAOBmlWiCu', 724, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(248, 'Hettie Nitzsche', '865-395-7540', '+16162288409', '355 O\'Kon Hollow\nDanielhaven, RI 36308-8614', '2022-08-28', 'At ipsa expedita explicabo tenetur magnam.', 2, 'danielle.paucek@example.net', 'student', 'true', NULL, '$2y$12$gZDeGACXxYo5EthOvXKVn.rqIn1ulhUjHZT9TAeWGqW90GdmYqAuW', 426, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(249, 'Clifford Hayes', '559.403.8020', '(301) 368-2829', '3693 Ward Common\nKuhnside, CT 87460-8276', '2001-10-03', 'Praesentium voluptatem nam nemo dolorem.', 9, 'bconn@example.org', 'student', 'true', NULL, '$2y$12$ovQys00u8HKWbpyHauIK4unKBWR3OqI7S/gBTHqOyRZrMLBruau4a', 529, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(250, 'Prof. Mekhi Wilkinson', '347.642.7118', '347-588-6602', '63796 Brad Meadow Apt. 267\nNorth Aurelio, KY 55515-2908', '2007-01-14', 'Minus hic ab voluptatem quas excepturi.', 6, 'rosamond.koss@example.net', 'student', 'true', NULL, '$2y$12$0PUR2Fgix.ISYiD5b3hg1uGYmRI6.H1SqCmHYLl1zI7.fICBIu5n6', 739, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(251, 'Liana Runolfsson', '+1-470-371-4811', '+1-251-393-0087', '73157 Fisher Highway\nVitoland, OK 97677-6272', '2016-12-25', 'Vitae quo qui autem assumenda aperiam ut adipisci.', 0, 'ycrooks@example.net', 'student', 'true', NULL, '$2y$12$1ymaIZVQJqDKci4RVpYH2uoWucpvDBl6XwIebagfdGEI6uA0554om', 817, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(252, 'Violet Volkman', '(559) 758-6265', '(614) 250-1239', '6335 Sipes Common\nKlingfort, NE 25917', '2003-09-25', 'Nostrum blanditiis dolorem et necessitatibus sit dolor vel officia.', 3, 'abdul.hane@example.org', 'student', 'true', NULL, '$2y$12$bxE81us/I6MdbAwr0IUaguMH/jU1PwFvvFXRYIK0jLDCUNYeHaPB.', 807, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(253, 'Alexandre Haley', '+1 (830) 393-2010', '1-743-231-8216', '9666 Dejah Common\nEast Angelo, NH 47839', '1985-10-11', 'Fugiat aperiam ut consequuntur omnis molestias vero dignissimos tempore.', 1, 'dokon@example.com', 'student', 'true', NULL, '$2y$12$OyM0z1dZP1BWbAwd7HlKf..sf3yURjda1d1.IqdE0uXW.gvTtOR3i', 179, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(254, 'Tanya Parisian', '+13804885527', '(661) 451-5058', '78067 Abelardo Keys Apt. 417\nPort Marlintown, NJ 33684', '1993-12-03', 'Delectus voluptatum repellendus illo et.', 5, 'watsica.jena@example.com', 'student', 'true', NULL, '$2y$12$yrr8IaMw/R83FwRWcN6zCelwkBYAl6A991Mcx0/AJWEBUharuqSGW', 284, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(255, 'Torrance Upton', '(862) 926-5089', '952.631.7894', '45518 Bednar Isle\nWest Gunner, AK 12741', '2024-05-11', 'Neque fuga similique mollitia amet occaecati laudantium.', 1, 'santa.weber@example.org', 'student', 'true', NULL, '$2y$12$lyznfsn63eGmlvcB8mLHkOd/jEyaltYDh7cRPPgwDYKipupIL1MPK', 172, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(256, 'Armand Hills', '(331) 955-0534', '571-919-6667', '90980 Verdie Islands\nSouth Reannaview, CA 17293', '1974-04-06', 'Ad ut quos voluptas dolor.', 9, 'carroll.josephine@example.org', 'student', 'true', NULL, '$2y$12$dO0PLTRihnA.b97InJL.gexHtQpA1bYCvUT.8PfCJcmDxHZlnpxwu', 995, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(257, 'Gretchen Stehr', '541.414.9189', '212.728.8598', '64139 Kris Light Apt. 944\nWillaborough, AL 71015-2412', '2002-05-04', 'Reiciendis mollitia praesentium minima ut et sed adipisci.', 8, 'broderick19@example.net', 'student', 'true', NULL, '$2y$12$dacVEmtYfHmebWEcI9E7G.ldlZw5wMpd6lpVqXRgon2RcB9YDym7q', 136, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(258, 'Wilma Schaefer', '475-737-6488', '940-510-7395', '4098 Eliezer Stream\nNew Justine, IL 38504-5335', '1970-02-22', 'Aut accusamus officiis est sed odit repudiandae.', 0, 'enoch13@example.com', 'student', 'true', NULL, '$2y$12$X6vOpcqCi465Ep30.aHa9.AQsvhNnk/UQg8ObFP0l8381l2C1AJPi', 880, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(259, 'Graham Marks I', '+1-313-889-7705', '+1.580.591.5432', '312 Kameron Passage\nWest Dwight, WI 83675-3125', '2014-10-09', 'Voluptatem porro a tempora eligendi sed a ullam.', 7, 'veum.celestine@example.net', 'student', 'true', NULL, '$2y$12$Zrgbj/bN0qPd8NKcSj3BuOY5zrC3wpcm1j4uFN8iXEe5azHlPVISu', 237, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(260, 'Prof. Randal Monahan V', '(857) 759-4494', '(769) 667-7077', '16912 Stiedemann Harbors Apt. 930\nEast Torey, AK 11447-1642', '1975-05-03', 'Et perferendis minus quaerat minus iste tenetur.', 7, 'jordyn36@example.org', 'student', 'true', NULL, '$2y$12$1NsNabmIvT5s9aH1V0tAm.Wtn83wpAB7q9TOqA0VHu09J3jf3CR0G', 735, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(261, 'Ike Baumbach', '+1.978.601.6858', '1-843-899-2366', '7533 Matt Run Apt. 719\nSouth Amiebury, WA 28304-8600', '1992-01-16', 'Sunt vel voluptatibus adipisci.', 1, 'brekke.marta@example.net', 'student', 'true', NULL, '$2y$12$IYUC/nR30hoP/XvWSTp9uOKxwot7Z5sTxcEee0Xn7LSwbX1c8wnZu', 78, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(262, 'Julio Botsford', '(626) 992-2948', '+1 (629) 226-0191', '21649 Hayes Street\nPort Julio, OH 81446-1109', '2014-05-27', 'Et animi exercitationem minus qui non delectus.', 5, 'enola04@example.net', 'student', 'true', NULL, '$2y$12$g9TtSCgUEsbJzzyPme652unebTKYgIcYtKlsFIiSRJk5CRTKq0ngm', 962, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(263, 'Aron Gibson', '772.697.1905', '1-830-305-3963', '5554 Bechtelar Crescent\nNew Leannmouth, WV 82610', '2007-03-23', 'Doloremque molestiae illo et aut et.', 0, 'lubowitz.sister@example.org', 'student', 'true', NULL, '$2y$12$MiUtMF5H9jmZKxvYScJse.oiS7ShH2rao9RduQNNB/7WzrKNb.qC2', 344, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(264, 'Abe Gerhold', '(325) 973-2971', '216-874-8234', '53885 Block Run\nNew Maya, KS 14044', '1976-06-15', 'Voluptates veniam quos doloremque et sed eos.', 5, 'isabel47@example.com', 'student', 'true', NULL, '$2y$12$Fe0y.eOOqEiWt82Kl5f9iej/a9TGHrNC6SqyCWxARQ5yT38GWuWa2', 601, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(265, 'Jaiden Grant', '631.740.2975', '+1 (754) 419-0217', '683 Destiney Spurs\nPort Mohammedton, CA 63433-0044', '2021-01-26', 'Voluptas quidem est omnis sunt dolorum.', 1, 'patience53@example.net', 'student', 'true', NULL, '$2y$12$x6GxFsKDbts.szmPV1PyH.6Hs3PHcvrYKN3y7pWhcUcpr.k.154QS', 246, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(266, 'Marianna Kilback', '928-249-9211', '1-820-435-0489', '5381 Virgie Streets\nNew Savannaview, NC 95863-4763', '2005-01-13', 'Ut sed eos ut culpa exercitationem perferendis maxime et.', 5, 'schumm.chester@example.org', 'student', 'true', NULL, '$2y$12$N1kzGjahZfkOzEgzm/4NiOSrIDUH3fm062K8FLTP.wwjMn2mNwCC2', 107, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(267, 'Valerie Luettgen', '585-870-3399', '1-779-444-5328', '8294 Nader Port Suite 929\nNorth Alec, WA 08502', '2000-05-30', 'Quia voluptates et aut saepe.', 7, 'marley49@example.net', 'student', 'true', NULL, '$2y$12$dqc0A6C6kKsPDs/jKc2JvuM3ULjVri1RTxsX7iKdwrm1fDRAf5/dC', 323, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(268, 'Novella Braun', '216.498.4047', '+13058976892', '70554 Wilhelmine Ports Apt. 816\nKrajcikville, RI 87834', '1978-04-23', 'Iste sunt in dolorem cum sit.', 1, 'hilpert.fern@example.com', 'student', 'true', NULL, '$2y$12$ACAbBLykjuEokJjLewmKPedddql53KIrrNYE64lEem7nYzv6OUGES', 976, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(269, 'Prof. Aliyah Langosh', '+1.479.699.4475', '(678) 837-2455', '87325 Oberbrunner Place Suite 060\nRomashire, MA 35809-5474', '1978-11-20', 'Error vitae quo dolores unde provident eius.', 3, 'finn.abshire@example.net', 'student', 'true', NULL, '$2y$12$6Fg.qgqMRLFHEGQaupPn5.smStdLqyuZDVL7A6.wOMp6GCnQlPVIq', 137, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(270, 'Lafayette Sanford', '480-249-7971', '+1.770.305.9619', '5734 Dach Views\nFriesenberg, AL 01070-8293', '1982-07-30', 'Ut asperiores quae ipsam a dolorem.', 3, 'lisette06@example.net', 'student', 'true', NULL, '$2y$12$q56Pq0NtcrXkkGdQ/An2ouz2lbP2kdR4WLTSzrMpnUr4fQg/vUIbO', 175, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(271, 'Mr. Dashawn Kuvalis', '+12038107755', '+1-559-740-5073', '9490 Josephine Islands\nNorth Howell, OK 37924', '2010-01-22', 'Velit quisquam magnam corporis nobis.', 9, 'gladyce98@example.com', 'student', 'true', NULL, '$2y$12$DulFRhHcnp0kcclvoJe2AuKpnO6upix9NvfhXbwueH.NmQSVibF92', 132, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(272, 'Dr. Dwight Abshire', '774-899-7532', '+14806873034', '5127 Hudson Estates\nVolkmanborough, DC 88117-4007', '2010-06-22', 'Est fugiat excepturi quis.', 0, 'nels13@example.com', 'student', 'true', NULL, '$2y$12$gteQ2bMKS1GbqZQMHZyz0OS0z0NJ2dBteZTS3bgTXT97xujsWNowa', 442, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(273, 'Janie Bashirian', '+1 (607) 259-8419', '(251) 575-7043', '7222 Ettie Ford Apt. 718\nLangworthville, KS 41064', '2011-02-15', 'Voluptas ut eum ea laborum voluptatem quasi.', 8, 'sylvan.gottlieb@example.net', 'student', 'true', NULL, '$2y$12$bheagM3oGnVjV4huH8hPE.GHrfREAUFQ2Yk5YeGIhY2TFVOGwsJga', 748, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(274, 'Angeline Oberbrunner V', '321.456.6926', '1-616-904-5712', '39845 Kavon Island\nLake Astrid, WA 37972-6293', '2002-05-22', 'Et minus et id sint.', 9, 'roscoe09@example.com', 'student', 'true', NULL, '$2y$12$42gzQcEq7ZChzyONgRjHN.dgQYX.I1j3FG7y4GhKQlKqGmev5SMfS', 473, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(275, 'Corene Brekke', '669-247-1228', '+1.714.725.7300', '1670 Jody Manors\nPort Leif, MI 11506-5191', '1980-05-30', 'Commodi aut in et ratione qui laborum.', 1, 'beaulah81@example.com', 'student', 'true', NULL, '$2y$12$cfvjvMDEPq3/g6ezRtL5beGs5x.GzExdf//.GSLAKZeKjPtXWX8jK', 147, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(276, 'Kaci Murphy', '706-227-2238', '909.348.3204', '527 Dimitri Pines\nAlphonsoside, ME 01437', '1970-02-26', 'Dolores quia dolores ipsum culpa.', 7, 'victoria99@example.com', 'student', 'true', NULL, '$2y$12$BCBHAZ8Fc5S97cQb3nG7eeBdwo8h3uASCM4iZ7.3RROPrIcYzqChe', 642, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(277, 'Mr. Ike Lynch Sr.', '1-757-481-2295', '830.699.9563', '67452 Pagac Ridge Suite 932\nNew Eleanorafort, PA 89910', '1970-02-25', 'Doloremque iste praesentium in odit perspiciatis dolores.', 6, 'adams.casper@example.com', 'student', 'true', NULL, '$2y$12$4A/XA44LhNW/.54Q6.JJqOymHisnUsB8fHDosNLK30SiD2LtR1q5G', 841, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(278, 'Dr. Mozelle Gerlach', '803-981-9281', '+1-785-376-4291', '4670 Nolan Hollow Suite 172\nNorth Peyton, DC 37183-3573', '1989-04-23', 'Cupiditate adipisci magni suscipit et pariatur.', 2, 'dandre02@example.com', 'student', 'true', NULL, '$2y$12$DbkhC2OYsOedHD0zyhTl.eSdSC7yla/y6YYT6V21smNV1I0srWtLe', 313, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(279, 'Jalon Wyman', '+1.319.714.1669', '(719) 854-1258', '9865 Glover Mountains Suite 863\nNew Elifort, NJ 73281-4052', '1997-08-28', 'Dolorem voluptates ut repellat cumque dicta sunt.', 6, 'saige.kutch@example.net', 'student', 'true', NULL, '$2y$12$PlwxPezQCuBrzeXK4QghPefHJh1WUHSoRHm2Mc.HYJTtYAVWobVz2', 350, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(280, 'Kelley Daugherty', '1-541-707-0993', '845-503-5287', '56442 Rickey Heights Apt. 901\nSouth Rosalind, SD 43101-7465', '2010-07-16', 'Enim consequatur adipisci ratione molestias esse.', 8, 'isaias.lesch@example.net', 'student', 'true', NULL, '$2y$12$7yTcwqRybuo8sNlthPp6zelUoGgCLm.PT/ZHWIMkNrv7CP8LTrZFK', 897, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(281, 'Ms. Hortense Kuhn', '+1 (316) 821-2083', '214-703-4945', '889 Robel Forks\nLake Arnaldo, CT 64569-3759', '1978-11-04', 'Est maiores consequatur ipsa suscipit inventore et.', 9, 'wisoky.ken@example.org', 'student', 'true', NULL, '$2y$12$Yr.7veRspupk.d/7wDxGJesgi.EQK.X.If7jxzNawfe0Y9KgPqdfW', 550, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(282, 'Elvera Roob III', '1-785-218-2562', '336.970.3716', '22645 Wiegand Falls Suite 089\nPort Amparoside, AR 98277-4805', '2009-08-31', 'Quidem laboriosam voluptatem vel eos et ex deserunt.', 2, 'blair68@example.net', 'student', 'true', NULL, '$2y$12$emgQsjsG9X90L06HRex4zOljFx0rJis9B7MKj8el48cCpNcPy8mD2', 603, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(283, 'Prof. Waylon Cronin PhD', '1-201-236-7091', '951-791-5257', '776 Boyle Corner Apt. 833\nWolffmouth, AZ 24990', '1999-11-22', 'Aperiam nam nulla provident aspernatur nam architecto.', 5, 'marlon.terry@example.org', 'student', 'true', NULL, '$2y$12$ypj4FL/Kha6G8Hpx55VYGOhKa5tR1v8d7G6wCF6c8jMs9glPmeJQS', 571, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(284, 'Everette Oberbrunner', '+1-920-616-1500', '+1-351-930-8622', '768 Dicki Creek Apt. 496\nKamrenbury, LA 09448', '1982-06-18', 'Placeat cumque et qui quia consectetur tenetur.', 1, 'jarrell19@example.org', 'student', 'true', NULL, '$2y$12$zqSGMnd2uLzhjpkt2Z1APera7kSKqESbnu5tlJEcyr3ANY60buhzC', 444, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(285, 'Julien Rogahn', '+1.607.323.1393', '+1 (260) 383-8943', '1802 Goodwin Flat Suite 492\nEvabury, ID 98971', '1970-08-17', 'Architecto sunt omnis a impedit autem et est.', 3, 'schuyler14@example.com', 'student', 'true', NULL, '$2y$12$FXR8kdh203hgkvngpX8Pre5tfhYXgjDf7Ftk3EhYCYzZRhWuDbfMe', 557, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(286, 'Mrs. Graciela Larkin DDS', '769.604.7326', '+1-727-707-9448', '848 Oberbrunner Route Apt. 927\nGenevieveberg, KS 51274-6733', '1992-08-08', 'Et eos exercitationem quo.', 1, 'pouros.herta@example.com', 'student', 'true', NULL, '$2y$12$gsrOz9zH1VluZUJ28X0a.eEz718tGLi218oBvJYtpMHQJKwZRzoZa', 777, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(287, 'Odessa Ferry Sr.', '972.823.7794', '+12406889822', '47345 Hayes Plains Suite 306\nJonesville, IN 56964', '2001-11-20', 'Voluptatum laudantium assumenda harum ducimus ut ducimus.', 2, 'althea.bradtke@example.com', 'student', 'true', NULL, '$2y$12$Mej48iHxhGR5gv8y4HNK8e7WMKN68SP0HC.ARuHL/1Kg/KbvMMM3O', 817, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(288, 'Bonnie Simonis', '1-534-720-1848', '240.623.7683', '324 Abraham Grove Suite 244\nNew Kaiashire, IN 72043', '1995-06-21', 'Enim tenetur qui cupiditate consequatur ipsa.', 6, 'henri.johnston@example.com', 'student', 'true', NULL, '$2y$12$hBMfVS9EhCnM9Dxc4qJBR.OSsjNpoy8TTXtz576j08VsXtcoBKFW6', 735, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(289, 'Jaquelin Mayert', '628.767.8765', '631-676-2606', '3550 Miller Causeway\nDuBuqueberg, LA 65990-8847', '1991-12-12', 'Maiores fuga libero vel.', 0, 'marietta.hammes@example.com', 'student', 'true', NULL, '$2y$12$K6RWJF.8Py3IjKAxbxclneK25zDU5qfYk4a.sc0ZcWKHFLJfQ1y12', 403, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(290, 'Joey Smitham', '870-439-3181', '+1-346-503-9185', '9761 Elsie Lights Apt. 735\nNorth Leola, WV 68320', '1991-01-14', 'Non blanditiis sunt dolorem in mollitia dicta et.', 6, 'cooper.crist@example.com', 'student', 'true', NULL, '$2y$12$a39hgioDNnsHUCTFsZWmEeuOyUJTcU1WZpWtErkDJHope6pIg0SFK', 523, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(291, 'Ernest Thiel', '+14249759340', '+1 (470) 951-1314', '5505 Mable Mountains\nNew Olin, AZ 83946-1386', '2016-07-28', 'Occaecati consectetur itaque quas maiores in possimus.', 7, 'bertram.schuster@example.org', 'student', 'true', NULL, '$2y$12$e64FWUaFLoazeCiABRjI3uzYLM6P1gsPLpC4qWVVAII8hbYLFJiKO', 799, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(292, 'Dr. Emmanuel Schinner', '+15759461019', '+1.941.385.3307', '93458 Welch Plain\nOberbrunnerton, CO 69496-0873', '2014-09-18', 'Sed voluptatem eius ut veritatis commodi qui voluptate.', 2, 'marcus.wolf@example.net', 'student', 'true', NULL, '$2y$12$9b39QjzvU7A9hJI7gau.kuV/HXmmC2I.yJzgICT6yAmsaW1imClwa', 399, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(293, 'Ricardo Strosin', '1-515-408-5485', '(458) 322-0386', '7671 Langosh Plains\nEast D\'angelomouth, OR 53520-4457', '2015-04-17', 'Soluta soluta voluptatem ut eum non incidunt.', 3, 'kkrajcik@example.net', 'student', 'true', NULL, '$2y$12$Os.bw5Rn5aat.zBkOmOuTOcdtnChcfixTK43JXLfc4hfrMGnd5Pzi', 42, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(294, 'Grace Baumbach', '+12722208545', '435-906-4202', '79449 Kub Field Apt. 692\nBeerport, MO 38459-4625', '1990-06-13', 'Debitis dolore laudantium ut.', 3, 'marion.daniel@example.net', 'student', 'true', NULL, '$2y$12$GYeViCH8Z9QB.jbcCMqhm.NoE0hqhHXGzC0/eHq7hYWEc36ZE8X52', 663, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(295, 'Prof. Tobin Mertz I', '(626) 898-1622', '(646) 446-5696', '287 Rowe Flat Apt. 257\nSipesburgh, TX 74994-2415', '2001-02-21', 'Aut excepturi harum aperiam aliquid repudiandae.', 8, 'hschimmel@example.com', 'student', 'true', NULL, '$2y$12$JtB1d/4zjOvUrtwO0ALENewsdrFNvCXPWCU0OXOYwhMcO9d8keG.u', 173, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(296, 'Mr. Dorthy Turcotte IV', '1-217-253-1864', '+1-848-692-8976', '1972 Ursula Lakes Apt. 041\nSchultzmouth, WA 66236', '2004-10-19', 'Reprehenderit commodi ea magni non.', 0, 'daniella.towne@example.net', 'student', 'true', NULL, '$2y$12$wIg62xZazstudkUc0qrHt.NvBdbZvmcJR9/Aain0Hc.KGM6slFX3q', 141, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(297, 'Prof. Magnus Cronin', '1-714-651-6256', '+1 (240) 430-5500', '42620 Thalia Centers\nHermanville, AZ 31129-2698', '2003-09-05', 'Consequatur exercitationem ut veniam et aut amet porro.', 6, 'alejandrin.hyatt@example.net', 'student', 'true', NULL, '$2y$12$iXkktjHwdqF2B2RgyKezwe.1PIGj.36QHPH72pcJdLQYcO4ltHYvK', 25, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(298, 'Heather Abshire', '+1 (281) 926-5955', '+1 (541) 573-8987', '6982 Mercedes Keys\nMossiebury, AR 23941-0003', '2010-02-25', 'Placeat sunt voluptatem nam.', 5, 'jasper.glover@example.org', 'student', 'true', NULL, '$2y$12$zLpXMN7tJ8Ulpps1Z0ekF..5kK5ZWgs.wUlDgTfJc8Rj0Cu86uI6i', 696, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(299, 'Dr. Kaia Dietrich DVM', '+1-424-345-5457', '+19085604555', '29871 Sophia Drive Suite 080\nNorth Ollieland, VT 39073', '1986-12-20', 'Sunt voluptas eos nisi qui qui pariatur.', 6, 'helmer.cole@example.org', 'student', 'true', NULL, '$2y$12$ghrc3I/omXH7SQQfxVxrROQB0gxQv7uQ5t9iXX5O1ZYJvZu3oTW6W', 122, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(300, 'Deshawn Quigley', '978.583.1472', '+1-914-653-4815', '4015 Armstrong Cove Apt. 673\nArtton, MA 97569-1844', '1975-11-29', 'Impedit neque officiis deserunt facere facere voluptatem molestiae.', 3, 'vjohnston@example.com', 'student', 'true', NULL, '$2y$12$KyAd3ieSRIKXQBa4B6R/C.Mg4Ei93SixfONP8RyAZJhLnhFi5MlGu', 220, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(301, 'Lucius Haag', '(308) 567-0891', '215.969.4238', '95800 Block Mall Apt. 968\nDeckowside, IA 45857-3851', '1972-02-18', 'Omnis animi alias tempora voluptatem.', 3, 'oceane82@example.net', 'student', 'true', NULL, '$2y$12$aRWDJS4GsUadli4nkxtkPeSnoqNFY930YAll57TJ/AqUO.xVWcGoa', 124, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(302, 'Miss Kavon Stark', '+1 (828) 476-6418', '(256) 551-2678', '31348 Wolff Corners Apt. 217\nEdnafort, MS 89147-0219', '1996-10-20', 'Maxime ut quis dolorum sit.', 2, 'lubowitz.muriel@example.org', 'student', 'true', NULL, '$2y$12$W138MxtXVnmmWZbSNDr84.te3rqQjlac7yamG34a0B4Q7Sbwjc/l.', 22, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(303, 'Prof. Bonnie Kassulke', '229.686.1647', '1-262-450-5152', '62862 Stiedemann Pine\nBartside, OK 36007', '2000-05-08', 'Architecto aut quisquam cum illo voluptas eius laborum.', 6, 'darlene.lesch@example.org', 'student', 'true', NULL, '$2y$12$0YDXfOVf.w4zGh48FXHS..bQD3OmlG4pVUTLGgg87H7CDLuarPsgC', 126, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(304, 'Teresa Fadel', '580-872-6328', '(620) 572-9178', '2606 Lempi Plains Apt. 632\nDewayneport, CO 43964-7309', '2019-06-25', 'Sequi provident eaque harum ut et consequuntur a.', 4, 'reuben46@example.org', 'student', 'true', NULL, '$2y$12$YmNrp/GcUQIjTyA6nxXp8eFaaCEQfFclKjE6RvghRXCprToRmFCh6', 444, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(305, 'Mr. Davonte O\'Conner', '315-953-1491', '(575) 315-9924', '9588 Gislason Roads Suite 599\nWillardmouth, VA 72985', '2004-11-03', 'Eos debitis earum est iste suscipit.', 7, 'karl.heathcote@example.net', 'student', 'true', NULL, '$2y$12$tDX6v0GhQIUZsXbYC5yNwuZWy9zu3cpA5VDs2VkeipMJ8nj0T1tZ2', 699, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(306, 'Rosario Jacobson', '518-686-9745', '563-950-1896', '772 Pearlie Key Suite 525\nPort Adriana, MO 58068', '1977-01-10', 'Molestiae corporis aut saepe.', 3, 'wilfrid28@example.com', 'student', 'true', NULL, '$2y$12$jGWRF80KApUINcUtmORKceHTcgLPo6n1fHb81sYoy6WggBiEXJhIy', 643, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(307, 'Dr. Tiana Green MD', '864-215-9561', '+14099063550', '3383 Courtney Crescent Apt. 648\nKayleychester, DE 36930', '1978-12-12', 'Commodi mollitia suscipit ullam at officia sed iure.', 4, 'eulah.sawayn@example.net', 'student', 'true', NULL, '$2y$12$6MZmM5EtyC2NO0qCoYV1Lu4q/uRNiNctBiJgX7pnFyEtWFoAeGsH.', 286, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(308, 'Dr. Dulce Bechtelar', '423.596.9240', '+16789201461', '94532 Berniece Harbors\nPort Joesph, RI 47804', '1974-11-08', 'Aut assumenda hic qui.', 9, 'pfannerstill.morton@example.com', 'student', 'true', NULL, '$2y$12$qXzAj/uR/.d7xG71C1z3SuHdRNkpbQgEDctq5D7EpHBHlWjPW.U0O', 195, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(309, 'Dr. Javonte Rohan', '872.834.7339', '+1.850.488.0863', '7531 Jordan Port Suite 386\nNew Emile, LA 00338-8842', '1982-12-28', 'Fugiat unde eligendi repellendus voluptate sit ipsum modi.', 1, 'jeffry52@example.org', 'student', 'true', NULL, '$2y$12$fzjPEZ4O17hJ7QowcmPXrux3zgmlprvke2sh1N.ydH3pnG5XadsE6', 788, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(310, 'Mr. Jabari Heidenreich DVM', '283.961.0660', '248-609-5646', '9563 Greenfelder Dam\nZoilamouth, CA 23328-9395', '1990-07-22', 'Aliquam ab officiis enim repellat voluptates.', 3, 'ilegros@example.net', 'student', 'true', NULL, '$2y$12$y46AykGJslZorymbkMBQ5Oi3w0cnt189LrAR5DE/aGKk4ckzQRAua', 203, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(311, 'Kristin Heidenreich', '+1.715.895.3730', '+1.952.418.6591', '84925 Schmidt Green Apt. 678\nWymanborough, NY 70285', '1973-07-20', 'In impedit quisquam nihil maxime enim.', 1, 'ethyl.goodwin@example.net', 'student', 'true', NULL, '$2y$12$uw1sfSh4y1zTL.Goe0gvh.CpVq6kutDYLus.3DPJ50Sg2WwJLgaXS', 416, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(312, 'Dr. Gillian Shanahan', '406.479.5864', '+1-779-613-0345', '744 Ara Extension Suite 426\nWest Christopheland, CO 14954-5910', '1978-08-26', 'Laboriosam nulla sit repellendus.', 8, 'xbreitenberg@example.net', 'student', 'true', NULL, '$2y$12$wEKk8ZVyzyusQ0/W9KIXeeftWOiHaBkTIoG3bXc9plLKSDBx/UoK2', 89, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(313, 'Moises Huel', '(551) 214-3260', '+18307156055', '3968 Treutel Parkways Apt. 932\nSouth Eileenport, DE 05750-4955', '2011-05-02', 'Numquam voluptas quia dolorum eius.', 0, 'nluettgen@example.com', 'student', 'true', NULL, '$2y$12$bbtn86w.pfvu8eDWvvZKJuyTO8Cwp51Ewowbzv3oY2efGHQNqAXMC', 196, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(314, 'Jovani Kling', '+17015814253', '1-806-932-3321', '253 Dandre Course Suite 965\nLake Doloreshaven, TX 69520-8334', '1983-11-25', 'Alias est voluptatem dolore autem delectus omnis.', 9, 'ucasper@example.com', 'student', 'true', NULL, '$2y$12$wpJZuAumlK6zY9IvXOj.h.Ga2ds2jcnx9Ws3XV.GIFX2ikWc3DwX.', 331, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(315, 'Garett Eichmann', '+1.757.557.1607', '206-289-4857', '413 Jakob Lock Suite 824\nSouth Vicky, MO 91557', '1971-08-03', 'Eum sit eaque tempora iusto.', 0, 'wwalter@example.com', 'student', 'true', NULL, '$2y$12$2vAzUEnhy/RTweuEwE3QfO4jlFXHMUnhwAT7eYdsTGvsr6vM1JyU.', 180, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(316, 'Austyn Schinner', '1-802-832-4789', '+1.279.750.2948', '33866 Sophia Forks Suite 686\nZackarystad, MD 79381', '1974-12-22', 'Est reprehenderit voluptatum qui ipsum.', 0, 'ariel.heller@example.net', 'student', 'true', NULL, '$2y$12$69IHGsx5fB77NvGIAkt22OORA5n1oB.Lj.tWDjex6B2Zjdawa9fIS', 620, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(317, 'Kailey Gaylord', '323.372.3237', '(316) 717-0051', '40530 Stanley Light Suite 252\nLake Eleanora, PA 11693', '2021-08-18', 'Veritatis sit voluptate est beatae placeat.', 6, 'wleuschke@example.com', 'student', 'true', NULL, '$2y$12$IVEcLkJJMxFoesGjhd1odOGaCX6KDhtKpo5IXAs1Lt35tnHIo9Xuy', 817, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(318, 'Santiago Schuppe', '(937) 829-9435', '+17654201903', '9816 Louisa Spurs Suite 617\nWhiteland, NJ 48456-4199', '1971-12-03', 'Occaecati aperiam cum mollitia aut nesciunt culpa exercitationem.', 0, 'verlie.mann@example.com', 'student', 'true', NULL, '$2y$12$tgm5ehSP0uUf7g9XdPG6gel1Zer/VeqfE8epLizc5btTaUXy0O5Hu', 208, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(319, 'Otha Carter', '+1-225-359-1205', '+1.631.845.7549', '9669 Taylor Green Apt. 043\nHermannstad, CA 67130-2369', '2014-06-22', 'Iste atque dolorum omnis magni et ut.', 8, 'wilmer02@example.org', 'student', 'true', NULL, '$2y$12$iQ1vRDTu5dN.l.31i/45x.Kj6SigcZz2MeHTLI0NdjpnsmFaza81a', 18, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(320, 'Ottis Gleason', '760-884-8289', '1-331-228-4053', '49106 Lynch Mall\nSchoenview, MA 29708', '2012-08-15', 'Eaque quia repellat et consequatur optio iure enim sed.', 8, 'bwuckert@example.net', 'student', 'true', NULL, '$2y$12$/sWAfdWwYuVm3bqixhpR4OhjdDIOp2YJvmTKnNr45a/OLIDwRtkRe', 652, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(321, 'Tomasa Ondricka', '+17812569178', '786.928.2333', '7135 Nannie Divide\nGottliebport, PA 10457-3665', '2016-09-03', 'Dolorem ex dolores molestiae sint vel ipsam esse qui.', 3, 'schinner.helena@example.org', 'student', 'true', NULL, '$2y$12$CjHItdOrUVpJDPCEjgRwu.DjCBz6VqEOgvBWTaJGy5v9UMb.SHhMG', 125, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(322, 'Hugh Hill', '+18022832892', '216.274.1871', '2421 Mable Landing Apt. 306\nWest Mathildeshire, AR 71927-6300', '1998-02-04', 'Eveniet sed qui asperiores id molestias eius.', 3, 'vjohnson@example.net', 'student', 'true', NULL, '$2y$12$2rlA/rk3KWCXX6QBTIQm9uBR1WdHh43qa4f1hevzsAsPuFGNgPDdS', 839, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(323, 'Mrs. Maritza Blanda Jr.', '+1-646-869-8324', '419-309-9761', '1677 Ward Oval\nD\'Amoreville, KY 01009', '1973-09-19', 'Iste iure aut aliquid neque placeat odit expedita est.', 9, 'efriesen@example.net', 'student', 'true', NULL, '$2y$12$sRENN8ybzqHooa5PZoNHwuJdNQqPBmh/JXxggscLGaxjbRjzbwit6', 68, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(324, 'Malinda Botsford II', '574.236.3010', '+1-347-987-2434', '93449 Kelley Mountain\nWest Ariannaton, DC 47972', '1973-07-01', 'Voluptatem enim exercitationem quos esse quisquam et.', 4, 'mkutch@example.net', 'student', 'true', NULL, '$2y$12$7yWoqDDYurtNeDGzzC6Bp.3hLGk5qHi0uvx7sZfUV5P5TpWIR0ML6', 753, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(325, 'Pasquale O\'Conner', '+18062319765', '(864) 649-4808', '4970 Louie Meadows Apt. 735\nLangland, AL 22712', '1994-05-13', 'In facere consequuntur nesciunt omnis qui hic exercitationem.', 0, 'mills.delfina@example.org', 'student', 'true', NULL, '$2y$12$Xj3WoKuB0LallLT0ocX8P.0/lCSknT9aqbOlBn.C3y4Et6CNpt26q', 397, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(326, 'Madisen Koepp', '1-774-705-6699', '+1 (743) 773-5293', '70658 Johnson Mission\nWolffshire, ND 93054-4999', '1981-04-10', 'Et optio laudantium ea quis illum maiores.', 9, 'velda.greenholt@example.com', 'student', 'true', NULL, '$2y$12$yptalgcTDw33cTvSNxfzf.OgAX0Awi9OH9QFn9PWfsdP0LYI.0EcW', 855, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(327, 'Kirsten Miller', '+1.786.829.8619', '+1.972.304.7755', '4548 Stroman Keys Suite 643\nSouth Hubert, UT 47024', '1987-05-13', 'Id ut nisi et sit velit dolorem.', 6, 'wehner.glen@example.org', 'student', 'true', NULL, '$2y$12$6oXm3dJCah1ZRlNIizLVhuc5ZsNIUxpGA3pCjgBiQJ3PgKhhvOQGq', 441, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(328, 'Zita Kub', '334.613.8073', '+1 (318) 382-9060', '544 Wyman Pass Apt. 269\nAustenton, MT 86880', '2010-01-10', 'Cupiditate est labore est est officia.', 5, 'myles.kassulke@example.com', 'student', 'true', NULL, '$2y$12$cSqJpPJ/0hOuuFBprwuBOe.O8dVhYJB93FZAZjNy0s.sBnzdWDbNa', 817, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(329, 'Aurelio Welch', '(864) 535-9823', '1-253-253-7325', '8248 Frederick Greens Suite 488\nArnaldofort, WV 43190', '1989-08-03', 'Consequatur quia non omnis commodi.', 4, 'rhett.grimes@example.net', 'student', 'true', NULL, '$2y$12$QY.8jx8M0yUzpFnzbTkcauNQyoRcZGa7ORWoQzpnmToFLn9DG/JdK', 897, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(330, 'Prof. Landen Hettinger', '+1-734-937-8365', '501-526-2539', '61348 Dorothy Rue\nHesselstad, NH 58539-5690', '1975-12-05', 'Earum dicta animi ut quis omnis quis dolorum.', 3, 'mathias.schamberger@example.com', 'student', 'true', NULL, '$2y$12$rdyOW7HacwmtOAcs2o5AROGd7dCVH9HE1inixJYt59Gbh7OcTnjfG', 361, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(331, 'Derek Leannon', '1-479-481-6715', '1-920-327-5875', '5373 Rodriguez Mount\nNew Sheridanburgh, IA 79222-3694', '2024-06-28', 'Quos nostrum amet expedita at.', 5, 'ohamill@example.net', 'student', 'true', NULL, '$2y$12$yaU/8H7/.R6nhy2z17zMFOGuYO0XZWTygPXV09N9t3M/VRSDa5FCi', 862, NULL, '2025-03-03 19:05:37', '2025-03-03 19:05:37'),
(332, 'Kristin Gulgowski', '+19035156974', '(769) 367-1150', '2588 Alize Common\nEast Mariannaberg, NJ 44958-9067', '2018-12-25', 'Ratione adipisci accusamus itaque odit qui iste dolorum.', 0, 'bobby.murazik@example.net', 'student', 'true', NULL, '$2y$12$bcTYdgq.PbWA/vgTUqYyIuZ9srUozMjirU.Pd491BbDfG7a5HYwje', 944, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(333, 'Dr. Eloisa Trantow III', '+1 (534) 543-4739', '947.861.8436', '6105 Arturo Fords\nDestiniport, NY 54968', '1981-04-18', 'Explicabo reiciendis voluptas ea quisquam tempore.', 6, 'pfeffer.adolfo@example.net', 'student', 'true', NULL, '$2y$12$U17mQ3diDnCBHplf30wxUe5QHWz6grr/VcXyenq9jWxrIBzmHosOO', 99, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(334, 'Rae Berge', '1-864-801-8329', '754.492.8660', '90582 Hoppe Drive\nHartmannland, DE 40831-2279', '2003-04-01', 'Molestiae et fugiat eum.', 8, 'christa45@example.net', 'student', 'true', NULL, '$2y$12$nnL56BCss8y3pU2E5F7vF.ECfU0DkZ2Qeq0LsO5HMO8YQPtGEvRdC', 50, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(335, 'Kenyon Dare', '+1 (269) 383-1948', '(541) 799-1639', '474 Harris Stravenue\nNew Brennanbury, NV 64624', '1975-02-05', 'Pariatur optio perferendis provident quia.', 4, 'hank.kuhic@example.com', 'student', 'true', NULL, '$2y$12$U7yi5buGYBl8cuwNrdEWZO/.CT98nPaonncKZjLRW9YVDHqnhZKbW', 968, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(336, 'Justus Schinner', '+1-937-897-9005', '+15206728315', '31362 Hoppe Forges\nWunschport, GA 49006-5415', '2008-05-30', 'Odit necessitatibus dolorum ducimus voluptatibus beatae.', 2, 'stevie.koss@example.org', 'student', 'true', NULL, '$2y$12$AzdoU3Xn7ceR8Vdcsgunm.0N/Ovt/sFDMAYSHHDbEfKKtcwVV49.W', 754, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(337, 'Adolphus Collins', '1-507-676-5276', '(332) 394-0973', '240 Virgie Square\nBoehmshire, LA 21062', '1982-11-07', 'Similique est officiis voluptas velit.', 3, 'foster58@example.com', 'student', 'true', NULL, '$2y$12$d7zAZpfo/MayVFOHjo5j4ubqI837BHP43xAOMp80fhOB0fopqdovW', 121, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(338, 'Chadrick Reichert', '(956) 399-4056', '1-229-968-9789', '22995 Maggio Lights\nPort Ernestoport, IL 38963', '1985-11-09', 'Excepturi et consequatur accusamus qui.', 9, 'lemke.milan@example.net', 'student', 'true', NULL, '$2y$12$tDvQa8hP69HWb2b1AUSJ0u5kFltv7mqZtsM4D3tKghb/vjXGFr7Bm', 845, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(339, 'Baby Flatley', '+1-901-353-5479', '+1 (316) 447-9234', '64150 O\'Reilly Shoal\nLuettgenhaven, DE 43032-5753', '2007-03-18', 'Cum adipisci voluptas voluptatum assumenda omnis in.', 8, 'habbott@example.net', 'student', 'true', NULL, '$2y$12$h1D3PXVxdqGDEHkRXjv3LuM5UZG8s8Sz.AVHmSZpUghnkpE/MJgdO', 985, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(340, 'Deontae Botsford', '(757) 994-1630', '+1.520.597.7595', '92072 Bahringer Knoll\nNorth Laurianeton, NM 60598', '2017-02-10', 'Rerum fugit dignissimos repellat alias laudantium et molestias.', 1, 'rboyer@example.com', 'student', 'true', NULL, '$2y$12$eofAAi3AhuXB/yHfnkzgZOdIfssoPLbYLi93lMJxLZj5/8be4yz8.', 612, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(341, 'Alfreda Lindgren', '1-571-448-8337', '(470) 432-2161', '78055 O\'Keefe Route Apt. 563\nSouth Nicklaus, IL 87781-7393', '1996-01-30', 'Incidunt eum quasi nihil consequuntur facere.', 2, 'friesen.kayleigh@example.net', 'student', 'true', NULL, '$2y$12$HQ4c1zM8UgKe2u41TvrqY.boxMADig9HYduM8r3O3wxMCOEaEbwB2', 347, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(342, 'Arno Kling', '1-267-299-1264', '+1-785-594-2605', '401 Leslie Cove Apt. 208\nWilkinsontown, MI 93324', '1997-08-29', 'Quis nemo sed non libero iure.', 2, 'nlubowitz@example.org', 'student', 'true', NULL, '$2y$12$BtA7iXFbtZMJOmcmkXylGODK.LHT5k2cKKg9/aYm2hCA0AK8c7BZW', 279, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(343, 'Mr. Terrell Beahan', '+1-689-460-9161', '1-762-524-4065', '7274 Twila Stream\nEast Darrelshire, AL 32539', '1979-03-25', 'Earum quo ut vero eum recusandae ea molestiae.', 7, 'jeanne.conn@example.net', 'student', 'true', NULL, '$2y$12$OJSDXJaM3MFmBeO9Bg8OW.pZd3922CalGc7jH6Bo3lzY5zF2KUPIK', 972, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(344, 'Dewitt Wintheiser', '+1-772-491-1173', '+17126018728', '5384 Morissette Oval\nPort Isaac, WI 59519-8252', '1985-11-21', 'Eum et iste quod laboriosam dolores qui.', 8, 'igerhold@example.org', 'student', 'true', NULL, '$2y$12$wC1mT6ienHcYTohpnh0CAeo/xha.ciK/z4a3mBs4mlJjEb2ENfcF.', 280, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(345, 'Caroline Gutkowski', '1-216-946-2184', '+1.386.306.1181', '73452 Pollich Pine\nSouth Everetteview, CA 00651-1394', '2022-08-08', 'Est qui possimus minus ut.', 3, 'haylie08@example.net', 'student', 'true', NULL, '$2y$12$YcBqmLqbH5sq6ztI8DIpcuVc5MBYMkuzQDq45tdK97MsBXmTP0YEe', 823, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(346, 'Prof. Theo Jaskolski III', '(650) 753-5181', '+1-959-848-6622', '663 Erdman Branch\nHerzogton, OH 19263-3749', '2017-07-30', 'Laudantium non ratione cumque et.', 0, 'rebeka52@example.net', 'student', 'true', NULL, '$2y$12$5EEiqOFJvKCas1qWUf0FSuYglNL69kLnuEXK3JZ005nnMppqxSky.', 134, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(347, 'Louisa Lynch', '+1-305-224-3674', '+1 (509) 247-0870', '78857 Strosin Lakes\nDevantechester, SC 08197', '1996-03-02', 'Atque architecto consequatur rem sit sit.', 2, 'unienow@example.com', 'student', 'true', NULL, '$2y$12$P0PYHr8GwuYVA5kfR4VVRuLJPpBXWzy36uoHKK0Y7cS35RTlHXRJa', 690, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(348, 'Martina Hirthe IV', '956-346-7734', '+1-678-379-9899', '6418 Crooks Neck\nSouth Ronnyborough, NY 68419', '1993-10-31', 'Consequuntur aut sunt maiores qui et et.', 4, 'cheller@example.com', 'student', 'true', NULL, '$2y$12$uwc.CWRYJkV7kC7rDBBPMejiqkrLG6ziZ1UmtfeQeD/Ix7wUJJ8pG', 356, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(349, 'Prof. Westley Spinka', '302.262.6557', '+1-606-675-2229', '53043 Moises Ranch\nNorth Anahichester, SC 79145', '1992-10-09', 'Culpa sit doloremque eius vero.', 8, 'june76@example.com', 'student', 'true', NULL, '$2y$12$UapJ29OBdM0A6hZs3IoP5O9fxNcorC2dxUFvrwf2jHpKcACNmvCi.', 810, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(350, 'Anne Lesch MD', '+1-316-790-9145', '+1.903.840.9553', '58586 Muhammad Heights\nSouth Morris, WV 88539', '2010-06-11', 'Sequi ducimus et dolorem iste unde assumenda et.', 0, 'ettie14@example.com', 'student', 'true', NULL, '$2y$12$fhDiT/9v9gnTd5YsIf/ySeKw8xBX0fAPcKdInYhOJJLRfTeswaV6u', 489, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(351, 'Reyes Mayert', '(505) 686-6785', '386.392.5001', '405 Henri Mission\nSouth Elichester, NH 93447', '2019-10-23', 'Alias dolorem tenetur eum.', 8, 'lawson.wehner@example.org', 'student', 'true', NULL, '$2y$12$myWZkmlIlwBybI3ha1GYIuEfcMs4iiV66alIMkCF3vSn91nyAGvH6', 433, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(352, 'Nathan Marks', '973.797.0517', '+1-689-984-0161', '1328 Gibson Roads Suite 205\nReedmouth, NY 54729', '2001-10-21', 'Nostrum ipsam aut doloribus ut.', 3, 'rowe.cali@example.net', 'student', 'true', NULL, '$2y$12$C/zU88zonC589ZTJw1WvU.2fg4FO3cnrtoRpxdlr43dLtJi6NiFFi', 13, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(353, 'Jonatan Bins', '1-808-392-9129', '1-701-204-4009', '17981 Bergstrom Prairie Suite 073\nHackettfurt, IL 82194', '1983-06-25', 'Corporis est dignissimos aut deleniti nihil sunt.', 1, 'anastasia.schimmel@example.org', 'student', 'true', NULL, '$2y$12$TM/xzDcZI30pxg4ighsxFeTIGLfcW0u.Ml8NqKVTEwGTlrt/vfYMm', 116, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(354, 'Miss Shirley Langworth', '760-905-4491', '865-923-2369', '68021 Kody Cliffs\nHermanview, NC 34285-6439', '1976-08-11', 'Dolores dolorum aut dolore natus et.', 2, 'bernier.felipa@example.org', 'student', 'true', NULL, '$2y$12$vq1F4/gjyASZpEVBKHflMe0eDDnEjn..LxMsUEDiDANWzYO/xOE3i', 642, NULL, '2025-03-03 19:06:17', '2025-03-03 19:06:17'),
(355, 'Cleve Jones', '+1-458-508-4660', '(567) 855-5197', '3232 Hayes Square Suite 355\nNew Joanneport, NY 43894-0088', '1975-01-22', 'Enim et ea deserunt pariatur.', 9, 'ullrich.tiara@example.com', 'student', 'true', NULL, '$2y$12$CBk1PXE5FfRsBKe.bhgLzeBsf3P9KCA7NrpMFjePGTvg3KaixW6Au', 980, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(356, 'Dr. Desmond Schinner Sr.', '(445) 675-1696', '1-626-841-9148', '1415 Marjorie Via\nRaynorborough, FL 02999-3471', '1975-06-20', 'Autem sequi occaecati sequi expedita.', 6, 'qbotsford@example.net', 'student', 'true', NULL, '$2y$12$zXXm0/PLoo48Ag/Qg9EDdOJgI6k8.4PRAvvvG/CLlu0/wYeDl163q', 460, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(357, 'Dr. Millie Watsica', '(816) 361-2213', '+1.618.471.0678', '60951 Roxane Motorway Suite 769\nRippinfort, MI 67096', '2003-09-14', 'Ut ipsa ut vel dolores ratione labore.', 2, 'juwan72@example.net', 'student', 'true', NULL, '$2y$12$S6Up8KazG8ucOLEcFa65KO28Vz812XqSzVRDzyvJP4mHlnr7HuaS2', 923, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(358, 'Pietro Auer II', '+1-785-437-3793', '(541) 317-4953', '13750 Ritchie Divide Apt. 830\nNicolasport, MO 10071', '2007-09-06', 'Et autem et vel tempore odit.', 9, 'alexandra96@example.net', 'student', 'true', NULL, '$2y$12$zDj3IAHlyKPMEicofcf0r.SsETd7eGlDU8NZEaSuo7u0QsCfnj9Ey', 399, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(359, 'Miss Martina Streich Sr.', '(601) 928-3317', '+15416169505', '297 Pfeffer Shoals Suite 720\nEast Justenburgh, WY 90322-1341', '2003-10-04', 'Mollitia quis eligendi sunt.', 2, 'runolfsdottir.merritt@example.net', 'student', 'true', NULL, '$2y$12$K9EwjGa3EjvIpS9PlS6buuOV01LCxzCMudevU3hBMjyGu6lSXeE9i', 144, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(360, 'Keyshawn Sanford', '248.885.9480', '+1 (785) 495-7565', '9211 Keebler Circles\nNorth Gladyce, FL 92600-7991', '2002-05-17', 'Qui fugit ullam necessitatibus perspiciatis nemo autem.', 1, 'uschaden@example.org', 'student', 'true', NULL, '$2y$12$OlaQEA/dLAspU/m3tWE4z..KS4NSGdLHCeoV9AKZ7droJnP9YXL7a', 806, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(361, 'Otha Nikolaus', '1-804-299-1923', '1-351-459-5257', '5501 Lila Isle Apt. 593\nLake Aryannatown, AL 66570-7157', '1983-01-30', 'Voluptates fugit vero impedit qui fuga eaque.', 3, 'ucassin@example.org', 'student', 'true', NULL, '$2y$12$xPLbEhW0I2B2mYDj4zqEx.4gRhMi50FNEB/8VdjGtVwB8mmmxpe4a', 737, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(362, 'Jordon Huel II', '929.615.5611', '425.610.0170', '923 Marquardt Vista Apt. 521\nValerieberg, AK 08779', '2016-05-11', 'Cumque natus assumenda voluptates voluptatum quos.', 4, 'ila56@example.net', 'student', 'true', NULL, '$2y$12$D1wdWV29kS.HlH7ZaTXInuCOIhZrXj59HE81wnk6Y2ynpLYV52dma', 86, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(363, 'Dr. Ward Crona', '520-523-3236', '651.641.4285', '8042 Ryder Light\nNew Maritza, NJ 37827-9977', '1976-01-19', 'Quia corrupti architecto doloremque hic dicta.', 4, 'ramiro.prosacco@example.com', 'student', 'true', NULL, '$2y$12$O52mIw/VUJc8xZvxduoJK.pkPhwQd2u6iQ77dAVzUlIEleSmgrfPq', 523, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(364, 'Bernadette Labadie III', '+1.484.793.9673', '1-559-925-6028', '36322 Mercedes Forge\nSouth Isabelle, GA 05344', '2019-04-18', 'A autem totam amet a in.', 0, 'bahringer.emmet@example.org', 'student', 'true', NULL, '$2y$12$JVqAXY5yaniy4sAXp.EvIuYrbCRjNHgZEoCxxZ09KTV3fw6GVYQ/2', 587, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(365, 'Nicola Effertz II', '(346) 751-4668', '346-338-9049', '20443 Victoria Isle\nZakarytown, VT 92011-9470', '1975-11-26', 'Necessitatibus sint vel et numquam maxime vitae.', 5, 'okey81@example.net', 'student', 'true', NULL, '$2y$12$COpBFbJEtALOism2wokexO6WqxmPNhhh6SyW5cErRJXkSzyuZWZpi', 491, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(366, 'Jazmin Prohaska', '1-856-902-4843', '(858) 302-9510', '750 Bins Roads Apt. 960\nCyrilton, MD 36739-3623', '2010-02-02', 'Ea iste at odio omnis.', 4, 'edooley@example.org', 'student', 'true', NULL, '$2y$12$c9basQkWavdBHEmvWOWEr.onAtNnT26JmLG9nnjfQcZvdh33BIBsi', 877, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(367, 'Mr. Kurt Mitchell', '585.700.6886', '334.613.3791', '449 Eugenia Trafficway Suite 717\nNorth Pedro, UT 26398-6223', '1983-06-02', 'Iste possimus quis qui officiis qui.', 4, 'hlarkin@example.net', 'student', 'true', NULL, '$2y$12$tLAXfrsAOkPoFMBjzhl.aeFseP.7LqJAuhuMf7U1StGZRE0yzqoNS', 46, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(368, 'Porter Walker', '727-551-2537', '1-929-931-2854', '472 Sibyl Fords\nJaquelineberg, NY 46517', '2022-05-14', 'Qui illo at incidunt et sunt accusantium repellat.', 2, 'qsmitham@example.net', 'student', 'true', NULL, '$2y$12$EQ3zTiJe26sWifhfSAITy.DiNvWcpyASNPYbI0jNJwuINFduLU6PS', 354, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(369, 'Darrion Bashirian', '607.786.7259', '+14176084979', '527 Cole Lakes\nLudiemouth, OH 74514-3385', '1997-11-18', 'Molestiae voluptatem ullam exercitationem commodi doloremque eius exercitationem.', 9, 'rowland.ebert@example.com', 'student', 'true', NULL, '$2y$12$l41r09zPLAXdKqplyynocev5r/PSn0D.dvfuv4XNfECXy5C9h/CIa', 507, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(370, 'Wilhelm Stroman', '1-240-288-3773', '+1-909-755-9827', '236 Cristopher Greens\nCronaville, TN 73171-0456', '2020-08-22', 'Laboriosam deleniti odio voluptas.', 2, 'evert.terry@example.net', 'student', 'true', NULL, '$2y$12$uNl4PMlfIiSux4Gnw/Ay5.j7uOWa5TX0xWSc64gV3w3n2D5mBqOHK', 394, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(371, 'Myrtle McCullough', '+1 (938) 650-6628', '(952) 386-6678', '91626 Destany Points Suite 222\nLindstad, TX 97030-1001', '1995-11-27', 'Quaerat magni soluta autem quidem voluptatem eius quaerat omnis.', 6, 'maybelle84@example.net', 'student', 'true', NULL, '$2y$12$u5W4hny4rQyY.8gOPXLJve864nw3rP/h8GOA1b3mFjqBaevjDhagy', 963, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(372, 'Lafayette Ondricka', '+16182422497', '463.225.9474', '40137 Nicolas Fork Apt. 918\nBrianville, MO 84228', '1972-11-22', 'Iusto at natus sed eius.', 4, 'ykuhic@example.org', 'student', 'true', NULL, '$2y$12$uITLfiqr0d615gHxjGaRUO1Rbkn.Dwj6xbX43hGEAzFgMPDl75umW', 16, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(373, 'Ms. Verla Carroll', '661-722-9138', '1-650-443-1367', '91486 Oma Green Suite 022\nKasandrashire, WA 61092', '2006-01-04', 'Eum est voluptas aut quod distinctio doloribus est.', 0, 'jordane.schmitt@example.com', 'student', 'true', NULL, '$2y$12$VvtgM5j5HbavXnBWCfTjmem5ijOUeYQSnYDa8BGyyq1jqOlGmCywm', 671, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(374, 'Dr. Vince Kuhn Sr.', '726.949.3831', '(917) 993-2970', '63342 Leffler Union\nKiehnton, PA 29749', '2021-01-16', 'Est numquam commodi nostrum voluptas ex totam nisi.', 1, 'kovacek.mandy@example.net', 'student', 'true', NULL, '$2y$12$eVBGKDSgyKAxkFtYKSawkuJgMAuggBkC8bRM9Nsa3D80JNw5j0pH6', 771, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(375, 'Jordi Dickinson MD', '878-243-9261', '+1 (719) 579-5417', '9893 Harvey Islands\nAnneborough, RI 78065-1805', '1992-12-01', 'Voluptate possimus excepturi quos explicabo ut itaque ab.', 1, 'borer.reinhold@example.org', 'student', 'true', NULL, '$2y$12$JXOK3wVCzo4mWn7xHsUxdummZXhynFo7058kYZD0pYA6Exvy03OUm', 104, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(376, 'Mrs. Shaina Wisoky Sr.', '361-917-0434', '(949) 240-2145', '5006 Boyer Grove Apt. 837\nWest Clementina, WI 34364', '1984-07-02', 'Ullam incidunt et veritatis necessitatibus sit velit.', 8, 'pwiegand@example.net', 'student', 'true', NULL, '$2y$12$Fkk3D.vk/w195GLqNQXGPuQ9awVM0pH6P.ndQ4kN/CoJY1Ck2gm0i', 244, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(377, 'Mr. Murray Auer I', '276.919.5494', '+1 (907) 317-7302', '615 Aracely Forest Apt. 997\nOkunevamouth, PA 07001', '1985-11-30', 'Consectetur expedita omnis rerum cumque odit occaecati quam.', 3, 'daniel.frederic@example.org', 'student', 'true', NULL, '$2y$12$aA0V.8uSaqTyi65OEzpao.JEP0nF1BT1Xi9tzLtRtpDMTM0SFRv8K', 553, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(378, 'Jace Beer', '(458) 457-9858', '660-865-3745', '5924 Bergnaum Village Apt. 697\nEleonorefurt, VA 90820', '2011-02-21', 'Iure at omnis possimus vero facilis nostrum.', 6, 'emmerich.william@example.com', 'student', 'true', NULL, '$2y$12$EU5/.N.Cdt0gJ4PSJA0xeeg3UK2TlDTRVcUxPDWnLd14vDwovr91W', 866, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(379, 'Stephania Runolfsdottir', '484.213.9845', '1-262-688-3728', '65047 Collins Centers\nWest Brandochester, WV 03706', '2014-12-17', 'Non vero consequatur modi.', 7, 'pwehner@example.com', 'student', 'true', NULL, '$2y$12$eNouHWcAShlWkDmUo3WFxO7LbbgvX.PVW4DZpUA1IrKkCNAkuP9..', 933, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(380, 'Estella Kozey I', '(986) 567-6559', '1-334-700-9021', '59365 Oleta Lock Suite 005\nPort Madonnamouth, WY 17137', '1980-10-17', 'Omnis blanditiis praesentium sed omnis.', 0, 'kozey.brandi@example.net', 'student', 'true', NULL, '$2y$12$pTskpeiPpWQfpUlBblhTuuvJsTJX.Nyhj8SCo0csvWnQeOrM9JT4G', 255, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(381, 'Dovie Roob', '+1-351-575-3893', '878.364.0085', '72566 Francesca Mill\nDoloresville, MI 65941-9739', '2005-03-17', 'Ipsum totam molestiae magnam consequatur accusantium id necessitatibus ducimus.', 3, 'gussie.raynor@example.net', 'student', 'true', NULL, '$2y$12$eNFBoz6aLOUVq9AUNLuDMe30zB7N6KAHWh0kKNzNg/ob6.FLUkMM.', 982, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(382, 'Dee Boyle', '+1.352.765.5573', '+1 (870) 662-9651', '56322 Leuschke Shoals\nPort Jordaneburgh, SD 03582', '1993-09-01', 'Aut illo corporis dolor corrupti.', 2, 'mafalda.schamberger@example.org', 'student', 'true', NULL, '$2y$12$8.R/mP1pMBrGiEoi0p/Q/uka/w68TzDxfwUOgD4HOh3Y9k8nOPDDm', 740, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(383, 'Sabryna Mosciski', '(667) 519-0754', '+1 (847) 885-6106', '53866 Corbin Field Suite 488\nBahringerport, IA 79559', '1995-12-09', 'Harum voluptatem repudiandae quasi omnis.', 6, 'kenton.kohler@example.org', 'student', 'true', NULL, '$2y$12$veSi0kJESk7MJmUa27kXxOGwbRne0pN8GLMqdZVU8oRqCVdBsRdlq', 99, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(384, 'Prof. Wilson Blick', '+1 (571) 349-0883', '973.872.1257', '36929 Damian Islands Apt. 427\nHegmannton, AK 05242', '2001-11-04', 'Qui est omnis quo consequatur assumenda distinctio.', 2, 'odonnelly@example.net', 'student', 'true', NULL, '$2y$12$dGVYbJ2OZjHVGwPkKcway.dndJibppBcRhY9hjA8H8x1bbuxsHXFe', 212, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(385, 'Kianna Stark', '731-976-8393', '+1-760-894-9911', '5667 Nienow Flat Apt. 460\nKrajcikhaven, ND 15275-5933', '2023-09-16', 'Et amet vero eos quidem officiis.', 1, 'blaze.cremin@example.org', 'student', 'true', NULL, '$2y$12$eHOUCv7RjRvgWZ1ono93ZOJH2dDCpbE9/bXWkXFtLKjSfJUTLOCXS', 861, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(386, 'Katrina Kiehn', '+19073147987', '1-321-700-3413', '9451 Mellie Neck\nNew Jadon, TN 36878', '1979-02-25', 'Doloremque in similique error tenetur laudantium culpa et quam.', 2, 'adams.edwina@example.com', 'student', 'true', NULL, '$2y$12$Ygbyw4PIJyTMdICH1/BuFuv62VpE6T2yeRffFNTtZCFafI1tF0LWG', 6, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(387, 'Prof. Brown Schoen MD', '1-941-530-6166', '+1 (248) 816-9829', '5565 Hermann Ports\nAnikaland, WI 92998', '2018-09-06', 'Sit asperiores beatae quibusdam repellendus aut sapiente.', 2, 'obie.stroman@example.net', 'student', 'true', NULL, '$2y$12$q9wJabcAUaXMWZJGsjzz6.tdnQzbxaEX9q.t.tkJ/sHkTCRcFT5G2', 208, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(388, 'Ruby Ondricka', '401.206.5710', '+1.681.420.3338', '2350 Kyle Estates Suite 292\nHowellhaven, TX 06698-8590', '1979-08-05', 'Nemo ducimus earum ut praesentium.', 8, 'kdoyle@example.com', 'student', 'true', NULL, '$2y$12$aNo1vvCVQLnUSSI4hqwEKOvykANRnfzTQ7lylXjMRSVxO7Wqijj5G', 731, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(389, 'Miss Brianne Donnelly', '+15734000100', '+1 (707) 672-1956', '575 Kiehn Street\nO\'Reillymouth, TX 46906', '2009-11-15', 'Nostrum vero qui rerum ea fugit quis.', 7, 'abernathy.antonina@example.org', 'student', 'true', NULL, '$2y$12$41IXakAscFhqlwi0InkzvuVSVe1W5hK9RoIo0vYvDtYsnfyPiVfn.', 514, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(390, 'Macey Yundt', '850.575.6755', '+1-351-778-3972', '128 Kale Divide Suite 151\nHayliechester, RI 84193-6368', '2019-11-30', 'Quas maiores qui rerum et dolorem.', 8, 'maribel.casper@example.net', 'student', 'true', NULL, '$2y$12$aiFf/BGgOc5ERK1fL8lbdOf3glrOXyHtW4glXj6hCawQ17jOpYYkm', 567, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(391, 'Marielle Weissnat', '1-516-326-8779', '(256) 536-6425', '8224 Layne Mission\nKiehnside, AR 88741', '2021-06-08', 'Eos eum ratione numquam assumenda impedit rerum cum.', 9, 'mabelle.carter@example.org', 'student', 'true', NULL, '$2y$12$l6DjImrc21oO3wBhYJGkwueujtipcKLb4fXKLvlIc862tXx4buuJ6', 935, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(392, 'Vella Morar', '(938) 397-2151', '463.368.2254', '77460 Collin Bridge Apt. 586\nShanahaven, HI 02604-9068', '2009-11-21', 'Saepe voluptatem sit est consequuntur culpa.', 4, 'kschiller@example.net', 'student', 'true', NULL, '$2y$12$5QPU/vo3cBPkzMYWRW2ZnOwI0WUXi6GbRaH77hze8wHM0NMcmlQxa', 910, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(393, 'Merl Berge', '1-279-872-2024', '+1-480-640-7029', '37167 Brett Key Suite 289\nJovantown, DE 32061', '2005-09-11', 'Enim qui et vitae quisquam voluptatibus inventore.', 1, 'kessler.rosario@example.com', 'student', 'true', NULL, '$2y$12$NDHimXt8WLFV0io2QdRYFOgodT3PPMEU1NtmMTE6xVYoYo2v5Of1G', 164, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(394, 'Elody Boyle', '757.624.4516', '+1-818-482-1464', '9569 Berge Ford Suite 412\nWest Sydney, AZ 00054-8722', '1971-02-19', 'Molestias dolorem neque at in voluptatem ea.', 4, 'mckenzie.amya@example.com', 'student', 'true', NULL, '$2y$12$VRN0ii0EzQsoWh2f2OMGDODOybjOB4obHHzo1pWtYEWvj706AMvB2', 222, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(395, 'Pinkie Champlin', '541-594-0075', '+1-678-243-6270', '370 Hudson Roads Suite 711\nNew Thurman, CT 05381-8353', '2012-04-22', 'Fugiat sint optio cumque doloremque.', 4, 'qleuschke@example.org', 'student', 'true', NULL, '$2y$12$SltWc/SkoSzwUQOX1SbG1uGP5/Ut.R0QH5xIiZkF3EBWWpJQraI5W', 787, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(396, 'Mr. Charles Altenwerth', '283.450.2715', '(435) 819-1478', '3223 Corbin Wall\nNew Nelsview, WI 27863', '1985-11-11', 'Enim suscipit ab vero autem consequatur.', 5, 'carolyn75@example.org', 'student', 'true', NULL, '$2y$12$N//EMj662I1uROzQ.qoOreMw0N6YQHWajR0C4pnlSBtdYdClSM/SO', 916, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(397, 'Tatyana Rosenbaum', '+1-228-605-8662', '1-308-246-5110', '704 Kassulke Vista\nPort Brennon, FL 52354', '2013-03-30', 'Ut nam iure qui quia quaerat id.', 8, 'audra92@example.net', 'student', 'true', NULL, '$2y$12$zGhDE0g4Vb/i.1CRQdMn7u4y1vEl3T6s5R3y3fQd/CukMADgLqcyu', 786, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(398, 'Brian Gutmann', '+1 (720) 886-6643', '(559) 903-4291', '43836 Shana Fork\nRubyshire, ND 65676-4961', '1974-06-14', 'Reprehenderit quia corporis aspernatur quasi.', 0, 'letha71@example.com', 'student', 'true', NULL, '$2y$12$KYISytkeP1VN7kzZzwxdA.zAdwhZvJntgJM3DqgVyqI1xmmnnaJR.', 673, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(399, 'Lisandro Waelchi', '678.544.4452', '1-520-980-2360', '395 Nienow Place Suite 467\nSchustermouth, GA 73822-4881', '2007-03-15', 'Quas temporibus at quia culpa voluptatem.', 3, 'kayley52@example.net', 'student', 'true', NULL, '$2y$12$6s19Ll65/3qTtsRUX.Ug/OprGITwZmUivi6XRvZOxOT3TL6xCV5pC', 427, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(400, 'Alexandrea Halvorson', '220-769-3064', '407-223-5827', '806 Runolfsdottir Stream Suite 285\nNorth Jo, NY 39952-5663', '2023-02-06', 'Quia nostrum enim aut sint non ullam.', 8, 'miracle.crona@example.org', 'student', 'true', NULL, '$2y$12$OtLAoDmONjuPSYvnIV/9i.T8sj8FEffD.GQgOsHWRbcdvY6R6HIFm', 321, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(401, 'Janice Zemlak', '1-520-783-5398', '+1.708.550.9980', '17251 Fisher Run Apt. 393\nHaagfort, VA 90161-0283', '1971-06-06', 'Ipsam suscipit odit alias quas distinctio est alias.', 0, 'shayne98@example.org', 'student', 'true', NULL, '$2y$12$98VGBmfRSSTmFoPxdjGEpeGoWfvPQ1R9uMEskwQwg7yxeLUAVb6Yi', 543, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(402, 'Eleazar Volkman', '1-586-631-5929', '747-891-0113', '73730 Zachery Lights\nWest Alycehaven, AR 48239-9459', '1982-02-09', 'Aut quidem autem magnam sed ea.', 6, 'hayley80@example.net', 'student', 'true', NULL, '$2y$12$XShO5Y8X/9T.y0sWjCtUEeAbHRQhXD59nTS5SHJ.Nv8KB6m7e.ruS', 750, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(403, 'Karl Heaney', '1-304-517-2944', '507-965-2513', '2523 Borer Ports Apt. 339\nElzabury, AR 43110-5665', '1976-08-24', 'Aut beatae autem eos consequatur.', 2, 'prosacco.adrian@example.com', 'student', 'true', NULL, '$2y$12$KDqiRgqcizC3Rw.DJ8C4O.XrW5dm0biP6m1pWulyYm5uDaJ/pn2FC', 62, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(404, 'Lamont Kreiger V', '+1-551-445-0520', '+12522722168', '8577 Linnea Circles Apt. 765\nHahnland, WY 68242-7315', '1976-10-03', 'Aliquid et nulla corrupti amet laudantium distinctio qui.', 3, 'fgusikowski@example.net', 'student', 'true', NULL, '$2y$12$wcjEgI9Bj7t5zbh.Rhhf4.8SouVeQtv4omz585FcAXDfrMBQO26x6', 323, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(405, 'Carlos Bednar', '+1.332.243.6869', '(916) 369-5692', '3229 Konopelski Way\nNorth Sallyhaven, TN 39442', '1987-12-10', 'Harum iste odit culpa amet.', 5, 'nbauch@example.com', 'student', 'true', NULL, '$2y$12$LTjebF6jK8jvuFQo/Qj9xe4NhglEZaZNbmWOSwfhIJXPw6LSCM3.q', 890, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(406, 'Miss Larissa Ryan', '+1 (213) 629-3582', '+14799264223', '26142 Flatley Port Suite 392\nPort Avisberg, KY 18336-8079', '2018-06-24', 'Nostrum ut aperiam tempore voluptas qui aut molestiae.', 0, 'idella.renner@example.net', 'student', 'true', NULL, '$2y$12$lrpRs6w1JOzACfqvUXbj3eFvGVOcgE0rbhnFvYbZZrZAIl2lD7/1G', 703, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(407, 'Mr. Javonte Pagac', '+13186704363', '(270) 388-6118', '4350 Koss Road\nGutkowskifort, ND 06801', '2002-08-11', 'Ducimus dolore fugit rerum quisquam ipsam voluptatem et.', 9, 'anjali76@example.org', 'student', 'true', NULL, '$2y$12$83elsbk9H1YP1WDPul2tyufOslObljsHRhyAPR3M8MSW0xU6.JW0m', 717, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(408, 'Pat Zboncak', '+1 (820) 253-7563', '425-701-9335', '341 Novella Extensions\nSashaberg, MT 38857', '2002-02-14', 'Earum maiores vel nihil.', 6, 'rose93@example.org', 'student', 'true', NULL, '$2y$12$e4Pda9lC4AzXXoe3c5ogbO6e9uydyfKk0ZQoDHc7cF6bg0fK5IfLO', 884, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(409, 'Eldridge Turcotte', '+1-480-232-3663', '+1-808-663-8664', '8911 Johnston Trace\nNew Charliechester, AZ 14184', '2016-11-05', 'Maiores quo similique quia in aut tenetur.', 8, 'lulu.sipes@example.com', 'student', 'true', NULL, '$2y$12$p0c/8AQhC7g7V/sdgnRKQOHrMFsXSSp9/P5rxLh7EAVe25lbTfOh.', 633, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(410, 'Mr. Erik Watsica IV', '281-351-9603', '(413) 926-4951', '2502 Cary Junction\nSteubershire, MI 59588-8097', '2002-04-04', 'Neque excepturi consectetur laborum aliquam et quo.', 9, 'green.vernice@example.net', 'student', 'true', NULL, '$2y$12$JJhWaYfCaHollLge2mwSfemtjAE7wZ4AlrgG6TS65lEY0.711I5qu', 753, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(411, 'Dominique Kuphal', '954.370.8390', '323-484-1372', '74514 Velda Plain\nLebsackmouth, VA 86040-2463', '1984-08-04', 'Voluptates aut ipsam et fugiat rem.', 7, 'bode.otho@example.org', 'student', 'true', NULL, '$2y$12$hn1HXcqisYrOXtjs801i9OFqeD1lh1wkEjmDv0ubi4GuJSo.oeypi', 81, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(412, 'Jessy Ruecker', '808.201.7289', '+18045536216', '189 Grover Gardens\nSouth Jaclyn, NC 86154-1102', '2010-08-18', 'Aliquid dolorum minus ut qui et vel asperiores.', 6, 'clair.zieme@example.com', 'student', 'true', NULL, '$2y$12$86.1t6WNUOKjWc7hySEMOuTlr40CwbyuwWtuIe/oMIsmwkSvNN.ny', 12, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(413, 'Rocky Hickle', '+1 (720) 826-7238', '785.872.4906', '2422 Godfrey Points\nWest Alizeport, KY 04400', '1998-01-20', 'Molestiae ut repellendus deleniti.', 3, 'eborer@example.net', 'student', 'true', NULL, '$2y$12$RvWc4xh0Dxpol6fCQJHLP.6Ewga467/9Fw4U9ioHxyCfjxt7mOoii', 373, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(414, 'Kris Rodriguez', '+1-765-406-5881', '901.221.8591', '22583 Gislason Crossing Apt. 331\nClaudeborough, ID 63731-7825', '2024-03-17', 'Iure dicta ut sunt qui.', 0, 'pfeffer.douglas@example.net', 'student', 'true', NULL, '$2y$12$NAQj58Tx/Un1kXua6KTZmedPJhP/2QCmIzI1wHH678sy95ty1h50e', 681, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(415, 'Mrs. Kacie Bosco', '(432) 950-3976', '951-521-3388', '4937 Sanford Station Apt. 440\nEast Ashlynnmouth, WI 20308-2302', '2010-10-22', 'Aut excepturi possimus deleniti ipsa non laborum.', 6, 'fgrimes@example.net', 'student', 'true', NULL, '$2y$12$nNUbuBuXQmGS5OzzWxDid.aDQDS4aTn3d7OrfFZxVjCtUzRGns/ma', 68, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(416, 'Derrick Will Sr.', '1-409-225-3652', '956-352-6305', '5215 Jayne Rapids Suite 051\nFraneckiborough, IA 51608-8708', '2019-05-05', 'Non id et dolorem sunt temporibus ex tenetur.', 9, 'yziemann@example.net', 'student', 'true', NULL, '$2y$12$Pi4BLIxtmoqa26XPiNnSues5indHI6s3.dmpCr7W7va2t8YsQGwlq', 238, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(417, 'Ms. Leonor Friesen V', '+1-571-365-4653', '+1-629-218-0126', '81882 Destiny Lodge Apt. 707\nJakobport, AR 29989-1797', '1973-12-24', 'Dolorem possimus id dolores ut eos sapiente.', 5, 'mortimer35@example.net', 'student', 'true', NULL, '$2y$12$i1dhHG25uVSheIcVucz.AOFwLyBmh5EOYA4Uis4OOpIIEygjUPXxy', 539, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(418, 'Marty Schowalter', '+1-408-293-6580', '+1 (912) 808-5001', '95903 Maximillia Drive\nTheoshire, DC 66869', '2019-03-04', 'Voluptas a reiciendis ut porro eum qui aspernatur.', 4, 'cpfeffer@example.com', 'student', 'true', NULL, '$2y$12$zVw9wPlXqW5qbh1E8znMO.NslqdLlB5VVYi/sQ5RmgjXVBTw3BPdO', 715, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(419, 'Eden Mante', '651.940.5339', '1-660-421-3914', '460 Johan Fords Apt. 353\nSouth Wainobury, WA 48553', '2006-07-29', 'Velit eum dicta sit eum.', 3, 'adelbert81@example.org', 'student', 'true', NULL, '$2y$12$uGRZt7whJ2qfG3GGJReoh.EE6T/xvrQ0mZPbzfAFguavXyrzYDc5.', 227, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(420, 'Trenton Nikolaus', '+1-443-374-8667', '757-379-1732', '7161 Brakus Land\nAdellafurt, NC 55407', '1991-10-29', 'Corporis praesentium praesentium sed vel ut illum.', 1, 'corkery.sofia@example.org', 'student', 'true', NULL, '$2y$12$XJLVioS6RQICdf6bAopb3.qki1WwMxavUSqF30QmVtvXWx0SfiXUG', 230, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(421, 'Miss Leanna Grimes PhD', '385-948-8435', '(878) 571-0834', '63267 Jewel Neck Apt. 800\nNew Damienhaven, HI 98552', '1993-04-30', 'Consequatur accusamus et soluta ex perspiciatis nulla.', 6, 'dolores.watsica@example.net', 'student', 'true', NULL, '$2y$12$fDhpgks/eqGhzflSXydDuOpYmD.Y3ETe9/XnsxaDBEzIfHsSMFLvG', 797, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(422, 'Jordi Brekke', '(520) 244-2022', '678-295-5143', '4098 Rafaela Manors Suite 385\nEast Vada, NC 20855', '1991-12-27', 'Aut non aliquam reprehenderit consequuntur.', 9, 'donavon36@example.com', 'student', 'true', NULL, '$2y$12$xjn.e42jY5ioh.1gYQs7fupn4Mq6iwztGn5ZvdEbClSQ8EkHO31iS', 755, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(423, 'Adrianna Moore MD', '+12766636667', '678-594-8285', '5357 Javier Corner\nWilfordtown, VA 82822-8939', '1971-10-27', 'Aliquam neque nihil sed odit.', 2, 'ellsworth22@example.org', 'student', 'true', NULL, '$2y$12$Y5xUL8YnDEwK6cSseX5ShuP1DlBcBUMsuo1X5PnM68ump4vOLqWjS', 885, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(424, 'Jeramy Lowe', '708-620-3570', '1-747-413-3898', '641 Nella Forks\nCliftontown, ME 93600', '1988-06-30', 'Aspernatur quam ut provident sed adipisci.', 6, 'gswaniawski@example.net', 'student', 'true', NULL, '$2y$12$eZNoFWZRJ0tPRmV.GaRWUe0uraexW6Q.oIjyGxE8LkgqHryyKVeC.', 856, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(425, 'Cristobal Metz', '+1-707-572-6074', '1-929-301-3557', '932 Kirlin Spur\nRoobbury, NV 64444-7862', '2005-12-01', 'Nam et autem dolores nostrum dolores omnis dolor.', 0, 'jokon@example.net', 'student', 'true', NULL, '$2y$12$8ArOmjAdmidDQs8fSnMHIOxH.SPOtY3kfHiA4RtOk0UcmjTJvesQS', 943, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(426, 'Mrs. Delfina Hermann', '747.613.9058', '+1-484-407-2003', '157 Jaskolski Overpass\nAnjaliburgh, NV 52275-2396', '1983-12-05', 'Laborum perferendis quod eveniet quam nihil delectus velit suscipit.', 3, 'grady14@example.org', 'student', 'true', NULL, '$2y$12$CFnXIsz/s3fZnalhl9mGaOt6hzMG8ESNoDUQRvg.b0IiHYc52r/uO', 601, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(427, 'Mr. Jamison Feil', '+16827533206', '(240) 269-1914', '751 Weissnat Heights Suite 316\nZulaufside, MO 15136', '2004-12-25', 'In eum quisquam eum iste atque.', 9, 'okemmer@example.org', 'student', 'true', NULL, '$2y$12$B4vlrgagzqilZBvk1YkGpO.A3FVbAGU5qzQ8eQEhs5ZYxRymZX.Ai', 677, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(428, 'Nyah Ortiz I', '+1-830-879-7613', '(657) 889-4667', '6448 Olson Ramp Suite 565\nNorth Anahi, MN 93759', '2015-01-28', 'Quod voluptatem voluptatem sunt rerum.', 1, 'sidney.denesik@example.net', 'student', 'true', NULL, '$2y$12$QD5UYPtP7paFZkYnxkKQQu8X2iIotMQ4HeHfStD7OpMhESSQzAsZG', 293, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(429, 'Nella Tromp', '571-586-5571', '(564) 696-0831', '820 Johns Divide\nSouth Curtis, DC 26542-8954', '2018-02-13', 'Velit sapiente totam optio iure ut.', 8, 'ghessel@example.org', 'student', 'true', NULL, '$2y$12$lh.tBbXdGI/pf4mptpwAFeg43Iy2REz2EyqKvQXXDZsLWaVvuEEpa', 451, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(430, 'Buford Hintz Sr.', '+1.954.980.9970', '+1-279-447-2484', '237 Jace Vista Suite 703\nLake Leonardostad, CO 95807-4217', '2012-08-22', 'Molestias est aliquid sapiente velit consequatur quis.', 2, 'jenkins.claudia@example.net', 'student', 'true', NULL, '$2y$12$GhVypZohTXKHbKZQ4pHT.eC6oc762u1/xclSWHGLqVs3wJXNS9j3O', 127, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18'),
(431, 'Elvie Sauer', '+16805511006', '(564) 321-6405', '555 Julius Court Suite 511\nNorth Aileenborough, SC 06247', '1972-12-15', 'Impedit neque maxime sed itaque nihil sint ut ullam.', 8, 'rspinka@example.org', 'student', 'true', NULL, '$2y$12$1xRSvsObVzcEjew4spc/senUfVGiKCQUH2e/BJTigXkhQt60/h.by', 162, NULL, '2025-03-03 19:06:18', '2025-03-03 19:06:18');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(432, 'Grayson Heidenreich DVM', '202.201.6172', '937-508-6317', '5145 Roob Lights\nReynoldsberg, CT 49601-6015', '2021-08-13', 'Molestiae et beatae voluptatem reiciendis laboriosam.', 2, 'zwolf@example.org', 'student', 'true', NULL, '$2y$12$ysHGLWHhfdIOeMbjBeDChO9bu3rsWyARX.TIsm5joZBwe3VvnMr7G', 158, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(433, 'Nathan Monahan', '650.983.2003', '984.737.4978', '396 Friesen Motorway Apt. 641\nPort Henderson, GA 80191', '2023-06-29', 'Voluptate dolores molestiae ut quae non excepturi.', 7, 'corkery.juliet@example.net', 'student', 'true', NULL, '$2y$12$iyFAcuenV7yhgzgCrAmsQu6ahKuJ442WY4hKoB9kQsMGdHbNhXQWG', 256, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(434, 'Mrs. Aubrey Hodkiewicz MD', '+17626539509', '+1-470-471-7988', '7160 Frederik Fork Suite 298\nNorth Liamhaven, OK 55393-7566', '1980-04-04', 'Consequatur maiores quam enim qui pariatur ut.', 1, 'dedrick21@example.com', 'student', 'true', NULL, '$2y$12$GUyAx4fsNx6XQk4zgeA0IeBng8NafS7QGInmpe0ZdR9chxVJi3Fni', 653, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(435, 'Hattie Lubowitz', '(602) 374-0986', '+1 (458) 946-7449', '1603 Icie Harbor\nFunkmouth, NE 15009', '1979-10-16', 'Laboriosam ipsa inventore quos facilis atque et occaecati labore.', 3, 'lhuel@example.com', 'student', 'true', NULL, '$2y$12$L0W7Ffs6eLCcfMn7gt3Oluw.dlsqvnFYgzC6IvFe9B.9P81Xow8SS', 671, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(436, 'Dakota Sipes', '(845) 660-1549', '+15055357650', '640 Uriel Ways\nHamillport, AK 45633-5501', '2022-10-14', 'Natus qui sed quia soluta et asperiores enim.', 0, 'mkilback@example.com', 'student', 'true', NULL, '$2y$12$DTTBpPJv.vFFPFxtAevtP.k/E/j3Mliw6vCg8T/1ocVMO./vRaHs2', 710, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(437, 'Lilian Stokes', '458.418.3546', '1-270-831-1700', '7312 Hill Plaza Apt. 605\nNew Arvel, IA 08799-7695', '2011-09-08', 'Id velit sit voluptatibus fuga.', 2, 'mckenzie.kiehn@example.com', 'student', 'true', NULL, '$2y$12$UfS4jHu2wcvFfy5QMg7/HeZNJoCanPRxX733xIhQrbcR.cBNMi0f.', 566, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(438, 'Baylee Hilpert', '+14796428824', '(820) 627-2980', '4911 Amy Meadows Apt. 052\nSouth Dena, MO 60793-8362', '1998-08-16', 'Rerum itaque error quasi laboriosam.', 4, 'edna30@example.net', 'student', 'true', NULL, '$2y$12$h142mp.Re02D1TprVWtD8.bIU3QLMZ7lpJYp7xbaV2TpkE5.3FVCO', 457, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(439, 'Casimir Treutel', '1-325-320-0838', '(831) 719-4042', '950 Ward Glen Apt. 497\nMarkstown, KS 17333', '1984-10-05', 'Est iure nobis ipsa voluptate neque et.', 5, 'harris.leonor@example.net', 'student', 'true', NULL, '$2y$12$MBurY9tGCqKoBicTMr1S8.8i9lihObPTJymdz0isUe7FJecr3yQRq', 418, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(440, 'Adaline Windler', '+13049918189', '+1 (202) 813-3030', '3071 Mitchell Valleys\nLorenzside, VA 08568-1511', '1994-02-25', 'Nobis ut et deserunt.', 6, 'brant71@example.net', 'student', 'true', NULL, '$2y$12$w0ssL6R1mj9A0a.kY81p2OrwltHD50vXGeq2ja9qUVR6RX8CrmZlW', 739, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(441, 'Ms. Liliana Smitham', '830-298-8494', '870-563-7605', '71563 Harvey Mews Apt. 531\nLake Blanche, RI 80230', '2010-10-22', 'Similique ullam ad excepturi a dolorem maiores.', 1, 'stephania43@example.net', 'student', 'true', NULL, '$2y$12$r/w1.flumrLENc2juj5TxuGXYQzr3XF.IYhWbr3yHHYc6Yq1/1Z56', 517, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(442, 'Briana Senger', '484.665.8607', '1-747-368-6631', '727 Maegan Ville\nWest Gus, MT 82651', '1989-10-20', 'Vitae sequi molestias qui.', 2, 'lwiza@example.com', 'student', 'true', NULL, '$2y$12$ytMIR64z420jWBmEAysV0OFmlNi7h3V5vwVuYvadue4AZycEWQFvK', 589, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(443, 'Dena Dach', '1-458-318-6274', '+1 (928) 422-2803', '2310 Veum Lock Apt. 535\nLake Jakaylaview, HI 91985-2683', '2022-09-19', 'Laborum consectetur enim nihil consequatur.', 3, 'gutkowski.emmett@example.com', 'student', 'true', NULL, '$2y$12$L/wQ7lc8Zca3RSrN6mbuce10dhRjhs/QIJhkNqtpuyLKUugSy4cdq', 596, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(444, 'Ms. Selina Wisoky', '915.392.9618', '+1-724-551-4601', '8945 Bosco Locks\nGulgowskimouth, IL 94734', '1977-04-26', 'Iste consequatur dolor optio veniam odit.', 6, 'hermiston.santa@example.com', 'student', 'true', NULL, '$2y$12$NRQ.cvtkdQbvc/TDz0mOMOSXEObBGVP.4yWn2.YV0bWSSsaelNR7a', 675, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(445, 'Dr. Clay Osinski', '434-260-4593', '+1-667-922-5802', '35742 Brandt Point\nSouth Virgie, WV 80407-7737', '2012-08-11', 'Fugiat recusandae sed ut sint.', 0, 'anya81@example.net', 'student', 'true', NULL, '$2y$12$I/9ARtVNsGLHcQCDRF37Fu3F5WZ1OCxqrsvAjGifElMo3wbIvHR6C', 985, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(446, 'Prof. Christop Kris', '857-530-9161', '413.627.6537', '877 O\'Connell Skyway\nPagactown, TX 81262-8556', '1983-04-09', 'Ab placeat ea iste.', 8, 'pboehm@example.org', 'student', 'true', NULL, '$2y$12$TK/sRQn6pLBq3BeGQE5JZOJzzaRwlFqgWfQP7/3I3s9bQoFcGUbWq', 635, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(447, 'Dr. Felicita Kozey', '+1-283-370-0996', '360-403-0839', '721 Columbus Shoal\nProsaccoton, WA 56131', '1997-05-24', 'Nostrum mollitia laudantium voluptate temporibus ipsum.', 0, 'leannon.elroy@example.com', 'student', 'true', NULL, '$2y$12$Tqc9HFL6kS/XtRB91FOcou6HOxeWVGNiRMu2kRZikevLqrIxMm.Qy', 183, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(448, 'Danny Baumbach', '1-540-696-4564', '(808) 254-3019', '445 Zieme Expressway Suite 145\nRosettamouth, MA 87222', '2012-04-13', 'Occaecati ullam quibusdam saepe repudiandae adipisci.', 7, 'gcremin@example.com', 'student', 'true', NULL, '$2y$12$qYgG4thwn93FPrOIg5qzYeO9uIHqVLaYuO9nPEKx9XLS9kd8.5Gs6', 890, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(449, 'Mr. Izaiah Grimes II', '(520) 608-6459', '606-253-4740', '164 Savanah Club Suite 431\nNorth Moises, AK 01165-2690', '1999-12-10', 'Placeat qui quibusdam quo consequatur repudiandae voluptatem.', 5, 'vernon29@example.org', 'student', 'true', NULL, '$2y$12$F9BF6Kc7ey7nBbaILNx84eAVm5eD2SFj59jW0mIsI0.PbSKOBdjvG', 116, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(450, 'Lula Blick V', '(956) 777-0517', '820-242-4454', '88451 Stephania Path\nKaleyhaven, NH 39591', '2020-05-29', 'Omnis non et deleniti quis.', 0, 'yrohan@example.com', 'student', 'true', NULL, '$2y$12$7cBl4dkdUnrSUu0AojomhOQnC0mobEA/zAChVX0xctJ0GRzWmHzRa', 928, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(451, 'Leila Legros', '+1 (505) 215-8946', '+17755217378', '41340 Toney Burgs\nWest Barbara, AL 05440', '2001-06-10', 'Ex odio odio voluptatem et et vel et.', 2, 'mstark@example.com', 'student', 'true', NULL, '$2y$12$mgZY4DN1UBj9qosJh.mt7usySzVPfyUQop2AP2bybrSIpVBy7CH/u', 753, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(452, 'Emery Gutmann', '+1-740-736-1431', '805.752.5315', '758 Corbin Walk\nConnhaven, VT 45386', '2001-09-12', 'Magni et facilis ad tempora itaque nesciunt aut.', 6, 'ryley.wyman@example.org', 'student', 'true', NULL, '$2y$12$QAzdg6OwkOkULcGY284jxuiT9YMghjbTX7uDLl8h1Cg0aTOAMHSYm', 298, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(453, 'Prof. Wyatt Conn Sr.', '1-657-547-5035', '+14234294179', '3404 Collier Underpass\nKeelingbury, RI 14152', '2022-08-03', 'Aut aut sed voluptatum minima molestiae qui.', 4, 'king.dana@example.org', 'student', 'true', NULL, '$2y$12$daIx6j2EKdRDcZ80iQk.JuR9w.QeDFtE/8RekRp70i6msfGqk7jJ6', 804, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(454, 'Kacie Hane II', '+1-984-216-9670', '1-341-966-5662', '7931 Graham Squares\nAngusburgh, MA 56302-9840', '2013-09-18', 'Eos eos autem explicabo.', 2, 'rogahn.marion@example.net', 'student', 'true', NULL, '$2y$12$Fex.T6ng6FKKJE2EQ8th4uDLWYylHoK.fyDkqzBCLhebCyO7Rh8L2', 330, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(455, 'Beth Runolfsson', '385-574-3100', '678.433.4871', '37750 Hoeger Neck\nWest Vadamouth, MS 44048', '2013-11-30', 'Mollitia similique autem iste aliquam nobis.', 4, 'berge.edward@example.org', 'student', 'true', NULL, '$2y$12$2RJdrrUuPCvu63jEFOjQPOBXX1FEW5ap6FyJz3tU/M2BURz.oq09m', 840, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(456, 'Nicole Bogisich PhD', '910.280.9895', '(347) 395-0071', '210 Torp Throughway Apt. 391\nArleneville, NY 82129-2343', '2007-06-12', 'Dolores qui est vel soluta beatae laboriosam commodi dolores.', 3, 'harris.rosalind@example.org', 'student', 'true', NULL, '$2y$12$gnoDlq2oNWVwHg276XQvCOQfLsOimGvxaMgEXrqG71GWHLuO//8uy', 322, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(457, 'Dr. Vidal Effertz', '+1-260-535-1249', '1-417-365-3314', '19791 Keira Brooks Suite 546\nStrosinport, ME 05221', '2021-12-19', 'Explicabo reiciendis velit amet consequuntur fugit nobis distinctio nulla.', 6, 'collier.asia@example.net', 'student', 'true', NULL, '$2y$12$Im4pnHbojGDwzjlsxZnYq.xxgpbfJJ4nGBTpqbsh8EG.QBv6XZ3BG', 765, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(458, 'Sigurd Price DVM', '346.937.0867', '+1-304-810-4106', '632 Orie Square Suite 763\nLake Laron, ND 18678', '1988-06-24', 'Aut provident impedit praesentium dolor at.', 6, 'celine.walker@example.com', 'student', 'true', NULL, '$2y$12$BMT4TUG5W8nLFvOX/DklOO8ZNg0BFDH/0CodxF6kDNnyLVYIRoS7m', 810, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(459, 'Cathryn Willms', '+1 (706) 810-1573', '929.514.1185', '24585 Van Centers\nLangoshfurt, CO 45551-7339', '1984-07-22', 'Ullam neque reprehenderit quidem id nihil tempora officiis.', 8, 'nick.barton@example.net', 'student', 'true', NULL, '$2y$12$DSLk2WvkUzrijxWqTIMuyehSsN3w8uNBFokjqFuQS6Ts1kmnIkKbq', 263, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(460, 'Heloise Raynor', '+1-681-840-8553', '1-364-276-8228', '70321 Bruen Manors\nSouth Rosaliaburgh, MA 04141', '1984-06-13', 'Iusto alias mollitia illum qui exercitationem odit.', 5, 'andreane14@example.org', 'student', 'true', NULL, '$2y$12$DEa27T0CpPzK6arCHyW.0e4qYs7tzlT8hHTmr.mgSOt7Vi9ySkzl2', 521, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(461, 'Marie Robel I', '+1.234.730.4921', '+13515143235', '154 Waters Meadows Apt. 077\nNorth Winona, AL 20899', '2022-12-17', 'Unde odio incidunt culpa quia iste.', 9, 'iwehner@example.com', 'student', 'true', NULL, '$2y$12$GbxLMFqMBNYb2CP8wWFYJuhtEPrbw/Kgc6PflQ/q.xfrk92dI9oXC', 92, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(462, 'Alexanne Bartell', '213-770-7415', '+1 (940) 234-3116', '213 Noelia Forges Suite 532\nRobertamouth, NC 39712-1399', '2005-09-14', 'Quo nisi dolore nam minima quos accusantium.', 0, 'gziemann@example.net', 'student', 'true', NULL, '$2y$12$PXkNvtMdeFnUfnGXWwAYDuXtmTjuHETNSk9fAJ./P02R5BUFAElrq', 588, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(463, 'Jamir Pacocha', '1-539-832-9760', '+13529326863', '377 Annabelle Crescent Suite 135\nPfefferview, SC 79408', '1970-06-27', 'Facilis expedita corporis fugit odio et mollitia deleniti.', 5, 'rempel.brain@example.net', 'student', 'true', NULL, '$2y$12$Frb7kTOcRe4bYX0csd8okuinGv7/SME.OnsogaJ72JlJOlEb7KNs.', 578, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(464, 'Dexter Reichert II', '+1 (828) 800-2678', '+1-445-201-3292', '889 Swift Cliffs\nLake Jazmin, NC 49861-2974', '1990-12-07', 'Veritatis officia ut aliquid.', 6, 'obeier@example.com', 'student', 'true', NULL, '$2y$12$9cGByvrfX3otM7gyc9Hroe.aspnCEyltgsVp29Wp/T.vNcymLr2De', 290, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(465, 'Shannon Streich', '503.779.7328', '531.218.9662', '93625 Hassie Drive Suite 232\nEudoraside, NJ 52946-7520', '1992-01-25', 'Sed voluptates quisquam minima vitae.', 4, 'lemuel48@example.org', 'student', 'true', NULL, '$2y$12$rzN1nHCuoFZ02cOl.KcL2e1eet.ku/AOUT5tVh8j0qN9d91ng2YV6', 995, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(466, 'Octavia Sanford', '+1-541-724-7554', '1-443-571-3399', '5407 Melissa Village Apt. 034\nWisozkland, MA 82798-8279', '2019-03-12', 'Fugiat assumenda voluptatem et mollitia eius.', 8, 'ariane28@example.com', 'student', 'true', NULL, '$2y$12$Sq25LRgowmhiWGONaEVWpO1w3X.J.Hk.RvTclo3x54eKoV9FMZera', 876, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(467, 'Jayda Lesch Sr.', '463.798.1555', '912.308.3177', '792 Runte Hills Suite 581\nNorth Celinetown, MA 63194-9937', '1984-07-20', 'Architecto ullam soluta unde est et et.', 1, 'zboncak.ronaldo@example.org', 'student', 'true', NULL, '$2y$12$BmfjV4bbKRV7dBgFEAWqu.Puf5w9JRy/mGqRTN.4VXp7H9JZFSupS', 128, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(468, 'Terrill Cole', '(409) 989-3183', '(681) 371-6958', '329 Hoppe Valley\nCasperside, TX 25823', '1980-09-12', 'Enim sapiente deserunt ullam nulla voluptas voluptas.', 6, 'susie70@example.com', 'student', 'true', NULL, '$2y$12$uC3xkdDrAakZq97KtDLs.Oqaa9NVREiSoVSPRujpelszuLmBIR5Ju', 901, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(469, 'Ms. Lilly Kreiger IV', '+1.540.281.7784', '706.639.5589', '19707 Hermiston Ferry Suite 685\nEast Rolando, SC 03326-3134', '1981-04-25', 'Sint voluptatem et minima eum et voluptatem soluta.', 7, 'ulowe@example.com', 'student', 'true', NULL, '$2y$12$MNyUvECgxMaJ7HHvZO6tIu9IEOqn9p1bSOmEMd4S8uQSQCGnnQzGW', 90, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(470, 'Prof. Hilbert West', '434.767.9636', '+12546928444', '7932 Jed Drive\nPort Owenland, IN 63381', '2010-07-10', 'Qui sint corrupti nam asperiores similique.', 5, 'muller.brianne@example.org', 'student', 'true', NULL, '$2y$12$aXaszIgxjaNomD7vccZg7../IvNMy2UlGeE9gtilojplLBG3SwPPu', 827, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(471, 'Calista Cartwright PhD', '(262) 657-5040', '779.750.9650', '640 Waters Pike\nNorth Imachester, NM 76947-6019', '1986-08-02', 'Distinctio minima exercitationem maxime voluptatem tempore ratione.', 9, 'xmonahan@example.net', 'student', 'true', NULL, '$2y$12$f9NPaDuq9SIgi6WLBMB5qeIwhfpkYQrO4GX1NZd1SsbY4A8.iha8G', 664, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(472, 'Dr. Anissa Ebert', '(785) 554-5515', '(714) 363-0121', '9027 Maryam Bridge Apt. 104\nTownebury, OH 91313', '2022-05-21', 'Est impedit laboriosam accusantium voluptatem.', 9, 'austen71@example.com', 'student', 'true', NULL, '$2y$12$TPX8Pyz/IUsW5r1tchr4i.q5zwV1ektYiKSf3MlAESbI2bqvK5wRe', 406, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(473, 'Mr. Weston Wilderman', '(272) 870-3853', '1-325-949-6060', '36603 Kihn Avenue\nCareystad, IA 19878', '1984-11-09', 'Et doloribus sed corporis et esse.', 8, 'carolyne26@example.org', 'student', 'true', NULL, '$2y$12$aR2WkGzVC3lh/6CjdmjhV.BW/RyjfwSV8cm2QDTD5URZurwkMbW0K', 649, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(474, 'Prof. Garrick Gaylord III', '(248) 840-7369', '(361) 287-8856', '2732 Denis Extensions\nDemetriusside, NY 24391-2859', '2013-08-07', 'Quidem et exercitationem dolore maiores tenetur reiciendis aut.', 8, 'jaquelin.conroy@example.org', 'student', 'true', NULL, '$2y$12$dJSNy22n7NneTxavoKC/o.rD6JMNpLo.b0fzTXPrh1T7wOu8Ymzba', 752, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(475, 'Ms. Lavonne Stamm', '+1 (563) 210-1359', '941.353.9007', '88806 Katelyn Extensions Suite 776\nSouth Amy, PA 06269-0279', '2001-01-28', 'Voluptatibus molestias temporibus eos ipsam.', 5, 'vcorwin@example.net', 'student', 'true', NULL, '$2y$12$3zj/pp7SE9ny.kWWQGCvz.bSZKHCRJzUV/tCmP.p1lPmHRZCsQ4AG', 922, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(476, 'Zetta Gleason', '+1.458.365.1603', '+1-754-947-4006', '66758 Schumm Alley\nZanemouth, AK 65694', '2003-01-20', 'Ducimus sit velit atque.', 1, 'jonas.lebsack@example.org', 'student', 'true', NULL, '$2y$12$WJPYbqxLEgrxO4Z93Ey.1ujcWrJsCjeCqXQMd3g/KfT2xw5w1Cq3a', 502, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(477, 'Prof. Giovanna Rogahn', '+1 (802) 425-4412', '231.325.7843', '2811 Greenholt Mews Suite 750\nWest Keanuton, DE 27745', '1978-10-30', 'Ad reiciendis vel quam consequuntur natus itaque officiis.', 9, 'kian.thiel@example.net', 'student', 'true', NULL, '$2y$12$aRQjkRXEUIZf78bfGHXv7Ox2lid.3TYjq213nMVNwbE5wijIeu3Q2', 570, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(478, 'Earl Schulist', '+1.785.699.7146', '+1.724.459.8892', '8031 Christelle Land\nWest Edmond, NM 62057-9970', '2006-03-01', 'Dolorum ipsa quia et veritatis necessitatibus ut quis.', 8, 'goyette.lamont@example.com', 'student', 'true', NULL, '$2y$12$4h20LUDOSB6W7jwmIf5q/eObiyHHuNnqHlVQHhm7RPItSuU7AOnqO', 203, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(479, 'Richie Pfannerstill', '+1-682-922-8593', '615-312-1258', '40605 O\'Kon Village\nRoobport, SD 09467', '2000-07-29', 'Repellat qui corporis est corrupti laboriosam temporibus sunt.', 9, 'tyrese88@example.net', 'student', 'true', NULL, '$2y$12$3RU6kaCVL9YdF4hTmgm88./Af7KLezZbNsOzpMexHm2VEAoD91OQu', 912, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(480, 'Ford Rippin', '1-260-378-1534', '743-778-1179', '9124 Rohan Station Suite 280\nPort Barton, NH 24574', '1978-05-09', 'Nostrum odio architecto porro est numquam accusantium.', 8, 'dkeebler@example.com', 'student', 'true', NULL, '$2y$12$jRRiOGosrxe818IsvSxna.JG1FgPs90WGh7DgWHXoLZ2pGoLlbv2G', 252, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(481, 'Burley Corkery', '1-716-306-7790', '+1.732.988.5103', '78982 Jarrell Manor Apt. 488\nColumbuston, NE 16118', '1983-08-01', 'At autem excepturi ut nobis unde perspiciatis.', 7, 'aida08@example.net', 'student', 'true', NULL, '$2y$12$SyHZ3zjbU6cSBScIP6wa0OKsCTs2CoOHIVdopGJR2FZZusgR5njXW', 440, NULL, '2025-03-03 19:07:57', '2025-03-03 19:07:57'),
(482, 'Miss Anya Pfannerstill', '(680) 999-0098', '1-281-690-6937', '84279 Nathanael Inlet\nHegmannville, FL 08510', '1997-01-21', 'Exercitationem incidunt ipsam accusamus delectus rerum.', 2, 'clifton.christiansen@example.net', 'student', 'true', NULL, '$2y$12$RwVKRfa.o3KKhAM5bOI6T.9fy2IFi.u7bf3CxvLsQU8NBzL0Em68O', 302, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(483, 'Emma Runolfsdottir MD', '+14842876901', '+1 (321) 436-5206', '3581 Leannon Expressway Apt. 884\nPort Daytonshire, MN 30648-1086', '2022-07-07', 'Natus omnis itaque et sed odit dolore autem.', 5, 'manley.lowe@example.net', 'student', 'true', NULL, '$2y$12$2/PuVP9mSVrU38Ulsb6efu5UbUC0.bEFWlj9K8UY8u1QcBK/5fGw2', 674, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(484, 'Prof. Domenica Ullrich', '615.337.8575', '+1-980-891-1620', '9782 Orn Drives Apt. 788\nAlessiaborough, NC 66099', '1994-05-22', 'Ab vitae est suscipit facere quasi nam laborum.', 3, 'oreilly.nathaniel@example.org', 'student', 'true', NULL, '$2y$12$084K5zF/W4pKppJFL9H59uEJeAWbtOSIuZHsMczH7zHtthMgwL8Te', 564, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(485, 'Uriel Roob', '815.557.5712', '321.594.6104', '464 Harris Route Suite 770\nNelsport, MD 35439-1748', '2000-10-27', 'Repellendus minima nemo consequatur possimus.', 0, 'brooks.wiza@example.org', 'student', 'true', NULL, '$2y$12$s0XokcvWHTFr/kcQmjegiuvtpIGbkUEaOa0FyErtNLz7XSOxvEoQ2', 307, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(486, 'Lavern Cassin', '979.483.9068', '+1-361-623-4640', '7162 Tomasa Turnpike Suite 089\nPort Sincere, CT 74532-9302', '1972-06-20', 'Et eos quia quos.', 6, 'kessler.shanna@example.net', 'student', 'true', NULL, '$2y$12$1JPdc.b1nvbwD81Xb.Uw3OBtiCAn8nrMUJYHW/tIyMI3M9K5uEVby', 358, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(487, 'Dameon Nienow', '484.685.6716', '906.800.9014', '26033 Dicki Circles\nWest Eudoramouth, CT 68190', '1976-03-23', 'Excepturi tempora consequatur minus illum sed.', 0, 'kasey18@example.com', 'student', 'true', NULL, '$2y$12$uy8Zg40mm7i7aGG3zQwqYevCagPXY2spUewjAHL9idmY.AZYymSwe', 66, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(488, 'Aleen Lueilwitz', '1-320-712-6418', '+19735649274', '7593 Margot Plains\nSunnyton, OH 56406', '1989-10-05', 'Dolor odit dolores dignissimos doloremque reiciendis quia.', 6, 'horacio.legros@example.net', 'student', 'true', NULL, '$2y$12$0khBmkHbjPMjOCCEtqWTJefhJvAcftYjM17Xgzf5klhxBJTQZXatS', 739, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(489, 'Loy Bergnaum', '1-516-482-9870', '(253) 631-5815', '916 Hane Point Apt. 841\nSchusterstad, NE 67563', '1972-10-10', 'Officiis esse consequatur qui laudantium est commodi consequatur odit.', 7, 'gerhold.keely@example.net', 'student', 'true', NULL, '$2y$12$W37ZMYbdzTKxzaGs6VUJWuj/UA2wa1o7Z.SlZWkcvfrsoohMIxtK6', 44, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(490, 'Mrs. Danyka Greenfelder Jr.', '+1-283-509-0105', '904-282-0883', '95706 Pfannerstill Mall\nGerholdburgh, NJ 09408-5406', '2020-05-05', 'Tenetur aut cum a voluptatibus inventore magnam laboriosam.', 9, 'destini.oreilly@example.net', 'student', 'true', NULL, '$2y$12$09kVRLTff0bKm1qXGkH.d.Q1ezjRKnZJzGupLviPDqLZjIqMEonoW', 450, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(491, 'Juana McKenzie', '(781) 405-9728', '949.467.8685', '139 Gerhold Bypass\nJewellview, IN 88775', '2019-05-13', 'Quibusdam et est et sit veritatis quisquam non.', 3, 'fahey.amiya@example.net', 'student', 'true', NULL, '$2y$12$LRvMDuEf7iiGZoqo8BbMFORyiVjlw2nLh2ahxTPbafTLut3hqsL3e', 372, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(492, 'Bianka Carter', '470-517-8498', '386-588-7821', '4529 Chaya Extensions\nBergnaumbury, MI 48047-2333', '2018-01-17', 'Sint sed nostrum ipsam quae non voluptatem consequuntur.', 0, 'ysimonis@example.net', 'student', 'true', NULL, '$2y$12$hS8twFzs3pbTS2f2qMIGH.mXB17l6JvFpk7nQ5rVkCZroUYtQaba2', 72, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(493, 'Fleta Weissnat Jr.', '1-937-249-9610', '563.399.2849', '42024 Mckenna Shore Apt. 839\nReggieport, OK 19311-9924', '1984-04-16', 'Et qui ex in.', 3, 'heathcote.alvena@example.net', 'student', 'true', NULL, '$2y$12$9ao/khLeicn5dgz02Cpf4uH31sDiL8K9z.WJ3Q0D9pgz8A3xkwhNe', 420, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(494, 'Dr. Favian Jacobs', '+1.815.898.9112', '(251) 820-9527', '733 Watsica Viaduct\nLake Tremayne, DC 60005', '2018-10-19', 'Dolor aperiam quis rem dolor.', 0, 'lily52@example.org', 'student', 'true', NULL, '$2y$12$.FB.6VAdhVPx0V9JjwiCI.Qa75WGDDWHKU7rXhPq4I2kmlHdjXqDu', 816, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(495, 'Mr. Jairo Donnelly', '240.331.9487', '952.271.5444', '64503 Addison Crest\nSouth Lonnytown, NJ 61399-5597', '2009-01-28', 'Illum odit consequatur a quo sit.', 0, 'kim.dubuque@example.org', 'student', 'true', NULL, '$2y$12$j4FBj3mqkBnEQatbsxozb.mFw/8g/X3T7rYapJ0PjPKQygCi1GfAy', 478, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(496, 'Norbert McCullough', '361-535-2955', '(504) 320-9245', '975 Morar Grove\nLake Theaton, HI 23170-5349', '1971-05-26', 'Est rem voluptate repudiandae qui.', 3, 'dprice@example.org', 'student', 'true', NULL, '$2y$12$027VmQ/Af7RbTopS/XhERuBLy3bT69VrIe5tWn1XW6l/QYRsc9hL6', 304, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(497, 'Lloyd Block', '+1.220.320.5709', '+1-724-455-4661', '5532 Marlon Forks Apt. 375\nNorth Consuelo, AZ 93663', '1985-01-04', 'Placeat ratione molestiae neque accusantium qui quam et dolores.', 0, 'alvena33@example.com', 'student', 'true', NULL, '$2y$12$LpPipN.Qa9aObOQA9psGuudbAKSy0T2Crv6uZ0tV76yjBelfpBYCm', 217, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(498, 'Giovanni Graham DDS', '+1-563-567-4132', '1-339-871-5577', '481 Orlando Ways\nNew Marcelle, MI 01862-5305', '2024-10-17', 'Et eius quaerat id quisquam.', 0, 'dbraun@example.net', 'student', 'true', NULL, '$2y$12$hynj8J18U6A9LHNarvN6xeHn1JPZILrYLP0z7xGHb405Es9L8T5GG', 1, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(499, 'Prof. Raymond Stiedemann', '830.348.4710', '925.252.6442', '79863 Judy Plaza Suite 860\nEast Candelarioview, NH 14857-2473', '2005-04-26', 'Corrupti et libero temporibus et.', 1, 'ratke.ellis@example.com', 'student', 'true', NULL, '$2y$12$TBVivvZdkgs2DE4TgsM8Wup7uyHwzUNNJT4ulaiBhzSSPQ29q/P4q', 922, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(500, 'Dr. Cornelius Cole', '1-424-953-9728', '(608) 286-9595', '74849 Waters Roads\nWest Emelie, ND 57929', '1972-12-11', 'Rerum quisquam qui voluptas ullam fugit impedit aliquid.', 9, 'harris.fatima@example.net', 'student', 'true', NULL, '$2y$12$d7Fu7yg/VrIWtbzWY7IbkuTXeyb7oZvdNrKvWOPguNnLApb9aE4b6', 982, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(501, 'Prof. Adrain Bradtke V', '458.944.5573', '757-944-7271', '8970 Liana Shoal Apt. 622\nNorth Dorrisview, LA 06193', '2006-07-17', 'Amet sequi sunt vitae quaerat est ullam iure facilis.', 1, 'violette86@example.org', 'student', 'true', NULL, '$2y$12$oztXw2IWjjsN.jfJo9O/f.hwsowAvBCswmngfhbQTFT5rJ1swB1cu', 284, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(502, 'Josiane Armstrong', '616-826-0581', '1-623-412-3574', '7139 May Knoll Suite 655\nWest Ricky, CO 44305', '2011-01-13', 'Molestiae beatae nisi et culpa enim enim.', 4, 'krystal48@example.com', 'student', 'true', NULL, '$2y$12$vTV51I.bJznTyNbXl/mDMuMJIRBOy.SogQ.mSlO8CtlLcluXD.fYG', 986, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(503, 'Dwight Pfeffer II', '+1.332.774.9627', '252-216-8390', '7138 Osborne Manors Suite 784\nConnellyfort, TX 00992-4357', '2002-02-17', 'Et facilis sapiente ut sapiente non in et.', 5, 'joannie.bogan@example.com', 'student', 'true', NULL, '$2y$12$aj58lz5yVvh8rnD6q/.qEOQDfrcaQZhu9Wh3qFuvV80sK3/qRvMla', 998, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(504, 'Dr. Horace Hintz', '701.600.0562', '1-520-908-4290', '6897 Heller Plaza\nNew Eveborough, NH 60722', '1996-03-02', 'Et voluptate qui quo autem.', 6, 'madilyn63@example.net', 'student', 'true', NULL, '$2y$12$o.idBYeQJWqXhSgmBp6Cz.Ux16mNkH1t775X76BlcpxMxRr4U3hTi', 121, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(505, 'Reinhold Smith', '(239) 426-2728', '+1-520-221-1757', '20780 Kasey Crest Suite 757\nSouth Ociefort, TN 45587', '1991-10-30', 'Ut dicta quisquam totam quidem adipisci.', 2, 'ifriesen@example.net', 'student', 'true', NULL, '$2y$12$ZWpcFyHsusQCjQPHRGTjAOU.ci.7Smm3woRbLUYmcp0WLNIi1AUsO', 204, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(506, 'Myles Crona', '1-908-398-9634', '+18705943447', '21216 Rosenbaum Locks Apt. 787\nBodechester, MD 99375-8310', '1977-01-02', 'Sed aut ut rerum.', 3, 'janelle.bartell@example.com', 'student', 'true', NULL, '$2y$12$fjI.jtrei0BddNtL0EX1m.3ZOy.xZ2b/9KJaYRkOjhs1PWLzKP2Tq', 219, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(507, 'Helmer Collins', '+1 (831) 231-1094', '+1 (650) 767-2606', '811 Shane Islands Apt. 171\nEnochside, WY 37478', '1989-07-13', 'Ipsum non ut beatae.', 6, 'jabari66@example.net', 'student', 'true', NULL, '$2y$12$cZKN9K1jFHS2/N7Z/Uekeu4WV6ysQ3rS73XvXnwX/y.Pyh/VQotDK', 728, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(508, 'Diamond McKenzie Jr.', '251-350-8723', '+15185720416', '24878 Rodriguez Expressway Suite 133\nAdahmouth, NM 91442-1563', '2016-02-25', 'Et veniam et incidunt aliquam impedit accusantium dolore.', 5, 'edna91@example.net', 'student', 'true', NULL, '$2y$12$O7HTz.14lhFXUjdtTZeuy.ZI3zd6AouVo7LtNKsHWeHNhgQ8/SWi6', 116, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(509, 'Mr. Devon Gerhold I', '+17608837916', '+1-831-718-8357', '4089 Sheridan Lodge\nBradyside, HI 28615-0118', '2020-05-19', 'Quia corporis officiis qui recusandae dicta voluptates cupiditate.', 3, 'nschinner@example.org', 'student', 'true', NULL, '$2y$12$EzBJoTVpjv5NQTmIV0s9jOYGn42iqiRAl7RePCfW7qormPoNA4fUa', 546, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(510, 'Ms. Gwen Weissnat MD', '(346) 922-1489', '1-253-742-4810', '27884 Cyrus Spurs Apt. 430\nNew Colleen, ID 52491', '2010-02-23', 'Cupiditate saepe est deleniti dolore iste sed eaque.', 4, 'feil.ezekiel@example.org', 'student', 'true', NULL, '$2y$12$EcdRbpORsCp1fCXhx/xc2.pneOuyphfE2MRpxHzINXYI6uuPUqCAq', 819, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(511, 'Mr. Cale Hackett PhD', '(763) 986-4361', '1-279-407-9189', '74084 Marquardt Square\nSouth Clement, MT 85088-0876', '1971-06-01', 'Quia et a ut in amet.', 8, 'juston.reynolds@example.net', 'student', 'true', NULL, '$2y$12$YVlpr9aM45wMem/TvtEhTeZusWBzmnrs2CC/T4BIsRMeQlmIhHbYq', 905, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(512, 'Prof. Corrine Jacobi', '+1-571-213-7215', '364.555.0468', '550 Hintz Neck Apt. 673\nWest Rhoda, MN 63393-4314', '2012-02-19', 'Et eum rem perspiciatis iusto est sequi velit.', 2, 'erika73@example.com', 'student', 'true', NULL, '$2y$12$UoLnJjSUkG6Jn24QJYWHmOW1xq2iXLfbTVyxodzZ9oyDpFPYQoub2', 512, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(513, 'Prof. Violette Runte Sr.', '+1 (689) 993-2811', '+1-820-676-0365', '63772 Lindgren Springs Apt. 903\nAiyanashire, GA 14841-7198', '2008-02-10', 'Minima sapiente itaque officia incidunt eum amet repellat.', 9, 'schmitt.juston@example.org', 'student', 'true', NULL, '$2y$12$JdtObYbcazzMCZH5Dx4s0eJLnSymTpE8jEXR2IGrOtcCQeN2wM/E.', 168, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(514, 'Ellsworth Hagenes', '1-610-757-9921', '475.354.2917', '52950 Kutch Place\nLake Claude, NE 19495', '1980-09-15', 'Occaecati maxime rerum molestiae.', 6, 'pinkie.klocko@example.org', 'student', 'true', NULL, '$2y$12$LDkV.RfZn.cYzoJs9rOBp.1BYTkk6B9J1plzENjxWG7Aoi.CRdSwa', 520, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(515, 'Avery Bergnaum III', '+1 (612) 326-8284', '+1-754-303-1279', '59345 Destini Drive\nWest Adelbertfurt, NM 79414', '2003-08-03', 'Reprehenderit nihil aspernatur dolore voluptatum a unde.', 9, 'khickle@example.com', 'student', 'true', NULL, '$2y$12$SBAPoBB3PU8JGH/TssV6DueU.WObuF/AEYpQxYC9C4hCmbqlNqObG', 451, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(516, 'Vidal Windler IV', '+1-954-773-2489', '458.592.7160', '358 Annie Point Suite 577\nNorth Ricky, KY 87712', '2010-09-21', 'Vitae voluptatibus provident voluptatem suscipit.', 9, 'stroman.alexie@example.net', 'student', 'true', NULL, '$2y$12$FUiC4dVFs/N7LqSEyySn3e3pJn1dqbE1DOVCPqZMRNOOcMHVaYcGW', 32, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(517, 'Hubert Boyle', '808.369.0658', '+1-574-589-6115', '510 Rath Tunnel Suite 959\nNorth Jaidenfurt, KS 92973-0287', '1998-04-01', 'Non totam eum sit nostrum consequuntur quam expedita quis.', 2, 'dustin.rosenbaum@example.org', 'student', 'true', NULL, '$2y$12$nJ/sYMcs1xi662UsyuC2yeQF84KmmosTG66RIRR9Xa5TckrTV4C32', 753, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(518, 'Ms. Rose Dickinson', '1-573-390-6452', '501-325-8987', '4767 Ullrich Manor\nJaimeberg, MA 86149', '2003-01-08', 'Tempora voluptas fuga maiores est.', 3, 'mstreich@example.com', 'student', 'true', NULL, '$2y$12$cqMIgNXWayGPOX65MB4Yte3L0JeWDmF0ZYcZPEuev1YJoJOxNR7dm', 101, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(519, 'Doyle Klein', '(229) 263-5624', '678-593-3943', '7512 Schamberger Valleys\nEast Darryl, KS 98139-3692', '2022-09-05', 'Voluptas et molestiae et iure.', 6, 'wmclaughlin@example.com', 'student', 'true', NULL, '$2y$12$lyttDG.2x69/XXx6rKZu3.W3u3l/adbKvFr649ZRvLfaBi6gknys.', 829, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(520, 'Florencio Lebsack', '1-925-524-9035', '+1-740-944-7960', '159 Jose Plaza Suite 206\nSouth Yeseniabury, NY 10845-1900', '1977-04-15', 'Et error nobis consequatur dolorem et est quos reiciendis.', 1, 'pinkie57@example.com', 'student', 'true', NULL, '$2y$12$W3vN/4puoxDxWuMwk4GD9uaCGnQF3So1ob5HGfXpmaWdLWMLJ179.', 981, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(521, 'Mackenzie Jenkins', '520.860.7312', '+1.239.550.2426', '5757 Kling Oval Suite 908\nLake Eryn, MS 58410', '2005-08-14', 'Ipsum officia necessitatibus ut modi a assumenda rerum.', 5, 'collier.jamir@example.org', 'student', 'true', NULL, '$2y$12$Bcc2FJ7RlMKCE1PoqS0IeujiQscFB8voviL2tChJxM/YYjXXD78WS', 419, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(522, 'Archibald Lubowitz', '+17348914364', '(801) 958-0544', '3645 Jerde Islands Apt. 696\nDickimouth, NH 58823-4603', '2020-07-13', 'Eos quis ratione et aliquid architecto molestiae.', 2, 'waylon.ferry@example.com', 'student', 'true', NULL, '$2y$12$yLrcQvUWUgoWfHK2PQXDh.Cm2jGWnizrZ5f3TBZzt4mLRWVkAqffW', 211, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(523, 'Ron Wolff', '(724) 650-9404', '1-702-836-1647', '78362 Wilhelmine Club\nNew Mayraburgh, WI 08331-3501', '2000-10-29', 'Ipsum saepe quia eum nihil eos veritatis asperiores temporibus.', 9, 'merle05@example.net', 'student', 'true', NULL, '$2y$12$JmO3A57kREozEfCE4BQsMujY/71bfIW/CG3S72H.MfRgqaGAFdUOW', 806, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(524, 'Sterling Kunze', '(845) 558-9950', '(513) 949-8512', '80019 Hope Falls Suite 354\nMohrport, WV 47712-5517', '1994-12-07', 'Quo sunt in quae qui.', 0, 'annie70@example.net', 'student', 'true', NULL, '$2y$12$RJIOt/yh2kO4SPPaxqjbquL7bx7QrMdp/iYKoBX6Ifo3HlYnhuubi', 216, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(525, 'Prof. Augustus Reinger', '1-704-796-3042', '307.741.3066', '22461 Rogahn Brook Apt. 217\nNew Marguerite, AR 63450-0652', '1991-06-20', 'In deserunt quod praesentium natus voluptatem sint.', 2, 'gkiehn@example.net', 'student', 'true', NULL, '$2y$12$Esn4vq2tvsKYSpfH8U3QBOZyMxjMXLA6tyPP4nIeo5VFSDrZkeA26', 647, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(526, 'Giuseppe Jacobs', '+12522533755', '346-981-7330', '9457 Josefa Branch Apt. 742\nNew Gardner, MD 70547', '1982-08-02', 'Iste sint tempora eaque harum tempore dignissimos illum.', 6, 'elroy.gleichner@example.org', 'student', 'true', NULL, '$2y$12$3ds4tscitQeo2cMY/jcq5.TuE.Di4E0Y4IRRpRCGovxl.03n9ZSx.', 155, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(527, 'Alysson Schinner', '+1 (914) 620-3690', '423.434.7187', '42885 Aufderhar Trafficway Suite 481\nWest Gavinmouth, UT 95236', '2024-09-15', 'Autem facere soluta pariatur ab fugit minus.', 3, 'maxine48@example.com', 'student', 'true', NULL, '$2y$12$mA1NSpjAQvCz4KH42K4oHOWMANc7IPI07lMQ4qQI21mSucPEPY.am', 284, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(528, 'Jaron Bogan', '1-323-943-1850', '+1 (541) 369-5438', '44833 Nat Court Apt. 793\nGulgowskifurt, AK 39025-8928', '1997-02-27', 'Voluptates qui accusamus aut voluptatem quia.', 8, 'stroman.sally@example.com', 'student', 'true', NULL, '$2y$12$y8Lh0FqgORnHU/A4D7T6SumquKQUlJPybmzsgIHmMUuQAhHEw2Daq', 460, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(529, 'Raleigh Heidenreich', '+1.947.573.4679', '+1.386.793.0999', '3263 Cole Mountain\nIsomview, MT 23290-1441', '1975-03-24', 'Voluptatem culpa et voluptas ducimus.', 0, 'kertzmann.geo@example.com', 'student', 'true', NULL, '$2y$12$krrMtwvGCAK.o9HCqFW2Dufpwa.a8MTOFFWlJ0bxnt.tOALreBLSm', 330, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(530, 'Talia Cassin', '+1.574.940.5898', '+1 (754) 263-6602', '12038 Curtis Ranch\nSouth Velva, CO 15630-8853', '1997-03-27', 'Sed dicta nisi qui at.', 4, 'kamron48@example.net', 'student', 'true', NULL, '$2y$12$htqWx5AT1ZtHKHpjaPH3uenGvSebiXq8q78h7TdUPplL7/b1R0Ai2', 105, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(531, 'Maximillia Schroeder', '564-514-3359', '430.444.3447', '144 Isom Coves\nArmstrongville, FL 91315-1023', '2010-04-28', 'Commodi et voluptatem quasi debitis nostrum eos rerum.', 9, 'adell52@example.org', 'student', 'true', NULL, '$2y$12$NkdHP.ZahTgJc3Ibj8xJ/.AEa5I0mH6m.JXa88hrxjQZtJAANlPTu', 522, NULL, '2025-03-03 19:08:13', '2025-03-03 19:08:13'),
(532, 'Dr. Greg Shanahan', '+1.812.917.3066', '914-471-9369', '13102 Arvel Estates\nSouth Calistad, MI 73648-1362', '2016-03-11', 'Aut nesciunt et amet est eaque quis.', 2, 'xschuppe@example.net', 'student', 'true', NULL, '$2y$12$qb70H4N70iqyDxTHE0gfZOZ.EivtC9VwFCcMiYtW8iAAm6hVMG1LW', 396, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(533, 'Jamar Ferry', '321.341.3718', '(480) 840-8435', '565 Dare Tunnel Suite 278\nMatildaton, OR 03494', '1990-01-17', 'Suscipit rerum beatae quo porro et nam blanditiis.', 7, 'fschaden@example.net', 'student', 'true', NULL, '$2y$12$L9AEAj1Wgldxos225XjQWOR9kAEA3lMg9rCqaR8tVpDuUb.Uw7Y7O', 308, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(534, 'Isidro Hackett IV', '+14434736283', '+13464347602', '976 Haley Alley\nMertieberg, UT 40483-0621', '1975-01-02', 'Occaecati est accusantium accusantium porro.', 3, 'zklein@example.net', 'student', 'true', NULL, '$2y$12$Eu6UGdUpa4gkcRAtJXZXQ.6RqgWlpQaOmAsl8ew4jW0blfpoKal3i', 981, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(535, 'Dorothy Rodriguez V', '352.501.5517', '+1-551-922-3383', '230 Rylee Squares Apt. 735\nDrakeville, WA 79462', '1982-08-12', 'Dolore officiis debitis nostrum a adipisci.', 0, 'west.vincenza@example.com', 'student', 'true', NULL, '$2y$12$KP09xsYs54oAWYC1LkUzbe5hv37BnAzY1.HFfE45.26xu712NV0xi', 676, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(536, 'Mrs. Abby Runolfsdottir', '(906) 519-3508', '1-628-922-4551', '11144 Hessel Mall Suite 452\nFunkmouth, PA 52080', '2007-10-24', 'Fuga vel est rem molestias in excepturi velit.', 8, 'eleanora.jacobs@example.com', 'student', 'true', NULL, '$2y$12$ouGf6J6mR1CCmNA9nFcHROszUcqQM1okqWXNqGaBEezeOqBRMsxqi', 867, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(537, 'Vita Kiehn', '+12819005410', '+1.607.960.6115', '248 Gail Rapid Apt. 176\nLake Rodolfo, LA 55233', '2019-07-19', 'Ratione vero et cupiditate neque nesciunt laboriosam.', 2, 'andrew86@example.org', 'student', 'true', NULL, '$2y$12$9RmqHVyoY1tz8lk./ZTwsOtiEY3xrGdhogCyE9ybhkhhEsJmqb08u', 719, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(538, 'Florian Russel', '1-423-520-6906', '424-201-8997', '6901 Fadel Crest Suite 656\nPort Wilfredo, VT 26517-5533', '2018-01-19', 'Porro non ut eos et exercitationem vel.', 0, 'daniela.mosciski@example.net', 'student', 'true', NULL, '$2y$12$Xu78tUrgrQg2uW989Y7PdOqE9tQ7jQTDreQJWyCrtcRz/JtvBQFSW', 992, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(539, 'Angel Swift', '1-480-633-8019', '(469) 551-0776', '27038 Megane Island\nEast Rigobertoside, HI 00251', '2011-08-15', 'Unde rem est ipsum quos aut voluptas est quisquam.', 5, 'annette.christiansen@example.net', 'student', 'true', NULL, '$2y$12$OPvEwi2ZybsStmeSCUVP9.vMXJt95gqwRjcVRilt9Lb3CIzZKPzK6', 568, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(540, 'Jules Barrows DDS', '1-754-452-1261', '1-215-520-4904', '274 Marisa Villages Suite 084\nStrosinton, KS 67183', '1996-04-23', 'Officiis saepe aut praesentium suscipit.', 6, 'bergstrom.daphne@example.com', 'student', 'true', NULL, '$2y$12$hki.43W.fwxSmnTxuWiIMO2PNdoZVnfVN.BWl89nlKTRbuBfIFPby', 595, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(541, 'Prof. Eugene Connelly Sr.', '678.461.4704', '+1.341.218.8899', '5042 Gunner Tunnel Suite 189\nPort Rudy, ME 84483', '2020-11-06', 'Laborum vel dicta exercitationem id omnis cupiditate esse.', 0, 'norbert08@example.com', 'student', 'true', NULL, '$2y$12$.Xka4WBnrTArg6fIG24Myu5TWMT71m2Vo1lHab0Zq/RmO7/19aJSu', 214, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(542, 'Gerry Schuster', '520.415.1398', '+1 (641) 367-9488', '8768 Conroy Street Suite 125\nNorth Jessmouth, CO 32891', '1991-02-21', 'Tenetur autem blanditiis totam.', 1, 'langosh.eugenia@example.net', 'student', 'true', NULL, '$2y$12$jbs2NxogNQcG.8qOxhzssevioOZZKz96TxJGIEHDgQlT9F.vVDuc.', 412, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(543, 'Mertie Jaskolski', '+1-754-768-9029', '252-418-3949', '69889 Gibson Plains\nQuigleyport, ND 48457-0499', '2011-08-19', 'Quod iste pariatur alias totam neque voluptatem praesentium.', 4, 'reid.renner@example.net', 'student', 'true', NULL, '$2y$12$6kb8kg2N5eVbSxpBvFQEzuTERf5UAmdbYC1G7y2sWiH7VG7o5Fy9m', 153, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(544, 'Chandler Homenick', '+1.442.730.2968', '+1-781-955-4158', '64026 Brant Plain\nLake Ethelyn, DE 11116', '2018-05-16', 'Non veritatis eum quis quos error.', 6, 'udamore@example.net', 'student', 'true', NULL, '$2y$12$j3tjgExQlnkajE8kVjoEd.yk52F2FjNhPqW5KMxZL3W6FaejDDCyG', 72, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(545, 'Dr. Celine DuBuque', '310.725.7255', '(509) 722-0186', '2451 Patsy View\nWest Codyville, WI 10681', '2020-09-30', 'Molestiae a quibusdam et inventore quibusdam odio.', 2, 'dicki.dariana@example.com', 'student', 'true', NULL, '$2y$12$1vfY1WrVzwsm0Qj2IHDSNOpFFwOxhDiJQNRylRI8wU92xItCMu2tK', 492, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(546, 'Mireya Christiansen', '803-805-3723', '+1-925-823-4908', '26570 Blanda Park\nMaxport, NV 99833', '1972-05-03', 'Nulla sint nobis veniam illo vero quia amet.', 4, 'lehner.cicero@example.net', 'student', 'true', NULL, '$2y$12$2dm1d.CwG9k1huiWXfAUH.geyNXDt3je.6g1.oiMwTvZWaAHSqO5K', 884, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(547, 'Gardner Gibson', '(458) 354-4527', '828-463-6832', '971 Hoeger Islands\nWest Jasonmouth, VA 42454', '2024-08-13', 'Ex expedita excepturi est eius.', 9, 'brett.cummerata@example.net', 'student', 'true', NULL, '$2y$12$YkimsdvOfSFxDy8HLY0HI.UWFy7tUkACdr1WKX3yvPP/3agbItxnO', 347, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(548, 'Marlene Turcotte', '321.628.3801', '1-513-423-6610', '515 Goyette Mews Apt. 010\nEast Laney, OR 92040-5678', '2022-10-25', 'Repellat voluptas error distinctio quam.', 3, 'mokeefe@example.org', 'student', 'true', NULL, '$2y$12$lv8rcRhkb0ywMyF2AsW.AOVCbAetioF7j6rEdq0wgR6j4HRvFoQZq', 112, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(549, 'Dr. Boris Connelly IV', '+1 (660) 463-2383', '714.350.5208', '347 Lillian Cliff Apt. 551\nSouth Isabelbury, NY 72484-4968', '2017-04-08', 'Eum eius totam sunt animi.', 4, 'liam.crist@example.com', 'student', 'true', NULL, '$2y$12$opauCvfjLbKaK5F2bAKyAuFRll.db7vfrEUeLRPKU2m.Cxfyw0Gkm', 464, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(550, 'Jillian Kerluke', '+1-909-637-7285', '1-463-647-6178', '32358 Edna Plains\nNorth Isaimouth, AK 79793', '1977-12-03', 'Voluptas quos rerum repudiandae fugit eligendi consectetur sit.', 8, 'rosenbaum.rebecca@example.net', 'student', 'true', NULL, '$2y$12$djMnMqqWuxUD3A80wDadzeyEK4WFJV/6xoW/L5LK01FKNThJvz/vC', 394, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(551, 'Markus Bechtelar', '+13859013217', '(262) 617-4491', '745 Berry Centers Apt. 115\nWest Ethanside, NE 22257-3705', '2010-03-18', 'Quod dolorum architecto molestias est animi alias assumenda.', 1, 'lillian37@example.org', 'student', 'true', NULL, '$2y$12$QLF9hUJnDwM4DwCNvC3Dq.ubjk8VSHxjxDXD/BesN83b.IfnoIqiC', 335, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(552, 'Jerry Schamberger', '1-763-747-8564', '458.710.5013', '3759 Hessel Road Suite 540\nWest Yadiraburgh, OK 79112', '2024-10-25', 'Est voluptas quo velit laboriosam molestias.', 9, 'elvis99@example.net', 'student', 'true', NULL, '$2y$12$spQsu/lIOgHOKG6aSpMOCOpXiZDXjgJK0cKYQ1WPsdGNSidPIrQwm', 126, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(553, 'Prof. Kameron Ortiz', '786-889-0632', '+1-207-948-7300', '64788 Chaim Greens\nEast Dortha, KS 30184-2222', '2004-05-09', 'Animi ut maiores a eaque nostrum nam.', 4, 'smith.larue@example.net', 'student', 'true', NULL, '$2y$12$kd4vgSeBKw5W6ZPWlfv2Qu5I.RIzmBq/dqH0fbGFOtmVt8EiH.ZXO', 458, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(554, 'Candace Orn', '1-986-340-7351', '754-961-6033', '2081 Cordie Field Apt. 460\nLake Budside, GA 75216', '2014-03-03', 'Autem fugit exercitationem odio non id explicabo.', 3, 'oadams@example.net', 'student', 'true', NULL, '$2y$12$PV8z6WOJCeP0p7YRwWrUeOgX3znym5ErbdsXf2j/w4Og8MOiWnoXC', 509, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(555, 'Gavin Batz II', '+1-929-776-2564', '937.910.1185', '836 Yundt Mills Apt. 028\nNicolasborough, CA 95049', '2019-07-04', 'Dolorem laborum officiis aliquam quia consequuntur assumenda aut.', 4, 'jessika85@example.com', 'student', 'true', NULL, '$2y$12$MT7UFbtsuWq5vvwztT3.qOCn0i.wTceVZANTIqg4KziBbDpKtXvMi', 555, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(556, 'Allene Lind', '+1.620.398.5648', '+1-424-834-2961', '279 Violet Gardens Suite 079\nMagaliland, CT 34765', '2008-04-26', 'Omnis eligendi rerum soluta qui iusto quaerat.', 1, 'yparisian@example.org', 'student', 'true', NULL, '$2y$12$dr7K0Dx/NQirDC41V4iS8OAETsX5XpKJPRJ9VQFESnFnsxs1.Ewy2', 506, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(557, 'Elvis Pouros', '+1.740.909.3235', '(380) 258-0018', '498 Gregoria Centers\nDarrellfort, HI 97628', '2023-05-23', 'Repellendus perferendis nisi rerum ea.', 5, 'lmohr@example.org', 'student', 'true', NULL, '$2y$12$8XyzpPiHNBqQfgp.5t.qOuhOnkX1taw4XMKBptLJpVJAXS6/3l4Mu', 14, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(558, 'Taya Dach', '906-786-4611', '+1.646.327.6539', '30228 April Points\nPort Meta, MN 40025', '1989-12-15', 'Est debitis modi autem ut officia neque nulla.', 6, 'zoie.donnelly@example.net', 'student', 'true', NULL, '$2y$12$xcC8RmI3Fqlve.T1U/L8HOuZWNvICYIsNzIzIImXKhZy1KuCQPdZW', 137, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(559, 'Jack Smith', '580.807.9294', '1-463-646-8029', '996 Ernser Fork\nNew Fredafurt, IN 33846', '1992-10-07', 'Velit aut id accusantium autem.', 8, 'wmann@example.com', 'student', 'true', NULL, '$2y$12$Sr8MRDma1sRQtWnpUn.Nv.yC5Fsy.QMrd12DlLIHP7Lju2cKLZmM2', 357, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(560, 'Dr. Johathan Bins', '+16294094562', '1-626-664-2016', '24492 Kilback Fields Apt. 877\nWest Jessie, WY 19613-5480', '2010-03-19', 'Non et rerum officia ab vel.', 2, 'billie80@example.com', 'student', 'true', NULL, '$2y$12$eqa/mC6sZt5Blno.phiakOMITM18WdUuYFU4mDWiP18CyZxZCBBAy', 846, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(561, 'Mara Reynolds', '1-505-535-3799', '(385) 489-5126', '5048 Rosa Ports\nDooleychester, TN 55332-5120', '1989-09-23', 'Tempore fuga et vitae nihil voluptas labore.', 9, 'nwiza@example.com', 'student', 'true', NULL, '$2y$12$BThhogpKgoNcVqOaK1U1XeUTGmsneNxmhaXaXM5xiCI2oxcKxuKaq', 147, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(562, 'Aurelie Balistreri Sr.', '+18122249184', '775.790.5350', '643 Deontae Drives Apt. 375\nGulgowskibury, WY 81033', '1974-06-15', 'Earum id voluptatem necessitatibus optio animi vero consequuntur.', 7, 'zruecker@example.net', 'student', 'true', NULL, '$2y$12$WHQOjjKB0KVFj4kU/.tO4e2hAlDmX4ggTdOH/opKQzi4ayIF6e/v.', 481, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(563, 'Sanford Torp', '+13416284277', '1-928-961-7828', '15053 Oral Land Apt. 114\nJanettown, MI 01789', '2021-09-05', 'Aut quis magni voluptatem sapiente sed sapiente sapiente nesciunt.', 8, 'xsimonis@example.com', 'student', 'true', NULL, '$2y$12$ZYJFxNLV/5XeL1tJVyxMYuCSb3x0LetwSOD2SAPCnUbKrMimPoOgq', 909, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(564, 'Brendon Kemmer', '820.591.8562', '+1 (984) 279-7885', '92259 Casper Run\nBergeburgh, DE 30197-6682', '2003-07-28', 'Quod doloribus tenetur repellendus quia.', 9, 'gerlach.erna@example.net', 'student', 'true', NULL, '$2y$12$lMvX6as9hIOji.hgnGWZD.bTSopBHEMVcAqCC4Tos/Sa.QTErb.sG', 113, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(565, 'Emerson Lubowitz', '+1-385-990-6104', '956-450-3617', '74954 Connor Station Suite 699\nKatarinabury, OR 58049-3300', '1989-09-13', 'Placeat aut blanditiis commodi adipisci sit.', 8, 'roob.humberto@example.org', 'student', 'true', NULL, '$2y$12$wkdD3.FCD8OcFDw3seIQi.AruDpq3J./WFa5fOowH3ucHUhMh0O36', 382, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(566, 'Nyasia Huels', '+1 (984) 617-9856', '480-576-6660', '40086 Terrance Valley Suite 154\nPort Fanny, CA 82838-5736', '1979-03-06', 'Amet beatae dolores nam.', 3, 'bblanda@example.net', 'student', 'true', NULL, '$2y$12$ZvN2m1Umu4TEsi4MFCtgW.i9htRIH8JPXcZOoeQEcRGAzfvPDQ2Ue', 603, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(567, 'Edmund Trantow', '212.928.4039', '(678) 361-9599', '231 Quigley Heights\nZiemannburgh, VT 90465', '2013-01-22', 'Accusantium enim consectetur cupiditate modi unde sapiente.', 6, 'langosh.jovanny@example.net', 'student', 'true', NULL, '$2y$12$Hy6Hrdc6OuFZOR0mT9/AVu2Gnv9upX0iyx.XjQLttgvvO9ny3SVoW', 956, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(568, 'Idella Mayert', '1-832-335-2085', '1-541-373-3875', '485 Adelle Corners Suite 294\nLake Hellentown, MA 81219-6259', '2017-10-03', 'Qui eveniet blanditiis accusamus voluptatibus.', 8, 'georgette47@example.org', 'student', 'true', NULL, '$2y$12$orOSjv8zKV3LaaLh3dO71OIAMCx7oilFSaManRoOoD8sQa7S/q.N2', 30, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(569, 'Edmund Steuber DVM', '+1-830-863-0441', '+1 (361) 635-8285', '9104 Angelina Points\nWest Weston, WY 34478', '2022-05-04', 'Officiis molestias dicta reprehenderit quia dolores.', 1, 'echristiansen@example.org', 'student', 'true', NULL, '$2y$12$oitnWyeD.3jyvAeGOvWIbeGa86cfOqeBLU8bGvbduxkhbXMhwgf2e', 924, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(570, 'Kelsie Murazik V', '1-458-208-8759', '+18704777054', '90452 Mayer Court Apt. 991\nNew Thurmanstad, MD 69380-5174', '1985-04-11', 'Nihil sequi enim quibusdam sit.', 4, 'jessika72@example.net', 'student', 'true', NULL, '$2y$12$5ihOZ0L.Pz/T4eNNwoB.JOo3ulWa0A/nphYumEIpiC0GGUIu6n/DS', 493, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(571, 'Bert Heller', '+1-248-805-6064', '+1 (269) 925-0960', '79758 Towne Orchard Apt. 188\nEstelleburgh, OH 13495-4664', '2009-06-27', 'Natus deleniti id incidunt corporis delectus veritatis sit.', 4, 'mitchel55@example.net', 'student', 'true', NULL, '$2y$12$xgxikZwsI7uA6NpboWBs4eEPIVPs/M3sVNQk1/ITQzp8XjNT.QAUm', 298, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(572, 'Jaeden Osinski', '323.740.4750', '1-260-213-5011', '55401 Jettie Cliffs Apt. 705\nLake Eliezerview, OH 19655-5175', '1998-01-07', 'Architecto tempore error perspiciatis nisi.', 6, 'myrtice71@example.org', 'student', 'true', NULL, '$2y$12$3k3otNMP7kQ0qM3V1X.CY.zz/8Fv3G/3APcBJS0Hfi1bijowzzeeC', 610, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(573, 'Guillermo Labadie', '1-336-488-2426', '(312) 733-2441', '3215 Yundt Divide Suite 795\nAmeliestad, OH 23508', '1980-03-02', 'Saepe eum voluptatem iure earum voluptas nulla ex esse.', 5, 'jasper.howell@example.com', 'student', 'true', NULL, '$2y$12$ht84MH9lOY1tKqBNXS1pz.HS/f4Hcx1ryhtuTNd1d/5sXCiheVKRe', 241, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(574, 'Prof. Eulah Kulas Sr.', '+1-904-613-2378', '234.667.7387', '489 Cassin Plains Apt. 120\nHodkiewiczberg, MD 40573', '2005-05-14', 'Minus necessitatibus est accusantium.', 6, 'bernardo.kassulke@example.com', 'student', 'true', NULL, '$2y$12$.tsrUeEVI.pO/oNCtK27tOgGrIViCvIv36lo062l3DFlx8UkK5vVa', 716, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(575, 'Ms. Cassandra Feil', '+1-718-542-8182', '+1 (254) 450-6574', '855 Rowland Forks Apt. 248\nTerrellberg, NY 53409-0280', '2006-04-28', 'Necessitatibus quos fuga officia laboriosam.', 5, 'josianne.turner@example.com', 'student', 'true', NULL, '$2y$12$xbQ.1wkeGup8Z8c7KMSBvuLF0jlSWMEn5ivDSdg7FgPacKxvw8A9O', 966, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(576, 'Prof. Bria Conn', '(720) 564-2421', '872-674-5301', '5184 Jameson Shores\nRollinport, CO 64222-9883', '1991-12-03', 'Id est sed ea dolorem pariatur.', 7, 'elehner@example.com', 'student', 'true', NULL, '$2y$12$MF2ZYuO8BZXDT4taLgv3TuilVwLPh4mXOF0j8UFcSwBZ4iONUl4Se', 113, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(577, 'Eleonore Beahan', '1-520-704-4955', '423-804-0133', '655 Waino Place Apt. 370\nKutchberg, IA 70160-9338', '1999-08-08', 'Qui excepturi sit debitis aut et deserunt neque.', 2, 'ydurgan@example.net', 'student', 'true', NULL, '$2y$12$NZtSS6//PmmEpxOCnMAQteLQ3UnObYnKplPRPsy4uzh4m8CoJRcTS', 500, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(578, 'Colin Klein', '959-816-9968', '+1.559.521.3434', '11907 Towne Mall Suite 255\nPaucekstad, ME 11648', '2023-09-21', 'Laborum impedit ut sit sed illum in quia.', 5, 'hartmann.ernesto@example.com', 'student', 'true', NULL, '$2y$12$6a.XD7X28suOnXhYvwvXfO4u/XKst5HlIW261gLGpYLvSnXu3Fls6', 690, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(579, 'Providenci Rosenbaum', '+1-563-992-2567', '+1-307-471-9469', '46643 John Track\nCruickshankshire, VT 70940-0764', '2012-02-17', 'Aut molestiae est autem ut numquam enim dolorem.', 7, 'jmante@example.net', 'student', 'true', NULL, '$2y$12$kIxcqlKJWEBBTEsHxrvb9e1RBUsZQSNDXQWE5MwSR.kVfZI/I4GR6', 233, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(580, 'Faustino Rath', '(405) 923-1982', '347-941-8190', '95640 Damaris Path Suite 903\nNorth Raheem, IL 54477', '1978-02-22', 'Quo perspiciatis nihil qui voluptas deserunt sed.', 4, 'bergnaum.timmy@example.org', 'student', 'true', NULL, '$2y$12$jIGBlrNBbTJEiXTAWioLi.FBncEsuPKnv28Qu1e2aqLXhaUdpDbDe', 260, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(581, 'Tierra Stiedemann', '203-992-7616', '1-718-513-2816', '281 Pierce Ports\nZettabury, MO 31391-8088', '1981-08-08', 'Tempora magnam earum fuga et perspiciatis aut est.', 6, 'stokes.kassandra@example.org', 'student', 'true', NULL, '$2y$12$aypDtmxetnrnOGdfHRHpcO4ZeQHLVC2HTJe5xFmfjPRWu5irE2PMS', 411, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(582, 'Emelie Zieme', '+1-248-458-9143', '571.368.5189', '71035 Elenor Throughway Apt. 098\nBergeborough, PA 09370', '2025-01-26', 'Facere et tenetur voluptas ea.', 2, 'misty.bruen@example.org', 'student', 'true', NULL, '$2y$12$5FbSb2.8Z8L23BfWusQ2ru80nMBv1wkJyu.QEgvcUHCI47NMXr6ay', 997, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(583, 'Emerald Collier DVM', '+1 (720) 615-0973', '+1.361.538.1561', '164 Cullen Wells Apt. 621\nNew Blair, OR 45381-6050', '2000-01-26', 'Delectus ad pariatur quibusdam tempore numquam.', 1, 'hmoore@example.org', 'student', 'true', NULL, '$2y$12$N2/ePSaYwUP7Z0ocAP0hT.DnkesVuCNQWdz/tEdIiv1cSwztaDOBe', 146, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(584, 'Berenice Nitzsche', '854.817.1059', '1-828-844-5156', '746 Murray Alley Suite 772\nBechtelarhaven, MO 03812', '1971-05-11', 'Dolorum pariatur beatae consequatur.', 6, 'icollier@example.org', 'student', 'true', NULL, '$2y$12$JOzhhRCSJkMNfMHpUpilQenXZAoyCAUcBkjf3AGCRuvz8dWuwH9/y', 90, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(585, 'Danyka Stroman', '+19296337064', '+1 (341) 691-1537', '944 Loyce Tunnel Suite 567\nGaylordtown, VT 36134', '1987-10-13', 'Consequuntur vel numquam praesentium reiciendis earum totam.', 7, 'fred.jaskolski@example.org', 'student', 'true', NULL, '$2y$12$t2RtlRfwZJIqymZYhf7y8OWqPaJpR2s/6qgWQRdS6zcWSUGoTMo2S', 904, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(586, 'Mr. Ernie Cruickshank', '838-900-7426', '+1-423-269-0390', '476 Reid Fall Suite 230\nWest Sanford, CT 04594', '1995-02-28', 'Corrupti dolores repellendus optio excepturi occaecati.', 0, 'imani27@example.com', 'student', 'true', NULL, '$2y$12$CCmnT92h.OeNLUDjG2F.pOdzLWElgBINOYuJCPNqbUY4psYYYx8eO', 467, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(587, 'Layla Bartell', '1-575-957-7217', '+1.854.884.3472', '6596 Makayla Coves\nLake Chesley, WV 99355-8599', '1993-01-25', 'Voluptatem accusamus voluptatem reiciendis et enim voluptas tempore.', 2, 'wiley.kshlerin@example.com', 'student', 'true', NULL, '$2y$12$QAAawgUSicx1So8Af8G7Y.H3r.TsihY0M/UR7fDJ4aRoosxg/0hnu', 820, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(588, 'Ted McCullough I', '432-261-4205', '351-998-7587', '7272 Daphney Island\nNorth Waldo, CT 42329-2410', '1981-09-24', 'Inventore dolorem officia sunt praesentium id ut quo.', 9, 'fhauck@example.net', 'student', 'true', NULL, '$2y$12$ox0obqmdWc9Zok5LD02z7OR5V0LIAZdCfUn6zgE2JeGYVszp.KqKC', 878, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(589, 'Mr. Leone Vandervort', '747-648-2167', '(318) 555-1773', '2893 Wiza Mount\nHarrismouth, WV 13289', '1979-01-05', 'Aut molestiae alias praesentium non aut id.', 7, 'euna13@example.org', 'student', 'true', NULL, '$2y$12$LH86mzgltJyLjBwrkGLhE.ZrdPNDOTZ1Uoar/qRmMN4cYVx/J09fm', 220, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(590, 'Salma Ondricka', '(910) 284-4409', '+1-641-641-0552', '4603 Bode Shoals Apt. 336\nWest Marianaport, LA 02004', '1996-09-09', 'Autem sit ipsa et nemo.', 5, 'anibal74@example.org', 'student', 'true', NULL, '$2y$12$oF7spp62nZ0RsgooHazwSe4OpnLUGOxFRxbIdHjf8ETJGOEsuv4u6', 838, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(591, 'Mandy O\'Conner', '1-248-469-1305', '(986) 901-9308', '45926 Torphy Loaf Suite 970\nNorth Ena, WI 47615', '2018-11-08', 'Esse enim voluptatem nobis dicta voluptatem voluptates qui.', 3, 'alexie42@example.com', 'student', 'true', NULL, '$2y$12$1/6gCjafG1sAsVuG34qSy.mfpSoUTBgGN5ECzEXl65bEFFcdeT0PG', 773, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(592, 'Johnson Krajcik DVM', '+1.269.285.6511', '+1-215-796-1085', '572 Torp Club\nBarrowsview, MA 94564-9264', '2005-10-05', 'Ea fugit non voluptatem ea voluptate nisi.', 7, 'freida.predovic@example.org', 'student', 'true', NULL, '$2y$12$bRYCttnLvCJDLpVZhqKPK.j6Rrym/WFYy7J7fBO53nuzYZBm4QeTC', 650, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(593, 'Dr. Arne Robel DVM', '865.294.6543', '1-479-222-4160', '71472 Schneider Manor Apt. 787\nPatricialand, ID 26807', '2011-07-07', 'Sint nemo in et nulla aliquid.', 5, 'gage.hahn@example.net', 'student', 'true', NULL, '$2y$12$nKDfPaizs.CI2lrw7JirUeS4E0wN4f.nwg0wGXa9HfIA0.Nz5KcXi', 137, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(594, 'Clementina Braun', '+1-240-383-1906', '667-585-2448', '5337 Connor Curve\nEast Jodieton, MI 82654-7432', '1979-12-24', 'Iusto voluptatibus itaque odit enim quo eaque perspiciatis.', 9, 'ykeebler@example.org', 'student', 'true', NULL, '$2y$12$XwlPNWoJwGThUn5v0dx6zuX0VDgkqjOfuLEeA9HzVmHwdU6bqgEeS', 247, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(595, 'Mr. Sofia Gutmann IV', '+1.636.370.8411', '267.462.6734', '889 Jessika Glens\nRunolfsdottirberg, NV 86462', '1992-05-02', 'Sunt cumque esse aliquid praesentium.', 7, 'ugrimes@example.org', 'student', 'true', NULL, '$2y$12$VLcIfwvpNHhdnUQwWhKmm.p5EdCM9oJgu7BvaXue.Gad0xmPMJm2C', 765, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(596, 'Prof. Carrie Kemmer', '469-834-1474', '838-351-6638', '21372 Stark Prairie Suite 142\nJacobshaven, WV 94080', '1974-11-01', 'Eveniet voluptatibus quos et voluptatem cupiditate voluptatem.', 4, 'orin.sauer@example.org', 'student', 'true', NULL, '$2y$12$pCe8b8B4bBUE5I5mkiQv9u19Exd642rCF7l704o.sOE/WFDxj7K9a', 263, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(597, 'Mayra Morar', '1-669-927-3524', '657.241.6718', '82494 Keshawn Neck Apt. 040\nMortimerbury, CO 87806-2915', '1986-10-01', 'Sapiente voluptas non ratione velit quos.', 4, 'crooks.alek@example.org', 'student', 'true', NULL, '$2y$12$RZpp1kWNqCGeFBaTs/ohBOeXMF1xKxI/iW7KY1FXg8BWWOLGReaie', 891, NULL, '2025-03-03 19:08:14', '2025-03-03 19:08:14'),
(599, 'Nettie Hirthe', '(504) 719-7307', '1-979-536-4228', '460 Deckow Parks Apt. 397\nFeestview, RI 37245', '2018-07-07', 'Dolores sint numquam eius asperiores quo eveniet.', 7, 'quitzon.leilani@example.org', 'student', 'true', NULL, '$2y$12$e/85euVOp9kktNOpsfy88urbpYEOWydF0y3pBqmcEyGAz1KSpcziS', 924, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(600, 'Vito Blanda', '+1 (234) 922-6939', '+1 (681) 602-5041', '4046 Predovic Islands Suite 204\nSchadenstad, TN 06729-3779', '1995-01-14', 'Nihil est vitae et amet sint alias dicta.', 2, 'schamberger.carmelo@example.net', 'student', 'true', NULL, '$2y$12$7KiDowqgsAEGg8r0jyqKV.PHGDjbwV9xPD8fD6lEixE6HUyyFOu22', 811, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(601, 'Prof. Anita Wintheiser DVM', '954-858-9747', '919-251-1205', '865 Rhianna Manor Suite 922\nHintzberg, AK 40546-2007', '2005-10-19', 'Impedit sunt qui architecto quia perspiciatis cumque et aut.', 7, 'israel.bechtelar@example.net', 'student', 'true', NULL, '$2y$12$K7ImSxy7D2HunGl15NdNEetAQ7g./5CbNPJr85wqLQ4IOY.VHU5C.', 179, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(602, 'Clark Haag Sr.', '404-681-4790', '+1-757-636-0749', '3232 Elvie Ranch\nWest Kennedi, KS 60603-2404', '2004-04-24', 'Enim necessitatibus veniam tenetur.', 3, 'maggie11@example.net', 'student', 'true', NULL, '$2y$12$2eSCBJ0G9B.T/elaihYfh..wLzcfn4BPqgVQ3L3eSZPOjpPXDtncC', 345, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(603, 'Ivah Upton', '+12489159016', '(573) 786-8922', '55146 Samanta Summit Apt. 215\nSouth Wilhelm, SD 82767-5760', '1971-03-15', 'Et quas facilis repudiandae consequatur aut.', 8, 'reynold.larkin@example.com', 'student', 'true', NULL, '$2y$12$4Gxe9zJIoiUwnbcTMaIDouXL615SEUuBiRvOryYt9gCEaqBJqhglC', 227, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(604, 'Keeley Ullrich', '+1-801-491-0218', '+1-503-351-7207', '19237 Emelie Passage\nBaumbachchester, PA 64851', '1996-11-01', 'Quam dolorum in nostrum quis.', 9, 'kling.brody@example.com', 'student', 'true', NULL, '$2y$12$dYMPvFZiFOCaDCE.TOuaI.NUwytuNhgZarpcRzIVaBZuT3.sjJC1K', 253, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(605, 'Prof. Arely Rodriguez DDS', '260.465.6422', '339-591-8062', '798 Adela Village\nWillmsburgh, IN 55223', '1984-07-04', 'Hic numquam numquam sunt.', 8, 'quinten89@example.net', 'student', 'true', NULL, '$2y$12$V5KWTcqvcR1XMjIVbP5OYueFH.w1MhN9sKNYlq7dmnGtmRUbbUeIe', 388, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(606, 'Marcelle Heathcote', '865.200.7850', '(657) 313-9232', '11835 Stokes Flats Suite 816\nNew Leatha, SD 49185-8856', '1972-02-26', 'Repellat ut voluptas quo atque exercitationem.', 8, 'herta.olson@example.org', 'student', 'true', NULL, '$2y$12$uloh1YXoseaTHW5sYoi3oej9E535AKqk34jt54EcHTQ9iADtKH.Ci', 911, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(607, 'Sister Gutkowski', '+18454805968', '+1.646.397.7363', '78451 Hansen Viaduct Apt. 014\nSouth Camilla, CT 47406', '1971-06-03', 'Sit et sint eum tempore et consequatur.', 4, 'brando92@example.org', 'student', 'true', NULL, '$2y$12$sazDTChfgsANZoFbM8XlpeVMnlHDu/j1.odW5h6xoNrAm9jm9md4a', 730, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(608, 'Maeve Kreiger', '+1-726-715-9277', '1-661-846-7970', '10536 Considine Wells\nSouth Rahulshire, MS 28121', '1994-12-30', 'Cupiditate aspernatur est qui.', 1, 'hansen.ebony@example.net', 'student', 'true', NULL, '$2y$12$k9o9YWxrphoXdI7qYknFcOAerJtdRb7YCwE.5uN3ysGr2Xjz8TyvC', 115, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(609, 'Tabitha Veum', '+1.231.570.8801', '+15752415286', '5266 Graham Village Apt. 216\nElnoramouth, ID 71892', '2023-01-11', 'Est minus sequi perspiciatis sit.', 9, 'neal68@example.org', 'student', 'true', NULL, '$2y$12$QW/L7cPFyldX9kka8pWdh.DPcZEG.Wkfo1PQ1x0AHD9mW83hC8Nzu', 405, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(610, 'Lafayette Murray', '+1 (415) 810-5064', '+1.845.721.8777', '928 Audie Overpass Suite 946\nWest Delphiafort, DE 88689-0175', '2001-05-16', 'Eos quisquam alias sed aperiam ratione rerum id dolorem.', 3, 'alisha.damore@example.com', 'student', 'true', NULL, '$2y$12$L9m4ZCvD57WhsGlu3jDMsONGowMKTeavFco6Q6kCYgOFu4Okp6JiW', 356, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(611, 'Brady Harris', '(575) 936-2264', '+1-240-782-1868', '81984 Bradtke Groves\nFriesenborough, LA 84951-9953', '2010-07-31', 'In fugit pariatur in dignissimos.', 7, 'mallie.blanda@example.org', 'student', 'true', NULL, '$2y$12$4FYA5dfEf8ZaPRa6T7PrGuG04TRSmSP2BUoumjRMZ5ouOdcugo4Ey', 43, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(612, 'Dina Nolan', '828-368-1031', '+1-440-996-8709', '349 Reggie Road Apt. 544\nNorth Louvenia, VA 97491-5596', '1983-08-20', 'Similique dignissimos voluptas ullam quam.', 2, 'rtorp@example.net', 'student', 'true', NULL, '$2y$12$nKq3bL26fOs.cBLcBvSQru.E.I6ZEBPJ/rH.hxonfLXoFfh3hGQ0W', 735, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(613, 'Aric Carroll', '+1 (305) 472-7788', '+1 (530) 334-2661', '340 Curt Fall\nNew Theresiaborough, GA 41575-2908', '1984-02-24', 'Eaque dolorem rerum modi molestiae.', 9, 'burnice.simonis@example.net', 'student', 'true', NULL, '$2y$12$H8KRcO4Fok4iTtAFbqQzburRHWCnEo5TkfciF2fBfoYTzQVuyO7bK', 523, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(614, 'Brandyn Volkman', '(218) 674-6060', '337-521-6862', '96320 Kaitlyn Canyon Apt. 104\nNew Robin, WV 52690-5710', '1971-06-01', 'Maxime eveniet eos occaecati laboriosam.', 7, 'aditya80@example.com', 'student', 'true', NULL, '$2y$12$VwWsYIdicxbmFZ9tNpiP/eQdNeajR.MSAgdFVnrGE/Xb9Rks7MaAq', 645, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(615, 'Gideon Von', '(516) 900-5337', '312-753-4675', '813 Celine Spring\nEast Kaelyn, NC 96726', '1976-09-01', 'Iste quis rerum non.', 6, 'leslie40@example.org', 'student', 'true', NULL, '$2y$12$DXPVFHJvvRH0a04LXJn5vePSIiZ0z2xsszbZm3nrymm8rVA1KBQx.', 64, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(616, 'Jacinto Muller DVM', '+1-248-417-6117', '+1 (319) 364-5515', '591 Roderick Pass Suite 699\nReillyport, MI 64996', '1971-04-26', 'Pariatur corporis quia corporis repellat.', 8, 'misael32@example.com', 'student', 'true', NULL, '$2y$12$IDPyd8ExETmd4BPJcQGWMeuYrakQ6QjxbDPiquhV/8kc7moluUtsq', 574, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(617, 'Makayla Ankunding', '+17573880378', '845-664-5526', '2505 Cedrick Place\nRosalyntown, IL 70256', '2003-12-03', 'Eum tempora non ut esse sapiente officia ipsum.', 2, 'hayes.ashleigh@example.org', 'student', 'true', NULL, '$2y$12$i0GaqUYraGJljnDBV5BxDeGRU/2inAbNLB20WL8cJyCYaJtMPxwnO', 968, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(618, 'Kaela Quitzon V', '878-616-6362', '380-843-7623', '8074 Elsa Divide Suite 388\nHicklemouth, SD 81006', '2011-10-13', 'Rerum neque et quia.', 5, 'kane.conn@example.org', 'student', 'true', NULL, '$2y$12$3n0CfkvP70ODeDhPiR2TCu4VF9raSUV5zJlxCTJeiq8zkjoAWm6mq', 324, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(619, 'Leda Nienow', '+13213388259', '+1-248-289-0965', '7873 Kulas Roads\nLake Pierceview, ID 91475-7456', '1997-12-05', 'Voluptas voluptas qui et natus.', 3, 'qhahn@example.net', 'student', 'true', NULL, '$2y$12$tbsD8u2l6oameVIOMGwB3uw52LDuLGL4F9iYRWiTq.RVcQUX9eMMu', 343, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(620, 'Mr. Dewayne Gutkowski', '+1.973.757.5514', '+1-614-849-1218', '6199 Lucas Trafficway\nMicahstad, SC 32728-8850', '2011-10-27', 'Est rerum explicabo explicabo doloremque odio est dolore.', 5, 'nkunde@example.net', 'student', 'true', NULL, '$2y$12$QVJlvM3retprXbCx5QgZDujr9e70S1LYNIZWEaj2RCAIA32F35WSW', 770, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(621, 'Abner Breitenberg IV', '920-903-5796', '760-512-2714', '919 Russel Circles\nSiennabury, OK 05383-6120', '2004-06-12', 'Aut ut id quaerat totam assumenda voluptatum reprehenderit.', 5, 'dorothy.heller@example.com', 'student', 'true', NULL, '$2y$12$QV4MjgsiCPeF3S/ZmKHqz.AhhDdBKIY2i6aaU9AYulejiAo9iOt/2', 504, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(622, 'Brown Mueller I', '480.646.7992', '(501) 213-1491', '84278 Dean Divide Suite 049\nWest Pasquale, OR 73885', '1981-05-16', 'Unde necessitatibus quia porro recusandae quaerat explicabo nihil.', 3, 'madisen.stark@example.org', 'student', 'true', NULL, '$2y$12$wEzZktOa00.WgOdSnfhZSe1Gig.2Jgd6USKV7rr/E8y3st3ItEVMy', 930, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(623, 'Bennett Hintz', '1-458-858-0723', '+1.828.816.5284', '797 Dimitri Summit Suite 850\nHershelborough, NC 19898', '1998-04-22', 'Quasi inventore dolores sapiente libero.', 9, 'coby.mertz@example.net', 'student', 'true', NULL, '$2y$12$kq4E3uY8wEFu4ZOajoOBI.KMTl9f0rMKneKZmTFbZDlT3Zd32cQR.', 806, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(624, 'Dr. Buster Ratke V', '+1-385-285-5480', '865.787.7771', '7683 Kassulke Port\nMertzburgh, PA 22524', '2002-02-26', 'Iste animi non aut adipisci dicta aut laudantium dicta.', 3, 'jarred.glover@example.org', 'student', 'true', NULL, '$2y$12$v5rJoVHa1h6rmQElAUXB2.flBJK6TVK3hpor9aUhIXdoR/9UBFz/i', 974, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(625, 'Mrs. Dianna Krajcik', '541-263-6191', '424.456.8952', '655 Schuppe Mountains Apt. 531\nHankfurt, NC 94983-1929', '1976-10-04', 'Rerum omnis ratione aliquid.', 3, 'dax.ryan@example.com', 'student', 'true', NULL, '$2y$12$UDBSvT0jg46eUUqGPIVoaeDwtyQSGYxpoEk8ran5mpqUxgPV9BNiG', 646, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(626, 'Lauryn Renner', '636.627.0640', '+19064600128', '325 Lesch Cape Suite 532\nPort Merl, CT 70356-1492', '1973-08-23', 'Quidem ipsam iure dicta doloremque iste.', 6, 'parker.easter@example.org', 'student', 'true', NULL, '$2y$12$EVbk5hJ.A9z.IuCC0u1HMeHxByDdbtncBMaQpsixN0Ck5nkUKiGou', 584, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(627, 'Mr. Clifton Smitham', '+16066105662', '+1-740-925-1132', '3902 Callie Stravenue Apt. 391\nSouth Vernie, LA 49521-5053', '2004-04-15', 'Reiciendis nemo adipisci a nostrum quasi delectus labore.', 7, 'jane46@example.net', 'student', 'true', NULL, '$2y$12$4NwcOzdDqd2KpMvvKBGX6uxrFEh02pn5m1xPwDuMThhblyKpMg15W', 412, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(628, 'Jena Streich DVM', '1-562-984-7281', '+16414802925', '57757 Terence Harbors Suite 330\nNorth Remingtonton, ID 05020', '2001-05-15', 'Sit distinctio ut accusamus ut asperiores nisi voluptatum.', 2, 'auer.ova@example.com', 'student', 'true', NULL, '$2y$12$iTlb.fX4UDGXyIzbFiSeTuIlCACTz5mncwEhHKUR.86vpJJ5BfcJW', 805, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(629, 'Jacques Towne', '+1-531-548-6850', '+1 (413) 499-8432', '8698 Bruen Square\nBaumbachberg, ME 17093-7045', '2025-02-18', 'Non repudiandae id consequatur molestiae.', 5, 'asa.kihn@example.net', 'student', 'true', NULL, '$2y$12$tI8GlL0ndfNOvJ9/lRLN5efCp9Rc6u1qEMZXzT/9Alj9SDjrkKUyy', 269, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(630, 'Alyson Reichert', '+1-646-773-3103', '972.786.0654', '8176 Andre Place\nKatelynmouth, CO 71875-0318', '1974-06-04', 'Sint fuga enim autem commodi numquam quas doloribus necessitatibus.', 4, 'bode.krista@example.com', 'student', 'true', NULL, '$2y$12$S3FnjfLvpDLh5EvAOEqbWeKEGXGhAleuYPru0m5Ej.tr2rrvF0tBG', 385, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(631, 'Cydney Labadie DDS', '(502) 478-3733', '508.580.4836', '84958 Rickie Dam Apt. 889\nNorth Ron, FL 78021-9841', '1975-11-11', 'Cupiditate voluptatem qui rerum dolorum fuga ipsum.', 1, 'kelton.renner@example.com', 'student', 'true', NULL, '$2y$12$nCk.Xgi5Q5QtuEyGcbemsuljalx122UTUwFjP1F2vlCYkGjM4.zPm', 287, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(632, 'Allie Ward', '1-818-913-9953', '1-310-962-9286', '95481 Kohler Way Apt. 803\nNorth Nona, MN 98089', '1993-01-25', 'Quis beatae sit aut consequuntur et vel explicabo.', 9, 'sleannon@example.net', 'student', 'true', NULL, '$2y$12$tzmJNPouzEWszNPpOV0MEeP7P2Eb9U5/qob8dKDS/zImkWIazsQNq', 968, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(633, 'Prof. Jaylan Lynch I', '+1.541.693.4645', '878-616-3839', '3660 Nitzsche Crest Apt. 689\nWest Savannah, PA 32935', '1997-05-02', 'Enim distinctio dolores sed quos qui aperiam.', 9, 'fay.cornell@example.org', 'student', 'true', NULL, '$2y$12$.oeXlbI7z0qLuJTICeR00.auvT9OgFu/6Cif1HOoGl6.4r6Kc0WDS', 408, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(634, 'Krystel Johnston', '1-283-243-3614', '+16176779424', '4721 Estevan Estate Apt. 210\nWest Yoshiko, IL 88782-8047', '2020-06-08', 'Nostrum non amet sint officia.', 4, 'reuben64@example.com', 'student', 'true', NULL, '$2y$12$lJTRIxPYIG6bYXY4ikKMRODaUCfj1DaWPTfgEB9iUi.6KtOTp44gy', 729, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(635, 'Antonio Rau DDS', '+18304800770', '+1 (949) 793-5587', '730 Eryn Corners\nNorth Palma, GA 24741', '2011-10-25', 'Omnis facere numquam id cumque non.', 8, 'whessel@example.net', 'student', 'true', NULL, '$2y$12$8sP3wHmZic0GcZw3GA0q7O7dqUlOgLVM3nKTp.I6vXo5ci1UJLPry', 609, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(636, 'Ole Crooks', '1-816-331-8861', '1-351-408-1176', '143 Eva Spur\nDibbertstad, DC 35019', '1997-11-17', 'Recusandae quaerat nihil reprehenderit ut reiciendis nobis animi odio.', 7, 'kautzer.jana@example.net', 'student', 'true', NULL, '$2y$12$KADpaycb3Qww7Wxty4sjAOLBCcP5BDSqm1AwfBFDg.jz5WonHtxJ2', 20, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(637, 'Sabryna Bahringer', '1-458-839-3773', '(337) 417-0945', '7258 Laurel Brook Suite 161\nLake Blaze, ND 55654', '2016-07-14', 'Aut sunt perspiciatis culpa sit dolorem.', 2, 'jaqueline.brakus@example.com', 'student', 'true', NULL, '$2y$12$BJsf/Oy5RtY0MYoaEuosSu0n/z3jMoH7dgGWJk2W8ji5jctfaDtBG', 777, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(638, 'Bernie Schneider', '+1-845-569-2540', '858.878.8769', '582 Margarett Burg\nEast Bette, AR 24563', '2016-10-01', 'Beatae aliquam cum veritatis aut et ut inventore nemo.', 5, 'melody.wunsch@example.com', 'student', 'true', NULL, '$2y$12$.GkUe20ZnOMLAEnmH82UAORGgGksBC.Yq4mNeMD0KHTqpQl6cs/9e', 988, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(639, 'Dr. Eugene Veum', '+1 (401) 376-4871', '607.759.0169', '73209 Terrell Estates Suite 855\nFunktown, AK 40133', '1993-07-25', 'Vitae explicabo et dolorem est magni.', 6, 'jarvis06@example.net', 'student', 'true', NULL, '$2y$12$vielXX.JDC6eO5e1lBfLLu6jwri4DXn/2w7Izj2dznaWYsBticRb2', 384, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(640, 'Joel Lindgren', '+1 (602) 695-5215', '+1.440.277.6815', '92409 Bauch Cliff\nMedhurstbury, WY 40497-9082', '1985-06-29', 'Hic aperiam et quo unde beatae atque pariatur.', 6, 'demario95@example.org', 'student', 'true', NULL, '$2y$12$U/m8ReOcacdL7/4vDam7tuSRJtgL6tJDYc/rtOw3RK7QRFD3wjQ6i', 859, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(641, 'Prof. Kory Wolf DDS', '(351) 551-2628', '(757) 651-4518', '93946 Shirley Forges\nFerryshire, MI 73356-6579', '1995-06-11', 'Fugit rem commodi accusantium et.', 9, 'stehr.scottie@example.org', 'student', 'true', NULL, '$2y$12$pT.wyuAlAB9DpmPvUBYRhet7RpugLEdVjzeSX3xAeyxq2Dkb.7WFG', 964, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(642, 'Mrs. Freda Kessler Jr.', '+1.516.470.7388', '+1-541-894-3435', '150 Prosacco Squares Apt. 885\nEast Jordan, VA 08986', '1985-12-12', 'Nisi distinctio similique pariatur quidem.', 0, 'krajcik.eduardo@example.org', 'student', 'true', NULL, '$2y$12$vXpQpaulkCrTIoi55laXDuncoOr9qKXdEJr5o3tUJblCnNShAIkyO', 835, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(643, 'Leonor Heidenreich', '+1-207-637-5004', '252-495-9062', '73786 Eino Trail\nPort Jerome, MA 77938', '1972-08-28', 'Et molestiae qui a omnis rerum accusantium.', 6, 'angelo89@example.org', 'student', 'true', NULL, '$2y$12$zz1mmDVVN.8MI7jndgRCX.V.FgNp43cLuVaFQkHjyI/iqOaTxFivC', 449, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(644, 'Miss Pat Rolfson', '920.698.3652', '1-747-283-5083', '9959 Ezekiel Drive Apt. 177\nSmithamstad, TN 19998', '1995-12-18', 'Voluptatem quod quisquam praesentium quaerat sed.', 7, 'mante.sean@example.com', 'student', 'true', NULL, '$2y$12$ZaN/FCyTs4YoDP73enwkmeO/DNKUzXsyATGUnZ9KCNfC9H8zJ4W9u', 503, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(645, 'Hayley Marquardt', '+1-351-968-2005', '772.536.0228', '133 Milton Points\nPort Enidview, MN 98415', '1982-08-01', 'Ut quod aut odio minus natus maiores voluptatem.', 0, 'rogahn.tyreek@example.org', 'student', 'true', NULL, '$2y$12$JKLsA2Ej4TR5um9gfvFJje89SItCGvPJdp9c2PyKmULYJCmDsrpFW', 281, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(646, 'Jarod Ortiz', '478-473-8913', '+1 (332) 534-0186', '6818 Bernier Squares\nLake Rigobertoborough, UT 01724-5644', '2021-04-07', 'Dolore dolor sit fugiat excepturi perferendis.', 4, 'wkoch@example.com', 'student', 'true', NULL, '$2y$12$sqEPMlo9MOur4XDnKhBOg.t1/eyzj.hzQrLQFMU4V3Vk1Piw.ZwmC', 794, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(647, 'Mrs. Amy Bruen', '321-783-0643', '+1-743-551-2433', '970 Cristal Light\nScarlettland, ID 86001-4965', '1997-02-27', 'Aut a doloribus quaerat quam amet.', 6, 'dsatterfield@example.com', 'student', 'true', NULL, '$2y$12$PeBag2.nEa2rMNWqMgprPOr95plPAZPBCmHpw5sCXaOLHp23hfJji', 728, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(648, 'Keanu Klein', '(559) 764-3620', '640-538-9757', '1704 Kulas Corner\nNorth Brettmouth, NJ 21433-4796', '2006-04-23', 'Non nihil deserunt ab possimus.', 4, 'labernathy@example.net', 'student', 'true', NULL, '$2y$12$rGLR5WTLVHD1qph8Y.eiv.8HG1TmWGRip1o.nSIu7L2oWxSsrRNQ6', 124, NULL, '2025-03-03 19:08:30', '2025-03-03 19:08:30'),
(649, 'Dr. Wayne Murazik V', '+1-858-852-9017', '+1 (218) 870-0342', '628 Bradtke Station\nPort Sunny, KY 36508-0186', '1994-07-02', 'Aut dolorem et perspiciatis enim omnis.', 5, 'dedrick.brakus@example.org', 'student', 'true', NULL, '$2y$12$BEjA6hRDppf7QOMdB8b3w.DMLC8lptKmFjVP8/qO/SpLGjT9eJL8O', 291, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(650, 'Lavonne Nikolaus', '+1-575-251-9306', '(484) 446-2386', '83169 Jean Parkway Apt. 357\nFishermouth, MO 38728-8944', '1986-07-09', 'Quis quam ex consequatur labore.', 1, 'daisha.tromp@example.org', 'student', 'true', NULL, '$2y$12$zEgF/uuJWG67l.WKQntRtOHl0fDzZu5SKok6bTY0MnCRqBnjDYrfS', 114, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(651, 'Madisyn Hills', '769-944-8523', '+1-574-592-1892', '132 Estella Tunnel Suite 282\nSouth Allieburgh, TN 16364-5209', '1970-03-04', 'Recusandae dicta dicta sint.', 1, 'walter.oberbrunner@example.org', 'student', 'true', NULL, '$2y$12$fdmoM563gkrjI3iMroioF.HfxPeDTzkjN0gOsqFrCM5sDbeQwuJAu', 240, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(652, 'Savanah Lang', '+15043000730', '+1-619-270-6765', '217 Nicolas Causeway Suite 098\nRodriguezshire, NH 25592', '1990-12-27', 'Eum neque odit voluptatum sapiente veritatis laudantium ex.', 4, 'nterry@example.net', 'student', 'true', NULL, '$2y$12$Jxm8a9n0yzvBz3BawkkbqOF.FP52KIqNYP2ybHm7dWhp25.3wDffe', 121, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(653, 'Davon Collier', '1-385-277-7292', '+14633546856', '62533 Noemi Springs Apt. 173\nSouth Lambertton, CA 02881', '2003-05-10', 'Fugit aliquid quis quod deleniti.', 3, 'annamarie.gorczany@example.com', 'student', 'true', NULL, '$2y$12$eVzExhdhGU5mgu7WCw0B5.J1Iejv7BaFgDoUUg.dzcFopESPP/pM6', 858, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(654, 'Mrs. Sylvia Stoltenberg DDS', '+19562583898', '678-796-2838', '84132 Ernest Lock\nHesselborough, MI 42068', '1978-04-16', 'Sed sit et veniam magnam quo consectetur.', 3, 'haag.yasmin@example.com', 'student', 'true', NULL, '$2y$12$1nYSVXBvu6nglpTkb9OjWe6nnCaEWbwVmc82TiIEznOPKiIBUTvoe', 16, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(655, 'Isabelle Boyle', '+1.251.345.7026', '+1-971-967-7742', '1477 Alysson Via Apt. 781\nSouth Altamouth, NV 13843-5565', '1981-07-01', 'Quos repellat officia itaque recusandae consequuntur qui.', 9, 'von.santa@example.net', 'student', 'true', NULL, '$2y$12$xNEeYcMEX0v4GRQfgTPsWe/LhnazIcqD3MiOOimgUUcdl93DFH8wa', 620, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(656, 'Aron Runte', '+16822108419', '(978) 217-4995', '300 Therese Mountain\nNorth Malachihaven, GA 23611-8029', '2010-06-08', 'Occaecati modi placeat nesciunt amet nostrum nobis excepturi.', 0, 'gage.effertz@example.net', 'student', 'true', NULL, '$2y$12$HEOfDlazmStOYvrDXF91Uel.V4SyTdbc91xn8lbp0sEeowfkIt8ne', 285, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(657, 'Dr. Mariela Smith I', '+1-229-267-2386', '813.350.0338', '56151 Diego Inlet\nDellside, AZ 88221', '1979-11-17', 'Recusandae consectetur molestiae alias commodi inventore ipsum repellendus.', 6, 'efeil@example.com', 'student', 'true', NULL, '$2y$12$xtjhYaHQ0DlzDkfVF/blW.lhODjBwOQLSvx4ZskJ1kQW7Mx.TfwSu', 720, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(658, 'Mr. Burley Reichel PhD', '+1.463.721.1214', '201-536-9046', '91502 Guy Mill\nEast Kristinabury, DE 85485', '2000-07-07', 'Aliquam occaecati et et in.', 0, 'naomie71@example.net', 'student', 'true', NULL, '$2y$12$sk.ix4Of/ltbkI1fvLJztul/vxaRbU16lnFgc48ZRZXMlQj6XPxDK', 572, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(659, 'Mr. Roger Buckridge IV', '1-605-216-3450', '+1.352.251.6248', '945 Powlowski Plaza Apt. 545\nHoppeside, NM 36804', '1976-06-21', 'Quae adipisci temporibus adipisci voluptatum voluptate odit corrupti.', 1, 'schneider.jonas@example.com', 'student', 'true', NULL, '$2y$12$MjQWGMvJ9yde2eye0wky7uaTQPmqKEc5cqv74EdJnbYHvbroFIgCS', 196, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(660, 'Mr. Hilbert Kessler MD', '(678) 340-9150', '747.200.1527', '321 Luettgen Center\nHackettchester, OH 48462', '1977-02-26', 'Consequatur molestias voluptates voluptatem soluta soluta sit porro.', 7, 'frederick.morar@example.com', 'student', 'true', NULL, '$2y$12$iBKjn6LylVFHgF18N0d6VucM.LJSm6ynVzc2AMtF2jHcr1n2nsMKK', 50, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(661, 'Norberto West', '1-463-789-8527', '(380) 726-9965', '2248 Murray Run\nNew Zacherytown, CA 06069', '1980-02-11', 'Minus expedita placeat enim ea.', 9, 'rachel.macejkovic@example.net', 'student', 'true', NULL, '$2y$12$pdim7khWNTUQIkaZD77gR.F633H5sn1zoelwldyhFdj6A6EYK4GuK', 680, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(662, 'Else Kemmer', '1-878-775-6501', '+13859074516', '8109 Christopher Court\nNorth Maynard, AZ 59089', '1980-05-09', 'Dolorum possimus aut et ratione sint quibusdam.', 4, 'sonya41@example.org', 'student', 'true', NULL, '$2y$12$IY1CuoqauW8baezJrt4hYuObQjckDlqsQ8flbYkYn4.w9DzcgDiLK', 290, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(663, 'Dr. Kellen Rolfson', '+1-571-559-4305', '(445) 773-4837', '704 Raphael Greens\nYeseniafort, LA 12588', '1997-04-17', 'Alias non est sit debitis.', 6, 'denis66@example.com', 'student', 'true', NULL, '$2y$12$TX37dvHNi5IKmzNvDjME0OXc2pvZvJks6TKzG3l3JzunMi6p96IHW', 484, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(664, 'Mr. Dane Hackett Sr.', '714-420-2042', '+1 (620) 540-0610', '2035 Graham Court Suite 344\nSherwoodville, HI 31022-9113', '2017-09-19', 'Harum magnam mollitia id culpa.', 3, 'hwaelchi@example.com', 'student', 'true', NULL, '$2y$12$rOtRZPxENwOx.cHs/GMaJevFgghwav1iJFDEf2B2s30fLWH758KAO', 65, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(665, 'Dr. Abby Koepp', '725-583-7183', '661-255-2022', '5953 Garfield Square\nSouth Helmer, VT 67662-7638', '1985-07-30', 'Accusamus voluptatibus voluptatem qui maiores mollitia.', 4, 'roberta.lowe@example.com', 'student', 'true', NULL, '$2y$12$mXu0VWWEhrHgEuORRJKnlO716L4D1x5deoT00oKArJQUpRfe4GCWW', 402, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(666, 'Ms. Ernestina Leuschke', '(305) 974-5889', '1-631-754-5529', '1500 Hauck Mountain Suite 486\nWest Madaline, RI 43066-0580', '1996-10-10', 'Molestiae dolores consequatur ratione nisi.', 3, 'garret.anderson@example.org', 'student', 'true', NULL, '$2y$12$xu3PAbHinCJjPsFVBsGFcuFhFYlAk8eRkuy6Qv5zmsbDDiyOIvdRm', 774, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(667, 'Garth Veum', '+1-276-721-1635', '540.709.7903', '3407 Flatley Crossroad Apt. 144\nColleenmouth, MS 93958', '1983-03-24', 'Voluptatum earum neque iure voluptatem.', 1, 'corine.walter@example.net', 'student', 'true', NULL, '$2y$12$X43SoizcRj/jUVQADHaxi.qZURQkOoaaZliy2vJ4ICvJZB3CZ9iLG', 490, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(668, 'Dr. Howard Howe V', '1-425-726-0151', '845.331.3468', '5427 Jast Turnpike\nSkileshaven, DC 62898', '1999-07-14', 'Dolorem cumque enim delectus est molestiae voluptatem.', 0, 'pwolf@example.org', 'student', 'true', NULL, '$2y$12$gg9ZBjsnljHciKzQfZWkduwMNdQPkXncSBZkxACYHMZ83OCOxhV4K', 620, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(669, 'Rebekah Blick', '(680) 975-2487', '440.560.7505', '270 Dalton Mission Suite 216\nO\'Reillyborough, MI 09092-3951', '1981-03-30', 'Optio aspernatur est culpa quaerat sapiente.', 3, 'bkassulke@example.net', 'student', 'true', NULL, '$2y$12$Wxc9.OTPGjc71QdvbDiX7.TuLqUv/59vd8AocgGs1.28JoPZgfMiO', 664, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(670, 'Terrance Kuvalis', '1-534-425-1530', '+1-308-230-8646', '65802 O\'Keefe Causeway Apt. 550\nMedhurstbury, GA 54507-0790', '1981-02-17', 'Quia ullam et tenetur non voluptatem.', 0, 'glenda22@example.com', 'student', 'true', NULL, '$2y$12$r8QYKQ7NJSHN6hETSvmxy.b67B0//z0cHa0SUVkirmAmfcoVzroKm', 97, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(671, 'Dr. Laverna Lueilwitz', '937-375-2536', '1-910-483-7245', '6630 Gerlach Branch Apt. 457\nWest Kianafurt, NY 48401-2583', '1972-03-14', 'Ut eveniet maxime consequatur impedit occaecati.', 4, 'dean74@example.org', 'student', 'true', NULL, '$2y$12$3rSk9UPJ1JtN1/7kpsChqeP67YGL5sx79PZsCYKKKMhDjg3Cnmy8K', 608, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(672, 'Mrs. Kelly Stiedemann IV', '612-969-7389', '+12233357369', '48170 Adah Keys Apt. 164\nNorth Melisaside, OR 16502-6562', '2013-12-23', 'Sed itaque necessitatibus omnis in vel in.', 7, 'reynolds.hardy@example.org', 'student', 'true', NULL, '$2y$12$73D7V5Nh/e2Ef7Y2nN7/FO0qdi3dt5ZTA8e/GBmnH6xwjb9gGBJt2', 477, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(673, 'Joesph Schroeder', '+17403811444', '1-270-728-5894', '6160 Jacobs Crest\nSouth Rowan, OR 14523', '1985-11-03', 'Quas sit nulla voluptatem eos.', 8, 'jason.legros@example.org', 'student', 'true', NULL, '$2y$12$Jo421b0pmB3WXuJhUHfBEu9Lysnz0s7bZ7sQ4kWYjcV3.00E.rWgy', 215, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(674, 'Wilburn Zulauf', '907.532.8310', '785-733-0185', '44832 Fredy Garden\nIsaiasfurt, ID 07030', '1977-01-31', 'Praesentium qui architecto rem enim.', 6, 'wunsch.gino@example.net', 'student', 'true', NULL, '$2y$12$ZeVr0eI550EDHB4ki6AJce5CwnxXBIYOVOeCuyGHxa3Zo9nOmYsou', 292, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(675, 'Princess Fisher', '+1 (907) 482-4545', '+1 (870) 250-9377', '412 Destiney Port\nPort Isaiahberg, IN 89257', '1988-03-28', 'Consequatur mollitia quaerat vel sit sed architecto.', 5, 'aurelia50@example.org', 'student', 'true', NULL, '$2y$12$5WDZEcrxQ.xX757F/bXMDuLIz.FLjY5POpYZzJatocmfhJi.rciXm', 704, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(676, 'Garland Boyle', '941.733.3940', '585.846.8205', '842 Sabina Falls\nGenovevastad, MN 65825', '2013-09-23', 'Quis voluptas voluptatum voluptatem nihil culpa ut.', 6, 'corene50@example.com', 'student', 'true', NULL, '$2y$12$RJ.E0Lj4PRDhh3v54V.WM.UduNo8JUtvGnScAlV5OO6.fm0cB0z8a', 101, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(677, 'Lexi Bartell', '(267) 299-3352', '539.541.6877', '51708 Pollich Locks Apt. 604\nEast Vada, CA 67485', '1989-03-31', 'Esse eum corporis alias neque quia consequatur incidunt rerum.', 9, 'guillermo.littel@example.net', 'student', 'true', NULL, '$2y$12$dHKZnl9tQhDSQiP.9doeN.KRkhxrIp4oC65hUs/Bx9QDrFdq6e3NK', 274, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(678, 'Litzy Renner MD', '1-619-399-2397', '(605) 315-6187', '208 Heaven River Apt. 342\nQuitzonside, CT 14774-7204', '1975-05-10', 'Iure amet rerum ad et voluptas.', 9, 'fernando13@example.com', 'student', 'true', NULL, '$2y$12$TUfmn4C80v3dGv9aGAciNOp0kvjzs0Ta4j6c1u2Rbh0gA8hfylZkC', 868, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(679, 'Emmet Emmerich', '(435) 372-2555', '(435) 225-2646', '2660 Shaylee Fort\nEast Ewell, VT 02846', '1989-03-24', 'Aut minima et impedit repellendus delectus voluptatum eum quaerat.', 2, 'oberbrunner.eden@example.org', 'student', 'true', NULL, '$2y$12$mNmkCGsPguayS7zMLP22kuBn7gi.r9GWapTrVRw4E5v/5gx6s3.QC', 633, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(680, 'Prof. Jean Gutmann', '1-470-830-5693', '+1-640-743-8777', '47213 Goyette Plaza\nThelmahaven, MD 97872-1325', '1974-12-06', 'Quia et dolores ullam perspiciatis.', 2, 'tyreek.kuphal@example.com', 'student', 'true', NULL, '$2y$12$sip4.bLp6OKlhmpqNcNJDeggXrsUXW8UrQz/QhMPiQ.LIMgyPPiBm', 160, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(681, 'Lelah Bahringer', '(954) 433-2737', '+16784132697', '7721 Monahan Cape Apt. 740\nBrakusville, NV 85318-2589', '1994-01-17', 'Aliquam exercitationem ipsum debitis quod sunt.', 9, 'gusikowski.brown@example.org', 'student', 'true', NULL, '$2y$12$ioIRtv8kRuUXyqa7VzVXluyksrw90Y.W.fBpkDnCLEUXFYYQaWCtm', 456, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(682, 'Julianne Kuphal', '1-562-463-8707', '+16618910635', '638 Wintheiser Well Apt. 280\nNorth Tyson, VT 23696-8768', '1976-09-30', 'Ea laudantium vitae est ex.', 8, 'haley.jacobi@example.net', 'student', 'true', NULL, '$2y$12$WGJyr8XjAa8Zmn97ENl4B.E8242IdwGbjGfIn6DhSQvbG0BLn86vy', 732, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(683, 'Julianne Conroy Sr.', '+14806437319', '(203) 597-4044', '92472 Deckow Fields Apt. 549\nHollismouth, NH 79709', '2010-06-24', 'Dolore nemo iste asperiores aliquid quis.', 9, 'mills.kameron@example.net', 'student', 'true', NULL, '$2y$12$Ax8pRdpsya4L546rbUXaeeNXET3JObKpCDaZHd29U7Txr7sjauoP6', 890, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(684, 'Salma Ritchie IV', '+1-458-986-9270', '503.910.0474', '941 Alia Ramp\nLake Telly, NC 13264', '2020-12-06', 'Eos culpa sit harum voluptate.', 9, 'rita81@example.com', 'student', 'true', NULL, '$2y$12$Ty.zKLTaVZsQBWJkTs3NFe5c3ZUyP/Jdqeroumm02QZRZzUz7T4H6', 1000, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(685, 'Damon Considine', '+1 (850) 875-1297', '256-286-5696', '9428 Nyah Square Suite 779\nNorth Idellamouth, FL 80339', '1995-02-11', 'Animi facere eaque repudiandae voluptates est facere voluptatem.', 1, 'waelchi.julia@example.com', 'student', 'true', NULL, '$2y$12$izt5GHJQDUxJFk3zqPodRO6bTlOzOHztZJx.QHS7GDHpbRR1yVuX.', 157, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(686, 'Judy Langosh', '804-523-4830', '786-633-6828', '8033 Harvey Plain Suite 196\nKrajcikmouth, IL 05728', '2019-03-20', 'Voluptatibus occaecati vel repudiandae nemo.', 6, 'carmella.hoeger@example.org', 'student', 'true', NULL, '$2y$12$6DI8Hlz8/wurAAI3DalXhOG7L7jTZdq6OguAcjjhWEXnBPphUy6hi', 443, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(687, 'Prof. Raquel Kilback DDS', '+1.605.705.7823', '+13329196179', '605 Hill Oval Apt. 865\nPort Palma, WI 82970', '1971-03-19', 'Maxime similique hic autem deserunt.', 4, 'isabelle.rohan@example.org', 'student', 'true', NULL, '$2y$12$VbLUnELnrP16mB9UaTuTWeNrEPACMnexkAqkk77OPzYj9CfOHR7xW', 246, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(688, 'Mr. Raven Prosacco', '+1.517.575.4378', '+17378411079', '5103 Herman Crest Apt. 651\nHilmaview, ID 53369-3707', '2007-07-16', 'Quo enim officia numquam repellat.', 7, 'marta15@example.net', 'student', 'true', NULL, '$2y$12$EWBVbBOeevNrOYDi0K137.qizpG6odvl84U/mDxzoWvQN1wN/aWMO', 669, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(689, 'Narciso Fahey Jr.', '508-317-0973', '+1-949-888-7235', '237 Gutkowski Walks Suite 123\nLake Uriel, CA 68202-1225', '1995-11-11', 'Fuga necessitatibus aspernatur esse dolorum earum.', 9, 'annabell21@example.net', 'student', 'true', NULL, '$2y$12$1Kyy6YBM4U1W3ZVhJFtoQOUVs7Qixen.Jf2bCBRPqJ8Di.VaaEl96', 266, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(690, 'Camron Bins', '410-565-3262', '+1.458.735.4905', '6529 Creola Trail Suite 286\nTaliabury, MT 99266-3488', '2007-07-31', 'Ab sed magnam ex animi.', 9, 'owalter@example.org', 'student', 'true', NULL, '$2y$12$IoY7BlXHoQHWPPY3Vuw5hOADi7SNPPSCBwrwCdKcaxZLa.KQbGp56', 866, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(691, 'Alysa Kirlin', '971.831.0916', '1-814-670-6419', '3465 Ladarius Meadows\nNorth Enrico, MA 99331', '2003-12-26', 'Qui odio aliquid et occaecati non et.', 7, 'aiyana42@example.net', 'student', 'true', NULL, '$2y$12$XCylo/c1eNK1VX3LsSkKs.0rOO5/jn.461ob11ilHVoMMDjm4zbVS', 44, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(692, 'Golden Zieme', '872-674-4209', '+1.640.537.3497', '385 Ike Locks\nSouth Jasonview, WA 27011', '1999-01-29', 'Et deleniti quia blanditiis amet suscipit at ut aut.', 0, 'vryan@example.com', 'student', 'true', NULL, '$2y$12$XSxDEs61Dzypnew9Mgr5B.rcaAY9nBjnkgO34/LThM0Ya72hk4era', 100, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(693, 'Prof. Guido Feeney Jr.', '(614) 930-5462', '+1.606.788.8589', '50757 Marlin Well\nEast Solon, ND 14389-9456', '1970-05-25', 'Rerum fuga fugit quis.', 7, 'lisette.stamm@example.net', 'student', 'true', NULL, '$2y$12$yHr3MXys1bWMqWGqj6RNy.dQoTf7ViOuaP5dGoNebU2F1IRNoHwHC', 36, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(694, 'Otto Greenfelder', '1-361-529-6781', '+18478651952', '920 Stone Burg Apt. 448\nStarkmouth, CT 01029-3061', '2009-02-15', 'Et a asperiores quo saepe possimus quam.', 0, 'ankunding.makenzie@example.org', 'student', 'true', NULL, '$2y$12$DlLHnCigQHmz6kaqZ6ZkNOQeL.aLD17KN1DuNJ.KcPaTwyEK6HlBe', 464, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(695, 'Lorna Leannon', '(947) 405-4952', '341-335-4833', '8354 Ankunding Knolls\nParisianberg, MI 00879', '2025-02-25', 'Accusamus quos optio quia non magnam adipisci.', 5, 'hbahringer@example.com', 'student', 'true', NULL, '$2y$12$PL9/S1VlE5IG9uf5GN3E/uMltWoxCUGhx8i/6djUmnQ0Nhzj7r/ay', 664, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(696, 'Flavio Mitchell', '1-223-760-0524', '+18124380059', '194 Destinee Corners Suite 233\nNorth Eusebioborough, OK 89027-0267', '2010-08-05', 'Quod quas placeat enim omnis occaecati quidem facilis.', 7, 'kaleigh09@example.com', 'student', 'true', NULL, '$2y$12$FaCK18oZpNZyw5iAnAeTD.QDGrsEequ33YEbLLMiL.tTJcJH7LPfq', 246, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(697, 'Marvin Nienow', '(609) 735-9762', '934-903-1219', '46830 Jordy Plaza Apt. 334\nGeovannitown, MA 75433-6552', '1993-02-21', 'Rerum deserunt amet atque excepturi.', 4, 'lsimonis@example.org', 'student', 'true', NULL, '$2y$12$5pST6mj707oHEW2xGlA7HuwalPzneNpTRURlzO7b5nMeZkH0ftTtm', 318, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(698, 'Krystina Smitham', '+1.986.215.0353', '(770) 869-2517', '146 Horacio Flat\nLake Maidaton, GA 61587', '2017-09-10', 'Nihil sint dolorem unde distinctio quibusdam pariatur quia.', 6, 'jwitting@example.org', 'student', 'true', NULL, '$2y$12$KjWQqEcNQyod0mK15pC63uZecqEBsLIbnk11nKmiTlXrXvo55YSuW', 19, NULL, '2025-03-03 19:08:42', '2025-03-03 19:08:42'),
(699, 'Dell Kassulke', '223.900.3911', '(978) 844-5207', '74769 Morissette Forest Apt. 138\nBrandonmouth, KS 55178', '1995-04-27', 'Illo minus quibusdam assumenda nihil consequatur.', 7, 'wschamberger@example.net', 'student', 'true', NULL, '$2y$12$eXaNQfyBZkAfdJT1I3yUhO.A1c2G9sBGZrJI9ZgZe85JG0yy/wRYe', 289, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(700, 'Jeanette Nolan', '410-772-1241', '+1-626-805-3261', '6325 Johann Rapids\nMacejkovichaven, NV 64239-7730', '2016-10-21', 'Qui ratione voluptatem ducimus eaque aliquid id delectus.', 7, 'qeichmann@example.com', 'student', 'true', NULL, '$2y$12$HWbtSm7mI9orVeamyfgASO59YzuhqQnvxpZybmGLWqPmI1lQjwHRm', 209, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(701, 'Jaeden Bauch', '(707) 262-1653', '+15045602327', '38711 Veum Square\nLaurelbury, ME 71093', '1991-12-31', 'Explicabo aut illum ab labore sunt.', 6, 'alexa99@example.net', 'student', 'true', NULL, '$2y$12$pLcxjKQ2Rfeq1BQeeO.oMeCpZQqZPZmnu1ow37eRFIxCmSR29kaU6', 712, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(702, 'Jeanne Pfannerstill', '(828) 521-7597', '+1 (240) 845-8818', '7868 Reynolds Knolls Apt. 226\nSchadenstad, LA 61751-7325', '1974-05-23', 'Incidunt voluptatum ut itaque quia voluptatem qui.', 1, 'shad.senger@example.org', 'student', 'true', NULL, '$2y$12$J2Kxf9iNI6IIORt1RkZisuW8SDZ4ErNLQNaZT7VHL7akKGZv5CyT6', 979, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(703, 'Dr. Lillian Hansen Jr.', '+1 (619) 617-6970', '+18606129066', '383 Randal Curve Suite 683\nEsperanzafurt, MN 37372-3695', '1971-06-19', 'Et corporis nemo officia perspiciatis laborum quaerat quasi.', 4, 'mcglynn.domenico@example.com', 'student', 'true', NULL, '$2y$12$6Yzk2hKOCNCTjJNePTqIKOVQKT6vV98W8RzzKIterK.xv5c3WZFpW', 88, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(704, 'Marilyne Haag I', '+1.563.235.1805', '+1.628.912.9611', '4233 Mosciski Springs Apt. 804\nLake Otho, WV 81147-8634', '1986-11-24', 'Incidunt quia dolorum atque sed autem voluptas beatae.', 4, 'jeromy97@example.com', 'student', 'true', NULL, '$2y$12$wbRIwl6Gclx3JV5QQvh5luZGbjaPsqJN.GbEBYvTvfS6MRhKO6ndu', 477, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(705, 'Krista Stanton', '(440) 589-0660', '445-665-9399', '980 O\'Kon Glen\nLake Thelmaville, IN 04197-0352', '1979-12-27', 'Odit exercitationem dolor asperiores.', 5, 'adriel07@example.net', 'student', 'true', NULL, '$2y$12$FSrqyRs/Sxt6HY5KvcPoDOQaiFiiXDxHheSfWpWPwG0nojLp/WTLK', 788, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(706, 'Karley Rosenbaum', '+1.820.909.9328', '+1-479-779-2714', '11608 Angus Brooks Apt. 409\nHesseltown, IL 28407', '2008-03-12', 'Ut quae fugit expedita vel id ad.', 3, 'slindgren@example.org', 'student', 'true', NULL, '$2y$12$wQ3M5zGW.mKBSJCwg0e2qetqhEryUoKJhUkenUvVv8uf.g3amlcqK', 147, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(707, 'Adrianna Jacobs', '1-364-810-3332', '240.718.8115', '9520 Garrett Locks\nPort Leoneborough, SC 51924', '1972-07-26', 'Nulla qui quasi fugit excepturi.', 9, 'hahn.clifford@example.org', 'student', 'true', NULL, '$2y$12$CTUvuIjCRhkHt6Y1fXnsHuqwLF8dYGnJ4jflv1ZFWPKvibqxFoCpC', 30, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(708, 'Rosalee Davis', '269-837-9054', '+1-564-268-1555', '72834 Boehm Flats\nEast Jules, NV 39663', '2006-09-09', 'Odit praesentium similique ea.', 7, 'jakayla.grimes@example.com', 'student', 'true', NULL, '$2y$12$.HrW3pyIwlgfO1qJx50cHuwiEDkkv7QlehpIv.hyICDOsVrCxFWWq', 731, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(709, 'Maryam McDermott', '+1-435-313-5886', '1-563-761-5073', '72258 Cremin Rapids Apt. 465\nWest Fredborough, KY 23643-3583', '1988-01-17', 'Accusantium et assumenda dolore laborum nemo.', 9, 'khane@example.com', 'student', 'true', NULL, '$2y$12$6c9Y0Eax15OHR60A6nhdkupwLlZHpzQ3zM9vfYUJE1FEfQY7Pe5t6', 995, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(710, 'Lesly Dach', '(240) 345-4574', '267-968-9022', '45901 Mohr Flats Apt. 770\nNorth Carlo, MT 24254-5682', '1974-10-29', 'Eum alias enim quos quo blanditiis saepe quia.', 7, 'ivy51@example.net', 'student', 'true', NULL, '$2y$12$0b7oXTY7eBLGvak90p5DLOXxv4aeK6iAlfYoK/DhET.ZNaeyIb8se', 62, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(711, 'Miss Megane Vandervort', '+1-425-851-0883', '+1.956.405.4619', '3507 Lurline Square Apt. 681\nKutchfurt, KY 17260-1040', '2016-11-26', 'Facere aut blanditiis est suscipit ad.', 7, 'charles37@example.net', 'student', 'true', NULL, '$2y$12$L1pc1YSeTfBjAoymQ7WEEOOLZqbC5KK7dQH5v8KyZx.lJDYd1wgH2', 265, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(712, 'Mr. Lawrence Dach DDS', '1-628-390-4350', '830-661-3952', '6722 Shany Point\nPort Leebury, HI 25451-0475', '1991-07-17', 'Iste maiores quibusdam dolorem ratione.', 1, 'ferry.christina@example.org', 'student', 'true', NULL, '$2y$12$t3tUnGFhAo6zFNpncX31wO72UmQe419ui5bcLcYTartkLl2N4fsZ6', 359, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(713, 'Mafalda Baumbach', '+1.817.536.6102', '+16368692082', '491 Nitzsche Meadow\nNew Genoveva, MN 18531-7019', '2015-10-24', 'Explicabo id numquam officia ut voluptatem ad.', 1, 'cummings.rosario@example.org', 'student', 'true', NULL, '$2y$12$rAt1lRbbRZzQ5MtNPlHzQu3HsbCsQe9/xAmOAX6963ztpP7RcgHrC', 864, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(714, 'Ms. Piper Reynolds V', '680.852.1801', '903-786-4284', '698 Karianne Trail Apt. 027\nKeeblerburgh, NY 04615', '1997-01-20', 'Non itaque ad expedita voluptas.', 2, 'hillard64@example.org', 'student', 'true', NULL, '$2y$12$RDeoD7QyiKbvjDrhsKIRue5hkK06u2i.7FAhKK6MCfE1kSd4hZLRy', 730, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(715, 'Laurel Williamson', '(727) 570-2080', '+1-650-604-0301', '20284 Kerluke Dam\nMarkusmouth, AL 90255-9954', '2010-12-07', 'Animi corporis itaque sed.', 7, 'estreich@example.org', 'student', 'true', NULL, '$2y$12$wBFs9AkivnbTriq7F6XZwe2LrI6QY7CXXB8oLCQ24mnfm1uMTnGYi', 47, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(716, 'Shawna Goyette', '+1-636-329-3179', '812-349-7622', '398 Celia Summit Apt. 896\nWolfshire, RI 33746', '1971-12-08', 'Eaque similique blanditiis ut.', 6, 'leannon.breanne@example.org', 'student', 'true', NULL, '$2y$12$RX7T3fiBRbQD7cc6rP/Y0OHYl/lOB4t8F3T3/Mugpj/WlrRJ6rG9C', 623, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(717, 'Ross Lakin', '+14755102515', '859.290.8354', '42456 Jaunita Squares Apt. 164\nWindlerbury, MO 75512', '2000-12-23', 'Suscipit aut officia ullam nulla culpa aliquid sunt nihil.', 5, 'pmitchell@example.com', 'student', 'true', NULL, '$2y$12$C3KaeoshW4we6EaEqEa9HeJUAO1AYbp7Uu.8UoGNAIp5CdaQCYk1G', 461, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(718, 'Caleb Klocko', '872.321.6856', '(515) 942-6977', '6062 Prince Crescent\nMoenside, NE 92406-2954', '2017-01-02', 'Ut est sed iste quos.', 5, 'einar.reynolds@example.com', 'student', 'true', NULL, '$2y$12$k.rV5kaGHDhpLPYdN9EllOj3O66.fMqPn0Vs117H7fCXJRRdhs/hu', 410, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(719, 'Alisa Stokes III', '817.508.4491', '+1-949-258-1428', '898 Fahey Rue\nWest Jamar, OH 41090', '1983-05-09', 'Et aut magni nobis aliquid ipsa ut.', 6, 'einar32@example.net', 'student', 'true', NULL, '$2y$12$fmArtDelPj7ot8blrUz/dOWuiV4JNjB/fY3NCGBLt4ch92J5BHYdS', 27, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(720, 'Magnus Connelly', '1-865-205-9765', '(352) 831-6368', '29976 Von Extension Suite 656\nGersonview, HI 44430', '2013-12-12', 'Aut qui quis magni et maxime neque.', 4, 'larissa.paucek@example.org', 'student', 'true', NULL, '$2y$12$XRABziZO8wwy2SBUtsB7ZONSv8Q.RwyL5MJw7yEI8H7SBRjYwUzQW', 26, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(721, 'Leonel Stamm', '+1 (650) 918-0792', '870.946.0825', '744 DuBuque Field\nNorth Logan, ME 31971', '1972-06-08', 'Modi quod neque ea.', 5, 'german29@example.org', 'student', 'true', NULL, '$2y$12$.yXCDoPG58F2izoh2nE5r./yis2zE8ZQB4NP2.2q9heuPXdOLBkuO', 288, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(722, 'Luigi Heller', '820.542.2330', '+1 (225) 328-9349', '948 Schamberger Lock Suite 709\nWest Jordiside, IN 30572', '1985-07-12', 'Quam laborum consectetur et blanditiis autem et delectus.', 2, 'xglover@example.org', 'student', 'true', NULL, '$2y$12$zri6DH5Cq5bvIo/hr8tO6.KdTfWJIP4.AwvRT/0HH3KfmgHxqoIEK', 240, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(723, 'Mrs. Lexie Pacocha PhD', '+1-941-873-1814', '854.571.8777', '89240 Markus Flat Suite 976\nNew Nash, CT 02555-8880', '2006-09-04', 'Dolores asperiores et cumque id saepe quia.', 2, 'bryana39@example.net', 'student', 'true', NULL, '$2y$12$PGdZzqyHA6aV09Iuy8xyxee29g4zRPNOMfgKPY1BIsL06nuVVOcFG', 267, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(724, 'Dr. Lonzo Hansen I', '(920) 271-3585', '+1-820-767-9886', '97499 Shirley Spur Apt. 028\nRuthehaven, RI 83102-7076', '2020-07-03', 'Ea porro excepturi voluptas praesentium et esse veniam.', 6, 'leffler.everardo@example.org', 'student', 'true', NULL, '$2y$12$PvQf/RAWUKPxuYjQVT6qcOAYAU4gRx0IFU8fW2kU13pxjAUcwh.TK', 521, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(725, 'Samir Wiza DDS', '+1-725-465-6765', '+1-385-981-8557', '28468 Selena Lock\nChristaville, FL 98545-9719', '2005-02-09', 'Cumque eligendi consectetur quia debitis itaque aut.', 2, 'lebsack.floyd@example.com', 'student', 'true', NULL, '$2y$12$ou8inthId/Oev3OMTbZKyuKvcGVJ.c9P5AZdYM21ZS/O7SpECgdZO', 845, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(726, 'Nikko Quitzon', '331-843-8369', '1-272-336-2301', '220 Gerhold Wall\nSouth Norwood, AL 88559', '1994-04-03', 'Itaque magnam error officia consectetur amet minus.', 9, 'cory14@example.net', 'student', 'true', NULL, '$2y$12$3A4GzA9jj123uEoUre6lce5GQw5S0BkrvyDT9r3FKR0X8Z4NdiODm', 970, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(727, 'Dedrick Goyette V', '+1 (228) 413-8578', '+1 (561) 763-3203', '975 Mayer Plaza Apt. 800\nNorth Isabel, NJ 93619-4238', '2003-07-29', 'Exercitationem voluptatum omnis architecto neque soluta dolores similique.', 6, 'dwuckert@example.org', 'student', 'true', NULL, '$2y$12$AYugcvaQxrNKim9UtEkCyOqRF1q47iGBM34zgc/26EcIJKJXsg1NC', 844, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(728, 'Prof. Nickolas Ritchie DDS', '1-820-557-2112', '+1.240.843.3508', '7203 Cheyanne Village Suite 876\nWildermanmouth, RI 72974-3242', '1973-02-05', 'Placeat sed tempora praesentium rerum voluptate veritatis non fugiat.', 2, 'queen.reinger@example.net', 'student', 'true', NULL, '$2y$12$x6CGvEk4GANZp2elJ5ycPuRykPl4LpybRp1SuhFVdaYbFn7aolEQW', 361, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(729, 'Mr. Mitchel Bechtelar', '+1-816-763-8433', '+1.754.318.5391', '9632 Jedediah Mission\nNorth Durwardland, WA 81809', '2012-09-06', 'Quaerat quia aspernatur ullam nam suscipit quod.', 8, 'blanca.green@example.net', 'student', 'true', NULL, '$2y$12$1JW/V6ujtx3AuKJvX4XvjuSDTfFKGtl3As2YSimxLOV9613vTY2tO', 575, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(730, 'Miss Georgianna Kub V', '+12625479881', '440-783-6224', '340 Kurtis Locks\nRobertschester, RI 04404', '2019-01-09', 'Et vero qui dolores doloremque nulla.', 8, 'larson.darian@example.org', 'student', 'true', NULL, '$2y$12$CbVGKgqi6v3Pvb8evkRPS.ssre1n9t1QwkzM2q9ek09l6AtBDNYEO', 269, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(731, 'Katelynn Hayes Sr.', '(831) 884-3074', '+12067065902', '75506 Auer Ways Apt. 967\nSouth Pablo, IN 59131', '2005-12-28', 'Molestiae quo autem sed sequi adipisci corrupti.', 8, 'lokon@example.net', 'student', 'true', NULL, '$2y$12$CQKYuWwq4nOHXmbkj0LqIuqoUvVzeFtxTcE6BTfM1tLfYXCYy8PJW', 976, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(732, 'Estevan Lubowitz', '+1.912.826.9889', '+1-539-966-1852', '95587 Westley Causeway Apt. 980\nPort Christopher, IN 85430', '2003-01-25', 'Ut ab et sed aut.', 6, 'raoul.bogan@example.org', 'student', 'true', NULL, '$2y$12$Zpk6QavlTLwcjHLG7Fp9mOBFJpvgqnuFGbLjsjZR/d/7Et51d.HC.', 367, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(733, 'Prof. Edna Heaney', '678-503-8361', '1-484-320-7180', '8849 Christop Haven Apt. 659\nNorth Lillian, SD 85215', '2017-12-16', 'Qui animi occaecati odio sit quia ex.', 8, 'dorothea54@example.net', 'student', 'true', NULL, '$2y$12$CmAUQwip.EJhvhqC2kkpp.XHFk1XCCTSrKptdYdFxwGLn1O3nemzi', 898, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(734, 'Matilde Terry', '1-347-369-3658', '(605) 617-0774', '88715 Gretchen Alley Apt. 528\nKautzerland, SD 89954', '1975-07-08', 'Corporis iure voluptatem mollitia soluta temporibus voluptatibus dolorum.', 3, 'josefina78@example.org', 'student', 'true', NULL, '$2y$12$dA5tEKCwnwHdYzAATBtVTumNOqxjsa89hyyg5R88pJmwVrij1tr0m', 156, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(735, 'Clifton Skiles', '(640) 810-0093', '828.705.8559', '53749 Tatum Islands Suite 765\nNew Earline, WV 88812', '2005-04-16', 'Hic quia voluptatem veniam voluptatem labore est.', 2, 'laurianne44@example.net', 'student', 'true', NULL, '$2y$12$m3pR8KFxSeCVRQXP1GGJtubjPkaRdXKuy9BJg5cKQYAVetho22JGu', 624, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(736, 'Jack Denesik', '1-517-261-6267', '650.495.6165', '505 Koepp Ridge Suite 430\nJalonside, VT 73397', '1990-11-22', 'Consequuntur minus nesciunt corporis perspiciatis.', 0, 'idouglas@example.net', 'student', 'true', NULL, '$2y$12$BRDNslBoNxzbBPaW4/g1veqAal4sbSv9Lf3H6MBG1S.kJgGONHee2', 807, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(737, 'Avery Padberg', '+15202636894', '1-563-360-6728', '8007 Schowalter Landing Apt. 622\nNew Kathrynshire, IL 45996-6801', '1979-09-01', 'Eos quaerat voluptas qui dolor non aut incidunt voluptatem.', 1, 'alvena.keeling@example.org', 'student', 'true', NULL, '$2y$12$upjxknE8XniP1lc3IgpH.etoH5AFL09KkM2GpEiVVADdQv.6aAAi2', 685, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(738, 'Easter Purdy', '1-541-385-9212', '828-295-5543', '2858 Icie Lane\nHellerbury, WI 40333-8237', '1995-02-14', 'Aut ipsam repellat quis voluptatibus aspernatur reprehenderit.', 7, 'nicholas.will@example.com', 'student', 'true', NULL, '$2y$12$tgD0gc1TOfbopeVYLAtHu.YcaCQLTwN1veYnwG0lmcQRRD6yQguBq', 135, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(739, 'Prof. Moshe Rolfson DVM', '985-510-6914', '781-890-1127', '945 Mraz Circles Apt. 191\nNew Shany, MO 35141', '1989-04-11', 'Sapiente hic id omnis.', 3, 'amira.boehm@example.com', 'student', 'true', NULL, '$2y$12$pJXhkTZnCJK00AhKUPgRzOMXGCBeSRZGorVBQBn7hag/R6/h87j9K', 815, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(740, 'Dr. Wilton Kris', '+1-952-317-9278', '1-434-875-8978', '3026 Boyle Dale\nNorth Rogerhaven, MA 41354-2243', '2002-09-03', 'Totam facilis aut odit voluptas et quisquam adipisci.', 7, 'metz.cordie@example.net', 'student', 'true', NULL, '$2y$12$S2rgDbWDiyCwegKbVIhVxOIYGr9R289RKdQIQfSEAZyukceQs9iZu', 278, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(741, 'Delfina Halvorson Sr.', '(458) 597-6244', '(279) 468-1961', '380 Ricky Pass Suite 268\nPort Valerie, AK 93199', '2010-09-10', 'Adipisci ut quae nostrum possimus.', 3, 'garnett07@example.com', 'student', 'true', NULL, '$2y$12$GCR2EH2CX3oLqvlgVAM.6.I9/L3OJTyMyCX1EXBHY4yyb.pbNcapO', 65, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(742, 'Cecile Larson Jr.', '(580) 315-3169', '424-665-9212', '1950 Schmidt River\nLelandbury, AZ 40662', '2021-05-27', 'Aut illo quia voluptatem dolores expedita aut cum repellendus.', 4, 'davion94@example.net', 'student', 'true', NULL, '$2y$12$3C.uGSniCFaQ.hddCfgIFed6pk.wNyBmmfLH3PWeJcZmtMu/VXWTq', 642, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(743, 'Rosalee Beahan I', '+17855994391', '(660) 732-7231', '541 Ivah Streets Apt. 399\nSonyachester, ND 11746', '2010-01-02', 'Suscipit cum et delectus qui et aut.', 2, 'heffertz@example.org', 'student', 'true', NULL, '$2y$12$.cfd9Yrs3RVo/JjuQ3NElOjm6XBzkFgyDiqQyUmFF.ssQ0ZpxSqZq', 63, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(744, 'Prof. Reagan Vandervort III', '(701) 371-1091', '425-562-6187', '2246 Ila Walks Apt. 329\nKamronport, PA 96747', '1994-12-02', 'Repudiandae perferendis ipsum illum voluptate.', 9, 'alana51@example.net', 'student', 'true', NULL, '$2y$12$p63G.SoVoivG2SNo.9pVmetlpLrkwvLhHS8l1dMu.GxBxFYHFSTxm', 147, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(745, 'Adrian Metz', '+14706287073', '1-854-976-7279', '8447 Wehner Vista Suite 584\nConnellychester, MA 87190-6835', '2009-03-01', 'Modi dolor consequatur assumenda debitis.', 3, 'aziemann@example.com', 'student', 'true', NULL, '$2y$12$6n03HHlJYzuWHU8ZnwY2A.rusRxgeInE0LZ6F1Mk02DbOXY40k10W', 370, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(746, 'Tanner Batz', '(478) 731-3469', '+1-815-337-3184', '52876 Otho Springs Suite 902\nLake Cleta, DC 91763-7009', '2006-01-12', 'Dicta maiores maxime delectus delectus.', 0, 'jacobson.stanford@example.com', 'student', 'true', NULL, '$2y$12$CTuJAiMaXySWeJuOZuAAGu.e55dC/mJCQn.8W8oru2tKsEWsvFXZq', 468, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(747, 'Mae Harvey', '+1 (802) 407-9532', '+1 (636) 672-4090', '3039 Pouros Crossing\nEast Bethel, WV 58664-0785', '2005-12-01', 'Qui assumenda autem aut sit hic.', 4, 'anissa.thiel@example.org', 'student', 'true', NULL, '$2y$12$sXonpm8qn6b/rYad/KUvKuYgSz4dOQW.kEX.XqXTG3Hx21K8hHWAC', 867, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(748, 'Carlee Gutmann', '+1-559-948-2060', '720-892-6032', '682 Stanton Viaduct Suite 179\nReynoldhaven, NJ 75981', '2010-10-07', 'Perspiciatis magni iure consectetur vel earum.', 3, 'cremin.bertram@example.org', 'student', 'true', NULL, '$2y$12$lGvQxTQtgir4FOxKa58x1eqtS7z67s2hv4t6ZAo2uE13VJr64xRwK', 538, NULL, '2025-03-03 19:08:58', '2025-03-03 19:08:58'),
(749, 'Omer Bogisich', '+1 (854) 788-7518', '(971) 617-0907', '6058 Bechtelar Fields Apt. 904\nSouth Sandrinefurt, MS 68188-5720', '1988-04-24', 'Doloribus possimus officia voluptas inventore.', 4, 'iheathcote@example.com', 'student', 'true', NULL, '$2y$12$QeyKt5gX/3ENltSipI2mLudNMNjj4D3VeDIPXPWIw.e1Is6Yixn.y', 214, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(750, 'Mrs. Kathryn Satterfield', '660.502.2494', '+1-305-755-7638', '5431 Rempel Parkways\nNorth Jaime, SD 72250', '1993-04-07', 'Adipisci maiores inventore veniam nisi porro.', 2, 'hkunde@example.org', 'student', 'true', NULL, '$2y$12$6E4HZXFzFOZz5OJZeJ8ste0t2/bXK/NdtV5O/TpvdnHp.RhAf0AUW', 208, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(751, 'Queenie Price MD', '1-636-671-4137', '(832) 620-8934', '79490 Aufderhar Points\nLake Tevinmouth, VT 24466', '1999-09-25', 'Ut id omnis consectetur porro.', 6, 'casper.domingo@example.com', 'student', 'true', NULL, '$2y$12$25BOrFXQkXA6g1Zl4ahbfeqQGp.nQPk23/gwXSyd3x/hj8yKbBpT6', 213, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(752, 'Evangeline McLaughlin', '+1.409.251.5115', '1-385-717-2602', '88774 Kerluke Squares Suite 861\nEast Patborough, TX 69594-9949', '1997-12-14', 'Et itaque veniam facilis qui repellendus et aut corporis.', 8, 'angie70@example.com', 'student', 'true', NULL, '$2y$12$Ws8lSRQ7aOM/pMX7sfVI4OVQ9iK4/La14KK3XATCCEj3rmaQOqv6G', 796, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(753, 'Ana Dibbert', '682-234-3148', '+14759405049', '520 Jayce Spur Apt. 494\nPort Cayla, HI 01446-9654', '2005-10-03', 'Ut rerum explicabo et deserunt enim et mollitia.', 2, 'kuhn.arjun@example.org', 'student', 'true', NULL, '$2y$12$5B1GGTHy4v3HQoAW4OXa.Oylg/Z0wlWqUJLII16C2d6c1wdNZyxp.', 506, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(754, 'Felipa Macejkovic', '715-762-5634', '435.279.8640', '67492 Rempel Roads Apt. 606\nPort Alleneview, NE 11428', '2011-10-10', 'Recusandae provident autem modi consequatur.', 9, 'milan23@example.net', 'student', 'true', NULL, '$2y$12$h1jNG6irBHBLMxaWj4IhUe/EltzZdf5UZY80V5psEUUowwGmfbO0W', 485, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(755, 'Clemens Maggio MD', '+1.870.963.8517', '+1 (325) 892-2241', '4874 Cindy Alley\nEast Kelvin, AL 62704-3715', '2020-07-20', 'Voluptate placeat eligendi alias cumque modi debitis placeat.', 4, 'kali.konopelski@example.com', 'student', 'true', NULL, '$2y$12$W.7B9uVXrvqGgWyJ4zClIOYiob3xjTaWJsUHDqDKLrnwtzxAIj3lm', 648, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(756, 'Norma Kuvalis', '716-819-8168', '818.555.4367', '18737 Ruecker Extensions Apt. 846\nAidenview, CO 82042', '1978-10-23', 'Nulla quia voluptatem consequatur eos minima iure.', 6, 'rylan.wiegand@example.net', 'student', 'true', NULL, '$2y$12$M0l2s..R7UhP4KCJKviG5usBgDta4Cb11My.XF7dUkz.XzIn8qarC', 286, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(757, 'Trey Jenkins', '1-828-510-5534', '(240) 354-6345', '65088 Feil Locks\nHartmannmouth, ID 46565', '1973-06-27', 'Sunt ea omnis beatae saepe delectus labore est.', 7, 'ford35@example.net', 'student', 'true', NULL, '$2y$12$lrk3P09t.xAcy8foJw1uH.Rrx/pEM4tvvPwt14dCryBKWqHvF.nsm', 732, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(758, 'Emmie Lubowitz', '+1.623.321.3360', '+1-727-891-6459', '36915 Lueilwitz Plain\nNorth Nicholaus, WI 62386-3044', '1978-01-15', 'Rerum esse ut excepturi reiciendis.', 6, 'braun.anais@example.net', 'student', 'true', NULL, '$2y$12$shFY9nLGCjy1U9RZDss/BupTdktaYUp0B.ggXt913qXVfS38IdvS.', 679, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(759, 'Elmore Kuhn', '865.745.4209', '(412) 405-7574', '792 Dina Fort\nNew Maiyahaven, NM 71562', '2023-03-23', 'Laboriosam et sunt nam.', 1, 'kirstin.rice@example.org', 'student', 'true', NULL, '$2y$12$FjLl/WjA94ITELcvI7URnuw8AzeGhQfoHQ07J2ZC9TnC1EgCJz6Iy', 141, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(760, 'Gilbert Satterfield', '1-283-838-8938', '386-435-9039', '89256 Amely Via Suite 810\nWadebury, KY 05188-6644', '1997-06-30', 'Ut ratione consectetur qui.', 0, 'heloise68@example.net', 'student', 'true', NULL, '$2y$12$MoX5lDmvaxGJhewOH.zKcum8G7mMtiBm31hOwnS/wQR8p5vqhFBly', 668, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(761, 'Walker Barton', '+1.480.379.2972', '(385) 830-0989', '576 Ryder Mountains Apt. 400\nDwightberg, IL 08988', '2012-07-27', 'Veniam voluptatum pariatur laboriosam officia tenetur.', 1, 'tremblay.adell@example.net', 'student', 'true', NULL, '$2y$12$ybq0eFJo6bBl9E0n9vvPsuYKhg8xKWxi715eHtS3pMsZEFhCRjk1e', 522, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(762, 'Madalyn Carter', '(989) 278-3373', '+1-678-217-6204', '1059 Larkin Valley Apt. 083\nLake Pearlborough, VA 15571-2599', '2015-12-07', 'Ut placeat reiciendis culpa culpa repellendus.', 2, 'doris41@example.com', 'student', 'true', NULL, '$2y$12$nN0/uiiFd1liyJtSQnpEDO8141xbzLzwb.74Nmg8nWFARi3j9uM0C', 954, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(763, 'Jerad Pfeffer V', '+1-920-833-9338', '(719) 277-5310', '4512 Waldo Creek\nGerholdbury, VT 34559', '2013-12-18', 'Commodi cumque quibusdam omnis qui dolores.', 2, 'kub.iva@example.org', 'student', 'true', NULL, '$2y$12$SFGMNGwCDNJwOgI6DhDGlOpC9uNJr0Ctr0aW392UId546cj0a.0nK', 683, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(764, 'Adelbert Kunze', '+1 (534) 431-3415', '1-985-431-4818', '508 Collier Stravenue Apt. 908\nNew Kaleigh, OK 12933', '1987-03-14', 'Sed earum unde ad et possimus quis est.', 7, 'remington.rempel@example.com', 'student', 'true', NULL, '$2y$12$eIfaVGtxd6jGM0i3yyVknOabVmpArsYpTSC/2DIuz2NnCFSYL/H7W', 607, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(765, 'Tomas Bahringer PhD', '+1-315-959-6796', '1-818-696-0492', '3073 Boyle Rue Apt. 947\nSouth Olin, IN 95207', '1973-05-31', 'Saepe dolor aut quia vitae consequatur ut id.', 1, 'collier.raleigh@example.org', 'student', 'true', NULL, '$2y$12$1ZIY4AmAnmT3zq7obmLRAeEsqgrz0b7ynZo35ifqQOvkHAqn4hvIa', 187, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(766, 'Prof. Naomi Schmidt', '828.251.6992', '1-820-858-9666', '7427 Stella Park\nWest Joeyport, MT 39373', '1998-07-17', 'Ad ut vitae quas necessitatibus et in.', 2, 'felicia.bogisich@example.org', 'student', 'true', NULL, '$2y$12$i.Ct0NCQd6MJIL/joW9uruQ9rKoCFcUZvVdRexfnJtL2lIxSdz0PS', 352, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(767, 'Germaine Nienow', '346-546-9539', '+1-412-675-1074', '608 Monique Fords Apt. 064\nSunnyview, OH 87056-9165', '1973-05-03', 'Qui optio fuga nihil.', 3, 'lamont.gutkowski@example.com', 'student', 'true', NULL, '$2y$12$7RiObi8DGZz2CIgTxVU9POkMeQFs3aCG8yRRb8oljrlebf4OZCe32', 17, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(768, 'Rossie Blick', '539.773.5222', '+13527885418', '75643 Lorenzo Plains\nWest Nanniestad, MI 96163-0864', '1979-08-28', 'Dolores ullam distinctio sequi similique rerum voluptas explicabo.', 2, 'agutkowski@example.net', 'student', 'true', NULL, '$2y$12$o42rdpnpjVY/5.RX4otRCu2K1fFB5G53deSbHp170r/c49ccIwyyi', 517, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(769, 'Tia Yost', '+1 (608) 367-7025', '413-832-1854', '7766 Winnifred Centers\nEast Myleneborough, OR 63207', '2001-10-29', 'Debitis repellat ducimus occaecati fuga mollitia.', 3, 'dreilly@example.org', 'student', 'true', NULL, '$2y$12$KEP04pD6x4iGj11wdHzZdOY/frQWkKclLzx7FQgCFwdEN6pldBsKq', 686, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(770, 'Mr. Monserrate Schultz', '601.914.7213', '845-932-2251', '7663 Pink Trace Apt. 392\nLudiemouth, MA 72872', '2006-05-01', 'Ullam voluptas laudantium delectus tenetur vero.', 2, 'moriah87@example.com', 'student', 'true', NULL, '$2y$12$5BLxd/bMtfN5ovqpb4XETu/76F5xm9TzUHeTDvoydci6hwLOMLQVu', 666, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(771, 'Una Cronin', '1-628-673-2425', '+1.475.827.7172', '341 Heidi Keys Suite 474\nStammport, HI 45514-4741', '1989-10-07', 'Et quia ex non tenetur tenetur totam perferendis.', 0, 'whansen@example.org', 'student', 'true', NULL, '$2y$12$fVzbWfQ3ZpwjdEHi7msjGubBqJYwuaMrY8JOarGND/a7SDQql5kwu', 638, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(772, 'Pietro Cole', '1-504-571-9911', '773.656.6812', '7239 Runolfsdottir Pine Suite 445\nKerluketown, CT 82281', '1998-07-20', 'Omnis voluptatem quo ipsam recusandae.', 1, 'rice.keegan@example.com', 'student', 'true', NULL, '$2y$12$03KoW65j1rMaNAo84umKuuQuk.jFbykipPWCUyTq9q0QOh.rUd9ay', 589, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(773, 'Itzel Little', '(347) 625-4938', '540.702.6310', '8226 Lonzo Roads\nNew Lesly, DE 43899', '1996-04-13', 'Quod quis dolores inventore aut aperiam.', 4, 'kiana91@example.org', 'student', 'true', NULL, '$2y$12$PCBdmf8lIJICjDQRokSH0.Jbrxw1LAPcXQRjE7caeEUovF1TXcUpi', 632, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(774, 'Dr. Cruz Keeling II', '385-852-2690', '(732) 334-5546', '627 Alexie Passage Suite 457\nLangmouth, CT 81329-3125', '1988-04-30', 'Atque vel nihil voluptas eligendi non hic.', 6, 'monserrat96@example.net', 'student', 'true', NULL, '$2y$12$o.q8XhHwNqo4C/yFrLffSOh/f7kpDJBx5VwXSKwNjp.gYxbvttt9i', 54, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(775, 'Mr. Greyson Lueilwitz', '+1-435-617-5406', '412.516.4905', '602 Kertzmann Island\nBalistreriburgh, TN 35782-0042', '1990-02-22', 'Ab repellat et nisi recusandae maiores sed consequatur nihil.', 6, 'omcdermott@example.org', 'student', 'true', NULL, '$2y$12$n5quETryeMpQDKFgiT5t6.927/P2ef3hfr9lzHBklBvD8O0Mo89pm', 116, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(776, 'Prof. Alex Ankunding V', '(878) 557-3043', '+18125583512', '416 Runte Mills Apt. 225\nNew Zena, AR 18812-5094', '2011-10-28', 'Sed adipisci itaque tenetur omnis totam soluta.', 6, 'collier.geraldine@example.net', 'student', 'true', NULL, '$2y$12$21.YTw3DOpyQxFhivhh7CewXs.0zHgC4r4v7FuM/fC4jttbt.O/aa', 98, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(777, 'Mrs. Cecile Bergnaum', '(325) 298-7286', '+1-681-442-9728', '281 Connelly Circle\nPort Jacques, MN 64591', '1980-09-05', 'Quaerat perspiciatis laboriosam qui illum natus dolorum porro.', 0, 'luella25@example.org', 'student', 'true', NULL, '$2y$12$IprpPKC6YMHbWSCkICC1VOfp8VHUVZdP3RZ374vIfrg3PrVlfQpz2', 35, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(778, 'Jeremie Murray', '(661) 352-4483', '+1 (432) 952-7931', '606 Hauck Meadows\nNorth Vickie, KS 27679', '2018-01-12', 'Dolores nemo maiores necessitatibus rerum praesentium adipisci.', 6, 'noelia89@example.net', 'student', 'true', NULL, '$2y$12$1ipHLF846PGL20foHzcsLeFHks8Q0WwO6tXLlFnSYW4N6TsjQfU0y', 715, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(779, 'Dr. Drake Torphy IV', '1-650-507-2175', '+1-765-422-2866', '52056 Mertz Pass Suite 280\nPort Beth, MN 41985', '1980-01-17', 'Ipsum dicta eligendi et ut neque.', 5, 'bruen.aurelio@example.com', 'student', 'true', NULL, '$2y$12$lnnrJ207UB3PGwwnJdsnt.iTJPqmgIXPKEHWnPjgiVI3TNK9789U6', 523, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(780, 'Rebeca Quigley', '801-535-0773', '410.995.3912', '548 Lang Flats Apt. 941\nEast Kipmouth, AL 50424', '1990-01-11', 'Eaque quis eos saepe sit alias nihil.', 7, 'rosalind.kihn@example.net', 'student', 'true', NULL, '$2y$12$dAQ/7ABOU9RutbmAnaHf1.g6og3waSNomBKqc5CK9/D3aUp4nbYBC', 372, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(781, 'Mr. Darrion Sauer', '940.716.7405', '+19282402975', '62329 Reagan Trafficway Suite 887\nFrancisfort, MA 95197', '1999-06-15', 'Qui aspernatur fugiat occaecati natus.', 1, 'fatima.rohan@example.com', 'student', 'true', NULL, '$2y$12$l6GFBB3WMNJf1I1nmIpLdei3paChjb9VT0vt5X/qCK64nAHGBj3p6', 147, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(782, 'Jazmyn Cartwright', '+16603178661', '(878) 423-8534', '104 Considine Mews\nNorth Nicholaus, VA 12122', '1990-03-23', 'Nihil sit quia quisquam culpa et soluta.', 6, 'jacquelyn.feil@example.net', 'student', 'true', NULL, '$2y$12$ebYqOp4MwIkAKcXmOW4xeuJBsctRQP/qP/YszjicJw2UMxvUbo5MS', 995, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(783, 'Ben Larson', '+1-517-293-9061', '+1.650.285.3818', '2435 Dorothea Stravenue Apt. 688\nFriedrichmouth, NC 50709', '2020-12-22', 'Excepturi cum animi repellendus voluptates sed modi cum.', 3, 'schumm.vaughn@example.com', 'student', 'true', NULL, '$2y$12$sgJ9aB6.BJRd6yYmlaOVQ.IlNWJQG3T0cfGF0JW0O/UHrpYnSBJem', 792, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(784, 'Narciso Jones', '+1.845.633.3044', '+1 (775) 548-3763', '53989 Christy Circle Apt. 788\nPort Jaidenfort, DC 65222-7113', '2023-07-10', 'Corrupti voluptatem at ut enim iusto doloremque.', 2, 'joel35@example.com', 'student', 'true', NULL, '$2y$12$1jobAvmEset72JxJgAGy3eUaBM1WCd/EogBMQbviLzPYFM04hDWru', 644, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(785, 'Ryley White Jr.', '+1 (480) 475-8199', '+15189681624', '2727 Alene Spring\nReedton, IA 85315-0385', '2006-05-22', 'Id quisquam corporis qui ea dolor sequi voluptates.', 1, 'stracke.koby@example.com', 'student', 'true', NULL, '$2y$12$OAFOzpkBa6it5MPKIQLAteaExfYkVI9cFzjcTBW3ygSADcq7Z2YvS', 100, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(786, 'Marquise Larson Sr.', '(301) 504-8411', '434-425-3547', '79085 Brekke Turnpike\nZiemestad, UT 50084-0102', '1975-08-30', 'Porro sed itaque voluptate rerum ut.', 5, 'denesik.alfonso@example.net', 'student', 'true', NULL, '$2y$12$HcNFHBdiWio8YCgfUDasMevCiPcOMmYohcg5kV6Q372RfB4HZgcby', 184, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(787, 'Gladyce Kemmer', '+12485793202', '+1-956-590-2684', '606 Andreanne Island\nAlisaview, NY 81959-4701', '1991-02-06', 'Et non accusantium aut officia occaecati odio deleniti.', 5, 'sammy.koch@example.org', 'student', 'true', NULL, '$2y$12$eUeDWCRX2AwfgMu8dQOs0uyKwqPUCEU0tBsaWRKxbTRGZls2zy8Fy', 78, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(788, 'Ofelia Quitzon', '978.247.2941', '772-831-9194', '8018 Okuneva Heights Suite 358\nIanbury, IA 80666', '1993-09-17', 'Dolor voluptatibus et corrupti eius ducimus ex.', 6, 'lemke.samantha@example.com', 'student', 'true', NULL, '$2y$12$lvpPgml.8vgSfxMHrEkkDuQbPzJTntMFnPNFanfGP4lVIgjaUgCae', 760, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(789, 'Sadye Kassulke', '802.950.0707', '(650) 990-9836', '570 Stroman Flats\nHillsfurt, ME 53497-0663', '2022-02-06', 'Dignissimos rerum et aperiam amet.', 2, 'mbergstrom@example.org', 'student', 'true', NULL, '$2y$12$Gwwcw4CfQ761m8orVlR1Gu0PHiwL6QCKhNRyfZ/Xi2fsNVv7M/WZC', 458, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(790, 'Kayleigh Veum III', '1-601-965-3167', '1-747-353-9751', '32674 Cassin Plain\nEast Myrtle, AR 48579-0034', '1975-03-16', 'Consequatur dolores et quos cupiditate.', 3, 'dvon@example.net', 'student', 'true', NULL, '$2y$12$feDmMpbUjcxV5mSbhj3qhOdmEtaa.cMPKSurEGyzcpBdf6pvJMZka', 674, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(791, 'Tessie Kassulke', '463-760-1564', '1-743-257-7163', '54010 Bayer Turnpike\nNorth Kristofferbury, CA 49039-6156', '1986-02-28', 'Consequuntur repellendus et ea nostrum quaerat sit.', 2, 'langworth.kaylee@example.net', 'student', 'true', NULL, '$2y$12$d.E9nRJYFEygJ0bLLaYy6.y84GrSyZwPFg83puveZWJTgJ2LBb1qW', 25, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(792, 'Filomena Gutkowski', '1-737-375-8112', '1-718-689-8924', '5707 Waldo Passage Apt. 185\nCassidytown, VA 33940-4870', '2004-08-22', 'Quae sint et provident quas ab qui.', 6, 'nhansen@example.net', 'student', 'true', NULL, '$2y$12$6Dj2i98gywofUyTYMgJS6uQ42QyIpItIOlVMKe4cyHRrwAuzyxszS', 792, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(793, 'Ruben Ritchie', '843-735-5551', '224.316.4598', '367 Heath Landing\nNew Liliana, MT 83689-2700', '1998-04-10', 'Quasi et vitae itaque pariatur.', 0, 'anastacio.goyette@example.org', 'student', 'true', NULL, '$2y$12$pcZWpcUeipfDdl6Jq9qQX.XfmRSkja6EGjyFEdSNE9DxWDZtACgZG', 981, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(794, 'Prof. Dandre Yundt', '918-704-9468', '(662) 272-7809', '2250 Abshire Circle\nReichertland, KS 35657', '1995-11-06', 'Voluptas quos molestiae quidem unde voluptatum modi maiores ab.', 5, 'camron12@example.com', 'student', 'true', NULL, '$2y$12$jsMjBXWtL.HsUpWbEffanuhs2kL4JP7iN3lWY6kSgrIo8YEvCPAQ2', 474, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(795, 'Dr. Desiree Gislason DVM', '720-893-2108', '+1-678-996-6695', '841 Barrows Shoal\nGinoberg, ME 98360-9306', '1971-05-23', 'Itaque ab tempora sequi repellat est.', 1, 'lesly50@example.org', 'student', 'true', NULL, '$2y$12$kQKXTvSM1eilxKcFjGedEuzObyN3ybZoQ/Bax2QZDvsFslb1.ODzG', 366, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(796, 'Prof. Shea White', '1-907-395-5806', '+18548204294', '677 Trevion Square\nAramouth, TN 90727-5345', '2013-02-10', 'Quia nisi nihil expedita qui praesentium voluptatibus repellendus.', 7, 'ernser.kay@example.org', 'student', 'true', NULL, '$2y$12$pWENrgQHVPkgyyUCUZRFXO0hizMNoiLcPUQ6s5gav0YUTccFmH6h.', 132, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(797, 'Dr. Joseph Torphy III', '+16039787484', '1-346-206-9044', '2957 Macejkovic Junction\nSawaynside, VA 88462-9514', '1987-03-31', 'Dicta occaecati et assumenda.', 6, 'drolfson@example.com', 'student', 'true', NULL, '$2y$12$/16A20rzXTZ921yE50xNguNn6hvDM7mlZ7UF2O5SGXLIjF17T1Pvm', 285, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(798, 'Walker Kling', '+1.870.381.7737', '+1-878-629-2015', '16700 Rudy Cliff Apt. 798\nLake Brian, UT 70808-6712', '2017-09-24', 'Qui enim et iste.', 8, 'jimmy.reynolds@example.org', 'student', 'true', NULL, '$2y$12$ieRsX.G8TilWxFQjcK3DHOtE2HBcczdjZJpwA5bobyYOmxKxGOxQu', 664, NULL, '2025-03-03 19:09:15', '2025-03-03 19:09:15'),
(799, 'Zoey Ferry', '978-479-5627', '(986) 898-4565', '33775 Funk Summit Apt. 393\nRoscoebury, OK 64012', '1970-06-26', 'Occaecati libero possimus in incidunt iure.', 0, 'julio08@example.net', 'student', 'true', NULL, '$2y$12$RxiTzrRKFN8Paiyqjw7JdeHBOktrvuAgkUZtjm4yCxYOSK55rUCIC', 919, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(800, 'Mrs. Michelle Zboncak Sr.', '(385) 627-4934', '1-630-661-0869', '2255 Daniel Corners\nNorth Ladarius, MS 43839-5260', '1974-12-23', 'Suscipit quia optio ipsa vel.', 8, 'vframi@example.com', 'student', 'true', NULL, '$2y$12$YbRy5.rfevfU9bA5MFcTauTMpd7Xe0Wk7eCXWVM0mgMb2tBKbauaW', 341, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(801, 'Gina Hills', '(936) 562-6949', '820-359-8286', '87702 Howell Spur Apt. 302\nNorth Ransom, MA 19153', '1981-05-14', 'Dolorem alias consequuntur qui odio rerum sapiente.', 4, 'mreichel@example.org', 'student', 'true', NULL, '$2y$12$bT/TCYgDYt1xDaTTZoGU1OTdjqAsVk7jOA9XRk6d.q6Q4uJ/q4cri', 924, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(802, 'Sadye Corkery', '(906) 517-6515', '984.543.3902', '8552 Marc Bypass Apt. 980\nKrajcikbury, ME 57712-9177', '2008-02-22', 'Vel ipsam eligendi atque dolorem et.', 6, 'murray.mcglynn@example.org', 'student', 'true', NULL, '$2y$12$tfF0MJrb1wBXP31GgjRoWOLEpc4H000lMgjVj7zlDTASJTaaCZRUG', 189, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(803, 'Hubert Ritchie', '(541) 265-7096', '956.343.3049', '844 Pacocha Island Apt. 335\nManteborough, KS 47763-9095', '2017-11-02', 'Eaque velit asperiores voluptates mollitia.', 6, 'gkuhlman@example.org', 'student', 'true', NULL, '$2y$12$linVbBX1dXRXWqB9NDeAZeC/I/pxWkNAtbSZ8w1iGeObKSvAUzeaG', 952, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(804, 'Linnea Grady', '+1.912.896.9457', '+19792354544', '43828 Carter Ramp Apt. 434\nWest Kiara, DE 63214-7884', '1983-04-21', 'Dolorem eum vel natus iste et quibusdam debitis soluta.', 0, 'veda.rohan@example.org', 'student', 'true', NULL, '$2y$12$YS3xfjhRkAlH7OivByw9Be/KUT5jqtQbRjdxsH7QdwFlDVAzR5nlS', 370, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(805, 'Margarete Bartoletti', '774.306.3621', '785.831.9480', '3679 Gusikowski Avenue Suite 309\nSouth Jeramie, OK 63303-9695', '1974-06-30', 'At tempora dolorum enim quod mollitia impedit cumque in.', 1, 'era54@example.net', 'student', 'true', NULL, '$2y$12$Oy0EOCUuEruL5xdLaAumHOJ/xiP/5S3yEuqE8VnpAdBVAcwz/GhNu', 890, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(806, 'Mr. Edd Koepp I', '934-629-2155', '+1 (854) 736-3523', '2557 Gleason Island\nWest Traceport, IA 00266-0530', '1995-07-07', 'Consequuntur odit ut suscipit eveniet ratione ratione.', 4, 'heaven.goodwin@example.com', 'student', 'true', NULL, '$2y$12$paN5j7IkytfvfTYB9kLwie53r0W8xV4hKRE/O520QlXhNcnHqtxvy', 441, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(807, 'Garret Walsh Sr.', '(646) 784-5684', '1-760-800-1719', '29176 Kareem Park\nHomenickborough, LA 31208', '1978-09-04', 'Illo laudantium adipisci sed eaque repudiandae ea molestiae non.', 5, 'chauncey10@example.com', 'student', 'true', NULL, '$2y$12$0xW11B/HIw8wpUJSfpDmnuvPRy0VmV6R8T1x/EfZe8p1tFptU5cq2', 858, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(808, 'Mr. Alexandro Gutmann', '631-600-8602', '423-857-1513', '927 Stan Terrace Suite 278\nRowlandfort, DE 17738', '2015-05-06', 'Tempora facere sint recusandae ex inventore sint qui delectus.', 7, 'lconsidine@example.net', 'student', 'true', NULL, '$2y$12$0LLyBfW.3AKk8RyobvMBJe3Uc.jARNPsh.ifSQdZsYzhhGOgXG.QS', 643, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(809, 'Jared Wolf PhD', '1-559-952-7010', '1-520-708-5406', '53410 Marian Field\nPort Larry, FL 19251', '1975-02-02', 'Deserunt veniam quibusdam eos et temporibus quas ut.', 6, 'ozella.mueller@example.net', 'student', 'true', NULL, '$2y$12$h7HrEM/9ADIrn7WUlRe/6eZhKQDT7BXBiojMyQo4YZX0GaCrL4RhG', 616, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(810, 'Maureen Goldner', '563.376.7561', '(947) 417-8553', '49380 Madie Pine Suite 211\nPort Bruceland, WV 06733-5968', '2000-06-08', 'Totam odit molestiae nisi officia.', 2, 'iratke@example.net', 'student', 'true', NULL, '$2y$12$c5F1xTrGdplNQP1Pc8.boeat8h4AtXIfw7P7TL9ATjgGHslliMdYe', 664, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(811, 'Donavon Thompson', '(734) 361-6188', '(413) 981-0472', '6848 Hane Roads\nLysanneburgh, ID 78309-3238', '2019-11-27', 'Commodi perspiciatis blanditiis quis recusandae quia sed incidunt nulla.', 3, 'bart17@example.com', 'student', 'true', NULL, '$2y$12$RbNFAe5f5H2Em4kEEBiOMeVz9RUg.6LQcCZ1DCsT00Tgt8OeSlaQa', 41, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(812, 'Hayley Koelpin', '917.778.5373', '(805) 441-4505', '700 Larkin Avenue Suite 893\nEast Lillatown, ME 82593', '2008-12-27', 'Ipsam et veritatis enim sapiente qui vel.', 9, 'belle80@example.org', 'student', 'true', NULL, '$2y$12$Z7Yr8ylxJjZA0EGGJNdR4.3DJjoE5jCPk1GoMJ/BgCPhuS2I7y1la', 32, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(813, 'Angelina Dickens', '+1.540.291.5833', '(564) 762-0833', '7247 Kihn Greens\nKrisshire, DC 14530-1750', '2014-11-14', 'Quibusdam ipsam quasi officiis quis alias qui.', 8, 'bill.bergstrom@example.net', 'student', 'true', NULL, '$2y$12$8bsbLlJn4jvaIRZiKRWu/.jNVcbtI/6culsBPU1/rwman3RskBgBm', 247, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(814, 'Cordie Hermiston', '+1-346-880-4998', '405-959-7380', '709 Zulauf Spurs\nConsidinestad, GA 45816', '2022-02-01', 'Autem ratione eveniet nulla magnam asperiores est voluptas.', 3, 'andreane.kilback@example.org', 'student', 'true', NULL, '$2y$12$tEU/p1AcbvFzQzD8U5nYcuejSd6l5nciZmx7COpYF6l6QOTqMdbDy', 101, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(815, 'Samanta Heidenreich', '+1-762-227-8810', '+1.270.229.9502', '64440 Shakira Circle\nHellerburgh, DE 15506-4706', '1993-06-01', 'Vel odio laboriosam mollitia.', 1, 'everett.hintz@example.org', 'student', 'true', NULL, '$2y$12$nIg3sIrVL6.p/jWci.C3A.U8zsjSZQPdHOpda.HAblE9vjVRQ8Kt.', 612, NULL, '2025-03-03 19:09:26', '2025-03-03 19:09:26'),
(816, 'Mr. Mark Monahan', '+1.765.276.8147', '+1 (341) 902-3437', '65540 Skiles Ford Apt. 254\nSouth Micahside, TX 89296', '2001-10-10', 'Iste et magni reiciendis sapiente modi numquam velit minus.', 2, 'adalberto82@example.com', 'student', 'true', NULL, '$2y$12$yCiO.8OjNY6mY3gE1BaPCuJSYrZkO5nqqw/ZHHH.Uy8A55htknQqO', 259, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(817, 'Georgiana Ratke', '+1-434-535-9249', '678-247-8578', '291 Omari Alley\nBernadineview, DC 88201-9146', '2013-03-07', 'Ut esse ducimus laborum eius laudantium.', 9, 'muhammad.deckow@example.net', 'student', 'true', NULL, '$2y$12$Gr1iOw1ngH0HIm5taLtwM.WGzKjjw9vkz41G50H2E/t4B9gM6tr/G', 158, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(818, 'Prof. Rosa D\'Amore', '1-657-942-8292', '478.237.8544', '984 Monahan Canyon Apt. 211\nKennedybury, WV 28472', '1995-04-25', 'Nihil placeat ab in tempora architecto sapiente repudiandae.', 0, 'halle14@example.net', 'student', 'true', NULL, '$2y$12$NIlsnN2XgdK5HgTUT4fgreYjBCSbOelamqW6nIkbsSLeF6URcZUBK', 440, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(819, 'Prof. Tracey Hayes DVM', '341.273.2852', '+13237419256', '5015 VonRueden Camp\nWest Demetrius, SC 32192-8732', '1998-12-25', 'Autem qui qui omnis aperiam esse.', 3, 'vkilback@example.net', 'student', 'true', NULL, '$2y$12$KOCPUTQe23dcDrov.jcGJeYmPpvcKY.tYPKscuDp5Y20ORrGV1G2.', 93, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(820, 'Anne Waters I', '765-971-7430', '1-567-753-3301', '4911 Erdman Meadow Suite 376\nMaiatown, HI 90542', '2011-04-19', 'Et architecto impedit rerum dolores.', 4, 'eokeefe@example.com', 'student', 'true', NULL, '$2y$12$PWqTLrvANCYQFFoSjwHFhucMFZCFWTeGHmIdjncW5/mRn8HBNtQmm', 746, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(821, 'Etha Hettinger', '+1-908-567-7575', '240-965-6832', '201 Veum Villages\nJaylinborough, AZ 09136', '2001-06-07', 'Ut dolorem tempore tenetur quia omnis et repellat.', 3, 'oceane46@example.net', 'student', 'true', NULL, '$2y$12$1RcPFPMpc2415IBRUa2zeO1FTwhJpKW7VFS0HPOAr/Sbbv2O5euvW', 766, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(822, 'Mozell Schultz', '+1-970-658-4169', '341.846.8726', '2612 Misty Orchard Suite 947\nRobertsville, NJ 35417-3466', '1975-08-14', 'Quisquam in molestiae aut optio velit similique.', 9, 'jessyca.crona@example.org', 'student', 'true', NULL, '$2y$12$zdx6CNgwb7Tz1tpiIjsHYezlSZx9A5TJ97/DATqqIdyKRRAqFB5SS', 377, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(823, 'Kenyon Towne', '586-637-7417', '+1-716-612-5590', '1989 Blanca Summit\nEvieberg, AL 33769-1298', '2009-02-26', 'Neque voluptatem quis totam mollitia ipsam.', 8, 'kylee18@example.org', 'student', 'true', NULL, '$2y$12$1lKpjRPy0dn0k/mSiHtjNuEUsqtKeVI1vbAmDfJ9d.k61v9K/YxQm', 346, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(824, 'Heath Schamberger', '+19086086294', '(256) 858-9584', '15110 Schroeder Junction\nNorth Janessachester, AK 94472-4308', '2025-02-25', 'Tempore reprehenderit hic maiores.', 7, 'vturcotte@example.net', 'student', 'true', NULL, '$2y$12$s5r2I7QYJDVjRbmdYSnC4O02HPPQeh8JnsBURgCAp4PUKKup8fenS', 795, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(825, 'Prof. Gilbert Walter', '838-881-1817', '+17725271532', '6954 Cole Mews Apt. 778\nSouth Mireya, MS 52496-5165', '2021-02-11', 'Commodi nihil corrupti neque quis consequatur.', 9, 'ardith.smith@example.org', 'student', 'true', NULL, '$2y$12$5Bju2/oFuqTtdEly0Fi/W.YJVh5bG9.km7wvxDs372MqOwVZLw.ZC', 839, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(826, 'Kennedy Sauer', '+1.608.714.8228', '+1-458-572-3783', '1037 Pollich Courts Apt. 121\nNorth Pierre, ID 42803-4040', '1971-10-01', 'Asperiores mollitia voluptatem sed dolore dignissimos illum sequi aliquid.', 0, 'breanna.conroy@example.com', 'student', 'true', NULL, '$2y$12$D5juTM4dcpacwluh0V7KPe7djetq/iIenyA95MIm9YaeqaXxe4Iz2', 757, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(827, 'Hilma Koch', '+1.513.750.3187', '+1-732-729-0977', '6946 Luella Brooks Suite 914\nNorth Dianaside, OK 62236', '2009-08-17', 'Quasi et ipsum quidem dolores numquam.', 8, 'curtis.gulgowski@example.org', 'student', 'true', NULL, '$2y$12$YrduPX/SKZNaDAeplzMDFut/Y/SazW9cHTzBCoHb78bq3defriYYe', 887, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(828, 'Dana Turner', '(669) 548-0269', '1-938-372-0047', '264 Edwin Roads Suite 890\nNew Alishamouth, OR 98783', '1984-11-14', 'Cumque rerum ducimus quam modi debitis.', 6, 'wyman.saige@example.net', 'student', 'true', NULL, '$2y$12$nNlxdE/iAEM13XiSDhDCw.HF5qvvPpPtlI601uY.q6flnund6Eqnu', 921, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(829, 'Althea Bayer', '(270) 337-8680', '+1-360-384-1803', '17956 Koss Divide\nEast Koreyland, NM 59345-5877', '1973-06-28', 'Explicabo et mollitia perferendis ipsa aut officiis pariatur.', 8, 'randall.sporer@example.org', 'student', 'true', NULL, '$2y$12$dchHwMez.aepmgXWkic60O24wcwauRu/6p6AGYArNAsWF0TPrtWr6', 102, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(830, 'Gust Nader', '463-893-4115', '270-474-3206', '7843 Yadira Crossing\nLupemouth, NJ 21309-0028', '1975-10-27', 'Numquam totam cumque cum id.', 3, 'xernser@example.net', 'student', 'true', NULL, '$2y$12$8j0FEtVDwHWj5p9J9WDfheUUyJO41J8X0UGqWr7qO4WYPIDkk1PXy', 862, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(831, 'Dr. Moises Jacobson', '(872) 448-0606', '612.875.6718', '62400 Marisa Island Suite 577\nPort Vernerbury, AK 30960', '1990-02-11', 'Est voluptate fugiat beatae vero totam aut doloremque.', 5, 'luettgen.vallie@example.net', 'student', 'true', NULL, '$2y$12$gs9lATM3CD4AO8pavrTDweu9UNijujdS./XckF0zKTHt646N5Da32', 432, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(832, 'Ivory Bode', '283.601.5673', '734-294-5115', '29857 Jillian Mountains\nSouth Antonetteport, IN 19515-5866', '1972-06-03', 'Aut ea laboriosam ex omnis ipsam vitae.', 0, 'eunice.larkin@example.com', 'student', 'true', NULL, '$2y$12$fAXKWN77T1is2WTzr.NaCuhbiAWDDPrcY4dYY4262HOdKx5Ls0teq', 194, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(833, 'Samanta Stehr', '(720) 868-0392', '(480) 972-9499', '9964 Rath Parkways Apt. 793\nNew Anastasia, DC 09767-9523', '1972-10-10', 'Inventore labore totam voluptate similique.', 8, 'hickle.steve@example.com', 'student', 'true', NULL, '$2y$12$1c.f.vtpW/E8oHgHapHieOT0W/Q/5aRl/C9KA/pQ6L0tDQzqQ38wC', 914, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(834, 'Leilani Kihn', '+1.478.323.1160', '+17034292191', '52148 Rosemarie Court\nNorth Dalton, AR 35671', '2008-04-21', 'Molestiae voluptatem cumque repudiandae ut rerum sed.', 9, 'hjohnson@example.org', 'student', 'true', NULL, '$2y$12$7EFACvwJwZVIRRfihph3wuj/K28ecyphiIwdYKGC13KxW4tNqM8oG', 832, NULL, '2025-03-03 19:09:27', '2025-03-03 19:09:27'),
(836, 'Dr. Mckenzie Langworth', '307-480-6195', '+14123171199', '9794 Ted Shoal\nFeestside, NH 66423', '1987-09-08', 'Ut est tempora veritatis porro.', 3, 'ochristiansen@example.com', 'student', 'true', NULL, '$2y$12$23xoJEDBVmhEAFwt0ud8FO4Rbjb13LqSwFtwCCJI/sJQx9XJ3nJLq', 65, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(837, 'Dr. Faye Crist', '(346) 841-5031', '330.448.0403', '23546 Stephon Throughway\nWestleymouth, OH 55562', '1985-11-16', 'Qui fuga amet numquam consectetur eveniet.', 5, 'price.norwood@example.org', 'student', 'true', NULL, '$2y$12$YjVerfm/1lg6rYMd5J.et.1BhDGj4gPU7aKsU3Gn5kc3Me8B7iUzq', 607, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(838, 'Miss Catherine Yost', '(878) 905-7995', '(848) 470-0070', '51676 Schroeder Square Apt. 383\nRunolfssonside, NJ 38347', '1973-11-12', 'Ut magnam id enim autem nostrum veniam id.', 5, 'heber.dickinson@example.org', 'student', 'true', NULL, '$2y$12$aW5pZfznywhV7pY4CSsrtuVwEboIemQrUJlxXUmvtD5k26X7CrTEq', 134, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(839, 'Dakota Wilderman', '+1-430-860-1855', '(731) 545-1801', '41808 Ebony Island Apt. 420\nHaydenmouth, RI 24770-7076', '1989-08-22', 'Ab ea et et ipsum sit a.', 5, 'jana72@example.com', 'student', 'true', NULL, '$2y$12$aKyBtZaPyJLOAb8Eje5I3O6S84GNTjtzIwfEBHGvL1CZaT0t4NRkq', 731, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(840, 'Lonny Pfeffer', '1-678-909-8215', '+1 (509) 769-9089', '143 Mae Highway\nSherwoodport, OH 75569', '1997-07-16', 'Quis dolores qui illum dolorum quas.', 5, 'tremblay.jerel@example.org', 'student', 'true', NULL, '$2y$12$hwgJTbz0fX5hwSPn1eFsdO.h9jCyLexV.g9vF7dJRkvZww9DfK2Pi', 104, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(841, 'Prof. Kendra Abshire', '651-542-5815', '+1-585-979-3909', '253 Casper Loaf\nGradyborough, CO 66951', '2016-01-22', 'Maxime est facilis corrupti perferendis.', 9, 'iliana09@example.com', 'student', 'true', NULL, '$2y$12$RAgYIUYnzpC12Uk11MWJiuCQYs.n6tSh3G3FikVMGRkGUcNFQ0FWC', 378, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(842, 'Dallin Kuphal', '(970) 533-1646', '+1-270-812-9317', '2829 Monte Valleys Suite 763\nSatterfieldland, LA 94671-4431', '1978-09-22', 'Nihil deleniti ex voluptatem accusantium.', 9, 'libbie.goldner@example.net', 'student', 'true', NULL, '$2y$12$Aa8VVwVIN/r01mEuGFAlkuSH8I/ZeQW2yWCS9QnveWe4US5aE7rTq', 979, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(843, 'Torey Daniel', '(913) 423-7979', '+1-713-492-4694', '50413 Uriah Mountains\nPort Earlene, VA 75847-6794', '1971-10-16', 'Excepturi earum rerum quas et.', 5, 'heath.swift@example.org', 'student', 'true', NULL, '$2y$12$N.ScrPfVieoH/q.tOfzaVulQG5Mk4r9O6atlyCmmbW92TroJSzPgC', 561, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(844, 'Anne Powlowski', '(603) 848-3237', '352.252.8188', '6988 Boehm Port Apt. 115\nNew Carlosmouth, DE 58686', '2004-06-27', 'Harum accusamus quod non et eligendi asperiores earum animi.', 1, 'vandervort.cale@example.net', 'student', 'true', NULL, '$2y$12$Mns/F.y50hQ5GrR7NNqk8uLkhdkhoB0/x43UtTV7lLxEt0Dz61mKe', 194, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(845, 'Malvina Cummerata', '+1-505-827-6922', '+1.650.423.7280', '546 Walsh Turnpike Suite 955\nAbernathyton, MS 97465-5312', '2005-10-10', 'Excepturi libero iste sit qui voluptatum.', 4, 'edmond.thiel@example.com', 'student', 'true', NULL, '$2y$12$4mmhAMUKURS3RaCip9duAuluYYWxr4cNjNTg/FevNdCJooDeOtbMe', 495, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(846, 'Clement Torp', '1-956-619-4140', '(570) 383-2931', '12694 Brakus River Apt. 801\nSouth Ezra, NE 98657', '2018-12-25', 'Ratione voluptatum omnis ut sed omnis.', 7, 'kkassulke@example.com', 'student', 'true', NULL, '$2y$12$/ytCj/2i6uMbgcVOwIoBgO2qydkjStmi6cvsUf2GIxolFxkjKl90y', 90, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(847, 'Tito Huel', '1-646-265-5148', '(707) 349-2203', '40305 Ned Creek Apt. 716\nAnkundingville, ND 26879-1354', '2022-05-09', 'Reiciendis laudantium est ducimus.', 5, 'kstreich@example.com', 'student', 'true', NULL, '$2y$12$CaYJgoTOFAxSnyN.yLRKCOcghdBovgC7OgFvUfmUgZtWGNXmkYoae', 962, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(848, 'Grover Mayer', '409.831.7628', '602-904-9169', '606 Gust Ports Suite 949\nEast Claudeport, NH 93464-0352', '2013-09-07', 'Id natus sed rerum rerum natus dolore.', 0, 'zion32@example.org', 'student', 'true', NULL, '$2y$12$qV9N1wVpmyFJVaFkNQdVZuriksKAfMpjTeoZOScpY7yKpPVU8ulqS', 923, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(849, 'Elwyn Russel II', '+1.820.778.3651', '971.713.3908', '8489 Karen Center Apt. 187\nPort Otho, VT 76824', '2009-10-08', 'Modi vel enim natus esse.', 0, 'albertha.boyer@example.net', 'student', 'true', NULL, '$2y$12$2rQbc93HXEqPZGnZRHLLZe3u18sPUKmMe4s13uA8VR3C0pe1mLQ/m', 939, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(850, 'Nestor Botsford', '+1.251.951.6381', '1-231-738-8577', '91410 Narciso Ridge\nNew Hershel, TN 24618', '2023-11-07', 'Vel aspernatur sequi incidunt nisi.', 0, 'pwunsch@example.net', 'student', 'true', NULL, '$2y$12$8fns5tNi.ATguZy6a7wcOuft9uRfOz1FtFjtzNE/a1Fc8nOyhzYKa', 832, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(851, 'Al Hettinger', '541-567-9027', '(320) 735-0439', '59858 Denesik Drives\nPort Stephanie, NH 97293-5623', '2008-08-02', 'Nobis voluptates eligendi quis.', 2, 'laurel45@example.com', 'student', 'true', NULL, '$2y$12$XjOZn0VIlXGN6wz8DkWUCeEJbo23fDCPA9fU.brc3//n7Ec9Z3.oa', 610, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(852, 'Ms. Cordie Bogisich', '1-207-732-6997', '+1-878-637-3758', '541 Cornell Parkway Suite 924\nEast Tillman, WI 23150-8829', '2020-02-25', 'Impedit nam enim neque omnis esse sunt.', 4, 'myron.schmidt@example.net', 'student', 'true', NULL, '$2y$12$x9Qppz5Ln/RAR960mBne8.l596KSmLxwTPqKJ2EVVmiiUIgb0SkcS', 871, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(853, 'Mr. Rhiannon Rogahn', '+1-863-270-0772', '(754) 678-5430', '143 Moen Landing\nBeierside, AR 30016', '2019-10-13', 'Reiciendis similique omnis optio similique enim placeat.', 1, 'cali.schuppe@example.org', 'student', 'true', NULL, '$2y$12$La1yIFqCr2N70MxqGT.8ye.a8NyE/oADbMSkEBXkfnGEw/7iFjthS', 889, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(854, 'Dr. Bartholome Harber PhD', '959-926-8500', '(602) 674-6318', '2184 Mayra Estate\nDonfurt, MS 71694-6188', '1987-10-31', 'Sunt et voluptatem nam ipsum non ut.', 9, 'gusikowski.ashlynn@example.net', 'student', 'true', NULL, '$2y$12$3joRZ0eE8tZ/98dfZ0iZiOH58WEhE2hUGNXc3NLB5w5.rykdNewKO', 981, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(855, 'Dewayne McLaughlin', '1-678-584-0712', '+1 (315) 655-3134', '93070 Heaney Squares Apt. 064\nSouth Lydia, MS 03973', '2002-04-15', 'Corrupti dignissimos a et qui cupiditate repellendus.', 9, 'hirthe.barney@example.net', 'student', 'true', NULL, '$2y$12$JRkPx9QoKdkk5Q3FpSy0hukVRiIiUsJ5nsb1QhTseUNqwA90NHQYy', 785, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(856, 'Bridgette Boehm', '913.966.1156', '(503) 707-5805', '463 Walter Mission Suite 991\nPort Melynastad, ID 89161', '1994-05-30', 'Est ut nisi nam ratione.', 7, 'amelie.leffler@example.net', 'student', 'true', NULL, '$2y$12$IoRaBrTLgfDiLvRuWcYpxutn5UZFWWHzjbhH50IGCaiLEUnqcyNxS', 770, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45');
INSERT INTO `users` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `about`, `group_count`, `email`, `type`, `status`, `email_verified_at`, `password`, `balans`, `remember_token`, `created_at`, `updated_at`) VALUES
(857, 'Annabell Mertz', '870-455-9708', '308-908-5645', '5597 Watsica Stream\nTimothyville, OK 87616', '1988-09-05', 'Qui cum dignissimos tempore aut sunt dolor consequatur.', 8, 'wilhelmine90@example.org', 'student', 'true', NULL, '$2y$12$nGsluKrfUfTL839a5RUUce4J8FTmQf1oASmdZy.weFyc4v7IxZI5C', 539, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(858, 'Watson Stoltenberg', '480.255.7901', '+1 (503) 701-4782', '185 Ofelia Camp Suite 773\nWest Rubyeland, RI 07313', '1999-01-03', 'Tempora voluptatem quisquam est vero autem.', 0, 'stoltenberg.roberto@example.org', 'student', 'true', NULL, '$2y$12$/ipM6PRbMn8qWR8BG4siTO8gq27Wd2LTeqCSlopNMzl564cR45fky', 951, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(859, 'Hertha Barrows', '+1-408-905-5546', '+15092753884', '710 Cummings Via Suite 201\nWest Esmeralda, VT 93863', '1988-08-04', 'Inventore incidunt nemo error ut.', 4, 'clotilde.treutel@example.org', 'student', 'true', NULL, '$2y$12$s66UIXzYv7YE7NA.gZ1HVu5dqHwBS17W8yCahn86mPKo1vqKLcSai', 903, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(860, 'Isabell Conn', '+1.743.817.4473', '727.291.6931', '54817 Jarvis Route\nSouth Aliyahchester, WI 73765', '2015-03-26', 'Laboriosam repellendus nam aspernatur.', 5, 'eschuster@example.net', 'student', 'true', NULL, '$2y$12$fkIsYeehujsjXfzePgEbbeIgUt5s4mn7mHQHiMFngHZvTRGJMkque', 173, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(861, 'Maude Dickens', '(870) 226-4248', '+1-863-898-9459', '4447 Fisher Unions Apt. 122\nPort Delphiashire, AK 57520', '1985-02-06', 'Occaecati aliquam voluptate iure sunt nulla.', 3, 'lowe.frank@example.net', 'student', 'true', NULL, '$2y$12$N/e4OpOZQUlltl.SBLhi2eZRikvK3Ltczzy7DC2D/05a0ZBZz1TKC', 180, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(862, 'Jeanie Mayert', '+1-747-849-0836', '+1-317-903-3795', '5532 Everett Square Suite 326\nVestaton, IL 47115', '2007-02-26', 'Similique at exercitationem ad ut labore.', 7, 'huel.barrett@example.com', 'student', 'true', NULL, '$2y$12$JRsWKSO8YQaZSdPhEvfJnO24uZLfO5ini.AYedBQtxFBK9XWI/siS', 589, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(863, 'Prof. Georgette Feeney', '(539) 724-9936', '930-990-2883', '50695 Runolfsson Lodge\nWest Allanbury, TN 18446', '1982-03-30', 'Cupiditate rerum deserunt quaerat delectus dicta deserunt.', 9, 'gutmann.vaughn@example.com', 'student', 'true', NULL, '$2y$12$kk4ZhkqmkVq9ub2IGm/fQOJAtecwNycdDPRV.MNB8Zs5rJrDiV0v6', 902, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(864, 'Blake Cruickshank', '1-828-872-4764', '(727) 933-8239', '3648 Kling Fields\nPagacmouth, LA 15954-0696', '1991-01-12', 'Et qui voluptate corrupti.', 4, 'gregg82@example.net', 'student', 'true', NULL, '$2y$12$YtdikocWvXKYBE8hRoV9xuavjhfHleYRMeZxr.KikRmZoGU66aRIK', 316, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(865, 'Cathy Feil', '347.497.8495', '1-717-601-0535', '8546 Marks Drive Suite 492\nDeannabury, KY 88740-0596', '1978-09-15', 'Reprehenderit eos eos consequuntur vitae autem vitae.', 2, 'will41@example.org', 'student', 'true', NULL, '$2y$12$1SbvgXNn.c5IEiecII.KJuNUjAlvfjIG.BeAN2IzllHccFknKPCtW', 627, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(866, 'Dr. Quentin Miller V', '608.204.9994', '(484) 571-7728', '7120 Alison Cape\nMorissetteside, WV 44947-5850', '2005-09-12', 'Consequatur quis veniam consequatur nam perferendis fugit exercitationem a.', 5, 'jast.daphney@example.com', 'student', 'true', NULL, '$2y$12$lY58KdDCGBOF6xURP0nnTeDu31nphYVSh0T9ZAxFS78UueYUZLPYi', 412, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(867, 'Okey Cassin', '260.975.4367', '+17549945886', '340 Savanna Orchard\nShanahanland, VA 86102', '1972-03-23', 'Vel unde et labore expedita et deserunt.', 5, 'june70@example.org', 'student', 'true', NULL, '$2y$12$F90uz6hQrERqohnJeGGlROxp1F2SasILwu1I9mfUuGHCO9vk/SyhK', 144, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(868, 'Dr. Lambert Donnelly III', '+1-747-634-5319', '(754) 577-9144', '8750 Runte Track Suite 695\nLake Antonina, KS 30957', '1982-12-27', 'Veritatis rerum dignissimos quod corrupti quia.', 0, 'von.marlene@example.net', 'student', 'true', NULL, '$2y$12$YUuxb4VTmJI8MO3ZOt6kTeXomZterG7ITCwb3uQCxgdsaJaiJyCA6', 175, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(869, 'Prof. Zetta Quigley II', '270-382-0498', '845.259.1389', '41765 Darrick Coves\nEastonfort, NM 58349-2140', '2011-09-08', 'Accusamus hic voluptas placeat magnam nam et.', 2, 'johann.okon@example.org', 'student', 'true', NULL, '$2y$12$xQgtr9DM2hKiyG/k24Aq1O9Aeo16a5ZYZbxS9.B5O9kQPQ8es7xuq', 998, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(870, 'Phoebe Kautzer Jr.', '+1 (614) 467-4286', '325.772.4266', '49856 Scot Knoll\nChloemouth, GA 96619', '2019-07-28', 'Non quisquam eos fuga perferendis doloribus cumque.', 0, 'schulist.delphine@example.com', 'student', 'true', NULL, '$2y$12$i3BfLMGcYQqkMY6D/XfsXOKb5EBrDyZwpq0gCLsNLpBybOo.XkVBy', 69, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(871, 'Prof. Joshuah Farrell III', '+16092574154', '425-613-4677', '5181 Nora Heights\nWest Dane, SD 15691-6654', '2010-01-07', 'Suscipit sed sint accusantium quod.', 7, 'ythompson@example.com', 'student', 'true', NULL, '$2y$12$juwx5x.TUYHWXV.rBGN3uOE22pqF/xs3ueVulia05VDOLGwnZOEUW', 4, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(872, 'Mr. Percival Koch', '+1 (646) 780-1517', '660-857-1673', '5626 Mohr Parkways\nLake Kiarra, AR 70159', '2002-10-20', 'Illo aut minus eligendi.', 4, 'ullrich.grace@example.com', 'student', 'true', NULL, '$2y$12$2i8GbQSRy5tp.IT/i.IeWOfUi.qSjUU.vX6BRhMBB0LqQDFBaDzG2', 799, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(873, 'Consuelo Kohler', '+12697493440', '+17868160625', '61149 Willms Views Suite 369\nEast Libbie, OR 50617', '1995-08-27', 'Qui assumenda placeat quos magni occaecati et ut.', 3, 'kenyatta85@example.net', 'student', 'true', NULL, '$2y$12$0HCDlvK81Y3pC.bUUdtdme6G7Go/8Tmwy6.DnyKch4AF9/nRwx.Ki', 628, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(874, 'Miss Cassidy O\'Kon MD', '239-731-7009', '(934) 681-6096', '3854 Bartoletti View Apt. 268\nPort Richmond, CO 77837-4581', '2006-08-30', 'Commodi officia fugiat voluptatum veniam et perspiciatis.', 7, 'nrogahn@example.net', 'student', 'true', NULL, '$2y$12$wEQ7pOZ0McuahqyCQURB4.duZdrB/MMdq85iIsTPpB7mBgu9AM4ba', 621, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(875, 'Greg Willms', '1-754-672-4613', '(630) 575-8655', '89764 Anderson Mountains Suite 154\nNikolasport, DC 04818', '2021-01-04', 'Eaque totam aut voluptas vel perferendis quidem natus.', 5, 'zmedhurst@example.com', 'student', 'true', NULL, '$2y$12$xCZXHqVvrBJ2hUe8Y3fB1.Zne36aSOD5OPt5RBxJwPlUj26LFlKdO', 443, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(876, 'Fausto Orn', '831-942-7432', '+1 (765) 948-7595', '13590 Little Mission Apt. 707\nSouth Yadira, KS 13003-9858', '1978-03-24', 'Autem quibusdam aspernatur et.', 1, 'torp.lorna@example.net', 'student', 'true', NULL, '$2y$12$nJyRswQu6BNbQwcz5tVpw.gIlw2HevWyz1iwSrN2G1JrSsPXCJspC', 272, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(877, 'Jakayla Herman', '+14588040123', '1-785-651-2156', '468 Viola Roads Apt. 624\nNorth Lucy, IN 86342', '2003-05-10', 'Doloribus quo totam repellat similique.', 4, 'brionna94@example.org', 'student', 'true', NULL, '$2y$12$NAe745N9gFhs2Oj4uWLRZ.Peco.3EPX.vO1chRG.FBEv1ARUTEwiy', 532, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(878, 'Mrs. Joanie Kuphal DVM', '682-971-1561', '+1-406-327-4796', '84703 Tyree Way Suite 653\nGutmannton, MD 96556', '1980-03-18', 'Nesciunt voluptatem deleniti fugiat reiciendis blanditiis sed.', 2, 'uzulauf@example.com', 'student', 'true', NULL, '$2y$12$RLm1wAsyM3m6ph2CJcbNHe0R9Uc6yzH26WI.8gRyKssgCmgZcG9xC', 550, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(879, 'Dr. Rafaela Larson MD', '+16073065129', '228-953-0448', '5971 Batz Square\nTheronport, NH 49607', '1988-01-02', 'Illum dolor voluptatem ut voluptatibus consequatur vero.', 3, 'noemy.bins@example.com', 'student', 'true', NULL, '$2y$12$0X9HAfsWiRq1290OeP8zW.LeCrN/Zr/lsV6OFD4d1bWEcLwRTQshK', 578, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(880, 'Dr. Josie Ankunding', '832.347.5620', '360.382.3529', '14060 Herman Burg Suite 995\nHauckborough, DE 19228', '2012-01-29', 'Nesciunt qui consectetur exercitationem est laudantium.', 4, 'katarina88@example.org', 'student', 'true', NULL, '$2y$12$hyaF2JG5PA.h7aLXszLc/eCJ7rqSsrWvCwce5j7iN.gdbqMaTlwoe', 296, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(881, 'Keeley Willms', '+1 (949) 933-9588', '320-970-8066', '60903 Gay Villages Suite 803\nEast Cassandraport, KY 40733-6592', '2002-03-10', 'Autem non ipsum laudantium assumenda autem.', 1, 'theresia99@example.net', 'student', 'true', NULL, '$2y$12$2EepyGFWbWfNPCZoTDQtNOUzVfrZ/koLPOki5YkeyIyUn66s7Bmlu', 786, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(882, 'Keagan Volkman', '+1 (972) 369-1822', '+1.702.797.7363', '734 O\'Keefe Turnpike Apt. 412\nBrannonview, RI 33223', '2010-10-25', 'Quidem veritatis id voluptas amet neque saepe ut.', 5, 'berniece.bergstrom@example.com', 'student', 'true', NULL, '$2y$12$YcsUS9VmkGXdnsIJlgzDKO0q6f4ixt48pn6lANrVfoLwAWBGhv1gS', 497, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(883, 'Cristina Stoltenberg', '+1-415-329-4608', '+1 (734) 977-0969', '7315 Krajcik Bridge\nWest Jaimeland, GA 77114-9029', '1975-01-21', 'Quia debitis necessitatibus deserunt aut est et impedit fugit.', 1, 'bonnie.miller@example.org', 'student', 'true', NULL, '$2y$12$GgMo7u60amGY1EfmDP01C.Ko5SkpBEgsO0Bfq0SPCIFWH0SQsPdRK', 354, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(884, 'Prof. Retta Stehr', '+17263576835', '(650) 228-1082', '8011 Madisen Summit\nGuyton, ND 66440', '1985-05-31', 'Ea odit provident non aut est quo corrupti dolores.', 5, 'loyal.jacobs@example.net', 'student', 'true', NULL, '$2y$12$wayuREqC0rHtj678ocWmDuBwd6dE5gl7NmsTovuKKJRptjj1Q4h4u', 958, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45'),
(885, 'Mya Douglas III', '1-970-810-6885', '+1.325.427.4634', '523 Schaden Circle\nWest Jacquelynmouth, NV 64721-9181', '2016-02-05', 'Totam sint deleniti atque eveniet quo et.', 7, 'ondricka.jayden@example.com', 'student', 'true', NULL, '$2y$12$ziueVHweVbs/Ghz19gOoYe3H/bvJyU61dbLLlWbraWhLVj73pSFIO', 259, NULL, '2025-03-03 19:09:45', '2025-03-03 19:09:45');

-- --------------------------------------------------------

--
-- Структура таблицы `user_histories`
--

CREATE TABLE `user_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('visited','paymart_add','paymart_return','paymart_jarima','chegirma_add','group_add','group_delete','password_update') NOT NULL,
  `type_commit` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_histories`
--

INSERT INTO `user_histories` (`id`, `user_id`, `type`, `type_commit`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 15, 'group_add', '\"Test Guruh\' Guruhga qo\'shildi', 1, '2025-02-22 16:34:18', '2025-02-22 16:34:18'),
(2, 15, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 18:44:21', '2025-02-22 18:44:21'),
(3, 15, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 18:45:28', '2025-02-22 18:45:28'),
(4, 15, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 18:50:18', '2025-02-22 18:50:18'),
(5, 15, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 18:50:18', '2025-02-22 18:50:18'),
(6, 15, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:03:16', '2025-02-22 19:03:16'),
(7, 15, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:03:16', '2025-02-22 19:03:16'),
(8, 15, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(9, 15, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(10, 15, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-02-22 19:03:40', '2025-02-22 19:03:40'),
(11, 15, 'paymart_add', '895 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:06:25', '2025-02-22 19:06:25'),
(12, 15, 'paymart_add', '99000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:06:41', '2025-02-22 19:06:41'),
(13, 15, 'paymart_add', '50000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:06:52', '2025-02-22 19:06:52'),
(14, 15, 'paymart_add', '50000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:06:52', '2025-02-22 19:06:52'),
(15, 15, 'paymart_add', '200000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:11:28', '2025-02-22 19:11:28'),
(16, 15, 'paymart_add', '300000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:11:28', '2025-02-22 19:11:28'),
(17, 15, 'paymart_add', '250000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:13:03', '2025-02-22 19:13:03'),
(18, 15, 'paymart_add', '250000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:13:53', '2025-02-22 19:13:53'),
(19, 15, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:13:53', '2025-02-22 19:13:53'),
(20, 15, 'paymart_add', '25000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:14:47', '2025-02-22 19:14:47'),
(21, 15, 'paymart_add', '50000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:14:47', '2025-02-22 19:14:47'),
(22, 15, 'paymart_add', '2500 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:17:01', '2025-02-22 19:17:01'),
(23, 15, 'paymart_add', '22000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:17:01', '2025-02-22 19:17:01'),
(24, 14, 'group_add', '\"Test Uchun\' Guruhga qo\'shildi', 1, '2025-02-22 19:17:45', '2025-02-22 19:17:45'),
(25, 14, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(26, 14, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(27, 14, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-02-22 19:18:11', '2025-02-22 19:18:11'),
(28, 15, 'group_add', '\"Test Uchun\' Guruhga qo\'shildi', 1, '2025-02-23 16:20:31', '2025-02-23 16:20:31'),
(29, 15, 'paymart_add', '300000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-23 16:20:50', '2025-02-23 16:20:50'),
(30, 15, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-02-23 16:20:50', '2025-02-23 16:20:50'),
(31, 15, 'paymart_return', '77500so\'m to\'lov qaytarildi(Test Uchun)', 1, '2025-02-23 17:19:18', '2025-02-23 17:19:18'),
(32, 15, 'paymart_return', '100000 so\'m to\'lov qaytarildi(Test Uchun Two)', 1, '2025-02-23 17:20:13', '2025-02-23 17:20:13'),
(33, 13, 'group_add', '\"Test Guruh\' Guruhga qo\'shildi', 1, '2025-02-23 17:56:51', '2025-02-23 17:56:51'),
(34, 13, 'chegirma_add', 'Admin tamonidan49515 so\'m chegirma(Test)', 1, '2025-02-23 18:36:24', '2025-02-23 18:36:24'),
(35, 13, 'paymart_add', '150000 so\'m naqt to\'lov qabul qilindi', 1, '2025-02-23 18:50:29', '2025-02-23 18:50:29'),
(36, 13, 'paymart_add', '150000 so\'m plastik to\'lov qabul qilindi', 1, '2025-02-23 18:50:29', '2025-02-23 18:50:29'),
(37, 12, 'paymart_add', '500000 so\'m to\'lov qildi(asdasd)', 1, '2025-02-23 19:30:53', '2025-02-23 19:30:53'),
(38, 12, 'chegirma_add', '500000 so\'m to\'lov ucnun 50000 so\\\'m chegirma (asdasd)', 1, '2025-02-23 19:30:53', '2025-02-23 19:30:53'),
(39, 16, 'visited', 'Markazga tashrif', 1, '2025-02-24 18:46:20', '2025-02-24 18:46:20'),
(40, 16, 'paymart_return', '50000 so\'m to\'lov qaytarildi(Yest uchun)', 1, '2025-02-25 18:52:01', '2025-02-25 18:52:01'),
(41, 15, 'group_add', '\"uchinci guruh\' Guruhga qo\'shildi', 1, '2025-02-26 19:08:40', '2025-02-26 19:08:40'),
(42, 15, 'group_delete', 'Test Uchun guruhdan o\'chirildi. Jarima: 0 (sdafsad)', 1, '2025-02-26 19:09:13', '2025-02-26 19:09:13'),
(43, 14, 'group_add', '\"uchinci guruh\' Guruhga qo\'shildi', 1, '2025-02-27 19:07:41', '2025-02-27 19:07:41'),
(44, 15, 'group_add', '\"Test Guruh ddddd\' Guruhga qo\'shildi', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(45, 13, 'group_add', '\"Test Guruh ddddd\' Guruhga qo\'shildi', 1, '2025-02-27 19:51:45', '2025-02-27 19:51:45'),
(46, 16, 'password_update', 'Parol yangilandi', 1, '2025-03-01 17:29:08', '2025-03-01 17:29:08'),
(47, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:47:43', '2025-03-01 19:47:43'),
(48, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:48:04', '2025-03-01 19:48:04'),
(49, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:48:40', '2025-03-01 19:48:40'),
(50, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:51:17', '2025-03-01 19:51:17'),
(51, 16, 'paymart_return', '4000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:51:54', '2025-03-01 19:51:54'),
(52, 16, 'paymart_return', '2000 so\'m to\'lov qaytarildi(2000)', 1, '2025-03-01 19:52:09', '2025-03-01 19:52:09'),
(53, 16, 'password_update', 'Profile ma\'lumotlari yangilandi', 1, '2025-03-01 19:52:43', '2025-03-01 19:52:43'),
(54, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(sdsd)', 1, '2025-03-01 19:52:52', '2025-03-01 19:52:52'),
(55, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(sdsds)', 1, '2025-03-01 19:53:23', '2025-03-01 19:53:23'),
(56, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(sdsd)', 1, '2025-03-01 19:53:47', '2025-03-01 19:53:47'),
(57, 16, 'paymart_return', '1000 so\'m to\'lov qaytarildi(test)', 1, '2025-03-01 19:54:34', '2025-03-01 19:54:34'),
(58, 16, 'paymart_add', '1000 so\'m naqt to\'lov qabul qilindi', 1, '2025-03-01 19:58:30', '2025-03-01 19:58:30'),
(59, 16, 'paymart_add', '100000 so\'m naqt to\'lov qabul qilindi', 1, '2025-03-01 20:02:17', '2025-03-01 20:02:17'),
(60, 16, 'paymart_add', '100000 so\'m plastik to\'lov qabul qilindi', 1, '2025-03-01 20:02:35', '2025-03-01 20:02:35'),
(61, 16, 'group_add', '\"uchinci guruh\' Guruhga qo\'shildi', 1, '2025-03-01 20:03:29', '2025-03-01 20:03:29'),
(62, 16, 'paymart_add', '170000 so\'m naqt to\'lov qabul qilindi', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(63, 16, 'paymart_add', '130000 so\'m plastik to\'lov qabul qilindi', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(64, 16, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-03-01 20:03:54', '2025-03-01 20:03:54'),
(65, 16, 'group_add', '\"Test Guruh ddddd\' Guruhga qo\'shildi', 1, '2025-03-01 20:04:26', '2025-03-01 20:04:26'),
(66, 16, 'paymart_add', '200000 so\'m naqt to\'lov qabul qilindi', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(67, 16, 'paymart_add', '100000 so\'m plastik to\'lov qabul qilindi', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(68, 16, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-03-01 20:04:39', '2025-03-01 20:04:39'),
(69, 16, 'group_add', '\"Test Guruh ddddd\' Guruhga qo\'shildi', 1, '2025-03-01 20:07:41', '2025-03-01 20:07:41'),
(70, 16, 'paymart_add', '190000 so\'m naqt to\'lov qabul qilindi', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(71, 16, 'paymart_add', '110000 so\'m plastik to\'lov qabul qilindi', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(72, 16, 'chegirma_add', '50000.00 so\'m to\'lov uchun chegirma', 1, '2025-03-01 20:08:02', '2025-03-01 20:08:02'),
(73, 16, 'paymart_add', '200000 so\'m to\'lov qildi(sdsadfsfsdf)', 1, '2025-03-01 20:13:32', '2025-03-01 20:13:32'),
(74, 16, 'chegirma_add', '200000 so\'m to\'lov ucnun 100000 so\\\'m chegirma (sdsadfsfsdf)', 1, '2025-03-01 20:13:32', '2025-03-01 20:13:32'),
(75, 28, 'visited', 'Markazga tashrif', 1, '2025-03-03 18:35:46', '2025-03-03 18:35:46'),
(76, 30, 'visited', 'Markazga tashrif', 1, '2025-03-03 18:36:37', '2025-03-03 18:36:37');

-- --------------------------------------------------------

--
-- Структура таблицы `varonkas`
--

CREATE TABLE `varonkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` enum('new','repeat','pedding','success','cancel') NOT NULL DEFAULT 'new',
  `register_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `type_social` enum('social_telegram','social_facebook','social_youtube','social_banner','social_tanish','social_boshqa') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `varonkas`
--

INSERT INTO `varonkas` (`id`, `user_name`, `phone1`, `phone2`, `address`, `birthday`, `status`, `register_id`, `type_social`, `created_at`, `updated_at`) VALUES
(1, 'Elshod Musurmonov', '+998 94 520 4005', '+998 90 558 4516', 'Shahrisabz_sh', '1997-02-01', 'cancel', 0, 'social_telegram', '2025-03-02 17:23:22', '2025-03-03 17:20:53'),
(2, 'Elshod Musurmonov', '+998 94 520 4006', '+998 90 558 4516', 'Shahrisabz_sh', '1997-02-01', 'success', 0, 'social_telegram', '2025-03-02 17:30:41', '2025-03-03 18:44:12'),
(3, 'Elshod Musurmonov', '+998 94 520 4007', '+998 90 558 4516', 'Shahrisabz_sh', '1997-02-01', 'cancel', 0, 'social_telegram', '2025-03-02 17:32:15', '2025-03-03 17:44:17'),
(4, 'Elshod Musurmonov Musurmonov', '+998 90 832 5465', '+998 65 465 4654', 'Qarshi_sh', '1997-01-01', 'cancel', 0, 'social_facebook', '2025-03-02 19:43:01', '2025-03-03 17:33:52'),
(5, 'Test Uchun', '+998 94 520 4009', '+998 00 585 4554', 'Qarshi_sh', '1997-01-01', 'success', 30, 'social_facebook', '2025-03-03 17:48:37', '2025-03-03 18:46:14');

-- --------------------------------------------------------

--
-- Структура таблицы `varonka_histories`
--

CREATE TABLE `varonka_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `varonka_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `varonka_histories`
--

INSERT INTO `varonka_histories` (`id`, `varonka_id`, `comment`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:20:53', '2025-03-03 17:20:53'),
(2, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:20', '2025-03-03 17:28:20'),
(3, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:25', '2025-03-03 17:28:25'),
(4, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:27', '2025-03-03 17:28:27'),
(5, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:31', '2025-03-03 17:28:31'),
(6, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:33', '2025-03-03 17:28:33'),
(7, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:49', '2025-03-03 17:28:49'),
(8, 1, 'Murojat bekor qilindi', 1, '2025-03-03 17:28:52', '2025-03-03 17:28:52'),
(9, 4, 'Murojat bekor qilindi', 1, '2025-03-03 17:33:52', '2025-03-03 17:33:52'),
(10, 2, 'Test uchun murojat qoldirilmoqda', 1, '2025-03-03 17:39:56', '2025-03-03 17:39:56'),
(11, 2, 'Salomlar bo\'lsin', 1, '2025-03-03 17:40:07', '2025-03-03 17:40:07'),
(12, 2, 'Bu qanday murojat uchun qoldirish mumkun', 1, '2025-03-03 17:40:24', '2025-03-03 17:40:24'),
(13, 2, 'Kiyenchalik bu yerda nima qilish mumkun sizning oldingi buyurtmagngiz qanday bo\'lgan aniqlkik kiritib o\'tsangiz oldindan raxmat', 1, '2025-03-03 17:40:59', '2025-03-03 17:40:59'),
(14, 2, 'test uchun murojat', 1, '2025-03-03 17:41:16', '2025-03-03 17:41:16'),
(15, 3, 'asdasdasda', 1, '2025-03-03 17:43:02', '2025-03-03 17:43:02'),
(16, 3, 'Murojat bekor qilindi', 1, '2025-03-03 17:44:17', '2025-03-03 17:44:17'),
(17, 5, 'Murojat ro\'yhatga olindi.', 1, '2025-03-03 18:36:37', '2025-03-03 18:36:37'),
(18, 2, 'Murojat bekor qilindi', 1, '2025-03-03 18:44:12', '2025-03-03 18:44:12'),
(19, 5, 'test uchun izoh qoldieilmoqda', 1, '2025-03-03 18:46:14', '2025-03-03 18:46:14'),
(20, 5, 'sadasdasdas', 1, '2025-03-03 18:48:27', '2025-03-03 18:48:27'),
(21, 2, 'asdasdasd', 1, '2025-03-03 18:49:12', '2025-03-03 18:49:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_tests_cours_id_foreign` (`cours_id`),
  ADD KEY `cours_tests_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cours_videos_cours_id_foreign` (`cours_id`),
  ADD KEY `cours_videos_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_cours_id_foreign` (`cours_id`),
  ADD KEY `groups_setting_rooms_id_foreign` (`setting_rooms_id`),
  ADD KEY `groups_techer_id_foreign` (`techer_id`),
  ADD KEY `groups_setting_paymarts_foreign` (`setting_paymarts`),
  ADD KEY `groups_lessen_times_id_foreign` (`lessen_times_id`),
  ADD KEY `groups_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_davomats_group_id_foreign` (`group_id`),
  ADD KEY `group_davomats_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `group_days`
--
ALTER TABLE `group_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_days_group_id_foreign` (`group_id`),
  ADD KEY `group_days_room_id_foreign` (`room_id`),
  ADD KEY `group_days_lessen_times_id_foreign` (`lessen_times_id`);

--
-- Индексы таблицы `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_users_user_id_foreign` (`user_id`),
  ADD KEY `group_users_group_id_foreign` (`group_id`),
  ADD KEY `group_users_start_meneger_foreign` (`start_meneger`),
  ADD KEY `group_users_end_meneger_foreign` (`end_meneger`);

--
-- Индексы таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hodim_paymarts_user_id_foreign` (`user_id`),
  ADD KEY `hodim_paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holidays_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassas`
--
ALTER TABLE `kassas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kassa_histories_meneger_id_foreign` (`meneger_id`),
  ADD KEY `kassa_histories_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `lessen_times`
--
ALTER TABLE `lessen_times`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meneger_charts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moliya_histories_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `paymarts`
--
ALTER TABLE `paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymarts_user_id_foreign` (`user_id`),
  ADD KEY `paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `send_messages`
--
ALTER TABLE `send_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_messages_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_chegirmas_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_paymarts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_rooms_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `socials_name_unique` (`name`);

--
-- Индексы таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `techer_paymarts_user_id_foreign` (`user_id`),
  ADD KEY `techer_paymarts_group_id_foreign` (`group_id`),
  ADD KEY `techer_paymarts_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_type_phone1_unique` (`type`,`phone1`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_histories`
--
ALTER TABLE `user_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_histories_user_id_foreign` (`user_id`),
  ADD KEY `user_histories_admin_id_foreign` (`admin_id`);

--
-- Индексы таблицы `varonkas`
--
ALTER TABLE `varonkas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varonka_histories_varonka_id_foreign` (`varonka_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_days`
--
ALTER TABLE `group_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT для таблицы `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `kassas`
--
ALTER TABLE `kassas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `lessen_times`
--
ALTER TABLE `lessen_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `paymarts`
--
ALTER TABLE `paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `send_messages`
--
ALTER TABLE `send_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT для таблицы `user_histories`
--
ALTER TABLE `user_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `varonkas`
--
ALTER TABLE `varonkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cours_tests`
--
ALTER TABLE `cours_tests`
  ADD CONSTRAINT `cours_tests_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cours_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cours_videos`
--
ALTER TABLE `cours_videos`
  ADD CONSTRAINT `cours_videos_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cours_videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_lessen_times_id_foreign` FOREIGN KEY (`lessen_times_id`) REFERENCES `lessen_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_setting_paymarts_foreign` FOREIGN KEY (`setting_paymarts`) REFERENCES `setting_paymarts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_setting_rooms_id_foreign` FOREIGN KEY (`setting_rooms_id`) REFERENCES `setting_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_techer_id_foreign` FOREIGN KEY (`techer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_davomats`
--
ALTER TABLE `group_davomats`
  ADD CONSTRAINT `group_davomats_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_davomats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_days`
--
ALTER TABLE `group_days`
  ADD CONSTRAINT `group_days_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_days_lessen_times_id_foreign` FOREIGN KEY (`lessen_times_id`) REFERENCES `lessen_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_days_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `setting_rooms` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_end_meneger_foreign` FOREIGN KEY (`end_meneger`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_users_start_meneger_foreign` FOREIGN KEY (`start_meneger`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hodim_paymarts`
--
ALTER TABLE `hodim_paymarts`
  ADD CONSTRAINT `hodim_paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hodim_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kassa_histories`
--
ALTER TABLE `kassa_histories`
  ADD CONSTRAINT `kassa_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kassa_histories_meneger_id_foreign` FOREIGN KEY (`meneger_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `meneger_charts`
--
ALTER TABLE `meneger_charts`
  ADD CONSTRAINT `meneger_charts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moliya_histories`
--
ALTER TABLE `moliya_histories`
  ADD CONSTRAINT `moliya_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `paymarts`
--
ALTER TABLE `paymarts`
  ADD CONSTRAINT `paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `send_messages`
--
ALTER TABLE `send_messages`
  ADD CONSTRAINT `send_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_chegirmas`
--
ALTER TABLE `setting_chegirmas`
  ADD CONSTRAINT `setting_chegirmas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_paymarts`
--
ALTER TABLE `setting_paymarts`
  ADD CONSTRAINT `setting_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `setting_rooms`
--
ALTER TABLE `setting_rooms`
  ADD CONSTRAINT `setting_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `techer_paymarts`
--
ALTER TABLE `techer_paymarts`
  ADD CONSTRAINT `techer_paymarts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `techer_paymarts_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `techer_paymarts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_histories`
--
ALTER TABLE `user_histories`
  ADD CONSTRAINT `user_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `varonka_histories`
--
ALTER TABLE `varonka_histories`
  ADD CONSTRAINT `varonka_histories_varonka_id_foreign` FOREIGN KEY (`varonka_id`) REFERENCES `varonkas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
