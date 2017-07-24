CREATE TABLE usuario (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  senha VARCHAR(150) NOT NULL,
  perfil ENUM('1','2','3') NULL DEFAULT '3',
  PRIMARY KEY (id)
);

CREATE TABLE contato (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(150) NOT NULL,
  email VARCHAR(150) NULL,
  telefone VARCHAR(11) NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_contato_usuario
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO usuario (nome, email, senha, perfil) VALUES ('master', 'master@master', 'master123', '3');
