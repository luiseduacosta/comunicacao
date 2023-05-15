
<div class="container">
    <?php
    echo $this->Form->create('Historico', [
        'class' => 'form-horizontal',
        'role' => 'form',
        'inputDefaults' => [
            'format' => ['before', 'label', 'between', 'input', 'after', 'error'],
            'div' => ['class' => 'form-group row'],
            'label' => ['class' => 'col-4 control-label'],
            'between' => "<div class = 'col-8'>",
            'class' => ['form-control'],
            'after' => "</div>",
            'error' => false
        ]
    ]);
    ?>
    <fieldset>
        <legend><?php echo __('Editar Historico'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('ssindical_id', ['label' => ['text' => 'Seção sincial', 'class' => 'col-2']]);
        echo $this->Form->input('ano', ['label' => ['text' => 'Ano', 'class' => 'col-2']]);
        echo $this->Form->input('evento', ['label' => ['text' => 'Evento', 'class' => 'col-2']]);
        echo $this->Form->input('quantidade', ['label' => ['text' => 'Quantidade', 'class' => 'col-2']]);
        echo $this->Form->input('observacoes', ['label' => ['text' => 'Observações', 'class' => 'col-2']]);
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Confirma', ['type' => 'Submit', 'label' => ['text' => 'Confirma', 'class' => 'col-4'], 'class' => 'btn btn-primary']); ?>
    <?php echo $this->Form->end(); ?>
</div>
<div class="navbar navbar-light bg-light">
    <ul class="nav nav-fill">

        <li class="nav-item"><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Historico.id')), ['confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Historico.id')), 'class' => 'nav-link']); ?></li>
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Historicos'), ['action' => 'index'], ['class' => 'nav-link']); ?></li>
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Seçoes sindicais'), ['controller' => 'ssindicais', 'action' => 'index'], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Nova Seção sindical'), ['controller' => 'ssindicais', 'action' => 'add'], ['class' => 'nav-link']); ?> </li>
    </ul>
</div>
