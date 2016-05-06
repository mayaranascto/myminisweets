    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/semantic/semantic.min.js'); ?>"></script>

    <script>
      $('.ui.dropdown').dropdown();

      $(document).ready(function() {
       setTimeout($("#flash-messages").fadeOut(4000));
       // the function you called by setTimeout must not be a string.
      });

      $(document).on("click", ".show", function () {
          $(".ui.modal").modal("setting", {
              closable: false,
              onApprove: function () {
                  return false;
              }
          }).modal("show");
      }).on("click", ".ui.button", function () {
          switch ($(this).data("value")) {
          case 'easy':
              $("#result").html("easy");
              $(".ui.modal").modal("hide");
              break;
          case 'normal':
              $("#result").html("normal");
              $(".ui.modal").modal("hide");
              break;
          case 'hard':
              $("#result").html("hard");
              $(".ui.modal").modal("hide");
              break;
          }
      });

      function buscaProduto() {
        var produto = document.getElementById("search").value;

        $.ajax({
          method: "POST",
          url: "http://localhost/myminisweets/admin/Pedidos/pesquisarProdutoJson",
          data: { busca: produto }
        }).done(function( data ) {
          var produtos = JSON.parse(data);
          var html = '';
          if(!produtos.length){
            html += '<tr><td colspan="2">Não existe dados a serem mostrados</td></tr>';
          }else{
            for(var i = 0; i< produtos.length; i++){
              html += '<tr><td>' + produtos[i].idprodutos + '</td><td>' + produtos[i].nome_produto + '</td><td>' + produtos[i].preco + '</td><td><a href="<?php echo base_url("admin/Pedidos/addProduto/"); ?>/'+produtos[i].idprodutos+'"><button>Add</button></a></td></tr>';
            }
          }
          $('#table_busca_produto tr').not(':first').remove();
          $('#table_busca_produto tr').first().after(html);
        });
      };


    </script>

  </body>
</html>
