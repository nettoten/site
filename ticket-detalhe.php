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
            <nav>
                <a href="#menu">Menu</a>
            </nav>
        </header>
        <?php
        include './cruds/conexao.php';
        require './cruds/validacao.php';
        session_start();
        if (!isLoggedIn()) {
        header('Location: ./acessar.php');
        }
        ?>  
        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li style="color: lawngreen"><?php echo strtoupper($_SESSION['nome']);?></li>
                <li><a href="index.html">Página Inicial</a></li>
                <?php if ($_SESSION['nivel']==2){?>
                    <li><a href="usuario-cadastrar.php">Cadastrar Usuário</a></li>
                <?php } ?>
                <?php if ($_SESSION['nivel']==1){?>
                    <li><a href="ticket-abrir.php">Abrir Ticket</a></li>
                <?php } ?>
                <li><a href="ticket-lista.php">Acompanhar Tickets</a></li>
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
                    <?php
                    $protocolo = $_GET["protocolo"];
                    //$resultado = $conexao->query("SELECT * FROM ticket Where protocolo = '$protocolo'");
                    
                    $sql = "SELECT t.*, u.nome AS `usuario` FROM `ticket` AS `t` INNER JOIN `usuarios` AS u ON t.fk_usuario = u.id Where `protocolo` = :protocolo  ";
                    $stmt = $conexao->prepare($sql);
                    $stmt->bindParam(':protocolo',$protocolo);
                    try{
                        
                        $stmt->execute();
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }

                    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                    if(($_SESSION['idUsuario']!=$resultado['fk_usuario']) && ($_SESSION['nivel']<2)){
                        echo "<h3 style='color: red'>Você não tem permissão para acessar essa página</h3>";
                    }else{

                    ?>

                        <header>
                            <h2>Ticket <?php echo "$protocolo"; ?> </h2>
                            <h4 style="color: red">Aberto em <?php echo $resultado['data']; ?> por <?php echo $resultado['usuario']; ?></h4>
                        </header>
                        <table>
                            <thead class='thead-dark'>                                                                   
                                <tr>
                                    <th scope='col'>Título</th></tr></thead>
                            <tbody><td><?php echo $resultado['titulo']; ?></td> </tbody>                                    
                        </table>
                        <table>
                            <thead class='thead-dark'>                                                                   
                                <tr>
                                    <th scope='col'>Descrição</th></tr></thead>
                            <tbody><td><?php echo $resultado['descricao']; ?></td></tbody>                                    
                        </table>
                        <table>
                            <thead class='thead-dark'>                                                                   
                                <tr>
                                    <th scope='col'>Categoria</th></tr></thead>
                            <tbody><td><?php echo $resultado['categoria']; ?></td></tbody>                                    
                        </table>                                  
                        <table>
                            <thead class='thead-dark' >                                                                   
                                <tr>
                                    <th scope='col'>Status</th></tr></thead>
                            <?php if ($_SESSION['nivel'] == 1) { ?>
                                    <td><?php echo $resultado['status']; ?></td>  
                            <?php } else if ($_SESSION['nivel'] == 2) { ?>
                                    <td>                                             
                                        <form action="./cruds/tratar-tickets.php?opcao=atualizar&protocolo=<?php echo $resultado['protocolo'] ?>" method="post">
                                            <select class="form-control" name="status" required>
                                                <option value="" disabled selected><?php echo $resultado['status']; ?></option>
                                                <option value="Em atendimento">Em atendimento</option>
                                                <option value="Agendado">Agendado</option>
                                                <option value="Concluído">Concluído</option>
                                            </select>                     
                                    </td> 
                                    <td><button type="submit"><i class='fa fa-pencil'></i></button></td></form> 
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                                       
                        <!--<td><a href=<?php echo "ticket-detalhe-admin.php?opcao=atualizar&protocolo=$protocolo" ?><i class='fa fa-edit'></i></a></td> -->
                            <?php //} ?>
                            

                            <?php }
                            ?>
                            </table>
                             <?php }
                            ?>
                </div>
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