-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2022 年 03 月 14 日 19:49
-- 伺服器版本： 5.6.51-cll-lve
-- PHP 版本： 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mplgroups`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Dancer', 'dancer - @@', 'yes', NULL, NULL),
(2, 'Show Girl', 'showgirl-@@@', 'yes', NULL, NULL),
(3, 'Promoter', NULL, 'yes', NULL, NULL),
(4, 'Model', 'model @$$$', 'yes', NULL, NULL),
(5, 'DJ', NULL, 'yes', NULL, NULL),
(6, 'MC', NULL, 'yes', NULL, NULL),
(9, 'gamer', 'gamer@%@', 'no', NULL, NULL),
(11, 'programmer', 'into', 'no', NULL, NULL),
(13, 'diva', 'divaaa', 'no', NULL, NULL),
(15, 'manager', 'M@MMM', 'no', NULL, NULL),
(16, 'Drammer', '@DRammer!!', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `telephone`, `company`, `permission`, `created_at`, `updated_at`) VALUES
(0, 0, '90290279', 'ABC', 'no', NULL, NULL),
(1, 5, '097-2342-23411', 'K_CLIENTDDD111', 'no', NULL, NULL),
(2, 6, '234-2342-234', 'K22_CLIENT', 'yes', NULL, NULL),
(4, 8, '121-232-2342', 'COLA', 'yes', NULL, NULL),
(5, 9, '121-232-8889', 'CHELSI', 'no', NULL, NULL),
(6, 11, '097-2342-9999', 'Lucifer', 'yes', NULL, NULL),
(7, 12, '097-2342-234', 'root', 'no', NULL, NULL),
(8, 13, '234-2342-234', 'LSOK', 'no', NULL, NULL),
(9, 14, '097-2342-234', 'LLOkHL  TESH', 'yes', NULL, NULL),
(10, 22, '234-2342-234', 'LSFKJE', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_sub_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cms`
--

INSERT INTO `cms` (`id`, `slug`, `page_title`, `meta_title`, `meta_keyword`, `meta_description`, `page_sub_title`, `page_sub_group`, `is_active`, `is_menu`, `is_header`, `is_footer`, `short_desc`, `description`, `created_at`, `updated_at`, `lang`) VALUES
(22, 'aboutus', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'yes', 'yes', 'yes', 'yes', 'About Us', '<p>About Us<br></p>', NULL, NULL, 'en'),
(23, 'aboutus', '元关键字 *', '元关键字 *', '元关键字 *元关键字 *', '元关键字 *', '元关键字 *', '元关键字 *', 'yes', 'yes', 'yes', 'yes', '元关键字 *', '元关键字&nbsp;<span class=\"text-danger\">*</span>', NULL, NULL, 'zh-cn'),
(24, 'aboutus', '元关键字 *', '元关键字 *', '元关键字 *', '元关键字 *', '元关键字 *', '元关键字 *', 'yes', 'yes', 'yes', 'yes', '元关键字 *', '元关键字&nbsp;<span class=\"text-danger\">*</span>', NULL, NULL, 'zh-hk'),
(25, 'mediaservice', 'Media Service', 'Media Service', 'Media Service', 'Media Service', 'Media Service', 'Media Service', 'yes', 'yes', 'yes', 'yes', 'Media Service', 'Media Service', NULL, NULL, 'en'),
(26, 'mediaservice', '元描述 *', '元描述 *', '元描述 *', '元描述 *', '元描述 *', '元描述 *', 'yes', 'yes', 'yes', 'yes', '元描述 *', '元描述&nbsp;<span class=\"text-danger\">*</span>', NULL, NULL, 'zh-cn'),
(27, 'mediaservice', '元描述 *', '元描述 *', '页面标题 *', '页面标题 *', '页面标题 *', '页面标题 *', 'yes', 'yes', 'yes', 'yes', '页面标题 *', '页面标题&nbsp;<span class=\"text-danger\">*</span>', NULL, NULL, 'zh-hk');

-- --------------------------------------------------------

--
-- 資料表結構 `cn_homepages`
--

