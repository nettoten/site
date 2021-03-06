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
                        <h2>Abrir novo ticket</h2>
                    </header>      
                        <table>
                        <thead class='thead-dark'>                                                                   
                            <tr>
                                <th scope='col' style="font-size: 1rem;font-weight: 600;">Nome</th></tr></thead>
                        <tbody><td><?php echo $_SESSION['nome']; ?></td> </tbody>
                        </table>
                        <table>
                        <thead class='thead-dark'>                                                                   
                            <tr>
                                <th scope='col'style="font-size: 1rem;font-weight: 600;">Email</th></tr></thead>
                        <tbody><td><?php echo $_SESSION['email']; ?></td> </tbody>
                        </table>
                    <form action="./cruds/tratar-tickets.php?opcao=inserir" method="post">
                        <div class="form-group">
                            <label for="nome">Título:</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
                        </div> <br>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" rows="5" class="form-control"  placeholder="Descricao" required></textarea>
                        </div><br>
                        <div class="form-group">

                            <label for="categoria">Categoria:</label>
                            <select class="form-control" name="categoria" placeholder="Categoria" required>
                                <option value="" disabled selected>Categoria</option>
                                <option value="cat1">Cat 1</option>
                                <option value="cat2">Cat 2</option>
                                <option value="cat3">Cat 3</option>
                            </select>
                            
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Abrir</button> <br><br>
                        </div>
                    </form>

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