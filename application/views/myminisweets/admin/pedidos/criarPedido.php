<div class="twelve wide column">
  <h1>Criar Pedido</h1>
  <div class="ui divider"></div>
  <form class="ui form" action="<?php echo base_url('admin/Pedidos/criarPedidoA'); ?>" method="post">
  <div class="ui grid">
    <div class="four column centered row" id="flash-messages">
      <?php

        if($this->session->flashdata('pedidoOk')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('pedidoOk').'</span></div>';
        }elseif($this->session->flashdata('pedidoFail')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('pedidoFail').'</span></div>';
        }

      ?>
    </div>
  </div>
    <br/>
      <div class="field">
        <label for="nome">Nome do Cliente</label>
        <input type="text" name="nome_cliente" value="<?php echo set_value('nome_cliente'); ?>">
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
      <div class="ui animated fade button show" tabindex="0">
        <div class="visible content">Pesquisar Produto</i></div>
        <div class="hidden content"><i class="search icon"></i></div>
      </div>
      <?php

        $tamplate = array(
          'table_open'  => '<table class="ui celled padded table">'
        );

        $this->table->set_template($tamplate);

        $this->table->set_heading('Nome do Produto', 'Descrição', 'Preço', 'Quantidade');
        if($pedido != NULL){
          foreach ($pedido as $linha) {
            $this->table->add_row($linha->nome_produto, $linha->descricao, 'R$ '.$linha->preco, '<input size="5" type="text" name="quantidade[]"><input type="text" name="Produtos_idProdutos[]" value="'.$linha->idprodutos.'" hidden>');
          }
        }

        echo $this->table->generate();
      ?>

      <button type="input" class="ui grey button" value="Finalizar Pedido">Finalizar Pedido</button>

  </form>
  <form class="ui form" action="<?php echo base_url('admin/Pedidos/pesquisarProduto'); ?>" method="post">
    <div class="ui modal">
      <i class="close icon"></i>
      <div class="header">
        Escreva o nome do produto desejado
      </div>
      <div class="content">
        <div class="ui fluid icon input">
          <input type="text" name="search" id="search" placeholder="" value="<?php echo set_value('nome'); ?>">
          <button class="purple ui button" onclick="buscaProduto()"><i class="white search icon"></i></button>
        </div>
        <div>
          <table class="ui celled padded table" id="table_busca_produto">
            <tr>
              <th>
                ID
              </th>
              <th>
                Nome do produto
              </th>
              <th>
                Preço
              </th>
              <th>
                Adicionar
              </th>
            </tr>
          </table>
        </div>
        <br/>
      </div>
      <div class="actions">
        <button class="ui button">Cancel</button>
      </div>
    </div>
  </form>
</div>
