<div class="ui grid">
  <div class="ui container">
    <div class="row">
      <div class="wide column">
        <br/>
        <h2>Efetue seu cadastro</h2>
        <div class="ui divider"></div>
        <br/>
        <div class="ui grid">
          <div class="four column centered row">
            <?php

            //echo validation_errors('<div class="ui red label"><span>', '</span></div>');
            if($this->session->flashdata('cadastroOk')){
              echo '<div class="ui green label"><span>'.$this->session->flashdata('cadastroOk').'</span></div>';
            }
            if($this->session->flashdata('cadastroFail')){
              echo '<div class="ui green label"><span>'.$this->session->flashdata('cadastroFail').'</span></div>';
            }

            ?>
          </div>
        </div>
        <br/>
        <form class="ui form" action="<?php echo base_url('Clientes/cadastroCliente') ?>" method="post">
          <div class="field">
            <label>Nome</label>
            <div class="two fields">
              <div class="field">
                <input type="text" name="primeiro_nome" placeholder="Primeiro Nome" value="<?php echo set_value('primeiro_nome'); ?>">
                <br/>
                <br/>
                <?php echo form_error('primeiro_nome', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
              <div class="field">
                <input type="text" name="ultimo_nome" placeholder="Último Nome" value="<?php echo set_value('ultimo_nome'); ?>">
                <br/>
                <br/>
                <?php echo form_error('ultimo_nome', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
            </div>
            <div class="three fields">
              <div class="field">
                <label>CPF</label>
                <div class="field">
                  <input type="text" name="cpf" placeholder="CPF" value="<?php echo set_value('cpf'); ?>">
                  <br/>
                  <br/>
                  <?php echo form_error('cpf', '<div class="ui red label"><span>', '</span></div>'); ?>
                </div>
              </div>
              <div class="field">
                <label>Telefone Fixo</label>
                <div class="field">
                  <input type="text" name="fixo" placeholder="Fixo" value="<?php echo set_value('fixo'); ?>">
                  <br/>
                  <br/>
                  <?php echo form_error('fixo', '<div class="ui red label"><span>', '</span></div>'); ?>
                </div>
              </div>
              <div class="field">
                <label>Celular</label>
                <div class="field">
                  <input type="text" name="celular" placeholder="Celular" value="<?php echo set_value('celular'); ?>">
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
                <input type="text" name="rua" placeholder="Rua" value="<?php echo set_value('rua'); ?>">
                <br/>
                <br/>
                <?php echo form_error('rua', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
              <div class="four wide field">
                <input type="text" name="num_casa" placeholder="Número" value="<?php echo set_value('num_casa'); ?>">
                <br/>
                <br/>
                <?php echo form_error('num_casa', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
            </div>
            <div class="fields">
              <div class="eight wide field">
                <input type="text" name="bairro" placeholder="Bairro" value="<?php echo set_value('bairro'); ?>">
                <br/>
                <br/>
                <?php echo form_error('bairro', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
              <div class="eight wide field">
                <input type="text" name="complemento" placeholder="Complemento" value="<?php echo set_value('complemento'); ?>">
                <br/>
                <br/>
                <?php echo form_error('complemento', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
            </div>
            <div class="fields">
              <div class="eight wide field">
                <input type="text" name="cidade" placeholder="Cidade" value="<?php echo set_value('cidade'); ?>">
                <br/>
                <br/>
                <?php echo form_error('cidade', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
              <div class="four wide field">
                <input type="text" name="cep" placeholder="CEP" value="<?php echo set_value('cep'); ?>">
                <br/>
                <br/>
                <?php echo form_error('cep', '<div class="ui red label"><span>', '</span></div>'); ?>
              </div>
            </div>
          </div>
          <div class="three fields">
            <div class="field">
              <label>Login</label>
              <input type="text" name="login" placeholder="Login" value="<?php echo set_value('login'); ?>">
              <br/>
              <br/>
              <?php echo form_error('login', '<div class="ui red label"><span>', '</span></div>'); ?>
            </div>
            <div class="field">
              <label>Senha</label>
              <input type="password" name="senha" placeholder="Senha">
              <br/>
              <br/>
              <?php echo form_error('senha', '<div class="ui red label"><span>', '</span></div>'); ?>
            </div>
            <div class="field">
              <label>Repita a Senha</label>
              <input type="password" name="repita_senha" placeholder="Repita a Senha">
              <br/>
              <br/>
              <?php echo form_error('repita_senha', '<div class="ui red label"><span>', '</span></div>'); ?>
            </div>
          </div>
          <input type="submit" class="ui grey button" tabindex="0" value="Finalizar Cadastro">
        </form>
        <br/>
      </div>
    </div>
  </div>
</div>
