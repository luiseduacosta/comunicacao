<?php // pr($materias); ?>
<?php // pr($pauta_id);   ?>
<?php // pr($pautas);   ?>
<?php // pr($pauta_titulo);   ?>

<table>
    <tr>
        <th>
            Data
        </th>
        <th>
            Pauta
        </th>
        <th>
            Situação
        </th>
    </tr>
    <?php
    if (isset($materias)):
        foreach ($materias as $c_materia):
            ?>  
            <tr>
                <td>
                    <?php echo $c_materia['Materia']['data']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link($c_materia['Materia']['titulo'], 'ver/' . $c_materia['Materia']['titulo']); ?>
                </td>
                <td>
                    <?php
                    $quantidade = count($c_materia['Observacoe']) - 1;
                    // echo $quantidade;
                    if ($quantidade > 0):
                        echo ($c_materia['Observacoe'][$quantidade]['observacoes']);
                    endif;
                    ?>
                </td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</table>

<?php
echo $this->Form->create('Materia', array('type' => 'file', array('url' => 'add')));

if (empty($pauta_titulo)) {
    echo $this->Form->input('pauta_id');
} else {
    // echo $this->Form->input('pauta_id', array('value' => $pauta_id));
    echo "<button type='button' style='font-size: 16px'>" . $this->Html->link($pauta_titulo['Pauta']['titulo'], '/pautas/ver/') . "</button>";
}

echo $this->Form->input('titulo', array('value' => $pauta_titulo['Pauta']['titulo']));
// echo $this->Form->input('conteudo');

echo $this->Form->input('conteudo', array('class' => 'ckeditor'));

echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));

echo $this->Form->input('informandes', array('type' => 'checkbox', 'default' => 0));

echo $this->Form->input('anexo', array('type' => 'file', 'multiple' => 'multiple'));

echo $this->Form->input('Tag', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => $tags,
    'value' => ('Tag.Tag')
        )
);
echo $this->Form->end('Salvar');

?>
