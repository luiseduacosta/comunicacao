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
            <td><?php echo $this->Html->link($c_ssindicais["Ssindicai"]['Id'], 'ver/' . $c_ssindicais["Ssindicai"]['Id']); ?></td>
            <td><?php echo $this->Html->link($c_ssindicais["Ssindicai"]['Secao_sindical'], 'ver/' . $c_ssindicais["Ssindicai"]['Id']); ?></td>
            <td><?php echo $c_ssindicais["Ssindicai"]['Estado']; ?></td>
            <td><?php echo $c_ssindicais["Ssindicai"]['Regional']; ?></td>
            <td><?php echo $c_ssindicais["Ssindicai"]['Setor']; ?></td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindicai"]['Site'])) {
                    echo $this->Html->link('Site', 'http://' . $c_ssindicais["Ssindicai"]['Site'], array(
                                       'target'=>'_blank',
                                       'escape'=>false));
                } else {
                    '';
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindicai"]['Facebook'])) {
                    echo $this->Html->link('Facebook', $c_ssindicais["Ssindicai"]['Facebook'], array(
                                       'target'=>'_blank',
                                       'escape'=>false));
                } else {
                    '';
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($c_ssindicais["Ssindicai"]['Youtube'])) {
                    echo $this->Html->link('YouTube', $c_ssindicais["Ssindicai"]['Youtube'], array(
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