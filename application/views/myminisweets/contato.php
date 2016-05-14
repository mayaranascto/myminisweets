<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Site Oficial My Mini Sweets">
        <meta name="author" content="Lucas Albuquerque & Mayara Nascimento">

        <?php $this->load->view('templates/importscss') ?>

        <title>Home</title>
    </head>
    <body>
    <!-- Cabeçalho da Página -->
    <div id="header">
        <!-- //<?php //$this->load->view('templates/acesso') ?>//-->
        <div class="container">
            <!-- Menu inicial -->
            <div class="logo"><a href="<?php echo base_url('Welcome'); ?>"><img src="<?php echo base_url('assets/developer/imgs/logos/logo1.png'); ?>" alt="" /></a></div>
            <div class="mainmenu">
                <div id="mainmenu">
                    <ul class="sf-menu">
                        <li><a href="<?php echo base_url('Welcome'); ?>">Início</a></li>
                        <li><a href="<?php echo base_url('Geral/foodtruck'); ?>">Foodtruck</a></li>
                        <li><a href="<?php echo base_url('Geral/produtos'); ?>">Produtos</a></li>
                        <li><a href="<?php echo base_url('Geral/encomendas'); ?>">Encomendas</a></li>
                        <li><a href="<?php echo base_url('Geral/contato'); ?>" id="visited">Contato</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Menu inicial -->
        </div>
    </div>
    <!-- /Cabeçalho da Página -->

    <!-- Título My Mini Sweets Contato -->
    <div class="infobox">
        <div class="container info">
            <header>
                <h1>My Mini Sweets - Contato</h1>
                <p>Agora ficou muito mais fácil de nos encontrar!</p>
            </header>
            <hr class="separator">
        </div>
    </div>
    <!-- /Título My Mini Sweets Contato -->

    <!-- Google Maps -->
    <?php $this->load->view('templates/mapa') ?>
    <!-- Google Maps -->



    <!-- Informações da Página -->
    <div class="container contact">
        <!-- Endereço -->
        <div class="one_third">
            <h3>Endereço</h3>
            <section class="first shadow">
                <ul>
                    <li>Rua Onofre Sampaio Cavalcante, 333</li>
                    <li>Parque Manibura, 60821-820</li>
                    <li>Fortaleza - Ceará</li>
                    <li>Telefone: +55 85 3271-2006</li>
                    <li>Website: <a href="<?php echo base_url('Welcome'); ?>" title="">http://www.myminisweets.com.br</a></li>
                    <li>Email: <a href="#" title="">contato@myminisweets.com</a></li>
                </ul>
            </section>
        </div>
        <!-- /Endereço -->
        <div class="two_third lastcolumn contact1">
            <div id="contactForm">
                <h3>Escreva pra gente!</h3>
                <div class="sepContainer"></div>
                <form class="ui form" method="post" id="contact_form">
                    <div class="field">
                        <label for="name">Seu nome:</label>
                        <p> Por favor, preencha com o seu nome completo.</p>
                        <input id=name name=email type=text placeholder="ex. José Alberto" required />
                    </div>
                    <div class="field">
                        <label for="email">Seu E-mail:</label>
                        <p> Por favor, informe seu e-mail para contato.</p>
                        <input id=email name=email type=email placeholder="example@domain.com" required />
                    </div>
                    <div class="field">
                        <label for="message">Seua mensagem:</label>
                        <p> Por favor, escreva sobre o motivo do seu contato.</p>
                        <textarea id=message name=message rows=6 cols=10 required></textarea>
                    </div>
                    <div id="loader">
                        <input type="submit" value="Enviar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Informações da Página -->

    <!-- Redes Sociais -->
    <?php $this->load->view('templates/redessociais') ?>
    <!-- /Redes Sociais -->

    <!-- Rodapé da Página -->
    <?php $this->load->view('templates/rodape') ?>
    <!-- Rodapé da Página -->

    <!-- JAVASCRIPT -->
    <?php $this->load->view('templates/importsjs') ?>
    <!-- JAVASCRIPT -->
    </body>
</html>