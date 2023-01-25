<?php
// pr($ssindicais);
?>

<script>

    $(document).ready(function () {

        $('#tabela').DataTable({
            order: [[1, 'asc']],
            columnDefs: [
                {
                    targets: [1],
                    orderData: [1, 5],
                },
            ],
            pagingType: 'full_numbers',
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'Nada foi encontrado - desculpe',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'Nenhum registro encontrado',
                infoFiltered: '(filtrado de um total de _MAX_ registros)',
                search: 'Seção sindical:',
                paginate: {
                    first: 'Primeiro',
                    previous: 'Anterior',
                    next: 'Posterior',
                    last: 'Último',
                },
            },

            initComplete: function () {
                this.api()
                        .columns([1, 3, 4, 5, 6, 7, 8, 9])
                        .every(function () {
                            var column = this;
                            var select = $('<select class="form-control my-1"><option value=""></option></select>')
                                    .appendTo($(column.header()))
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });

                            column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function (d, j) {
                                        var val = $('<a/>').html(d).text();
                                        select.append('<option value="' + val + '">' + val.substr(0, 25) + '</option>');
                                    });
                        });
            },

        });
    });

</script>

<?php
echo $this->element('submenu_ssindicais');
?>

<div class="container">
    <table id="tabela" class="table table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Seção Sindical</th>
                <th>Sindicalizados</th>
                <th>Ano</th>
                <th>Estado</th>
                <th>Regional</th>
                <th>Setor</th>
                <th>Site</th>
                <th>Facebook</th>
                <th>YouTube</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ssindicais as $c_ssindicais): ?>

                <?php // pr($c_ssindicais);  ?>

                <tr>
                    <td><?php echo $this->Html->link($c_ssindicais["Ssindical"]['Id'], 'ver/' . $c_ssindicais["Ssindical"]['Id']); ?></td>
                    <td><?php echo $this->Html->link($c_ssindicais["Ssindical"]['Secao_sindical'], 'ver/' . $c_ssindicais["Ssindical"]['Id']); ?></td>
                    <td style="text-align: center"><?php echo $sindicalizados = !empty($c_ssindicais["historicos"]) ? $c_ssindicais["historicos"][0]['quantidade'] : NULL; ?></td>
                    <td><?php echo $ano = isset($c_ssindicais["historicos"]['0']['ano']) ? $c_ssindicais["historicos"]['0']['ano'] : NULL; ?></td>
                    <td><?php echo $c_ssindicais["Ssindical"]['Estado']; ?></td>
                    <td><?php echo $c_ssindicais["Ssindical"]['Regional']; ?></td>
                    <td>
                        <?php
                        if ($c_ssindicais["Ssindical"]['Setor'] == 'F'):
                            echo 'Federal';
                        elseif ($c_ssindicais["Ssindical"]['Setor'] == 'E'):
                            echo 'Estadual';
                        else:
                            echo 'Sem informação';
                        endif;
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($c_ssindicais["Ssindical"]['Site'])) {
                            echo $this->Html->link('Site', 'http://' . $c_ssindicais["Ssindical"]['Site'], array(
                                'target' => '_blank',
                                'escape' => false));
                        } else {
                            '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($c_ssindicais["Ssindical"]['Facebook'])) {
                            echo $this->Html->link('Facebook', $c_ssindicais["Ssindical"]['Facebook'], array(
                                'target' => '_blank',
                                'escape' => false));
                        } else {
                            '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($c_ssindicais["Ssindical"]['Youtube'])) {
                            echo $this->Html->link('YouTube', $c_ssindicais["Ssindical"]['Youtube'], array(
                                'target' => '_blank',
                                'escape' => false));
                        } else {
                            '';
                        }
                        ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>