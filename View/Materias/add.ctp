<?php

// pr($pautas);
// pr($pauta_titulo);
// pr($tags);
// pr($pessoas);
// pr ($materias);
// echo "Valor " . $pauta_id;
?>

<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<script type="text/javascript">
    function contacarateres() {
         var x = document.getElementById('MateriaTitulo');
         var n = x.value.length;
         document.getElementById("conta").innerHTML = n;
    }
</script>

<?php
echo $this->element('submenu_materias');
?>

<?php

echo $this->Form->create('Materia', array('type' => 'file'));
if (empty($pauta_titulo)) {
    echo $this->Form->input('pauta_id');
} else {
    // echo $this->Form->input('pauta_id', array('type' => 'text', 'value' => $pauta_id));
    echo "<br>
    <button type = 'button' style = 'font-size : 16px'>" . $this->Html->link($pauta_titulo['Pauta']['titulo'], '/pautas/ver/' . $pauta_id) . "</button>"
;
}
echo $this->Form->input('titulo', array('value' => $pauta_titulo['Pauta']['titulo'], 'label' => "Título <span id='conta'></span>", 'onkeyup' => 'javascript:contacarateres()'));

echo $this->Form->input('conteudo', array('type' => 'textarea', 'class' => 'ckeditor'));

echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));

echo $this->Form->input('informandes', array('type' => 'checkbox', 'default' => 0));

echo $this->Form->input('anexo.', array('type' => 'file', 'multiple'));

echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => $tags,
    'value' => ('Tag.Tag')
        )
);
echo $this->Form->end('Guardar');

?>
