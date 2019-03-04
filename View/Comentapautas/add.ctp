<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php // pr($comentapautas); ?>

<?php
// echo $this->element('submenu_pautas');
?>

<h1>Inserir comentário</h1>

<fieldset>
    <?php
    echo '<legend>' . $this->Html->link($comentapautas['Pauta']['titulo'], '/pautas/ver/' . $comentapautas['Pauta']['id']) . '</legend>';
    foreach ($comentapautas['Comentapauta'] as $c_comentapautas):
        // pr($c_comentapautas);
        echo $c_comentapautas['data'] . " " . $c_comentapautas['autor'] . " " . $c_comentapautas['comentario'];
        echo "<br>";
    endforeach;
    ?>
</fieldset>
<fieldset>
    <?php
    echo $this->Form->create('Comentapauta');
    echo $this->Form->input('pauta_id', array('value' => $comentapautas['Pauta']['id'], 'type' => 'hidden'));
    echo $this->Form->input('comentario', array('label' => 'Comentário', 'type' => 'textarea', 'class' => 'ckeditor'));
    echo $this->Form->input('autor', array('label' => 'Autor do comentário'));
    echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));
    echo $this->Form->end('Salvar');
    ?>
</fieldset>    