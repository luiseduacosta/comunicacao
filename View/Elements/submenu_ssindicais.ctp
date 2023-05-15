<div class="submenusuperior">
    <nav id="navbar-submenusuperior" class="navbar navbar-light bg-light">
        <ul class="nav nav-pills nav-fill">
            <?php echo "<li class='nav-item'>"; ?>
            <?php echo $this->Html->link('Listar', 'index/', array('class' => 'nav-link')); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Ver cada', 'vercada/', array('class' => 'nav-link')); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Ver sites', 'vercadasite/', array('class' => 'nav-link')); ?>    
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Regionais', 'regionais/', array('class' => 'nav-link')); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Estados', 'estados/', array('class' => 'nav-link')); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Sectores', 'sectores/', array('class' => 'nav-link')); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Inserir', 'add/', array('class' => 'nav-link')); ?>'
            <?php echo "</li>"; ?>

        </ul>
    </nav>
</div>
