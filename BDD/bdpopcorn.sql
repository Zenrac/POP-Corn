DROP DATABASE IF EXISTS bdpopcorn;
CREATE DATABASE IF NOT EXISTS bdpopcorn;
USE bdpopcorn;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 23 Octobre 2019 à 16:34
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdpopcorn`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `numAlbum` varchar(32) NOT NULL,
  `nomAlbum` varchar(150) DEFAULT NULL,
  `anneeAlbum` datetime DEFAULT NULL,
  `imageAlbum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`numAlbum`, `nomAlbum`, `anneeAlbum`, `imageAlbum`) VALUES
('0agqVZjOqVtqHkq3pTFPXb', 'Piece Of Your Heart', '2019-02-01 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2733a03f819723487ee3d5b0c36'),
('0B1vzblCZwbnUF8cv5jGkd', 'My Bad', '2019-03-07 00:00:00', 'https://i.scdn.co/image/6c1f62bfe24b3cf4a0f1c61448eada0ae0d16dff'),
('0obMz8EHnr3dg6NCUK4xWp', 'Dua Lipa (Complete Edition)', '2018-10-19 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2731764e1a1b94e887206782640'),
('0S0KGZnfBGSIssfF54WSJh', 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', '2019-03-29 00:00:00', 'https://i.scdn.co/image/cd89c09ece48d687d4b6a894e28300064ade5512'),
('0WGakTFs8cnggcYsHjIhgy', 'ME!', '2019-04-26 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27351e4bcd72f4d8c30111f5a4b'),
('13mHFNhrWrxqH08VbK7oQv', 'Don\'t Know How', '2017-04-10 00:00:00', 'https://i.scdn.co/image/572db915e8eb953394cea1b90ad667476e4862df'),
('13yMsBNa2femeWzhcDOqFw', 'i\'m so tired...', '2019-01-24 00:00:00', 'https://i.scdn.co/image/7fe337a427d07515fa4b5b91b65f8cd66bc81e70'),
('1AvXa8xFEXtR3hb4bgihIK', 'MAP OF THE SOUL : PERSONA', '2019-04-12 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27329d00196831bec20ebbff5c7'),
('1bcvtuHyO79DNAOOhHEkEm', 'On My Way', '2019-03-21 00:00:00', 'https://i.scdn.co/image/7af2c1b0883a703c77105e2d01a8a3c711ea2558'),
('1DNx0H5ZX1ax3yyRwtgT4S', 'Don\'t Forget About Me, Demos', '2018-10-16 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2734a42166d927b3acce345c5c0'),
('1fP5UnRB0WNWNHSZRHsRCR', 'Feel Good (feat. Daya)', '2017-03-03 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273a0070875ed2c45c6e123d016'),
('1FVR0Mg8rGHhLBpaO9MADY', 'Project Dreams', '2018-12-07 00:00:00', 'https://i.scdn.co/image/7bd761b531773e9eb02fcfff6ffefc9887dd3896'),
('1GySemCUsaTUREhIPAF3hH', 'Find U Again (feat. Camila Cabello)', '2019-05-30 00:00:00', 'https://i.scdn.co/image/22eb5aa5fbeb3aa0eac5c3de68c642e998b54f51'),
('1ifOcY0GEth5y4yRC4suyI', 'Naked', '2019-06-28 00:00:00', 'https://i.scdn.co/image/bab60ad3495515958467e53f14169ff8afe908bb'),
('1J2BrRxtQjVUa7X9Ne99xD', 'If I Can\'t Have You', '2019-05-03 00:00:00', 'https://i.scdn.co/image/50a23762ffe11c9f8d82450b6015f2d3685b5fe6'),
('1JawI0XkEwmQ5Bwef3RMbq', 'World War Joy...Takeaway', '2019-07-24 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273830ba1c24fc9e3d59517e5ec'),
('1KQiX6KfutAN1UEzZ4BK5Q', 'Sick Boy...This Feeling', '2018-09-18 00:00:00', 'https://i.scdn.co/image/449b46c148dbd2cba9403108a59c6b11bb132200'),
('1MvF4ulZKH7SaDQs9rE5nc', 'What Is Love? (Deluxe Edition)', '2018-11-30 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27337fb0680110fbb107740de5d'),
('1ONuDpN0a3zhCUyKCgtuzK', 'World War Joy', '2019-05-31 00:00:00', 'https://i.scdn.co/image/8edd8bc03d2c2c92b52d0b908e300acc4b9c98a2'),
('1otwHKoQ5KPaiekpYk4tWh', 'Con Calma', '2019-01-24 00:00:00', 'https://i.scdn.co/image/766d4badffb7fe6b45ecfa7f737c20e9382a4b78'),
('1q7a5wZeti0neU2jDn8Dz3', 'Solo (feat. Demi Lovato)', '2018-05-17 00:00:00', 'https://i.scdn.co/image/489a6a1ff485243cdf2652a2966a7626d6dce996'),
('1s9tU91VJt4sU5owi29GD3', 'True', '2013-01-01 00:00:00', 'https://i.scdn.co/image/475a5d46cf92bccce46ab199bd68169e441df699'),
('1sEK3rkUCHa84a81iWm8gT', 'Sunday Love', '2018-11-15 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27375e132a144c7c3c591e46d89'),
('1tFnP9PwIMeMIuj92mfswZ', 'Calma (Remix)', '2018-10-05 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273c736f0be0530ea1e1a7fd601'),
('1TwCR17ZsRgWTo00mmlzqq', 'Grip', '2018-12-06 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273d067ef1dace65ff02d69c47a'),
('1Uf67JAtkVWfdydzFFqNF2', 'Happiness Begins', '2019-06-07 00:00:00', 'https://i.scdn.co/image/c342eb9057635f67484812b77d31dd97ae4a3f24'),
('1V9oE8bVilClrk5naqyyvL', 'Dancing With A Stranger (with Normani)', '2019-01-11 00:00:00', 'https://i.scdn.co/image/c3546c5cb8b253184de8e9c03ff8394420d01b04'),
('20Ol6zZ0nLlc5EGTH1zA0j', 'Delirium (Deluxe)', '2015-11-06 00:00:00', 'https://i.scdn.co/image/f03a949ab5cf43f73c09d3593e3510f2d7c59e07'),
('21dd5QyItuoqvPkViQXlKf', 'You Need To Calm Down', '2019-06-14 00:00:00', 'https://i.scdn.co/image/6441b3a54e720b0fab3646c89ef35869d559414d'),
('29FoTD5vBY3Fq1QWhbl3FM', 'Hate Me (with Juice WRLD)', '2019-06-26 00:00:00', 'https://i.scdn.co/image/363bf71870dbf5575989f45dd5450679ebd01a86'),
('2aygqrnBUbPolcC6H1GUPS', 'Jesus In LA', '2019-07-16 00:00:00', 'https://i.scdn.co/image/0eafad6aab465ffa19ba46d2ab22a2111717eb9c'),
('2fYhqwDWXjbpjaIJPEfKFw', 'thank u, next', '2019-02-08 00:00:00', 'https://i.scdn.co/image/38205ab1bdc4b37b68b3ace40989afb6c2c1faa9'),
('2hBfao8GWZwHlUGDB8HVQO', 'Nothing Breaks Like a Heart (feat. Miley Cyrus)', '2018-11-30 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273ad79d30f49891b2a2f7757f8'),
('2k7vcF0Yr1drY0YsJQAACa', 'Almost (Sweet Music)', '2019-01-16 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273b72e0c5271a33a982a38ebae'),
('2qWVO5SXPdWAECnwEWYOJH', 'Don’t Call Me Angel (Charlie’s Angels)', '2019-09-13 00:00:00', 'https://i.scdn.co/image/0c787cbae7d6a27eff84c5a853b3397cfed47a8e'),
('2VPeosOdvgYH9wTT6QdbWx', 'Adrenaline', '2018-12-20 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2736f7c338746d1b4c332ab910e'),
('2xqSl9X8ulJayI0KxABaLV', 'I Wanna Know (feat. Bea Miller)', '2018-03-16 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273aba940d3db8ff59443876bc4'),
('2XvFk3xrG7dV6GhqcJSQHX', 'So Am I', '2019-03-07 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273b8dcf98474721fe404ad780d'),
('2XzL7kpsqEoEcB1M26P1cz', 'Bad Decisions', '2017-06-28 00:00:00', 'https://i.scdn.co/image/717f19639136246e09389508b6e114a5b8628b77'),
('2ZaX1FdZCwchXl1QZiD4O4', 'Señorita', '2019-06-21 00:00:00', 'https://i.scdn.co/image/848e61858fa76a1a1e262286a53c937dfba85237'),
('38kpkGLuPr1nNfD3iEyOlJ', 'Old Town Road', '2019-04-05 00:00:00', 'https://i.scdn.co/image/2cc54e7570d470966be2def87590dfa84f87076f'),
('3c7IGLGpCdyd8NdiOq5nT3', 'Sick Boy...Beach House', '2018-11-16 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27353d3f4fc35b2872141fb17cc'),
('3E12WU80fDMyu7GyIAx7wJ', 'Beautiful People (feat. Khalid)', '2019-06-28 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273358f874d5d31e76a8fe3f6d0'),
('3HXHo0qkSUO4M9p6PEnA01', 'Loco Contigo (with J. Balvin & Tyga)', '2019-06-13 00:00:00', 'https://i.scdn.co/image/0c8ceca9558adee17787f683ac27f05aeddd03a5'),
('3jfSJj7tHJxk1a4i2KZt9F', 'I Found You (with Calvin Harris)', '2018-11-02 00:00:00', 'https://i.scdn.co/image/5ebbb6d9c45dfbb2ab100bfba555271d4daab50d'),
('3KjXg0MDej2pG9fv6I22lT', 'Never Really Over', '2019-05-31 00:00:00', 'https://i.scdn.co/image/9924ffd7e36305f5c259991c1e5e8cee4ba8b0bf'),
('3nR9B40hYLKLcR0Eph3Goc', 'Memories', '2019-09-20 00:00:00', 'https://i.scdn.co/image/5b70313db3a032aa13d85ac0e78340e292c2812b'),
('3oIFxDIo2fwuk4lwCmFZCx', 'No.6 Collaborations Project', '2019-07-12 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273a53a148d92ce7afa20229e49'),
('3ubteGlws5KJiIDSn45zz8', 'Panini', '2019-06-20 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2734c81e8d88cb5e4b0eb195bd7'),
('3XalQXmk1Cek8ZBEjNQPFv', 'Cinnamon', '2018-05-18 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2738208749fdd7ac610bfb215ba'),
('3xgS4rfthlsvhW7J2WLiiR', 'Liar', '2019-09-04 00:00:00', 'https://i.scdn.co/image/c2fe77a00e77c9d5fc25a4c99b960705561f9e21'),
('40vQONzvJb6sKejDN3eWza', 'It\'s You', '2019-06-14 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273c1d281f747062f4687df6a9c'),
('47LpgGVshd0tbFSbm9tTLb', 'Sunflower (Spider-Man: Into the Spider-Verse)', '2018-10-18 00:00:00', 'https://i.scdn.co/image/3aa37254a41cf96e81572524ec523cb870f2bb89'),
('4INRJMYMJrSPsf5mbW26Fm', 'Let You Love Me', '2018-09-21 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273c2d8075e09b1eac3db8b6254'),
('4IRiXE5NROxknUSAUSjMoO', '7 EP', '2019-06-21 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273c0e7bf5cdd630f314f20586a'),
('4PwXTHenZZx7ebgsnTM65K', 'Giant (with Rag\'n\'Bone Man)', '2019-01-11 00:00:00', 'https://i.scdn.co/image/a6c96937505fceec277eb9865b40e29ec31dba4d'),
('4QAC6FquY8D0RXom13iE5J', 'One Thing Right', '2019-06-21 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273f0d9f552f55d802413da1002'),
('4SxQPH2WUVZbnhLPwDQuQT', 'On The Beach', '2019-05-10 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273882d7d86257a9c02f4429242'),
('4W0r9HOcuCC6Vh7aze2hwi', 'Sucker', '2019-03-01 00:00:00', 'https://i.scdn.co/image/2c9eb62138375b42f2390ae92d995adcd5f8904d'),
('4wquJImu8RtyEuDtIAsfcE', 'Higher Love', '2019-06-28 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2737c8977a0ad3a3a0627be9ed7'),
('4yenfBKQAR4ofEgNPk5Ocn', 'Cool', '2019-04-05 00:00:00', 'https://i.scdn.co/image/0d360953ca2c9c9fca62eb1e7577aa52429f4ad9'),
('55ShoKiZuaRd5jLZIvGsbc', 'See Me', '2019-06-14 00:00:00', 'https://i.scdn.co/image/fbbca688c4922aa05ac1156395387ab2c97f3125'),
('5658aM19fA3JVwTK6eQX70', 'Divinely Uninspired To A Hellish Extent', '2019-05-17 00:00:00', 'https://i.scdn.co/image/f7a77846ac8a88f49145850d88fdd6bf33944773'),
('57BhVBJbVPfIbwLANO5fSe', 'Rescue Me', '2019-05-17 00:00:00', 'https://i.scdn.co/image/e4acb5df8528cb1ea2fde55ba929dea6f2ec15a5'),
('58kvvQvx6OtLqEDhqYSzyM', 'Talk', '2019-02-07 00:00:00', 'https://i.scdn.co/image/9f091342e3186b9ec79d76af4879fba791445fd9'),
('5AXNN75OmMjFrwst6ExNPx', 'Sixteen', '2019-04-12 00:00:00', 'https://i.scdn.co/image/9b8eabdcce398439ae07609dcd63d4e46df86617'),
('5EqITahBSjWcU71mbhFPEf', 'Never Go Back', '2019-02-15 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2733e5170dca1d41c6ab6824506'),
('5FhCnvZ9Nnpk3VMXUU7PNR', 'Easier as Friends', '2019-09-25 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2734109737e0b5fd1edcfaf9119'),
('5FOy9CM3AZs86TIK7fsJTV', 'Small Talk', '2019-08-09 00:00:00', 'https://i.scdn.co/image/865f0f7895d0a1e05681e8a9ab269b6e46ba2072'),
('5i6CS5XcLZGLgaNCKlJvc2', 'Dance Monkey', '2019-05-10 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273a0486913512ed5f9f62b5d56'),
('5iUJzNJieRm5uJAtIk8Jxf', 'Medellín (with Maluma)', '2019-04-17 00:00:00', 'https://i.scdn.co/image/eda6f6cb52d680da53a4c86a7a6ba6952fa95cc7'),
('5Kh9C0tc6o7NEy9t0n2Mtg', 'I Love To Hate You', '2019-10-01 00:00:00', 'https://i.scdn.co/image/7bc369485e09d080c88c0dd32cdcd0769ff8666b'),
('5ljc69MQ6iwGcJ4SmHaAh5', 'Last Hurrah', '2019-02-15 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273967032732fbe7de24b4a463e'),
('5Nux7ozBJ5KJ02QYWwrneR', 'I Don\'t Care (with Justin Bieber)', '2019-05-10 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27357cc434093fd4b6af7500fd8'),
('5oUZ9TEZR3wOdvqzowuNwl', 'No.6 Collaborations Project', '2019-07-12 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2737ed2a6d678a53a5959b2894f'),
('5zGidcaAvNahQrYhyQwAQn', 'Borderline', '2019-04-12 00:00:00', 'https://i.scdn.co/image/99aedf0238d2043107763d5805392646add75e2a'),
('66QwiCFDLtRbrZ5Vs9wlL9', 'Graveyard', '2019-09-13 00:00:00', 'https://i.scdn.co/image/83920504446bc3c4a6fbfc2618f30621f945b745'),
('69t8rpgBN1ov5kCU6LDMuR', 'Tie Me Down (with Elley Duhé)', '2018-08-03 00:00:00', 'https://i.scdn.co/image/523e879decd1378f11721ec75b1b6fb1696fac40'),
('6Ad1E9vl75ZB3Ir87zwXIJ', 'TIM', '2019-06-06 00:00:00', 'https://i.scdn.co/image/b04be8ad2850e2e21ac9f951c06651ccf8150ecc'),
('6ApYSpXF8GxZAgBTHDzYge', 'Pray for the Wicked', '2018-06-22 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273c5148520a59be191eea16989'),
('6eV8O8De1mibErM1XM1tEc', 'On A Roll', '2019-06-14 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2733b2d2706cac8ec23c2207839'),
('6gPZmYBSipug1asf4zu9jh', 'What I Like About You (feat. Theresa Rex)', '2019-03-22 00:00:00', 'https://i.scdn.co/image/7ca2a131795f9093d85491df03c925dbe28875b7'),
('6jKZplJpy21R5lHaYHHjmZ', 'Narrated For You', '2018-11-16 00:00:00', 'https://i.scdn.co/image/7cda55af5e6189d18ebc7963671bd57d6271441c'),
('6NHS3hV16MZyfcp0nSHdrd', 'Here With Me', '2019-03-08 00:00:00', 'https://i.scdn.co/image/62d8ce6e4bc3485023c6997de7c466bc374d1d9b'),
('6ZvDJs17O3woQirttKRYCG', 'Sick Boy', '2018-12-14 00:00:00', 'https://i.scdn.co/image/ab67616d0000b2738e26bf4293c9da7a6439607b'),
('74Stw4HKAunID9L34z99Ac', 'I Smell Nice', '2019-08-09 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27384c3b1859268fa0556c6fee2'),
('75n7rjlC1fxezRtoMQmtL5', 'Circles', '2019-08-30 00:00:00', 'https://i.scdn.co/image/c23fbd742f14105b5308571c7074acdb6c96904c'),
('78EicdHZr5XBWD7llEZ1Jh', 'Happier', '2018-08-17 00:00:00', 'https://i.scdn.co/image/c67a2c8ab6f5dccae39dec6c2997f5d778f8c8ba'),
('7baaCf70tVcUBL2bbkuXjo', 'How Do You Sleep?', '2019-07-19 00:00:00', 'https://i.scdn.co/image/fda61c404f630478426acfd6d0337834df521ebd'),
('7CdLU3GgPy1PH5FVsrPlyA', 'Sweet but Psycho', '2018-08-17 00:00:00', 'https://i.scdn.co/image/9f92262af6d017302030d673f2826260b777edaf'),
('7DMS5dzWQu7R3D59CKw4TA', '365', '2019-02-14 00:00:00', 'https://i.scdn.co/image/94279c8b607c8fd5b07dfe28bd463227e139747e'),
('7eNi4JLsvO4nrHGNjOL45U', 'Don\'t Call Me Up', '2019-01-18 00:00:00', 'https://i.scdn.co/image/047073fa0db6a821b5e37f7dd0e3d818829290be'),
('7KJTuTXYSnBGNgAxte3CSg', 'No Sleep (feat. Bonn)', '2019-02-21 00:00:00', 'https://i.scdn.co/image/5fe401a2d9f1f026e4b16866bf752bf84fd4237f'),
('7KqNNYGSs3S4uFiDVIVOXY', 'Leave a Light On', '2017-10-13 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273df74e089ac668cc0e0db7641'),
('7M3UYQ41G8W704AKG0YC4Y', 'One Day', '2019-05-10 00:00:00', 'https://i.scdn.co/image/ab67616d0000b27322439cedb9187157ee614500'),
('7M4YAXOOg1XbWx03jg7t62', 'SHE IS COMING', '2019-05-31 00:00:00', 'https://i.scdn.co/image/ab67616d0000b273aedab249a3a60446fc2ef4e8'),
('7viSsSKXrDa95CtUcuc1Iv', 'KILL THIS LOVE', '2019-04-05 00:00:00', 'https://i.scdn.co/image/68c8cb90a5a3fc4ed0413ab6a7e4eac3953aa915');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `numAuteur` varchar(32) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`numAuteur`, `nom`, `prenom`) VALUES
('00FQb4jTyendYWaN8pK0wa', 'Lana', 'Del'),
('04gDigrS5kc9YWfZHwBETP', 'Maroon', '5'),
('06HL4z0CvFAxyc27GXpf02', 'Taylor', 'Swift'),
('0hGnFehADWb6JFBle9JvKS', 'SHEE', 'null'),
('0id62QV2SZZfvBn9xpmuCl', 'Aloe', 'Blacc'),
('0NWbwDZY1VkRqFafuQm6wk', 'Mike', 'WiLL'),
('0X2BH1fck6amBIoJhDVmmJ', 'Ellie', 'Goulding'),
('0xRXCcSX89eobfrshSVdyu', 'MEDUZA', 'null'),
('0Y5tJX1MQlPlqiwlOH1tJY', 'Travis', 'Scott'),
('0yfK1X1FO3SL3gqrho9V4A', 'Frame', 'null'),
('14scxEoUN7Dcx1m4EQ7oHe', 'Ashley', 'O'),
('1cZQSpDsxgKIX2yW5OR9Ot', 'Lennon', 'Stella'),
('1GC4Fvx1sbDOkzIAPlNPxE', 'CHEL', 'null'),
('1HBjj22wzbscIZ9sEb5dyf', 'Jonas', 'Blue'),
('1MIVXf74SZHmTIp4V4paH4', 'Mabel', 'null'),
('1o2NpYGqHiCq7FoiYdyd1x', 'Bea', 'Miller'),
('1r4hJ1h58CWwUQe3MxPuau', 'Maluma', 'null'),
('1sdnOXw9epamqw5ERPK8T5', 'Valntn', 'null'),
('1uNFoZAHBGtllmzznpCI3s', 'Justin', 'Bieber'),
('1vCWHaC5f2uS3yhpwWbIA6', 'Avicii', 'null'),
('1vyhD5VmyZ7KMfW5gqLgo5', 'J', 'Balvin'),
('1yGpY2jZ3nPef5EKzHuova', 'Eden', 'Farrow'),
('1zNqQNIdeOUZHb8zbZRFMX', 'Swae', 'Lee'),
('20JZFwl6HVl6yg8a4H3ZqK', 'Panic!', 'At'),
('23fqKkggKUBHNkbKtXEls4', 'Kygo', 'null'),
('246dkjvS1zLTtiykXe5h60', 'Post', 'Malone'),
('26VFTg2z8YR0cCuwLzESi2', 'Halsey', 'null'),
('2cWZOOzeOm4WmBJRnD5R7I', 'Normani', 'null'),
('2FXC3k01G6Gw61bmprjgqS', 'Hozier', 'null'),
('2NjfBq1NflQcKSeiDooVjY', 'Tones', 'and'),
('2nm38smINjms1LtczR0Cei', 'Goodboys', 'null'),
('2qxJFvFYMEDqd7ui6kSAcq', 'Zedd', 'null'),
('2wY79sveU1sp5g7SokKOiI', 'Sam', 'Smith'),
('2ZRQcIgzPCVaT9XKhXZIzh', 'Gryffin', 'null'),
('30msSIU3VQ77ER0lJBVF5q', 'Bijou.', 'null'),
('329e4yvIujISKGKz1BZZbO', 'Farruko', 'null'),
('3CjlHNtplJyTf9npxaPl5w', 'CHVRCHES', 'null'),
('3EOEK57CV77D4ovYVcmiyt', 'Dennis', 'Lloyd'),
('3hv9jJF3adDNsBSIQDqcjp', 'Mark', 'Ronson'),
('3Nrfpe0tUJi4K4DXYWgMUX', 'BTS', 'null'),
('3oSJ7TBVCWMDMiYjXNiCKE', 'Kane', 'Brown'),
('3RqBeV12Tt7A8xH3zBDDUF', 'Kelsea', 'Ballerini'),
('3uZFBSsMiooimnprFL9jD1', 'Snow', 'null'),
('3WGpXCj9YhhfX11TToZcXP', 'Troye', 'Sivan'),
('3XC57xz74X3xUi1hv4mge1', 'Winona', 'Oak'),
('41MozSoPIsD1dJM0CLPjZF', 'BLACKPINK', 'null'),
('45eNHdiiabvmbp4erw26rg', 'ILLENIUM', 'null'),
('4exLIFE8sISLr28sqG1qNX', 'Travis', 'Barker'),
('4f9iBmdUOhQWeP7dcAn1pf', 'Rag\'n\'Bone', 'Man'),
('4FcZfItjVIsfO9TynErl7X', 'Jubël', 'null'),
('4GNC7GD6oZMSxPGyXy4MNB', 'Lewis', 'Capaldi'),
('4kYSro6naA4h99UJvo89HB', 'Cardi', 'B'),
('4MCBfE4596Uoi2O4DtmEMz', 'Juice', 'WRLD'),
('4nDoRrQiYLoBzwC5BhVJzF', 'Camila', 'Cabello'),
('4npEfmQ6YuiwW1GpUmaq3F', 'Ava', 'Max'),
('4QVBYiagIaa6ZGSPMbybpy', 'Pedro', 'Capó'),
('4rTv3Ejc7hKMtmoBOK1B4T', 'Ali', 'Gatie'),
('4s9YSRHrBFUpUZPWk2mwIG', 'JPson', 'null'),
('4VMYDCV2IEDYJArk749S6m', 'Daddy', 'Yankee'),
('4Z6yPeF2Ytgp3tZATwf6Jw', 'Sedric', 'Perry'),
('540vIaP2JwjQb9dm3aArA4', 'DJ', 'Snake'),
('5CCwRZC6euC8Odo6y9X8jr', 'Rita', 'Ora'),
('5CiGnKThu5ctn9pBxv7DGa', 'benny', 'blanco'),
('5CVsjwjuzUOrlEc2OJbUg4', 'Lucian', 'null'),
('5gmqOewLQ5JCmIxC3jbXY8', 'Asmow', 'null'),
('5IH6FPUwQTxPSXurCrcIov', 'Alec', 'Benjamin'),
('5INjqkS1o8h1imAzPqGZBb', 'Tame', 'Impala'),
('5iNrZmtVMtYev5M9yoWpEq', 'Seeb', 'null'),
('5jAMCwdNHWr7JThxtMuEyy', 'NOTD', 'null'),
('5JZ7CnR6gTvEMKX4g70Amv', 'Lauv', 'null'),
('5LHRHt1k9lMyONurDHEdrp', 'Tyga', 'null'),
('5lrz0mrA1LeRygTr1pOWQ8', 'Kat', 'Saul'),
('5Pwc4xIPtQLFEnJriah9YJ', 'OneRepublic', 'null'),
('5T5ZaU34lO3mfEXHcPyJlZ', 'Aviella', 'Winder'),
('5YGY8feqx7naU7z4HrwZM6', 'Miley', 'Cyrus'),
('60d24wfXkVzDSfLS6hyCjZ', 'Martin', 'Garrix'),
('60rpJ9SgigSd16DOAG7GSa', 'Billy', 'Ray'),
('64KEffDW9EtZ1y2vBYgq8T', 'Marshmello', 'null'),
('64M6ah0SkkRsnPGtGiRAbb', 'Bebe', 'Rexha'),
('66CXWjxzNUsdJxJ2JdwvnR', 'Ariana', 'Grande'),
('67MNhiAICFY6Pwc2YxCO0K', 'Elley', 'Duhé'),
('69GGBxA162lTqCwzJG5jLp', 'The', 'Chainsmokers'),
('6CoTYzOyg2NW2OUEFaSTxO', 'Hurley', 'Mower'),
('6Dd3NScHWwnW6obMFbl1BH', 'Daya', 'null'),
('6eUKZXaKkcviH0Ku9w2n3V', 'Ed', 'Sheeran'),
('6eYFryfcEu3QSq59D62wZQ', 'Brendon', 'Urie'),
('6jJ0s89eD6GaHleKKya26X', 'Katy', 'Perry'),
('6LuN9FCkKOj5PcnpouEgny', 'Khalid', 'null'),
('6M2wZ9GZgrQXHCFfjv46we', 'Dua', 'Lipa'),
('6MDME20pz9RveH9rEXvrOM', 'Clean', 'Bandit'),
('6n4qDgsuoohAN5Q7HebLvU', 'Naliya', 'null'),
('6nS5roXSAGhTGr34W6n7Et', 'Disclosure', 'null'),
('6qqNVTkY8uBg9cP3Jd7DAH', 'Billie', 'Eilish'),
('6S2OmqARrzebs0tKUEyXyp', 'Demi', 'Lovato'),
('6t9tbRO9Lv6Oq6xtVwfdrn', 'Theresa', 'Rex'),
('6tbjWDEIzxoDsBA1FuhfPW', 'Madonna', 'null'),
('6USv9qhCn6zfxlBQIYJ9qs', 'Dominic', 'Fike'),
('6XpaIBNiVzIetEPCWDvAFP', 'Whitney', 'Houston'),
('74KM79TiuVKeVCqs8QtB0B', 'Sabrina', 'Carpenter'),
('757aE44tKEUQEqRuT6GnEB', 'Roddy', 'Ricch'),
('7CajNmpbOovFoOoasH2HaY', 'Calvin', 'Harris'),
('7EQ0qTo7fWT7DPxmxtSYEc', 'Bastille', 'null'),
('7gOdHgIoIKoe4i9Tta6qdD', 'Jonas', 'Brothers'),
('7ic9h4HxC9vccg3mk4NRFV', 'PLYA', 'null'),
('7Io0XduXk7aOHFHA7sLru2', 'Bonn', 'null'),
('7jVv8c5Fj3E9VhNjxT4snq', 'Lil', 'Nas'),
('7n2wHs1TKAczGzO7Dd2rGr', 'Shawn', 'Mendes'),
('7vk5e3vY1uw9plTHJAMwjN', 'Alan', 'Walker'),
('7z2avKuuiMAT4XZJFv8Rvh', 'Tom', 'Walker');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `numAuteur` varchar(32) NOT NULL,
  `numAlbum` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `composer`
