<?php
// pr($regionais);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<table>
    
    <tr>
    <th><?php echo $this->Paginator->sort('Regional', 'Regional'); ?></th>
    <th><?php echo $this->Paginator->sort('quantidade', 'Seções sindicais');?></th>
    </tr>
    
<?php $total = 0; ?>
<?php foreach ($regionais as $c_regionais): ?>
    <tr>
        <td><?php echo $this->Html->link($c_regionais['Ssindicai']['Regional'], 'seleciona/' . 'regional/' . $c_regionais['Ssindicai']['Regional']); ?></td>
        <td><?php echo $c_regionais['0']['quantidade']; ?></td>
    </tr>
    <?php $total = $total + $c_regionais['0']['quantidade']; ?>
    <?php endforeach; ?>
    <tr>
        <td>Total</td><td><?php echo $total; ?></td>
    </tr>
</table>