<?php // pr($pautas);                        ?>

<?php
// echo $this->element('submenu_pautas');
?>

<div class="subsubmenusuperior">
    <nav class="navbar nav-pills bg-light">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?php echo $this->Html->link("Editar pauta", "editar/" . $pautas['Pauta']['id'], array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo $this->Html->link("Comentar pauta", "/Comentapautas/add/" . $pautas['Pauta']['id'], array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php // echo $this->Html->link("Excluir pauta", "excluir/" . $pautas['Pauta']['id'], array('class' => 'aba')); ?>
            </li>
            <li class="nav-item">
                <?php
                if ($pautas['Pauta']['arquivar'] == 0):
                    echo $this->Html->link("Arquivar pauta", "arquivar/id:" . $pautas['Pauta']['id'] . '/arquivar:' . $pautas['Pauta']['arquivar'], array('class' => 'nav-link'));
                elseif ($pautas['Pauta']['arquivar'] == 1):
                    echo $this->Html->link("Desarquivar pauta", "arquivar/id:" . $pautas['Pauta']['id'] . '/arquivar:' . $pautas['Pauta']['arquivar'], array('class' => 'nav-link'));
                endif;
                ?>
            </li>
            <li class="nav-item">   
                <?php echo $this->Html->link("Fazer/Ver matéria", "/materias/busca_pauta_id/" . $pautas['Pauta']['id'], array('class' => 'nav-link')); ?>
            </li>
        </ul>
    </nav>
</div>

<div class="container">

    <table class="table table-hover table-responsive table-striped">

        <tr>
            <td>Titulo</td>
            <td>
                <?php echo $pautas['Pauta']['titulo']; ?>
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Conteúdo</td>
            <td>
                <?php echo $pautas['Pauta']['conteudo']; ?>
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Data</td>
            <td>
                <?php echo $this->Time->format($pautas['Pauta']['data'], '%d-%m-%Y'); ?>
            </td>
            <td></td>
        </tr>

        <?php if ($pautas['Pauta']['informandes'] == 1): ?>
            <tr>
                <td>InformAndes</td>
                <td>
                    <?php echo $pautas['Pauta']['informandes'];
                    ?>
                </td>
                <td></td>
            </tr>
        <?php endif; ?>

        <?php if ((isset($pautas['Pauta']['anexo']) && (!empty($pautas['Pauta']['anexo'])))): ?>
            <?php // pr($pautas['Pauta']['anexo']); ?>
            <?php $anexos = explode(',', $pautas['Pauta']['anexo']); ?>
            <?php // pr($anexos); ?>

            <?php foreach ($anexos as $c_anexo): ?>
                <tr>
                    <?php // pr($c_anexo); ?>
                    <td>
                        Anexo: 
                    </td>
                    <td>
                        <?php
                        $anexo_extensao = explode(".", $c_anexo);
                        // pr(end($anexo_extensao));
                        // die();
                        if (end($anexo_extensao) === 'pdf' or end($anexo_extensao) === 'doc' or end($anexo_extensao) === 'docx'):
                            echo $this->Html->link($c_anexo, '/files/' . trim($c_anexo), array('style' => 'div', 'width:120px'));
                        else:
                            $image = $this->Html->image('/files/' . trim($c_anexo), array('width' => '100px'));
                            // echo $image;
                            echo $this->Html->link($image, '/files/' . trim($c_anexo), array('escape' => false));
                        endif;

                        echo " < - > ";
                        echo $this->Html->link('Excluir', 'excluiranexo/' . $pautas['Pauta']['id'] . '/anexo:' . trim($c_anexo), array('confirm' => "Confirma excluir este arquivo"));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php endif; ?>
    </table>
</div>

<div class="container">
    <table class="table table-hover table-responsive table-striped">

        <?php foreach ($pautas['Comentapauta'] as $c_pauta): ?>
            <?php // pr($c_pauta);   ?>
            <tr>
                <td>
                    <?php echo "Comentário: " . $this->Time->format($c_pauta['data'], '%d-%m-%Y') . ". " . $c_pauta['autor'] . ". " . $c_pauta['comentario']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Editar', '/Comentapautas/editar/' . $c_pauta['id']); ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Excluir', '/Comentapautas/excluir/' . $c_pauta['id']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>