<?php
echo $this->element('submenu_ssindicais');
?>

<?php
$this->Html->link('Editar', 'editar/');
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

    <h1>Seções sindicais</h1>

    <table class="table table-hover table-responsive table-striped">

        <?php foreach ($ssindicais as $c_ssindicais): ?>
            <tr>
                <td width="15%">Seção sindical</td>
                <td><h1><?php echo $this->Html->link($c_ssindicais['Ssindical']['Secao_sindical'], 'ver/' . $c_ssindicais['Ssindical']['Id']); ?></h1></td>
            </tr>

            <tr>
                <td>Seção sindical por extenso</td>
                <td><?php echo $c_ssindicais['Ssindical']['Secao_sindical_extenso']; ?></td>
            </tr>

            <tr>
                <td>Estado</td>
                <td><?php echo $this->Html->link($c_ssindicais['Ssindical']['Estado'], 'seleciona/estado/' . $c_ssindicais['Ssindical']['Estado']); ?></td>
            </tr>

            <tr>
                <td>Regional</td>
                <td><?php echo $this->Html->link($c_ssindicais['Ssindical']['Regional'], 'seleciona/regional/' . $c_ssindicais['Ssindical']['Regional']); ?></td>
            </tr>

            <tr>
                <td>Setor</td>
                <td><?php echo $this->Html->link($c_ssindicais['Ssindical']['Setor'], 'seleciona/setor/' . $c_ssindicais['Ssindical']['Setor']); ?></td>
            </tr>

            <tr>
                <td>Site</td>
                <td><?php
            echo $this->Html->link($c_ssindicais['Ssindical']['Site'], 'http://' . $c_ssindicais['Ssindical']['Site'], array(
                'target' => '_blank',
                'escape' => false));
            ?></td>
            </tr>

            <!--
            <tr>
                <td>Pulsefeed</td>
                <td><?php // echo $c_ssindicais['Ssindicai']['Pulsefeed'];    ?></td>
            </tr>        
        //-->

            <tr>
                <td>Facebook</td>
                <td><?php
                echo $this->Html->link($c_ssindicais['Ssindical']['Facebook'], $c_ssindicais['Ssindical']['Facebook'], array(
                    'target' => '_blank',
                    'escape' => false));
            ?></td>
            </tr>

            <tr>
                <td>YouTube</td>
                <td><?php
                echo $this->Html->link($c_ssindicais['Ssindical']['Youtube'], $c_ssindicais['Ssindical']['Youtube'], array(
                    'target' => '_blank',
                    'escape' => false));
            ?></td>
            </tr>

            <tr>
                <td>Observações</td>
                <td><?php echo $c_ssindicais['Ssindical']['Observacoes']; ?></td>
            </tr>


            <link rel="import" href="<?php echo 'http://' . $c_ssindicais['Ssindical']['Site']; ?>">

        <?php endforeach; ?>

    </table>
</div>