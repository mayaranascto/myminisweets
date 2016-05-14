<div class="twelve wide column">
  <h2>Cadastro de Produtos</h2>
  <div class="ui divider"></div>
  <br/>
  <div class="ui grid">
    <div class="four column centered row" id="flash-messages">
      <?php

        if($this->session->flashdata('cadastroOk')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('cadastroOk').'</span></div>';
        }elseif($this->session->flashdata('cadastroFail')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('cadastroFail').'</span></div>';
        }

      ?>
    </div>
  </div>
  <br/>

  <form class="ui form" action="<?php echo base_url('admin/Dashboard/cadastroProduto') ?>" method="post" enctype="multipart/form-data">
    <div class="two fields">
      <div class="field">
        <label>Nome do Produto</label>
        <input type="text" name="nome_produto" placeholder="Nome">
        <br/>
        <br/>
        <?php echo form_error('nome_produto', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
      <div class="field">
        <label>Categoria</label>
        <input type="text" name="categoria" placeholder="Categoria">
        <br/>
        <br/>
        <?php echo form_error('categoria', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
    </div>
    <div class="field">
      <label>Descrição do Produto</label>
      <div class="field">
        <input type="text" name="descricao" placeholder="Descrição">
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
          <input type="text" name="preco" placeholder="Preço">
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
    <br/>
    <br/>
    <input type="submit" class="ui grey button" value="Finalizar Cadastro">
  </form>
  <br/>
  <div class="ui grid">
    <div class="four column centered row" id="flash-messages">
      <?php

        if($this->session->flashdata('updateOk')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('updateOk').'</span></div>';
        }elseif($this->session->flashdata('updateFail')){
          echo '<div class="ui red label"><span>'.$this->session->flashdata('updateFail').'</span></div>';
        }
        if($this->session->flashdata('deleteOk')){
          echo '<div class="ui green label"><span>'.$this->session->flashdata('deleteOk').'</span></div>';
        }elseif($this->session->flashdata('deleteFail')){
          echo '<div class="ui red label"><span>'.$this->session->flashdata('deleteFail').'</span></div>';
        }

      ?>
    </div>
  </div>