--

INSERT INTO `composer` (`numAuteur`, `numAlbum`) VALUES
('0xRXCcSX89eobfrshSVdyu', '0agqVZjOqVtqHkq3pTFPXb'),
('6LuN9FCkKOj5PcnpouEgny', '0B1vzblCZwbnUF8cv5jGkd'),
('6M2wZ9GZgrQXHCFfjv46we', '0obMz8EHnr3dg6NCUK4xWp'),
('6qqNVTkY8uBg9cP3Jd7DAH', '0S0KGZnfBGSIssfF54WSJh'),
('06HL4z0CvFAxyc27GXpf02', '0WGakTFs8cnggcYsHjIhgy'),
('20JZFwl6HVl6yg8a4H3ZqK', '0WGakTFs8cnggcYsHjIhgy'),
('6eYFryfcEu3QSq59D62wZQ', '0WGakTFs8cnggcYsHjIhgy'),
('5gmqOewLQ5JCmIxC3jbXY8', '13mHFNhrWrxqH08VbK7oQv'),
('3WGpXCj9YhhfX11TToZcXP', '13yMsBNa2femeWzhcDOqFw'),
('5JZ7CnR6gTvEMKX4g70Amv', '13yMsBNa2femeWzhcDOqFw'),
('3Nrfpe0tUJi4K4DXYWgMUX', '1AvXa8xFEXtR3hb4bgihIK'),
('329e4yvIujISKGKz1BZZbO', '1bcvtuHyO79DNAOOhHEkEm'),
('74KM79TiuVKeVCqs8QtB0B', '1bcvtuHyO79DNAOOhHEkEm'),
('7vk5e3vY1uw9plTHJAMwjN', '1bcvtuHyO79DNAOOhHEkEm'),
('6USv9qhCn6zfxlBQIYJ9qs', '1DNx0H5ZX1ax3yyRwtgT4S'),
('2ZRQcIgzPCVaT9XKhXZIzh', '1fP5UnRB0WNWNHSZRHsRCR'),
('45eNHdiiabvmbp4erw26rg', '1fP5UnRB0WNWNHSZRHsRCR'),
('64KEffDW9EtZ1y2vBYgq8T', '1FVR0Mg8rGHhLBpaO9MADY'),
('757aE44tKEUQEqRuT6GnEB', '1FVR0Mg8rGHhLBpaO9MADY'),
('3hv9jJF3adDNsBSIQDqcjp', '1GySemCUsaTUREhIPAF3hH'),
('4nDoRrQiYLoBzwC5BhVJzF', '1GySemCUsaTUREhIPAF3hH'),
('4Z6yPeF2Ytgp3tZATwf6Jw', '1ifOcY0GEth5y4yRC4suyI'),
('7n2wHs1TKAczGzO7Dd2rGr', '1J2BrRxtQjVUa7X9Ne99xD'),
('69GGBxA162lTqCwzJG5jLp', '1JawI0XkEwmQ5Bwef3RMbq'),
('69GGBxA162lTqCwzJG5jLp', '1KQiX6KfutAN1UEzZ4BK5Q'),
('6MDME20pz9RveH9rEXvrOM', '1MvF4ulZKH7SaDQs9rE5nc'),
('69GGBxA162lTqCwzJG5jLp', '1ONuDpN0a3zhCUyKCgtuzK'),
('4VMYDCV2IEDYJArk749S6m', '1otwHKoQ5KPaiekpYk4tWh'),
('6MDME20pz9RveH9rEXvrOM', '1q7a5wZeti0neU2jDn8Dz3'),
('6S2OmqARrzebs0tKUEyXyp', '1q7a5wZeti0neU2jDn8Dz3'),
('1vCWHaC5f2uS3yhpwWbIA6', '1s9tU91VJt4sU5owi29GD3'),
('1sdnOXw9epamqw5ERPK8T5', '1sEK3rkUCHa84a81iWm8gT'),
('6n4qDgsuoohAN5Q7HebLvU', '1sEK3rkUCHa84a81iWm8gT'),
('329e4yvIujISKGKz1BZZbO', '1tFnP9PwIMeMIuj92mfswZ'),
('4QVBYiagIaa6ZGSPMbybpy', '1tFnP9PwIMeMIuj92mfswZ'),
('5iNrZmtVMtYev5M9yoWpEq', '1TwCR17ZsRgWTo00mmlzqq'),
('7EQ0qTo7fWT7DPxmxtSYEc', '1TwCR17ZsRgWTo00mmlzqq'),
('7gOdHgIoIKoe4i9Tta6qdD', '1Uf67JAtkVWfdydzFFqNF2'),
('2cWZOOzeOm4WmBJRnD5R7I', '1V9oE8bVilClrk5naqyyvL'),
('2wY79sveU1sp5g7SokKOiI', '1V9oE8bVilClrk5naqyyvL'),
('0X2BH1fck6amBIoJhDVmmJ', '20Ol6zZ0nLlc5EGTH1zA0j'),
('06HL4z0CvFAxyc27GXpf02', '21dd5QyItuoqvPkViQXlKf'),
('0X2BH1fck6amBIoJhDVmmJ', '29FoTD5vBY3Fq1QWhbl3FM'),
('4MCBfE4596Uoi2O4DtmEMz', '29FoTD5vBY3Fq1QWhbl3FM'),
('5IH6FPUwQTxPSXurCrcIov', '2aygqrnBUbPolcC6H1GUPS'),
('66CXWjxzNUsdJxJ2JdwvnR', '2fYhqwDWXjbpjaIJPEfKFw'),
('3hv9jJF3adDNsBSIQDqcjp', '2hBfao8GWZwHlUGDB8HVQO'),
('5YGY8feqx7naU7z4HrwZM6', '2hBfao8GWZwHlUGDB8HVQO'),
('2FXC3k01G6Gw61bmprjgqS', '2k7vcF0Yr1drY0YsJQAACa'),
('00FQb4jTyendYWaN8pK0wa', '2qWVO5SXPdWAECnwEWYOJH'),
('5YGY8feqx7naU7z4HrwZM6', '2qWVO5SXPdWAECnwEWYOJH'),
('66CXWjxzNUsdJxJ2JdwvnR', '2qWVO5SXPdWAECnwEWYOJH'),
('7ic9h4HxC9vccg3mk4NRFV', '2VPeosOdvgYH9wTT6QdbWx'),
('1o2NpYGqHiCq7FoiYdyd1x', '2xqSl9X8ulJayI0KxABaLV'),
('5jAMCwdNHWr7JThxtMuEyy', '2xqSl9X8ulJayI0KxABaLV'),
('4npEfmQ6YuiwW1GpUmaq3F', '2XvFk3xrG7dV6GhqcJSQHX'),
('0yfK1X1FO3SL3gqrho9V4A', '2XzL7kpsqEoEcB1M26P1cz'),
('4nDoRrQiYLoBzwC5BhVJzF', '2ZaX1FdZCwchXl1QZiD4O4'),
('7n2wHs1TKAczGzO7Dd2rGr', '2ZaX1FdZCwchXl1QZiD4O4'),
('7jVv8c5Fj3E9VhNjxT4snq', '38kpkGLuPr1nNfD3iEyOlJ'),
('69GGBxA162lTqCwzJG5jLp', '3c7IGLGpCdyd8NdiOq5nT3'),
('6eUKZXaKkcviH0Ku9w2n3V', '3E12WU80fDMyu7GyIAx7wJ'),
('6LuN9FCkKOj5PcnpouEgny', '3E12WU80fDMyu7GyIAx7wJ'),
('1vyhD5VmyZ7KMfW5gqLgo5', '3HXHo0qkSUO4M9p6PEnA01'),
('540vIaP2JwjQb9dm3aArA4', '3HXHo0qkSUO4M9p6PEnA01'),
('5LHRHt1k9lMyONurDHEdrp', '3HXHo0qkSUO4M9p6PEnA01'),
('5CiGnKThu5ctn9pBxv7DGa', '3jfSJj7tHJxk1a4i2KZt9F'),
('7CajNmpbOovFoOoasH2HaY', '3jfSJj7tHJxk1a4i2KZt9F'),
('6jJ0s89eD6GaHleKKya26X', '3KjXg0MDej2pG9fv6I22lT'),
('04gDigrS5kc9YWfZHwBETP', '3nR9B40hYLKLcR0Eph3Goc'),
('6eUKZXaKkcviH0Ku9w2n3V', '3oIFxDIo2fwuk4lwCmFZCx'),
('7jVv8c5Fj3E9VhNjxT4snq', '3ubteGlws5KJiIDSn45zz8'),
('6CoTYzOyg2NW2OUEFaSTxO', '3XalQXmk1Cek8ZBEjNQPFv'),
('4nDoRrQiYLoBzwC5BhVJzF', '3xgS4rfthlsvhW7J2WLiiR'),
('4rTv3Ejc7hKMtmoBOK1B4T', '40vQONzvJb6sKejDN3eWza'),
('1zNqQNIdeOUZHb8zbZRFMX', '47LpgGVshd0tbFSbm9tTLb'),
('246dkjvS1zLTtiykXe5h60', '47LpgGVshd0tbFSbm9tTLb'),
('5CCwRZC6euC8Odo6y9X8jr', '4INRJMYMJrSPsf5mbW26Fm'),
('7jVv8c5Fj3E9VhNjxT4snq', '4IRiXE5NROxknUSAUSjMoO'),
('4f9iBmdUOhQWeP7dcAn1pf', '4PwXTHenZZx7ebgsnTM65K'),
('7CajNmpbOovFoOoasH2HaY', '4PwXTHenZZx7ebgsnTM65K'),
('3oSJ7TBVCWMDMiYjXNiCKE', '4QAC6FquY8D0RXom13iE5J'),
('64KEffDW9EtZ1y2vBYgq8T', '4QAC6FquY8D0RXom13iE5J'),
('4FcZfItjVIsfO9TynErl7X', '4SxQPH2WUVZbnhLPwDQuQT'),
('7gOdHgIoIKoe4i9Tta6qdD', '4W0r9HOcuCC6Vh7aze2hwi'),
('23fqKkggKUBHNkbKtXEls4', '4wquJImu8RtyEuDtIAsfcE'),
('6XpaIBNiVzIetEPCWDvAFP', '4wquJImu8RtyEuDtIAsfcE'),
('7gOdHgIoIKoe4i9Tta6qdD', '4yenfBKQAR4ofEgNPk5Ocn'),
('0hGnFehADWb6JFBle9JvKS', '55ShoKiZuaRd5jLZIvGsbc'),
('4GNC7GD6oZMSxPGyXy4MNB', '5658aM19fA3JVwTK6eQX70'),
('5Pwc4xIPtQLFEnJriah9YJ', '57BhVBJbVPfIbwLANO5fSe'),
('6LuN9FCkKOj5PcnpouEgny', '58kvvQvx6OtLqEDhqYSzyM'),
('6nS5roXSAGhTGr34W6n7Et', '58kvvQvx6OtLqEDhqYSzyM'),
('0X2BH1fck6amBIoJhDVmmJ', '5AXNN75OmMjFrwst6ExNPx'),
('3EOEK57CV77D4ovYVcmiyt', '5EqITahBSjWcU71mbhFPEf'),
('5CVsjwjuzUOrlEc2OJbUg4', '5FhCnvZ9Nnpk3VMXUU7PNR'),
('6jJ0s89eD6GaHleKKya26X', '5FOy9CM3AZs86TIK7fsJTV'),
('2NjfBq1NflQcKSeiDooVjY', '5i6CS5XcLZGLgaNCKlJvc2'),
('1r4hJ1h58CWwUQe3MxPuau', '5iUJzNJieRm5uJAtIk8Jxf'),
('6tbjWDEIzxoDsBA1FuhfPW', '5iUJzNJieRm5uJAtIk8Jxf'),
('5lrz0mrA1LeRygTr1pOWQ8', '5Kh9C0tc6o7NEy9t0n2Mtg'),
('64M6ah0SkkRsnPGtGiRAbb', '5ljc69MQ6iwGcJ4SmHaAh5'),
('1uNFoZAHBGtllmzznpCI3s', '5Nux7ozBJ5KJ02QYWwrneR'),
('6eUKZXaKkcviH0Ku9w2n3V', '5Nux7ozBJ5KJ02QYWwrneR'),
('6eUKZXaKkcviH0Ku9w2n3V', '5oUZ9TEZR3wOdvqzowuNwl'),
('5INjqkS1o8h1imAzPqGZBb', '5zGidcaAvNahQrYhyQwAQn'),
('26VFTg2z8YR0cCuwLzESi2', '66QwiCFDLtRbrZ5Vs9wlL9'),
('2ZRQcIgzPCVaT9XKhXZIzh', '69t8rpgBN1ov5kCU6LDMuR'),
('67MNhiAICFY6Pwc2YxCO0K', '69t8rpgBN1ov5kCU6LDMuR'),
('1vCWHaC5f2uS3yhpwWbIA6', '6Ad1E9vl75ZB3Ir87zwXIJ'),
('20JZFwl6HVl6yg8a4H3ZqK', '6ApYSpXF8GxZAgBTHDzYge'),
('14scxEoUN7Dcx1m4EQ7oHe', '6eV8O8De1mibErM1XM1tEc'),
('1HBjj22wzbscIZ9sEb5dyf', '6gPZmYBSipug1asf4zu9jh'),
('6t9tbRO9Lv6Oq6xtVwfdrn', '6gPZmYBSipug1asf4zu9jh'),
('5IH6FPUwQTxPSXurCrcIov', '6jKZplJpy21R5lHaYHHjmZ'),
('3CjlHNtplJyTf9npxaPl5w', '6NHS3hV16MZyfcp0nSHdrd'),
('64KEffDW9EtZ1y2vBYgq8T', '6NHS3hV16MZyfcp0nSHdrd'),
('69GGBxA162lTqCwzJG5jLp', '6ZvDJs17O3woQirttKRYCG'),
('1GC4Fvx1sbDOkzIAPlNPxE', '74Stw4HKAunID9L34z99Ac'),
('246dkjvS1zLTtiykXe5h60', '75n7rjlC1fxezRtoMQmtL5'),
('64KEffDW9EtZ1y2vBYgq8T', '78EicdHZr5XBWD7llEZ1Jh'),
('7EQ0qTo7fWT7DPxmxtSYEc', '78EicdHZr5XBWD7llEZ1Jh'),
('2wY79sveU1sp5g7SokKOiI', '7baaCf70tVcUBL2bbkuXjo'),
('4npEfmQ6YuiwW1GpUmaq3F', '7CdLU3GgPy1PH5FVsrPlyA'),
('2qxJFvFYMEDqd7ui6kSAcq', '7DMS5dzWQu7R3D59CKw4TA'),
('6jJ0s89eD6GaHleKKya26X', '7DMS5dzWQu7R3D59CKw4TA'),
('1MIVXf74SZHmTIp4V4paH4', '7eNi4JLsvO4nrHGNjOL45U'),
('60d24wfXkVzDSfLS6hyCjZ', '7KJTuTXYSnBGNgAxte3CSg'),
('7Io0XduXk7aOHFHA7sLru2', '7KJTuTXYSnBGNgAxte3CSg'),
('7z2avKuuiMAT4XZJFv8Rvh', '7KqNNYGSs3S4uFiDVIVOXY'),
('4s9YSRHrBFUpUZPWk2mwIG', '7M3UYQ41G8W704AKG0YC4Y'),
('5YGY8feqx7naU7z4HrwZM6', '7M4YAXOOg1XbWx03jg7t62'),
('41MozSoPIsD1dJM0CLPjZF', '7viSsSKXrDa95CtUcuc1Iv');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `numPlaylist` int(11) NOT NULL,
  `numMusique` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`numPlaylist`, `numMusique`) VALUES
