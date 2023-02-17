-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 15:34
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2guestbook`
--

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`m_id`, `m_uname`, `m_uemail`, `m_uid`, `m_uhomepage`, `m_uagent`, `m_uip`, `m_created_at`, `m_text`, `m_status`) VALUES
(1, 'Dmitriy Ivanov', 'ivanov@sochismile.ru', 0, 'http://www.sochismile.ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-13 21:51:41', 'this is a test message with js alert(\'Bingo!\');. Strip_tags applied.', 1),
(2, 'John Smith', 'rgerhebe@ya.ru', 0, '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', '127.0.0.1', '2023-02-13 22:13:29', 'message 2 alert(\'Bingo!\'); lorem ipsum. Strip tags applied', 1),
(3, 'Антон Петров', 'gjkujyg@jhgfjhgjf.yu', 0, '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-13 22:19:22', 'dgg ehserhse serhshsh sfgsfhs shsrthrthrth dfgserg sgherhe', 1),
(5, 'testuser', 'fgdhdf@dhfgh.ru', 0, 'http://dfgdfgdsfg.ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-14 11:12:39', 'srhtrt rtuetyue fhgj57 6y tryujtrj hgjrtyujt \"tyty\"', 1),
(6, 'jkyfkhjgfk', 'khgjh@hgojh.jh', 0, 'http://jkhgfkhjgkf.ru', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-14 13:09:20', 'liygluiygol iuygouy gouiyg alert(\'tes\'); ouytfkygf uygou', 1),
(7, 'John', 'john@silver.com', 2, 'http://silver.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-15 17:12:05', 'This is my message. I\'m registererd as John )) edited', 1),
(8, 'Boris', 'boris@boris.net', 0, '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-15 20:16:19', 'dfgse ererhe', 1),
(9, 'Mary Poppins', 'mary@poppins.org', 0, 'http://marypoppins.org', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-15 22:23:17', 'checking captcha', 1),
(10, 'nick', 'nick@nick.ru', 0, '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-16 00:22:10', 'uploadng picture', 1),
(11, 'dfbfbf', 'fffns@dfgdfhgd.ty', 0, 'http://dgsdasgashh.yu', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '127.0.0.1', '2023-02-16 00:34:38', 'dfg rthrtherth ertueyjtetyje', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
