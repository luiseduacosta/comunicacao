<div class="submenusuperior">
    <nav class="navbar navbar-light bg-light">    
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?php echo $this->Html->link('Listar', 'index/', ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Ver cada', 'vercada/', ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Inserir', '/Pautas/index', ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("InformAndes", "/Materias/index/informandes:1", ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Buscar', 'buscar/', ['class' => 'nav-link']); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link('Classificar', 'sem_classificar/', ['class' => 'nav-link']); ?>
            </li>

        </ul>
    </nav>
</div>
