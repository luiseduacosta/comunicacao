<?php
// debug($observacoes);
?>

<h1>Observações/Comentários</h1>

<table>

<tr>
<th>Id</th>
<th>Matéria</th>
<th>Comentários</th>
<th>Autor</th>
<th>Data</th>
</tr>

<?php foreach ($observacoes as $c_observacoe): ?>
<?php // pr($c_observacoe); ?>
<tr>
<td><?php echo $c_observacoe['Observacoe']['id']; ?></td>
<td><?php echo $c_observacoe['Materia']['titulo']; ?></td>
<td><?php echo $c_observacoe['Observacoe']['observacoes']; ?></td>
<td><?php echo $c_observacoe['Observacoe']['autor']; ?></td>
<td><?php echo $c_observacoe['Observacoe']['data']; ?></td>
</tr>
<?php endforeach; ?>

</table>
