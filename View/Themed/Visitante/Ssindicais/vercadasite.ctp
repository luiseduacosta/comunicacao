<?php
// pr($ssindicais);
?>

<?php
echo $this->element('submenu_ssindicais');
// echo $this->element('submenu_vercada');
?>

<?php
echo "<div align = 'center'>";

echo $this->Paginator->numbers();

echo "<br>";

echo $this->Paginator->prev(
    '« Anterior ',
    null,
    null,
    array('class' => 'disabled')
);
echo $this->Paginator->next(
    ' Posterior »',
    null,
    null,
    array('class' => 'disabled')
);

echo "<br>";

echo $this->Paginator->counter();

echo "</div>";
?>

<?php foreach ($ssindicais as $c_ssindicais): ?>

    <div align='center'>

        <h1>
            <?php
            echo '<p style="font-size:70%;">' . $this->Html->link($c_ssindicais['Ssindical']['Secao_sindical_extenso'], 'ver/' . $c_ssindicais['Ssindical']['Id']) . '</p>';

            echo '<p style="font-size:70%;">' . $this->Html->link($c_ssindicais['Ssindical']['Site'], 'http://' . $c_ssindicais['Ssindical']['Site'], array(
                'target' => '_blank',
                'escape' => false
            ));

            if (!empty($c_ssindicais['Ssindical']['Facebook'])) {
                echo " || ";
                echo $this->Html->link('Facebook', $c_ssindicais['Ssindical']['Facebook'], array(
                    'target' => '_blank',
                    'escape' => false
                ));
            }

            if (!empty($c_ssindicais['Ssindical']['Youtube'])) {
                echo " || ";
                echo $this->Html->link('Youtube', $c_ssindicais['Ssindical']['Youtube'], array(
                    'target' => '_blank',
                    'escape' => false
                ));
            }

            echo "</p>";

            ?>


        </h1>
        <!--
        <object type="text/html" data="http://<?php // echo $c_ssindicais['Ssindicai']['Site'];     ?>"
                width="1000" height="1200" typemustmatch>
        </object>
        //-->
        <iframe width='1000' height='1200' frameborder='0' src='http://<?php echo $c_ssindicais['Ssindical']['Site']; ?>'>
        </iframe>
    </div>

<?php endforeach; ?>