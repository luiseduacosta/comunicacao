<?php
// pr($ssindical);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<div class="container">

    <nav class="navbar navbar-light bg-light" role="navigation">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?php echo $this->Html->link('Editar', 'editar/' . $ssindical['Ssindical']['Id'], array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Excluir', 'excluir/' . $ssindical['Ssindical']['Id'], array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Novo histórico', ['controller' => 'historicos', 'action' => 'add', $ssindical['Ssindical']['Id']], array('class' => 'nav-link')); ?>
            </li>
        </ul>
    </nav>

    <table class="table table-hover table-responsive table-striped">
        <tr>
            <td>Seção sindical - sigla</td>
            <td>
                <?php echo $ssindical['Ssindical']['Secao_sindical']; ?>
            </td>
        </tr>
        <tr>
            <td>Seção sindical por extenso</td>
            <td>
                <?php echo $ssindical['Ssindical']['Secao_sindical_extenso']; ?>
            </td>
        </tr>
        <tr>
            <td>Sindicalizados</td>
            <td>
                <?php echo $sindicalizados = isset($ssindical['historicos'][0]['quantidade']) ? $this->Html->link($ssindical['historicos'][0]['quantidade'], ['controller' => 'historicos', 'action' => 'view', $ssindical['historicos'][0]['id']]) : NULL; ?>
                <?php echo $sindicalizados = isset($ssindical['historicos'][0]['evento']) ? $ssindical['historicos'][0]['evento'] : NULL; ?>
                <?php echo $sindicalizados = isset($ssindical['historicos'][0]['ano']) ? $ssindical['historicos'][0]['ano'] : NULL; ?>   
            </td>
        </tr>

        <tr>
            <td>Regional</td>
            <td>
                <?php echo $ssindical['Ssindical']['Regional']; ?>
            </td>
        </tr>
        <tr>
            <td>Estado</td>
            <td>
                <?php echo $ssindical['Ssindical']['Estado']; ?>
            </td>
        </tr>
        <tr>
            <td>Setor</td>
            <td>
                <?php
                if ($ssindical['Ssindical']['Setor'] == 'F'):
                    echo "Federal";
                elseif ($ssindical['Ssindical']['Setor'] == 'E'):
                    echo "Estadual";
                else:
                    echo "Sem dados";
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td>Site</td>
            <td>
                <?php
                echo $this->Html->link($ssindical['Ssindical']['Site'], 'http://' . $ssindical['Ssindical']['Site'], array(
                    'target' => '_blank',
                    'escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td>
                <?php
                echo $this->Html->link($ssindical['Ssindical']['Facebook'], $ssindical['Ssindical']['Facebook'], array(
                    'target' => '_blank',
                    'escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <td>YouTube</td>
            <td>
                <?php
                echo $this->Html->link($ssindical['Ssindical']['Youtube'], $ssindical['Ssindical']['Youtube'], array(
                    'target' => '_blank',
                    'escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <td>Observações</td>
            <td>
                <?php echo $ssindical['Ssindical']['Observacoes']; ?>
            </td>
        </tr>
    </table>
</div>