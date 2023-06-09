<div class="itens index">
    <?= $this->Html->link(__('Novo Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('unidade_medida') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('preco') ?></th>
                    <th><?= $this->Paginator->sort('perecivel') ?></th>
                    <th><?= $this->Paginator->sort('data_validade') ?></th>
                    <th><?= $this->Paginator->sort('data_fabricacao') ?></th>
                    <th class="actions d-flex"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $iten): ?>
                <tr>
                    <td><?= $this->Number->format($iten->id) ?></td>
                    <td><?= h($iten->nome) ?></td>
                    <td><?= h($iten->unidade_medida) ?></td>
                    <td><?= h($iten->quantidade) ?></td>
                    <td><?= h($iten->preco) ?></td>
                    <td><?= $iten->perecivel == 1 ? __('Sim') : __('Nao'); ?></td>                
                    <td><?= h($iten->data_validade) ?></td>
                    <td><?= h($iten->data_fabricacao) ?></td>
                    <td class="actions d-flex">
                        <button type="button" class="button-link action-button view-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'view', $iten->id]) ?>';"><i class="fa fa-eye fa-xl"></i></button>
                        <button type="button" class="button-link action-button edit-button" onclick="window.location.href='<?= $this->Url->build(['action' => 'edit', $iten->id]) ?>';"><i class="fa fa-pencil fa-xl"></i></button>
                        <button type="button" class="button-link action-button delete-button" onclick="deleteItem('<?= $this->Url->build(['action' => 'delete', $iten->id]) ?>')"><i class="fa fa-trash fa-xl"></i></button>
                    </td>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proxima') . ' >') ?>
            <?= $this->Paginator->last(__('ultima') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostando {{current}} registro(s) de {{count}}')) ?></p>
    </div>
</div>
<style>


</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function deleteItem(url) {
        if (confirm('Tem certeza que gostaria de deletar?')) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '/Itens/index'; 
                    } else {
                        alert('O item não pode ser removido. Por favor, tente novamente.');
                    }
                },
                error: function() {
                    // Show error message or handle any other errors
                    alert('Um erro ocorreu durante a remoção do item. Por favor, tente novamente.');
                }
            });
        }
    }
</script>