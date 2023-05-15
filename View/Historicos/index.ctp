<?php // pr($historicos)                        ?>

<div class="container">
    <h2><?php echo __('Histórico'); ?></h2>
    <table class="table table-hover table-striped table-responsive">
        <thead class="thead-light">
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
                        <?php echo $this->Html->link($historico['Ssindical']['Secao_sindical'], array('controller' => 'ssindicais', 'action' => 'ver', $historico['Ssindical']['Id'])); ?>
                    </td>
                    <td><?php echo h($historico['Ssindical']['Regional']); ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['ano']); ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['evento']); ?>&nbsp;</td>
                    <td style="text-align: right"><?php echo $historico['Historico']['quantidade']; ?>&nbsp;</td>
                    <td><?php echo h($historico['Historico']['observacoes']); ?>&nbsp;</td>
                    <td>
                        <nav class='navbar navbar-light bg-light'>
                            <ul class='nav nav-pills nav-fill'>
                                <li class='nav-item'>
                                    <?php echo $this->Html->link(__('Ver'), ['action' => 'view', $historico['Historico']['id']], ['class' => 'nav-link']); ?>
                                </li>
                                <li class='nav-item'>
                                    <?php echo $this->Html->link(__('Editar'), ['action' => 'edit', $historico['Historico']['id']], ['class' => 'nav-link']); ?>
                                </li>
                                <li class='nav-item'>
                                    <?php echo $this->Form->postLink(__('Excluir'), ['action' => 'delete', $historico['Historico']['id'], 'confirm' => __('Are you sure you want to delete # %s?', $historico['Historico']['id'])], ['class' => 'nav-link']); ?>
                                </li>
                            </ul>
                        </nav>
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
        ?>
    </p>

    <div class="pagination pagination-large">
        <ul class="pagination">
            <?php
            echo $this->Paginator->prev(__('Anterior'), array('tag' => 'li', 'class' => 'page-item', 'class' => 'page-link'), null, ['class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a', 'class' => 'page-link']);
            echo $this->Paginator->numbers(['separator' => '', 'currentTag' => 'a', 'class' => 'page-link', 'currentClass' => 'page-item active', 'tag' => 'li', 'first' => 1]);
            echo $this->Paginator->next(__('Seguinte'), array('tag' => 'li', 'class' => 'page-item', 'class' => 'page-link', 'currentClass' => 'disabled'), null, ['tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a', 'class' => 'page-link']);
            ?>
        </ul>
    </div>


    <nav class="navbar navbar-light bg-light">
        <ul class="nav nav-pills">
            <li class="nav-item"><?php echo $this->Html->link(__('Novo Historico'), ['action' => 'add'], ['class' => 'nav-link']); ?></li>
            <li class="nav-item"><?php echo $this->Html->link(__('Listar Seções sindicais'), ['controller' => 'ssindicais', 'action' => 'index'], ['class' => 'nav-link']); ?> </li>
            <li class="nav-item"><?php echo $this->Html->link(__('Nova Seção Sindical'), ['controller' => 'ssindicais', 'action' => 'add'], ['class' => 'nav-link']); ?> </li>
        </ul>
    </nav>
</div>