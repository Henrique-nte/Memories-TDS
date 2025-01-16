--
-- Banco de dados: `memories`
--
--
-- Estrutura para tabela `usuarios`
--
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `turma` varchar(55) NOT NULL,
  `senha` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Despejando dados para a tabela `usuarios`
--
INSERT INTO `usuarios` (`id`, `nome`, `turma`, `senha`) VALUES
(1, 'henrique', '303', 123),
(2, 'jose', '303', 123),

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

