<?php // debug($this->data);   ?>

<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<script type="text/javascript">
    function contacarateres() {
        var x = document.getElementById('PautaTitulo');
        var n = x.value.length;
        document.getElementById("conta").innerHTML = n;
    }
</script>

<div class="container">

    <?php
    echo $this->Form->create('Pauta', array('type' => 'file'));
    echo $this->Form->input('Pauta.titulo', array('label' => "Título <span id='conta'></span>", 'onkeyup' => 'javascript:contacarateres()'));
    echo $this->Form->input('Pauta.conteudo', array('class' => 'ckeditor'));
    echo $this->Form->input('Pauta.data', array('type' => 'date', 'dateFormat' => 'DMY'));
    if (!empty($this->data['Pauta']['anexo'])):
        $anexos = explode(',', $this->data['Pauta']['anexo']);
        foreach ($anexos as $c_anexo):
            echo "Anexos: " . $this->Html->link($c_anexo, '/files/' . trim($c_anexo));
            echo "<br>";
        endforeach;
        echo $this->Form->input('anexo', array('value' => $this->data['Pauta']['anexo'], 'type' => 'hidden'));
        echo '<br>';
    else:
        echo $this->Form->input('anexo.', array('type' => 'file', 'multiple'));
        echo '<br>';
    endif;

    echo $this->Form->input('Pauta.informandes', array('type' => 'checkbox'));
    echo $this->Form->input('Pauta.id', array('type' => 'hidden'));
    echo $this->Form->end('Salvar');
    ?>
</div>