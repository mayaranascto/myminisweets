<div class="ui middle aligned center aligned grid">
    <div class="column" style="max-width: 450px;">
        <!--<h2 class="ui violet image header">
            <img src="<?php echo base_url('assets/developer/imgs/logos/logo1.png'); ?>" class="image">
            <div class="content">
                Entre com sua conta de e-mail
            </div>
        </h2>-->
        <form class="ui large form" action="<?php echo base_url('admin/Login/autentica'); ?>" method="post">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="login" placeholder="Seu e-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="senha" placeholder="Sua senha">
                    </div>
                </div>
                <input type="submit" class="ui fluid large violet submit button" value="Login">
                <br/>
                <?php
                    if($this->session->flashdata('loginFail')){
                        echo '<div class="ui red label"><span>'.$this->session->flashdata('loginFail').'</span></div>';
                    }
                ?>
            </div>
            <div class="ui error message"></div>
        </form>
        <div class="ui message">
            Ainda não possúi login? <a href="<?php echo base_url('Geral/cadastro'); ?>">Cadastre-se</a>
        </div>
    </div>
</div>