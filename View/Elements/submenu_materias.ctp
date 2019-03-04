<div class="submenusuperior">
    <?php echo $this->Html->link('Listar', 'index/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Ver cada', 'vercada/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Inserir', '/Pautas/index', array('class' => 'aba')); ?>
    <?php echo $this->Html->link("InformAndes", "/Materias/index/informandes:1", array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Buscar', 'buscar/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Classificar', 'sem_classificar/', array('class' => 'aba')); ?>
</div>
<div class="celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Matérias</option>
        <option value="/comunicacao/Materias">Listar</option>
        <option value="/comunicacao/Materias/vercada/">Ver cada</option>
        <option value="/comunicacao/Pautas/index">Inserir</option>
        <option value="/comunicacao/Materias/index/informandes:1">Inserir</option>
        <option value="/comunicacao/Materias/buscar/">Buscar</option>
        <option value="/comunicacao/Materias/sem_classificar/">Classificar</option>
    </select>
</div>
