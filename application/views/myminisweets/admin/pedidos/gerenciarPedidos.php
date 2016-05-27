<div class="twelve wide column">
  <h1>Lista de Pedidos</h1>
  <div class="ui divider"></div>
  <br/>
  <div class="ui grid">
  <?php

    $tamplate = array(
      'table_open'  => '<table class="ui celled padded table">'
    );

    $this->table->set_template($tamplate);
    $this->table->set_heading('ID', 'Nome do Cliente', 'Email', 'Pedido');

    foreach ($pedidos as $linha){ ?>
      <?php
        $this->table->add_row($linha->id_pedidos_a, $linha->nome_cliente, $linha->email, anchor("admin/Pedidos/verItens/$linha->id_pedidos_a", '<button class="ui button">Ver Itens</button>'));
      ?>
    <?php }
    echo $this->table->generate();
    ?>
  </div>
</div>
