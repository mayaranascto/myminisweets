<div class="twelve wide column">
  <h2>Atualizar Produto</h2>
  <div class="ui divider"></div>
  <br/>

  <form class="ui form" action="<?php echo base_url('admin/Dashboard/updateProduto/'.$produto->idprodutos) ?>" method="post" enctype="multipart/form-data">
    <div class="two fields">
      <div class="field">
        <label>Nome do Produto</label>
        <input type="text" name="nome_produto" placeholder="Nome" value="<?php echo set_value('nome_produto', $produto->nome_produto); ?>">
        <br/>
        <br/>
        <?php echo form_error('nome_produto', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
      <div class="field">
        <label>Categoria</label>
        <input type="text" name="categoria" placeholder="Categoria" value="<?php echo set_value('categoria', $produto->categoria); ?>">
        <br/>
        <br/>
        <?php echo form_error('categoria', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
    </div>
    <div class="field">
      <label>Descrição do Produto</label>
      <div class="field">
        <input type="text" name="descricao" placeholder="Descrição" value="<?php echo set_value('descricao', $produto->descricao); ?>">
        <br/>
        <br/>
        <?php echo form_error('descricao', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
    </div>
    <div class="fields">
      <div class="seven wide field">
        <label>Preço</label>
        <div class="ui labeled input">
          <div class="ui label">$</div>
          <input type="text" name="preco" placeholder="Preço" value="<?php echo set_value('preco', $produto->preco); ?>">
        </div>
      </div>
      <div class="eight wide field">
        <label>Imagem do Produto</label>
        <div class="ui input">
          <input type="file" id="img_url" name="img_url" value="">
        </div>
      </div>
    </div>
    <?php echo form_error('preco', '<div class="ui red label"><span>', '</span></div>'); ?>
    <br/>
    <br/>
    <?php echo form_error('img_url', '<div class="ui red label"><span>', '</span></div>'); ?>
    <input type="submit" class="ui grey button" value="Atualizar Cadastro">
  </form>
  <br/>
  <a href="<?php echo base_url('admin/Dashboard/cadastroProduto'); ?>"><button class="ui grey button">Voltar</button></a>
