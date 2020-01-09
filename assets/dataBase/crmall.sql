SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `crmall`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` tinyint(2) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `sexo`, `endereco`, `numero`, `bairro`, `complemento`, `estado`, `cidade`, `cep`, `data_nascimento`) VALUES
(1, 'Uirá de Souza', 0, 'Al Coronel Pires', 1067, 'Centro', 'Fundos', 'SP', 'Teodoro Sampaio', '19280000', '1992-08-04'),
(2, 'Gisleda', 1, 'Rua: Passeio Flamboyant', 19, 'Centro', 'Casa', 'SP', 'Teodoro Sampaio', '19280000', '2002-01-14');

--
-- Indexes for table `cliente`
--

ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
