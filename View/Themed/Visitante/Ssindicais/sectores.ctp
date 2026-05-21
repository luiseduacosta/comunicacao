<?php
// pr($sectores);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<table>

    <tr>
        <th>Sectores</th>
        <th>Seções sindicais</th>
    </tr>

    <?php $total = 0; ?>
    <?php foreach ($sectores as $c_sectores): ?>
        <tr>
            <td><?php echo $this->Html->link($c_sectores['Ssindical']['Setor'], 'index/' . 'setor/' . $c_sectores['Ssindical']['Setor']); ?></td>
            <td><?php echo $c_sectores['0']['quantidade']; ?></td>
        </tr>
        <?php $total = $total + $c_sectores['0']['quantidade']; ?>
    <?php endforeach; ?>
    <tr>
        <td>Total</td><td><?php echo $total; ?></td>
    </tr>
</table>