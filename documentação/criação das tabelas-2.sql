CREATE TABLE pedidos_avulsos (
  id_pedidos_a SERIAL NOT NULL,
  nome_cliente VARCHAR NULL,
  endereco VARCHAR NULL,
  telefone VARCHAR NULL,
  email VARCHAR NULL,
  PRIMARY KEY(id_pedidos_a)
);

CREATE TABLE Produtos (
  idProdutos INT NOT NULL,
  nome_produto VARCHAR NULL,
  descricao VARCHAR NULL,
  preco DOUBLE NULL,
  img_url VARCHAR NULL,
  PRIMARY KEY(idProdutos)
);

CREATE TABLE Clientes (
  idClientes INT NOT NULL,
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
  Clientes_idClientes INT NOT NULL,
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
  idpedidos INT NOT NULL,
  Clientes_idClientes INT NOT NULL,
  num_pedido INT NULL,
  PRIMARY KEY(idpedidos),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE itens (
  Produtos_idProdutos INT NOT NULL,
  pedidos_avulsos_id_pedidos_a SERIAL NOT NULL,
  PRIMARY KEY(Produtos_idProdutos, pedidos_avulsos_id_pedidos_a),
  FOREIGN KEY(Produtos_idProdutos)
    REFERENCES Produtos(idProdutos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(pedidos_avulsos_id_pedidos_a)
    REFERENCES pedidos_avulsos(id_pedidos_a)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pedidos_has_Produtos (
  pedidos_idpedidos INT NOT NULL,
  Produtos_idProdutos INT NOT NULL,
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


