<?php
echo $this->element('submenu_materias');
?>

<div class="container">
    <?php
// pr($materia_nao_classificada);
    if (empty($materia_nao_classificada)) {
        echo "Todas as matérias estão classificadas" . "<br>";
        // exit();
    } else {

// Shows the page numbers
        ?>
        <h1>Matérias não classificadas</h1>

        <table class="table table-hover table-responsive table-striped">

            <?php foreach ($materia_nao_classificada as $c_materia): ?>
                <?php // pr($c_materia); ?>
                <tr>
                    <td><?php echo $this->Html->link($c_materia["Materia"]['titulo'], 'ver/' . $c_materia["Materia"]['id']); ?></td>
                    <!--
                    <td><?php echo $c_materia["Materia"]['conteudo']; ?></td>
                    -->
                    <td><?php echo $c_materia["Materia"]['data']; ?></td>

                    <td><?php // echo $c_materia["Materia"]['observacoes'];   ?></td>
                </tr>

            <?php endforeach; ?>

        </table>

        <?php
    }
    ?>
</div>