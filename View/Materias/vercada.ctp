<?php
// pr($materias);
?>

<?php
echo $this->element('submenu_materias');
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

<h1>Matérias</h1>

<table class="table table-hover table-responsive table-striped">
    <?php foreach ($materias as $c_materia): ?>
        <tr>
            <td>Título</td>
            <td colspan="7"><h1><?php echo $this->Html->link($c_materia['Materia']['titulo'], 'ver/' . $c_materia['Materia']['id']); ?></h1></td>
        </tr>

        <tr>
            <td>Conteúdo</td>
            <td colspan="7"><?php echo $c_materia['Materia']['conteudo']; ?></td>
        </tr>

        <tr>
            <td>Data</td>
            <td colspan="7"><?php echo $this->Time->format($c_materia['Materia']['data'], '%d-%m-%Y'); ?></td>
        </tr>

        <tr>
        <td>Anexo</td>
        <td><?php echo $c_materia['Materia']['anexo']; ?></td>
        </tr>

        <tr>
            <td>Tags</td>
            <td colspan="7">
                <?php foreach ($c_materia['Tag'] as $c_tag): ?>
                    <?php echo $c_tag['gt_setor']; ?>
                    <?php echo ", "; ?>
                <?php endforeach; ?>
            </td>
        </tr>


        <?php
        if (!empty($c_materia['Observacoe'])) {
            foreach ($c_materia['Observacoe'] as $c_observacoe):
                // debug($c_observacoe);
                echo "<tr>";
                echo "<td>Data:</td><td>" . $c_observacoe['data'] . "</td>";
                echo "<td>Autor:</td><td>" . $c_observacoe['autor'] . "</td>";
                echo "<td>Comentários:</td><td>" . $c_observacoe['observacoes'] . "</td>";
                echo "<td>" . $this->Html->link('Editar', '/Observacoes/editar/' . $c_observacoe['id']) . "</td>";
                echo "<td>" . $this->Html->link('Excluir', '/Observacoes/excluir/' . $c_observacoe['id']) . "</td>";
                echo "</tr>";
            endforeach;
        };
        ?>

    <?php endforeach; ?>
</table>
</div>