<div class="twelve wide column">
  <form action="<?php echo base_url('admin/Dashboard/deleteProduto/'.$produto->idprodutos) ?>" method="post">
    <h3>Tem certeza que deseja excluir o cliente <?php echo $produto->nome_produto; ?></h3>
    <input type="submit" class="ui grey button" tabindex="0" name="sim" value="Sim">
    <input type="submit" class="ui grey button" tabindex="0" name="nao" value="Não">
  </form>
</div>
