<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php // debug($this->data['Pauta']); ?>

<?php

echo "Matéria: " . $this->data['Pauta']['titulo'] . "<br>";

echo $this->Form->create('Comentapauta');
// echo $this->Form->input('pauta_id');
echo $this->Form->input('comentario', array('type' => 'textarea', 'class' => 'ckeditor'));
echo $this->Form->input('autor');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>