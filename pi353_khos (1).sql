-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2022 às 03:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pi353_khos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adotante`
--

CREATE TABLE `adotante` (
  `id_solicitacao` int(1) NOT NULL,
  `nome_adotante` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `estado` varchar(50) NOT NULL, 
  `cidade` varchar(50) NOT NULL, 
  `endereco` varchar(50) NOT NULL,
  `situacao_civil` varchar(50) NOT NULL,
  `generico1` varchar(50) NOT NULL,
  `generico2` varchar(50) NOT NULL,
  `generico3` varchar(50) NOT NULL,
  `generico4` varchar(50) NOT NULL,
  `generico5` varchar(50) NOT NULL,
  `generico6` varchar(50) NOT NULL,
  `generico7` varchar(50) NOT NULL,
  `generico8` varchar(50) NOT NULL,
  `generico9` varchar(50) NOT NULL,
  `generico10` varchar(50) NOT NULL,
  `cod_usuario` int(12) NOT NULL,
  `statusa` int(1) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `cod_bairro` int(11) NOT NULL,
  `desc_bairro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cidade` int(11) NOT NULL,
  `desc_cidade` varchar(45) NOT NULL,
  `cod_bairro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `cod_estado` int(11) NOT NULL,
  `desc_estado` varchar(45) NOT NULL,
  `sigla_estado` varchar(2) NOT NULL,
  `cod_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL,
  `nome_tipousuario` int(11) NOT NULL,
  `senha_tipousuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(12) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `sobrenome_usuario` varchar(45) NOT NULL,
  `email_usuario` varchar(60) NOT NULL,
  `usuario_user` varchar(20) NOT NULL,
  `usuario_senha` varchar(30) NOT NULL,
  `nivel_usuario` varchar(45) NOT NULL,
  `dta_cadastro` datetime NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf_usuario` varchar(14) NOT NULL,
  `tipo` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `usuario_user`, `usuario_senha`, `nivel_usuario`, `dta_cadastro`, `data_nascimento`, `cpf_usuario`, `tipo`) VALUES
(4, 'Gabriel', 'Antonin', 'gabrielantonin999@gmail.com', '', '202cb962ac59075b964b07152d234b', '', '0000-00-00 00:00:00', '0000-00-00', '09989383944', '1'),
(8, 'teste2', 'teste2', 'teste2', '', '$2y$10$f0VHpEfG.lKSEzOm1G.sUOT', '', '0000-00-00 00:00:00', '2121-12-15', 'teste2', '3'),
(12, 'testee', 'testee', 'testee', '', '$2y$10$ri/OcrWGY0sHeLwg6pT8b.k', '', '0000-00-00 00:00:00', '2000-12-12', 'testee', '3'),
(14, 'teste4', 'teste4', 'teste4', '', 'teste4', '', '2022-05-10 12:00:34', '2000-12-12', 'teste4', '3'),
(16, 'teste9', '', 'teste9', '', 'teste9', '', '0000-00-00 00:00:00', '0000-00-00', '', '1'),
(17, 'teste5', 'teste5', 'teste5', '', 'teste5', '', '2022-08-10 21:40:59', '2000-12-15', 'teste5', '3'),
(18, 'teste192', '18', 'gabrielantonin99@gmail.com', '', 'omagaw', '', '0000-00-00 00:00:00', '2004-12-15', '125.125.215', '2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adotante`
--
ALTER TABLE `adotante`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `fk_usuarioadotante` (`cod_usuario`);

--
-- Índices para tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`cod_bairro`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cidade`),
  ADD KEY `fk_cidadebairro` (`cod_bairro`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cod_estado`),
  ADD KEY `fk_cidadeestado` (`cod_cidade`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousuario`),
  ADD KEY `fk_usuariotipo` (`cod_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adotante`
--
ALTER TABLE `adotante`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adotante`
--
ALTER TABLE `adotante`
  ADD CONSTRAINT `fk_usuarioadotante` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`);

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidadebairro` FOREIGN KEY (`cod_bairro`) REFERENCES `bairro` (`cod_bairro`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_cidadeestado` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`cod_cidade`);

--
-- Limitadores para a tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD CONSTRAINT `fk_usuariotipo` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
