<?php // pr($materias);     ?>

<?php
if (isset($informandes) && $informandes == 0):
    echo $this->element('submenu_materias');
elseif (isset($informandes) && $informandes == 1):
    echo $this->element('submenu_informandes');
endif;
?>

<div class="container">

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

    <table class="table table-hover table-responsive table-striped">

        <tr>

            <th><?php echo $this->Paginator->sort('pauta_id', 'Pauta'); ?></th>
            <th><?php echo $this->Paginator->sort('data', 'Data'); ?></th>
            <th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
            <th><?php echo $this->Paginator->sort('anexo', 'Anexos'); ?></th>
            <th><?php echo "Comentários"; ?></th>
            <th><?php echo $this->Paginator->sort('publicar', 'Publicado'); ?></th>
        </tr>

        <?php foreach ($materias as $materia): ?>

            <tr>
                <td><?php echo $this->Html->link($materia['Materia']['pauta_id'], '/pautas/ver/' . $materia['Materia']['pauta_id']); ?></td>
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

                <?php
                // pr($materia);
                if ($materia["Observacoe"]) {
                    $quantidade = count($materia["Observacoe"]) - 1;
                    echo "<td>" . $materia["Observacoe"][$quantidade]['observacoes'] . "</td>";
                } else {
                    echo "<td></td>";
                }
                ?>

                <td>
                    <?php
                    if ($materia['Materia']['publicar'] == 0) {
                        echo $this->Form->create('Materia', array('url' => 'publicar'));
                        echo $this->Form->input('publicar', array(
                            'type' => 'hidden',
                            'default' => 1,
                        ));
                        echo $this->Form->input('id', array('value' => $materia['Materia']['id'], 'type' => 'hidden'));
                        echo $this->Form->submit(
                                'Publicar', array('div' => FALSE, 'style' => array('background: #003d4c; font-size: 70%; color: #fff'))
                        );
                        echo $this->Form->end();
                    } else {
                        echo $this->Form->create('Materia', array('url' => 'publicar'));
                        echo $this->Form->input('publicar', array(
                            'type' => 'hidden',
                            'default' => 0,
                        ));
                        echo $this->Form->input('id', array('value' => $materia['Materia']['id'], 'type' => 'hidden'));
                        echo $this->Form->submit(
                                'Despublicar', array('div' => FALSE, 'style' => array('font-size: 70%; color: #000'))
                        );
                        echo $this->Form->end();
                    }
                    ?>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>