<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<?php

echo $this->Form->create('Pauta');
echo $this->Form->input('titulo');
echo $this->Form->input('conteudo', array('class' => 'ckeditor'));
echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>