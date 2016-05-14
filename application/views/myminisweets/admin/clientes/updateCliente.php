<div class="twelve wide column">
  <h2>Atualização do cadastro de cliente</h2>
  <div class="ui divider"></div>
  <br/>
  <div class="ui grid">
    <div class="four column centered row" id="flash-messages">
      <?php

      if($this->session->flashdata('updateOk')){
        echo '<div class="ui green label"><span>'.$this->session->flashdata('updateOk').'</span></div>';
      }
      if($this->session->flashdata('updateFail')){
        echo '<div class="ui green label"><span>'.$this->session->flashdata('updateFail').'</span></div>';
      }

      ?>
    </div>
  </div>
  <br/>
  <br/>
  <form class="ui form" action="<?php echo base_url('admin/Dashboard/updateCliente/'.$cliente->idclientes) ?>" method="post">
    <div class="field">
      <label>Nome</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="primeiro_nome" placeholder="Primeiro Nome" value="<?php echo set_value('primeiro_nome', $cliente->primeiro_nome); ?>">
          <br/>
          <br/>
          <?php echo form_error('primeiro_nome', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
        <div class="field">
          <input type="text" name="ultimo_nome" placeholder="Último Nome" value="<?php echo set_value('ultimo_nome', $cliente->ultimo_nome); ?>">
          <br/>
          <br/>
          <?php echo form_error('ultimo_nome', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
      </div>
      <div class="three fields">
        <div class="field">
          <label>CPF</label>
          <div class="field">
            <input type="text" name="cpf" placeholder="CPF" value="<?php echo set_value('cpf', $cliente->cpf); ?>" disabled>
            <br/>
            <br/>
            <?php echo form_error('cpf', '<div class="ui red label"><span>', '</span></div>'); ?>
          </div>
        </div>
        <div class="field">
          <label>Telefone Fixo</label>
          <div class="field">
            <input type="text" name="fixo" placeholder="Fixo" value="<?php echo set_value('fixo', $cliente->fixo); ?>">
            <br/>
            <br/>
            <?php echo form_error('fixo', '<div class="ui red label"><span>', '</span></div>'); ?>
          </div>
        </div>
        <div class="field">
          <label>Celular</label>
          <div class="field">
            <input type="text" name="celular" placeholder="Celular" value="<?php echo set_value('celular', $cliente->celular); ?>">
            <br/>
            <br/>
            <?php echo form_error('celular', '<div class="ui red label"><span>', '</span></div>'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="field">
      <label>Endereço de Entrega</label>
      <div class="fields">
        <div class="twelve wide field">
          <input type="text" name="rua" placeholder="Rua" value="<?php echo set_value('rua', $cliente->rua); ?>">
          <br/>
          <br/>
          <?php echo form_error('rua', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
        <div class="four wide field">
          <input type="text" name="num_casa" placeholder="Número" value="<?php echo set_value('num_casa', $cliente->num_casa); ?>">
          <br/>
          <br/>
          <?php echo form_error('num_casa', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
      </div>
      <div class="fields">
        <div class="eight wide field">
          <input type="text" name="bairro" placeholder="Bairro" value="<?php echo set_value('bairro', $cliente->bairro); ?>">
          <br/>
          <br/>
          <?php echo form_error('bairro', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
        <div class="eight wide field">
          <input type="text" name="complemento" placeholder="Complemento" value="<?php echo set_value('complemento', $cliente->complemento); ?>">
          <br/>
          <br/>
          <?php echo form_error('complemento', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
      </div>
      <div class="fields">
        <div class="eight wide field">
          <input type="text" name="cidade" placeholder="Cidade" value="<?php echo set_value('cidade', $cliente->cidade); ?>">
          <br/>
          <br/>
          <?php echo form_error('cidade', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
        <div class="four wide field">
          <input type="text" name="cep" placeholder="CEP" value="<?php echo set_value('cep', $cliente->cep); ?>">
          <br/>
          <br/>
          <?php echo form_error('cep', '<div class="ui red label"><span>', '</span></div>'); ?>
        </div>
      </div>
    </div>
    <div class="three fields">
      <div class="field">
        <label>Login</label>
        <input type="text" name="login" placeholder="Login" value="<?php echo set_value('login', $cliente->login); ?>" disabled>
        <br/>
        <br/>
        <?php echo form_error('login', '<div class="ui red label"><span>', '</span></div>'); ?>
      </div>
    </div>
    <input type="submit" class="ui grey button" tabindex="0" value="Atualizar Cadastro">
  </form>
  <br/>
  <a href="<?php echo base_url('admin/Dashboard/cadastroCliente') ?>"><button class="ui grey button" tabindex="0" value="voltar">Voltar</button></a>
