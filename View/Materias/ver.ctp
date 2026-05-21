<?php
// pr($materias);
?>

<?php
echo $this->element('submenu_materias');
?>

<div class="container">

    <div class="subsubmenusuperior">
        <nav class="navbar navbar-light bg-light">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <?php echo $this->Html->link("Editar", "editar/" . $materias['Materia']['id'], ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link("Comentar", "comentar/" . $materias['Materia']['id'], ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?php
                    if ($materias['Materia']['publicar'] == 0):
                        echo $this->Html->link("Publicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], ['class' => 'nav-link']);
                    elseif (($materias['Materia']['publicar'] == 1)):
                        echo $this->Html->link("Despublicar", "publicar/id:" . $materias['Materia']['id'] . '/publicar:' . $materias['Materia']['publicar'], ['class' => 'nav-link']);
                    endif;
                    ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Excluir', 'excluir/' . $materias['Materia']['id'], array('confirm' => 'Confirma excluir este item?', 'class' => 'nav-link')); ?>
                </li>
            </ul>
        </nav>
    </div>

    <table class="table table-hover table-responsive table-striped">

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

    <table class="table table-hover table-responsive table-striped">

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
</div>