<?php
// debug($comentapautas);
?>

<h1>Comentários</h1>

<table>

<tr>
<th>Id</th>
<th>Pauta</th>
<th>Comentários</th>
<th>Autor</th>
<th>Data</th>
</tr>

<?php foreach ($comentapautas as $c_comentapautas): ?>
<?php // pr($c_observacoe); ?>
<tr>
<td><?php echo $c_comentapautas['Comentariopauta']['id']; ?></td>
<td><?php echo $c_comentapautas['Pauta']['titulo']; ?></td>
<td><?php echo $c_comentapautas['Comentariopauta']['observacoes']; ?></td>
<td><?php echo $c_comentapautas['Comentariopauta']['autor']; ?></td>
<td><?php echo $c_comentapautas['Comentariopauta']['data']; ?></td>
</tr>
<?php endforeach; ?>

</table>
