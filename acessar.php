<!DOCTYPE HTML>
<!--
        Industrious by TEMPLATED
        templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Toten</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="is-preload">

        <!-- Header -->
        <header id="header">
            <a class="logo" href="index.html">Toten</a>
            <!-- <nav>
                <a href="#menu">Menu</a>
            </nav>-->
        </header>

        <!-- Nav 
        <nav id="menu">
            <ul class="links">
                <li><a href="index.html">Home</a></li>
                <li><a href="elements.html">Elements</a></li>
                <li><a href="generic.html">Generic</a></li>
            </ul>
        </nav> -->

        <!-- Heading 
        <div id="heading" >
            <h1>Área do cliente</h1>
        </div>-->

        <?php
        require_once './cruds/validacao.php';
        session_start();
        if (isLoggedIn()) {
            header('Location: ./ticket-lista.php');
        }
        ?>

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="inner">
                <div class="content">
                    <header>
                        <h4>Fazer login</h4>
                    </header>
                        <div>
                            <?php 
                                if (isset($_GET["erro"])) {?>
                                    <h5 style="color: red">login ou senha incorretos</h5>
                            <?php } ?>
                        </div>
                    <form action="./cruds/validacao.php" method="post">
                        <div class="form-group" align="">
                            <label for="usuario">Usuário:</label>
                            <input type="text" class="form-control" name="usuario" placeholder="Digite seu nome de usuario" style="width: 320px">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" style="width: 320px">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="logar" value="Entrar" class="btn btn-default"> <br><br>
                        </div>

                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <div class="content">
                    <section>
                        <h3>Accumsan montes viverra</h3>
                        <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
                    </section>
                    <section>
                        <h4>Sem turpis amet semper</h4>
                        <ul class="alt">
                            <li><a href="#">Dolor pulvinar sed etiam.</a></li>
                            <li><a href="#">Etiam vel lorem sed amet.</a></li>
                            <li><a href="#">Felis enim feugiat viverra.</a></li>
                            <li><a href="#">Dolor pulvinar magna etiam.</a></li>
                        </ul>
                    </section>
                    <section>
                        <h4>Magna sed ipsum</h4>
                        <ul class="plain">
                            <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                            <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                            <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                            <li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
                        </ul>
                    </section>
                </div>
                <div class="copyright">
                    &copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>