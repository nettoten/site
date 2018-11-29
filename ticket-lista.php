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
                <?php if ($_SESSION['nivel']==2){?>
                    <li><a href="usuario-cadastrar.php">Cadastrar Usuário</a></li>
                <?php } ?>
                <?php if ($_SESSION['nivel']==1){?>
                    <li><a href="ticket-abrir.php">Abrir Ticket</a></li>
                <?php } ?>
                <li><a href="cruds/logout.php">Sair</a></li>
            </ul>
        </nav>

        <!-- Heading 
        <div id="heading" >
            <h1>Acompanhar tickets de atendimento</h1>
        </div>-->

        <!-- Main -->

        <section id="main" class="wrapper">
            <div class="inner">
                <div class="content">
                    <header>
                        <h2>Tickets abertos</h2>
                    </header>
                    <table class="table">

                        <thead class="thead-dark">
                            <tr>                                
                                <th scope="col">Protocolo</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Nome</th>                            
                                <th scope="col">Categoria</th>     
                                <th scope="col">Status</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($_SESSION['nivel']==1){                
                                $sql = "SELECT t.*, u.nome AS `usuario` FROM `ticket` AS `t` INNER JOIN `usuarios` AS u ON t.fk_usuario = u.id Where `fk_usuario` = :usuario  order by id desc";
                                $stmt = $conexao->prepare($sql);
                                $stmt->bindParam(':usuario',$_SESSION['idUsuario']);
                                
                                try{                            
                                    $stmt->execute();
                                }catch(PDOException $e){
                                    echo $e->getMessage();
                                }

                                
                                
                             } else{
                                $sql = "SELECT t.*, u.nome AS `usuario` FROM `ticket` AS `t` INNER JOIN `usuarios` AS u ON t.fk_usuario = u.id order by id desc";
                                $stmt = $conexao->prepare($sql);
                                $stmt->bindParam(':usuario',$_SESSION['idUsuario']);
                                
                                try{                            
                                    $stmt->execute();
                                }catch(PDOException $e){
                                    echo $e->getMessage();
                                }

                                
                            }
                             //echo $resultado['fk_usuario'];
                             //echo $_SESSION['idUsuario'];                            
                            
                            while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){                                
                                echo "<tr>";
                                echo "<th scope='row'><a href=ticket-detalhe.php?protocolo=".$resultado['protocolo'].">".$resultado['protocolo']."</th>";
                                echo "<td>".$resultado['titulo']."</td>";
                                echo "<td>".$resultado['usuario']."</td>";
                                echo "<td>".$resultado['categoria']."</td>";
                                echo "<td>".$resultado['status']."</td>";
                                echo "<td>".$resultado['data']."</td>";
                                echo "</tr>";                                
                            }
                            ?>
                        </tbody>
                    </table></div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <div class="content">
                    <section>
                        <h3>Accumsan tmontes viverra</h3>
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