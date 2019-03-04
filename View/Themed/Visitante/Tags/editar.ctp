<?php

echo $this->Form->create('Tag');
echo $this->Form->input('gt_setor');
echo $this->Form->input('gt_setor_extenso');
echo $this->Form->input('observacoes');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>