<div class="card-view m-4">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tema</th>
                <th>Titulo</th>
                <th>Código</th>
                <th>Precio</th>
                <th>Resumen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($libros as $libro) : ?>
                <tr>
                    <td><?php echo $libro['lib_id']; ?></td>
                    <td data-field="tem_tema"><?php echo $libro['tem_tema']; ?></td>
                    <td class="editable" data-field="lib_titulo"><?php echo $libro['lib_titulo']; ?></td>
                    <td class="editable" data-field="lib_codigo"><?php echo $libro['lib_codigo']; ?></td>
                    <td class="editable" data-field="lib_precio">$<?php echo $libro['lib_precio']; ?></td>
                    <td class="editable" data-field="lib_resumen"><?php echo $libro['lib_resumen']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-circle btn-sm save-btn" data-id="<?php echo $libro['lib_id']; ?>">
                            <i class="fas fa-save"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.editable').not(':first-child').click(function () {
            $(this).attr('contenteditable', true).focus();
        });
        $('.save-btn').click(function () {
            let libroId = $(this).data('id');
            let libro = {};
            $(this).closest('tr').find('.editable').each(function () {
                let field = $(this).data('field');
                let value = $(this).text();
                if (field === 'lib_precio') {
                    value = value.replace('$', '');
                }
                libro[field] = value;
            });
            let urlUpdate = "<?php echo base_url('/libro/update/'); ?>" +  libroId;
            $.ajax({
                url: urlUpdate,
                method: 'POST',
                data: {libro:libro},
                success: function (response) {
                    $('.editable').attr('contenteditable', false);
                }
            });
        });
    });
</script>
