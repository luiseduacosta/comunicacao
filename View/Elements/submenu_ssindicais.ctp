<div class="submenusuperior">
    <nav id="navbar-submenusuperior" class="navbar navbar-light bg-light">
        <ul class="nav nav-pills nav-fill">
            <?php echo "<li class='nav-item'>"; ?>
            <?php echo $this->Html->link('Listar', 'index/', ['class' => 'nav-link']); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Ver cada', 'vercada/', ['class' => 'nav-link']); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Ver sites', 'vercadasite/', ['class' => 'nav-link']); ?>    
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Regionais', 'regionais/', ['class' => 'nav-link']); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Estados', 'estados/', ['class' => 'nav-link']); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Sectores', 'sectores/', ['class' => 'nav-link']); ?>
            <?php echo "</li>"; ?>
            <?php echo "<li class='nav-item'>"; ?>

            <?php echo $this->Html->link('Inserir', 'add/', ['class' => 'nav-link']); ?>'
            <?php echo "</li>"; ?>

        </ul>
    </nav>
</div>
