<h1>Pessoas</h1>

<table>

<tr>
<th>Id</th>
<th>Nome</th>
<th>Função</th>
<th>Observações</th>
</tr>

<?php foreach ($pessoas as $pessoa): ?>
<tr>
<td><?php echo $pessoa['Pessoa']['id']; ?></td>
<td><?php echo $pessoa['Pessoa']['nome']; ?></td>
<td><?php echo $pessoa['Pessoa']['funcao']; ?></td>
<td><?php echo $pessoa['Pessoa']['observacoes']; ?></td>
</tr>
<?php endforeach; ?>

</table>
