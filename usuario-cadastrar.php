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
         <?php
            include './cruds/conexao.php';
            include './cruds/validacao.php';
            session_start();
        if (!isLoggedIn()) {
            header('Location: ./acessar.php');
        }
        ?>  
        <header id="header">
            <a class="logo" href="index.html">Toten</a>
            <nav>
                <a href="#menu">Menu</a>
            </nav>
        </header>

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li style="color: lawngreen"><?php echo strtoupper($_SESSION['nome']);?></li>
                <li><a href="index.html">Página Inicial</a></li>
                <?php if ($_SESSION['nivel']==2){?>
                    <li><a href="usuario-lista.php">Listar Usuário</a></li>
                <?php } ?>
                <li><a href="ticket-lista.php">Acompanhar Tickets</a></li>
                <li><a href="cruds/logout.php">Sair</a></li>
            </ul>
        </nav>

        <!-- Heading 
        <div id="heading" >
            <img src="images/toten.png" alt="Toten" width="40%" height="40%">
        </div>-->

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="inner">
                <div class="content">
                    <header>
                        <h2>Cadastrar Usuário</h2>
                        <?php if($_SESSION['nivel']<2){
                                echo "<h3 style='color: red'>Você não tem permissão para acessar essa página</h3>";
                              }else{?>
                    </header>
                        <div>
                            <?php 
                                if (isset($_GET["sucesso"])) {?>
                                    <h5 style="background-color: lightgreen; color: green">Usuário cadastrado com sucesso</h5>
                            <?php } ?>
                        </div>      
                    <form action="./cruds/tratar-tickets.php?opcao=inserirUsuario" method="post">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                        </div> <br>
                            <div class="form-group">
                            <label for="nome">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="descricao">Empresa:</label>
                            <input type="text" class="form-control" name="empresa" placeholder="Empresa" required>
                        </div><br>
                        <div class="form-group">
                            <label for="nome">Usuário:</label>
                            <input type="text" class="form-control" name="usuario" placeholder="Nome de Usuário" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="nome">Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Senha de Acesso  " required>
                        </div> <br>                    
                        <div class="form-group">
                        <label for="nivel">Tipo de Usuário:</label>
                            <select class="form-control" name="nivel" required>
                                <option value="" disabled selected>Tipo de Usuário</option>
                                <option value="1">Cliente</option>
                                <option value="2">Administrador</option>
                            </select>
                            
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Abrir</button> <br><br>
                        </div>
                    </form>

                </div>
                    <?php }?>
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