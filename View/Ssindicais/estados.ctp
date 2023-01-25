<?php
// pr($estados);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<div class="container">
    <table class="table table-hover table-striped table-responsive">

        <tr>
            <th><?php echo $this->Paginator->sort('Estado', 'Estados'); ?></th>
            <th><?php echo $this->Paginator->sort('quantidade', 'Seções sindicais'); ?></th>
        </tr>

        <?php $total = 0; ?>
        <?php foreach ($estados as $c_estados): ?>
            <tr>
                <td><?php echo $this->Html->link($c_estados['Ssindical']['Estado'], 'seleciona/' . 'estado/' . $c_estados['Ssindical']['Estado']); ?></td>
                <td><?php echo $c_estados['0']['quantidade']; ?></td>
            </tr>
            <?php $total = $total + $c_estados['0']['quantidade']; ?>
        <?php endforeach; ?>
        <tr>
            <td>Total</td><td><?php echo $total; ?></td>
        </tr>
    </table>
</div>