(9, '0TK2YIli7K1leLovkQiNik');

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

CREATE TABLE `ecrire` (
  `numAuteur` varchar(32) NOT NULL,
  `numMusique` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ecrire`
--

INSERT INTO `ecrire` (`numAuteur`, `numMusique`) VALUES
('64M6ah0SkkRsnPGtGiRAbb', '05CwHjIk71RXVU40boRMnR'),
('69GGBxA162lTqCwzJG5jLp', '05CwHjIk71RXVU40boRMnR'),
('7gOdHgIoIKoe4i9Tta6qdD', '0DiDStADDVh3SvAsoJAFMk'),
('2ZRQcIgzPCVaT9XKhXZIzh', '0Ev562zA4pmUsBqjxsxxdx'),
('45eNHdiiabvmbp4erw26rg', '0Ev562zA4pmUsBqjxsxxdx'),
('6Dd3NScHWwnW6obMFbl1BH', '0Ev562zA4pmUsBqjxsxxdx'),
('64M6ah0SkkRsnPGtGiRAbb', '0i0wnv9UoFdZ5MfuFGQzMy'),
('5Pwc4xIPtQLFEnJriah9YJ', '0mjAU3yKR1QnXnHtjGJqTM'),
('69GGBxA162lTqCwzJG5jLp', '0N8MGHEDAq29ip7RrlrTeN'),
('64KEffDW9EtZ1y2vBYgq8T', '0PowxVSTY2uh1CPc8EPKyX'),
('757aE44tKEUQEqRuT6GnEB', '0PowxVSTY2uh1CPc8EPKyX'),
('6LuN9FCkKOj5PcnpouEgny', '0rTV5WefWd1J3OwIheTzxM'),
('6nS5roXSAGhTGr34W6n7Et', '0rTV5WefWd1J3OwIheTzxM'),
('0Y5tJX1MQlPlqiwlOH1tJY', '0Tdh0VTkzmPGeAQIXHYhVJ'),
('6eUKZXaKkcviH0Ku9w2n3V', '0Tdh0VTkzmPGeAQIXHYhVJ'),
('4nDoRrQiYLoBzwC5BhVJzF', '0TK2YIli7K1leLovkQiNik'),
('7n2wHs1TKAczGzO7Dd2rGr', '0TK2YIli7K1leLovkQiNik'),
('4npEfmQ6YuiwW1GpUmaq3F', '0uUNN1nSoUx1A4fkDCWDQ7'),
('6CoTYzOyg2NW2OUEFaSTxO', '0VH7wmxrvFD1VBU701vueP'),
('1vCWHaC5f2uS3yhpwWbIA6', '0vrmHPfoBadXVr2n0m1aqZ'),
('7ic9h4HxC9vccg3mk4NRFV', '0vxVmFrsrREswFaAT0QEkA'),
('3RqBeV12Tt7A8xH3zBDDUF', '15kQGEy89K8deJcZVFEn0N'),
('69GGBxA162lTqCwzJG5jLp', '15kQGEy89K8deJcZVFEn0N'),
('41MozSoPIsD1dJM0CLPjZF', '18PergoIrGmRyeYxnaXJN2'),
('1o2NpYGqHiCq7FoiYdyd1x', '18W92Zm1KjLCbUIszOhpkD'),
('5jAMCwdNHWr7JThxtMuEyy', '18W92Zm1KjLCbUIszOhpkD'),
('1zNqQNIdeOUZHb8zbZRFMX', '1A6OTy97kk0mMdm78rHsm8'),
('246dkjvS1zLTtiykXe5h60', '1A6OTy97kk0mMdm78rHsm8'),
('4exLIFE8sISLr28sqG1qNX', '1ABQT5SxlUTNapSbSzblGx'),
('7jVv8c5Fj3E9VhNjxT4snq', '1ABQT5SxlUTNapSbSzblGx'),
('60d24wfXkVzDSfLS6hyCjZ', '1ahVFh0ViDZr8LvkEVlq3B'),
('7Io0XduXk7aOHFHA7sLru2', '1ahVFh0ViDZr8LvkEVlq3B'),
('6LuN9FCkKOj5PcnpouEgny', '1DUSuNhF8P5vUGNPpQiZa5'),
('1vyhD5VmyZ7KMfW5gqLgo5', '1f38Gx6xQz6r4H1jGVNBJo'),
('540vIaP2JwjQb9dm3aArA4', '1f38Gx6xQz6r4H1jGVNBJo'),
('5LHRHt1k9lMyONurDHEdrp', '1f38Gx6xQz6r4H1jGVNBJo'),
('3hv9jJF3adDNsBSIQDqcjp', '1HpzOCZbNWzxvvXfSGtSrX'),
('4nDoRrQiYLoBzwC5BhVJzF', '1HpzOCZbNWzxvvXfSGtSrX'),
('20JZFwl6HVl6yg8a4H3ZqK', '1rqqCSm0Qe4I9rUvWncaom'),
('6USv9qhCn6zfxlBQIYJ9qs', '1tNJrcVe6gwLEiZCtprs1u'),
('4npEfmQ6YuiwW1GpUmaq3F', '25sgk305KZfyuqVBQIahim'),
('3hv9jJF3adDNsBSIQDqcjp', '27rdGxbavYJeBphck5MZAF'),
('5YGY8feqx7naU7z4HrwZM6', '27rdGxbavYJeBphck5MZAF'),
('06HL4z0CvFAxyc27GXpf02', '29fRTIKsJhLUJoldM89GZS'),
('04gDigrS5kc9YWfZHwBETP', '2b8fOow8UzyDFAE27YhOZM'),
('64KEffDW9EtZ1y2vBYgq8T', '2dpaYNEQHiRxtZbfNsse99'),
('7EQ0qTo7fWT7DPxmxtSYEc', '2dpaYNEQHiRxtZbfNsse99'),
('6qqNVTkY8uBg9cP3Jd7DAH', '2Fxmhks0bxGSBdJ92vM42m'),
('4FcZfItjVIsfO9TynErl7X', '2nNRWUZBeGLuxegmFhJeCZ'),
('3EOEK57CV77D4ovYVcmiyt', '2QrXzOqLCVDRZHkToA0tSR'),
('5IH6FPUwQTxPSXurCrcIov', '2qxmye6gAegTMjLKEBoR3d'),
('0id62QV2SZZfvBn9xpmuCl', '2x0RZdkZcD8QRI53XT4GI5'),
('1vCWHaC5f2uS3yhpwWbIA6', '2x0RZdkZcD8QRI53XT4GI5'),
('2qxJFvFYMEDqd7ui6kSAcq', '2XWjPtKdi5sucFYtVav07d'),
('6jJ0s89eD6GaHleKKya26X', '2XWjPtKdi5sucFYtVav07d'),
('1GC4Fvx1sbDOkzIAPlNPxE', '30JmFiqRUyMhniivPTewhD'),
('1yGpY2jZ3nPef5EKzHuova', '360avnWXoE7hNv6SBf8IY8'),
('5CVsjwjuzUOrlEc2OJbUg4', '360avnWXoE7hNv6SBf8IY8'),
('0NWbwDZY1VkRqFafuQm6wk', '3DB14jHq2qNoByUN5W2gz1'),
('1zNqQNIdeOUZHb8zbZRFMX', '3DB14jHq2qNoByUN5W2gz1'),
('5YGY8feqx7naU7z4HrwZM6', '3DB14jHq2qNoByUN5W2gz1'),
('5iNrZmtVMtYev5M9yoWpEq', '3gicyfiEVMGONgzygpWjNT'),
('7EQ0qTo7fWT7DPxmxtSYEc', '3gicyfiEVMGONgzygpWjNT'),
('1uNFoZAHBGtllmzznpCI3s', '3HVWdVOQ0ZA45FuZGSfvns'),
('6eUKZXaKkcviH0Ku9w2n3V', '3HVWdVOQ0ZA45FuZGSfvns'),
('00FQb4jTyendYWaN8pK0wa', '3NkJNL3WqO1Lqc3uNDxvCN'),
('5YGY8feqx7naU7z4HrwZM6', '3NkJNL3WqO1Lqc3uNDxvCN'),
('66CXWjxzNUsdJxJ2JdwvnR', '3NkJNL3WqO1Lqc3uNDxvCN'),
('5INjqkS1o8h1imAzPqGZBb', '3O8X1DE9btbzy4UH9cSX9a'),
('7gOdHgIoIKoe4i9Tta6qdD', '3QmolSZqjjLksTUvZJ6pPS'),
('1r4hJ1h58CWwUQe3MxPuau', '3tTV4DYlhkiXRNiiXwIAPf'),
('6tbjWDEIzxoDsBA1FuhfPW', '3tTV4DYlhkiXRNiiXwIAPf'),
('0hGnFehADWb6JFBle9JvKS', '3vJ6MqsdQwJV5s8gyguMji'),
('0X2BH1fck6amBIoJhDVmmJ', '3WDIhWoRWVcaHdRwMEHkkS'),
('6MDME20pz9RveH9rEXvrOM', '3WDIhWoRWVcaHdRwMEHkkS'),
('0X2BH1fck6amBIoJhDVmmJ', '3zHq9ouUJQFQRf3cm1rRLu'),
('2NjfBq1NflQcKSeiDooVjY', '421leiR6jKlH5KDdwLYrOs'),
('3XC57xz74X3xUi1hv4mge1', '4BiiOzZCrXEzHRLYcYFiD5'),
('69GGBxA162lTqCwzJG5jLp', '4BiiOzZCrXEzHRLYcYFiD5'),
('6eUKZXaKkcviH0Ku9w2n3V', '4evmHXcjt3bTUHD1cvny97'),
('6LuN9FCkKOj5PcnpouEgny', '4evmHXcjt3bTUHD1cvny97'),
('7z2avKuuiMAT4XZJFv8Rvh', '4Fvtl6P5d8h2lzzwhUCHHD'),
('1vCWHaC5f2uS3yhpwWbIA6', '4h8VwCb1MTGoLKueQ1WgbD'),
('3oSJ7TBVCWMDMiYjXNiCKE', '4hPpVbbakQNv8YTHYaOJP4'),
('64KEffDW9EtZ1y2vBYgq8T', '4hPpVbbakQNv8YTHYaOJP4'),
('5lrz0mrA1LeRygTr1pOWQ8', '4lSf7DQIzKA9tWFBSUfD1f'),
('329e4yvIujISKGKz1BZZbO', '4n7jnSxVLd8QioibtTDBDq'),
('74KM79TiuVKeVCqs8QtB0B', '4n7jnSxVLd8QioibtTDBDq'),
('7vk5e3vY1uw9plTHJAMwjN', '4n7jnSxVLd8QioibtTDBDq'),
('6jJ0s89eD6GaHleKKya26X', '4NmE2ytXI8S2svTRSmEdpO'),
('1HBjj22wzbscIZ9sEb5dyf', '4NSW0Km5ZG60L8FthUebPJ'),
('6t9tbRO9Lv6Oq6xtVwfdrn', '4NSW0Km5ZG60L8FthUebPJ'),
('4GNC7GD6oZMSxPGyXy4MNB', '4Of7rzpRpV1mWRbhp5rAqG'),
('0X2BH1fck6amBIoJhDVmmJ', '4PkIDTPGedm0enzdvilLNd'),
('1MIVXf74SZHmTIp4V4paH4', '4QjVfuu7om31HBan0jlX4p'),
('2ZRQcIgzPCVaT9XKhXZIzh', '4QVS8YCpK71R4FsxSMCjhP'),
('67MNhiAICFY6Pwc2YxCO0K', '4QVS8YCpK71R4FsxSMCjhP'),
('06HL4z0CvFAxyc27GXpf02', '4Sib57MmYGJzSvkW84jTwh'),
('6eYFryfcEu3QSq59D62wZQ', '4Sib57MmYGJzSvkW84jTwh'),
('5gmqOewLQ5JCmIxC3jbXY8', '4u0TyofXZ62soMf06S80Q5'),
('5T5ZaU34lO3mfEXHcPyJlZ', '4u0TyofXZ62soMf06S80Q5'),
('246dkjvS1zLTtiykXe5h60', '4VginDwYTP2eaHJzO0QMjG'),
('4kYSro6naA4h99UJvo89HB', '4vUmTMuQqjdnvlZmAH61Qk'),
('4nDoRrQiYLoBzwC5BhVJzF', '4vUmTMuQqjdnvlZmAH61Qk'),
('6eUKZXaKkcviH0Ku9w2n3V', '4vUmTMuQqjdnvlZmAH61Qk'),
('7gOdHgIoIKoe4i9Tta6qdD', '4y3OI86AEP6PQoDE6olYhO'),
('14scxEoUN7Dcx1m4EQ7oHe', '56JyMaElW79S7TDWh1Zw1m'),
('5IH6FPUwQTxPSXurCrcIov', '5i2JGF65pHKSfMEjSMrBC3'),
('3CjlHNtplJyTf9npxaPl5w', '5icOoE6VgqFKohjWWNp0Ac'),
('64KEffDW9EtZ1y2vBYgq8T', '5icOoE6VgqFKohjWWNp0Ac'),
('66CXWjxzNUsdJxJ2JdwvnR', '5Il6Oe7lr5XM7A0cWbVQtr'),
('4f9iBmdUOhQWeP7dcAn1pf', '5itOtNx0WxtJmi1TQ3RuRd'),
('7CajNmpbOovFoOoasH2HaY', '5itOtNx0WxtJmi1TQ3RuRd'),
('329e4yvIujISKGKz1BZZbO', '5iwz1NiezX7WWjnCgY5TH4'),
('4QVBYiagIaa6ZGSPMbybpy', '5iwz1NiezX7WWjnCgY5TH4'),
('26VFTg2z8YR0cCuwLzESi2', '5KawlOMHjWeUjQtnuRs22c'),
('3Nrfpe0tUJi4K4DXYWgMUX', '5KawlOMHjWeUjQtnuRs22c'),
('4s9YSRHrBFUpUZPWk2mwIG', '5MFpbvo0bNcl3mDwVMflRb'),
('0xRXCcSX89eobfrshSVdyu', '5p1ex0pXv6jSPJ6QbumQpD'),
('2nm38smINjms1LtczR0Cei', '5p1ex0pXv6jSPJ6QbumQpD'),
('6jJ0s89eD6GaHleKKya26X', '5PYQUBXc7NYeI1obMKSJK0'),
('5CiGnKThu5ctn9pBxv7DGa', '5sdb5pMhcK44SSLsj1moUh'),
('7CajNmpbOovFoOoasH2HaY', '5sdb5pMhcK44SSLsj1moUh'),
('3uZFBSsMiooimnprFL9jD1', '5w9c2J52mkdntKOmRLeM2m'),
('4VMYDCV2IEDYJArk749S6m', '5w9c2J52mkdntKOmRLeM2m'),
('7jVv8c5Fj3E9VhNjxT4snq', '68poZGRClFTzLdeRz9X0M2'),
('2wY79sveU1sp5g7SokKOiI', '6b2RcmUt1g9N9mQ3CbjX2Y'),
('0X2BH1fck6amBIoJhDVmmJ', '6kls8cSlUyHW2BUOkDJIZE'),
('4MCBfE4596Uoi2O4DtmEMz', '6kls8cSlUyHW2BUOkDJIZE'),
('6MDME20pz9RveH9rEXvrOM', '6kPJZM97LwdG9QIsT7khp6'),
('6S2OmqARrzebs0tKUEyXyp', '6kPJZM97LwdG9QIsT7khp6'),
('7n2wHs1TKAczGzO7Dd2rGr', '6LsAAHotRLMOHfCsSfYCsz'),
('4rTv3Ejc7hKMtmoBOK1B4T', '6moU77g9RQyMzHNuKEaQKq'),
('23fqKkggKUBHNkbKtXEls4', '6oJ6le65B3SEqPwMRNXWjY'),
('6XpaIBNiVzIetEPCWDvAFP', '6oJ6le65B3SEqPwMRNXWjY'),
('2cWZOOzeOm4WmBJRnD5R7I', '6Qs4SXO9dwPj5GKvVOv8Ki'),
('2wY79sveU1sp5g7SokKOiI', '6Qs4SXO9dwPj5GKvVOv8Ki'),
('60rpJ9SgigSd16DOAG7GSa', '6u7jPi22kF8CTQ3rb9DHE7'),
('7jVv8c5Fj3E9VhNjxT4snq', '6u7jPi22kF8CTQ3rb9DHE7'),
('26VFTg2z8YR0cCuwLzESi2', '6V9fHiv84WlVTg7CSnIVY2'),
('5YGY8feqx7naU7z4HrwZM6', '6vjymPak0JRQC2P84XlI9t'),
('1cZQSpDsxgKIX2yW5OR9Ot', '6wo37KVqFJhtuxPTpLCcfe'),
('45eNHdiiabvmbp4erw26rg', '6wo37KVqFJhtuxPTpLCcfe'),
('69GGBxA162lTqCwzJG5jLp', '6wo37KVqFJhtuxPTpLCcfe'),
('5CCwRZC6euC8Odo6y9X8jr', '6xtcFXSo8H9BZN637BMVKS'),
('4Z6yPeF2Ytgp3tZATwf6Jw', '7c4U2q0RQBPduq1aBTCQoY'),
('3WGpXCj9YhhfX11TToZcXP', '7COXchtUOMd6uIT6HvmRaI'),
('5JZ7CnR6gTvEMKX4g70Amv', '7COXchtUOMd6uIT6HvmRaI'),
('1sdnOXw9epamqw5ERPK8T5', '7FtQLQTo7fFPkM855kmAwm'),
('6n4qDgsuoohAN5Q7HebLvU', '7FtQLQTo7fFPkM855kmAwm'),
('41MozSoPIsD1dJM0CLPjZF', '7jr3iPu4O4bTCVwLMbdU2i'),
('6M2wZ9GZgrQXHCFfjv46we', '7jr3iPu4O4bTCVwLMbdU2i'),
('4nDoRrQiYLoBzwC5BhVJzF', '7LzouaWGFCy4tkXDOOnEyM'),
('2FXC3k01G6Gw61bmprjgqS', '7nDYw1nNAW4dAqgmW2W3tq'),
('4GNC7GD6oZMSxPGyXy4MNB', '7qEHsqek33rTcFNT9PFqLf'),
('0yfK1X1FO3SL3gqrho9V4A', '7xKgIO7hF7sbljmZa6TTEl'),
('30msSIU3VQ77ER0lJBVF5q', '7xKgIO7hF7sbljmZa6TTEl');

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `numMusique` varchar(32) NOT NULL,
  `numAlbum` varchar(32) DEFAULT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `duree` varchar(6) DEFAULT NULL,
  `top` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`numMusique`, `numAlbum`, `titre`, `duree`, `top`) VALUES
('05CwHjIk71RXVU40boRMnR', '1ONuDpN0a3zhCUyKCgtuzK', 'Call You Mine', '217653', 1),
('0DiDStADDVh3SvAsoJAFMk', '1Uf67JAtkVWfdydzFFqNF2', 'Only Human', '183000', 2),
('0Ev562zA4pmUsBqjxsxxdx', '1fP5UnRB0WNWNHSZRHsRCR', 'Feel Good (feat. Daya)', '248156', 1),
('0i0wnv9UoFdZ5MfuFGQzMy', '5ljc69MQ6iwGcJ4SmHaAh5', 'Last Hurrah', '150333', 3),
('0mjAU3yKR1QnXnHtjGJqTM', '57BhVBJbVPfIbwLANO5fSe', 'Rescue Me', '158899', 4),
('0N8MGHEDAq29ip7RrlrTeN', '3c7IGLGpCdyd8NdiOq5nT3', 'Beach House', '206120', 2),
('0PowxVSTY2uh1CPc8EPKyX', '1FVR0Mg8rGHhLBpaO9MADY', 'Project Dreams', '167898', 3),
('0rTV5WefWd1J3OwIheTzxM', '58kvvQvx6OtLqEDhqYSzyM', 'Talk', '197487', 5),
('0Tdh0VTkzmPGeAQIXHYhVJ', '5oUZ9TEZR3wOdvqzowuNwl', 'Antisocial (with Travis Scott)', '161746', 6),
('0TK2YIli7K1leLovkQiNik', '2ZaX1FdZCwchXl1QZiD4O4', 'Señorita', '190960', 7),
('0uUNN1nSoUx1A4fkDCWDQ7', '2XvFk3xrG7dV6GhqcJSQHX', 'So Am I', '183026', 8),
('0VH7wmxrvFD1VBU701vueP', '3XalQXmk1Cek8ZBEjNQPFv', 'Cinnamon', '169565', 4),
('0vrmHPfoBadXVr2n0m1aqZ', '6Ad1E9vl75ZB3Ir87zwXIJ', 'Heaven', '277261', 9),
('0vxVmFrsrREswFaAT0QEkA', '2VPeosOdvgYH9wTT6QdbWx', 'Adrenaline', '196080', 5),
('15kQGEy89K8deJcZVFEn0N', '1KQiX6KfutAN1UEzZ4BK5Q', 'This Feeling (feat. Kelsea Ballerini)', '199226', 6),
('18PergoIrGmRyeYxnaXJN2', '7viSsSKXrDa95CtUcuc1Iv', 'Kill This Love', '189052', 10),
('18W92Zm1KjLCbUIszOhpkD', '2xqSl9X8ulJayI0KxABaLV', 'I Wanna Know (feat. Bea Miller)', '197938', 7),
('1A6OTy97kk0mMdm78rHsm8', '47LpgGVshd0tbFSbm9tTLb', 'Sunflower - Spider-Man: Into the Spider-Verse', '158053', 8),
('1ABQT5SxlUTNapSbSzblGx', '4IRiXE5NROxknUSAUSjMoO', 'F9mily (You & Me)', '162720', 11),
('1ahVFh0ViDZr8LvkEVlq3B', '7KJTuTXYSnBGNgAxte3CSg', 'No Sleep (feat. Bonn)', '207094', 12),
('1DUSuNhF8P5vUGNPpQiZa5', '0B1vzblCZwbnUF8cv5jGkd', 'My Bad', '166101', 13),
('1f38Gx6xQz6r4H1jGVNBJo', '3HXHo0qkSUO4M9p6PEnA01', 'Loco Contigo (with J. Balvin & Tyga)', '185194', 14),
('1HpzOCZbNWzxvvXfSGtSrX', '1GySemCUsaTUREhIPAF3hH', 'Find U Again (feat. Camila Cabello)', '176416', 15),
('1rqqCSm0Qe4I9rUvWncaom', '6ApYSpXF8GxZAgBTHDzYge', 'High Hopes', '190946', 9),
('1tNJrcVe6gwLEiZCtprs1u', '1DNx0H5ZX1ax3yyRwtgT4S', '3 Nights', '177666', 10),
('25sgk305KZfyuqVBQIahim', '7CdLU3GgPy1PH5FVsrPlyA', 'Sweet but Psycho', '187436', 11),
('27rdGxbavYJeBphck5MZAF', '2hBfao8GWZwHlUGDB8HVQO', 'Nothing Breaks Like a Heart (feat. Miley Cyrus)', '217466', 12),
('29fRTIKsJhLUJoldM89GZS', '21dd5QyItuoqvPkViQXlKf', 'You Need To Calm Down', '171386', 16),
('2b8fOow8UzyDFAE27YhOZM', '3nR9B40hYLKLcR0Eph3Goc', 'Memories', '189486', 17),
('2dpaYNEQHiRxtZbfNsse99', '78EicdHZr5XBWD7llEZ1Jh', 'Happier', '214289', 13),
('2Fxmhks0bxGSBdJ92vM42m', '0S0KGZnfBGSIssfF54WSJh', 'bad guy', '194087', 18),
('2nNRWUZBeGLuxegmFhJeCZ', '4SxQPH2WUVZbnhLPwDQuQT', 'On The Beach', '188846', 19),
('2QrXzOqLCVDRZHkToA0tSR', '5EqITahBSjWcU71mbhFPEf', 'Never Go Back', '175424', 20),
('2qxmye6gAegTMjLKEBoR3d', '6jKZplJpy21R5lHaYHHjmZ', 'Let Me Down Slowly', '169353', 14),
('2x0RZdkZcD8QRI53XT4GI5', '6Ad1E9vl75ZB3Ir87zwXIJ', 'SOS (feat. Aloe Blacc)', '157202', 21),
('2XWjPtKdi5sucFYtVav07d', '7DMS5dzWQu7R3D59CKw4TA', '365', '181899', 22),
('30JmFiqRUyMhniivPTewhD', '74Stw4HKAunID9L34z99Ac', 'I Smell Nice', '211394', 23),
('360avnWXoE7hNv6SBf8IY8', '5FhCnvZ9Nnpk3VMXUU7PNR', 'Easier as Friends', '115703', 24),
('3DB14jHq2qNoByUN5W2gz1', '7M4YAXOOg1XbWx03jg7t62', 'Party Up The Street', '217253', 25),
('3gicyfiEVMGONgzygpWjNT', '1TwCR17ZsRgWTo00mmlzqq', 'Grip', '198074', 15),
('3HVWdVOQ0ZA45FuZGSfvns', '5Nux7ozBJ5KJ02QYWwrneR', 'I Don\'t Care (with Justin Bieber)', '219946', 26),
('3NkJNL3WqO1Lqc3uNDxvCN', '2qWVO5SXPdWAECnwEWYOJH', 'Don’t Call Me Angel (Charlie’s Angels) (with Miley Cyrus & Lana Del Rey)', '190106', 27),
('3O8X1DE9btbzy4UH9cSX9a', '5zGidcaAvNahQrYhyQwAQn', 'Borderline', '274293', 28),
('3QmolSZqjjLksTUvZJ6pPS', '4yenfBKQAR4ofEgNPk5Ocn', 'Cool', '167120', 29),
('3tTV4DYlhkiXRNiiXwIAPf', '5iUJzNJieRm5uJAtIk8Jxf', 'Medellín (with Maluma)', '298164', 30),
('3vJ6MqsdQwJV5s8gyguMji', '55ShoKiZuaRd5jLZIvGsbc', 'See Me', '195394', 31),
('3WDIhWoRWVcaHdRwMEHkkS', '1MvF4ulZKH7SaDQs9rE5nc', 'Mama (feat. Ellie Goulding)', '189973', 1),
('3zHq9ouUJQFQRf3cm1rRLu', '20Ol6zZ0nLlc5EGTH1zA0j', 'Love Me Like You Do - From "Fifty Shades Of Grey"', '252534', 16),
('421leiR6jKlH5KDdwLYrOs', '5i6CS5XcLZGLgaNCKlJvc2', 'Dance Monkey', '209754', 32),
('4BiiOzZCrXEzHRLYcYFiD5', '6ZvDJs17O3woQirttKRYCG', 'Hope', '180120', 17),
('4evmHXcjt3bTUHD1cvny97', '3E12WU80fDMyu7GyIAx7wJ', 'Beautiful People (feat. Khalid)', '197866', 33),
('4Fvtl6P5d8h2lzzwhUCHHD', '7KqNNYGSs3S4uFiDVIVOXY', 'Just You and I', '174982', 18),
('4h8VwCb1MTGoLKueQ1WgbD', '1s9tU91VJt4sU5owi29GD3', 'Wake Me Up', '247426', 19),
('4hPpVbbakQNv8YTHYaOJP4', '4QAC6FquY8D0RXom13iE5J', 'One Thing Right', '181823', 34),
('4lSf7DQIzKA9tWFBSUfD1f', '5Kh9C0tc6o7NEy9t0n2Mtg', 'I Love To Hate You', '137600', 35),
('4n7jnSxVLd8QioibtTDBDq', '1bcvtuHyO79DNAOOhHEkEm', 'On My Way', '193797', 36),
('4NmE2ytXI8S2svTRSmEdpO', '5FOy9CM3AZs86TIK7fsJTV', 'Small Talk', '161962', 37),
('4NSW0Km5ZG60L8FthUebPJ', '6gPZmYBSipug1asf4zu9jh', 'What I Like About You (feat. Theresa Rex)', '220396', 38),
('4Of7rzpRpV1mWRbhp5rAqG', '5658aM19fA3JVwTK6eQX70', 'Bruises', '220492', 39),
('4PkIDTPGedm0enzdvilLNd', '5AXNN75OmMjFrwst6ExNPx', 'Sixteen', '201072', 40),
('4QjVfuu7om31HBan0jlX4p', '7eNi4JLsvO4nrHGNjOL45U', 'Don\'t Call Me Up', '178480', 41),
('4QVS8YCpK71R4FsxSMCjhP', '69t8rpgBN1ov5kCU6LDMuR', 'Tie Me Down (with Elley Duhé)', '218295', 20),
('4Sib57MmYGJzSvkW84jTwh', '0WGakTFs8cnggcYsHjIhgy', 'ME! (feat. Brendon Urie of Panic! At The Disco)', '193040', 43),
('4u0TyofXZ62soMf06S80Q5', '13mHFNhrWrxqH08VbK7oQv', 'Don\'t Know How', '196285', 21),
('4VginDwYTP2eaHJzO0QMjG', '75n7rjlC1fxezRtoMQmtL5', 'Circles', '214906', 44),
('4vUmTMuQqjdnvlZmAH61Qk', '3oIFxDIo2fwuk4lwCmFZCx', 'South of the Border (feat. Camila Cabello & Cardi B)', '204466', 45),
('4y3OI86AEP6PQoDE6olYhO', '4W0r9HOcuCC6Vh7aze2hwi', 'Sucker', '181040', 46),
('56JyMaElW79S7TDWh1Zw1m', '6eV8O8De1mibErM1XM1tEc', 'On A Roll', '154447', 47),
('5i2JGF65pHKSfMEjSMrBC3', '2aygqrnBUbPolcC6H1GUPS', 'Jesus In LA', '172606', 48),
('5icOoE6VgqFKohjWWNp0Ac', '6NHS3hV16MZyfcp0nSHdrd', 'Here With Me', '156346', 49),
('5Il6Oe7lr5XM7A0cWbVQtr', '2fYhqwDWXjbpjaIJPEfKFw', 'bad idea', '267106', 50),
('5itOtNx0WxtJmi1TQ3RuRd', '4PwXTHenZZx7ebgsnTM65K', 'Giant (with Rag\'n\'Bone Man)', '229184', 51),
('5iwz1NiezX7WWjnCgY5TH4', '1tFnP9PwIMeMIuj92mfswZ', 'Calma - Remix', '238200', 16),
('5KawlOMHjWeUjQtnuRs22c', '1AvXa8xFEXtR3hb4bgihIK', 'Boy With Luv (feat. Halsey)', '229773', 52),
('5MFpbvo0bNcl3mDwVMflRb', '7M3UYQ41G8W704AKG0YC4Y', 'One Day', '215978', 53),
('5p1ex0pXv6jSPJ6QbumQpD', '0agqVZjOqVtqHkq3pTFPXb', 'Piece Of Your Heart', '152913', 54),
('5PYQUBXc7NYeI1obMKSJK0', '3KjXg0MDej2pG9fv6I22lT', 'Never Really Over', '223523', 55),
('5sdb5pMhcK44SSLsj1moUh', '3jfSJj7tHJxk1a4i2KZt9F', 'I Found You (with Calvin Harris)', '191495', 18),
('5w9c2J52mkdntKOmRLeM2m', '1otwHKoQ5KPaiekpYk4tWh', 'Con Calma', '193226', 56),
('68poZGRClFTzLdeRz9X0M2', '3ubteGlws5KJiIDSn45zz8', 'Panini', '114893', 57),
('6b2RcmUt1g9N9mQ3CbjX2Y', '7baaCf70tVcUBL2bbkuXjo', 'How Do You Sleep?', '202204', 58),
('6kls8cSlUyHW2BUOkDJIZE', '29FoTD5vBY3Fq1QWhbl3FM', 'Hate Me (with Juice WRLD)', '186223', 59),
('6kPJZM97LwdG9QIsT7khp6', '1q7a5wZeti0neU2jDn8Dz3', 'Solo (feat. Demi Lovato)', '222653', 19),
('6LsAAHotRLMOHfCsSfYCsz', '1J2BrRxtQjVUa7X9Ne99xD', 'If I Can\'t Have You', '190800', 60),
('6moU77g9RQyMzHNuKEaQKq', '40vQONzvJb6sKejDN3eWza', 'It\'s You', '212606', 61),
('6oJ6le65B3SEqPwMRNXWjY', '4wquJImu8RtyEuDtIAsfcE', 'Higher Love', '228267', 62),
('6Qs4SXO9dwPj5GKvVOv8Ki', '1V9oE8bVilClrk5naqyyvL', 'Dancing With A Stranger (with Normani)', '171029', 63),
('6u7jPi22kF8CTQ3rb9DHE7', '38kpkGLuPr1nNfD3iEyOlJ', 'Old Town Road (feat. Billy Ray Cyrus) - Remix', '157066', 64),
('6V9fHiv84WlVTg7CSnIVY2', '66QwiCFDLtRbrZ5Vs9wlL9', 'Graveyard', '181805', 65),
('6vjymPak0JRQC2P84XlI9t', '7M4YAXOOg1XbWx03jg7t62', 'Unholy', '130186', 66),
('6wo37KVqFJhtuxPTpLCcfe', '1JawI0XkEwmQ5Bwef3RMbq', 'Takeaway', '209893', 67),
('6xtcFXSo8H9BZN637BMVKS', '4INRJMYMJrSPsf5mbW26Fm', 'Let You Love Me', '190000', 21),
('7c4U2q0RQBPduq1aBTCQoY', '1ifOcY0GEth5y4yRC4suyI', 'Naked', '214077', 68),
('7COXchtUOMd6uIT6HvmRaI', '13yMsBNa2femeWzhcDOqFw', 'i\'m so tired...', '162582', 69),
('7FtQLQTo7fFPkM855kmAwm', '1sEK3rkUCHa84a81iWm8gT', 'Sunday Love', '213500', 22),
('7jr3iPu4O4bTCVwLMbdU2i', '0obMz8EHnr3dg6NCUK4xWp', 'Kiss and Make Up', '189173', 23),
('7LzouaWGFCy4tkXDOOnEyM', '3xgS4rfthlsvhW7J2WLiiR', 'Liar', '207038', 70),
('7nDYw1nNAW4dAqgmW2W3tq', '2k7vcF0Yr1drY0YsJQAACa', 'Almost (Sweet Music)', '217480', 71),
('7qEHsqek33rTcFNT9PFqLf', '5658aM19fA3JVwTK6eQX70', 'Someone You Loved', '182160', 72),
('7xKgIO7hF7sbljmZa6TTEl', '2XzL7kpsqEoEcB1M26P1cz', 'Bad Decisions', '219600', 24);

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
  `numPlaylist` int(11) NOT NULL,
  `numUser` int(11) NOT NULL,
  `nom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `playlist`
--

INSERT INTO `playlist` (`numPlaylist`, `numUser`, `nom`) VALUES
(9, 2, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `numMusique` varchar(32) NOT NULL,
  `numTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posseder`
--

INSERT INTO `posseder` (`numMusique`, `numTag`) VALUES
('05CwHjIk71RXVU40boRMnR', 1),
('0DiDStADDVh3SvAsoJAFMk', 1),
('0Ev562zA4pmUsBqjxsxxdx', 1),
('0i0wnv9UoFdZ5MfuFGQzMy', 1),
('0N8MGHEDAq29ip7RrlrTeN', 1),
('0Tdh0VTkzmPGeAQIXHYhVJ', 1),
('0TK2YIli7K1leLovkQiNik', 1),
('0VH7wmxrvFD1VBU701vueP', 1),
('0vrmHPfoBadXVr2n0m1aqZ', 1),
('0vxVmFrsrREswFaAT0QEkA', 1),
('18PergoIrGmRyeYxnaXJN2', 1),
('18W92Zm1KjLCbUIszOhpkD', 1),
('1ABQT5SxlUTNapSbSzblGx', 1),
('1ahVFh0ViDZr8LvkEVlq3B', 1),
('1DUSuNhF8P5vUGNPpQiZa5', 1),
('1f38Gx6xQz6r4H1jGVNBJo', 1),
('1HpzOCZbNWzxvvXfSGtSrX', 1),
('1rqqCSm0Qe4I9rUvWncaom', 1),
('1tNJrcVe6gwLEiZCtprs1u', 1),
('2b8fOow8UzyDFAE27YhOZM', 1),
('2dpaYNEQHiRxtZbfNsse99', 1),
('2Fxmhks0bxGSBdJ92vM42m', 1),
('2QrXzOqLCVDRZHkToA0tSR', 1),
('2qxmye6gAegTMjLKEBoR3d', 1),
('2XWjPtKdi5sucFYtVav07d', 1),
('30JmFiqRUyMhniivPTewhD', 1),
('360avnWXoE7hNv6SBf8IY8', 1),
('3gicyfiEVMGONgzygpWjNT', 1),
('3HVWdVOQ0ZA45FuZGSfvns', 1),
('3NkJNL3WqO1Lqc3uNDxvCN', 1),
('3O8X1DE9btbzy4UH9cSX9a', 1),
('3QmolSZqjjLksTUvZJ6pPS', 1),
('3tTV4DYlhkiXRNiiXwIAPf', 1),
('3WDIhWoRWVcaHdRwMEHkkS', 1),
('3zHq9ouUJQFQRf3cm1rRLu', 1),
('421leiR6jKlH5KDdwLYrOs', 1),
('4BiiOzZCrXEzHRLYcYFiD5', 1),
('4evmHXcjt3bTUHD1cvny97', 1),
('4Fvtl6P5d8h2lzzwhUCHHD', 1),
('4lSf7DQIzKA9tWFBSUfD1f', 1),
('4Of7rzpRpV1mWRbhp5rAqG', 1),
('4QjVfuu7om31HBan0jlX4p', 1),
('4Sib57MmYGJzSvkW84jTwh', 1),
('4u0TyofXZ62soMf06S80Q5', 1),
('4VginDwYTP2eaHJzO0QMjG', 1),
('5i2JGF65pHKSfMEjSMrBC3', 1),
('5icOoE6VgqFKohjWWNp0Ac', 1),
('5Il6Oe7lr5XM7A0cWbVQtr', 1),
('5itOtNx0WxtJmi1TQ3RuRd', 1),
('5iwz1NiezX7WWjnCgY5TH4', 1),
('5KawlOMHjWeUjQtnuRs22c', 1),
('5PYQUBXc7NYeI1obMKSJK0', 1),
('5sdb5pMhcK44SSLsj1moUh', 1),
('5w9c2J52mkdntKOmRLeM2m', 1),
('6b2RcmUt1g9N9mQ3CbjX2Y', 1),
('6kls8cSlUyHW2BUOkDJIZE', 1),
('6LsAAHotRLMOHfCsSfYCsz', 1),
('6moU77g9RQyMzHNuKEaQKq', 1),
('6oJ6le65B3SEqPwMRNXWjY', 1),
('6Qs4SXO9dwPj5GKvVOv8Ki', 1),
('6V9fHiv84WlVTg7CSnIVY2', 1),
('6xtcFXSo8H9BZN637BMVKS', 1),
('7c4U2q0RQBPduq1aBTCQoY', 1),
('7COXchtUOMd6uIT6HvmRaI', 1),
('7jr3iPu4O4bTCVwLMbdU2i', 1),
('7LzouaWGFCy4tkXDOOnEyM', 1),
('7nDYw1nNAW4dAqgmW2W3tq', 1),
('7xKgIO7hF7sbljmZa6TTEl', 1),
('0TK2YIli7K1leLovkQiNik', 2),
('1rqqCSm0Qe4I9rUvWncaom', 2),
('7LzouaWGFCy4tkXDOOnEyM', 2),
('18PergoIrGmRyeYxnaXJN2', 3),
('5KawlOMHjWeUjQtnuRs22c', 3),
('7jr3iPu4O4bTCVwLMbdU2i', 3),
('3gicyfiEVMGONgzygpWjNT', 4),
('5itOtNx0WxtJmi1TQ3RuRd', 4),
('0N8MGHEDAq29ip7RrlrTeN', 5),
('1tNJrcVe6gwLEiZCtprs1u', 5),
('2qxmye6gAegTMjLKEBoR3d', 5),
('7c4U2q0RQBPduq1aBTCQoY', 5),
('5PYQUBXc7NYeI1obMKSJK0', 6),
('5sdb5pMhcK44SSLsj1moUh', 6),
('6xtcFXSo8H9BZN637BMVKS', 6),
('7c4U2q0RQBPduq1aBTCQoY', 6),
('0TK2YIli7K1leLovkQiNik', 8),
('5w9c2J52mkdntKOmRLeM2m', 8);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `numTag` int(11) NOT NULL,
  `nomTag` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`numTag`, `nomTag`) VALUES
(1, 'Pop'),
(2, 'Pop-Rock'),
(3, 'K-Pop'),
(4, 'Hip-Pop'),
(5, 'Musique Alternative/indé'),
(6, 'Electro-Pop'),
(7, 'R&B/Soul'),
(8, 'Pop-Latino'),
(9, 'Pop-Rap'),
(10, 'Country-Pop');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `numUser` int(11) NOT NULL,
  `pseudo` varchar(32) DEFAULT NULL,
  `mdpUser` varchar(32) DEFAULT NULL,
  `Admin` enum('Oui','Non') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`numUser`, `pseudo`, `mdpUser`, `Admin`) VALUES
