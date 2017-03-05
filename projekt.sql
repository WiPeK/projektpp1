-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Maj 2016, 13:55
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  `parent_page` varchar(100) NOT NULL,
  `positive` int(100) DEFAULT '0',
  `negative` int(100) DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(200) DEFAULT 'assets/articles_logos/sample.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `pubdate`, `body`, `created`, `modified`, `created_by`, `modified_by`, `category`, `tags`, `parent_page`, `positive`, `negative`, `views`, `logo`) VALUES
(1, 'What is lorem ipsum?', '2015-06-17', '<p><strong style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2015-06-17 19:28:29', '2015-06-17 19:28:29', 'wipek', '', 'lorem, ipsum', 'lorem, ipsum, test', 'News_archive', 0, 0, 22, 'assets/articles_logos/a5c5cda7fade89d51958b39812ab38c6.jpg'),
(2, 'Where does it come from?', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</span></p>', '2015-06-17 19:32:14', '2015-06-17 19:32:14', 'wipek', '', 'lorem, ipsum, test', 'lorem, ipsum, test', 'Potwierdzone_info', 0, 0, 1, 'assets/articles_logos/28eb15bbee4441253980f1c82d154796.png'),
(3, 'Why do we use it?', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', '2015-06-17 19:35:20', '2015-06-17 19:35:20', 'wipek', '', 'lorem, ipsum, test', 'lorem, ipsum, test', 'Z_pierwszej_reki', 0, 0, 2, 'assets/articles_logos/07e12e54409bdc70139d138d7a4ce7ec.jpg'),
(4, 'Where can i get same?', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', '2015-06-17 19:36:46', '2015-06-17 19:36:46', 'wipek', '', 'lorem, ipsum, test', 'lorem, ipsum, test', 'News_archive', 0, 0, 0, 'assets/articles_logos/2c06914bc2c2b9d2b621dfc8d76a1206.jpg'),
(5, 'The standard Lorem Ipsum passage, used since the 1500s', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</span></p>', '2015-06-17 19:38:15', '2015-06-17 19:38:15', 'wipek', '', 'lorem, ipsum, test', 'lorem, ipsum, test', 'News_archive', 0, 0, 1, 'assets/articles_logos/e356ed08b38e3faeb47bc553cce38c8c.jpg'),
(6, 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</span></p>', '2015-06-17 19:38:46', '2015-06-17 19:38:46', 'wipek', '', 'lorem, ipsum, test', 'lorem, ipsum, test', 'News_archive', 0, 0, 3, 'assets/articles_logos/c8ec955c70cdd5cffa4da1ce90e838d6.jpg'),
(7, '1914 translation by H. Rackham', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</span></p>', '2015-06-17 19:39:59', '2015-06-17 19:39:59', 'wipek', '', 'mama, tata, kot', 'mama, tata, kot', 'Potwierdzone_info', 0, 0, 0, 'assets/articles_logos/acba4cf9c47c972c06237c21570e74a8.jpg'),
(8, 'Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</span></p>', '2015-06-17 19:40:33', '2015-06-17 19:40:33', 'wipek', '', 'mama, tata, kot', 'mama, tata, kot', 'Potwierdzone_info', 0, 0, 4, 'assets/articles_logos/bd0b518d6551de89aacc95665f674fa0.jpg'),
(9, '1914 translation by H. Rackham', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</span></p>', '2015-06-17 19:40:58', '2015-06-17 19:41:30', 'wipek', 'wipek', 'mama, tata, kot', 'mama, tata, kot', 'Potwierdzone_info', 0, 0, 1, 'assets/articles_logos/acba4cf9c47c972c06237c21570e74a8.jpg'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fermentum tempus ligula at molestie. Donec at purus semper leo dapibus congue in eu tortor. Fusce sed orci lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Morbi convallis tristique neque, sed maximus enim efficitur a. Suspendisse potenti. Ut eros libero, feugiat non convallis hendrerit, imperdiet sit amet libero.</span></p>', '2015-06-17 19:44:04', '2015-06-17 19:44:04', 'wipek', '', 'kawa, herbata, mleko', 'kawa, herbata, mleko', 'Z_pierwszej_reki', 0, 0, 3, 'assets/articles_logos/686b6065b04132cdb9bf0e44232288c4.jpg'),
(11, 'Duis mattis orci id lorem dignissim, facilisis mattis diam lobortis.', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Duis mattis orci id lorem dignissim, facilisis mattis diam lobortis. Aenean mauris nisl, viverra vitae tortor semper, auctor scelerisque leo. Suspendisse gravida est sed odio scelerisque, blandit aliquam neque vehicula. Praesent ex neque, maximus ut condimentum in, facilisis id magna. Aenean at faucibus mauris. Nunc non libero varius, hendrerit tellus quis, scelerisque felis. Morbi elementum, ante at consequat feugiat, mi nunc rhoncus nibh, nec faucibus felis nisl nec tortor. Fusce cursus, nibh luctus semper volutpat, magna ex posuere dolor, at lacinia ante enim ac nisl. Nulla in nibh ac orci hendrerit convallis. Sed vel dignissim ex, non elementum erat. Sed at vulputate neque.</span></p>', '2015-06-17 19:44:51', '2015-06-17 19:44:51', 'wipek', '', 'kawa, herbata, mleko', 'kawa, herbata, mleko', 'Z_pierwszej_reki', 0, 0, 3, 'assets/articles_logos/024c85b002fb34b464a8b3a0741018fe.jpg'),
(12, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-17', '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eu enim interdum, tincidunt dolor vitae, pretium magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non elit eu ante convallis lobortis eu at est. Sed sagittis arcu at cursus luctus. Morbi in tellus interdum, viverra libero eget, viverra enim. Fusce eros est, facilisis sit amet diam at, sollicitudin pharetra purus. Fusce nec odio tellus. Etiam egestas condimentum massa a aliquet. Pellentesque dapibus tincidunt metus et scelerisque. Vestibulum ut consequat risus. Fusce consectetur, nisi vel dignissim aliquet, nibh velit sodales est, vitae ullamcorper sem magna ac sapien.</span></p>', '2015-06-17 19:45:28', '2015-06-17 19:45:28', 'wipek', '', 'kawa, herbata, mleko', 'kawa, herbata, mleko', 'Z_pierwszej_reki', 0, 0, 16, 'assets/articles_logos/9c3a9ef54f1f7eb266d1152463fe6903.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cmsconfig`
--

CREATE TABLE IF NOT EXISTS `cmsconfig` (
  `id` int(2) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `regulamin` text,
  `favicon_url` varchar(100) DEFAULT NULL,
  `logo_url` varchar(100) DEFAULT NULL,
  `fb_link` varchar(200) NOT NULL DEFAULT '',
  `about` text,
  `today_post` varchar(150) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `cmsconfig`
--

INSERT INTO `cmsconfig` (`id`, `name`, `regulamin`, `favicon_url`, `logo_url`, `fb_link`, `about`, `today_post`, `description`, `keywords`) VALUES
(1, 'WiPeK', 'Test', '../assets/images/favicon.ico', 'assets/logo/50d730ca068ec7b980f61b4b1ed0cb96.png', 'https://www.facebook.com/portfoliowipek', 'CMS by WiPeK  eldo', '12', 'dsfdsfsdf', 'fsdfsdfdsf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) unsigned NOT NULL,
  `file_title` varchar(105) NOT NULL,
  `file_who_add` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `extension` varchar(20) NOT NULL DEFAULT '',
  `hash` varchar(300) DEFAULT NULL,
  `file_size` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) unsigned NOT NULL,
  `img_title` varchar(105) NOT NULL,
  `img_who_add` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `img_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(105) NOT NULL,
  `slug` varchar(105) NOT NULL,
  `order` int(11) DEFAULT '0',
  `body` text,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(200) DEFAULT '',
  `pageadress` varchar(200) DEFAULT NULL,
  `inc_def` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `order`, `body`, `parent_id`, `template`, `views`, `logo`, `pageadress`, `inc_def`) VALUES
(1, 'Homepage', '', 1, 'Strona główna', 0, 'homepage', 793, '', NULL, 1),
(2, 'Kontakt', 'contact', 3, '<p>Test jgbjkhdjkfbnd.fnbkdfmbdfb</p>', 0, 'page', 23, '../assets/pages_logos/92316d41c56daf9140fc04509aecaaca.jpg', NULL, 1),
(3, 'Z pierwszej reki', 'newsy', 2, '<p>gsdfgdfshdfs</p>', 0, 'news_archive', 106, '../assets/pages_logos/aff9b2f05a930c566443c544b1a5d3a1.jpg', NULL, 1),
(4, 'Potwierdzone info', 'pozdro', 4, '<p>gdgaaegdfg</p>', 0, 'news_archive', 30, '../assets/pages_logos/e4bf0d5b59558c736bdb8ebacc819ba4.jpg', NULL, 1),
(5, 'Galeria', 'galeria', 6, '', 0, 'static', 88, '', 'gallery/gallery_body', 0),
(6, 'News archive', 'niusy', 5, '<p>ddsgvdf</p>', 4, 'news_archive', 44, '../assets/pages_logos/f4620a34b1a90f7a013e7842646262f2.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `send_date` datetime NOT NULL,
  `answer_date` datetime DEFAULT NULL,
  `who_answer` varchar(100) DEFAULT NULL,
  `answer_body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `mods` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `create_date`, `last_login`, `mods`) VALUES
(1, 'wipek', 'e10adc3949ba59abbe56e057f20f883e', 'wipekxxx@gmail.com', '2015-01-09 21:49:00', '2015-06-17 20:41:09', 'admin'),
(6, 'pomidor', 'c33367701511b4f6020ec61ded352059', 'asdfsd@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin');

--
-- Indeksy dla zrzutów tabel
--
--
-- Indexes for table `cmsconfig`
--
ALTER TABLE `cmsconfig`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
