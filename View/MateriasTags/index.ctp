<h1>Publicados</h1>

<table>

<tr>
<th>Id</th>
<th>Matéria</th>
<th>Título</th>
<th>Conteúdo</th>
<th>Data</th>
<th>Responsável</th>
<th>Mídia</th>
<th>Link</th>
<th>Observações</th>
</tr>

<?php foreach ($publicados as $publicado): ?>
<tr>
<td><?php echo $publicado['Publicados']['id']; ?></td>
<td><?php echo $publicado['Publicados']['materia_id']; ?></td>
<td><?php echo $publicado['Publicados']['titulo']; ?></td>
<td><?php echo $publicado['Publicados']['conteudo']; ?></td>
<td><?php echo $publicado['Publicados']['data']; ?></td>
<td><?php echo $publicado['Publicados']['pessoa_id']; ?></td>
<td><?php echo $publicado['Publicados']['midia']; ?></td>
<td><?php echo $publicado['Publicados']['link']; ?></td>
<td><?php echo $publicado['Publicados']['observacoes']; ?></td>
</tr>
<?php endforeach; ?>

</table>
