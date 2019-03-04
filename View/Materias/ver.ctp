<?php
// pr($materias);
?>

<?php
echo $this->element('submenu_materias');
?>

<div class="subsubmenusuperior">
    <?php echo $this->Html->link("Editar", "editar/" . $materias['Materia']['id'], array('class' => 'aba')); ?>
    <?php echo $this->Html->link("Comentar", "comentar/" . $materias['Materia']['id'], array('class' => 'aba')); ?>
    <?php
    if ($materias['Materia']['publicar'] == 0):
        echo $this->Html->link("Publicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], array('class' => 'aba'));
    elseif (($materias['Materia']['publicar'] == 1)):
        echo $this->Html->link("Despublicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], array('class' => 'aba'));
    endif;
    ?>
    <?php echo $this->Html->link('Excluir', 'excluir/' . $materias['Materia']['id'], array('confirm' => 'Confirma excluir este item?', 'class' => 'aba')); ?>
</div>

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

    <?php if ($materias['Materia']['informandes'] == 1): ?>
        <tr>
            <td width = 8%>InformAndes</td>
            <td><?php echo $materias['Materia']['informandes']; ?></td>
        </tr> 
    <?php endif; ?>

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
                    $anexo_extensao = explode(".", $anexos[$i]);
                    // pr(end($anexo_extensao));
                    // die();
                    if (end($anexo_extensao) === 'pdf' or end($anexo_extensao) === 'doc' or end($anexo_extensao) === 'docx'):
                        echo $this->Html->link($anexos[$i], '/files/' . trim($anexos[$i]));
                    else:
                        $image = $this->Html->image('/files/' . trim($anexos[$i]), array('width' => '100px'));
                        echo $this->Html->link($image, '/files/' . trim($anexos[$i]), array('escape' => false));

                    endif;
                    echo "  " . $i . "  ";
                    echo $this->Html->link('Excluir', 'excluiranexo/' . $materias['Materia']['id'] . '/arquivo:' . trim($anexos[$i]), array('confirm' => 'Confirma excluir este arquivo'));
                    echo "<br>";
                endfor;
                ?>
            </td>
        </tr>
    <?php endif; ?>

    <?php
    echo "<tr>";
    if (!empty($materias['Observacoe'])) {
        echo "<table>";
        foreach ($materias['Observacoe'] as $c_observacoe) {
            // debug($c_observacoe);
            echo "<tr>";
            echo "<td>" . $this->Time->format($c_observacoe['data'], '%d-%m-%Y') . "</td>";
            echo "<td>" . $c_observacoe['autor'] . "</td>";
            echo "<td>" . strip_tags($c_observacoe['observacoes']) . "</td>";
            echo "<td>" . $this->Html->link('Editar', '/observacoes/editar/' . $c_observacoe['id']) . "</td>";
            echo "<td>" . $this->Html->link('Excluir', '/observacoes/excluir/' . $c_observacoe['id'], array('confirm' => 'Excluir?')) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    echo "</tr>";
    ?>

</table>

<table>

    <tr>
        <td width = 8%>Tag</td>

        <td>
            <?php foreach ($materias['Tag'] as $tag): ?>        
                <?php echo $tag['gt_setor']; ?>
                <?php echo ", "; ?>
            <?php endforeach; ?>            
        </td>

    </tr>

</table>
