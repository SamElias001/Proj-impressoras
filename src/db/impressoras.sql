-- Apenas estrutura do banco de dados para o sistema de impressoras
-- Banco de dados em Xampp

CREATE TABLE impressoras (
    id_imp INT AUTO_INCREMENT PRIMARY KEY,
    numero_de_serie VARCHAR(50) NOT NULL UNIQUE,
    setor VARCHAR(50) NOT NULL,
    marca ENUM('Samsung', 'HP', 'Epson') NOT NULL,
    ultima_manutencao DATE NOT NULL DEFAULT '2025-06-23',
    problema TEXT NOT NULL DEFAULT 'Nenhuma',
    peca_utilizada VARCHAR(50) NOT NULL DEFAULT 'Nenhuma',
    status_de_conclusao ENUM('Pendente', 'Em andamento', 'Feito') NOT NULL DEFAULT 'Pendente',
    rede ENUM('Sim', 'Não') NOT NULL
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
INSERT INTO impressoras (numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede)
VALUES ('ZDEJB07M646436P', 'Elz_M - Enferm', 'Samsung', '2025-06-04', 'Troca de Toner', 'Toner', 'Feito', 'Sim');

INSERT INTO impressoras (numero_de_serie, setor, marca, ultima_manutencao, problema, peca_utilizada, status_de_conclusao, rede)
VALUES ('ZDDPB07M415MZPR', 'Serviço Social', 'Samsung', '2025-06-05', 'Usuario do Scanner', '', 'Feito', 'Sim');

-- Alterar banco antigo
ALTER TABLE impressoras
MODIFY COLUMN marca ENUM('Samsung', 'HP', 'Epson') NOT NULL;

ALTER TABLE impressoras
MODIFY COLUMN ultima_manutencao DATE NOT NULL DEFAULT '2025-06-23',
MODIFY COLUMN problema VARCHAR(255) NOT NULL DEFAULT 'Nenhuma',
MODIFY COLUMN peca_utilizada VARCHAR(50) NOT NULL DEFAULT 'Nenhuma';

ALTER TABLE pecas
CHANGE COLUMN nome nome_peca VARCHAR(100) NOT NULL,
CHANGE COLUMN marca marca_peca ENUM('Samsung', 'HP') NOT NULL,
CHANGE COLUMN descricao descricao_peca TEXT;

-- UTF-8
ALTER TABLE impressoras CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;