(1, 'toto', 'sio', 'Oui'),
(2, 'titi', 'tata', 'Non'),
(3, 'test', 'test', 'Non');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`numAlbum`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`numAuteur`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`numAuteur`,`numAlbum`),
  ADD KEY `FK_COMPOSER_ALBUM` (`numAlbum`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`numPlaylist`,`numMusique`),
  ADD KEY `FK_CONTENIR_MUSIQUE` (`numMusique`);

--
-- Index pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD PRIMARY KEY (`numAuteur`,`numMusique`),
  ADD KEY `FK_ECRIRE_MUSIQUE` (`numMusique`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`numMusique`),
  ADD KEY `FK_MUSIQUE_ALBUM` (`numAlbum`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`numPlaylist`),
  ADD KEY `FK_PLAYLIST_UTILISATEUR` (`numUser`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`numMusique`,`numTag`),
  ADD KEY `FK_POSSEDER_TAG` (`numTag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`numTag`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`numUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `numPlaylist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `numTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `numUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `FK_COMPOSER_ALBUM` FOREIGN KEY (`numAlbum`) REFERENCES `album` (`numAlbum`),
  ADD CONSTRAINT `FK_COMPOSER_AUTEUR` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`),
  ADD CONSTRAINT `FK_CONTENIR_PLAYLIST` FOREIGN KEY (`numPlaylist`) REFERENCES `playlist` (`numPlaylist`);

--
-- Contraintes pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD CONSTRAINT `FK_ECRIRE_AUTEUR` FOREIGN KEY (`numAuteur`) REFERENCES `auteur` (`numAuteur`),
  ADD CONSTRAINT `FK_ECRIRE_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `FK_MUSIQUE_ALBUM` FOREIGN KEY (`numAlbum`) REFERENCES `album` (`numAlbum`);

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_PLAYLIST_UTILISATEUR` FOREIGN KEY (`numUser`) REFERENCES `utilisateur` (`numUser`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_POSSEDER_MUSIQUE` FOREIGN KEY (`numMusique`) REFERENCES `musique` (`numMusique`),
  ADD CONSTRAINT `FK_POSSEDER_TAG` FOREIGN KEY (`numTag`) REFERENCES `tag` (`numTag`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
