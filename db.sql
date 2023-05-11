USE database;

CREATE TABLE login (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  login_id INT,
  nome VARCHAR(100) NOT NULL,
  cpf VARCHAR(14) NOT NULL,
  data_nascimento DATE NOT NULL,
  sexo VARCHAR(20) NOT NULL,
  estado_civil VARCHAR(20) NOT NULL,
  escolaridade VARCHAR(50) NOT NULL,
  FOREIGN KEY (login_id) REFERENCES login(id)
);

CREATE TABLE curriculos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  pretensao_salarial DECIMAL(10,2) NOT NULL,
  data_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE cursos_especializacoes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  instituicao VARCHAR(100) NOT NULL,
  data_inicio DATE NOT NULL,
  data_conclusao DATE NOT NULL
);

CREATE TABLE curriculos_cursos (
  curriculo_id INT NOT NULL,
  curso_id INT NOT NULL,
  FOREIGN KEY (curriculo_id) REFERENCES curriculos(id),
  FOREIGN KEY (curso_id) REFERENCES cursos_especializacoes(id)
);

CREATE TABLE experiencias_profissionais (
  id INT PRIMARY KEY AUTO_INCREMENT,
  cargo VARCHAR(100) NOT NULL,
  empresa VARCHAR(100) NOT NULL,
  data_inicio DATE NOT NULL,
  data_saida DATE,
  descricao TEXT
);

CREATE TABLE curriculos_experiencias (
  curriculo_id INT NOT NULL,
  experiencia_id INT NOT NULL,
  FOREIGN KEY (curriculo_id) REFERENCES curriculos(id),
  FOREIGN KEY (experiencia_id) REFERENCES experiencias_profissionais(id)
);
