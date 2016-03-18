CREATE TABLE Produtos (
  idProdutos SERIAL NOT NULL,
  nome_produto VARCHAR(150) NULL,
  descricao TEXT NULL,
  preco NUMERIC(8,2) NULL,
  img_url VARCHAR NULL,
  PRIMARY KEY(idProdutos)
);

CREATE TABLE Clientes (
  idClientes SERIAL NOT NULL,
  primeiro_nome VARCHAR(150) NULL,
  ultimo_nome VARCHAR(150) NULL,
  cpf VARCHAR(15) NULL,
  endereco VARCHAR(250) NULL,
  bairro VARCHAR(100) NULL,
  num_casa VARCHAR(10) NULL,
  cep VARCHAR(10) NULL,
  cidade VARCHAR(100) NULL,
  login VARCHAR(150) NULL,
  senha VARCHAR(50) NULL,
  PRIMARY KEY(idClientes)
);

CREATE TABLE session (
  idsession SERIAL NOT NULL,
  Clientes_idClientes SERIAL NOT NULL,
  login VARCHAR(150) NULL,
  senha VARCHAR(50) NULL,
  chave VARCHAR NULL,
  PRIMARY KEY(idsession),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pedidos (
  idpedidos SERIAL NOT NULL,
  Clientes_idClientes SERIAL NOT NULL,
  num_pedido SERIAL NULL,
  PRIMARY KEY(idpedidos),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pedidos_has_Produtos (
  pedidos_idpedidos SERIAL NOT NULL,
  Produtos_idProdutos SERIAL NOT NULL,
  PRIMARY KEY(pedidos_idpedidos, Produtos_idProdutos),
  FOREIGN KEY(pedidos_idpedidos)
    REFERENCES pedidos(idpedidos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Produtos_idProdutos)
    REFERENCES Produtos(idProdutos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


