<?php// debug($this->data);  ?>

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

<div class="container">

<?php
echo $this->Form->create('Materia', array('type' => 'file'));

echo $this->Form->input('Materia.titulo', array('label' => "Título <span id='conta'></span>", 'onkeyup' => 'javascript:contacarateres()'));

echo $this->Form->textarea('Materia.conteudo', array('class' => 'ckeditor'));

echo $this->Form->input('Materia.data');

echo $this->Form->input('Materia.informandes', array('type' => 'checkbox', 'inputDefaults' => array('div' => false)));

if (!empty($this->data['Materia']['anexo'])):
    $anexos = explode(',', $this->data['Materia']['anexo']);
    foreach ($anexos as $c_anexo):
        echo "Anexos: " . $this->Html->link($c_anexo, '/files/' . trim($c_anexo));
        echo "<br>";
    endforeach;
    echo $this->Form->input('anexo', array('value' => $this->data['Materia']['anexo'], 'type' => 'hidden'));
else:
    echo $this->Form->input('anexo.', array('type' => 'file', 'multiple'));
endif;

if (!empty($this->data['Observacoe'])) {
    echo "<table class='table'>";
    foreach ($this->data['Observacoe'] as $c_observacoe) {
        // debug($c_observacoe);
        echo "<tr>";
        echo "<td>Comentários:</td><td>" . $c_observacoe['observacoes'] . "</td>";
        echo "<td>Autor:</td><td>" . $c_observacoe['autor'] . "</td>";
        echo "<td>Data:</td><td>" . $this->Time->format($c_observacoe['data'], '%d-%m-%Y') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
/*
  echo $this->Form->input('Observacoe.materia_id', array('type' => 'hidden', 'value' => $this->data['Materia']['id']));
  echo $this->Form->input('Observacoe.observacoes', array('type' => 'textarea', 'class' => 'ckeditor'));
  echo $this->Form->input('Observacoe.autor', array('type' => 'text'));
 */

$c_selecao = NULL;
if (isset($tags_selecionadas)) {
    foreach ($tags_selecionadas as $c_tag):
// echo $c_tag['id'];
        $c_selecao[] = $c_tag['id'];
    endforeach;
}
// pr($c_selecao);
// die();

echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => $tags,
    'value' => $c_selecao
        )
);

echo $this->Form->input('Materia.id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
?>
</div>