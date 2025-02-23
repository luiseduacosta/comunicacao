<?php
// pr($tags);
?>
<?php
// echo $this->element('submenu_tags');
?>

<!--
<div class="subsubmenusuperior">
<?php echo $this->Html->link("Editar tag", "editar/" . $tags['Tag']['id'], ['class' => 'aba']); ?>
<?php echo $this->Html->link("Excluir tag", "excluir/" . $tags['Tag']['id'], array('class' => 'aba', 'confirm' => 'Tem certeza')); ?>
</div>
//-->

<!--
<div class="celular">
    <select  onchange="window.location.href = this.value">
        <option value="" selected="selected">Marcas</option>
        <option value="/comunicacao/Tags/editar/<?php echo $tags['Tag']['id'];?>">Editar esta marca</option>
        <option value="/comunicacao/Tags/excluir/<?php echo $tags['Tag']['id'];?>">Excluir esta marca</option>        
    </select>
</div>
//-->

<table>

    <tr>
        <td>GT e/ou setor</td>
        <td>
            <?php echo $tags['Tag']['gt_setor']; ?>
        </td>
    </tr>

    <tr>
        <td>GT e/ou setor por extenso</td>
        <td>
            <?php echo $tags['Tag']['gt_setor_extenso']; ?>
        </td>
    </tr>
</table>

<table>
    <tr>
        <th width='10%'>Data</th>
        <th>Matéria</th>
    </tr>
    <?php foreach ($tags['Materia'] as $tag): ?>
    <?php // pr($tag); ?>
        <tr>
            <td><?php echo $tag['data']; ?></td>
            <td><?php echo $this->Html->link($tag['titulo'], '/materias/ver/' . $tag['id']); ?></td>
        </tr>
    <?php endforeach; ?>

</table>
