<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<?php // debug($this->data); ?>

<?php
echo $this->element('submenu_materias');
?>

<?php

echo $this->Form->create('Materia');
// echo $this->Form->input('pauta_id');
echo $this->Form->input('Materia.titulo');

echo $this->Form->textarea('Materia.conteudo', array('class' => 'ckeditor'));

echo $this->Form->input('Materia.data');

if (!empty($this->data['Observacoe'])) {
    echo "<table>";
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