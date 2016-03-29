alter table clientes rename endereco to rua

alter table clientes add column complemento VARCHAR

alter table clientes add column fixo VARCHAR

alter table clientes add column celular VARCHAR

select *from clientes