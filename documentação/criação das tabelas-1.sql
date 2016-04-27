CREATE TABLE pedidos_avulsos (
  id_pedidos_a SERIAL NOT NULL,
  nome_cliente VARCHAR NULL,
  endereco VARCHAR NULL,
  telefone INTEGER NULL,
  email VARCHAR NULL,
  PRIMARY KEY(id_pedidos_a)
);

CREATE TABLE Produtos (
  idProdutos SERIAL NOT NULL,
  nome_produto VARCHAR NULL,
  descricao VARCHAR NULL,
  preco DOUBLE NULL,
  img_url VARCHAR NULL,
  PRIMARY KEY(idProdutos)
);

CREATE TABLE Clientes (
  idClientes SERIAL NOT NULL,
  nome_cliente VARCHAR NULL,
  cpf INT NULL,
  endereco VARCHAR NULL,
  bairro VARCHAR NULL,
  num_casa VARCHAR NULL,
  cep VARCHAR NULL,
  cidade VARCHAR NULL,
  login VARCHAR() NULL,
  senha VARCHAR NULL,
  PRIMARY KEY(idClientes)
);

CREATE TABLE session (
  idsession INT NOT NULL,
  Clientes_idClientes SERIAL NOT NULL,
  login VARCHAR NULL,
  senha VARCHAR NULL,
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
  num_pedido INT NULL,
  PRIMARY KEY(idpedidos),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE itens (
  pedidos_avulsos_id_pedidos_a SERIAL NOT NULL,
  Produtos_idProdutos SERIAL NOT NULL,
  PRIMARY KEY(pedidos_avulsos_id_pedidos_a, Produtos_idProdutos),
  FOREIGN KEY(pedidos_avulsos_id_pedidos_a)
    REFERENCES pedidos_avulsos(id_pedidos_a)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Produtos_idProdutos)
    REFERENCES Produtos(idProdutos)
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


