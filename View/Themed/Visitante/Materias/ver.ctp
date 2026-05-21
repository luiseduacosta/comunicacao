<?php
// pr($materias);
?>

<?php
echo $this->element('submenu_materias');
?>

<!--
<div class="subsubmenusuperior">
    <?php echo $this->Html->link("Editar", "editar/" . $materias['Materia']['id'], ['class' => 'aba']); ?>
    <?php echo $this->Html->link("Comentar", "comentar/" . $materias['Materia']['id'], ['class' => 'aba']); ?>
    <?php
    if ($materias['Materia']['publicar'] == 0):
        echo $this->Html->link("Publicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], ['class' => 'aba']);
    elseif (($materias['Materia']['publicar'] == 1)):
        echo $this->Html->link("Despublicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], ['class' => 'aba']);
    endif;
    ?>
    <?php echo $this->Html->link('Excluir', 'excluir/' . $materias['Materia']['id'], array('confirm' => 'Confirma excluir este item?', 'class' => 'aba')); ?>
</div>
//-->

<!--
<div class="celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Esta matéria</option>
        <option value="/comunicacao/Materias/editar/<?php echo $materias['Materia']['id']; ?>">Editar esta matéria</option>
        <option value="/comunicacao/Materias/comentar/<?php echo $materias['Materia']['id']; ?>">Comentar esta matéria</option>
        <?php if ($materias['Materia']['publicar'] == 0): ?>
            <option value="/comunicacao/Materias/publicar/id:<?php echo $materias['Materia']['id'] . "/publicar:" . $materias['Materia']['publicar']; ?>">Publicar esta matéria</option>
        <?php elseif ($materias['Materia']['publicar'] == 1): ?>
            <option value="/comunicacao/Materias/publicar/id:<?php echo $materias['Materia']['id'] . "/publicar:" . $materias['Materia']['publicar']; ?>">Despublicar esta matéria</option>
        <?php endif; ?>
    </select>
</div>
//-->

<table>

    <tr>
        <td width = 8%>Título</td>
        <td><?php echo $materias['Materia']['titulo']; ?></td>
    </tr>

    <tr>
        <td width = 8%>Conteúdo</td>
        <td><?php echo $materias['Materia']['conteudo']; ?></td>
    </tr>

    <tr>
        <td width = 8%>Data</td>
        <td><?php echo $this->Time->format($materias['Materia']['data'], '%d-%m-%Y'); ?></td>
    </tr>
    
    <?php if (!empty($materias['Materia']['anexo'])): ?>
        <tr>
            <td>
                Anexos
            </td>
            <td>
                <?php
                $anexos = explode(',', $materias['Materia']['anexo']);
                // echo count($anexos); 
                for ($i = 0; $i < count($anexos); $i++):
                    echo $this->Html->link($anexos[$i], '/files/' . trim($anexos[$i]));
                    echo "  " . $i . "  ";
                    echo $this->Html->link('Excluir', 'excluiranexo/' . $materias['Materia']['id'] . '/arquivo:'. trim($anexos[$i]));
                    echo "<br>";
                endfor;
                ?>
            </td>
        </tr>
    <?php endif; ?>

</table>

<table>

    <tr>
        <td width = 8%>Tag</td>

        <td>
            <?php $tamanho = sizeof($materias['Tag']); ?>
            <?php $i = 1; ?> 
            <?php foreach ($materias['Tag'] as $tag): ?>        
                <?php echo trim($tag['gt_setor']); ?>
                <?php if ($i < $tamanho and $i < $tamanho - 1): ?>
                <?php echo ", "; ?>
                <?php elseif ($i < $tamanho and $i == $tamanho - 1): ?>
                <?php echo "e "; ?>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>            
        </td>

    </tr>

</table>
