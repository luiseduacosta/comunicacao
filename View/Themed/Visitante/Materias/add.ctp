<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<?php

echo $this->element('submenu_materias');
?>

<?php

// pr($pautas);
// pr($pessoas);
// pr ($materias);
// echo "Valor " . $pauta_id;
?>

<?php

echo $this->Form->create('Materia');
if (empty($pauta_id)) {
    echo $this->Form->input('pauta_id');
} else {
    echo $this->Form->input('pauta_id', array('type' => 'select', 'options' => $pautas, 'selected' => $pauta_id));
}
echo $this->Form->input('titulo');
// echo $this->Form->input('conteudo');

echo $this->Form->textarea('conteudo', array('class' => 'ckeditor'));

echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));

echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => $tags,
    'value' => ('Tag.Tag')
        )
);
echo $this->Form->end('Salvar');
?>
