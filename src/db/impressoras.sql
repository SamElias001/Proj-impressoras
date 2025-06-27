UPDATE impressoras
SET observacao = 'Sua observação aqui'
WHERE id_imp = 1;-- Apenas estrutura do banco de dados para o sistema de impressoras
-- Banco de dados em Xampp







CREATE DATABASE proj_impressoras;

CREATE TABLE impressoras (
    id_imp INT AUTO_INCREMENT PRIMARY KEY,
    numero_de_serie VARCHAR(50) NOT NULL UNIQUE,
    setor VARCHAR(50) NOT NULL,
    marca ENUM('Samsung', 'HP', 'Epson') NOT NULL,
    ultima_manutencao DATE NOT NULL DEFAULT '2025-06-23',
    problema TEXT NOT NULL DEFAULT 'Nenhum',
    peca_utilizada VARCHAR(50) NOT NULL DEFAULT 'Nenhuma',
    status_de_conclusao ENUM('Pendente', 'Em andamento', 'Feito') NOT NULL DEFAULT 'Pendente',
    rede ENUM('via Rede', 'Via USB') NOT NULL,
    contador_de_uso INT NOT NULL DEFAULT 0,
    ipv4_impressora VARCHAR(15) NOT NULL DEFAULT '0.0.0.0',
    observacao TEXT
);

CREATE TABLE pecas (
    id_peca INT AUTO_INCREMENT PRIMARY KEY,
    nome_peca VARCHAR(100) NOT NULL,
    marca_peca ENUM('Samsung', 'HP') NOT NULL,
    descricao_peca TEXT
);

CREATE TABLE estoque (
    id_estoque INT AUTO_INCREMENT PRIMARY KEY,
    id_peca INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_peca) REFERENCES pecas(id_peca)
);


















-- Preset
-- Criar mais exemplos de impressoras

INSERT INTO impressoras (numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede)
VALUES ('ZDEJB07M646436P', 'Elz_M - Enferm', 'Samsung', '2025-06-04', 'Troca de Toner', 'Toner', 'Feito', 'Sim');

INSERT INTO impressoras (numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede)
VALUES ('ZDDPB07M415MZPR', 'Serviço Social', 'Samsung', '2025-06-05', 'Usuario do Scanner', '', 'Feito', 'Sim');

-- Inserir as peças na tabela pecas
INSERT INTO pecas (nome_peca, marca_peca, descricao_peca)
VALUES ('Fusor', 'Samsung', NULL);

INSERT INTO pecas (nome_peca, marca_peca, descricao_peca)
VALUES ('Fusor', 'HP', NULL);

-- Atualizar a observação de uma impressora específica (exemplo: id_imp = 1)
-- (Certifique-se de substituir o id_imp pelo ID correto da impressora que deseja atualizar)
UPDATE impressoras
SET observacao = 'Teste de observação para a impressora, com textos grandes e complexos. Aqui está um exemplo de texto longo que pode ser usado para testar a exibição de observações na interface do usuário. Este texto é apenas um exemplo e pode ser substituído por qualquer outro texto que você desejar. A ideia é garantir que o sistema possa lidar com observações extensas sem problemas de formatação ou truncamento.'
WHERE id_imp = 1;

-- Inserir no estoque (assumindo que os IDs das peças inseridas acima são 1 e 2)
INSERT INTO estoque (id_peca, quantidade)
VALUES (1, 1);

INSERT INTO estoque (id_peca, quantidade)
VALUES (2, 1);

-- Alterar banco antigo
ALTER TABLE impressoras
MODIFY COLUMN marca ENUM('Samsung', 'HP', 'Epson') NOT NULL;

ALTER TABLE impressoras
MODIFY COLUMN ultima_manutencao DATE NOT NULL DEFAULT '2025-06-23',
MODIFY COLUMN problema VARCHAR(255) NOT NULL DEFAULT 'Nenhum',
MODIFY COLUMN peca_utilizada VARCHAR(50) NOT NULL DEFAULT 'Nenhuma';

ALTER TABLE pecas
CHANGE COLUMN nome nome_peca VARCHAR(100) NOT NULL,
CHANGE COLUMN marca marca_peca ENUM('Samsung', 'HP') NOT NULL,
CHANGE COLUMN descricao descricao_peca TEXT;

-- UTF-8
ALTER TABLE impressoras CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
