<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/myico.ico">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/dimenssoes.css">
    <link rel="stylesheet" type="text/css" href="css/texto.css">
    <link rel="stylesheet" type="text/css" href="css/logos.css">

    <link rel="stylesheet" type="text/css" href="css/site.css">

    <link rel="stylesheet" type="text/css" href="css/divider.css">
    <link rel="stylesheet" type="text/css" href="css/segment.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/list.css">
    <link rel="stylesheet" type="text/css" href="css/message.css">
    <link rel="stylesheet" type="text/css" href="css/icon.css">

    <script src="js/semantic.min.js"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/transition.js"></script>
    <script src="js/validalogin.js"></script>

    <title>Login</title>
</head>
<body>

    <div class="ui container">
        <div class="ui secondary pointing menu white">
            <a href="index.html" class="active item">Início </a>
            <a class="item">Quem Somos </a>
            <a class="item">Amigos </a>
        </div>
    </div>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <!-- <img src="img/logo.png" class="image"> -->
                <div class="textoCabecalho">
                    Efetue seu login
                </div>
            </h2>
            <form class="ui large form" method="post" action="cadastro.html">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="Seu e-mail">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Sua senha">
                        </div>
                    </div>
                    <div class="ui fluid large violet submit button">Entrar</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                Ainda não possui cadastro? <a href="cadastro.html">Cadastre-se</a>
            </div>
        </div>
    </div>
</body>
</html>