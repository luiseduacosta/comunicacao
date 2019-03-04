<?php
echo $this->element('submenu_pautas');
?>

<h1>Inserir pauta</h1>

<?php

echo $this->Form->create('Tag');
echo $this->Form->input('gt_setor');
echo $this->Form->input('gt_setor_extenso');
echo $this->Form->input('observacoes');
echo $this->Form->end('Salvar');

?>


