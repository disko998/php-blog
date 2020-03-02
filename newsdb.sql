-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2018 at 03:11 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Sport'),
(3, 'Hi-Tech'),
(6, 'Politics'),
(7, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `user_id`, `post_id`, `deleted`, `text`) VALUES
(9, 9, 1, b'0', 'Ovo je neki random komentar!');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`post_id`),
  KEY `fk_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `category_id`, `title`, `text`, `deleted`) VALUES
(1, 7, 'Pronasli smo jedinog coveka koji nije odusevljen igrom Red Dead Redemption 2 - evo sta ima da kaze o njoj', 'Red Dead Redemption 2 je najveci primer ikada starog načina pravljenja video igara. On gradi na osnovi Rockstara, ali ne donosi nista sto ce prodrmati stvari ili preispitati svoju osnovu.\r\n\r\nMislim da je ovo najbolja igra koju je Rockstar napravio, ali to joj uspeva samo zato sto je \"najvise igra\" od svih igara koje je ovaj studio napravio.\r\n\r\nIako ne mogu da kazem da ne uzivam u igri, vrlo cesto me razocarava. Ocekivao sam nesto drugacije.\r\n\r\nI ovde ne pricam o boljim kontrolama - iako bi to voleo.\r\n\r\nMislio sam da ce Rockstar napraviti svet koji ce reagovati na igraca. Ali, umesto toga dobili smo astronomski broj statickih, unapred određenih događaja.\r\n\r\nI dok to jeste impresivno, ne mogu a da se ne otmem utisku da je igra ostala zarobljena u proslosti.\r\n\r\nRealizam\r\n\r\nNa samom pocetku igre, vi i vasa banda uspevate da porazite rivalsku bandu. Nakon pucnjave, dobijate naređenje da pretrazite obliznji dom.\r\n\r\nKada priđete nekim fiokama koje deluju obecavajuce - tada se igra zaustavlja kako bi vas lik, Artur Morgan, polako ispitao svaku ponaosob. A kada pronađete nesto sto vam se sviđa, lik je uzima lagano i delikatno. I to se ponavlja za svaku stvar koja vam zapadne za oko', b'0'),
(6, 1, 'NALET EMOCIJA Novak se posle povratka na vrh setio Jelene GenÄiÄ‡: Bila mi je teniska majka, sreÄ‡an sam Å¡to je bila deo mog Å¾ivota!', 'NaÅ¡ najbolji teniser Novak ÄokoviÄ‡ se pobedom nad Damirom DÅ¾umhurom plasirao u Äetvrtfinale mastersa u Parizu, nakon Äega se setio svojih poÄetaka i Jelene GenÄiÄ‡, koja je bila njegov prvi trener.\r\n\r\nNole se posle odustajanja Rafaela Nadala u drugom kolu vratio na prvo mesto na ATP listi, a novinare u Francuskoj je interesovalo da li je u njegovoj igri neÅ¡to ostalo od GenÄiÄ‡eve, koja je preminula 2013. godine.\r\n\r\n- Ona je izgradila osnove za tenis i bazu na koju sam kasnije dodavao segmente i gradio igru. Ali osnova je definitivno njena. Proveo sam sa njom, rekao bih, kljuÄne godine svog razvoja kao tenisera, ali i Äoveka. Radili smo zajedno od moje sedme do 12. godine, a to je vreme kada treba da izgradite pravu bazu veÅ¡tina, mentalnog pristupa, odnosu prema tenisu i naÄina na koji Ä‡ete mu priÄ‡i - rekao je ÄokoviÄ‡, a prenosi B92.\r\n\r\nNovak je ponovio na koji je naÄin ona uticala na njegov razvoj.\r\n\r\n- Imao sam mnogo sreÄ‡e Å¡to je bila deo mog Å¾ivota kao teniska majka, kako volim da je zovem. Vodila je raÄuna o meni, ocenama koje imam u Å¡koli, kako se odnosim prema drugim ljudima i svemu ostalom. Uporedo sa mojim roditeljima me je odgajala i oni su joj verovali. Ona je bila taj pravi mentor koji mi je bio potreban da nauÄim prave stvari u tenisu, ali i generalno u Å¾ivotu. Kao Å¡to sam ranije govorio, zajedno smo Äitali poeziju, sluÅ¡ali klasiÄnu muziku, gledali pregrÅ¡t snimaka tenisa i ostalih sportova. Imala je holistiÄki pristup Å¾ivotu i mislim da zato isti pristup sada imam i ja - naglasio je Nole.', b'0'),
(7, 6, 'VuÄiÄ‡ o ZABRANI CRNE GORE: Å okiran sam, zvaÄ‡u Mila ÄukanoviÄ‡a', 'Zbog Albanaca koji Å¾ive u centralnoj Srbiji i na Kosovu, moram da kaÅ¾em da nisam neprijatelj Albanaca, naprotiv, ali jesam protivnik onih koji ugroÅ¾avaju, Å¾ele da progone i ubijaju srpski narod gde god se on nalazio, kaÅ¾e predsednik Srbije Aleksandar VuÄiÄ‡.\r\n\r\nOn je na ovaj naÄin prokomentarisao izjavu predsednika kosovske skupÅ¡tine Kadrija Veseljija da VuÄiÄ‡ najveÄ‡i neprijatelj kosovske nezavisnosti.\r\n\r\nSrpski predsednik je dodao i da Ä‡e posle Veseljijeve \"morati da vodi raÄuna u inostranstvu kako Ä‡e koji Albanac da reaguje ili da ugrozi neÄiju bezbednost\". On je naglasio da Ä‡e nastaviti da Âštiti interese Srbije i naÂšeg naroda.\r\n\r\n- Oni bi mnogo voleli da su im protivnici oni koje bi lako pobeÄ‘ivali, pa sam na neki naÄin i poÄastvovan takvom izjavom - kazao je VuÄiÄ‡.\r\n\r\nOn se osvrnuo i na danaÅ¡nji potez Crne Gore, koja je zabranila ulazak u tu zemlju srpskim intelektualcima Matiji BeÄ‡koviÄ‡u, ÄŒedomiru AntiÄ‡u, Aleksandru RakoviÄ‡u i Dejanu MiroviÄ‡u. Kazao je da je u vezi sa tim razgovarao sa ministrom unutraÅ¡njih poslova NebojÅ¡om StefanoviÄ‡em koji je, kaÅ¾e, imao kontakte sa MUP-om Crne Gore. Rekao je i da Srbija kao drÅ¾ava o ovome nije dobila nikakav dokument, i da je ponuÄ‘eno objaÅ¡njenje za ovakvo ponaÅ¡anje crnogorskih vlasti \"ugroÅ¾avanje sigurnosti i temelja bezbednosti Crne Gore\".', b'0'),
(8, 3, 'Vredi li novi iPhone 1.900 evra?', 'Danas je zvaniÄno poÄela prodaja tri nova modela iPhone i kod nas. iPhone Xr, najjeftiniiji od tri modela stigao je premijerno u isto vreme kada i u Americi, ali je Blic.rs u meÄ‘uvremenu testirao iPhone Xs i mnogo veÄ‡i i skuplji model iPhone Xs Max.\r\n\r\nO samim telefonima i njihovim specifikacijama se veÄ‡ sve zna. Predstavljeni su poÄetkom septembra kada nas je Apple upoznao sa novom generacijom iPhone ureÄ‘aja ali je naravno susret sa njima uÅ¾ivo ipak zanimljiv i impresivan, naroÄito iPhone Xs Max koji sa 6,5 inÄa i Äak 208 grama i izgleda i zaista jeste dÅ¾inovski.\r\n\r\nRazlog za to leÅ¾i u Äinjenici da je poleÄ‘ina telefona od stakla, onda idu metalne ivice koje daju premijum izgled, i na kraju odliÄan Super AMOLED displej koji ovog puta reflektuje Äak 16 miliona boja. Isti dizajn i materijal upotrebljeni su i za iPhone Xs s tim Å¡to on sa 5,8 inÄa viÅ¡e podseÄ‡a na standardne Apple ureÄ‘aje. Razlika izmeÄ‘u oda dva modela osim u toj supersazj dimenziji je minimalan. Naravno, tu su i cene, ali i tu razlika nije dramatiÄna... iPhone Xs Max u najjeftinijoj varijanti, sa 64 GB memorije koÅ¡ta oko 173.000 dinara, a sa 512 MB i do 220.000 ili oko 1.900 evra! S druge strane iPhone Xs koÅ¡ta 1.300 evra sa opcijom od 64 GB i skoro 1.800 za memoriju od 512 MB.\r\n\r\nS druge strane, brojke kojima se Apple ni ovoga puta ne moÅ¾e pohvaliti su one vezane za kapacitet baterije. iPhone XS ima 2,658 mAh Å¡to je manje nego kod proÅ¡logodiÅ¡njeg iPhone X. S druge strane iPhone XS Max ima 3,174 mAh ali je to dovoljno samo za klasiÄno celodnevno koriÅ¡Ä‡enje telefona i teÅ¡ko iÅ¡ta preko toga. Ovo jeste malo razoÄaravajuÄ‡e jer konkurentski premijum modeli imaju baterije i do 4.00 mAh koje lako obezbeÄ‘uju i po 35 sati koriÅ¡Ä‡enja. Detaljnije o iPhone Xs Max moÅ¾ete proÄitati i na blogu DigitALa.rs\r\n\r\nUkoliko vam se nije zavrtelo u glavni od ovih cifara moÅ¾emo da priÄamo dalje o tome Å¡ta je sve Apple spakovao u njih. Najpre, i to odliÄna promena jeste opcija za dualni SIM. Ono Å¡to je kod drugih maltene standard, Apple uvodi tek sada, ali Ä‡e korisnicima i te kako znaÄiti.\r\n\r\nOba telefona su otporna na vodu i praÅ¡inu, proizvoÄ‘aÄ tvrdi i da imaju odliÄno prednje staklo koje je teÅ¡ko izgrabati. TeÅ¡ko, ali ipak izvodljivo... Bez obzira, ekrani su zaista savrÅ¡eni, pregledni, jasni, boje su Å¾ive i ne izgledaju veÅ¡taÄki. Isti je sluÄaj sa fotografijama koje iPhone pravi. Ni tu nema razlike izmeÄ‘u iPhone Xs i iPhone Xs Max.', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'm',
  `admin` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `bdate`, `gender`, `admin`) VALUES
(1, 'Mika', 'Mikic', 'mika123@gmail.com', 'mika123', '1996-01-10', 'm', b'0'),
(8, 'Stefan', 'Diskic', 'stefan123@yahoo.com', 'stefan123', '1998-09-28', 'm', b'0'),
(9, 'Laza', 'Lazic', 'laza123@gmail.com', 'laza13', '1998-12-13', 'm', b'0'),
(10, 'admin1', 'admin', 'admin1@admin.com', 'admin123', '1998-12-13', 'm', b'1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
