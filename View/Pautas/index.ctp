<?php //pr($matriz);  ?>
<?php // pr($pautas);  ?>

<?php
echo $this->element('submenu_pautas');
?>

<?php
// pr($matriz);
?>
<div class="container">

    <?php
    echo "<div align = 'center'>";

    echo $this->Paginator->numbers();

    echo "<br>";

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

    <table>

        <tr>
            <!--
            <th>Id</th>
            -->
            <th><?php echo $this->Paginator->sort('data', 'Data'); ?></th>
            <th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
            <th><?php echo $this->Paginator->sort('anexo', 'Anexo'); ?></th>
            <th><?php echo 'Situação'; ?></th>
        </tr>

        <?php foreach ($matriz as $pauta): ?>
            <tr>
                <td width='10%'><?php echo $this->Time->format($pauta['Pauta']['data'], '%d-%m-%Y'); ?></td>    
                <td><?php echo $this->Html->link($pauta['Pauta']['titulo'], 'ver/' . $pauta['Pauta']['id']); ?></td>
                <td>
                    <?php
                    $anexos = explode(',', $pauta['Pauta']['anexo']);
                    $i = 1;
                    foreach ($anexos as $c_anexo):
                        if ($c_anexo):
                            echo $this->Html->link($i . " ", '/files/' . trim($c_anexo));
                        endif;
                        $i++;
                    endforeach;
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($pauta['Comentapauta'])):
                        $ultimo_comentario = max($pauta['Comentapauta']);
                        echo $ultimo_comentario['comentario'];
                    endif;
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>