CREATE TABLE `cn_homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `newtab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cn_homepages`
--

INSERT INTO `cn_homepages` (`id`, `title`, `description`, `link`, `created_at`, `updated_at`, `newtab`) VALUES
(1, '<span class=\"color-bluelight\">欢迎来到</span> MPL', '<div><div>我们是一家提供推广方案及设备的公司, 服务包括活动场地制作、人力资源、 线上推广等等。</div><div>我们也有户外和室内 LED 显示屏施工服务。其中包括LED显示系统顾问、设计安装、结构框架设计与施工、工程许可证申请、电力系统设计和电缆安装。</div></div>', 'https://mplgroups.com/talentRegister', NULL, NULL, 0),
(2, '显示屏及投射<span class=\"color-blue\">服务</span>', '<div>我们提供室内和室外的大型LED 显示屏及投射器服务，适合各种商业或私人活动，并提供短期或长期租赁服务。</div><div>此外，我们还提供销售服务。由场地考察到安装工作, 都由专人负责 ;</div><div>售后服务也很重要。我们有专业的团队在当地进行维修服务，</div><div>无需返回原厂即可解决。</div>', 'https://visual1pro.com', NULL, NULL, 1),
(3, '<span class=\"color-blue\">推广员及其他专业</span>服务', '<div>自助配对平台可让客户与配对者自行进行报价, 专业人才包括有MC主持、DJ 、推广员及模特儿等。</div>', 'https://mplgroups.com/findTalents', NULL, NULL, 0),
(4, '行销文案服务', '<div><div>我们明白到企业未必拥抱自己的PR或Marketing团队, 很多时间都是亲力亲为,</div><div>但原来一段好文字可以带来不同效果。</div></div><div>服务包括:</div><ul><li>创意文案</li><li>校对编辑</li><li>翻译及本地化</li><li>產品手冊</li><li>数码营销</li><li>建议书及标书</li><li>SEO文案</li><li>平面设计</li></ul>', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visited` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `en_homepages`
--

CREATE TABLE `en_homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `newtab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `en_homepages`
--

