<?php // pr($materias);  ?>

<?php
echo $this->element('submenu_materias');
?>

<?php
echo "<div align = 'center'>";

echo $this->Paginator->numbers();

echo "<br>";

// Shows the next and previous links
echo $this->Paginator->prev(
        '« Anterior ', null, null, array('class' => 'disabled')
);
echo $this->Paginator->next(
        ' Posterior »', null, null, array('class' => 'disabled')
);

echo "<br>";

echo $this->Paginator->counter();

echo "</div>";
?>

<h1>Matérias</h1>

<table>

    <tr>

        <th><?php echo $this->Paginator->sort('data', 'Data'); ?></th>
        <th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
        <th><?php echo $this->Paginator->sort('anexo', 'Anexo');  ?></th>
        
    </tr>

    <?php foreach ($materias as $materia): ?>

        <tr>

            <td width='10%'><?php echo $this->Time->format($materia['Materia']['data'], '%d-%m-%Y'); ?></td>            
            <td><?php echo $this->Html->link($materia['Materia']['titulo'], 'ver/' . $materia['Materia']['id']); ?></td>            
            <td>
                <?php
                $anexos = explode(',', $materia['Materia']['anexo']);
                $i = 1;
                foreach ($anexos as $c_anexo):
                    if ($c_anexo):
                        echo $this->Html->link($i . ' ', '/files/' . trim($c_anexo));
                    endif;
                    $i++;
                endforeach;
                ?>
            </td>

        </tr>
    <?php endforeach; ?>

</table>
