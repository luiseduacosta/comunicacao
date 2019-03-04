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
        '« Anterior ', null, null, array('class' => 'disabled')
);
echo $this->Paginator->next(
        ' Posterior »', null, null, array('class' => 'disabled')
);

echo "<br>";

echo $this->Paginator->counter();

echo "</div>";
?>

<?php foreach ($ssindicais as $c_ssindicais): ?>

    <div align='center'>

        <h1>
            <?php
            echo $this->Html->link('Ir para registro', 'ver/' . $c_ssindicais['Ssindicai']['Id']);
            echo " || ";

            echo $this->Html->link($c_ssindicais['Ssindicai']['Site'], 'http://' . $c_ssindicais['Ssindicai']['Site'], array('target' => '_blank',
                'escape' => false));

            if (!empty($c_ssindicais['Ssindicai']['Facebook'])) {
                echo " || ";
                echo $this->Html->link('Facebook', $c_ssindicais['Ssindicai']['Facebook'], array('target' => '_blank',
                    'escape' => false));
            }

            if (!empty($c_ssindicais['Ssindicai']['Youtube'])) {
                echo " || ";
                echo $this->Html->link('Youtube', $c_ssindicais['Ssindicai']['Youtube'], array('target' => '_blank',
                    'escape' => false));
            }
            ?>


        </h1>
        <!--
        <object type="text/html" data="http://<?php // echo $c_ssindicais['Ssindicai']['Site'];     ?>" 
                width="1000" height="1200" typemustmatch>
        </object>
        //-->
        <iframe width='1000' height='1200' frameborder='0' 
                src='http://<?php echo $c_ssindicais['Ssindicai']['Site']; ?>'>
        </iframe>
    </div>

<?php endforeach; ?>
