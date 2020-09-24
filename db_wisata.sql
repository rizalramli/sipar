-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2018 pada 04.42
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akomodasi`
--

CREATE TABLE `akomodasi` (
  `id_akomodasi` int(11) NOT NULL,
  `id_wisata` varchar(10) NOT NULL,
  `titik_awal` varchar(255) NOT NULL,
  `kendaraan` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akomodasi`
--

INSERT INTO `akomodasi` (`id_akomodasi`, `id_wisata`, `titik_awal`, `kendaraan`, `harga`, `dari`, `ke`) VALUES
(2, 'W001', 'Terminal', 'lin', 5000, 'Terminal Tawang Alun', 'Jalan Mastrip'),
(3, 'W001', 'Terminal', 'ojek', 10000, 'Jalan Mastrip', 'Air Terjun'),
(4, 'W002', 'Stasiun', 'lin', 5000, 'Stasiun Rambipuji', 'Jalan Mastripsxss'),
(5, 'W002', 'Stasiun', 'lin', 5000, 'Stasiun Rambipuji', 'Jalan Mastripsxss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_event` date NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama`, `tgl_event`, `lokasi`, `gambar`) VALUES
('E001', 'Jfcs', '2018-12-15', 'jember', 'JFC.jpg'),
('E002', 'Jakcloth', '2018-11-20', 'Jalan Ahmad Yani', 'download.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_transportasi`
--

CREATE TABLE `jadwal_transportasi` (
  `id_jadwal` int(11) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `pemberhentian` varchar(30) NOT NULL,
  `jam_sampai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_transportasi`
--

INSERT INTO `jadwal_transportasi` (`id_jadwal`, `jenis_kendaraan`, `nama_kendaraan`, `dari`, `jam_berangkat`, `tujuan`, `pemberhentian`, `jam_sampai`) VALUES
(3, 'Bus', 'Borobudur', 'Tawang Alun', '06:00:00', 'Bali', 'Terminal Bali', '18:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kuliner`
--

CREATE TABLE `kategori_kuliner` (
  `id_kategoriKuliner` char(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_kuliner`
--

INSERT INTO `kategori_kuliner` (`id_kategoriKuliner`, `nama_kategori`) VALUES
('KK001', 'Cafe'),
('KK002', 'Warung'),
('KK003', 'Restoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id_kategoriWisata` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id_kategoriWisata`, `nama_kategori`) VALUES
('KW001', 'Alam'),
('KW002', 'Edukasi'),
('KW003', 'Religi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_kuliner`
--

CREATE TABLE `menu_kuliner` (
  `id_menu` int(11) NOT NULL,
  `id_tempat` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_kuliner`
--

INSERT INTO `menu_kuliner` (`id_menu`, `id_tempat`, `nama`, `kategori`, `harga`) VALUES
(5, 'K001', 'ayam goreng', 'Makanan', 10000),
(6, 'K001', 'es teh', 'Minuman', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `gambar_profil` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket`, `nama`, `gambar_profil`, `harga`) VALUES
('PW001', '3 Hari 3 Malam', 'rails.jpg', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_bantuan`
--

CREATE TABLE `pesan_bantuan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_bantuan`
--

INSERT INTO `pesan_bantuan` (`id_pesan`, `nama`, `email`, `deskripsi`) VALUES
(1, 'dd', 'ddsdasd@gmail.com', 'asda as dhkahd asdh kashdg jagsaks dgkasgk ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_kuliner`
--

CREATE TABLE `rating_kuliner` (
  `id_rating` int(11) NOT NULL,
  `id_tempat` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating_kuliner`
--

INSERT INTO `rating_kuliner` (`id_rating`, `id_tempat`, `email`, `deskripsi`, `rating`) VALUES
(1, 'K001', '', '', 5),
(2, 'K003', '', '', 4),
(3, 'K004', '', '', 5),
(4, 'K005', '', '', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_wisata`
--

CREATE TABLE `rating_wisata` (
  `id_rating` int(11) NOT NULL,
  `id_wisata` varchar(10) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating_wisata`
--

INSERT INTO `rating_wisata` (`id_rating`, `id_wisata`, `rating`) VALUES
(21, 'W001', 5),
(22, 'W002', 5),
(23, 'W002', 3),
(24, 'W002', 1),
(25, 'W003', 3),
(26, 'W004', 5),
(27, 'W006', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kuliner`
--

CREATE TABLE `tempat_kuliner` (
  `id_tempat` varchar(10) NOT NULL,
  `id_kategoriKuliner` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lokasi` text NOT NULL,
  `gambar_profil` varchar(255) NOT NULL,
  `gambar_detail` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_kuliner`
--

INSERT INTO `tempat_kuliner` (`id_tempat`, `id_kategoriKuliner`, `nama`, `lokasi`, `gambar_profil`, `gambar_detail`, `deskripsi`) VALUES
('K001', 'KK003', 'Gudeg Lumintu', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2318265569534!2d113.68556511433074!3d-8.179385584257062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69419154faa91%3A0xa67a91131c416951!2sGudeg+Jember+Lumintu!5e0!3m2!1sid!2sid!4v1545059019351', 'pecel6.jpg', 'gudeg pecel lumintu.jpg,pecel_gudeg.jpg,pecel1.jpg,Pecel-Lumintu-Khas-Jember.jpg', 'Warung gudeg dan pecel yang telah berdiri sejak tahun â€™80an ini selalu ramai, lho. Letaknya di gang sempit dan hanya buka dari pagi hingga jam dua siang. Kamu tidak hanya bisa menikmati nasi gudeg dan nasi pecel secara terpisah, karena di sini juga menawarkan menu favorit yaitu nasi campur, yang merupakan gabungan nasi gudeg dan pecel. Jangan sampai kamu lewatkan deh kuliner yang satu ini bila sedang berada di Jember.'),
('K002', 'KK002', 'Angkringan Joglo 130', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.216091361893!2d113.71030731433078!3d-8.180973684277042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6942a2f355eb7%3A0xe973ac3ee74e6d8b!2sAngkringan+Joglo+130!5e0!3m2!1sid!2sid!4v1545058326260', '5.jpg', '2.jpg,3.jpg,4.png,6.jpeg,Angkringan-Joglo-130-6.jpeg', 'Angkringan ini menawarkan menu berupa gorengan, ketan bubuk, nasi kucing dengan lauk tahu-tempe bacem, minuman ringan berupa kopi, bir Jawa, serta wedang khas Angkringan Joglo. Konsep tempatnya nyaman bila digunakan untuk makan sekaligus berkumpul dan ngobrol dengan keluarga atau kawan. Angkringan Joglo 130 ini juga terletak di lokasi yang tidak sulit untuk ditemukan, kok.'),
('K003', 'KK003', 'Resto Legian', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.209584758417!2d113.67088081433083!3d-8.181630284285339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd694019c49b737%3A0x5c939072d3988405!2sLegian+Restaurant!5e0!3m2!1sid!2sid!4v1545060065563', '1.jpg', '2.jpg,3.jpg,4.jpg,5.jpg,6.jpg', 'Nah, restoran yang satu ini memang awalnya khusus menghidangkan pilihan menu seafood. Namun kini sudah melebarkan sayap dengan menawarkan menu lain seperti cap cay, mie, dan yang paling spesial yang ditawarkan adalah iga bakarnya. Resto Legian ini adalah salah satu tempat makan yang populer di Jember dengan banyak varian menu yang ditawarkan plus harga yang sudah pasti terjangkau.'),
('K004', 'KK001', 'Cafe Kolong', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4469640646835!2d113.71016931433054!3d-8.157641683982979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6944b9f2263f7%3A0x42b2989291af3df1!2sKafe+Kolong!5e0!3m2!1sid!2sid!4v1545060734140', '236fa-cafe.jpg', '1.jpg,180750_kolong1.jpg,1912383kafe-21780x390.jpg,ngopi-hore-bawah-jembatan-bartender-kafe-kolong-jember-kab.jpg', 'Kolong jembatan yang terkesan kumuh dan gelap bisa disulap menjadi cafÃ© dengan konsep sederhana yang dipenuhi pengunjung dari dalam maupun luar kota. Di cafÃ© ini juga disuguhkan live music, dan pertunjukan stand up comedy. Letaknya yang tidak terlihat dari keramaian jalan membuat cafÃ© ini memiliki suasana berbeda. Dengan bangku-bangku bambu di dua kolong jembatan yang jarang sepi pengunjung. Harganyapun tergolong sangat murah.\r\n'),
('K005', 'KK001', 'Grand Cafe', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3393520334066!2d113.71022881403064!3d-8.168525194120596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69433af4aef4f%3A0x6e1ff3d551910700!2sGrand+Cafe+Jember!5e0!3m2!1sid!2sid!4v1545146613559', 'Venue-Keren-Serba-Otomotif.jpg', 'grandcafe1.jpg,images.jpg,Rooftop-di-Grand-Cafe.jpg,Tempat-Nongkrong-Seru-Bareng-Sahabat.jpg', 'Grand Cafe Jember, begitulah banyak orang mengenalnya. Tempat nongkrong ini terbilang â€˜anyarâ€™ karena baru buka pada tahun 2016 lalu. Konsep yang diusung sangat unik, yaitu perpaduan unsur modern dan vintage yang cocok untuk segala usia. Sebagian besar unsur vintage di kafe ini berupa properti bengkel mulai dari sepeda motor, ontel, hingga onderdil mesin klasik. Bahkan block poster di setiap sudutnya berupa gambar bengkel.\r\n\r\nSekilas, kamu bakalan bingung untuk memarkir kendaraan di mana saat mampir ke sini. Pasalnya, tempat nongkrong yang berada di Jalan Jawa 28 A ini â€˜nangkringâ€™ di lantai dua dan tiga. Pintu masuknya lewat mana? Selain bisa masuk melalui pintu gerai pulsa di lantai satu, kamu bisa lewat gerbang belakang yang memiliki akses parkir cukup luas.'),
('K006', 'KK002', 'Warung Sate Kambing Pak Toha', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.1236937295234!2d113.64939801403074!3d-8.19029289410534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd691595e71a195%3A0xebda8b836e2a536b!2sWarung+Sate+Pak+Toha!5e0!3m2!1sid!2sid!4v1545147410498', 'fdb2157db89cf705f919f45d40def09a.jpg', '9f07399fbaf89dd1fd74fa5ab738590e.jpg,77eddf3a3cef17d15578af52e4a1d444.jpg,6835034_122QMzYl-wqoA3EPy9gcw-lrVZSIhpbodnPfeamKAcE.jpg,2014529165044.jpg', 'Salah satu warung sate legendaris di Jember. Lokasinya berada dipinggiran kota Jember, tepatnya di Mangli. Satenya enak, potongan dagingnya besar-besar, empuk, bumbunya juga ok. Sangat disarankan untuk memesan gule kambing karena rasanya enak. Kekurangan dari warung ini hanya tempat parkir yang sangat terbatas.\r\n\r\nJenis makanan dr bahan asal daging kambing yg maknyus. Cocok selera dg perut dan mulut. Termasuk legenda dan rasa dijamin tidak akan kecewa krn sangat memuaskan. Hanya saja harga yg lumayan merogoh kocek, namun sebetulnya sebanding harga dg kualitas. Cocok utk keluarga, ketemu rekan reunian ultah serta urusan bisnis. Setau saya menerima pesanan utk acara.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `nama_tentang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `nama_tentang`, `deskripsi`) VALUES
(2, 'xxx', 'aaa'),
(3, 'asd', 'sad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'iyeks', 'iyeks'),
(3, 'fadil', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` varchar(10) NOT NULL,
  `id_kategoriWisata` varchar(10) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `gambar_profil` tinytext NOT NULL,
  `detail_gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_kategoriWisata`, `nama`, `lokasi`, `gambar_profil`, `detail_gambar`, `deskripsi`) VALUES
('W001', 'KW001', 'Pantai Papuma', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7893.401791841375!2d113.55159292423966!3d-8.431005375748196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd682a6a4b5cd8d%3A0xb9c242f3a09e2d2e!2sPantai+Papuma!5e0!3m2!1sid!2sid!4v1545056689100', '1.jpg', '4.jpg,5.png,6.jpg,7.jpg,8.jpg', 'Pantai Papuma Jember merupakan salah satu wisata pantai yang dimiliki Jawa Timur. Nama Papuma sendiri sebenarnya adalah sebuah singkatan dari â€œPasir Putih Malikanâ€. Dan singkatan tersebut lah yang hingga kini lebih familiar di telinga wisatawan.. . Sebagaimana yang kita tahu bahwa Indonesia merupakan satu satunya negara yang memiliki garis pantai terpanjang di dunia, sebuah anugerah yang cukup membanggakan. Kini, destinasi wisata pantai unggulan tidak hanya bisa di dapatkan di pulau dewata saja, melainkan hampir seluruh daerah di Indonesia memiliki pantai yang cantik dan layak untuk di kunjungi, salah satunya pantai Papuma yang terletak di Jawa Timur ini.'),
('W002', 'KW001', 'Pantai Payangan', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.6457625194885!2d113.57911031433378!3d-8.436403687554401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd427f96abc1d45%3A0x349dbb12eb1ac295!2sPantai+Payangan!5e0!3m2!1sid!2sid!4v1545057240913', '3.jpg', '1.jpg,1.png,2.jpg,4.jpg,5.jpg', 'Pantai pertama yang berada di sebelah utara berbentuk melengkung dan berpasir hitam. Sementara pantai yang tengah memiliki banyak bebatuan yang unik dan cantik. Sedangkan pantai yang berada di selatan memiliki padang sabana yang kerap dipakai pengunjung untuk camping.\r\n\r\nPemandangan di sekitar kawasan wisata Pantai Payangan sangat indah dan mengagumkan. Hal ini karena Pantai Payangan dikelilingi oleh daerah perbukitan.\r\n\r\nBila Anda ingin melihat lebih luas indahnya pemandangan di Pantai Payangan, bisa naik ke atas tebing dan menikmati panorama alam Pantai Payangan dari ketinggian.'),
('W003', 'KW001', 'Air Terjun Rayap', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.4707387761077!2d113.67523231432935!3d-8.053370082679544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6eb850cb29f35%3A0xad9dab807b10cd2f!2sAir+Terjun+Kebun+Rayap!5e0!3m2!1sid!2sid!4v1545133286720', 'AirTerjunRayap.jpg', '1.jpg,2.jpg,AirTerjunRayap.jpg', 'Air Terjun Rayap sebenarnya memiliki nama Air Terjun Anugerah. Namun warga sekitar lebih mengenalnya dengan nama Rayap atau Air Terjun Rembangan.\r\nHal tersebut dikarenakan air terjun ini terletak di daerah Kebun Renteng, Afdeling Rayap milik PTPN XI (Persero). Lokasinya tidak jauh dari Wisata Rembangan yang terkenal dengan pemandangan indah dari puncak perbukitan.\r\nAir Terjun Rayap memiliki ketinggian kurang lebih 10 meter dengan lebar mencapai dua meter. Termasuk pendek, namun debet airnya lumayan tinggi. Harus ekstra hati-hati dan tidak terlalu mendekati bagian bawah air terjun.\r\n'),
('W004', 'KW002', 'Taman Botani Sukorambi', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3997682157838!2d113.66086831433066!3d-8.162416684043157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6938b73a5abf7%3A0x1f02ba93aedf2352!2sTaman+Botani+Sukorambi+Jember!5e0!3m2!1sid!2sid!4v1545134692455', 'botani1.jpg', 'botani.jpg,obyek-wisata-nongai-waterboom-jember-dira-waterpark-taman-botani-dibuka.jpg,pelangi3.jpg,taman-botani-sukorambi-jember.jpg', 'Taman ini dikelilingi oleh sawah dan sebagian wilayahnya merupakan hutan. Selain tempat wisata alam flora dan fauna, taman botani ini juga memiliki kolam ikan, kolam renang (untuk dewasa dan anak), kafe dan restoran dua lantai, perpusatkaan yang berisi 500 buku dan jurnal, dan ruang pertemuan.[2][3] Aktivitas rekreasinya meliputi olahraga air dan flying fox.[3]\r\n\r\nBagian atas taman yang luasnya 4,5 hectare (11 acre) berisi kebun khusus berisi lebih dari 300 spesies tanaman herbal. Selain itu ada juga sekitar 200 spesies bunga dan buah-buahan. Beragam hewan, termasuk kuda, kelinci, dan burung juga dipelihara di taman ini.[3] Nama floranya tertulis dalam bahasa Latin dan Indonesisa agar mudah diidentifikasi.'),
('W005', 'KW002', 'Museum Tembakau', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.435227363146!2d113.7127208140305!3d-8.158829394127373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6944ad81946b5%3A0xdee0037fbed61b53!2sMuseum+Tembakau+Jember!5e0!3m2!1sid!2sid!4v1545134858527', 'museum-tembakau-jember.jpg', '4-rumah-mbako-57fcaca5799373991812c8d5.jpg,06.JPG,maxresdefault.jpg,Obyek-Wisata-Sejarah-Museum-Tembakau-di-Jember.jpg', 'Untuk kamu yang ingin berkunjung ke objek wisata alam ini, kamu harus tahu sarana dan prasarana apa saja yang terdapat di Museum Tembakau ini. Di objek wisata ini telah menyediakan tempat parkir kendaraan roda dua ataupun roda empat, jadi kamu gak perlu repot-repot lagi mencari tempat parkir nanti. Di sekitar museum tersebut juga telah tersedia kamar mandi untuk para wisatawan ataupun petugas yang ingin buang air.\r\n\r\nSelain itu, objek wisata ini juga menyediakan ruang penyimpanan tembakau serta alat pengolah tembakau seperti mesin pemotong ataupun mesin pencacah. Di Museum Tembakau ini juga terdapat berbagai jenis daun tembakau seperti kasturi, nag oost, dan berbagai jenis daun tembakau lainnya. Selain itu, petugas yang ramah juga turut hadir di sini untuk memandu dan memberi informasi kepada para wisatawan.'),
('W006', 'KW002', 'Pusat Penelitian Kopi Dan Kakao ', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4093261310486!2d113.70626821403037!3d-8.161449894125502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69449e3db63a7%3A0xc345d4722274fc41!2sPusat+Penelitian+Kopi+dan+Kakao+Indonesia+Kantor+Sudirman!5e0!3m2!1sid!2sid!4v1545135873951', 'mega-2-696x522.jpg', '3.png,13117873_1714070295501379_18991996_n.jpg,alamat pusat penelitian kopi dan kakao jember.JPG,Sueger-Camp-2018-28.jpg', 'Wisata Puslit Kopi dan Kakao Jember kini semakin lama semakin asyik ya. Cocok banget buat liburan keluarga atau sama teman-teman. Saya sudah tiga kali ke sana tapi nggak kunjung bosan, alasannya ya karena datangnya dengan orang yang berbeda dan dengan suasana yang berbeda pula.\r\n\r\nRutenya gampang kok. Dari alun-alun, terus ada perempatan Mangli, ambil belok kiri, ikuti jalan. Kalau tengok kanan-kiri merasa sudah memasuki Ajung sekitar setengah jam, mulailah untuk jeli menemukan sebuah jalan belokan kecil ke kanan, yang di depannya ada plang putih bertuliskan Pusat Penelitian Kopi dan Kakao, dan yang di seberang jalan kecilnya ada plang hijau bertuliskan Coco Park. Mohon diperhatikan baik-baik, soalnya plangnya kecil, nggak gede-gede banget.\r\n\r\nSaat masuk ke jalan kecil itu, kira-kira butuh 5 km lagi untuk sampai. Btw, pemandangan menuju puslitkoka bagus banget loh. Ada areal persawahan, juga perkebunan karet. Pokoknya indah deh. Saya menyarankan, kalau naik mobil sebaiknya kaca jendelanya dibuka, sedangkan kalau naik sepeda motor sebaiknya kaca helmnya dibuka. Anginnya seger semriwing...\r\n'),
('W007', 'KW003', 'Masjid Roudhotul Muchlisin', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2453615898467!2d113.67915171403067!3d-8.178019294113962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6941baf951c71%3A0x9144c87cc3cae72d!2sMasjid+Roudhotul+Muchlisin!5e0!3m2!1sid!2sid!4v1545137415377', 'MasjidRoudhotulMuchlisin.jpg', '21-2.jpg,628391-masjid-roudhotul-muchlisin-di-jember.jpg,l-20180421013814img0517.jpeg,z__thumb_4_4_18380541_227369911082526_7834092125397450752_n.jpg', 'Sebagai salah satu ikon wisata reliji di Jawa Timur, khususnya di Jember, keberadaan masjid Roudhotul Muchlisin terus menarik perhatian masyarakat. Sejak diresmikan pertengahan Mei 2017 lalu, pengunjung yang datang ke masjid di Jl. Gajah Mada, Kecamatan Kaliwates, ini kian meningkat.\r\n\r\nMasjid Roudhotul Muchlisin menarik perhatian masyarakat karena bangunannya lain dari masjid yang ada di Jember. Bangunan masjid ini megah dan terkesan futuristik. Apalagi desain masjid mirip dengan masjid yang ada di negara Turki. Dindingnya didominasi warna Kuning dan Jingga. Pilarnya dihiasi ornament layaknya istana.\r\n\r\nTidak hanya itu, persis di depan pintu masuk masjid juga terdapat air mancur berhiaskan lampu warnaâ€“warni. Jika malam, masjid ini semakin menunjukkan pesonanya. Tak heran jika kemudian banyak pengunjung yang berswafoto di lingkungan masjid dengan luas sekitar 2.000 meter persegi itu.'),
('W008', 'KW003', 'Masjid Jami Al-Baitul Amien', 'Https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3405482295757!2d113.6983270140306!3d-8.168404294120675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943bcc4adbeb%3A0x9af1be46670057e2!2sMasjid+Jami&#39;+Al+Baitul+Amien+Jember!5e0!3m2!1sid!2sid!4v1545137736822', 'ikijawatimur4988271134.jpg', '12558836_589966944488614_1991993590_n.jpg,32225322_572162756488837_7905130137148981248_n.jpg,maxresdefault.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD PRIMARY KEY (`id_akomodasi`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_wisata_2` (`id_wisata`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `jadwal_transportasi`
--
ALTER TABLE `jadwal_transportasi`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kategori_kuliner`
--
ALTER TABLE `kategori_kuliner`
  ADD PRIMARY KEY (`id_kategoriKuliner`);

--
-- Indeks untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id_kategoriWisata`);

--
-- Indeks untuk tabel `menu_kuliner`
--
ALTER TABLE `menu_kuliner`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pesan_bantuan`
--
ALTER TABLE `pesan_bantuan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  ADD PRIMARY KEY (`id_rating`) USING BTREE,
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `tempat_kuliner`
--
ALTER TABLE `tempat_kuliner`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_kategoriKuliner` (`id_kategoriKuliner`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_kategoriWisata` (`id_kategoriWisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akomodasi`
--
ALTER TABLE `akomodasi`
  MODIFY `id_akomodasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal_transportasi`
--
ALTER TABLE `jadwal_transportasi`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu_kuliner`
--
ALTER TABLE `menu_kuliner`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesan_bantuan`
--
ALTER TABLE `pesan_bantuan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rating_kuliner`
--
ALTER TABLE `rating_kuliner`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu_kuliner`
--
ALTER TABLE `menu_kuliner`
  ADD CONSTRAINT `menu_kuliner_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_kuliner` (`id_tempat`);

--
-- Ketidakleluasaan untuk tabel `tempat_kuliner`
--
ALTER TABLE `tempat_kuliner`
  ADD CONSTRAINT `tempat_kuliner_ibfk_1` FOREIGN KEY (`id_kategoriKuliner`) REFERENCES `kategori_kuliner` (`id_kategoriKuliner`);

--
-- Ketidakleluasaan untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`id_kategoriWisata`) REFERENCES `kategori_wisata` (`id_kategoriWisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
