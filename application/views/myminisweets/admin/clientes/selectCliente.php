  <br/>
  <br/>
  <h2>Lista de Clientes</h2>
  <div class="ui divider"></div>
  <br/>
    <?php

      $tamplate = array(
        'table_open'  => '<table class="ui celled padded table">'
      );

      $this->table->set_template($tamplate);

      $this->table->set_heading('ID', 'Nome do cliente','Login','Telefone Fixo', 'Celular', 'CPF', 'Endereço', 'Ações');
      foreach ($clientes as $linha) {
        $this->table->add_row($linha->idclientes, $linha->primeiro_nome.' '.$linha->ultimo_nome, $linha->login, $linha->fixo, $linha->celular, $linha->cpf, $linha->rua.' - '.$linha->num_casa.' - '.$linha->bairro.' - '.$linha->complemento, anchor("admin/Dashboard/updateCliente/$linha->idclientes", '<button class="ui green button"><i class="write icon"></i></button>').' '.anchor("admin/Dashboard/deleteCliente/$linha->idclientes", '<button class="ui red button"><i class="remove user icon"></i></button>'));
      }

      echo $this->table->generate();
    ?>

</div>
</div>
</div>
</div>
