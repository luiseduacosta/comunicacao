<?php
echo $this->element('submenu_ssindicais');
?>

<div class="container">
    <h1>Inserir Seção sindical</h1>

    <?php
    echo $this->Form->create('Ssindical');
    echo $this->Form->input('Secao_sindical');
    echo $this->Form->input('Secao_sindical_extenso');
    echo $this->Form->input('Setor', array('options' => array('F' => 'Federais', 'E' => 'Estaduais', 'P' => 'Particulares')));
    echo $this->Form->input('Estado', array('options' => array(
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins'
    )));
    echo $this->Form->input('Regional', array('options' => array(
            'Norte I' => 'Norte I',
            'Norte II' => 'Norte II',
            'Nordeste I' => 'Nordeste I',
            'Nordeste II' => 'Nordeste II',
            'Nordeste III' => 'Nordeste III',
            'Planalto' => 'Planalto',
            'Pantanal' => 'Pantanal',
            'Leste' => 'Leste',
            'Rio de Janeiro' => 'Rio de Janeiro',
            'São Paulo' => 'São Paulo',
            'Sul' => 'Sul',
            'Rio Grande do Sul' => 'Rio Grande do Sul'
    )));
    echo $this->Form->input('Site');
    echo $this->Form->input('Facebook');
    echo $this->Form->input('Youtube');
    echo $this->Form->end('Salvar');
    ?>
</div>