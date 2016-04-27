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
    </script>

  </body>
</html>
