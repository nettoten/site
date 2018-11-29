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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#tabela').DataTable();
                } );
        </script>               
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

        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM usuarios where id = '$id' order by id desc";
            $stmt = $conexao->query($sql);
                                
            try{                            
                $stmt->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }

            while($selecionados = $stmt->fetch(PDO::FETCH_ASSOC)){
                $selectNome = $selecionados['nome'];
                $selectAtivo = $selecionados['ativo'];
                $selectEmail = $selecionados['email'];
                $selectEmpresa = $selecionados['empresa'];
                $selectNivel = $selecionados['nivel'];
                $selectAtivo = $selecionados['ativo'];
                $selectUsuario = $selecionados['usuario'];
                $selectId = $selecionados['id'];
            }
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
                    <?php 
                        if (isset($id)){?>
                            <table style="background-color: lightgray">
                                <h3>Editar usuário</h3>
                                <?php //echo "<form action='./cruds/tratar-tickets.php?opcao=atualizarUsuario&id=".$selectId."method='post'>";?>
                                <form action="./cruds/tratar-tickets.php?opcao=atualizarUsuario&id=<?php echo $selectId; ?>" method='post'>
                                    <tr><td><div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" <?php echo "value=".$selectNome;?> class="form-control" name="nome" placeholder="Nome" required style="background-color: white">
                                    </div> </td>
                                        <td><div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" <?php echo "value='".$selectEmail."'";?> class="form-control" name="email" placeholder="Email" required style="background-color: white">
                                    </div> </td>
                                    <td><div class="form-group">
                                        <label for="empresa">Empresa:</label>
                                        <input type="text" <?php echo "value='".$selectEmpresa."'";?> class="form-control" name="empresa" placeholder="Empresa" required style="background-color: white">
                                    </div></td></tr>
                                    <tr><td><div class="form-group">
                                        <label for="usuario">Usuário:</label>
                                        <input type="text" <?php echo "value='".$selectUsuario."'";?> class="form-control" name="usuario" placeholder="Nome de Usuário" required style="background-color: white">
                                    </div> </td>                  
                                    <td><div class="form-group">
                                    <label for="nivel">Tipo de Usuário:</label>
                                        <select class="form-control" name="nivel" required style="background-color: white; color: gray">
                                            <option value="" disabled selected>Selecione</option>
                                            <option value="1">Cliente</option>
                                            <option value="2">Administrador</option>
                                        </select>
                                        
                                    </div>
                                    <td><br><br>
                                        <div class="col-4 col-12-small">
                                            <input type="checkbox" id="senha" name="senha">
                                            <label for="senha">Resetar senha</label>
                                    </div><div class="col-4 col-12-small">
                                            <input type="checkbox" id="ativo" name="ativo" <?php if ($selectAtivo == 1) echo "checked";?>>
                                            <label for="ativo">Ativo</label>
                                    </div>

                                        <button type="submit" style="color: white; float: right; background-color: white">Salvar</button></td><br>
                                    </form>
                            </table> 
                                                                                                       
                     <?php   }
                    ?>

                    <header>
                        <?php if(isset($_GET['alerta']) and $_GET['alerta'] == 1){
                            echo "<h3 style='color: green; background-color: lightgreen'>Usuário atualizado com sucesso!</h3>";
                        }?>
                        <h2>Usuários</h2>
                    </header>
                    <table id="tabela">
                        <thead class="thead-dark">
                            <tr>                                
                                <th scope="col">Nome</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Email</th>
                                <th scope="col">Empresa</th>  
                                <th scope="col">Ações</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php

         
                                $sql = "SELECT * FROM usuarios order by id desc";
                                $stmt = $conexao->query($sql);
                                
                                try{                            
                                    $stmt->execute();
                                }catch(PDOException $e){
                                    echo $e->getMessage();
                                }
                                
                            
                             //echo $resultado['fk_usuario'];
                             //echo $_SESSION['idUsuario'];                            
                            
                            while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){                                
                                echo "<tr>";
                                echo "<td>".$resultado['nome']."</td>";
                                if ($resultado['nivel']==2){
                                    echo "<td>Admin</td>";
                                }else{
                                    echo "<td>Usuario</td>";
                                }
                                echo "<td>".$resultado['email']."</td>";
                                echo "<td>".$resultado['empresa']."</td>"; 
                                echo "<td><a href=usuario-lista.php?id=".$resultado['id']."><i class='fa fa-edit'></i></a></td>";
                                echo "</tr>";

                                $sql = "SELECT * FROM usuarios order by id desc";
                                $comando = $conexao->query($sql);
                                try{                            
                                    $comando->execute();
                                }catch(PDOException $e){
                                    echo $e->getMessage();
                                }                                                            
                            }
                            ?>
                        </tbody>
                    </table>
                         
                    
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