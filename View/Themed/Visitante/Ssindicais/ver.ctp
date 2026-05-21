<?php
pr($ssindicai);
?>

<?php
echo $this->element('submenu_ssindicais');
?>

<?php
// echo $this->Html->link('Editar', 'editar/' . $ssindicai['Ssindicai']['Id'], array('class' => 'aba'));
// echo $this->Html->link('Excluir', 'excluir/' . $ssindicai['Ssindicai']['Id'], array('class' => 'aba'));
?>

<table>
    <tr>
        <td>Seção sindical - sigla</td>
        <td>
            <?php echo $ssindicai['Ssindical']['Secao_sindical']; ?>
        </td>
    </tr>
    <tr>
        <td>Seção sindical por extenso</td>
        <td>
            <?php echo $ssindicai['Ssindical']['Secao_sindical_extenso']; ?>
        </td>
    </tr>
    <tr>
        <td>Regional</td>
        <td>
            <?php echo $ssindicai['Ssindical']['Regional']; ?>
        </td>
    </tr>
    <tr>
        <td>Estado</td>
        <td>
            <?php echo $ssindicai['Ssindical']['Estado']; ?>
        </td>
    </tr>
    <tr>
        <td>Setor</td>
        <td>
            <?php echo $ssindicai['Ssindical']['Setor']; ?>
        </td>
    </tr>
    <tr>
        <td>Site</td>
        <td>
            <?php
            echo $this->Html->link($ssindicai['Ssindical']['Site'], 'http://' . $ssindicai['Ssindical']['Site'], array(
                'target' => '_blank',
                'escape' => false));
            ?>
        </td>
    </tr>
    <tr>
        <td>Facebook</td>
        <td>
            <?php
            echo $this->Html->link($ssindicai['Ssindical']['Facebook'], $ssindicai['Ssindical']['Facebook'], array(
                'target' => '_blank',
                'escape' => false));
            ?>
        </td>
    </tr>
    <tr>
        <td>YouTube</td>
        <td>
<?php
echo $this->Html->link($ssindicai['Ssindical']['Youtube'], $ssindicai['Ssindical']['Youtube'], array(
    'target' => '_blank',
    'escape' => false));
?>
        </td>
    </tr>
    <tr>
        <td>
<?php echo $ssindicai['Ssindical']['Observacoes']; ?>
        </td>
    </tr>
</table>