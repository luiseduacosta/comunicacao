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
            ]
    );
    ?>
    <fieldset>
        <legend><?php echo __('Adiciona Histórico'); ?></legend>
        <?php
        echo $this->Form->input('ssindical_id', ['label' => ['text' => 'Seção Sindical', 'class' => 'col-2 control-label'], 'selected' => $ssindical_id]);
        echo $this->Form->input('ano', ['label' => ['text' => 'Ano', 'class' => 'col-2 control-label']]);
        echo $this->Form->input('evento', ['label' => ['text' => 'Evento', 'class' => 'col-2 control-label']]);
        echo $this->Form->input('quantidade', ['label' => ['text' => 'Quantidade', 'class' => 'col-2 control-label']]);
        echo $this->Form->input('observacoes', ['label' => ['text' => 'Observações', 'class' => 'col-2 control-label']]);
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Confirma', ['type' => 'Submit', 'label' => ['text' => 'Confirma', 'class' => 'col-4'], 'class' => 'btn btn-primary']); ?>
    <?php echo $this->Form->end(); ?>
</div>

<nav class="navbar navbar-light bg-light">
    <ul class="nav nav-pills">
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Historicos'), ['action' => 'index'], ['class' => 'nav-link']); ?></li>
        <li class="nav-item"><?php echo $this->Html->link(__('Listar Ssindicais'), ['controller' => 'ssindicais', 'action' => 'index'], ['class' => 'nav-link']); ?> </li>
        <li class="nav-item"><?php echo $this->Html->link(__('Nova Ssindical'), ['controller' => 'ssindicais', 'action' => 'add'], ['class' => 'nav-link']); ?> </li>
    </ul>
</nav>
