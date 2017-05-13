-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 May 2017, 19:28:27
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `theatre`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activity`
--

CREATE TABLE `activity` (
  `idActivity` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `summary` varchar(1204) COLLATE utf8_turkish_ci NOT NULL,
  `date` date NOT NULL,
  `category` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `place` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `director` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `writer` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `sponsor` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `AvailableSeats` int(11) NOT NULL,
  `price` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `activity`
--

INSERT INTO `activity` (`idActivity`, `name`, `summary`, `date`, `category`, `place`, `city`, `director`, `writer`, `sponsor`, `AvailableSeats`, `price`) VALUES
(1, 'İkinin biri', 'Sahne Tozu Tiyatrosu, duayen sanatçı Göksel Kortay’ın yönetmenliğinde harika komedi oyunu “İkinin Biri” ile seyircilerinin karşı', '2010-05-20', 'Comedy', 'Sahne Tozu', 'Ankara', 'Göksel Kortay', 'Nazlı Kaya', 'Haldun Dormen', 120, 20),
(2, 'Yastık Adam', 'Yastıklar ', '2017-05-19', 'Tragedy', 'DEU Müh. Konferans Salonu', 'İzmir', 'Emine Ersoy', 'Martin McDonaghy', 'DEU', 100, 0),
(3, 'Kanlı Nigar', ' summary', '2017-05-21', 'Comedy', 'Beşiktaş Kültür Merkezi', 'İstanbul', 'Burhan Ali Kemal', 'Burak Aksak', 'İBB', 200, 10),
(17, 'KAÇ BABA KAÇ', ' Bir doktorun yıllar önce yaptığı kaçamağın bedelini nasıl ödediğini kahkahalarla izleyeceğiniz “Kaç Baba Kaç”, sizlerle buluşuyor.  Yıllardır beklediğiniz, üniversitede Rektör olma şansı kapınızı çaldığı an, yıllar önce yaptığınız küçük bir kaçamak on sekiz yaşında bir oğlan çocuk olarak karşınıza çıkarsa, üstelik sarhoş ve ehliyetsiz araba kullandığı için tutuklandığından polis nezaretinde sizi aramaya gelirse, bunu herkesten özellikle de karınızdan saklamaya çalışırsanız, doktorları, hemşireleri ve hastaları işin içine sokmadan idare edemeyip tam tersi onları da bu arapsaçına dönüşmüş durumun ortasına atarsanız, eski meslektaşınız ve arkadaşınızdan yardım isteyip onu da içinden çıkılmayacak durumlarla baş başa bırakırsanız başınıza neler gelebilir hiç düşündünüz mü ?', '2017-05-12', 'Comedy', 'Boğazlıyan', 'Yozgat', 'Haldun Dormen & Çağlar İşgören', 'Ray Cooney', 'Özdilek', 50, 20),
(18, 'KAÇ BABA KAÇ', ' Bir doktorun yıllar önce yaptığı kaçamağın bedelini nasıl ödediğini kahkahalarla izleyeceğiniz “Kaç Baba Kaç”, sizlerle buluşuyor.  Yıllardır beklediğiniz, üniversitede Rektör olma şansı kapınızı çaldığı an, yıllar önce yaptığınız küçük bir kaçamak on sekiz yaşında bir oğlan çocuk olarak karşınıza çıkarsa, üstelik sarhoş ve ehliyetsiz araba kullandığı için tutuklandığından polis nezaretinde sizi aramaya gelirse, bunu herkesten özellikle de karınızdan saklamaya çalışırsanız, doktorları, hemşireleri ve hastaları işin içine sokmadan idare edemeyip tam tersi onları da bu arapsaçına dönüşmüş durumun ortasına atarsanız, eski meslektaşınız ve arkadaşınızdan yardım isteyip onu da içinden çıkılmayacak durumlarla baş başa bırakırsanız başınıza neler gelebilir hiç düşündünüz mü ?', '2017-05-12', 'Comedy', 'Boğazlıyan', 'Yozgat', 'Haldun Dormen & Çağlar İşgören', 'Ray Cooney', 'Özdilek', 50, 20),
(23, 'PAPAZ KAÇTI', ' Haldun Dormen ve M. Çağlar İşgören’in yönettiği iki perdelik komedi oyunu Papaz Kaçtı, Sahne Tozu Tiyatrosu’nda sizlerle buluşuyor.  Olay, 1943 yılının Haziran ayında İngiltere’nin kuzeyinde Middlewick köyünde geçiyor. II. Dünya Savaşı’nın ortasında Doris ve rahip olan kocası Lionel’ın mutlu bir evliliği vardır. Eski bir gösteri kızı olan Doris’in halen asker olan eski arkadaşı Clıve’in eve ziyarete gelmesi, kocası Lionel’in yokluğunda Doris’i bir parça eski hayatını yaşayamamanın sıkıntıdan kurtaracak gibi görünse de, meraklı komşusu Bn Skillon ve zamansız bir anda eve gelen ve Papaz olan amcası Lax Piskoposu’nun Clive’i Doris’in kocası zannetmesi ile başlayan karmaşa, sürpriz kişilerin katılımı ile giderek içinden çıkılmaz bir hal alır.', '2017-05-26', 'Comedy', 'Konak', 'İzmir', 'Haldun Dormen & Çağlar İşgören', 'Philip King', 'Western', 60, 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `lastName` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastName`, `email`, `password`, `gender`, `rank`, `phoneNumber`, `birthDate`) VALUES
(1, 'Emre', 'asd', 'asd@hos.com', 'asd', '0', 1, 123321, '0000-00-00'),
(5, 'Durmuş', 'yurtoğlu', 'yurtogludurmus@gmail.com', '1', 'Male', 1, 2147483647, '1995-05-21'),
(12, 'Derya', 'Gözübüyük', 'gozubuyuk@gmail.com', 'ggg', 'Female', 0, 555555, '1994-01-23');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idActivity`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `activity`
--
ALTER TABLE `activity`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
