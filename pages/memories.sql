-- Banco de dados: `memories`

--
-- Estrutura para a tabela `usuarios`
--
CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT, -- Define a coluna como chave primária e incremental
  `nome` VARCHAR(255) NOT NULL, -- Mantém o nome com tamanho suficiente
  `turma` VARCHAR(55) NOT NULL, -- Define a turma com tamanho adequado
  `senha` VARCHAR(255) NOT NULL, -- Altera o tipo para VARCHAR para armazenar hashes
  PRIMARY KEY (`id`) -- Define a chave primária
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserção de dados na tabela `usuarios`
--
INSERT INTO `usuarios` (`id`, `nome`, `turma`, `senha`) VALUES
(1, 'henrique', '303', '202cb962ac59075b964b07152d234b70'), -- Exemplo de hash MD5
(2, 'jose', '303', '202cb962ac59075b964b07152d234b70'); -- Mesmo hash como exemplo

--
-- Ajuste do AUTO_INCREMENT para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  AUTO_INCREMENT = 4;
COMMIT;
