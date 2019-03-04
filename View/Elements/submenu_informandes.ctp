<div class = "submenusuperior">
    <?php // echo $this->Html->link('Arquivadas','arquivadas/', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Listar','/Materias/index/informandes:1', array('class' => 'aba')); ?>
    <?php echo $this->Html->link('Inserir','/Pautas/index/informandes:1', array('class' => 'aba')); ?>
</div>

<div class = "celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Informandes</option>
        <!--
        <option value="/comunicacao/Pautas/arquivadas">Arquivadas</option>
        //-->
        <option value="/comunicacao/Materias/index/informandes:1">Listar</option>
        <option value="/comunicacao/Pautas/index/informandes:1">Inserir</option>
    </select>
</div>
