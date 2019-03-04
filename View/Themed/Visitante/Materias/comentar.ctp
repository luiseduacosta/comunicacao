<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php // pr($materias['Observacoe']);     ?>

<table>
    <tr>
        <td>
            <?php echo "Título"; ?>
        </td>
        <td colspan="3">
            <?php echo $this->Html->link($materias['Materia']['titulo'], 'ver/' . $materias['Materia']['id']); ?>
        </td>
    </tr>

    <?php if ($materias['Observacoe']): ?>

        <?php foreach ($materias['Observacoe'] as $c_materia): ?>
            <?php // pr($c_materia); ?>
            <tr>
                <td>
                    <?php echo "Comentários"; ?>
                </td>
                <td>
                    <?php
                    echo $this->Time->format($c_materia['data'], '%d-%m-%Y');
                    echo '. ';
                    echo $c_materia['autor'];
                    echo '. ';
                    echo strip_tags($c_materia['observacoes']);
                    echo '. ';
                    ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Editar', '/Observacoes/editar/' . $c_materia['id']); ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Excluir', '/Observacoes/excluir/' . $c_materia['id']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
echo $this->Form->create('Observacoe');
echo $this->Form->input('Observacoe.materia_id', array('type' => 'hidden', 'value' => $materias['Materia']['id']));
echo $this->Form->input('Observacoe.observacoes', array('label' => 'Comentários sobre a matéria', 'type' => 'textarea', 'class' => 'ckeditor'));
echo $this->Form->input('Observacoe.autor', array('type' => 'text'));
echo $this->Form->end('Salvar');
?>