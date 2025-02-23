<?php // pr($pautas);     ?>

<?php
// echo $this->element('submenu_pautas');
?>
<!--
<div class="subsubmenusuperior">
    <?php echo $this->Html->link("Editar pauta", "editar/" . $pautas['Pauta']['id'], ['class' => 'aba']); ?>
    <?php echo $this->Html->link("Comentar pauta", "/Comentapautas/add/" . $pautas['Pauta']['id'], ['class' => 'aba']); ?>
    <?php // echo $this->Html->link("Excluir pauta", "excluir/" . $pautas['Pauta']['id'], ['class' => 'aba']); ?>
    <?php
    if ($pautas['Pauta']['arquivar'] == 0):
        echo $this->Html->link("Arquivar pauta", "arquivar/id:" . $pautas['Pauta']['id'] . '/arquivar:' . $pautas['Pauta']['arquivar'], ['class' => 'aba']);
    elseif ($pautas['Pauta']['arquivar'] == 1):
        echo $this->Html->link("Desarquivar pauta", "arquivar/id:" . $pautas['Pauta']['id'] . '/arquivar:' . $pautas['Pauta']['arquivar'], ['class' => 'aba']);
    endif;
    ?>
    <?php echo $this->Html->link("Fazer/Ver matéria", "/materias/busca_pauta_id/" . $pautas['Pauta']['id'], ['class' => 'aba']); ?>
    <?php echo "<br>"; ?>
</div>
//-->

<!--
<div class="celular">
    <select onchange="window.location.href = this.value" class="aba">
        <option value="" selected="selected">Esta pauta</option>
        <option value="/comunicacao/Pautas/editar/<?php echo $pautas['Pauta']['id'] ;?>">Editar esta pauta</option>
        <option value="/comunicacao/Comentapautas/add/<?php echo $pautas['Pauta']['id'] ;?>">Comentar esta pauta</option>
        <?php if ($pautas['Pauta']['arquivar'] == 0): ?>
            <option value="/comunicacao/Pautas/arquivar/id:<?php echo $pautas['Pauta']['id'] . "/arquivar:" . $pautas['Pauta']['arquivar']; ?>">Arquivar esta pauta</option>
        <?php elseif ($pautas['Pauta']['arquivar'] == 1): ?>
            <option value="/comunicacao/Pautas/arquivar/id:<?php echo $pautas['Pauta']['id'] . "/arquivar:" . $pautas['Pauta']['arquivar']; ?>">Desarquivar esta pauta</option>
        <?php endif; ?>
        <option value="/comunicacao/Materias/busca_pauta_id">Fazer/ver matéria desta pauta</option>  
    </select>
</div>
//-->

<table>

    <tr>
        <td>Titulo</td>
        <td>
            <?php echo $pautas['Pauta']['titulo']; ?>
        </td>
    </tr>

    <tr>
        <td>Conteúdo</td>
        <td>
            <?php echo $pautas['Pauta']['conteudo']; ?>
        </td>
    </tr>

    <tr>
        <td>Data</td>
        <td>
            <?php echo $this->Time->format($pautas['Pauta']['data'], '%d-%m-%Y'); ?>
        </td>
    </tr>

        <?php if ((isset($pautas['Pauta']['anexo']) && (!empty($pautas['Pauta']['anexo'])))): ?>
        <?php // pr($pautas['Pauta']['anexo']); ?>
        <?php $anexos = explode(',', $pautas['Pauta']['anexo']); ?>
        <?php // pr($anexos); ?>
        <?php if (count($anexos) > 1): ?>

            <?php foreach ($anexos as $c_anexo): ?>
                <tr>
                    <?php // pr($c_anexo); ?>
                    <td>
                        Anexo: 
                    </td>
                    <td>
                        <?php echo $this->Html->link($c_anexo, '/files/' . trim($c_anexo), array('style' => 'div', 'width:120px')); ?>
                        <?php echo " < - > "; ?>
                        <?php echo $this->Html->link('Excluir', 'excluiranexo/' . $pautas['Pauta']['id'] . '/anexo:' . trim($c_anexo)); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td>Anexo</td>
                <td>
                    <?php echo $this->Html->link($pautas['Pauta']['anexo'], '/files/' . $pautas['Pauta']['anexo']); ?>
                </td>
                <td>
                    <?php echo $this->Html->link('Excluir', 'excluiranexo/' . $pautas['Pauta']['id']); ?>
                </td>
            </tr>        
        <?php endif; ?>
    <?php endif; ?>
    
</table>

<table>

    <?php foreach ($pautas['Comentapauta'] as $c_pauta): ?>
        <?php // pr($c_pauta);  ?>
        <tr>
            <td>
                <?php echo "Comentário: " . $this->Time->format($c_pauta['data'], '%d-%m-%Y') . ". " . $c_pauta['autor'] . ". " . $c_pauta['comentario']; ?>
            </td>
            <td>
                <?php // echo $this->Html->link('Editar', '/Comentapautas/editar/' . $c_pauta['id']); ?>
            </td>            
            <td>
                <?php // echo $this->Html->link('Excluir', '/Comentapautas/excluir/' . $c_pauta['id']); ?>
            </td>
        </tr>
    <?php endforeach; ?>
        
</table>
