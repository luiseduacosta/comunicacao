<?php
// pr($materias);
// pr($matriz);
// pr($datas);
// pr($tags);
// pr($ano);
// pr($mes);

?>

<?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
<?php $fecha = '01-' . $mes . '-2000'; ?>
<?php // echo "Mês " . strftime("%B", strtotime($fecha)); ?>

<?php echo $this->Html->css('blog', null, array('inline' => false)); ?>

<?php
// echo $this->element('submenu_materias') . "<br>";
?>

<?php
if (empty($mes)) {
    echo "<h1 align='center'>Matérias do ano de " . $ano . "</h1>";
} else {
    echo "<h1 align='center'>Matérias do mês de " . strftime("%B", strtotime($fecha)) . " do ano de " . $ano . "</h1>";
}
?>

<?php
if (isset($matriz)) {

    $i = 1;
    // echo "View Matriz" . "<br>";
    foreach ($matriz as $c_materia):

        $c_nova_materia[$i]['Materia']['titulo'] = $c_materia[0]['Materia']['titulo'];
        $c_nova_materia[$i]['Materia']['materia_id'] = $c_materia[0]['Materia']['id'];
        $c_nova_materia[$i]['Materia']['data'] = $c_materia[0]['Materia']['data'];
        $c_nova_materia[$i]['Materia']['conteudo'] = $c_materia[0]['Materia']['conteudo'];

        $j = 1;
        foreach ($c_materia[0]['Tag'] as $c_marca):
            $c_nova_materia[$i][$j]['Tag']['id'] = $c_marca['id'];
            $c_nova_materia[$i][$j]['Tag']['gt_setor'] = $c_marca['gt_setor'];
            $j++;
        endforeach;

        $i++;

    endforeach;
} elseif (isset($materias)) {

    $i = 1;
    // echo "View Materia" . "<br>";
    foreach ($materias as $c_materia):

        $c_nova_materia[$i]['Materia']['titulo'] = $c_materia['Materia']['titulo'];
        $c_nova_materia[$i]['Materia']['materia_id'] = $c_materia['Materia']['id'];
        $c_nova_materia[$i]['Materia']['data'] = $c_materia['Materia']['data'];
        $c_nova_materia[$i]['Materia']['conteudo'] = $c_materia['Materia']['conteudo'];

        $j = 1;
        foreach ($c_materia['Tag'] as $c_marca):
            $c_nova_materia[$i][$j]['Tag']['id'] = $c_marca['id'];
            $c_nova_materia[$i][$j]['Tag']['gt_setor'] = $c_marca['gt_setor'];
            $j++;
        endforeach;

        $i++;

    endforeach;
}

if (!empty($c_nova_materia)):
    $q_noticias = count($c_nova_materia);
    ?>

    <div align="center">
        <div class='blog_top'>
            <select onchange="window.location.href = this.value">
                <option value="" selected="selected">Matérias por ano/mês</option>
                <?php foreach ($datas as $c_anomes => $c_data): ?>
                     <option value=<?php echo '/comunicacao/Materias/blog/ano:' . substr($c_anomes, 0, 4) . '/mes:' . substr($c_anomes, 5, 2); ?>><?php echo substr($c_anomes, 0, 4) . ' do mês de ' . strftime("%B", strtotime("01-" . substr($c_anomes, 5, 2) . "-2000")); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select onchange="window.location.href = this.value">
                <option value="" selected="selected">Matérias por marcas</option>
                <?php foreach ($tags as $c_tag): ?>
                    <option value=<?php echo '/comunicacao/Materias/blog' . '/mes:' . $mes . '/ano:' . $ano . '/tag:' . $c_tag['tags']['id']; ?>><?php echo $c_tag['tags']['gt_setor'] . ': ' . $c_tag[0]['q_tags']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id='blog_left'>

        </div>

        <div id='blog'>

            <?php for ($i = 1; $i <= $q_noticias; $i++): ?>
                <?php //echo ;  ?>

                <table>

                    <tr style="color: #a00">
                        <td><h1><?php echo $this->Html->link($c_nova_materia[$i]['Materia']['titulo'], 'ver/' . $c_nova_materia[$i]['Materia']['materia_id']); ?></h1></td>
                    </tr>
                    <tr>
                        <td><?php echo "Publicada em " . $this->Time->format($c_nova_materia[$i]['Materia']['data'], '%e de %B de %Y'); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color: #a00">

                                <?php
                                $palavras = explode(" ", $c_nova_materia[$i]['Materia']['conteudo']);
                                echo "Palavras: " . count($palavras) . ". " . "Carateres: " . strlen($c_nova_materia[$i]['Materia']['conteudo']) . "<br>";
                                echo $this->text->truncate($c_nova_materia[$i]['Materia']['conteudo'], 1200, array(
                                    'ellipsis' => $this->Html->link(" ...", 'ver/' . $c_nova_materia[$i]["Materia"]["materia_id"]),
                                    'exact' => false,
                                    'html' => false
                                ));
                                ?>
                            </p>
                        </td>  
                    </tr>

                    <tr>

                        <td>Tags: 
                            <?php
                            if (isset($c_nova_materia[$i])) {
                                $q_tags = count($c_nova_materia[$i]) - 1;

                                for ($j = 1; $j <= $q_tags; $j++):
                                    echo $this->Html->link($c_nova_materia[$i][$j]['Tag']['gt_setor'], '/tags/ver/' . $c_nova_materia[$i][$j]['Tag']['id']);
                                    echo ", ";
                                endfor;
                            }
                            ?>
                        </td>

                    </tr>

                </table>

            <?php endfor; ?>
        </div>

        <?php
    else:
        echo "<h1>Ainda não há matérias publicadas neste mês!</h1>";
    endif;
    ?>

    <!--
    Menu lateral direito
    //-->
    <div id='blog_right'>

        <!--
        Tabela com a quantidade de matérias por ano e mês
        //-->
        <table>
            <tr><th colspan="2">Matérias</th></tr>
            <?php foreach ($datas as $c_anomes => $c_data): ?>
            <?php // echo "anomes: " . $c_anomes . " " . $c_data; ?>
                <tr>
                    <td><?php echo $this->Html->link(substr($c_anomes, 0, 4), 'blog/' . 'ano:' . substr($c_anomes, 0, 4)) . " - " . strftime("%B", strtotime("01-" . substr($c_anomes, 5, 2) . "-2000")); ?></td>
                    <td><?php echo '(' . $this->Html->link($c_data, 'blog/' . 'mes:' . substr($c_anomes, 5, 2) . '/ano:' . substr($c_anomes, 0, 4)) . ')'; ?></td>
                </tr>                         
            <?php endforeach; ?>
        </table>

        <!--
        Tabelas com as tags
        //-->
        <?php // pr($tags); ?>
        <table>
            <tr><th colspan="2">Marcas</th></tr>
            <?php foreach ($tags as $c_tag): ?>
                <tr>
                    <td><?php echo $this->Html->link($c_tag['tags']['gt_setor'], 'blog/' . 'mes:' . $mes . '/ano:' . $ano . '/tag:' . $c_tag['tags']['id']); ?></td>
                    <td><?php echo $c_tag[0]['q_tags']; ?></td>
                </tr>
            <?php endforeach; ?>        
        </table>

    </div>

</div>
