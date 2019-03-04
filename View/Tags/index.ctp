<?php
// pr($tags);
?>

<?php
echo $this->element('submenu_tags');
?>

<h1>Tags</h1>

<table>

<tr>
<th>Id</th>
<th>GT ou Setor</th>
<th>Nome</th>
<th>Matérias</th>
</tr>

<?php foreach ($tags as $tag): ?>
<tr>
<td><?php echo $tag['Tag']['id']; ?></td>
<td><?php echo $this->Html->link($tag['Tag']['gt_setor'], 'ver/' . $tag['Tag']['id']); ?></td>
<td><?php echo $tag['Tag']['gt_setor_extenso']; ?></td>
<td style="text-align: center"><?php echo $tag['quantidade']; ?></td>
</tr>
<?php endforeach; ?>

</table>
