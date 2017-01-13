-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2017 at 10:22 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdracht-security-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `last_login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `salt`, `hashed_password`, `last_login_time`) VALUES
(1, 'test@gmail.com', '1230', '123', '0000-00-00 00:00:00'),
(2, 'teeeest@gmail.com', '144230', '44123', '0000-00-00 00:00:00'),
(3, 't@gml.com', '30', '3', '0000-00-00 00:00:00'),
(4, 'test@gmail.com', '1230', '123', '0000-00-00 00:00:00'),
(5, 't@gml.com', '4IKjSqQ_i131000161758752de97fec19.71664416', 'fab81a2b03ea724d75b61b1739cac7a8bd28414538fc998c914e454261a9f445', '0000-00-00 00:00:00'),
(6, 'poging1@poging.com', 'simpel44804834158752dfa46dfb5.92288282', '36d90a91a0497ff3664e9d93188637c391b5b8c213dbf7c7b7793ddc9bf82617', '0000-00-00 00:00:00'),
(7, 'poging2@poging.com', 'simpel121995414558752e20c8cc37.22461083', 'ff2ebe0f53a8a108d25fb31c39e5c158b570e84c43e83ae88dcc39b32516c890', '0000-00-00 00:00:00'),
(8, 'poging3@poging.com', 'zDHmO/h431797932958752e692408d2.13158587', 'f79c99ac3465ac13a2ae4276ed1786670cecde972f7e1eb62765505e562d347d', '0000-00-00 00:00:00'),
(9, 'l.com', '<br /><b>Notice</b>:  Undefined variable: randomPassword in <b>D:\\dropbox\\Dropbox 2\\Dropbox\\school\\4de jaar\\Web Back-end\\web-backend\\oplossingen\\poging 2\\opdracht-security-login\\index.php</b> on line <b>18</b><br />165227131558752e95653187.98311770', 'fefcdba4543d381fe81bbaa9d5e5c0b991b72e067228946f4f132f0a2875a909', '0000-00-00 00:00:00'),
(10, 'test', 'poging114464557158752e9e1c1290.00371413', 'b799ae6469e8641fb15a31732700a49b901c7552ac74c40fa46c9acf5e39c316', '0000-00-00 00:00:00'),
(18, 'test4', 'poging55105379558753057dc93d6.44729679', 'aaf8c49fa21f21a969dfb4cc1eb417818b515f04c3aad9794505f9e28622c58f', '0000-00-00 00:00:00'),
(22, 'test5', 'poging67520591587531261d5d76.56805006', '851822be61895a6986deb8c51b17141a94f8eedcc66336005ae04ba8722232bc', '2017-01-10 20:08:22'),
(24, 'poging6@poging.com', 'zDHmO/h432088057611587537a3272592.25887015', '23c4ba2d9523677f370831879d89beb3e1f09ca677e2e278e426f599875be4fc', '2017-01-10 20:36:03'),
(25, 'poging7@poging.com', 'zDHmO/h43745565344587537aac82f77.58108756', '19eaf5c180ca3bf98de14429dfcd29bf70eb535c419917f1a363997c6075fb5f', '2017-01-10 20:36:10'),
(26, 'test88@test.be', 'poging7798246735875391284ea19.21756262', '977b6707836008af2a41ff195d578e49c4d09ac1a6022661225e281f210dfe9e', '2017-01-10 20:42:10'),
(27, 'test88@test.bee', 'poging192947469558753917af2735.37409977', 'd49d4afd51cd930b57bef5eb4567859c36dacad9b1bde2975e722b548961797b', '2017-01-10 20:42:15'),
(28, 'poging78@poging.com', 'zDHmO/h4390189972558753a9289b221.95037459', '9c49b603cace8ebbb1a38bcd3968f751840ed66f49e6f9f16eab828a0259378e', '2017-01-10 20:48:34'),
(29, 'poging778@poging.com', 'zDHmO/h43129713997058753abe1ed476.75501347', '31a1ef23e911093b404bdc0b456e407cfb414c91373a8d42b2f65f4476cbc250', '2017-01-10 20:49:18'),
(30, 'poging7789@poging.com', 'zDHmO/h43194748475858753b0c5ec1c7.10206557', '2fa3f54a8365711f53376fe6a9e2e72a21f2abafee9cf24e065fd242db5038f3', '2017-01-10 20:50:36'),
(31, 'poging77889@poging.com', 'zDHmO/h4371547533158753b1abc5159.21875261', 'b64c5fe2ceb0fb5aba2d0e5a6c5d717b411030a9b0f68f5604f0ea984a4920c7', '2017-01-10 20:50:50'),
(32, 'test8888@test.bee', 'poging99666175558753c204e43f2.12438696', '16907f8966b79e5af5178ad80cb7300d5871929facbda4c92f0a89db1d089f1e', '2017-01-10 20:55:12'),
(33, 'test8@tesee', 'poging79583691558754415b93bc5.79590972', 'a18bdffee604a44573ecb2901c90d2254416341a6903b539fc6065a409a60106', '2017-01-10 21:29:09'),
(34, 'test@gma', 'l2r4aAa_M238761865587544e40cecc4.42503849', 'c904a404327e3d9c2ede6c0a7925db94fc3a1e6fb327e3b4e373fa2dcadb45d1', '2017-01-10 21:32:36'),
(35, 'test@gmail.comm', 'yYFTLx3+y1586302803587546045ace87.91646016', 'ea5f2aa4f9a5a6193298245f872a1bf56995110282af206d32dc20b9477361a9', '2017-01-10 21:37:24'),
(36, 'test@gmail.co', 'yYFTLx3+y246166120587546c86c8f69.84428055', 'c36037d6c933523ab4c015cb7c8057ae30d3127e0e1926937be3ed1210c17137', '2017-01-10 21:40:40'),
(37, 'test@gmail.c', 'yYFTLx3+y1537251410587547160991e8.76326419', 'b5d834761c8cdd1767b9a11cc02c6487efbe25dea022c9f1be26e3297d8a07c3', '2017-01-10 21:41:58'),
(38, 'test@gmail.comj', 'l2r4aAa_M17508085405875490395c598.21113702', 'e7c7264d2c12c0985df6cc2b93a8c0dd07f439a321ac1b3a8ccf308bcb522ca2', '2017-01-10 21:50:11'),
(39, 'test@gmail.comjf', 'l2r4aAa_M1001696580587555f25e9d91.80180691', '5d0815d191f5db1c625d14ec3975dda221e4c7235568d8769165b61e67e5cca6', '2017-01-10 22:45:22'),
(40, 'test@gmail.comjfff', 'l2r4aAa_M3299949458755a8654b5e0.30022069', '9de36c7293b0886304227aa2a62fff726adf56665c029a1db242ea35763d6f9b', '2017-01-10 23:04:54'),
(41, 'test@gmail.comjffff', 'l2r4aAa_M82372209558755ad0896169.86816036', '2ad852348395aa94bf7a1304acd128572d166f6166ed405b301a7ff270a0d96b', '2017-01-10 23:06:08'),
(42, 'test@gmail.comjfffff', 'l2r4aAa_M107692593458755af22d0353.99704606', '7db3b9ea13968cae6b5d936c93c6543bab3399ea953ef557d42ff1a097fc4400', '2017-01-10 23:06:42'),
(43, 'test9@test.com', 'l2r4aAa_M22050610858756264ae8619.56677060', '2fc3cc6c4b985f2998a4d5dfdf6c8ad479551181efc781625dbc954c1ee00801', '2017-01-10 23:38:28'),
(44, 'test99@test.com', 'l2r4aAa_M1707013377587562c0f24a43.93796453', '6bbd14ac4bb6a574738eddb575288bd087fa7e972360fb38143fd23cbfc550ed', '2017-01-10 23:40:00'),
(45, 'test999@test.com', 'h+%psv2UL571238659587564c98106e2.50646298', '9fd9645e0d1b5f83644367e5b5bfa61229f9a41987e22c31ccf9884964b78cfb', '2017-01-10 23:48:41'),
(46, 'opdrachtsecurity@gmail.com', 'qwerty165569513458760e1f185bf6.36841547', '887857cdbdfce286854edca345ffa5f4a4d20074933ee3ab870ebda6cb29d094', '2017-01-11 11:51:11'),
(47, 'hendrik@hendrik.com', 'qwerty159671604158760e32ce4692.54630222', 'd2971aa8cb2b761c36cead1075c26d46a7580f6c4b5f32b6c87fa4dd8bda6d7d', '2017-01-11 11:51:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
