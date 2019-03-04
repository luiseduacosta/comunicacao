<div class = "submenusuperior">
    <?php echo $this->Html->link('Arquivadas', 'arquivadas/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Listar', 'index/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Informandes', 'index/informandes:1', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Inserir', 'add/', array('class' => 'aba')); ?>
</div>

<div class = "celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Pautas</option>
        <option value="/comunicacao/Pautas/arquivadas">Arquivadas</option>
        <option value="/comunicacao/Pautas/">Listar</option>
        <option value="/comunicacao/Pautas/index/informandes:1">Informandes</option>
        <option value="/comunicacao/Pautas/add">Inserir</option>
    </select>
</div>
