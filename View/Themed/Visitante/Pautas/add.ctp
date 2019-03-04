<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<?php
echo $this->element('submenu_pautas');
?>

<h1>Inserir pauta</h1>

<?php

echo $this->Form->create('Pauta');
echo $this->Form->input('titulo');
echo $this->Form->input('conteudo', array('class' => 'ckeditor'));
echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));
// echo $this->Form->input('observacoes');
echo $this->Form->end('Salvar');

?>
