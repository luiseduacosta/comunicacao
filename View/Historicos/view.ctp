<?php // pr($historico);  ?>
<div class="container">
    <h2><?php echo __('Histórico'); ?></h2>
    <dl class="row">
        <dt class="col-2"><?php echo __('Id'); ?></dt>
        <dd class="col-10">
            <?php echo h($historico['Historico']['id']); ?>
            &nbsp;
        </dd>

        <dt class="col-2"><?php echo __('Seção sindical'); ?></dt>
        <dd class="col-10">
            <?php echo $this->Html->link($historico['Ssindical']['Secao_sindical'], array('controller' => 'ssindicais', 'action' => 'ver', $historico['Ssindical']['Id'])); ?>
            &nbsp;
        </dd>

        <dt class="col-2"><?php echo __('Ano'); ?></dt>
        <dd class="col-10">
            <?php echo h($historico['Historico']['ano']); ?>
            &nbsp;
        </dd>

        <dt class="col-2"><?php echo __('Evento'); ?></dt>                
        <dd class="col-10">
            <?php echo h($historico['Historico']['evento']); ?>
            &nbsp;
        </dd>

        <dt class="col-2"><?php echo __('Quantidade'); ?></dt>
        <dd class="col-10">
            <?php echo h($historico['Historico']['quantidade']); ?>
            &nbsp;
        </dd>

        <dt class="col-2"><?php echo __('Observacoes'); ?></dt>
        <dd class="col-10">
            <?php echo h($historico['Historico']['observacoes']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="navbar navbar-light">
    <ul class="nav nav-pills">
        <li class="nav-item"><?php echo $this->Html->link(__('Editar Historico'), ['action' => 'edit', $historico['Historico']['id']], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Form->postLink(__('Excluir Historico'), ['action' => 'delete', $historico['Historico']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $historico['Historico']['id']), 'class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Historicos'), ['action' => 'index'], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Novo Historico'), ['action' => 'add', $historico['Historico']['ssindical_id']], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Ssindicais'), ['controller' => 'ssindicais', 'action' => 'index'], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Nova Ssindical'), ['controller' => 'ssindicais', 'action' => 'add'], ['class' => 'nav-link']); ?> </li>
    </ul>
</div>
