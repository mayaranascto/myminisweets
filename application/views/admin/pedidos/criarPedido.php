<div class="twelve wide column">
  <h1>Criar Pedido</h1>
  <div class="ui divider"></div>
  <form class="ui form" action="<?php echo base_url('admin/Pedidos/criarPedidoA'); ?>" method="post">

      <div class="field">
        <label for="nome">Nome do Cliente</label>
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>">
        <br/>
        <br/>
        <?php echo form_error('nome', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
      <div class="field">
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" value="<?php echo set_value('endereco'); ?>">
        <br/>
        <br/>
        <?php echo form_error('endereco', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
      <div class="two fields">
        <div class="field">
          <label for="telefone">Telefone</label>
          <input type="text" name="telefone" value="<?php echo set_value('telefone'); ?>">
          <br/>
          <br/>
          <?php echo form_error('telefone', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
        <div class="field">
          <label for="email">E-mail</label>
          <input type="text" name="email" value="<?php echo set_value('email'); ?>">
          <br/>
          <br/>
          <?php echo form_error('email', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
      </div>
      <br/>
      <div class="ui action input">
        <button class="ui button">
          <i class="minus icon"></i>
        </button>
        <input type="text" value="">
        <button class="ui button">
          <i class="plus icon"></i>
        </button>
      </div>
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
