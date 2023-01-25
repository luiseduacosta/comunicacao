<?php // pr($historico); ?>
<div class="historicos view">
<h2><?php echo __('Historico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seção sindical'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historico['Ssindical']['Secao_sindical'], array('controller' => 'ssindicais', 'action' => 'view', $historico['Ssindical']['Id'])); ?>
			&nbsp;
		</dd>
                
		<dt><?php echo __('Ano'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['ano']); ?>
			&nbsp;
		</dd>
                
		<dt><?php echo __('Evento'); ?></dt>                
		<dd>
			<?php echo h($historico['Historico']['evento']); ?>
			&nbsp;
		</dd>

                <dt><?php echo __('Quantidade'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['quantidade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacoes'); ?></dt>
		<dd>
			<?php echo h($historico['Historico']['observacoes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Historico'), array('action' => 'edit', $historico['Historico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Historico'), array('action' => 'delete', $historico['Historico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $historico['Historico']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Historicos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Historico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ssindicais'), array('controller' => 'ssindicais', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Ssindical'), array('controller' => 'ssindicais', 'action' => 'add')); ?> </li>
	</ul>
</div>
