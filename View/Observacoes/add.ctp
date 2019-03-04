<?php
// echo $this->element('submenu_pautas');
?>

<h1>Inserir comentário</h1>

<?php

echo $this->Form->create('Observacoe');
echo $this->Form->input('materia_id');
echo $this->Form->input('observacoes');
echo $this->Form->input('data');
echo $this->Form->input('autor');
echo $this->Form->end('Salvar');

?>
