<br/>
<br/>
<h2>Lista de Produtos</h2>
<br/>
  <?php

    $tamplate = array(
      'table_open'  => '<table class="ui celled padded table">'
    );

    $this->table->set_template($tamplate);

    $this->table->set_heading('Nome do Produto', 'Descrição', 'Preço', 'Ações');
    foreach ($produtos as $linha) {
      $this->table->add_row(anchor('admin/Dashboard/verProduto/'.$linha->idprodutos, $linha->nome_produto), $linha->descricao, 'R$ '.$linha->preco, anchor('admin/Dashboard/updateProduto/'.$linha->idprodutos, '<center><button class="ui green button"><i class="write icon"></i></button>').' '.anchor('admin/Dashboard/deleteProduto/'.$linha->idprodutos, '<button class="ui red button"><i class="remove user icon"></i></button></center>'));
    }

    echo $this->table->generate();
  ?>
<br/>
</div>
</div>
</div>
</div>
