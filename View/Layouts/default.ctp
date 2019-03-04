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

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('meus_estilos');

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
                <?php
                if (isset($userData)):
                    echo $this->Html->link('Administrador', '/Users/logout', array('class' => 'aba'));
                else:
                    echo $this->Html->link('Login', '/Users/login', array('class' => 'aba'));
                endif;
                ?>
                <?php echo $this->Html->link("Pautas", "/Pautas/", array('class' => 'aba')); ?>
                <?php echo $this->Html->link("Matérias", "/Materias/index/informandes:0", array('class' => 'aba')); ?>
                <?php echo $this->Html->link("Blog", "/Materias/blog/", array('class' => 'aba')); ?>
                <?php echo $this->Html->link("GTs e Setores", "/tags/", array('class' => 'aba')); ?>
                <?php echo $this->Html->link("Seções Sindiciais", "/Ssindicais/", array('class' => 'aba')); ?>                    
                <?php echo $this->Html->link("TV Andes-SN", "http://www.youtube.com/user/sindicatoandes", array('class' => 'aba')); ?>
                <?php echo $this->Html->link("Plano de comunicação", "http://portal.andes.org.br/secretaria/gts/-%20Plano%20de%20Comunica%C3%A7%C3%A3o.pdf", array('class' => 'aba')); ?>
                <br/>
            </div>
            <div class='celular'>
                <?php
                if (isset($userData)):
                    echo $this->Html->link('Administrador', '/Users/logout', array('class' => 'aba'));
                else:
                    echo $this->Html->link('Login', '/Users/login', array('class' => 'aba'));
                endif;
                ?>
                <select onchange="window.location.href = this.value" class="aba">
                    <option value="" selected="selected">Iniciar</option>
                    <option value="/comunicacao/Pautas">Pautas</option>
                    <option value="/comunicacao/Materias">Matérias</option>
                    <option value="/comunicacao/Materias/blog">Blogue</option>
                    <option value="/comunicacao/Tags">Marcas</option>                 
                    <option value="/comunicacao/Ssindicais">Seções Sindicais</option>
                    <option value="http://www.youtube.com/user/sindicatoandes">TV Andes-SN</option>
                    <option value="http://portal.andes.org.br/secretaria/gts/-%20Plano%20de%20Comunica%C3%A7%C3%A3o.pdf">Plano de comunicação</option>
                </select>
            </div>

            <div id="content">

                <?php echo $this->Flash->render(); ?>

                <?php echo $this->fetch('content'); ?>

            </div>

            <div id="footer">
                <?php
                echo $this->Html->link(
                        $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
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
