<div class="submenusuperior">
    <?php // echo $this->Html->link('Listar', 'index/', ['class' => 'aba']); ?>
    <?php echo $this->Html->link('Ver cada', 'vercada/', ['class' => 'aba']); ?>
    <?php echo $this->Html->link('Ver sites', 'vercadasite/', ['class' => 'aba']); ?>    
    <?php echo $this->Html->link('Regionais', 'regionais/', ['class' => 'aba']); ?>
    <?php echo $this->Html->link('Estados', 'estados/', ['class' => 'aba']); ?>
    <?php echo $this->Html->link('Sectores', 'sectores/', ['class' => 'aba']); ?>
    <?php // echo $this->Html->link('Inserir', 'add/', ['class' => 'aba']); ?>'
</div>
<div class="celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Seções sindicais</option>
        <!--
        <option value="/comunicacao/Ssindicais/index">Listar</option>
        //-->
        <option value="/comunicacao//Ssindicais/vercada/">Ver cada</option>
        <option value="/comunicacao/Ssindicais/vercadasite">Ver sites</option>
        <option value="/comunicacao/Ssindicais/regionais">Regionais</option>                 
        <option value="/comunicacao/Ssindicais/estados">Estados</option>
        <option value="/comunicacao/Ssindicais/sectores">Sectores</option>
        <!--
        <option value="/comunicacao/Ssindicais/add">Inserir</option>        
        //-->
    </select>
</div>
