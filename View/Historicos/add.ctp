<div class="historicos form">
<?php echo $this->Form->create('Historico'); ?>
	<fieldset>
		<legend><?php echo __('Adiciona Histórico'); ?></legend>
	<?php
		echo $this->Form->input('ssindical_id', ['label' => ['text' => 'Seção Sindical']]);
		echo $this->Form->input('ano', ['label' => ['text' => 'Ano']]);
		echo $this->Form->input('evento', ['label' => ['text' => 'Evento']]);                
		echo $this->Form->input('quantidade', ['label' => ['text' => 'Quantidade']]);
		echo $this->Form->input('observacoes', ['label' => ['text' => 'Observações']]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Historicos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Ssindicais'), array('controller' => 'ssindicais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Ssindical'), array('controller' => 'ssindicais', 'action' => 'add')); ?> </li>
	</ul>
</div>
