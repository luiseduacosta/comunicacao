<div class="submenusuperior">
    <nav class="navbar navbar-light bg-light">    
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?php echo $this->Html->link('Listar', 'index/', array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Ver cada', 'vercada/', array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Inserir', '/Pautas/index', array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("InformAndes", "/Materias/index/informandes:1", array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Buscar', 'buscar/', array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Classificar', 'sem_classificar/', array('class' => 'nav-link')); ?>
            </li>

        </ul>
    </nav>
</div>
