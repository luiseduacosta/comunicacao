<?php // pr($pautas); ?>

<?php
echo $this->element('submenu_pautas');
?>

<?php
// pr($pautas);
?>

<?php
// Shows the page numbers
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev(
  '« Anterior ',
  null,
  null,
  array('class' => 'disabled')
);
echo $this->Paginator->next(
  ' Posterior »',
  null,
  null,
  array('class' => 'disabled')
);
echo "     ";
echo $this->Paginator->counter();

?>

<table>

<tr>
<th><?php echo $this->Paginator->sort('data', 'Data'); ?></th>
<th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
</tr>

<?php foreach ($pautas as $pauta): ?>
<tr>
<td width='10%'><?php echo $pauta['Pauta']['data']; ?></td>    
<td><?php echo $this->Html->link($pauta['Pauta']['titulo'], 'ver/' . $pauta['Pauta']['id']); ?></td>
</tr>
<?php endforeach; ?>

</table>
