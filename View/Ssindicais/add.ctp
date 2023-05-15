<?php
echo $this->element('submenu_ssindicais');
?>

<div class="container">
    <h1>Inserir Seção sindical</h1>

    <?php
    echo $this->Form->create('Ssindical', [
        'class' => 'form-horizontal',
        'role' => 'form',
        'inputDefaults' => [
            'format' => ['before', 'label', 'between', 'input', 'after', 'error'],
            'div' => ['class' => 'form-group row'],
            'label' => ['class' => 'col-4 control-label'],
            'between' => "<div class = 'col-8'>",
            'class' => ['form-control'],
            'after' => "</div>",
            'error' => false
        ]
            ]
    );
    echo $this->Form->input('Secao_sindical', ['label' => ['text' => 'Seção Sindical', 'class' => 'col-2']]);
    echo $this->Form->input('Secao_sindical_extenso', ['label' => ['text' => 'Seção sindical por extenso', 'class' => 'col-2']]);
    echo $this->Form->input('Setor', ['label' => ['text' => 'Setor', 'class' => 'col-2'], 'options' => ['F' => 'Federais', 'E' => 'Estaduais', 'P' => 'Particulares']]);
    echo $this->Form->input('Estado', ['label' => ['text' => 'Estado', 'class' => 'col-2'], 'options' => [
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
        ]
    ]);
    echo $this->Form->input('Regional', ['label' => ['text' => 'Regional', 'class' => 'col-2'], 'options' => [
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
        ]
    ]);
    echo $this->Form->input('Site', ['label' => ['text' => 'Site', 'class' => 'col-2']]);
    echo $this->Form->input('Facebook', ['label' => ['text' => 'Facebook', 'class' => 'col-2']]);
    echo $this->Form->input('Youtube', ['label' => ['text' => 'Youtube', 'class' => 'col-2']]);
    echo $this->Form->input('Observacoes', ['label' => ['text' => 'Observações', 'class' => 'col-2']]);
    echo $this->Form->submit('Confirma', ['type' => 'Submit', 'label' => ['text' => 'Confirma', 'class' => 'col-4'], 'class' => 'btn btn-primary']);
    echo $this->Form->end();
    ?>
</div>