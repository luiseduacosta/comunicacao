<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php // debug($this->data['Materia']); ?>

<?php

echo "Matéria: " . $this->data['Materia']['titulo'] . "<br>";

echo $this->Form->create('Observacoe');
// echo $this->Form->input('pauta_id');
echo $this->Form->input('observacoes', array('type' => 'textarea', 'class' => 'ckeditor'));
echo $this->Form->input('autor');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>