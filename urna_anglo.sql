-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/09/2023 às 00:54
-- Versão do servidor: 8.0.34-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `urna_anglo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int NOT NULL,
  `id_turma` int NOT NULL,
  `nome_candidato` varchar(50) NOT NULL,
  `nome_partido_candidato` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sigla_partido_candidato` varchar(10) NOT NULL,
  `numero_candidato` int NOT NULL,
  `foto_candidato` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `id_turma`, `nome_candidato`, `nome_partido_candidato`, `sigla_partido_candidato`, `numero_candidato`, `foto_candidato`) VALUES
(1, 2, 'Benício', 'Partido Feijoada', 'PF', 9, '5bm-benicio-pf-09.jpg'),
(2, 2, 'Valentina', 'Partido SOS', 'PSOS', 78, '5bm-valentina-psos-78.jpg'),
(3, 2, 'Felipe', 'Partido Democrático Justo', 'PDJ', 77, '5bm-felipe-pdj-77.jpg'),
(4, 2, 'Giovanni', 'Partido da Educação Escolar', 'PEE', 23, '55bm-giovanni-pee-23.jpg'),
(5, 2, 'Pietra', 'Partido Mary Carol', 'PMC', 10, '5bm-pietra-pmc-10.jpg'),
(6, 1, 'Gustavo', 'Partido Hollow Knight', 'PHK', 07, '55am-gustavo-phk-07.jpg'),
(7, 1, 'Helena', 'Partido My Friends', 'PMF', 23, '5am-helena-pmf-23.jpg'),
(8, 1, 'Larissa', 'Partido das Meninas', 'PDM', 04, '5am-larissa-pdm-04.jpg'),
(9, 1, 'Marcelo', 'Partido 12', 'PMLFP', 12, '5am-marcelo-pmlfp-12.jpg'),
(10, 1, 'Pedro Paulo', 'Partido Moradia', 'PM', 91, '5am-pedro-pm-91.jpg'),
(11, 3, 'Caio', 'Partido Vida Plus', 'PVP', 39, '5cm-caio-pvp-39.jpg'),
(12, 3, 'Luca', 'Partido da Educação de São Paulo', 'PESP', 18, '5cm-luca-pesp-18.jpg'),
(13, 3, 'Lucas', 'Partido Justo', 'PJ', 20, '5cm-lucas-pj-20.jpg'),
(14, 3, 'Martina', 'Partido Tom', 'PTOTO', 19, '5cm-martina-ptoto-19.jpg'),
(15, 3, 'Matthew', 'Partido Falta de Moradia', 'PFDM', 12, '5cm-matthew-pfdm-12.jpg');


-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int NOT NULL,
  `nome_turma` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`) VALUES
(1, '5AM'),
(2, '5BM'),
(3, '5CM'),
(4, '5AT'),
(5, '5BT');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidato`
--
ALTER TABLE `candidato`
  DROP COLUMN my_row_id,
  DROP PRIMARY KEY,
  ADD PRIMARY KEY (`id_candidato`) ,
  ADD KEY `ix_candidato_turma` (`id_turma`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  DROP COLUMN my_row_id,
  DROP PRIMARY KEY,
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
