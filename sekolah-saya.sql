-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 27 Agu 2021 pada 05.04
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah-saya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

DROP TABLE IF EXISTS `keahlian`;
CREATE TABLE IF NOT EXISTS `keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengenal` varchar(128) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `persentase` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id`, `no_pengenal`, `nama`, `persentase`) VALUES
(8, '123456', 'Js', '50'),
(9, '12345', 'B.indonesia', '100'),
(11, '123456', 'game online', '100'),
(6, '123456', 'Kotlin', '100'),
(10, '12345', 'komputer', '50'),
(13, '12345', 'Js', '100'),
(14, '12345', 'PHP', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `prodi`, `tingkat`) VALUES
(3, 'tif 1-1', 'tif 1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

DROP TABLE IF EXISTS `keuangan`;
CREATE TABLE IF NOT EXISTS `keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `dibuat` varchar(20) NOT NULL,
  `status` varchar(255) DEFAULT 'kosong',
  `tahun_ajaran_id` int(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `judul`, `jumlah`, `dibuat`, `status`, `tahun_ajaran_id`) VALUES
(4, 'tugas biologi untuk pesan baru', '3000000', '06 May 2021 04:03 pm', 'IYURAN SEKOLAH', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunci_gitar`
--

DROP TABLE IF EXISTS `kunci_gitar`;
CREATE TABLE IF NOT EXISTS `kunci_gitar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artis` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kunci` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunci_gitar`
--

INSERT INTO `kunci_gitar` (`id`, `artis`, `judul`, `kunci`) VALUES
(11, 'Sonia', 'Gaun Merah', 'Dm Am G Am\r\nDm Am G C E\r\n \r\nAm              C\r\n\n saat gerimis datang\r\n\n G                                          F \n membasahi gaun merahku\r\n \r\nyang engkau berikan untukku\r\n\n Am C Am C\r\n \r\nAm                C\r\n\n kini gaun merah ini\r\n\n G\r\n\n hanya menjadi saksi bisu\r\n\n F\r\n\n saat kau tinggalkan diriku\r\n\n Dm\r\n\n terbuai aku dalam mulut\r\n\n Am\r\n\n manismu\r\n \r\nyang penuh dengan janji\r\n\n G\r\n\n palsu\r\n\n Am\r\n\n seakan semuanya indah\r\n\n Dm\r\n\n terpuruk aku di dalam\r\n\n Am\n lembah cinta\r\n\n G\n yang membuat mataku buta\r\n\n C\n karena diriku selama ini\r\n\n E\r\n\n tak tahu dirimu mendua\r\n\n A\r\n\n biarkan ku bawa luka\r\n\n D\r\n\n hatiku ini\r\n\n E\r\n\n dan tak akan aku sesali\r\n \r\nwalaupun gerimis\r\n\nA  E\r\n\n tak henti\r\n\n A\r\n\n kini cukup sudah aku\r\n\n D\r\n\n rasakan perih hati dan ku tak mau\r\n\n E\r\n\n terulang lagi\r\n\n A\r\n\n walaupun cintaku bersemi\r\n\n D\n pergilah kasih ku harap\r\n\n A\r\n\n kau bahagia\r\n\n E\r\n\n dan biarkanlah cinta kita\r\n\n A\n hanyalah menjadi cerita\r\n\n Am    Am\r\n \r\n     Dm\r\n\n terbuai aku dalam mulut\r\n\n Am\r\n\n manismu\r\n \r\nyang penuh dengan janji\r\n\n G\n palsu\r\n\n Am\n seakan semuanya indah\r\n\n Dm\n terpuruk aku di dalam\r\n\n Am\r\n\nlembah cinta\r\n\n G\n yang membuat mataku buta\r\n\n C\n karena diriku selama ini\r\n\n E\n tak tahu dirimu mendua\r\n\n A\n biarkan ku bawa luka\r\n\n D\n hatiku ini\n E\r\n\n dan tak akan aku sesali\r\n \r\nwalaupun gerimis\r\n\n A  E\r\n\n tak henti\r\n\n A\n kini cukup sudah aku rasakan\r\n\n D\n perih hati dan ku tak mau\r\n\n E\n terulang lagi\r\n\n A\n walaupun cintaku bersemi'),
(12, 'ipang', 'Panek di Awak Kayo di Urang', '(Intro) F C Dm G C\r\nF C Dm G C\r\n\r\n                      C\r\nsingkek alah diuleh\r\n                         C\r\nsayuik alah disambuang\r\n            F\r\ntiok dijuluak tak sampai juo\r\n              G\r\nusah balamo adiak pandangi\r\n                              C      G\r\nkalimpatan mato jadinyo\r\n                      C\r\nantah bilo ka lareh\r\n                      C\r\nbuah masak di ujuang\r\n                 F\r\nranting taraso tinggi juo\r\n                 G\r\nlamo jo lambek ka jatuah juo\r\n                                    C\r\nsamo disambuik jo hati suko\r\n                       F\r\nbatang nan tumbuah di tanah lereang\r\n               C\r\ntiok nan jatuah ka parak urang\r\n             Dm                  G\r\nancak di awak urang katuju\r\n                            C\r\nbasidakah kito dahulu\r\n              F\r\npanek di awak kayo di urang\r\n            C\r\nraso dikito bilo kasanang\r\n              Dm          G\r\nsalagi masih barusaho\r\n                                    C\r\nTuhan nan indak ka sio-sio..\r\n                F                    C\r\nindak ka lari gunuang dikaja\r\n                G                     C\r\nindak ka kariang lauik ditimbo\r\n                  F                  C\r\nsamo mancari kito jo badoa\r\n            G                    C\r\nnan rasaki ka datang juo..\r\n\r\n(Intro) F C Dm G C\r\nF C Dm G C\r\n\r\n  C\r\nantah bilo ka lareh\r\n                      C\r\nbuah masak di ujuang\r\n                 F\r\nranting taraso tinggi juo\r\n                 G\r\nlamo jo lambek ka jatuah juo\r\n                                    C\r\nsamo disambuik jo hati suko..\r\n                       F\r\nbatang nan tumbuah di tanah lereang\r\n               C\r\ntiok nan jatuah ka parak urang\r\n              Dm                G\r\nancak diawak urang katuju\r\n                            C\r\nbasidakah kito dahulu\r\n              F\r\npanek diawak kayo diurang\r\n           C\r\nraso dikito bilo kasanang\r\n              Dm         G\r\nsalagi masih barusaho\r\n                                    C\r\nTuhan nan indak ka sio-sio\r\n                F                    C\r\nindak ka lari gunuang dikaja\r\n                G                     C\r\nindak ka kariang lauik ditimbo\r\n                  F                  C\r\nsamo mancari kito jo badoa\r\n            G                    C\r\nnan rasaki ka datang juo..\r\n.\r\n(Ending) F C Dm G C\r\nF C Dm G C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`) VALUES
(2, 'B. indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_keuangan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `no_pengenal` varchar(255) NOT NULL,
  `tgl_pembayaran` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_keuangan`, `id_kelas`, `no_pengenal`, `tgl_pembayaran`, `jumlah`) VALUES
(3, 4, 3, '2017', '2021-05-28 01:57:40am', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmet`
--

DROP TABLE IF EXISTS `sosmet`;
CREATE TABLE IF NOT EXISTS `sosmet` (
  `id` int(11) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `bg_color` varchar(128) NOT NULL,
  `color` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(20) NOT NULL,
  `awal` varchar(20) NOT NULL,
  `akhir` varchar(20) NOT NULL,
  `semester` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `awal`, `akhir`, `semester`) VALUES
(1, '2021/2022', '2021-05-08', '2022-07-08', 'Ganjil'),
(3, '2021/2021', '2021-05-29', '2021-10-23', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengenal` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `no_phone` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`id`, `no_pengenal`, `nama`, `image`, `no_phone`, `alamat`) VALUES
(1, '123456', 'Ringga Admin', '1617093584_0b09168cc49ad2814db8.jpg', '123456', 'mungo'),
(9, '201713005', 'ringga Pengajar', 'user.jpg', '085364403481', 'mungo tanjuang anau'),
(10, '2017', 'ringga siswa', 'user.jpg', '08536434234', 'mungo tanjuang anau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kelas_siswa`
--

DROP TABLE IF EXISTS `user_kelas_siswa`;
CREATE TABLE IF NOT EXISTS `user_kelas_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengenal` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_kelas_siswa`
--

INSERT INTO `user_kelas_siswa` (`id`, `no_pengenal`, `id_kelas`, `tahun_ajaran_id`) VALUES
(3, '2017', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `no_pengenal` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `no_pengenal`, `email`, `pass`, `role`) VALUES
(7, '123456', 'ringgaadmin@gmail.com', '$2y$10$dkbolXV0wTqW7f0ievKbHupIj204UaLl50bxWcpLriCwf9A9z1fvG', 1),
(17, '201713005', 'ringgaguru@gmail.com', '$2y$10$P4WcHmFB79rOuBSvDmTCyuHqb.pB7yRRoMd8aiUjCz3DUHgyKKXii', 2),
(18, '2017', 'ringgasiswa@gmail.com', '$2y$10$1rATEuW/zOQp80Wb3THypeaOXp6S8aR/tWkDhQyZ1YTKC2bX9CmbC', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) NOT NULL,
  `icons` varchar(255) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icons`, `aktif`) VALUES
(1, 'User', 'dw dw-user-2', 1),
(2, 'Admin', 'dw dw-user-11', 1),
(5, 'Data Sekolah', 'dw dw-school', 1),
(6, 'App-Fitur', 'dw dw-smartphone', 1),
(7, 'Managemen Sekolah', 'dw dw-school', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu_akses`
--

DROP TABLE IF EXISTS `user_menu_akses`;
CREATE TABLE IF NOT EXISTS `user_menu_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu_akses`
--

INSERT INTO `user_menu_akses` (`id`, `role_id`, `menu_id`) VALUES
(7, 1, 1),
(2, 1, 2),
(3, 2, 1),
(8, 1, 5),
(9, 1, 6),
(10, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu_sub`
--

DROP TABLE IF EXISTS `user_menu_sub`;
CREATE TABLE IF NOT EXISTS `user_menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu_sub`
--

INSERT INTO `user_menu_sub` (`id`, `menu_id`, `nama_menu`, `url`, `aktif`) VALUES
(1, 1, 'Profile', 'home/profile', 1),
(2, 2, 'Managemen Menu', 'admin/menu', 1),
(4, 2, 'Akses Menu', 'admin/akses_menu', 1),
(5, 5, 'Sekolah', 'admin/sekolah', 1),
(6, 2, 'Data Admin', 'admin/data_admin', 1),
(7, 5, 'Data Pengajar', 'admin/pengajar', 1),
(8, 5, 'Data Siswa', 'admin/data_siswa', 1),
(9, 6, 'M->Wallpaper', 'admin/wallpaper', 1),
(10, 6, 'M->Chord Lagu', 'admin/lagu', 1),
(11, 6, 'M->Vidio', 'admin/vidio', 1),
(12, 5, 'Kelas', 'admin/kelas', 1),
(13, 5, 'Mapel', 'admin/mapel', 1),
(14, 7, 'Keuangan', 'admin/keuangan', 1),
(15, 5, 'Tahun Ajaran', 'admin/tahun_ajaran', 1),
(16, 7, 'Pembayaran', 'admin/pembayaran', 1),
(17, 5, 'Kelas Siswa', 'admin/kelas_siswa', 1),
(18, 7, 'Pembayaran Siswa', 'admin/cek_pembayaran_siswa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengenal` int(128) NOT NULL,
  `token` varchar(512) NOT NULL,
  `tgl_buat` varchar(128) NOT NULL,
  `tgl_update` varchar(128) DEFAULT 'kosong',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `no_pengenal`, `token`, `tgl_buat`, `tgl_update`) VALUES
(1, 123456, '$2y$10$dkbolXV0wTqW7f0ievKbHupIj204UaLl50bxWcpLriCwf9A9z1fvG', '21-09-2021', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_vidio`
--

DROP TABLE IF EXISTS `user_vidio`;
CREATE TABLE IF NOT EXISTS `user_vidio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `vidio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_vidio`
--

INSERT INTO `user_vidio` (`id`, `nama`, `vidio`) VALUES
(6, 'Admin SMK', '1620284163_d2d5ed86b7df087ae0b2.mp4'),
(2, 'ringga', '1620282511_7b14d000277de05ecdc0.mp4'),
(3, 'ringga dosen', '1620282662_69762403fe07e52b11c7.mp4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_wallpaper`
--

DROP TABLE IF EXISTS `user_wallpaper`;
CREATE TABLE IF NOT EXISTS `user_wallpaper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_wallpaper`
--

INSERT INTO `user_wallpaper` (`id`, `nama`, `image`) VALUES
(2, 'Admin SMK', '1619774224_03ca588f67ce1e35bb66.jpg'),
(3, 'ringga dosen', '1619774385_4c90d5fa3cdcfe59212b.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
