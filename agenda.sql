-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2016 às 00:03
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `cd_aula` int(11) NOT NULL,
  `en_dia` enum('segunda','terca','quarta','quinta','sexta','sabado') NOT NULL,
  `cd_horario` int(11) NOT NULL,
  `cd_materia` int(11) NOT NULL,
  `ds_sala` varchar(50) NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`cd_aula`, `en_dia`, `cd_horario`, `cd_materia`, `ds_sala`, `cd_usuario`) VALUES
(2, 'terca', 6, 7, 's2010', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `cd_contato` int(11) NOT NULL,
  `nr_telefone` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`cd_contato`, `nr_telefone`) VALUES
(1, '(11) 1111-11111'),
(2, '23222'),
(3, '(11) 1111-11111'),
(4, '23222'),
(5, '(11) 1111-11111'),
(6, '23222'),
(7, '(11) 1111-11111'),
(8, '23222'),
(9, '(33) 33333-3333'),
(10, '444444444444444444'),
(11, '444444444444444444444444455'),
(12, '(00) 00000-0000'),
(13, '4444441223123'),
(14, '(54) 65463-3445'),
(15, '(47) 9622-1971'),
(16, '4796221971');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_has_usuarios`
--

CREATE TABLE `contato_has_usuarios` (
  `contato_cd_contato` int(11) NOT NULL,
  `usuarios_cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato_has_usuarios`
--

INSERT INTO `contato_has_usuarios` (`contato_cd_contato`, `usuarios_cd_usuario`) VALUES
(9, 3),
(10, 3),
(11, 3),
(14, 3),
(15, 3),
(16, 3),
(16, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `cd_horario` int(11) NOT NULL,
  `hr_inicial` varchar(5) NOT NULL,
  `hr_final` varchar(5) NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`cd_horario`, `hr_inicial`, `hr_final`, `cd_usuario`) VALUES
(5, '08:00', '09:00', 1),
(6, '09:00', '10:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lembretes`
--

CREATE TABLE `lembretes` (
  `cd_lembrete` int(11) NOT NULL,
  `ds_titulo` varchar(256) NOT NULL,
  `dt_lembrete` date NOT NULL,
  `ds_lembrete` text NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lembretes`
--

INSERT INTO `lembretes` (`cd_lembrete`, `ds_titulo`, `dt_lembrete`, `ds_lembrete`, `cd_usuario`) VALUES
(3, 'teste', '2017-10-10', 'gfdsgg\r\nsdf\r\ng\r\nsdf\r\ngdsgsdfg\r\nsdfg\r\nsdf\r\ngsd\r\nfgdsf', 1),
(4, 'teste', '2016-06-16', 'treste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `cd_materia` int(11) NOT NULL,
  `ds_titulo` varchar(256) NOT NULL,
  `ds_professor` varchar(256) DEFAULT 'Não cadastrado',
  `ds_semestre` varchar(50) NOT NULL,
  `cd_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`cd_materia`, `ds_titulo`, `ds_professor`, `ds_semestre`, `cd_usuario`) VALUES
(7, 'Grafos', 'AurÃ©lio', '2016-01', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cd_usuario` int(11) NOT NULL,
  `ds_nome` varchar(256) NOT NULL,
  `ds_email` varchar(256) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_login` varchar(32) NOT NULL,
  `ds_senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cd_usuario`, `ds_nome`, `ds_email`, `dt_nascimento`, `ds_login`, `ds_senha`) VALUES
(1, 'Renan Rafael Bertoldo', 'renan10r_@hotmail.com', '1995-12-10', 'ptvspw', 'a1a1a78b9072fc3d7de20014fdf7d28b'),
(2, '', '', '0000-00-00', 'ptvspw1', 'a1a1a78b9072fc3d7de20014fdf7d28b'),
(3, 'Renan 2', 'renan10r_@hotmail.com', '1995-12-10', 'ptvspw', '6116afedcb0bc31083935c1c262ff4c9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`cd_aula`),
  ADD KEY `fk_aulas_horarios` (`cd_horario`),
  ADD KEY `fk_aulas_materias` (`cd_materia`),
  ADD KEY `fk_aulas_usuarios` (`cd_usuario`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`cd_contato`);

--
-- Indexes for table `contato_has_usuarios`
--
ALTER TABLE `contato_has_usuarios`
  ADD KEY `fk_contato_has_usuarios` (`contato_cd_contato`),
  ADD KEY `fk_contato_has_usuarios_usuarios` (`usuarios_cd_usuario`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`cd_horario`),
  ADD KEY `fk_horarios_usuarios` (`cd_usuario`);

--
-- Indexes for table `lembretes`
--
ALTER TABLE `lembretes`
  ADD PRIMARY KEY (`cd_lembrete`),
  ADD KEY `fk_lembretes_usuarios` (`cd_usuario`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`cd_materia`),
  ADD KEY `fk_materias_usuarios` (`cd_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `cd_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `cd_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `cd_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lembretes`
--
ALTER TABLE `lembretes`
  MODIFY `cd_lembrete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `cd_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aulas_horarios` FOREIGN KEY (`cd_horario`) REFERENCES `horarios` (`cd_horario`),
  ADD CONSTRAINT `fk_aulas_materias` FOREIGN KEY (`cd_materia`) REFERENCES `materias` (`cd_materia`),
  ADD CONSTRAINT `fk_aulas_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `contato_has_usuarios`
--
ALTER TABLE `contato_has_usuarios`
  ADD CONSTRAINT `fk_contato_has_usuarios` FOREIGN KEY (`contato_cd_contato`) REFERENCES `contatos` (`cd_contato`),
  ADD CONSTRAINT `fk_contato_has_usuarios_usuarios` FOREIGN KEY (`usuarios_cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horarios_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `lembretes`
--
ALTER TABLE `lembretes`
  ADD CONSTRAINT `fk_lembretes_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

--
-- Limitadores para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `fk_materias_usuarios` FOREIGN KEY (`cd_usuario`) REFERENCES `usuarios` (`cd_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
