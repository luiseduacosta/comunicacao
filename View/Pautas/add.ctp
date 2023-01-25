<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<script type="text/javascript">
    function contacarateres() {
        var x = document.getElementById('PautaTitulo');
        var n = x.value.length;
        document.getElementById("conta").innerHTML = n;
    }
</script>

<?php
echo $this->element('submenu_pautas');
?>

<div class="container">
    <h1>Inserir pauta</h1>

    <?php
    echo $this->Form->create('Pauta', array('type' => 'file'));
    echo $this->Form->input('titulo', array('label' => "Título <span id='conta'></span>", 'onkeyup' => 'javascript:contacarateres()'));
    echo $this->Form->input('conteudo', array('class' => 'ckeditor'));
    echo $this->Form->input('data', array('type' => 'date', 'dateFormat' => 'DMY'));
    echo $this->Form->input('anexo.', array('type' => 'file', 'multiple'));
    echo $this->Form->input('informandes', array('type' => 'checkbox', 'options' => array('0' => 'Não', '1' => 'Sim'), 'default' => 0));
    echo $this->Form->end('Salvar');
    ?>
</div>