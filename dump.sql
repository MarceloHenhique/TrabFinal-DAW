-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Nov-2015 às 04:19
-- Versão do servidor: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exams`
--

INSERT INTO `exams` (`id`, `users_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exams_has_questions`
--

CREATE TABLE `exams_has_questions` (
  `exams_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exams_has_questions`
--

INSERT INTO `exams_has_questions` (`exams_id`, `questions_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(3, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(8, 3),
(8, 7),
(8, 9),
(8, 10),
(9, 2),
(9, 3),
(9, 7),
(9, 9),
(9, 10),
(10, 2),
(10, 3),
(10, 7),
(10, 9),
(10, 10),
(11, 2),
(11, 3),
(11, 7),
(11, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  `statement` text NOT NULL,
  `alternative_a` tinytext NOT NULL,
  `alternative_b` tinytext NOT NULL,
  `alternative_c` tinytext,
  `alternative_d` tinytext,
  `alternative_e` tinytext,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`id`, `topics_id`, `statement`, `alternative_a`, `alternative_b`, `alternative_c`, `alternative_d`, `alternative_e`, `answer`) VALUES
(1, 1, 'Com o objetivo de trabalhar com seus alunos o conceito de volume de sólidos, um professor fez o seguinte experimento: pegou uma caixa de polietileno, na forma de um cubo com 1 metro de lado, e colocou nela 600 litros de água. Em seguida, colocou, dentro da caixa com água, um sólido que ficou completamente submerso.\r\nConsiderando que, ao colocar o sólido dentro da caixa, a altura do nível da água passou a ser 80 cm, qual era o volume do sólido?', '0,2 m³', '0,48 m³', '4,8 m³', '20 m³', '48 m³', 'a'),
(2, 2, 'O capim-elefante é uma designação genérica que reúne mais de 200 variedades de capim e se destaca porque tem produtividade de aproximadamente 40 toneladas de massa seca por hectare por ano, no mínimo, sendo, por exemplo, quatro vezes maior que a da madeira de eucalipto. Além disso, seu ciclo de produção é de seis meses, enquanto o primeiro corte da madeira de eucalipto é feito a partir do sexto ano.\r\n\r\nConsidere uma região R plantada com capim-elefante que mantém produtividade constante com o passar do tempo. Para se obter a mesma quantidade, em toneladas, de massa seca de eucalipto, após o primeiro ciclo de produção dessa planta, é necessário plantar uma área S que satisfaça à relação:', 'S = 4R', 'S = 6R', 'S = 12R', 'S = 36R', 'S = 48R', 'e'),
(3, 3, 'Sobre a estrutura do DNA, marque a alternativa incorreta:', 'O DNA carrega as informações genéticas do indivíduo.', 'Os cromossomos são formados principalmente por DNA.', 'O DNA, assim como o RNA, é formado por nucleotídeos, que são constituídos por um fosfato, um açúcar e uma base nitrogenada.', 'Os nucleotídeos que formam o DNA diferenciam-se do RNA por apresentarem uma ribose e a base timina.', NULL, 'd'),
(4, 12, 'João deve 12 parcelas de R$ 150,00 referentes ao cheque especial de seu banco e cinco\r\nparcelas de R$ 80,00 referentes ao cartão de crédito. O gerente do banco lhe ofereceu duas\r\nparcelas de desconto no cheque especial, caso João quitasse esta dívida imediatamente ou, na\r\nmesma condição, isto é, quitação imediata, com 25% de desconto na dívida do cartão. João\r\ntambém poderia renegociar suas dívidas em 18 parcelas mensais de R$ 125,00. Sabendo desses\r\ntermos, José, amigo de João, ofereceu-lhe emprestar o dinheiro que julgasse necessário pelo\r\ntempo de 18 meses, com juros de 25% sobre o total emprestado.\r\nA opção que dá a João o menor gasto seria:', 'Renegociar suas dívidas com o banco.', 'Pegar emprestado de José o dinheiro referente à quitação das duas dívidas.', 'Recusar o empréstimo de José e pagar todas as parcelas pendentes nos devidos prazos.', 'Pegar emprestado de José o dinheiro referente à quitação do cheque especial e pagar as\r\nparcelas do cartão de crédito.', 'e) Pegar emprestado de José o dinheiro referente à quitação do cartão de crédito e pagar as\r\nparcelas do cheque especial.', 'a'),
(5, 12, 'Esta é uma questão de Porcentagem.', 'Lorem Ipsum Donec Odio.', 'Loremzao.', 'Pequeno Lorem.', 'Dolor Sit Amet.', 'Essa não é a resposta.', 'e'),
(6, 12, 'Porcentagem.', 'A.', 'B.', 'C.', 'Resposta.', 'E.', 'd'),
(7, 11, 'PA e PG.', 'São bons temas.', 'Ok.', 'Github.', 'On rails.', 'Resposta.', 'e'),
(8, 12, 'Questão de Porcentagem de novo.', 'A.', 'B.', 'C.', 'Resposta.', 'E.', 'd'),
(9, 9, 'Quanto é 2+2?', '4.', '5.', '-4.', '45.', NULL, 'a'),
(10, 9, 'Qual é o MMC de 2 e 8?', '20.', '16.', '4.', '8.', '2.', 'd'),
(11, 10, 'Função quadrática.', 'Também conhecida como de 2o grau.', 'Ou não.', 'Ou sim.', 'Loremipsum.', 'Dolor sit amet.', 'd'),
(12, 10, 'Lorem dolor sit amet de 2o grau. ', 'Donec odio.', 'Or lorem?', 'Donec resposta.', 'Odio or no.', 'Eae.', 'c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `results`
--

CREATE TABLE `results` (
  `users_id` int(11) NOT NULL,
  `exams_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `results`
--

INSERT INTO `results` (`users_id`, `exams_id`, `questions_id`, `answer`) VALUES
(1, 1, 1, 'a'),
(1, 1, 2, 'a'),
(1, 1, 3, 'd'),
(1, 1, 4, 'a'),
(1, 1, 5, 'd'),
(1, 1, 6, 'd'),
(1, 1, 7, 'e'),
(1, 1, 8, 'd'),
(1, 1, 9, 'a'),
(1, 1, 10, 'd'),
(1, 1, 11, 'a'),
(1, 1, 12, 'c'),
(1, 11, 2, 'd'),
(1, 11, 3, 'd'),
(1, 11, 7, 'c'),
(1, 11, 9, 'a'),
(1, 11, 10, 'e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Matemática'),
(2, 'Biologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subjects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`id`, `description`, `subjects_id`) VALUES
(1, 'Geometria Espacial', 1),
(2, 'Geometria Plana', 1),
(3, 'DNA', 2),
(4, 'Estudo das Células', 2),
(9, 'Aritmética', 1),
(10, 'Funções do 2º Grau', 1),
(11, 'Sequências PA e PG', 1),
(12, 'Porcentagem', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `telephone` varchar(15) DEFAULT 'non-informed',
  `birthdate` date NOT NULL,
  `cpf` varchar(15) DEFAULT 'non-informed',
  `rank` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `firstname`, `lastname`, `telephone`, `birthdate`, `cpf`, `rank`) VALUES
(1, 'kyl3', 'ad4f0f826bdada0e549c8ff168cdb2d06888a587', 'edmundo-r@ufmg.br', 'Edmundo', 'Rodrigues', '319853361999', '1997-11-12', '13609598662', 3001),
(2, 'raulj', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rauljulian1996@gmail.com', 'Raul', 'Julian', 'non-informed', '1996-05-26', 'non-informed', 3001),
(3, 'marceloh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'marcelohenhique@hotmail.com', 'Marcelo', 'Henhique', 'non-informed', '1998-05-28', 'non-informed', 1337);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exams_users_id` (`users_id`);

--
-- Indexes for table `exams_has_questions`
--
ALTER TABLE `exams_has_questions`
  ADD PRIMARY KEY (`exams_id`,`questions_id`),
  ADD KEY `fk_ehq_questions_id` (`questions_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questions_topics_id` (`topics_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`users_id`,`exams_id`,`questions_id`),
  ADD KEY `fk_results_exams_id` (`exams_id`),
  ADD KEY `fk_results_questions_id` (`questions_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topics_subjects_id` (`subjects_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `fk_exams_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `exams_has_questions`
--
ALTER TABLE `exams_has_questions`
  ADD CONSTRAINT `fk_ehq_exams_id` FOREIGN KEY (`exams_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ehq_questions_id` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_topics_id` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`);

--
-- Limitadores para a tabela `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_results_exams_id` FOREIGN KEY (`exams_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_results_questions_id` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_results_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `fk_topics_subjects_id` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