INSERT INTO `en_homepages` (`id`, `title`, `description`, `link`, `created_at`, `updated_at`, `newtab`) VALUES
(1, '<span class=\"color-bluelight\">Welcome to</span> MPL', '<p><span data-metadata=\"<!--(figmeta)eyJmaWxlS2V5IjoiMnluN1k3dGRBT1hGU2liY1ZNbDJjdyIsInBhc3RlSUQiOjQyNTM2MTU1NCwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)-->\"></span>We are a company that provides promotional solutions and equipment, services include event\nvenue production, human resources, online promotion, and more.</p><p>\nWe have outdoor and indoor LED display construction services also.\nThat includes LED display system consultant, design and installation, tructural frame design and\nconstruction, application for engineering license, power system design and cable installation.<br></p>', 'https://mplgroups.com/talentRegister', NULL, NULL, 0),
(2, 'Visual <span class=\"color-blue\">Service</span>', '<div><span data-metadata=\"<!--(figmeta)eyJmaWxlS2V5IjoiMnluN1k3dGRBT1hGU2liY1ZNbDJjdyIsInBhc3RlSUQiOjE3NzIxMTcxMzIsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->\"></span>We provide indoor and outdoor large-scale LED Wall and Projector services, \nsuitable for various commercial or private events, and provide \nshort-term or long-term rental services. \nIn addition, we also provide sales services. \nsite visit and installation work are carried out by special personnel. \nAfter-sales service is also very important. \nWe have a professional team to repair locally, and it can be solved \nwithout returning to the factory.<br></div>', 'https://visual1pro.com', NULL, NULL, 1),
(3, '<span class=\"color-blue\">Talent</span> Service', '<span data-metadata=\"<!--(figmeta)eyJmaWxlS2V5IjoiMnluN1k3dGRBT1hGU2liY1ZNbDJjdyIsInBhc3RlSUQiOjExMzM1NzY5NzksImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)-->\"></span>The self-service matching platform allows customers and matchers \nto make their own quotations. Professional talents include MC hosts,\n DJs, promoters and models.<br>', 'https://mplgroups.com/findTalents', NULL, NULL, 0),
(4, 'Copyright Service', '<div>We understand that companies do not necessarily embrace their own \nPR or Marketing teams, and they spend a lot of time doing it themselves, \nbut it turns out that a good piece of text can bring different effects.</div><div>We can provide copywriting service below:</div><ul><li>Creative Copywriting</li><li>Proofreading and Editing</li><li>Translation and Localization</li><li>Product Brochures</li><li>Digital Marketing</li><li>Proposals and Tenders</li><li>SEO Copywriting</li><li>Graphic Design<br></li></ul><p><span style=\"white-space: pre-wrap;\"><br></span></p>', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `ftpages`
--

CREATE TABLE `ftpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ftpages`
--

INSERT INTO `ftpages` (`id`, `cat_id`, `path`, `selected`, `created_at`, `updated_at`) VALUES
(37, 1, 'storage/uploads/FindTalentPage/16458578761645857876744dancer.jpg', 'yes', '2022-02-25 21:44:36', '2022-02-25 21:44:58'),
(38, 2, 'storage/uploads/FindTalentPage/16458578821645857882529showgirl.jpg', 'yes', '2022-02-25 21:44:43', '2022-02-25 21:45:06'),
(39, 3, 'storage/uploads/FindTalentPage/16458578861645857886871promoter.jpg', 'yes', '2022-02-25 21:44:47', '2022-02-25 21:45:22'),
(40, 4, 'storage/uploads/FindTalentPage/16458579471645857947464model.jpg', 'yes', '2022-02-25 21:45:47', '2022-02-25 21:46:05'),
(41, 5, 'storage/uploads/FindTalentPage/16458579521645857952798dj.jpg', 'yes', '2022-02-25 21:45:52', '2022-02-25 21:46:09'),
(42, 6, 'storage/uploads/FindTalentPage/16458579601645857959744mc.jpg', 'yes', '2022-02-25 21:46:00', '2022-02-25 21:46:13');

-- --------------------------------------------------------

--
-- 資料表結構 `hk_homepages`
--

CREATE TABLE `hk_homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `newtab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `hk_homepages`
--

INSERT INTO `hk_homepages` (`id`, `title`, `description`, `link`, `created_at`, `updated_at`, `newtab`) VALUES
(1, '<span class=\"color-bluelight\">歡迎來到</span> MPL', '<div><div>我們是一家提供推廣方案及設備的公司, 服務包括活動場地製作、人力資源、 線上推廣等等。</div><div>我們也有戶外和室內 LED 顯示屏施工服務。 其中包括LED顯示系統顧問、設計安裝、結構框架設計與施工、工程許可證申請、電力系統設計和電纜安裝</div></div>', 'https://mplgroups.com/talentRegister', NULL, NULL, 0),
(2, '顯示屏及投射<span class=\"color-blue\">服務</span>', '我們提供室內和室外的大型LED 顯示屏及投射器服務，\n適合各種商業或私人活動，並提供短期或長期租賃服務。 \n此外，我們還提供銷售服務。 由場地考察到安裝工作, 都由專人負責 ;\n售後服務也很重要。 我們有專業的團隊在當地進行維修服務，\n無需返回原廠即可解決。', 'https://visual1pro.com', NULL, NULL, 1),
(3, '<span class=\"color-blue\">推廣員及其他專業</span>服務', '自助配對平台可讓客戶與配對者自行進行報價, 專業人才包括有MC主持、\nDJ 、推廣員及模特兒等。', 'https://mplgroups.com/findTalents', NULL, NULL, 0),
(4, '行銷文案服務', '<div>我們明白到企業未必擁抱自己的PR或Marketing團隊, 很多時間都是親力親為,\n但原來一段好文字可以帶來不同效果。</div><ul><li>服務包括:</li><li>創意文案</li><li>校對編輯</li><li>翻譯及本地化</li><li>產品手冊\n‧ 數碼營銷</li><li>建議書及標書</li><li>SEO文案</li><li>平面設計</li></ul><div><span style=\"white-space: pre-wrap;\"><br></span></div>', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_20_235327_create_en_homepages_table', 1),
(6, '2022_02_20_235401_create_cn_homepages_table', 1),
(7, '2022_02_20_235413_create_hk_homepages_table', 1),
(8, '2022_02_20_235440_create_categories_table', 1),
(9, '2022_02_20_235535_create_talents_table', 1),
(10, '2022_02_20_235551_create_clients_table', 1),
(11, '2022_02_20_235622_create_photos_table', 1),
(12, '2022_02_20_235640_create_ftpages_table', 1),
(13, '2022_02_21_063655_create_cms_table', 2),
(14, '2022_02_22_034210_add_permission_to_photos_table', 3),
(15, '2022_02_25_003501_add_fields_to_cms_table', 4),
(0, '2022_03_03_023824_add_newtab_to_en_homepages', 5),
(0, '2022_03_03_024146_add_newtab_to_cn_homepages', 5),
(0, '2022_03_03_024203_add_newtab_to_hk_homepages', 5),
(0, '2022_03_03_234149_create_contacts_table', 5),
(0, '2022_03_04_004443_add_vidsited_to_contacts_table', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@example.com', 'KweMI98LeOclSiWEFJSQNrhg9NeuPw4sNQjmS7adyM3bpbHecTeDz8oNIoC9CO8f', '2022-02-24 20:27:07'),
('admin@example.com', 'KwuFLufGUlnmP2ogAA3ewhwUUDOlZjcnUnP8mb49biw8hMmtf4wFxkfKXVpn4ybf', '2022-02-24 20:28:18'),
('admin@example.com', 'RBWALqDafoGyIrEMLlX1aznzVWHWl0RYDNknZJnimAI5zxWlfW1dD3UkAFsyBDe9', '2022-02-24 20:30:23'),
('admin@example.com', '8NsF50vaDcbaiJxaSMjkKNLU5Zyml4L77Ngw6h7n5aE4IcbLET2ZCxooFcvYsmCH', '2022-02-24 20:31:22'),
('admin@example.com', 'FVSy8WiTNtcOnTmEWXtADycuWsJytNVUYV2Nj9rJZxQvdBva7F093MmcvmPWCp0P', '2022-02-24 20:31:51'),
('admin@example.com', 'MXwLkoXiaPHpvcLRoGBihSGgpDhB7ZZt8Yc1PFL0fnEvyv0bu6H1mmDmdXj1hSlK', '2022-02-24 20:33:41'),
('webmaste9392@gmail.com', 'RYmS9PYwGvbV6TuSvZ5YhZgtB77Wu9v4SubZenmJu9bchPAc3nnyieZnkbc4kqOI', '2022-02-25 19:46:38');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `path`, `created_at`, `updated_at`, `permission`) VALUES
(114, 25, 'storage/uploads/photos/1645953895618mc.jpg', NULL, NULL, 'yes'),
(131, 32, 'storage/uploads/photos/1645955060521dj.jpg', NULL, NULL, 'yes'),
(132, 32, 'storage/uploads/photos/1645955060520dancer.jpg', NULL, NULL, 'yes'),
(133, 32, 'storage/uploads/photos/1645955060521mc.jpg', NULL, NULL, 'yes'),
(134, 32, 'storage/uploads/photos/1645955060521model.jpg', NULL, NULL, 'yes'),
(135, 32, 'storage/uploads/photos/1645955060522promoter.jpg', NULL, NULL, 'yes'),
(136, 32, 'storage/uploads/photos/1645955060522showgirl.jpg', NULL, NULL, 'yes'),
(137, 17, 'storage/uploads/photos/1645960248308showgirl.jpg', NULL, NULL, 'yes'),
(138, 18, 'storage/uploads/photos/1645960351748mc.jpg', NULL, NULL, 'yes'),
(139, 18, 'storage/uploads/photos/1645960351750promoter.jpg', NULL, NULL, 'yes'),
(140, 19, 'storage/uploads/photos/1645960421348model.jpg', NULL, NULL, 'yes'),
(141, 19, 'storage/uploads/photos/1645960421350promoter.jpg', NULL, NULL, 'yes'),
(142, 20, 'storage/uploads/photos/1645960484129showgirl.jpg', NULL, NULL, 'no'),
(143, 20, 'storage/uploads/photos/1645960484127promoter.jpg', NULL, NULL, 'yes'),
(144, 21, 'storage/uploads/photos/1645960518934promoter.jpg', NULL, NULL, 'yes'),
(145, 23, 'storage/uploads/photos/1645960561750mc.jpg', NULL, NULL, 'yes'),
(146, 23, 'storage/uploads/photos/1645960561751model.jpg', NULL, NULL, 'no'),
(147, 23, 'storage/uploads/photos/1645960561752promoter.jpg', NULL, NULL, 'no'),
(148, 23, 'storage/uploads/photos/1645960561752showgirl.jpg', NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- 資料表結構 `talents`
--

CREATE TABLE `talents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday_year` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `hips` int(11) NOT NULL,
  `shoes` int(11) NOT NULL,
  `job_reference` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `talents`
--

INSERT INTO `talents` (`id`, `user_id`, `cat_id`, `gender`, `phone`, `birthday_year`, `height`, `weight`, `chest`, `hips`, `shoes`, `job_reference`, `permission`, `created_at`, `updated_at`) VALUES
(6, 17, 2, 'male', '222-222-2223', 1999, 178, 69, 70, 67, 245, 'Have a good experience in that field', 'yes', NULL, NULL),
(7, 18, 3, 'male', '222-222-2222', 1998, 168, 49, 57, 59, 245, 'Promoter', 'yes', NULL, NULL),
(8, 19, 4, 'male', '111-121-1231', 1999, 222, 1324, 1231, 1232, 4323, 'asdfasdfsdfasfdas', 'yes', NULL, NULL),
(9, 20, 3, 'male', '111-111-1111', 1999, 167, 123, 113, 131, 232, 'Nice', 'yes', NULL, NULL),
(10, 21, 3, 'female', '222-222-2222', 2000, 172, 54, 45, 34, 23, 'Good', 'yes', NULL, NULL),
(11, 23, 6, 'female', '111-111-1111', 1999, 175, 54, 45, 40, 245, 'Image tester,,,,,,,', 'yes', NULL, NULL),
(12, 24, 1, 'male', '111-111-1111', 2000, 177, 65, 47, 47, 240, 'SSS, GGE, eeousout,  asdfa Leorem, adljklkj', 'yes', NULL, NULL),
(13, 25, 6, 'female', '222-222-2222', 2002, 175, 65, 55, 45, 245, 'LOL, Lorem , asdfas', 'yes', NULL, NULL),
(14, 26, 6, 'female', '111-111-1111', 1998, 170, 65, 100, 70, 240, 'FInal, Lorem ....', 'yes', NULL, NULL),
(15, 27, 3, 'female', '111-111-1111', 2001, 172, 65, 67, 56, 245, 'Final WOrkdsad, Lorem , Leosa', 'yes', NULL, NULL),
(17, 29, 5, 'male', '222-222-2222', 2000, 170, 50, 50, 50, 230, 'DJ.......', 'no', NULL, NULL),
(18, 30, 6, 'male', '222-222-2222', 1999, 170, 50, 50, 50, 240, 'KLSKJDFLSJDf', 'no', NULL, NULL),
(19, 31, 6, 'male', '222-222-2223', 2001, 170, 50, 50, 50, 230, 'asfljla;skjdfa;lskfjda;lsdfkj', 'no', NULL, NULL),
(20, 32, 6, 'male', '222-222-2223', 2001, 170, 50, 50, 50, 230, 'COMPLETEL JSDLFJSLDF', 'yes', NULL, NULL),
(0, 0, 2, 'male', '12345678', 5, 180, 86, 60, 80, 40, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'yes', NULL, NULL),
(0, 0, 1, 'male', '12345678', 1990, 180, 30, 42, 34, 45, 'Igjgjjbjbjbjbjbjhj', 'no', NULL, NULL),
(0, 0, 6, 'male', '12345678', 1997, 123, 45, 77, 34, 66, '很很師輪隨了軍再直又九九形到再再再張張鍊鴻鴻鐘姨睡弓，弓，弱剛婦銷鐘少首謝峰癖疹室魚土　閑聯首文竹', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$mhRhmO/WAxrS3b3dxqYpZ.kSURGcvS3e852ugyNZOsO.iww7QOpgO', NULL, 'admin', NULL, '2022-02-22 07:30:02'),
(5, 'c11111', 'webmasterclient111@gmail.com', NULL, 'clients', NULL, 'client', NULL, NULL),
(6, 'c2', 'webmasterclient2@gmail.com', NULL, 'clients', NULL, 'client', NULL, NULL),
(8, 'Moltal', 'webmaste9392@gmail.com', NULL, '$2y$10$jgDaDIpwvfLC54BPLqrV0.qOJKVquh7slIXBVUfON0DTwogmlr9Nu', NULL, 'client', NULL, NULL),
(9, 'Neo', 'webm803s392@gmail.com', NULL, '$2y$10$ZGK/gTTdfXioFB9f3fkv/uas14UhNU9BfcRugjz55vT2LMBiFgd2C', NULL, 'client', NULL, NULL),
(11, 'KKSI_Client', 'webmasIKS392@gmail.com', NULL, '$2y$10$dQAdDUpDVWblL4xk.LUgqOtw0.VP9ktkl2gPvLQNO647WieKTvPVq', NULL, 'client', NULL, NULL),
(12, 'Slava', 'webmasISlava92@gmail.com', NULL, '$2y$10$1cC7Gaq3C80HVgUq0lK6FerpcOnKEme/PkFrLpJULRkGrzigPl4kC', NULL, 'client', NULL, NULL),
(13, 'Diva', 'webmaDiva392@gmail.com', NULL, '$2y$10$PMHRu41ghwyC0.B/l8Dpz.hk80SVeQbVU8cYp7/WVGsHwbV3yr7Bm', NULL, 'client', NULL, NULL),
(14, 'Sitlsl', 'webmasIKS392@gmail.com.in', NULL, '$2y$10$sl8e2zEfkerifr0oTUFC4uIVaBlHRTEhBIMMlfkWMozcbjeqtUNBq', NULL, 'client', NULL, NULL),
(17, 'Okoser', 'webmset92@gmail.com.in', NULL, '$2y$10$5m2ifsZyo8jo2.CXLFQPd.PTTPDNjc.FC3VqqoFf4G.2LwRgyjNO2', NULL, 'talent', NULL, NULL),
(18, 'dsfsd', 'webvdsfsdte9392@gmail.com', NULL, '$2y$10$UWbi6YQ6InQQS7fW2cXR6uDLGUaUYY2ecHNKJUs0qbccpsYEdQB8W', NULL, 'talent', NULL, NULL),
(19, 'daaslk', 'webdaaslkKS392@gmail.com', NULL, '$2y$10$eGaS1k6hXp/B3J/4b8W4YOgnYrVtvWDoKcb6VhXk5sSkzAzjrG5mW', NULL, 'talent', NULL, NULL),
(20, 'TT3-SJTW', 'webTT34ssst92@gmail.com.in', NULL, '$2y$10$/oRYMD.CTT5Swd//llINteksuZU134q821A9qwihd.Q..KL/8OGJm', NULL, 'talent', NULL, '2022-02-24 05:53:45'),
(21, 'KOSOE', 'webTesre@gmail.com.in', NULL, '$2y$10$qbYDAqXob60d6AWBWPdCwuTZYTkPATkPNpPlpwvwPurXw.jtlKKs6', NULL, 'talent', NULL, NULL),
(22, 'kkk', 'webssssTT34ssst92@gmail.com.in', NULL, '$2y$10$nGqqk4LbNkwCV258DMAfGOEmW2WJ/1fihIbh0piiosa.W4AimGSHm', NULL, 'client', NULL, NULL),
(23, 'IMAGETESTER', 'weimagete2@gmail.com.in', NULL, '$2y$10$6C1KfjzxT08mLoR0SDSWteHRJclKlihNJCFjumWaCDFBycQJ17/cO', NULL, 'talent', NULL, NULL),
(24, 'sssss', 'wessssddr92@gmail.com.in', NULL, '$2y$10$Lw7ik3Cxv/fNFcCD1UPTa.uKXKrkMvW.ZzjFxNc3T1pJw1y3OutUa', NULL, 'talent', NULL, NULL),
(25, 'LOL', 'webLOLsst92@gmail.com.in', NULL, '$2y$10$JYDU9yVjAyINCI2ZgOpZGOYDNO5s0rp65tOyhJdnO4qRydiOcZqJi', NULL, 'talent', NULL, NULL),
(26, 'Final', 'weTE34ssst92@gmail.com.in', NULL, '$2y$10$8SYBdPAQkSe2wqnThlipt.DWU9W5XZFX1BpWcyC7f1DgTbNWclvz.', NULL, 'talent', NULL, NULL),
(27, 'SIlet', 'webSilet2@gmail.com.in', NULL, '$2y$10$mvI9BU1IY0K0i6mg4HVaW.tW1CkpKXbErEjM6qIc1QHPuwizdoclO', NULL, 'talent', NULL, NULL),
(29, 'KKK', 'webKKK@gmail.com', NULL, '$2y$10$g2EmV9k85FEsQ8VdLC6Ht./O3SLsiW0MPfBGAAJ9pQn7IFYVN9RAK', NULL, 'talent', NULL, NULL),
(30, 'TTTT', 'webTTTT@gmail.com.in', NULL, '$2y$10$9O51ZxP7n909nz0xEVc8VuTP06X.OTxSYuTuDRdvk8fi0kYHuv2MS', NULL, 'talent', NULL, NULL),
(31, 'lkjlkjasdf', 'weasdflle2@gmail.com', NULL, '$2y$10$7hZJtZ1D2PUvsWoqBfNDdu/WWlWJIMBtGyYgL.fDChxOatj2UYvH2', NULL, 'talent', NULL, NULL),
(32, 'COMPL', 'webCOMPL@gmail.com.in', NULL, '$2y$10$DBDbyHWXTl7o92fbG636vOLQ1PuSMnCj5R4zDp8mPsvvEO8ooYre.', NULL, 'talent', NULL, NULL),
(0, 'Demo Fankie', 'ffrankie906@gmail.com', NULL, '$2y$10$.rkwmp7df9dz1rds4ukOpuBUp7iBWyheTxqRCNPY68jIOYK2MGhlG', NULL, 'talent', NULL, NULL),
(0, 'Frankie', 'ffrankie123@gmail.com', NULL, '$2y$10$ryim8tntDcaI7vkJLUGN9um3mG1dgBgExVlQLW56PZNJuh0Ujqx6K', NULL, 'client', NULL, NULL),
(0, 'Abc', 'abc@abc.com', NULL, '$2y$10$hStEynwec92wA9y7QRzbgOWufSRwsvhyf4UaGlv9YbREsNf0UDym.', NULL, 'client', NULL, NULL),
(0, 'Talent King', 'king@abc.com', NULL, '$2y$10$eiRuGUiBrpSF37OBuJdYOOU7gcDVG7hRP5HZobazGeAuqP0X8ezOK', NULL, 'talent', NULL, NULL),
(0, 'Talent 101', '101@abc.com', NULL, '$2y$10$sBVxHp5WhXCf8xppl95KIuVwfyDDm41ODLR6WBCP/2diYBBg9ecoe', NULL, 'talent', NULL, NULL),
(0, 'abc 1', '111@abc.com', NULL, '$2y$10$bFtmH.NI.bh2g9PvzPcWsO/a1FKGjXyzGbBe8KOceZrDCUTjYHNfy', NULL, 'client', NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- 資料表索引 `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `cn_homepages`
--
ALTER TABLE `cn_homepages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `en_homepages`
--
ALTER TABLE `en_homepages`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
