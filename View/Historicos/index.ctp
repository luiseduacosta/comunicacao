<?php // pr($historicos)         ?>

<div class="container">
    <h2><?php echo __('Histórico'); ?></h2>
    <table class="table table-hover table-striped table-responsive">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('Ssindical.Secao_sindical', 'Seção sindical'); ?></th>
                <th><?php echo $this->Paginator->sort('Ssindical.Regional', 'Regional'); ?></th>
                <th><?php echo $this->Paginator->sort('ano', 'Ano'); ?></th>
                <th><?php echo $this->Paginator->sort('evento', 'Evento'); ?></th>
                <th><?php echo $this->Paginator->sort('quantidade', 'Sindicalizados'); ?></th>
                <th><?php echo $this->Paginator->sort('observacoes', 'Observações'); ?></th>
                <th class="actions"><?php echo __('Ações'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historicos as $historico): ?>
                <tr>
                    <td><?php echo h($historico['Historico']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($historico['Ssindical']['Secao_sindical'], array('controller' => 'ssindicais', 'action' => 'view', $historico['Ssindical']['Id'])); ?>
                    </td>
                    <td><?php echo h($historico['Ssindical']['Regional']); ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['ano']); ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['evento']); ?>&nbsp;</td>
                    <td style="text-align: right"><?php echo $historico['Historico']['quantidade']; ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['observacoes']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo "<nav id='navbar-acoes' class='navbar navbar-light bg-light'>"; ?>
                        <?php echo "<ul class='nav nav-pills nav-fill'>"; ?>
                        <?php echo "<li class='nav-item'>"; ?>
                        <?php echo $this->Html->link(__('View'), ['action' => 'view', $historico['Historico']['id']], ['class' => 'nav-link']); ?>
                        <?php echo "</li>"; ?>
                        <?php echo "<li class='nav-item'>"; ?>
                        <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $historico['Historico']['id']], ['class' => 'nav-link']); ?>
                        <?php echo "</li>"; ?>
                        <?php echo "<li class='nav-item'>"; ?>
                        <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $historico['Historico']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $historico['Historico']['id'])], ['class' => 'nav-link']); ?>
                        <?php echo "</li>"; ?>
                        <?php echo "</ul>"; ?>
                        <?php echo "</nav>"; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Novo Historico'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Ssindicais'), array('controller' => 'ssindicais', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova SSindical'), array('controller' => 'ssindicais', 'action' => 'add')); ?> </li>
    </ul>
</div>
