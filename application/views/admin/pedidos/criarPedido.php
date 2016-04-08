<div class="twelve wide column">
  <h1>Criar Pedido</h1>
  <div class="ui divider"></div>
  <form class="ui form" action="<?php echo base_url('admin/Pedidos/criarPedido'); ?>" method="post">

      <div class="field">
        <label for="nome">Nome do Cliente</label>
        <input type="text" name="nome" value="">
      </div>
      <div class="field">
        <label for="nome">Endereço</label>
        <input type="text" name="endereco" value="">
      </div>
      <div class="two fields">
        <div class="field">
          <label for="nome">Telefone</label>
          <input type="text" name="telefone" value="">
        </div>
        <div class="field">
          <label for="nome">E-mail</label>
          <input type="text" name="email" value="">
        </div>
      </div>
      <br/>
      <?php

        $tamplate = array(
          'table_open'  => '<table class="ui celled padded table">'
        );

        $this->table->set_template($tamplate);

        $this->table->set_heading('Nome do Produto', 'Descrição', 'Preço', 'Quantidade', 'Comprar');
        foreach ($produtos as $linha) {
          $this->table->add_row(anchor('admin/Telas/verProduto/'.$linha->idprodutos, $linha->nome_produto), $linha->descricao, 'R$ '.$linha->preco, '<input type="text" name="quant_'.$linha->nome_produto.'">', '<div class="ui left floated compact segment"><div class="ui fitted toggle checkbox"><input type="checkbox" name="'.$linha->nome_produto.'"><label></label></div></div>');
        }

        echo $this->table->generate();
      ?>

      <button type="input" class="ui grey button" value="Finalizar Pedido">Finalizar Pedido</button>

  </form>
</div>
