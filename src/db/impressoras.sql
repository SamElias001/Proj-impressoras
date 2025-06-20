CREATE TABLE impressoras (
    id_imp INT AUTO_INCREMENT PRIMARY KEY,
    numero_de_serie VARCHAR(50) NOT NULL UNIQUE,
    setor VARCHAR(50) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    ultima_manutencao DATE,
    problema TEXT,
    peca_utilizada VARCHAR(50),
    status_de_conclusao ENUM('Pendente', 'Em andamento', 'Feito') NOT NULL DEFAULT 'Pendente',
    rede ENUM('Sim', 'Não') NOT NULL
);

CREATE TABLE pecas (
    id_peca INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    marca ENUM('Samsung', 'HP') NOT NULL,
    descricao TEXT
);

CREATE TABLE estoque (
    id_estoque INT AUTO_INCREMENT PRIMARY KEY,
    id_peca INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_peca) REFERENCES pecas(id_peca)
);
