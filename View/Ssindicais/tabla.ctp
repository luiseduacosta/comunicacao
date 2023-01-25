<?php
// pr($ssindicais);
// die();
?>
<script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js”></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function () {
        $('#tabela').DataTable();
    });

</script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estudante[]|\Cake\Collection\CollectionInterface $estudantes
 */
?>
<div class="container">

    <div class="row justify-content-left">
        <div class="col-auto">
            <div class="container table-responsive">
                <h3><?= __('Seção sindical') ?></h3>
                <table id='tabela' aria-describedby='tabela de seções sindicais' class="table table-striped table-hover table-responsive">
                    <caption>Tabela de seções sindicais</caption>
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Seção sindical</th>
                            <th>Quantidade</th>
                            <th>Estado</th>
                            <th>Regional</th>
                            <th>Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ssindicais as $ssindical): ?>
                            <?php // pr($ssindical) ?>
                            <tr>
                                <td><?php echo $ssindical['Ssindical']['Id'] ?></td>
                                <td><?php echo $ssindical['Ssindical']['Secao_sindical'] ?></td>
                                <td><?php echo $quantidade = isset($ssindical['historicos']['0']['quantidade']) ? $ssindical['historicos']['0']['quantidade'] : NULL ?></td>
                                <td><?php echo $ssindical['Ssindical']['Estado'] ?></td>
                                <td><?php echo $ssindical['Ssindical']['Regional'] ?></td>
                                <td><?php echo $ssindical['Ssindical']['Setor'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
