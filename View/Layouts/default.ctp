<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Andes-SN');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
    ?>
<!DOCTYPE html>
<html>

<head>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>

    </title>
    <?php
    echo $this->Html->meta('icon');

    // echo $this->Html->css('cake.generic');
    // echo $this->Html->css('meus_estilos');
    // Jquery
    echo $this->Html->script("https://code.jquery.com/jquery-3.5.1.js");

    // Datatables
    echo $this->Html->css("https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css");
    echo $this->Html->script("https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js");

    echo $this->Html->css("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css");
    echo $this->Html->css("https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css");

    // Bootstrap 4 
    echo $this->Html->css("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css");
    echo $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
    echo $this->Html->script("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
    // echo $this->Html->script(['popper.min.js', 'bootstrap.min.js', 'bootstrap.bundle.min.js']);
    
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    // Adicionei para o editor html
    echo $scripts_for_layout;
    ?>
</head>

<body>
    <div id="container">

        <div id="header">
            <h1><?php echo $this->Html->link($cakeDescription, 'http://www.andes.org.br'); ?></h1>
            <div align="center">
                <p>Comunicação do Andes-SN</p>
            </div>
        </div>

        <div class='menusuperior'>
            <nav id="navbar-menusuperior" class="navbar navbar-light bg-light">
                <ul class="nav nav-pills nav-fill">
                    <?php
                    echo "<li class='nav-item'>";
                    if (isset($userData)):
                        echo $this->Html->link('Administrador', '/Users/logout', ['class' => 'nav-link']);
                    else:
                        echo $this->Html->link('Login', '/Users/login', ['class' => 'nav-link']);
                    endif;
                    echo "</li>";
                    ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Pautas", "/Pautas/", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Matérias", "/Materias/index/informandes:0", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Blog", "/Materias/blog/", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("GTs e Setores", "/tags/", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Seções Sindiciais", "/Ssindicais/", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Histórico", "/historicos/", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("TV Andes-SN", "http://www.youtube.com/user/sindicatoandes", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>
                    <?php echo "<li class='nav-item'>"; ?>
                    <?php echo $this->Html->link("Plano de comunicação", "http://portal.andes.org.br/secretaria/gts/-%20Plano%20de%20Comunica%C3%A7%C3%A3o.pdf", ['class' => 'nav-link']); ?>
                    <?php echo "</li>"; ?>

                </ul>
            </nav>

        </div>

        <div id="content">

            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>

        </div>

        <div id="footer">
            <?php
            echo $this->Html->link(
                $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                'http://www.cakephp.org/',
                array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
            );
            ?>
            <p>
                <?php echo $cakeVersion; ?>
            </p>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>

</html>