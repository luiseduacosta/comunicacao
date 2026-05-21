<?php
// pr($ssindicais);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<table>
    <thead><?php echo '<h1>Seções sindicais por: ' . $campo . '</h1>'; ?></thead>
    <tr>
        <th><?php echo $this->Paginator->sort('Id', 'Id'); ?></th>
        <th><?php echo $this->Paginator->sort('Secao_sindical','Seção Sindical'); ?></th>
        <th><?php echo $this->Paginator->sort('Estado','Estado');?></th>
        <th><?php echo $this->Paginator->sort('Regional','Regional');?></th>
        <th><?php echo $this->Paginator->sort('Setor','Setor');?></th>
        <th><?php echo $this->Paginator->sort('Site','Site');?></th>
        <th><?php echo $this->Paginator->sort('Facebook','Facebook');?></th>
        <th><?php echo $this->Paginator->sort('Youtube','YouTube');?></th>
    </tr>

    <?php foreach ($ssindicais as $c_ssindicais): ?>

        <?php // echo pr($c_ssindicais); ?>

        <tr>
            <td><?php echo $this->Html->link($c_ssindicais["Ssindical"]['Id'], 'ver/' . $c_ssindicais["Ssindical"]['Id']); ?></td>
            <td><?php echo $this->Html->link($c_ssindicais["Ssindical"]['Secao_sindical'], 'ver/' . $c_ssindicais["Ssindical"]['Id']); ?></td>
            <td><?php echo $c_ssindicais["Ssindical"]['Estado']; ?></td>
            <td><?php echo $c_ssindicais["Ssindical"]['Regional']; ?></td>
            <td><?php echo $c_ssindicais["Ssindical"]['Setor']; ?></td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindical"]['Site'])) {
                    echo $this->Html->link('Site', 'http://' . $c_ssindicais["Ssindical"]['Site'], array(
                                       'target'=>'_blank',
                                       'escape'=>false));
                } else {
                    '';
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindical"]['Facebook'])) {
                    echo $this->Html->link('Facebook', $c_ssindicais["Ssindical"]['Facebook'], array(
                                       'target'=>'_blank',
                                       'escape'=>false));
                } else {
                    '';
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindical"]['Youtube'])) {
                    echo $this->Html->link('YouTube', $c_ssindicais["Ssindical"]['Youtube'], array(
                                       'target'=>'_blank',
                                       'escape'=>false));
                } else {
                    '';
                }
                ?>
            </td>
        </tr>

    <?php endforeach; ?>

</table>