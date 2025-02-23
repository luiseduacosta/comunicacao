<div class = "submenusuperior">
    <?php // echo $this->Html->link('Arquivadas','arquivadas/', ['class' => 'aba']); ?>
    <?php echo $this->Html->link('Listar','index/', ['class' => 'aba']); ?>
    <?php // echo $this->Html->link('Inserir','add/', ['class' => 'aba']); ?>
</div>

<div class = "celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Pautas</option>
        <!--
        <option value="/comunicacao/Pautas/arquivadas">Arquivadas</option>
        //-->
        <option value="/comunicacao/Pautas/">Listar</option>
        <!--
        <option value="/comunicacao/Pautas/add">Inserir</option>
        //-->
    </select>
</div>
