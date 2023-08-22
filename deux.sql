-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2022 pada 17.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deux`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `img_upload`
--

CREATE TABLE `img_upload` (
  `img_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `img_type` varchar(10) NOT NULL,
  `img_category` varchar(30) NOT NULL,
  `img_title` varchar(100) NOT NULL,
  `img_location` varchar(100) DEFAULT NULL,
  `img_caption` varchar(255) DEFAULT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `img_upload`
--

INSERT INTO `img_upload` (`img_id`, `id`, `img_type`, `img_category`, `img_title`, `img_location`, `img_caption`, `img_file`) VALUES
(75, 41, 'photo', 'sea', 'Sea', 'New Zeland', 'this is so beautiful\r\n', '5e0ee912d31cc-1578035474-Sea.jpg'),
(76, 41, 'photo', 'sand', 'padang gurun', 'arab saudi', 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem', '5e0efefe09306-1578041086-padang-gurun.jpg'),
(78, 43, 'photo', 'food', 'Vegetables', '-', 'vegetables make me <3', '5e0f048e51762-1578042510-Vegetables.jpg'),
(79, 43, 'photo', 'sea', 'pulau karang', '-', '', '5e0f04c1984b9-1578042561-pulau-karang.jpg'),
(80, 41, 'vector', 'sunset', 'sunset on hill', 'mars', 'beautiful eagle flying in the sky', '5e1146f38aa0e-1578190579-sunset-on-hill.jpg'),
(81, 41, 'vector', 'mountain', 'Mountain and Lake', 'Canada', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', '5e1162e042fb4-1578197728-Mountain-and-Lake.jpg'),
(82, 44, 'photo', 'code', 'Background for programmer', '', 'lorem ipsum dolor sit amet dsnasdkjndkan aakdsnak dnakdnad ', '5e116d13ec683-1578200339-Background-for-programmer.jpg'),
(83, 44, 'vector', 'sea', 'sunset on the sea', '-', 'lorem loreman lorem loreman lorem loreman lorem loreman lorem loreman lorem loreman lorem loreman lorem loreman lorem loreman ', '5e1195da01605-1578210778-sunset-on-the-sea.jpg'),
(93, 46, 'photo', 'hill', 'tebing', 'Sumbar', 'lorem ipsum', '5e1315ca113bc-1578309066-tebing.jpg'),
(94, 41, 'photo', 'beautiful', 'horse', 'Canada', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', '5e143064e3017-1578381412-horse.jpg'),
(95, 41, 'photo', 'Nature', 'Lake', 'Unknown', 'Uvuvwevwe Onyete Nyewete Mubwem Ubem Osas', '5e15938229988-1578472322-Lake.jpg'),
(97, 41, 'photo', 'sea', 'ship', 'Bali, Indonesia', 'Kapal karang yang terlantar. kowaii', '5e159418d27cf-1578472472-ship.jpg'),
(98, 49, 'photo', 'log', 'lsldaksdalk', 'daslkad', 'lasndkn daksdnakdnakdnaskdn dd', '5e15adbbc2fac-1578479035-lsldaksdalk.jpg'),
(99, 49, 'photo', 'digital', 'kasnd', '', 'dsada da', '5e15aefd5f5b7-1578479357-kasnd.png'),
(100, 49, 'photo', 'digital', 'retro', '', 'adjkasddask jsad', '5e15afe351c4f-1578479587-retro.jpg'),
(101, 49, 'photo', 'digital', 'asdsdakndadn', '', '', '5e15b0222fad7-1578479650-asdsdakndadn.jpg'),
(102, 49, 'photo', 'digital', 'house', '', '', '5e15b04355065-1578479683-house.jpg'),
(104, 41, 'vector', 'house', 'My Hometown', 'Living House, New Zealand', 'Dalam arti umum, rumah adalah salah satu bangunan yang dijadikan tempat tinggal selama jangka waktu tertentu. Dalam arti khusus, rumah mengacu pada konsep-konsep sosial-kemasyarakatan yang terjalin di dalam bangunan tempat tinggal, seperti keluarga, dsb.', '5e30d5f7a749c-1580258807-My-Hometown.jpg'),
(105, 41, 'photo', 'beautiful', 'Indian Girl is Insane', 'India, Bumi', 'Perempuan adalah manusia berjenis kelamin betina. Berbeda dari wanita, istilah \"perempuan\" dapat merujuk kepada orang yang telah dewasa maupun yang masih anak-anak.', '5e30ee0725c99-1580264967-Indian-Girl-is-Insane.jpg'),
(110, 41, 'photo', 'kayu', 'Tumpukan Kayu', 'New York, USA', 'Kayu Jati adalah sejenis pohon penghasil kayu bermutu tinggi. Pohon besar, berbatang lurus, dapat tumbuh mencapai tinggi 30-40 m. Berdaun besar, yang luruh di musim kemarau. Jati dikenal dunia dengan nama teak. ', '5e7b948a71920-1585157258-Tumpukan-Kayu.jpg'),
(114, 41, 'vector', 'anime', 'Anime Chara', '', 'I forgot the name, but i love this characters', '5e9dce1ad1b08-1587400218-Anime-Chara.jpg'),
(115, 41, 'photo', 'film', 'bla bla bla', 'bla ', 'dhajdaskjdnajdankj da', '5f097ca89aa23-1594457256-bla-bla-bla.jpg'),
(116, 41, 'vector', 'logo', 'Atmanu Pictures', '-', 'atmanu picture is production house in the field of film', '5f0c4e595a1b9-1594642009-Atmanu-Pictures.jpg'),
(117, 41, 'photo', 'code', 'ygjhgbh', 'gfdgfd', 'hcfgfgcvcfcfcfd', '6101496ef2159-1627474287-ygjhgbh.jpg'),
(118, 41, 'photo', 'film', 'Mossa', 'harapan raya', 'adiodjsaodjsaodjasodjadoasjdoadoadodasodkmadokadkoa', '6153e697cfab0-1632888471-Mossa.png'),
(121, 41, 'vector', 'mockup', 'Mockup Design', '0', 'kdsmdaskdsadakdmadasdmada', '61f0cbdb835a4-1643170779-Mockup-Design.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `img_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`img_id`, `id`) VALUES
(81, 41),
(83, 41),
(82, 41),
(76, 42),
(79, 41),
(75, 46),
(78, 46),
(76, 41),
(94, 41),
(80, 42),
(76, 49),
(75, 49),
(80, 49),
(95, 49),
(75, 41),
(81, 50),
(97, 41),
(99, 41),
(95, 41),
(78, 41),
(104, 41),
(102, 41),
(80, 41),
(102, 49),
(101, 49),
(114, 41),
(99, 49),
(105, 41),
(115, 41),
(116, 41),
(117, 41),
(118, 41),
(121, 41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_instagram` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_websiteLink` varchar(255) NOT NULL,
  `user_websiteName` varchar(255) NOT NULL,
  `user_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verified`, `token`, `user_avatar`, `user_instagram`, `user_address`, `user_websiteLink`, `user_websiteName`, `user_description`) VALUES
(41, 'Dimas.Fauzan', 'dimasgokil890@gmail.com', '$2y$10$LAnT5pIBHc..BsTQHlqse.FtpUxi1bWTIEuKb7puSOhYJTKv6zn86', 1, 'a8640a5163eea6f23b8e77e6fa5fbb5b6d10c44a3d01a3bd1a2f5d94f8b9d5c1ac4f8bdc129c3ee4ac984d9337cc0e1ad7f0', '5e7cd687cb4b6-avatar-user41.png', 'dimas_fauzan890', 'Pekanbaru', 'http://portfolio-dimas-fauzan.000webhostapp.com/', 'My Bio', 'Perkenalkan saya Dimas Fauzan, saya seorang hmm apa ya... saya useless, saya gak punya prestasi, saya peribut, & terimakasih anggapan kalian ke saya. saya harap kalian sadar saya gak sesampah itu, argh.. kenapa dari dulu hidup aku gini gini terus. sh*t'),
(42, 'M Athallah Dzikri', 'dzikritmc@gmail.com', '$2y$10$Ik7rEmF3Zh6w0KTc7QfXeOigOOXb/BrByecDjOG/dj3XfxDjBU2jy', 0, 'ef7f2671f8e475f886931dd2e21fed44a74c59efb6f200c8887ad259b7a77d5f12a977d8db8c4d58b50fec0c54f9ba04e8d0', '5e113b6e7d428-avatar-user42.png', 'athallah_dzikri', 'Pekanbaru', 'http://atalah.000webhostapp.com', 'Portfolio', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '),
(43, 'Lord Sand', 'dimasfauzan1712@gmail.com', '$2y$10$HS3Csj0dCecLV3d0yUNxWuOKKrqiX0cwaoudpnkbCG0dECL32Mxu2', 1, '5dabbc5822784c83a7a1eb52b9309f869c68f8a6fea425a4b4589f6f482f887d9d22611139071375092b7089d72c45aa2bfe', '5e0f00852d044-avatar-user43.jpg', 'dimas_fauzan890', 'Pekanbaru', 'http://localhost/deux/', 'Deux', 'I am so tired, dont make me angry'),
(44, 'Deux Website Creator', 'deuxwebsite@gmail.com', '$2y$10$b2Pwe0SCsUTM4ENRLTxguuFhe/p5aditHiCbBVReYqx8N4GD7qmEG', 1, '53c46cf8db5e24f69fcf09699eb840e733d1f8fb64dc6935d47b82640a238509f21f370043cbc8482c8ce2f79fc1d839e8c7', '5e117bc507d46-avatar-user44.png', 'dimas_fauzan890', 'Pekanbaru, Riau, Indonesia', 'http://localhost/deux/', 'Deux - Art Gallery', 'Hi, my name is Dimas Fauzan, i make this website for you, and you can upload your image then the visitors can see your picture and download them. :)'),
(45, 'riszi paganini', 'riszypaganini9@gmail.com', '$2y$10$cUMpARp8STa/T40uXFjS2ugZ/mGJd7p38p5YKV1ZQ9L6B1zOAsTw.', 0, '3b9b1895f728ace3c30d77bfc8a41e8de55adfd6151ed7e8aabf7f9291f50d252fe993e42a95a7025191f0f3012d6ebf9b97', 'undraw_male_avatar_323b.svg', '', '', '', '', ''),
(46, 'Dimas ', 'dimasgokil1141@gmail.com', '$2y$10$kaUFH3x0YW3O5QKD8pZ1Ful5wA/E0DUBJQ/vhRQod9JIenTddQ3DK', 1, '21927858223719522c318192574657275a2e7fcc65196ce7a9e9d7d5cfdc5787994f4422d0d3a1a61e3b638c5d6a0ef5d4f9', '5e131587745d1-avatar-user46.jpg', 'dimas_fauzan890', 'Pekanbaru', 'http://localhost/deux/', 'Deux Website', 'Saya seorang designer'),
(47, 'm rizki', 'm.rizki2807@gmail.com', '$2y$10$hr..fmFbTtfCrlhpidav7OKtmKYVJlZ1jC9P2qB9K1JrZmndevB/m', 0, 'a83f70b98f8a44b4d84abf4e849938dbb097fd4f1effaf21d0601dc8df267fdac8b78ad193d23c45377d1037e98abfaf7ed4', '5e142fa6cfde2-avatar-user47.jpg', 'r2kz8', 'Pekanbaru', '', '', 'Hai, aku seorang designer UI dan UX'),
(49, 'dimas_fauzan8901', 'dimasfauzan171202@gmail.com', '$2y$10$YjTUN0Qh2J3CKO5g1iqft.OsWtKmm1WgMfm1xXnF9TPkZu2/f8sbe', 1, '7849aeda57ddb77fcc3686db3e2d0f964830fad1975f95b3132b625ebde8d87b799727c77f2c6a1f0e4c0db7ada07c05c4ec', '5e15b107570d3-avatar-user49.jpg', 'dimas_fauzan890', '', '', '', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '),
(50, 'Syiamu Nanda', 'titi.tata0009@gmail.com', '$2y$10$6sJJQTdovFbcjaZKl.J6J.cIOfLN67ksI0XDBIEIIb3fnbaMEgctW', 0, 'e9ecd48eb8dbf1c2522a50c495613ab789647f57ac501ce076b7c9255e569f96e0bf5a4597552354da602f82c86ae1f32d35', '5e1aee9312b80-avatar-user50.jpg', 'syiamunandasaputra', 'Pekanbaru', '', '', 'ada dnsadsankasn asndkandksadasidnas iddhaskjdbaskj '),
(51, 'Reynhad Sinaga', 'reynhad190@gmail.com', '$2y$10$bH6BTid7LsSGgWGaRy/d1unMHv.GY/q5ENatyreC0rw7.MW9eHB1K', 0, 'e3d573911c09aebf6d0ae2c524a0fc354a8ba21f5a6681ee1424504ce0b15dcfd905a2762b0c03876e871efe25a23846f5a1', 'undraw_male_avatar_323b.svg', '', '', '', '', ''),
(52, 'Dimas faudzann', 'dimasgokil899@gmail.com', '$2y$10$Of0aZF3IbCF3YRJ77EFTYOZUZFP/j1ANQWh2yCPURGQfMuZYVsbKK', 0, '499a54b46e51bdb12e65fbd975ff520413f15e45e4a83c29def6a696433e144f4707deaeaad1b1eb3bf9709fca9666371312', 'undraw_male_avatar_323b.svg', '', '', '', '', ''),
(53, 'Refnaldi', 'refnaldiazwirman58@gmail.com', '$2y$10$4hz2QybyYJTGWAt3.F8Q5eZa6XgEcWCEb80MSMWg9GVQHRHaEkQha', 0, '93d9960121e0632250e30a0cccfe25b1747020518815c2627aa4a67f6dc9cce9f75837fb0146acb27d74d75a3f07c441d9da', '5e37dbf885616-avatar-user53.png', 'refnaldi_az58', 'Kulim,Pekanbaru', '', '', 'Aku yang salah. Maaf yaa!'),
(54, 'DeuxWebsite2', 'deuxwebsite2@gmail.com', '$2y$10$puQWzZHg7XaCjYhHbDrdV.j5LwyPaZJx4N7l.OACLha2p8gjLdkRm', 1, '7b3878cb26e181e170d19554814410d0925d7027f709732915eeda503b3e75c8e39247e1efe4e0a686428d7aa324df534768', 'undraw_male_avatar_323b.svg', '0', '0', '0', '0', '0'),
(55, 'IKRAM', 'ihkrammulya683@gmail.com', '$2y$10$dzdY9c7EJM2GN08VBS5xJ.fC5MSwJVu0S46WzubY7p70bbRlR5Ls2', 0, '922d0617dadec53a441148999b40ef566ad64954930402415f044569fa163b5665ab9143cfdf46b9a537a564c690d10bfe99', 'undraw_male_avatar_323b.svg', '0', '0', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `img_upload`
--
ALTER TABLE `img_upload`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD KEY `img_id` (`img_id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `img_upload`
--
ALTER TABLE `img_upload`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `img_upload`
--
ALTER TABLE `img_upload`
  ADD CONSTRAINT `img_upload_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `img_upload` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
