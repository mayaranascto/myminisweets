CREATE TABLE "ci_sessions" (
        "id" varchar(40) NOT NULL,
        "ip_address" varchar(45) NOT NULL,
        "timestamp" bigint DEFAULT 0 NOT NULL,
        "data" text DEFAULT '' NOT NULL
);

CREATE INDEX "ci_sessions_timestamp" ON "ci_sessions" ("timestamp");

CREATE TABLE Clientes (
  idClientes SERIAL NOT NULL,
  nome_cliente VARCHAR NULL,
  cpf INT NULL,
  endereco VARCHAR NULL,
  bairro VARCHAR NULL,
  num_casa VARCHAR NULL,
  cep VARCHAR NULL,
  cidade VARCHAR NULL,
  login VARCHAR(150) NULL,
  senha VARCHAR NULL,
  PRIMARY KEY(idClientes)
);

alter table clientes rename endereco to rua;

alter table clientes add column complemento VARCHAR;

alter table clientes add column fixo VARCHAR;

alter table clientes add column celular VARCHAR;

alter table clientes rename nome_cliente to primeiro_nome;
alter table clientes add column ultimo_nome VARCHAR;

select * from clientes
select * from produtos

alter table produtos add column categoria VARCHAR;

alter table clientes alter column idClientes type SERIAL;
alter table clientes drop column idClientes;
alter table clientes add column idClientes SERIAL NOT NULL;

delete from clientes

alter table clientes add CONSTRAINT clientes_pkey PRIMARY KEY (idclientes);

CREATE TABLE Produtos (
  idProdutos SERIAL NOT NULL,
  nome_produto VARCHAR NULL,
  descricao VARCHAR NULL,
  preco decimal NULL,
  img_url VARCHAR NULL,
  PRIMARY KEY(idProdutos)
);
