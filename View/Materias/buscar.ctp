<?php
// if ($materias):
    // pr($materias);
// endif;
?>

<?php
echo $this->element('submenu_materias');
?>

<?php if (isset($materias)): ?>

<h1>Busca: <?php echo $expressao; ?></h1>

<table>

    <?php foreach ($materias as $c_materia): ?>
    
    <tr>
        <td><?php echo $this->Html->link($c_materia['Materia']['titulo'], 'ver/' . $c_materia['Materia']['id']); ?></td>
    </tr>

    <?php endforeach; ?>

</table>

<?php else: ?>

    <h1>Busca por conetúdo da matéria</h1>

    <?php echo $this->Form->create('Materia'); ?>
    <?php echo $this->Form->input('conteudo', array('label' => 'Digite a palavra ou expressão')); ?>
    <?php echo $this->Form->end('Confirma'); ?>

<?php endif; ?>
