-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2016 at 11:19 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistemaub`
--

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`perfil_id` int(10) unsigned NOT NULL,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`perfil_id`, `nombre`) VALUES
(1, 'admin'),
(2, 'asesor'),
(3, 'jefe'),
(4, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
`turno_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `nombrePilaCliente` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `emailCliente` varchar(254) COLLATE latin1_spanish_ci NOT NULL,
  `horaIngreso` datetime NOT NULL,
  `horaAtencion` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `turno`
--

INSERT INTO `turno` (`turno_id`, `usuario_id`, `nombrePilaCliente`, `emailCliente`, `horaIngreso`, `horaAtencion`) VALUES
(1, 16, 'Marty McFly', 'frula@AlternativaGratis.com.ar', '2015-11-21 16:12:04', '2016-01-18 16:52:54'),
(2, 13, 'Mocos McMocos', 'mocos@mocos.com', '2015-11-21 16:17:58', '2015-11-21 16:22:47'),
(3, 13, 'Steve Wozniak', 'sWozniak@apple.com', '2015-11-21 16:17:58', '2015-11-21 16:22:47'),
(4, 13, 'Wol O. lo', 'wololo@aoe2.com', '2015-11-21 16:17:58', '2015-11-21 16:22:47'),
(5, 16, 'Francisco Pizarro', 'fpizarro@robomanoarmada.com.es', '2015-11-21 16:17:58', '2016-01-25 15:43:35'),
(6, 16, 'Salty Bastard', 'ipod3g@apple.com', '2015-11-21 16:17:58', '2016-01-25 15:45:45'),
(13, 16, 'asdasd', 'asdasdasd', '2016-01-22 00:34:31', '2016-01-25 19:06:10'),
(14, NULL, 'asdasd', 'asdasdasd', '2016-01-22 00:38:36', NULL),
(15, NULL, 'asdasd', 'asdasd', '2016-01-25 17:13:34', NULL),
(16, NULL, 'angelo', 'ang@prueba.com', '2016-01-25 17:18:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usuario_id` int(10) unsigned NOT NULL,
  `perfil_id` int(10) unsigned NOT NULL,
  `nombrePila` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(32) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `perfil_id`, `nombrePila`, `usuario`, `contrasena`) VALUES
(2, 1, 'Pity Alvarez', 'admin', '7b24afc8bc80e548d66c4e7ff72171c5'),
(12, 3, 'Abraham Simpson', 'linux', '098f6bcd4621d373cade4e832627b4f6'),
(13, 2, 'Angel N Gonzaga', 'nGonzaga', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 1, 'pedro', 'prueba', 'e206a54e97690cce50cc872dd70ee896'),
(15, 3, 'mocos', 'marte', 'c893bad68927b457dbed39460e6afd62'),
(16, 2, 'prueba', 'mercurio', 'c893bad68927b457dbed39460e6afd62');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_colaturnosespera`
--
CREATE TABLE IF NOT EXISTS `v_colaturnosespera` (
`turno_id` int(10) unsigned
,`usuario_id` int(10) unsigned
,`nombrePilaCliente` varchar(64)
,`emailCliente` varchar(254)
,`horaIngreso` datetime
,`horaAtencion` datetime
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mostrarcolaturnos`
--
CREATE TABLE IF NOT EXISTS `v_mostrarcolaturnos` (
`Turno` int(10) unsigned
,`Cliente` varchar(64)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mostrarturnollamado`
--
CREATE TABLE IF NOT EXISTS `v_mostrarturnollamado` (
`Turno` int(10) unsigned
,`Asesor` varchar(64)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mostrarturnos`
--
CREATE TABLE IF NOT EXISTS `v_mostrarturnos` (
`turno_id` int(10) unsigned
,`nombrePilaCliente` varchar(64)
,`emailCliente` varchar(254)
,`horaIngreso` datetime
,`horaAtencion` datetime
,`usuario` varchar(25)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_primerturno`
--
CREATE TABLE IF NOT EXISTS `v_primerturno` (
`turno_id` int(10) unsigned
,`usuario_id` int(10) unsigned
,`nombrePilaCliente` varchar(64)
,`emailCliente` varchar(254)
,`horaIngreso` datetime
,`horaAtencion` datetime
);
-- --------------------------------------------------------

--
-- Structure for view `v_colaturnosespera`
--
DROP TABLE IF EXISTS `v_colaturnosespera`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_colaturnosespera` AS select `turno`.`turno_id` AS `turno_id`,`turno`.`usuario_id` AS `usuario_id`,`turno`.`nombrePilaCliente` AS `nombrePilaCliente`,`turno`.`emailCliente` AS `emailCliente`,`turno`.`horaIngreso` AS `horaIngreso`,`turno`.`horaAtencion` AS `horaAtencion` from `turno` where isnull(`turno`.`horaAtencion`) order by `turno`.`turno_id`;

-- --------------------------------------------------------

--
-- Structure for view `v_mostrarcolaturnos`
--
DROP TABLE IF EXISTS `v_mostrarcolaturnos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mostrarcolaturnos` AS select `turno`.`turno_id` AS `Turno`,`turno`.`nombrePilaCliente` AS `Cliente` from `turno` where isnull(`turno`.`horaAtencion`) order by `turno`.`turno_id` desc;

-- --------------------------------------------------------

--
-- Structure for view `v_mostrarturnollamado`
--
DROP TABLE IF EXISTS `v_mostrarturnollamado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mostrarturnollamado` AS select `turno`.`turno_id` AS `Turno`,`usuario`.`nombrePila` AS `Asesor` from (`turno` join `usuario`) where ((`turno`.`usuario_id` = `usuario`.`usuario_id`) and (`turno`.`horaAtencion` is not null)) order by `Turno` desc limit 1;

-- --------------------------------------------------------

--
-- Structure for view `v_mostrarturnos`
--
DROP TABLE IF EXISTS `v_mostrarturnos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mostrarturnos` AS select `turno`.`turno_id` AS `turno_id`,`turno`.`nombrePilaCliente` AS `nombrePilaCliente`,`turno`.`emailCliente` AS `emailCliente`,`turno`.`horaIngreso` AS `horaIngreso`,`turno`.`horaAtencion` AS `horaAtencion`,`usuario`.`usuario` AS `usuario` from (`turno` join `usuario`) where (`turno`.`usuario_id` = `usuario`.`usuario_id`);

-- --------------------------------------------------------

--
-- Structure for view `v_primerturno`
--
DROP TABLE IF EXISTS `v_primerturno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_primerturno` AS select `v_colaturnosespera`.`turno_id` AS `turno_id`,`v_colaturnosespera`.`usuario_id` AS `usuario_id`,`v_colaturnosespera`.`nombrePilaCliente` AS `nombrePilaCliente`,`v_colaturnosespera`.`emailCliente` AS `emailCliente`,`v_colaturnosespera`.`horaIngreso` AS `horaIngreso`,`v_colaturnosespera`.`horaAtencion` AS `horaAtencion` from `v_colaturnosespera` limit 1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`perfil_id`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
 ADD PRIMARY KEY (`turno_id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usuario_id`), ADD KEY `perfil_id` (`perfil_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
MODIFY `perfil_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
MODIFY `turno_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `turno`
--
ALTER TABLE `turno`
ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`perfil_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
