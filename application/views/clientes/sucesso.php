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
