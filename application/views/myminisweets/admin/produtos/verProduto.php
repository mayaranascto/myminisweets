<div class="twelve wide column">
  <h2><?php echo $produto->nome_produto;?></h2>
  <div class="ui divider"></div>
  <br/>
  <br/>
  <div class="ui grid">
    <div class="six wide">
      <?php
        echo img(base_url('assets/developer/imgs/produtosbd/'.$produto->img_url));
      ?>
    </div>
    <div class="six wide">
      <?php
        echo '<h3>'.$produto->descricao.'</h3>';
        echo '<p>'.$produto->preco.'</p>';
      ?>
      <br/>
      <button class="ui red button">Comprar</button>
    </div>


  </div>
</div>
